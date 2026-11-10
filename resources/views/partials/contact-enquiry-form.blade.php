<form action="{{ route('contact.send') }}" method="POST" class="contact-form style2 apm-enquiry-form" id="contact-enquiry" aria-labelledby="contact-enquiry-heading">
    @csrf
    <h2 class="sec-title" id="contact-enquiry-heading">Tell us about your trip</h2>
    <p>Share a few details to get started. Fields marked * are required.</p>

    @if ($errors->any())
        <div class="alert alert-danger apm-enquiry-feedback" role="alert" tabindex="-1" autofocus>
            <p><strong>Please review your enquiry.</strong></p>
            <ul class="mb-0">
                @foreach ($errors->getMessages() as $field => $messages)
                    @foreach ($messages as $message)
                        <li><a href="#{{ in_array($field, ['name', 'email', 'phone', 'enquiry_type', 'message']) ? 'enquiry-'.$field : ($field === 'cf-turnstile-response' ? 'contact-verification' : 'contact-enquiry-heading') }}">{{ $message }}</a></li>
                    @endforeach
                @endforeach
            </ul>
        </div>
    @endif

    @if (session('contact_success'))
        <p class="form-messages alert alert-success apm-enquiry-feedback" role="status" tabindex="-1" autofocus>{{ session('contact_success') }}</p>
    @endif

    @if (session('contact_notice'))
        <p class="alert alert-warning" role="status">{{ session('contact_notice') }}</p>
    @endif

    <div class="row">
        <div class="col-12 form-group">
            <label for="enquiry-name">Full name *</label>
            <div class="apm-enquiry-control">
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="enquiry-name" value="{{ is_string(old('name')) ? old('name') : '' }}" autocomplete="name" maxlength="120" required @error('name') aria-invalid="true" aria-describedby="enquiry-name-error" @enderror>
                <img src="{{ asset('assets/img/icon/user.svg') }}" alt="" width="20" height="20">
            </div>
            @error('name')<p class="apm-field-error" id="enquiry-name-error">{{ $message }}</p>@enderror
        </div>
        <div class="col-12 form-group">
            <label for="enquiry-email">Email address *</label>
            <div class="apm-enquiry-control">
                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="enquiry-email" value="{{ is_string(old('email')) ? old('email') : '' }}" autocomplete="email" spellcheck="false" maxlength="254" required @error('email') aria-invalid="true" aria-describedby="enquiry-email-error" @enderror>
                <img src="{{ asset('assets/img/icon/mail.svg') }}" alt="" width="20" height="20">
            </div>
            @error('email')<p class="apm-field-error" id="enquiry-email-error">{{ $message }}</p>@enderror
        </div>
        <div class="col-12 form-group">
            <label for="enquiry-phone">Phone / WhatsApp <span>(optional)</span></label>
            <input type="tel" class="form-control @error('phone') is-invalid @enderror" name="phone" id="enquiry-phone" value="{{ is_string(old('phone')) ? old('phone') : '' }}" autocomplete="tel" maxlength="40" @error('phone') aria-invalid="true" aria-describedby="enquiry-phone-error" @enderror>
            @error('phone')<p class="apm-field-error" id="enquiry-phone-error">{{ $message }}</p>@enderror
        </div>
        <div class="col-12 form-group">
            <label for="enquiry-enquiry_type">Enquiry type *</label>
            <select name="enquiry_type" id="enquiry-enquiry_type" class="form-select @error('enquiry_type') is-invalid @enderror" required @error('enquiry_type') aria-invalid="true" aria-describedby="enquiry-enquiry_type-error" @enderror>
                <option value="">Select enquiry type</option>
                @foreach (config('contact.types') as $value => $label)
                    <option value="{{ $value }}" @selected(old('enquiry_type') === $value)>{{ $label }}</option>
                @endforeach
            </select>
            @error('enquiry_type')<p class="apm-field-error" id="enquiry-enquiry_type-error">{{ $message }}</p>@enderror
        </div>
        <div class="col-12 form-group">
            <label for="enquiry-message">Your message *</label>
            <p class="apm-field-hint" id="enquiry-message-hint">Tell us where you’d like to go, when, and how many people are travelling.</p>
            <div class="apm-enquiry-control">
                <textarea name="message" id="enquiry-message" rows="4" class="form-control @error('message') is-invalid @enderror" minlength="10" maxlength="5000" required aria-describedby="enquiry-message-hint enquiry-sensitive-hint @error('message') enquiry-message-error @enderror" @error('message') aria-invalid="true" @enderror>{{ is_string(old('message', $initialMessage ?? '')) ? old('message', $initialMessage ?? '') : '' }}</textarea>
                <img src="{{ asset('assets/img/icon/chat.svg') }}" alt="" width="20" height="20">
            </div>
            <p class="apm-field-hint apm-sensitive-hint" id="enquiry-sensitive-hint">Please leave out passport, payment and sensitive medical details.</p>
            @error('message')<p class="apm-field-error" id="enquiry-message-error">{{ $message }}</p>@enderror
        </div>
        <div hidden aria-hidden="true">
            <label for="enquiry-website">Leave this field empty</label>
            <input type="text" name="website" id="enquiry-website" tabindex="-1" autocomplete="off">
        </div>
        <div class="col-12">
            <p class="apm-field-hint">We’ll use your details to respond and send an email acknowledgement. Read our <a href="{{ route('privacy') }}">Privacy Policy</a>.</p>
        </div>
        @if (config('contact.turnstile.enabled'))
            <div class="col-12 form-group" id="contact-verification">
                @if (config('contact.turnstile.site_key') && config('contact.turnstile.secret_key'))
                    <div class="cf-turnstile" data-sitekey="{{ config('contact.turnstile.site_key') }}" data-action="contact_enquiry" data-theme="light" data-size="flexible"></div>
                    <noscript><p>Please enable JavaScript to complete verification, or contact us by phone or email.</p></noscript>
                    @once
                        <script src="https://challenges.cloudflare.com/turnstile/v0/api.js" async defer></script>
                    @endonce
                @else
                    <p role="status">Verification is temporarily unavailable. Please contact us by phone, email or WhatsApp below.</p>
                @endif
                @error('cf-turnstile-response')<p class="apm-field-error" role="alert">{{ $message }}</p>@enderror
            </div>
        @endif
        <div class="form-btn col-12 apm-enquiry-submit">
            <button type="submit" class="th-btn style3" @disabled(config('contact.turnstile.enabled') && (! config('contact.turnstile.site_key') || ! config('contact.turnstile.secret_key')))>Send enquiry <img src="{{ asset('assets/img/icon/plane.svg') }}" alt="" width="24" height="24"></button>
        </div>
    </div>
    <p class="apm-field-hint mt-3 mb-0">Prefer another way? <a href="mailto:reservations@apmtours.com">Email us</a>, <a href="tel:+254788799517">call us</a>, or <a href="https://wa.me/254788799517">chat on WhatsApp</a>.</p>
</form>
