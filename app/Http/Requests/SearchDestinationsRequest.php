<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SearchDestinationsRequest extends FormRequest
{
    protected $redirectRoute = 'destinations';

    public function rules(): array
    {
        return [
            'q' => ['nullable', 'string', 'max:100'],
            'region' => ['nullable', 'string', Rule::in(config('destinations.regions'))],
            'travel_style' => ['nullable', 'string', Rule::in(config('destinations.travel_styles'))],
            'duration' => ['nullable', 'integer', 'between:1,14'],
        ];
    }

    public function attributes(): array
    {
        return ['q' => 'search term', 'duration' => 'preferred duration'];
    }
}
