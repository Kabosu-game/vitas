
<!-- Header area start -->
@php
    $logoSetting = setting('site_logo', 'global');
    $logoSrc = ! empty($logoSetting) ? asset($logoSetting) : asset('logo/logo.png');
    $navCollection = collect($navigations ?? []);
    $navHaystack = function () use ($navCollection) {
        return $navCollection->map(function ($n) {
            $u = $n->page_id ? url($n->url) : $n->url;
            if (! \Illuminate\Support\Str::startsWith($u ?? '', ['http://', 'https://'])) {
                $u = url(ltrim($u ?? '', '/'));
            }

            return strtolower(trim(($n->name ?? '').' '.$u.' '.(parse_url($u, PHP_URL_PATH) ?? '')));
        })->implode(' | ');
    };
    $navCovers = function (array $keywords) use ($navCollection, $navHaystack) {
        if ($navCollection->isEmpty()) {
            return false;
        }
        $hay = $navHaystack();
        foreach ($keywords as $kw) {
            $kw = strtolower((string) $kw);
            if ($kw !== '' && str_contains($hay, $kw)) {
                return true;
            }
        }

        return false;
    };
    $prets = [
        ['label' => __('nav.pret_personnel'), 'slug' => 'pret-personnel'],
        ['label' => __('nav.pret_scolaire'), 'slug' => 'pret-scolaire'],
        ['label' => __('nav.pret_agricole'), 'slug' => 'pret-agricole'],
        ['label' => __('nav.pret_immobilier'), 'slug' => 'pret-immobilier'],
        ['label' => __('nav.pret_auto'), 'slug' => 'pret-auto'],
        ['label' => __('nav.pret_professionnel'), 'slug' => 'pret-professionnel'],
        ['label' => __('nav.pret_urgence'), 'slug' => 'pret-urgence'],
    ];
@endphp
<header>
    <div id="header-sticky" class="header-area header-transparent">
        <div class="container">
            <div class="mega-menu-wrapper position-relative">
                <div class="header-main">
                    <div class="header-left">
                        <div class="header-logo">
                            <a href="{{ route('home') }}">
                                @php
                                    $height = setting('site_logo_height', 'global') == 'auto' ? 'auto' : setting('site_logo_height', 'global').'px';
                                    $width = setting('site_logo_width', 'global') == 'auto' ? 'auto' : setting('site_logo_width', 'global').'px';
                                @endphp
                                <img class="header-brand-logo" src="{{ $logoSrc }}" style="height:{{ $height }};width:{{ $width }};max-width:none;object-fit:contain" alt="{{ setting('site_title', 'global') }}" width="200" height="60" loading="eager" decoding="async">
                            </a>
                        </div>
                    </div>

                    <div class="header-middle">
                        <div class="mean__menu-wrapper d-none d-lg-block">
                            <div class="main-menu">
                                <nav id="mobile-menu">
                                    <ul>
                                        @if($navCollection->isEmpty())
                                            <li @class(['active' => request()->is('/')])>
                                                <a href="{{ route('home') }}">{{ __('nav.main.home') }}</a>
                                            </li>
                                            <li @class(['active' => request()->is('about-us')])>
                                                <a href="{{ url('about-us') }}">{{ __('nav.main.about') }}</a>
                                            </li>
                                            <li class="has-dropdown @if(request()->is('solutions') || request()->is('pret-*')) active @endif">
                                                <a href="{{ url('solutions') }}">{{ __('nav.main.services') }}</a>
                                                <ul class="submenu">
                                                    @foreach ($prets as $p)
                                                        <li><a href="{{ url($p['slug']) }}">{{ $p['label'] }}</a></li>
                                                    @endforeach
                                                </ul>
                                            </li>
                                            <li @class(['active' => request()->is('how-it-works')])>
                                                <a href="{{ url('how-it-works') }}">{{ __('nav.main.how_it_works') }}</a>
                                            </li>
                                            <li @class(['active' => request()->is('faq')])>
                                                <a href="{{ url('faq') }}">{{ __('nav.main.faq') }}</a>
                                            </li>
                                            <li @class(['active' => request()->is('contact')])>
                                                <a href="{{ url('contact') }}">{{ __('nav.main.contact') }}</a>
                                            </li>
                                        @else
                                            @foreach ($navCollection as $navigation)
                                                @php
                                                    $navKey = strtolower(str_replace([' ', '-'], ['_', '_'], $navigation->name));
                                                    $translatedName = match ($navKey) {
                                                        'accueil', 'home' => __('nav.main.home'),
                                                        'à_propos', 'about', 'about_us', 'a_propos', 'apropos', 'a_propos', 'aboutus' => __('nav.main.about'),
                                                        'services', 'solutions', 'our_solutions' => __('nav.main.services'),
                                                        'contact', 'contact_us' => __('nav.main.contact'),
                                                        default => $navigation->tname,
                                                    };

                                                    if (str_contains($navKey, 'propos') || str_contains($navKey, 'about')) {
                                                        $translatedName = __('nav.main.about');
                                                    }
                                                @endphp
                                                @if ($navigation->page_id == null)
                                                    <li @class(['active' => $navigation->url == Request::url()])>
                                                        <a href="{{ $navigation->url }}">{{ $translatedName }}</a>
                                                    </li>
                                                @else
                                                    <li @class(['active' => url($navigation->url) == Request::url()])>
                                                        <a href="{{ url($navigation->url) }}">{{ $translatedName }}</a>
                                                    </li>
                                                @endif
                                                @if ($navigation->url === 'solutions')
                                                    <li class="has-dropdown">
                                                        <a href="javascript:void(0)">{{ __('nav.prets') }}</a>
                                                        <ul class="submenu">
                                                            @foreach ($prets as $p)
                                                                <li><a href="{{ url($p['slug']) }}">{{ $p['label'] }}</a></li>
                                                            @endforeach
                                                        </ul>
                                                    </li>
                                                @endif
                                            @endforeach

                                            @unless ($navCovers(['solutions', 'solution', 'services', 'service']))
                                                <li class="has-dropdown @if(request()->is('solutions') || request()->is('pret-*')) active @endif">
                                                    <a href="{{ url('solutions') }}">{{ __('nav.main.services') }}</a>
                                                    <ul class="submenu">
                                                        @foreach ($prets as $p)
                                                            <li><a href="{{ url($p['slug']) }}">{{ $p['label'] }}</a></li>
                                                        @endforeach
                                                    </ul>
                                                </li>
                                            @endunless

                                            @unless ($navCovers(['how-it-works', 'how it', 'comment']))
                                                <li @class(['active' => request()->is('how-it-works')])>
                                                    <a href="{{ url('how-it-works') }}">{{ __('nav.main.how_it_works') }}</a>
                                                </li>
                                            @endunless

                                            @unless ($navCovers(['faq', 'questions']))
                                                <li @class(['active' => request()->is('faq')])>
                                                    <a href="{{ url('faq') }}">{{ __('nav.main.faq') }}</a>
                                                </li>
                                            @endunless
                                        @endif

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
                                    @if (setting('language_switcher'))
                                        <select name="language" class="langu-swit small" onchange="window.location.href=this.options[this.selectedIndex].value;">
                                            @foreach (\App\Models\Language::where('status', true)->get() as $lang)
                                                <option value="{{ route('language-update', ['name' => $lang->locale]) }}" @selected(app()->getLocale() == $lang->locale || $lang->is_default)>{{ $lang->name }}</option>
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
