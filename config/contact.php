<?php

declare(strict_types=1);

return [
    'recipients' => array_values(array_filter(array_map('trim', explode(',', (string) env('CONTACT_RECIPIENTS', ''))))),
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
