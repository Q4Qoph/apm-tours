@extends('layouts.app')
@section('title', 'Services | A&PM Tours & Travel')
@section('content')
@php
    $services = [
        [
            'name' => 'Safaris & Holiday Packages',
            'image' => 'assets/img/apm-selected/service-safari.webp',
            'alt' => 'Travellers on safari with wildlife in open grassland',
            'description' => 'Tailor-made safaris, leisure trips, weekend escapes, family holidays and themed travel experiences.',
            'width' => 900,
            'height' => 790,
        ],
        [
            'name' => 'Accommodation Reservations',
            'image' => 'assets/img/services/accommodation-reservations.webp',
            'alt' => 'Travellers arriving at a lodge overlooking the landscape',
            'description' => 'Hotel, lodge, camp and resort sourcing and booking aligned to your budget and travel style.',
            'width' => 900,
            'height' => 790,
        ],
        [
            'name' => 'Private & Group Transport',
            'image' => 'assets/img/apm-selected/service-transport.webp',
            'alt' => 'Four-wheel-drive vehicle on a rural road',
            'description' => 'Coordinated airport transfers and tour transport through licensed vehicle operators.',
            'width' => 900,
            'height' => 790,
        ],
        [
            'name' => 'Guide Coordination',
            'image' => 'assets/img/services/guide-coordination.webp',
            'alt' => 'A guide sharing information with travellers during a safari',
            'description' => 'Assignment of qualified guides suited to your destination, language, group profile and travel interests.',
            'width' => 900,
            'height' => 790,
        ],
        [
            'name' => 'Flight Ticketing & Travel Agency',
            'image' => 'assets/img/services/flight-ticketing-travel-agency.webp',
            'alt' => 'A travel adviser helping customers plan flights and other travel arrangements',
            'description' => 'Planned domestic and international ticketing, travel reservations and related agency services.',
            'width' => 900,
            'height' => 790,
        ],
        [
            'name' => 'Destination Management',
            'image' => 'assets/img/apm-selected/service-destination.webp',
            'alt' => 'Travel planning materials arranged on a map',
            'description' => 'End-to-end in-country coordination for individuals, groups, agents and partner organizations.',
            'width' => 900,
            'height' => 790,
        ],
        [
            'name' => 'Corporate Travel Solutions',
            'image' => 'assets/img/services/corporate-travel-solutions.webp',
            'alt' => 'Business travellers reviewing coordinated travel arrangements',
            'description' => 'Business travel coordination, executive transfers, conference travel, group movements and itinerary management.',
            'width' => 900,
            'height' => 790,
        ],
        [
            'name' => 'Tailor-Made Experiences',
            'image' => 'assets/img/apm-selected/service-culture.webp',
            'alt' => 'People in traditional red attire at an outdoor gathering',
            'description' => 'Cultural, adventure, honeymoon, educational, photography, nature and bespoke interest-based journeys.',
            'width' => 900,
            'height' => 790,
        ],
    ];
@endphp
<section class="position-relative overflow-hidden space" id="service-sec">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="title-area text-center">
                    <span class="sub-title">Our Services</span>
                    <h1 class="sec-title">Travel services to support every journey</h1>
                    <p>One point of contact, clearly defined inclusions, responsive support and coordinated delivery from enquiry to trip completion.</p>
                </div>
            </div>
        </div>
        <div class="row gy-4 gx-4">
            @foreach ($services as $service)
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="destination-item th-ani">
                        <div class="destination-item_img global-img">
                            <img
                                src="{{ asset($service['image']) }}"
                                alt="{{ $service['alt'] }}"
                                width="{{ $service['width'] }}"
                                height="{{ $service['height'] }}"
                                loading="lazy"
                                decoding="async"
                            >
                        </div>
                        <div class="destination-content">
                            <h2 class="box-title h5">{{ $service['name'] }}</h2>
                            <p class="destination-text">{{ $service['description'] }}</p>
                            <a href="{{ route('contact') }}" class="th-btn style4 th-icon" aria-label="Enquire about {{ $service['name'] }}">Enquire</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="row justify-content-center mt-5">
            <div class="col-lg-8 text-center">
                <a href="{{ route('contact') }}" class="th-btn th-icon">Tell us about your trip</a>
            </div>
        </div>
        <div class="shape-mockup shape1 d-none d-xxl-block" data-bottom="17%" data-right="-9%">
            <img src="{{ asset('assets/img/shape/shape_1.png') }}" alt="">
        </div>
        <div class="shape-mockup shape2 d-none d-xl-block" data-bottom="8%" data-right="-8%">
            <img src="{{ asset('assets/img/shape/shape_2.png') }}" alt="">
        </div>
        <div class="shape-mockup shape3 d-none d-xxl-block" data-bottom="15%" data-right="-4%">
            <img src="{{ asset('assets/img/shape/shape_3.png') }}" alt="">
        </div>
    </div>
</section>
@endsection
