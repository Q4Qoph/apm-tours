@extends('layouts.app')
@section('title')
A&PM Tours & Travel | About Us
@endsection
@section('content')
<div class="about-area position-relative overflow-hidden overflow-hidden space" id="about-sec"><div class="container"><div class="row"><div class="col-xl-7"><div class="img-box3"><div class="img1"><img src="{{ asset('assets/img/apm-selected/about-planning.webp') }}" alt="Travel planning materials arranged on a map" width="424" height="498" loading="lazy" decoding="async"></div><div class="img2"><img src="{{ asset('assets/img/apm-selected/about-road.webp') }}" alt="Four-wheel-drive vehicle on a rural road" width="424" height="498" loading="lazy" decoding="async"></div><div class="img3 movingX"><img src="{{ asset('assets/img/apm-selected/about-safari-wide.webp') }}" alt="Travellers on a wildlife safari" width="424" height="320" loading="lazy" decoding="async"></div></div></div><div class="col-xl-5"><div class="ps-xl-4"><div class="title-area mb-20"><span class="sub-title style1">About A&amp;PM</span><h1 class="sec-title mb-20 pe-xl-5 me-xl-5 heading">Connecting you to every journey</h1></div><p class="pe-xl-5">A&amp;PM Tours Ltd, branded as A&amp;PM Tours &amp; Travel Ltd, connects travellers with Kenya, East Africa and beyond. Its brand promise is to connect every traveller to the right journey through professional planning, dependable partnerships and attentive service.</p><p class="mb-30 pe-xl-5">We plan and coordinate safaris and holidays, accommodation reservations, flight ticketing, transport, destination support, group and corporate travel, and tailor-made experiences. We serve leisure travellers, families, diaspora visitors, groups, educational and special-interest travellers, corporate clients, and international travel partners.</p><div class="about-item-wrap"><div class="about-item style2"><div class="about-item_img"><img src="{{ asset('assets/img/icon/about_1_1.svg') }}" alt=""></div><div class="about-item_centent"><h5 class="box-title">Our mission</h5><p class="about-item_text">Deliver well-planned, personalised and dependable travel experiences through responsive service, strong partnerships and customer-focused innovation.</p></div></div><div class="about-item style2"><div class="about-item_img"><img src="{{ asset('assets/img/icon/about_1_2.svg') }}" alt=""></div><div class="about-item_centent"><h5 class="box-title">Our vision</h5><p class="about-item_text">Become a trusted and recognisable travel brand connecting people to exceptional journeys across Kenya, East Africa and beyond.</p></div></div><div class="about-item style2"><div class="about-item_img"><img src="{{ asset('assets/img/icon/about_1_3.svg') }}" alt=""></div><div class="about-item_centent"><h5 class="box-title">Our purpose</h5><p class="about-item_text">Make travel easier to plan, safer to coordinate and more rewarding by bringing trusted travel services together under one brand.</p></div></div></div><div class="mt-35"><a href="{{ route('contact') }}" class="th-btn style3 th-icon">Start planning</a></div></div></div></div><div class="shape-mockup movingX d-none d-xxl-block" data-top="0%" data-left="-18%"><img src="{{ asset('assets/img/shape/shape_2_1.png') }}" alt="shape"></div><div class="shape-mockup jump d-none d-xxl-block" data-top="28%" data-right="-15%"><img src="{{ asset('assets/img/shape/shape_2_2.png') }}" alt="shape"></div><div class="shape-mockup spin d-none d-xxl-block" data-bottom="18%" data-left="-112%"><img src="{{ asset('assets/img/shape/shape_2_3.png') }}" alt="shape"></div><div class="shape-mockup movixgX d-none d-xxl-block" data-bottom="18%" data-right="-12%"><img src="{{ asset('assets/img/shape/shape_2_4.png') }}" alt="shape"></div></div></div><section class="feature-area overflow-hidden space-bottom" id="values-sec">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="title-area text-center">
                    <span class="sub-title style1">Principles behind every journey</span>
                    <h2 class="sec-title">Our Core Values</h2>
                    <p class="feature-text">These principles guide how we plan travel, communicate with clients, and coordinate with suppliers.</p>
                </div>
            </div>
        </div>
        <div class="row gy-4 justify-content-center">
            <div class="col-md-6 col-xl-3">
                <div class="feature-item th-ani h-100">
                    <div class="feature-item_icon" aria-hidden="true">
                        <i class="fa-solid fa-users apm-core-value-icon"></i>
                    </div>
                    <div class="media-body">
                        <h3 class="box-title">Customer Focus</h3>
                        <p class="feature-item_text">We design around the traveller’s needs, budget and expectations.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-3">
                <div class="feature-item th-ani h-100">
                    <div class="feature-item_icon" aria-hidden="true">
                        <i class="fa-solid fa-scale-balanced apm-core-value-icon"></i>
                    </div>
                    <div class="media-body">
                        <h3 class="box-title">Integrity</h3>
                        <p class="feature-item_text">We communicate clearly, price transparently and honour commitments.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-3">
                <div class="feature-item th-ani h-100">
                    <div class="feature-item_icon" aria-hidden="true">
                        <i class="fa-solid fa-briefcase apm-core-value-icon"></i>
                    </div>
                    <div class="media-body">
                        <h3 class="box-title">Professionalism</h3>
                        <p class="feature-item_text">We coordinate every journey with discipline, responsiveness and attention to detail.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-3">
                <div class="feature-item th-ani h-100">
                    <div class="feature-item_icon" aria-hidden="true">
                        <i class="fa-solid fa-shield-alt apm-core-value-icon"></i>
                    </div>
                    <div class="media-body">
                        <h3 class="box-title">Reliability</h3>
                        <p class="feature-item_text">We select dependable suppliers and maintain clear service standards.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-3">
                <div class="feature-item th-ani h-100">
                    <div class="feature-item_icon" aria-hidden="true">
                        <i class="fa-solid fa-lightbulb apm-core-value-icon"></i>
                    </div>
                    <div class="media-body">
                        <h3 class="box-title">Innovation</h3>
                        <p class="feature-item_text">We use digital tools and flexible operating models to improve convenience and efficiency.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-3">
                <div class="feature-item th-ani h-100">
                    <div class="feature-item_icon" aria-hidden="true">
                        <i class="fa-solid fa-leaf apm-core-value-icon"></i>
                    </div>
                    <div class="media-body">
                        <h3 class="box-title">Sustainability</h3>
                        <p class="feature-item_text">We support responsible tourism, local value creation and environmentally conscious travel choices.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-3">
                <div class="feature-item th-ani h-100">
                    <div class="feature-item_icon" aria-hidden="true">
                        <i class="fa-solid fa-handshake apm-core-value-icon"></i>
                    </div>
                    <div class="media-body">
                        <h3 class="box-title">Partnership</h3>
                        <p class="feature-item_text">We believe strong supplier and client relationships create better travel experiences.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
