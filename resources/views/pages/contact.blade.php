@extends('layouts.app')

@section('title', 'Contact A&PM Tours & Travel')

@section('content')
<section class="space">
    <div class="container">
        <div class="title-area text-center">
            <span class="sub-title">Get In Touch</span>
            <h1 class="sec-title">Let us help you plan your next journey</h1>
            <p>A&amp;PM Tours &amp; Travel Ltd plans and coordinates travel in Kenya, East Africa and beyond. Contact our team to discuss the trip you have in mind.</p>
        </div>

<div class="row gy-4 justify-content-center apm-contact-cards">
<div class="col-xl-3 col-md-6"><div class="about-contact-grid"><div class="about-contact-icon"><i class="fas fa-phone" aria-hidden="true"></i></div><div class="about-contact-details"><h2 class="box-title">Telephone &amp; WhatsApp</h2><p class="about-contact-details-text"><a href="tel:+254788799517">+254 788 799 517</a></p><p class="about-contact-details-text"><a href="https://wa.me/254788799517">Message on WhatsApp</a></p></div></div></div>
<div class="col-xl-3 col-md-6"><div class="about-contact-grid"><div class="about-contact-icon"><i class="fas fa-envelope" aria-hidden="true"></i></div><div class="about-contact-details"><h2 class="box-title">Email</h2><p class="about-contact-details-text"><a href="mailto:reservations@apmtours.com">reservations@apmtours.com</a></p></div></div></div>
<div class="col-xl-3 col-md-6"><div class="about-contact-grid"><div class="about-contact-icon"><i class="fas fa-globe" aria-hidden="true"></i></div><div class="about-contact-details"><h2 class="box-title">Website</h2><p class="about-contact-details-text"><a href="https://apmtours.com">apmtours.com</a></p></div></div></div>
<div class="col-xl-3 col-md-6"><div class="about-contact-grid"><div class="about-contact-icon"><i class="fas fa-users" aria-hidden="true"></i></div><div class="about-contact-details"><h2 class="box-title">Follow us on</h2>@include('partials.social-profiles')</div></div></div>
</div>
    </div>
</section>

<section class="space-extra2-top space-extra2-bottom" data-bg-src="{{ asset('assets/img/bg/video_bg_1.jpg') }}">
    <div class="container">
        <div class="row gy-4 align-items-center">
            <div class="col-lg-7">
                <span class="sub-title">How We Deliver</span>
                <h2 class="sec-title">A clear path from enquiry to journey</h2>
                <p>We start by understanding your travel dates, party size, interests, budget and preferred travel style. A&amp;PM then shapes a practical itinerary and provides a written quotation with clear inclusions, booking terms and a payment schedule.</p>
                <p>After confirmation, we coordinate the agreed arrangements with relevant suppliers and provide support before and during your trip. You have one point of contact, responsive support and coordinated delivery from enquiry to trip completion.</p>
            </div>

            <div class="col-lg-5">
                <div class="contact-form style2">
                    <span class="sub-title">Start a conversation</span>
                    <h2 class="sec-title mb-30">Tell us about your trip</h2>
                    <p>Plan with confidence. Travel with purpose. Experience more.</p>
                    <p>Choose the contact option that works best for you. An enquiry begins the planning conversation; it does not confirm a booking.</p>
                    <div class="form-btn mt-24">
                        <a class="th-btn style3" href="mailto:reservations@apmtours.com?subject=Trip%20planning%20enquiry">Email A&amp;PM</a>
                    </div>
                    <div class="form-btn mt-24">
                        <a class="th-btn style3" href="https://wa.me/254788799517">Chat on WhatsApp</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
