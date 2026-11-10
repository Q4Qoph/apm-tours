<?php

declare(strict_types=1);

namespace App\Http\Requests;

use App\Services\VerifyContactChallenge;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Validator;

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
            'cf-turnstile-response' => config('contact.turnstile.enabled')
                ? ['bail', 'required', 'string', 'max:2048']
                : ['exclude'],
        ];
    }

    public function attributes(): array
    {
        return ['name' => 'full name', 'enquiry_type' => 'enquiry type', 'cf-turnstile-response' => 'bot verification'];
    }

    public function messages(): array
    {
        return [
            'website.prohibited' => 'We could not accept this submission. Please leave the website field empty.',
            'cf-turnstile-response.required' => 'Please complete the bot verification before sending your enquiry.',
        ];
    }

    public function after(): array
    {
        return [function (Validator $validator): void {
            if ($validator->errors()->isNotEmpty() || ! config('contact.turnstile.enabled')) {
                return;
            }

            if (! app(VerifyContactChallenge::class)->verify($this->input('cf-turnstile-response'), $this->getHost())) {
                $validator->errors()->add('cf-turnstile-response', 'We could not verify this submission. Please refresh the page and try again, or contact us by phone or email.');
            }
        }];
    }
}
