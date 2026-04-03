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
                                    <img src="{{ asset('logo/logo.png') }}" style="height:{{ $height }};width:{{ $width }};max-width:none" alt="Eurovitas">
                                </a>
                            </div>
                            <div class="footer-content">
                                <p>Eurovitas est une plateforme européenne de prêt en ligne agréée ACPR, fondée sur la transparence, la rapidité et la confiance. Vos projets méritent un financement à la hauteur.</p>
                                <div class="footer-trust-badges mt-20">
                                    <span class="trust-badge"><i class="fa-solid fa-shield-halved"></i> ACPR agréé</span>
                                    <span class="trust-badge"><i class="fa-solid fa-lock"></i> SSL 256 bits</span>
                                    <span class="trust-badge"><i class="fa-solid fa-award"></i> RGPD conforme</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Col 2 : Pages principales --}}
                    <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-6 col-sm-6">
                        <div class="footer-widget-1-2">
                            <div class="footer-widget-title"><h5>Navigation</h5></div>
                            <div class="footer-link">
                                <ul>
                                    <li><a href="{{ route('home') }}">Accueil</a></li>
                                    <li><a href="{{ url('about-us') }}">À propos</a></li>
                                    <li><a href="{{ url('solutions') }}">Services</a></li>
                                    <li><a href="{{ url('faq') }}">FAQ</a></li>
                                    <li><a href="{{ url('contact') }}">Contact</a></li>
                                    <li><a href="{{ url('loan-calculator') }}">Simulateur</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    {{-- Col 3 : Prêts --}}
                    <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-6 col-sm-6">
                        <div class="footer-widget-1-3">
                            <div class="footer-widget-title"><h5>{{ __('Nos Prêts') }}</h5></div>
                            <div class="footer-link">
                                <ul>
                                    <li><a href="{{ url('pret-personnel') }}">{{ __('Prêt Personnel') }}</a></li>
                                    <li><a href="{{ url('pret-scolaire') }}">{{ __('Prêt Scolaire') }}</a></li>
                                    <li><a href="{{ url('pret-agricole') }}">{{ __('Prêt Agricole') }}</a></li>
                                    <li><a href="{{ url('pret-immobilier') }}">{{ __('Prêt Immobilier') }}</a></li>
                                    <li><a href="{{ url('pret-auto') }}">{{ __('Prêt Auto') }}</a></li>
                                    <li><a href="{{ url('pret-professionnel') }}">{{ __('Prêt Professionnel') }}</a></li>
                                    <li><a href="{{ url('pret-urgence') }}">{{ __('Prêt d\'Urgence') }}</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    {{-- Col 4 : Légal + Contact --}}
                    <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-6 col-sm-6">
                        <div class="footer-widget-1-4">
                            <div class="footer-widget-title"><h5>Informations légales</h5></div>
                            <div class="footer-link">
                                <ul>
                                    <li><a href="{{ url('privacy-policy') }}">Politique de confidentialité</a></li>
                                    <li><a href="{{ url('terms-and-conditions') }}">Conditions générales</a></li>
                                    <li><a href="{{ url('politique-cookies') }}">Politique de cookies</a></li>
                                    <li><a href="{{ url('mentions-legales') }}">Mentions légales</a></li>
                                    <li><a href="{{ url('protection-donnees') }}">Protection des données (RGPD)</a></li>
                                </ul>
                            </div>
                            <div class="footer-widget-title mt-30"><h5>Contact</h5></div>
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
                            <p>Copyright © Eurovitas 2026. Tous droits réservés. — Eurovitas SAS, établissement de crédit agréé ACPR n° CIB 17489 — <a href="{{ url('mentions-legales') }}" style="color:inherit;text-decoration:underline;">Mentions légales</a></p>
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
