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
            return Limit::perMinute(5)->by($request->ip())->response(function (Request $request, array $headers) {
                $request->flashOnly(['name', 'email', 'phone', 'enquiry_type', 'message']);
                $errors = (new ViewErrorBag)->put('default', new MessageBag([
                    'rate_limit' => 'Too many enquiries. Please wait a minute before trying again, or contact us by phone or WhatsApp.',
                ]));

                return response()->view('pages.contact', ['errors' => $errors], 429, $headers);
            });
        });
    }
}
