
<!-- Header area start -->
<header>
    <div id="header-sticky" class="header-area header-transparent">
        <div class="container">
            <div class="mega-menu-wrapper position-relative">
                <div class="header-main">
                    <div class="header-left">
                        <div class="header-logo">
                            <a href="{{ route('home') }}">
                                @php
                                    $height = setting('site_logo_height','global') == 'auto' ? 'auto' : setting('site_logo_height','global').'px';
                                    $width = setting('site_logo_width','global') == 'auto' ? 'auto' : setting('site_logo_width','global').'px';
                                @endphp
                                <img class="logo-white" src="{{ asset('logo/logo.png') }}" style="height:{{ $height }};width:{{ $width }};max-width:none" alt="{{ setting('site_title','global') }}">
                            </a>
                        </div>
                    </div>

                    <div class="header-middle">
                        <div class="mean__menu-wrapper d-none d-lg-block">
                            <div class="main-menu">
                                <nav id="mobile-menu">
                                    <ul>
                                        @php
                                        $prets = [
                                            ['label'=>__('nav.pret_personnel'),    'slug'=>'pret-personnel'],
                                            ['label'=>__('nav.pret_scolaire'),     'slug'=>'pret-scolaire'],
                                            ['label'=>__('nav.pret_agricole'),     'slug'=>'pret-agricole'],
                                            ['label'=>__('nav.pret_immobilier'),   'slug'=>'pret-immobilier'],
                                            ['label'=>__('nav.pret_auto'),         'slug'=>'pret-auto'],
                                            ['label'=>__('nav.pret_professionnel'),'slug'=>'pret-professionnel'],
                                            ['label'=>__('nav.pret_urgence'),      'slug'=>'pret-urgence'],
                                        ];
                                        @endphp
                                        @foreach(($navigations ?? collect()) as $navigation)
                                            @php
                                                $navKey = strtolower(str_replace([' ', '-'], ['_', '_'], $navigation->name));
                                                $translatedName = match($navKey) {
                                                    'accueil', 'home' => __('nav.main.home'),
                                                    'à_propos', 'about', 'about_us', 'a_propos', 'apropos', 'a_propos', 'aboutus' => __('nav.main.about'),
                                                    'services', 'solutions', 'our_solutions' => __('nav.main.services'),
                                                    'contact', 'contact_us' => __('nav.main.contact'),
                                                    default => $navigation->tname
                                                };
                                                
                                                // Additional fallback for About menu
                                                if (str_contains($navKey, 'propos') || str_contains($navKey, 'about')) {
                                                    $translatedName = __('nav.main.about');
                                                }
                                            @endphp
                                            @if($navigation->page_id == null)
                                            <li @class(['active' => $navigation->url == Request::url()])>
                                                <a href="{{ $navigation->url }}">{{ $translatedName }}</a>
                                            </li>
                                            @else
                                            <li @class(['active' => url($navigation->url) == Request::url()])>
                                                <a href="{{ url($navigation->url) }}">{{ $translatedName }}</a>
                                            </li>
                                            @endif
                                            @if(($navigation->url === 'solutions'))
                                            <li class="has-dropdown">
                                                <a href="javascript:void(0)">{{ __('nav.prets') }}</a>
                                                <ul class="submenu">
                                                    @foreach($prets as $p)
                                                    <li><a href="{{ url($p['slug']) }}">{{ $p['label'] }}</a></li>
                                                    @endforeach
                                                </ul>
                                            </li>
                                            @endif
                                        @endforeach
                                        <li>
                                            <a href="{{ route('loan-request.create') }}">{{ __('nav.loan_request') }}</a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <div class="header-right">
                        <div class="header-action">
                            <div class="quick-use">
                                <div class="language-switcher">
                                    @if(setting('language_switcher'))
                                    <select name="language" class="langu-swit small" onchange="window.location.href=this.options[this.selectedIndex].value;">
                                        @foreach(\App\Models\Language::where('status',true)->get() as $lang)
                                            <option value="{{ route('language-update',['name'=> $lang->locale]) }}" @selected(app()->getLocale() == $lang->locale || $lang->is_default)>{{$lang->name}}</option>
                                        @endforeach
                                    </select>
                                    @endif
                                </div>
                                <div class="color-switcher">
                                    <img class="light-icon" src="{{ asset('/front/images/icons/sun.png') }}" alt="">
                                    <img class="dark-icon" src="{{ asset('/front/images/icons/moon.png') }}" alt="">
                                </div>
                            </div>

                            <div class="header-btn-wrap d-none d-xl-inline-flex">
                                @auth('web')
                                <a class="gradient-btn" href="{{ route('user.dashboard') }}">
                                    <span><i data-lucide="layout-dashboard"></i></span>
                                    {{ __('Dashboard') }}
                                </a>
                                @else
                                    <a class="td-primary-btn" href="{{ route('register') }}">
                                        <span><i data-lucide="user-round-plus"></i></span>
                                        {{ __('Sign Up') }}
                                    </a>
                                    <a class="gradient-btn" href="{{ route('login') }}">
                                        <span><i data-lucide="circle-user-round"></i></span>
                                        {{ __('Log In') }}
                                    </a>
                                @endauth
                            </div>
                            <div class="header-hamburger ml-20 d-xl-none">
                                <div class="sidebar-toggle">
                                    <a class="bar-icon" href="javascript:void(0)">
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Header area end -->
