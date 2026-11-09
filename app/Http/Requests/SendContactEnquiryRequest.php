<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SendContactEnquiryRequest extends FormRequest
{
    protected $redirectRoute = 'contact';

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:120', 'not_regex:/[\r\n]/'],
            'email' => ['required', 'string', 'email', 'max:254', 'not_regex:/[\r\n]/'],
            'phone' => ['nullable', 'string', 'max:40'],
            'enquiry_type' => ['required', 'string', Rule::in(array_keys(config('contact.types')))],
            'message' => ['required', 'string', 'min:10', 'max:5000'],
            'website' => ['prohibited'],
        ];
    }

    public function attributes(): array
    {
        return ['name' => 'full name', 'enquiry_type' => 'enquiry type'];
    }

    public function messages(): array
    {
        return ['website.prohibited' => 'We could not accept this submission. Please leave the website field empty.'];
    }
}
