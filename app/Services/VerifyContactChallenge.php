<?php

declare(strict_types=1);

namespace App\Services;

use Illuminate\Http\Client\ConnectionException;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class VerifyContactChallenge
{
    public function verify(string $token, string $hostname): bool
    {
        $secret = config('contact.turnstile.secret_key');
        $siteKey = config('contact.turnstile.site_key');
        $hostnames = config('contact.turnstile.hostnames');

        if (! is_string($secret) || $secret === '' || ! is_string($siteKey) || $siteKey === '' || ! in_array($hostname, $hostnames, true)) {
            return false;
        }

        if (app()->isProduction() && in_array($hostname, ['localhost', '127.0.0.1'], true)) {
            return false;
        }

        try {
            $response = Http::asForm()->connectTimeout(3)->timeout(5)
                ->post('https://challenges.cloudflare.com/turnstile/v0/siteverify', [
                    'secret' => $secret,
                    'response' => $token,
                ]);
        } catch (ConnectionException) {
            return false;
        }

        if (! $response->successful() || $response->json('success') !== true
            || $response->json('hostname') !== $hostname
            || $response->json('action') !== 'contact_enquiry') {
            return false;
        }

        // Shared-cache redemption also rejects concurrent replays during provider convergence.
        return Cache::add('contact:challenge:'.hash('sha256', $token), true, now()->addMinutes(6));
    }
}
