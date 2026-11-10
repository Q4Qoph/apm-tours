<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\ShowContactRequest;
use Illuminate\View\View;

class ContactPageController extends Controller
{
    public function __invoke(ShowContactRequest $request): View
    {
        $preferences = $request->validated();
        $lines = [];
        foreach (['place' => 'Destination', 'region' => 'Region', 'travel_style' => 'Travel style'] as $field => $label) {
            if (! empty($preferences[$field])) {
                $lines[] = $label.': '.$preferences[$field];
            }
        }
        if (isset($preferences['duration'])) {
            $days = (int) $preferences['duration'];
            $lines[] = 'Preferred duration: '.$days.($days === 1 ? ' day' : ' days');
        }

        return view('pages.contact', ['initialMessage' => $lines === [] ? '' : implode("\n", $lines)."\n\n"]);
    }
}
