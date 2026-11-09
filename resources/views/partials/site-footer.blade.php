<footer class="footer-wrapper footer-layout2 apm-site-footer">
    <div class="widget-area">
        <div class="container">
            <div class="row apm-footer-grid">
                <div class="col-md-6 col-xl-3 apm-footer-brand">
                    <div class="widget footer-widget">
                        <div class="th-widget-about">
                            <div class="about-logo">
                                <a href="{{ route('home') }}">
                                    <img src="{{ asset('assets/img/brand/apm-footer-logo.png') }}" alt="A&amp;PM Tours &amp; Travel" width="1254" height="1254" loading="lazy">
                                </a>
                            </div>
                            @include('partials.company-introduction')
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-xl-2">
                    <div class="widget widget_nav_menu footer-widget">
                        <h2 class="widget_title" id="footer-explore-heading">Explore</h2>
                        <nav aria-labelledby="footer-explore-heading">
                            <ul class="menu">
                                @include('partials.site-nav-items')
                            </ul>
                        </nav>
                    </div>
                </div>

                <div class="col-md-6 col-xl-4">
                    <div class="widget footer-widget">
                        <h2 class="widget_title">Get In Touch</h2>
                        @include('partials.contact-details', ['showWhatsApp' => false, 'showWebsite' => false])
                    </div>
                </div>

                <div class="col-md-6 col-xl-3">
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
            <div class="apm-footer-bottom">
                <p class="copyright-text">&copy; {{ date('Y') }} <a href="{{ route('home') }}">A&amp;PM Tours &amp; Travel</a>. All Rights Reserved.</p>
                <nav aria-label="Legal and policies">
                    <ul class="apm-footer-policies">
                        <li><a href="{{ route('terms') }}">Terms &amp; Conditions</a></li>
                        <li><a href="{{ route('privacy') }}">Privacy Policy</a></li>
                        <li><a href="{{ route('cookies') }}">Cookies Policy</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>

    <div class="shape-mockup movingX apm-footer-plane d-none d-xxl-block" data-top="24%" data-left="5%">
        <img src="{{ asset('assets/img/shape/shape_8.png') }}" alt="">
    </div>
</footer>
