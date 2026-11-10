<?php

declare(strict_types=1);

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\MessageBag;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\ViewErrorBag;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        RateLimiter::for('contact', function (Request $request) {
            $response = function (Request $request, array $headers) {
                $request->flashOnly(['name', 'email', 'phone', 'enquiry_type', 'message']);
                $errors = (new ViewErrorBag)->put('default', new MessageBag([
                    'rate_limit' => 'Too many enquiries. Please try again later, or contact us by phone or WhatsApp.',
                ]));

                return response()->view('pages.contact', ['errors' => $errors], 429, $headers);
            };

            $limits = [
                Limit::perMinute(5)->by('contact:minute:'.$request->ip())->response($response),
                Limit::perHour(20)->by('contact:hour:'.$request->ip())->response($response),
            ];
            $email = $request->input('email');

            if (is_string($email) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $key = hash_hmac('sha256', strtolower(trim($email)), config('app.key'));
                $limits[] = Limit::perHour(3)->by('contact:email:'.$key)->response($response);
            }

            return $limits;
        });
    }
}
