@extends('layouts.app')

@section('title', 'Contact A&PM Tours & Travel')

@section('content')
<section class="apm-contact-section">
    <div class="container">
        <div class="row gx-lg-5 gy-4 align-items-start">
            <div class="col-lg-4">
                <div class="apm-contact-intro">
                    <span class="sub-title">Start planning</span>
                    <h1>Let’s plan your journey</h1>
                    <p>Tell us what you have in mind. We’ll help shape your travel plans across Kenya, East Africa and beyond.</p>

                    <h2>What happens next</h2>
                    <ol class="apm-contact-steps">
                        <li><strong>A conversation</strong><span>We discuss your dates, interests and travel needs.</span></li>
                        <li><strong>A tailored itinerary</strong><span>We work with you on a practical route and suitable arrangements.</span></li>
                        <li><strong>A written quotation</strong><span>You review the proposed inclusions, pricing and booking terms.</span></li>
                    </ol>
                    <p class="apm-contact-reassurance">An enquiry starts the conversation. Arrangements remain subject to confirmation.</p>
                </div>
            </div>

            <div class="col-lg-8">
                @include('partials.contact-enquiry-form')
            </div>
        </div>
    </div>
</section>
@endsection
