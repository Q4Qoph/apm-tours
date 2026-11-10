<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\SearchDestinationsRequest;
use Illuminate\View\View;

class DestinationController extends Controller
{
    public function __invoke(SearchDestinationsRequest $request): View
    {
        $filters = $request->validated();
        $query = trim($filters['q'] ?? '');
        $region = $filters['region'] ?? '';
        $travelStyle = $filters['travel_style'] ?? '';
        $duration = isset($filters['duration']) ? (int) $filters['duration'] : null;
        $destinations = collect(config('destinations.highlights'))->filter(function (array $destination) use ($query, $region): bool {
            $regions = $destination['name'] === 'East Africa'
                ? config('destinations.regions') : ['Kenya'];
            $searchable = implode(' ', [$destination['name'], $destination['description'], $destination['alt'], ...$regions]);

            return ($region === '' || in_array($region, $regions, true))
                && ($query === '' || mb_stripos($searchable, $query) !== false);
        })->values()->all();
        $planningPreferences = array_filter([
            'region' => $region,
            'travel_style' => $travelStyle,
            'duration' => $duration,
        ], fn ($value) => $value !== '' && $value !== null);

        return view('pages.destination', [
            'destinationHighlights' => $destinations,
            'query' => $query,
            'region' => $region,
            'travelStyle' => $travelStyle,
            'duration' => $duration,
            'planningPreferences' => $planningPreferences,
        ]);
    }
}
