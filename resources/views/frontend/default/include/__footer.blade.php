@if(!Route::is('home'))
@include('frontend::home.include.__cta')
@endif

<!-- Footer area start -->
<footer>
    <div class="footer-area footer-primary position-relative z-index-1 include-bg"
        data-background="{{ asset('/') }}/front/images/bg/footer-ring.png">
        <div class="container">
            <div class="footer-main">
                <div class="row gy-50">

                    {{-- Col 1 : Logo + description + newsletter --}}
                    <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6">
                        <div class="footer-widget-1-1">
                            @php
                                $height = setting('site_logo_height','global') == 'auto' ? 'auto' : setting('site_logo_height','global').'px';
                                $width  = setting('site_logo_width','global')  == 'auto' ? 'auto' : setting('site_logo_width','global').'px';
                            @endphp
                            <div class="footer-logo mb-20">
                                <a href="{{ route('home') }}">
                                    <img src="{{ asset('logo/logo.png') }}" style="height:{{ $height }};width:{{ $width }};max-width:none" alt="Eurovitas Finanzen">
                                </a>
                            </div>
                            <div class="footer-content">
                                <p>{{ __('footer_description') }}</p>
                                <div class="footer-trust-badges mt-20">
                                    <span class="trust-badge"><i class="fa-solid fa-shield-halved"></i> {{ __('footer_badge_acpr') }}</span>
                                    <span class="trust-badge"><i class="fa-solid fa-lock"></i> {{ __('footer_badge_ssl') }}</span>
                                    <span class="trust-badge"><i class="fa-solid fa-award"></i> {{ __('footer_badge_rgpd') }}</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Col 2 : Pages principales --}}
                    <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-6 col-sm-6">
                        <div class="footer-widget-1-2">
                            <div class="footer-widget-title"><h5>{{ __('footer_nav_title') }}</h5></div>
                            <div class="footer-link">
                                <ul>
                                    <li><a href="{{ route('home') }}">{{ __('footer_nav_home') }}</a></li>
                                    <li><a href="{{ url('about-us') }}">{{ __('footer_nav_about') }}</a></li>
                                    <li><a href="{{ url('solutions') }}">{{ __('footer_nav_services') }}</a></li>
                                    <li><a href="{{ url('faq') }}">{{ __('footer_nav_faq') }}</a></li>
                                    <li><a href="{{ url('contact') }}">{{ __('footer_nav_contact') }}</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    {{-- Col 3 : Prêts --}}
                    <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-6 col-sm-6">
                        <div class="footer-widget-1-3">
                            <div class="footer-widget-title"><h5>{{ __('footer_loans_title') }}</h5></div>
                            <div class="footer-link">
                                <ul>
                                    <li><a href="{{ url('pret-personnel') }}">{{ __('nav.pret_personnel') }}</a></li>
                                    <li><a href="{{ url('pret-scolaire') }}">{{ __('nav.pret_scolaire') }}</a></li>
                                    <li><a href="{{ url('pret-agricole') }}">{{ __('nav.pret_agricole') }}</a></li>
                                    <li><a href="{{ url('pret-immobilier') }}">{{ __('nav.pret_immobilier') }}</a></li>
                                    <li><a href="{{ url('pret-auto') }}">{{ __('nav.pret_auto') }}</a></li>
                                    <li><a href="{{ url('pret-professionnel') }}">{{ __('nav.pret_professionnel') }}</a></li>
                                    <li><a href="{{ url('pret-urgence') }}">{{ __('nav.pret_urgence') }}</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    {{-- Col 4 : Légal + Contact --}}
                    <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-6 col-sm-6">
                        <div class="footer-widget-1-4">
                            <div class="footer-widget-title"><h5>{{ __('footer_legal_title') }}</h5></div>
                            <div class="footer-link">
                                <ul>
                                    <li><a href="{{ url('privacy-policy') }}">{{ __('footer_legal_privacy') }}</a></li>
                                    <li><a href="{{ url('terms-and-conditions') }}">{{ __('footer_legal_terms') }}</a></li>
                                    <li><a href="{{ url('politique-cookies') }}">{{ __('footer_legal_cookies') }}</a></li>
                                    <li><a href="{{ url('mentions-legales') }}">{{ __('footer_legal_mentions') }}</a></li>
                                    <li><a href="{{ url('protection-donnees') }}">{{ __('footer_legal_rgpd') }}</a></li>
                                </ul>
                            </div>
                            <div class="footer-widget-title mt-30"><h5>{{ __('footer_contact_title') }}</h5></div>
                            <div class="footer-contact">
                                <div class="footer-info">
                                    <div class="footer-info-item mb-10">
                                        <div class="footer-info-icon"><span><i class="fa-solid fa-envelope"></i></span></div>
                                        <div class="footer-info-text"><span><a href="mailto:contact@eurovitas.de">contact@eurovitas.de</a></span></div>
                                    </div>
                                    <div class="footer-info-item">
                                        <div class="footer-info-icon"><span><i class="fa-solid fa-phone"></i></span></div>
                                        <div class="footer-info-text"><span>+34669877781</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            {{-- Bottom bar --}}
            <div class="row">
                <div class="col-12">
                    <div class="footer-bottom">
                        <div class="footer-copyright">
                            <p>{{ __('footer_copyright') }} — <a href="{{ url('mentions-legales') }}" style="color:inherit;text-decoration:underline;">{{ __('footer_legal_mentions') }}</a></p>
                        </div>
                        <div class="footer-social">
                            @foreach(\App\Models\Social::all() as $social)
                            <a href="{{ url($social->url) }}"><i class="{{ $social->class_name }}"></i></a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer-shapes">
            <div class="shape-one"><img src="{{ asset('/') }}/front/images/shapes/footer/shape-01.png" alt=""></div>
            <div class="shape-two"><img src="{{ asset('/') }}/front/images/shapes/footer/shape-02.png" alt=""></div>
        </div>
    </div>
</footer>
<!-- Footer area end -->

<style>
.footer-trust-badges { display:flex; flex-wrap:wrap; gap:8px; margin-top:16px; }
.trust-badge { display:inline-flex; align-items:center; gap:5px; font-size:11px; font-weight:600; background:rgba(255,255,255,.08); border:1px solid rgba(255,255,255,.15); color:rgba(255,255,255,.8); padding:4px 10px; border-radius:20px; }
.trust-badge i { font-size:10px; color:#10b981; }
.mt-20 { margin-top:20px; }
.mt-25 { margin-top:25px; }
.mt-30 { margin-top:30px; }
.mb-10 { margin-bottom:10px; }
</style>
