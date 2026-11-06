@extends('layouts.app')
@section('title', 'Destinations | A&PM Tours & Travel')
@section('content')
@php
$destinationHighlights = [
    [
        'name' => 'Maasai Mara',
        'image' => 'assets/img/destinations/maasai-mara.webp',
        'alt' => 'Maasai Mara safari destination artwork',
        'description' => 'Big Five safaris, migration-season travel, photography and private game drives.',
        'width' => 1448,
        'height' => 1086,
    ],
    [
        'name' => 'Amboseli',
        'image' => 'assets/img/destinations/amboseli.webp',
        'alt' => 'Amboseli wildlife and Mount Kilimanjaro destination artwork',
        'description' => 'Elephants, open savannah landscapes and iconic Kilimanjaro views.',
        'width' => 1448,
        'height' => 1086,
    ],
    [
        'name' => 'Naivasha',
        'image' => 'assets/img/destinations/naivasha.webp',
        'alt' => 'Lake Naivasha destination artwork',
        'description' => 'Lake experiences, Hell’s Gate excursions, relaxation and short escapes from Nairobi.',
        'width' => 1672,
        'height' => 941,
    ],
    [
        'name' => 'Lake Nakuru',
        'image' => 'assets/img/destinations/lake-nakuru.webp',
        'alt' => 'Lake Nakuru wildlife and Rift Valley destination artwork',
        'description' => 'Wildlife viewing, Rift Valley scenery and easy integration into multi-destination circuits.',
        'width' => 1670,
        'height' => 941,
    ],
    [
        'name' => 'Samburu',
        'image' => 'assets/img/destinations/samburu.webp',
        'alt' => 'Samburu destination artwork',
        'description' => 'Distinctive wildlife and northern Kenya landscapes.',
        'width' => 1670,
        'height' => 941,
    ],
    [
        'name' => 'Mt. Kenya',
        'image' => 'assets/img/destinations/mount-kenya.webp',
        'alt' => 'Mount Kenya destination artwork',
        'description' => 'Discover Kenya’s highest mountain destination, where majestic landscapes and exclusive adventures await.',
        'width' => 1671,
        'height' => 941,
    ],
    [
        'name' => 'Tsavo East & West',
        'image' => 'assets/img/destinations/tsavo-east-west.webp',
        'alt' => 'Tsavo East and West destination artwork',
        'description' => 'Expansive wilderness, red elephants, volcanic landscapes and longer safari circuits.',
        'width' => 1672,
        'height' => 941,
    ],
    [
        'name' => 'Kenya Coast',
        'image' => 'assets/img/destinations/kenya-coast.webp',
        'alt' => 'Kenya Coast destination artwork',
        'description' => 'Diani, Mombasa, Malindi, Watamu and Lamu beach extensions, relaxation and culture.',
        'width' => 1671,
        'height' => 941,
    ],
    [
        'name' => 'Nairobi',
        'image' => 'assets/img/apm-selected/stakeholder-nairobi.webp',
        'alt' => 'Giraffes with the Nairobi skyline in the background',
        'description' => 'City stays, airport transfers, Nairobi National Park and curated urban experiences.',
        'width' => 1200,
        'height' => 900,
    ],
    [
        'name' => 'East Africa',
        'image' => 'assets/img/destinations/east-africa.webp',
        'alt' => 'East Africa travel destination artwork',
        'description' => 'Cross-border itineraries linking Kenya with Tanzania, Uganda, Rwanda and beyond.',
        'width' => 1448,
        'height' => 1086,
    ],
];
@endphp
<section class="space"><div class="container"><div class="th-sort-bar"><div class="row justify-content-between align-items-center"><div class="col-md-4"><div class="search-form-area"><form class="search-form"><input type="search" placeholder="Search destinations" aria-label="Search destinations"> <button type="submit"><i class="fa-light fa-magnifying-glass"></i></button></form></div></div><div class="col-md-auto"><div class="sorting-filter-wrap"><div class="nav" role="tablist"><a class="active" href="#" id="tab-destination-grid" data-bs-toggle="tab" data-bs-target="#tab-grid" role="tab" aria-controls="tab-grid" aria-selected="true"><i class="fa-light fa-grid-2"></i></a> <a href="#" id="tab-destination-list" data-bs-toggle="tab" data-bs-target="#tab-list" role="tab" aria-controls="tab-list" aria-selected="false" class=""><i class="fa-solid fa-list"></i></a></div></div></div></div></div><div class="row"><div class="col-xxl-9 col-lg-8"><div class="tab-content" id="nav-tabContent"><div class="tab-pane fade active show" id="tab-grid" role="tabpanel" aria-labelledby="tab-destination-grid"><div class="row gy-30">
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
            <li>Kenya destinations</li>
            <li>East African itineraries</li>
            <li>Travel support beyond the region</li>
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
