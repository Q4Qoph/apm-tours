<?php

declare(strict_types=1);

return [
    'recipients' => array_values(array_filter(array_map('trim', explode(',', (string) env('CONTACT_RECIPIENTS', ''))))),
    'turnstile' => [
        'enabled' => env('APP_ENV', 'production') === 'production' || (bool) env('TURNSTILE_ENABLED', true),
        'site_key' => env('TURNSTILE_SITE_KEY'),
        'secret_key' => env('TURNSTILE_SECRET_KEY'),
        'hostnames' => ['apmtours.com', 'www.apmtours.com', 'localhost', '127.0.0.1'],
    ],
    'types' => [
        'general' => 'General enquiry',
        'safari' => 'Safari & holiday planning',
        'accommodation' => 'Accommodation',
        'transport' => 'Transport & transfers',
        'guides' => 'Guide coordination',
        'destination' => 'Destination planning',
        'corporate' => 'Corporate & group travel',
        'tailor-made' => 'Tailor-made travel',
    ],
];
