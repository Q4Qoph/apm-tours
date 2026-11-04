<footer class="footer-wrapper footer-layout2 apm-site-footer">
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
                            @include('partials.company-introduction')
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
                        @include('partials.contact-details')
                    </div>
                </div>

                <div class="col-md-6 col-xl-auto">
                    <div class="widget footer-widget">
                        <h2 class="widget_title">Follow us on</h2>
                        @include('partials.social-profiles')

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

    <div class="shape-mockup movingX apm-footer-plane d-none d-xxl-block" data-top="24%" data-left="5%">
        <img src="{{ asset('assets/img/shape/shape_8.png') }}" alt="">
    </div>
</footer>
