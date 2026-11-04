@extends('layouts.app')
@section('title', 'Blog | A&PM Tours & Travel')
@section('content')
<section class="th-blog-wrapper space">
    <div class="container">
        <div class="title-area text-center"><span class="sub-title">A&amp;PM Blog</span><h1 class="sec-title">Ideas for your next journey</h1><p>Travel-planning guidance drawn from A&amp;PM’s services, destinations and approach to responsible travel.</p></div>
        <div class="row gy-4">
            <div class="col-lg-4 col-md-6"><article class="th-blog blog-single h-100">
                <div class="blog-img apm-editorial-image"><a href="{{ route('blog.planning') }}"><img src="{{ asset('assets/img/apm-selected/service-destination.webp') }}" alt="Travel planning materials arranged on a map" width="900" height="790" loading="lazy" decoding="async"></a></div>
                <div class="blog-content"><h2 class="blog-title h4"><a href="{{ route('blog.planning') }}">Planning your trip with A&amp;PM</a></h2><p class="blog-text">Start with your dates, interests and travel party, then work towards an itinerary and written quotation.</p><a class="th-btn style4 th-icon" href="{{ route('blog.planning') }}">Read article</a></div>
            </article></div>
            <div class="col-lg-4 col-md-6"><article class="th-blog blog-single h-100">
                <div class="blog-img apm-editorial-image"><a href="{{ route('blog.safari-coast') }}"><img src="{{ asset('assets/img/apm-selected/hero-coast.webp') }}" alt="Coastal town and beach beside the ocean" width="1760" height="978" loading="lazy" decoding="async"></a></div>
                <div class="blog-content"><h2 class="blog-title h4"><a href="{{ route('blog.safari-coast') }}">Planning a safari and coastal escape</a></h2><p class="blog-text">Explore how Kenya’s wildlife, lake and coastal destinations can fit into a personalised travel plan.</p><a class="th-btn style4 th-icon" href="{{ route('blog.safari-coast') }}">Read article</a></div>
            </article></div>
            <div class="col-lg-4 col-md-6"><article class="th-blog blog-single h-100">
                <div class="blog-img apm-editorial-image"><a href="{{ route('blog.responsible-travel') }}"><img src="{{ asset('assets/img/apm-selected/service-culture.webp') }}" alt="People in traditional red attire at an outdoor gathering" width="900" height="790" loading="lazy" decoding="async"></a></div>
                <div class="blog-content"><h2 class="blog-title h4"><a href="{{ route('blog.responsible-travel') }}">Responsible travel with A&amp;PM</a></h2><p class="blog-text">Explore the principles behind respectful wildlife, community and cultural experiences.</p><a class="th-btn style4 th-icon" href="{{ route('blog.responsible-travel') }}">Read article</a></div>
            </article></div>
        </div>
        <p class="mt-4 text-center">Images are illustrative and do not represent a record of A&amp;PM client trips. Contact the team to discuss a personalised itinerary and quotation.</p>
    </div>
</section>
@endsection
