@extends('layouts.app')
@section('title', 'Gallery | A&PM Tours & Travel')
@section('content')
<section class="overflow-hidden space apm-gallery" id="gallery-sec">
    <div class="container">
        <div class="title-area mb-30 text-center"><span class="sub-title">A&amp;PM Gallery</span><h1 class="sec-title">Inspiration for your next journey</h1><p>Explore wildlife, coastal, cultural and travel-planning themes that reflect A&amp;PM’s service portfolio.</p><p>These photographs are illustrative; they are not presented as images of A&amp;PM customers, completed trips or confirmed suppliers.</p></div>
        <div class="row gy-4">
            <div class="col-lg-4 col-md-6"><figure class="gallery-box style5 mb-0">
                <div class="gallery-img global-img"><img src="{{ asset('assets/img/apm-selected/hero-safari.webp') }}" alt="Safari vehicle in open grassland" width="1760" height="978" loading="lazy" decoding="async"><a href="{{ asset('assets/img/apm-selected/hero-safari.webp') }}" class="icon-btn popup-image" aria-label="Enlarge image: Wildlife and open landscapes"><i class="fal fa-magnifying-glass-plus" aria-hidden="true"></i></a></div>
                <figcaption class="mt-3"><h2 class="h5">Wildlife and open landscapes</h2></figcaption>
            </figure></div>
            <div class="col-lg-4 col-md-6"><figure class="gallery-box style5 mb-0">
                <div class="gallery-img global-img"><img src="{{ asset('assets/img/apm-selected/about-giraffes.webp') }}" alt="Giraffes in a natural landscape" width="318" height="368" loading="lazy" decoding="async"><a href="{{ asset('assets/img/apm-selected/about-giraffes.webp') }}" class="icon-btn popup-image" aria-label="Enlarge image: Nature encounters"><i class="fal fa-magnifying-glass-plus" aria-hidden="true"></i></a></div>
                <figcaption class="mt-3"><h2 class="h5">Nature encounters</h2></figcaption>
            </figure></div>
            <div class="col-lg-4 col-md-6"><figure class="gallery-box style5 mb-0">
                <div class="gallery-img global-img"><img src="{{ asset('assets/img/apm-selected/about-elephants.webp') }}" alt="Elephants in a natural landscape" width="318" height="368" loading="lazy" decoding="async"><a href="{{ asset('assets/img/apm-selected/about-elephants.webp') }}" class="icon-btn popup-image" aria-label="Enlarge image: Wildlife experiences"><i class="fal fa-magnifying-glass-plus" aria-hidden="true"></i></a></div>
                <figcaption class="mt-3"><h2 class="h5">Wildlife experiences</h2></figcaption>
            </figure></div>
            <div class="col-lg-4 col-md-6"><figure class="gallery-box style5 mb-0">
                <div class="gallery-img global-img"><img src="{{ asset('assets/img/apm-selected/hero-coast.webp') }}" alt="Coastal town and beach beside the ocean" width="1760" height="978" loading="lazy" decoding="async"><a href="{{ asset('assets/img/apm-selected/hero-coast.webp') }}" class="icon-btn popup-image" aria-label="Enlarge image: Coastal escapes"><i class="fal fa-magnifying-glass-plus" aria-hidden="true"></i></a></div>
                <figcaption class="mt-3"><h2 class="h5">Coastal escapes</h2></figcaption>
            </figure></div>
            <div class="col-lg-4 col-md-6"><figure class="gallery-box style5 mb-0">
                <div class="gallery-img global-img"><img src="{{ asset('assets/img/apm-selected/hero-route.webp') }}" alt="Road winding through a landscape" width="1760" height="978" loading="lazy" decoding="async"><a href="{{ asset('assets/img/apm-selected/hero-route.webp') }}" class="icon-btn popup-image" aria-label="Enlarge image: Journeys by road"><i class="fal fa-magnifying-glass-plus" aria-hidden="true"></i></a></div>
                <figcaption class="mt-3"><h2 class="h5">Journeys by road</h2></figcaption>
            </figure></div>
            <div class="col-lg-4 col-md-6"><figure class="gallery-box style5 mb-0">
                <div class="gallery-img global-img"><img src="{{ asset('assets/img/apm-selected/service-culture.webp') }}" alt="People in traditional red attire at an outdoor gathering" width="900" height="790" loading="lazy" decoding="async"><a href="{{ asset('assets/img/apm-selected/service-culture.webp') }}" class="icon-btn popup-image" aria-label="Enlarge image: Cultural experiences"><i class="fal fa-magnifying-glass-plus" aria-hidden="true"></i></a></div>
                <figcaption class="mt-3"><h2 class="h5">Cultural experiences</h2></figcaption>
            </figure></div>
            <div class="col-lg-4 col-md-6"><figure class="gallery-box style5 mb-0">
                <div class="gallery-img global-img"><img src="{{ asset('assets/img/apm-selected/service-destination.webp') }}" alt="Travel planning materials arranged on a map" width="900" height="790" loading="lazy" decoding="async"><a href="{{ asset('assets/img/apm-selected/service-destination.webp') }}" class="icon-btn popup-image" aria-label="Enlarge image: Personalised planning"><i class="fal fa-magnifying-glass-plus" aria-hidden="true"></i></a></div>
                <figcaption class="mt-3"><h2 class="h5">Personalised planning</h2></figcaption>
            </figure></div>
            <div class="col-lg-4 col-md-6"><figure class="gallery-box style5 mb-0">
                <div class="gallery-img global-img"><img src="{{ asset('assets/img/apm-selected/service-safari.webp') }}" alt="Travellers on safari in open grassland" width="900" height="790" loading="lazy" decoding="async"><a href="{{ asset('assets/img/apm-selected/service-safari.webp') }}" class="icon-btn popup-image" aria-label="Enlarge image: Safari inspiration"><i class="fal fa-magnifying-glass-plus" aria-hidden="true"></i></a></div>
                <figcaption class="mt-3"><h2 class="h5">Safari inspiration</h2></figcaption>
            </figure></div>
            <div class="col-lg-4 col-md-6"><figure class="gallery-box style5 mb-0">
                <div class="gallery-img global-img"><img src="{{ asset('assets/img/apm-selected/service-transport.webp') }}" alt="Four-wheel-drive vehicle on a rural road" width="900" height="790" loading="lazy" decoding="async"><a href="{{ asset('assets/img/apm-selected/service-transport.webp') }}" class="icon-btn popup-image" aria-label="Enlarge image: Coordinated travel"><i class="fal fa-magnifying-glass-plus" aria-hidden="true"></i></a></div>
                <figcaption class="mt-3"><h2 class="h5">Coordinated travel</h2></figcaption>
            </figure></div>
            <div class="col-lg-4 col-md-6"><figure class="gallery-box style5 mb-0">
                <div class="gallery-img global-img"><img src="{{ asset('assets/img/apm-selected/stakeholder-gallery-landscape.webp') }}" alt="Giraffe and safari vans in a wide grassland landscape" width="1200" height="667" loading="lazy" decoding="async"><a href="{{ asset('assets/img/apm-selected/stakeholder-gallery-landscape.webp') }}" class="icon-btn popup-image" aria-label="Enlarge image: Open landscapes and wildlife"><i class="fal fa-magnifying-glass-plus" aria-hidden="true"></i></a></div>
                <figcaption class="mt-3"><h2 class="h5">Open landscapes and wildlife</h2></figcaption>
            </figure></div>
            <div class="col-lg-4 col-md-6"><figure class="gallery-box style5 mb-0">
                <div class="gallery-img global-img"><img src="{{ asset('assets/img/apm-selected/stakeholder-gallery-zebras.webp') }}" alt="Zebras in grassland with a city skyline behind them" width="1200" height="801" loading="lazy" decoding="async"><a href="{{ asset('assets/img/apm-selected/stakeholder-gallery-zebras.webp') }}" class="icon-btn popup-image" aria-label="Enlarge image: Wildlife beside the city"><i class="fal fa-magnifying-glass-plus" aria-hidden="true"></i></a></div>
                <figcaption class="mt-3"><h2 class="h5">Wildlife beside the city</h2></figcaption>
            </figure></div>
            <div class="col-lg-4 col-md-6"><figure class="gallery-box style5 mb-0">
                <div class="gallery-img global-img"><img src="{{ asset('assets/img/apm-selected/stakeholder-hero-safari.webp') }}" alt="Safari vehicle, zebras and wildebeest beneath a warm sunset sky" width="1600" height="900" loading="lazy" decoding="async"><a href="{{ asset('assets/img/apm-selected/stakeholder-hero-safari.webp') }}" class="icon-btn popup-image" aria-label="Enlarge image: Safari at sunset"><i class="fal fa-magnifying-glass-plus" aria-hidden="true"></i></a></div>
                <figcaption class="mt-3"><h2 class="h5">Safari at sunset</h2></figcaption>
            </figure></div>
            <div class="col-lg-4 col-md-6"><figure class="gallery-box style5 mb-0">
                <div class="gallery-img global-img"><img src="{{ asset('assets/img/apm-selected/stakeholder-transport.webp') }}" alt="Yellow safari vehicles on a road through grassland" width="900" height="790" loading="lazy" decoding="async"><a href="{{ asset('assets/img/apm-selected/stakeholder-transport.webp') }}" class="icon-btn popup-image" aria-label="Enlarge image: Travel through open landscapes"><i class="fal fa-magnifying-glass-plus" aria-hidden="true"></i></a></div>
                <figcaption class="mt-3"><h2 class="h5">Travel through open landscapes</h2></figcaption>
            </figure></div>
            <div class="col-lg-4 col-md-6"><figure class="gallery-box style5 mb-0">
                <div class="gallery-img global-img"><img src="{{ asset('assets/img/apm-selected/stakeholder-nairobi.webp') }}" alt="Giraffes with the Nairobi skyline in the background" width="1200" height="900" loading="lazy" decoding="async"><a href="{{ asset('assets/img/apm-selected/stakeholder-nairobi.webp') }}" class="icon-btn popup-image" aria-label="Enlarge image: City and nature"><i class="fal fa-magnifying-glass-plus" aria-hidden="true"></i></a></div>
                <figcaption class="mt-3"><h2 class="h5">City and nature</h2></figcaption>
            </figure></div>
            <div class="col-lg-4 col-md-6"><figure class="gallery-box style5 mb-0">
                <div class="gallery-img global-img"><img src="{{ asset('assets/img/apm-selected/stakeholder-service-safari.webp') }}" alt="Giraffe beside an open-roof safari van" width="900" height="790" loading="lazy" decoding="async"><a href="{{ asset('assets/img/apm-selected/stakeholder-service-safari.webp') }}" class="icon-btn popup-image" aria-label="Enlarge image: Wildlife encounters"><i class="fal fa-magnifying-glass-plus" aria-hidden="true"></i></a></div>
                <figcaption class="mt-3"><h2 class="h5">Wildlife encounters</h2></figcaption>
            </figure></div>
        </div>
        <div class="text-center mt-5"><p>Tell us the experiences you have in mind. We will help shape a journey around your interests, dates and budget.</p><a href="{{ route('contact') }}" class="th-btn th-icon">Start planning</a> <a href="{{ route('destinations') }}" class="th-btn style4">Explore destinations</a></div>
    </div>
</section>
@endsection
