<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ShowContactRequest extends FormRequest
{
    protected $redirectRoute = 'contact';

    public function rules(): array
    {
        return [
            'place' => ['nullable', 'string', Rule::in(array_column(config('destinations.highlights'), 'name'))],
            'region' => ['nullable', 'string', Rule::in(config('destinations.regions'))],
            'travel_style' => ['nullable', 'string', Rule::in(config('destinations.travel_styles'))],
            'duration' => ['nullable', 'integer', 'between:1,14'],
        ];
    }
}
