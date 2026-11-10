@extends('layouts.app')
@section('title', 'Destinations | A&PM Tours & Travel')
@section('content')

<section class="space"><div class="container"><h1 class="visually-hidden">Explore destinations</h1><div class="th-sort-bar"><div class="row justify-content-between align-items-center"><div class="col-md-4"><div class="search-form-area"><form class="search-form" method="GET" action="{{ route('destinations') }}">
@foreach ($planningPreferences as $preference => $value)<input type="hidden" name="{{ $preference }}" value="{{ $value }}">@endforeach
<input type="search" name="q" value="{{ $query }}" maxlength="100" placeholder="Search destinations" aria-label="Search destinations"> <button type="submit" aria-label="Search destinations"><i class="fa-light fa-magnifying-glass"></i></button></form></div></div><div class="col-md-auto"><div class="sorting-filter-wrap"><div class="nav" role="tablist"><a class="active" href="#" id="tab-destination-grid" data-bs-toggle="tab" data-bs-target="#tab-grid" role="tab" aria-controls="tab-grid" aria-selected="true"><i class="fa-light fa-grid-2"></i></a> <a href="#" id="tab-destination-list" data-bs-toggle="tab" data-bs-target="#tab-list" role="tab" aria-controls="tab-list" aria-selected="false" class=""><i class="fa-solid fa-list"></i></a></div></div></div></div></div>@if ($errors->any())
    <div class="alert alert-danger" role="alert">{{ $errors->first() }}</div>
@endif
<p role="status">{{ count($destinationHighlights) }} {{ count($destinationHighlights) === 1 ? 'destination highlight' : 'destination highlights' }}@if ($query !== '') matching “{{ $query }}”@endif
@if ($region !== '') for {{ $region }}@endif
. @if ($query !== '' || $region !== '')<a href="{{ route('destinations') }}">Clear search</a>@endif</p>
@if ($travelStyle !== '' || $duration !== null)
    <p>Your travel preferences:@if ($travelStyle !== '') {{ $travelStyle }}@endif
@if ($duration !== null) · {{ $duration }} {{ $duration === 1 ? 'day' : 'days' }}@endif
. These preferences help us plan your enquiry; they do not confirm availability.</p>
@endif
@if (count($destinationHighlights) === 0)
    <div class="alert alert-light" role="status"><h2 class="h4">No matching destinations</h2><p>Try another destination name or <a href="{{ route('destinations') }}">clear your search</a>. Our team can also help you plan a tailored trip.</p><a class="th-btn" href="{{ route('contact') }}">Discuss your trip</a></div>
@endif
<div class="row"><div class="col-xxl-9 col-lg-8"><div class="tab-content" id="nav-tabContent"><div class="tab-pane fade active show" id="tab-grid" role="tabpanel" aria-labelledby="tab-destination-grid"><div class="row gy-30">
@foreach ($destinationHighlights as $destination)
    @include('partials.destination-card', ['destination' => $destination])
@endforeach
</div></div><div class="tab-pane fade" id="tab-list" role="tabpanel" aria-labelledby="tab-destination-list"><div class="row gy-30">
@foreach ($destinationHighlights as $destination)
    @include('partials.destination-card', ['destination' => $destination, 'viewMode' => 'list'])
@endforeach
</div></div></div></div><div class="col-xxl-3 col-lg-4"><aside class="sidebar-area style2">
    <div class="widget">
        <h3 class="widget_title">Where We Travel</h3>
        <p class="box-text">A&amp;PM plans and coordinates travel across Kenya, East Africa and beyond.</p>
        <ul class="list-unstyled mb-0">
            @foreach (config('destinations.regions') as $destinationRegion)
                <li><a href="{{ route('destinations', ['region' => $destinationRegion]) }}">{{ $destinationRegion }}</a></li>
            @endforeach
        </ul>
    </div>
    <div class="widget widget_offer" data-bg-src="{{ asset('assets/img/bg/widget_bg_1.jpg') }}">
        <div class="offer-banner">
            <div class="offer">
                <h3 class="box-title">Plan a journey with A&amp;PM</h3>
                <div class="banner-logo"><img src="{{ asset('assets/img/brand/apm-header-logo.png') }}" alt="A&amp;PM Tours &amp; Travel"></div>
                <p class="offer-text">Professional enough for corporate travel. Personal enough for a once-in-a-lifetime journey.</p>
                <a href="{{ route('contact') }}" class="th-btn style2 th-icon">Start planning</a>
            </div>
        </div>
    </div>
</aside></div></div></div></section>
@endsection
