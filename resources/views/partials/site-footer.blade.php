<footer class="footer-wrapper bg-title footer-layout2">
    <div class="widget-area">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-md-6 col-xl-3">
                    <div class="widget footer-widget">
                        <div class="th-widget-about">
                            <div class="about-logo">
                                <a href="{{ route('home') }}">
                                    <img src="{{ asset('assets/img/brand/apm-footer-logo.png') }}" alt="A&amp;PM Tours &amp; Travel" style="width: 180px; height: auto; max-width: 100%;">
                                </a>
                            </div>
                            <p class="about-text">A&amp;PM Tours Ltd, branded as A&amp;PM Tours &amp; Travel Ltd, plans and coordinates journeys in Kenya, East Africa and beyond.</p>
                            <p class="about-text">Plan with confidence. Travel with purpose. Experience more.</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-xl-auto">
                    <div class="widget widget_nav_menu footer-widget">
                        <h2 class="widget_title">Quick Links</h2>
                        <div class="menu-all-pages-container">
                            <ul class="menu">
                                <li><a href="{{ route('home') }}">Home</a></li>
                                <li><a href="{{ route('about') }}">About Us</a></li>
                                <li><a href="{{ route('services') }}">Services</a></li>
                                <li><a href="{{ route('activities') }}">Activities</a></li>
                                <li><a href="{{ route('destinations') }}">Destinations</a></li>
                                <li><a href="{{ route('tours') }}">Tours</a></li>
                                <li><a href="{{ route('blog') }}">Blog</a></li>
                                <li><a href="{{ route('gallery') }}">Gallery</a></li>
                                <li><a href="{{ route('faq') }}">FAQs</a></li>
                                <li><a href="{{ route('contact') }}">Contact</a></li>
                                <li><a href="{{ route('terms') }}">Terms &amp; Conditions</a></li>
                                <li><a href="{{ route('privacy') }}">Privacy Policy</a></li>
                                <li><a href="{{ route('cookies') }}">Cookies Policy</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-xl-auto">
                    <div class="widget footer-widget">
                        <h2 class="widget_title">Get In Touch</h2>
                        <div class="th-widget-contact">
                            <div class="info-box_text">
                                <div class="icon"><img src="{{ asset('assets/img/icon/phone.svg') }}" alt=""></div>
                                <div class="details">
                                    <p><a href="tel:+254788799517" class="info-box_link">+254 788 799 517</a></p>
                                    <p><a href="https://wa.me/254788799517" class="info-box_link">WhatsApp A&amp;PM</a></p>
                                </div>
                            </div>
                            <div class="info-box_text">
                                <div class="icon"><img src="{{ asset('assets/img/icon/envelope.svg') }}" alt=""></div>
                                <div class="details">
                                    <p><a href="mailto:reservations@apmtours.com" class="info-box_link">reservations@apmtours.com</a></p>
                                    <p><a href="https://apmtours.com" class="info-box_link">apmtours.com</a></p>
                                </div>
                            </div>
                            <div class="info-box_text">
                                <div class="icon"><img src="{{ asset('assets/img/icon/location-dot.svg') }}" alt=""></div>
                                <div class="details">
                                    <p>P.O. Box 9820 - 00200, Nairobi</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-xl-auto">
                    <div class="widget footer-widget">
                        <h2 class="widget_title">Social Media</h2>
                        <div class="th-widget-contact">
                            <div class="info-box_text">
                                <div class="details">
                                    <p><strong>Instagram &amp; X</strong></p>
                                    <p>@APMTours</p>
                                </div>
                            </div>
                            <div class="info-box_text">
                                <div class="details">
                                    <p><strong>Facebook &amp; LinkedIn</strong></p>
                                    <p>APMTours</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="copyright-wrap">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <p class="copyright-text">Copyright {{ date('Y') }} <a href="{{ route('home') }}">A&amp;PM Tours &amp; Travel</a>. All Rights Reserved.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="shape-mockup movingX d-none d-xxl-block" data-top="24%" data-left="5%">
        <img src="{{ asset('assets/img/shape/shape_8.png') }}" alt="">
    </div>
</footer>
