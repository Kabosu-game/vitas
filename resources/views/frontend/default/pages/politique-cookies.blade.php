@extends('frontend::pages.index')
@section('title') {{ __('cookies_title') }} @endsection
@section('meta_keywords') {{ __('cookies_meta_keywords') }} @endsection
@section('meta_description') {{ __('cookies_meta_description') }} @endsection
@section('page-content')
<section class="section-space">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-9">
                <div class="frontend-editor-data">
                    <h3>{{ __('cookies_section1_title') }}</h3>
                    <p>{{ __('cookies_section1_text') }}</p>

                    <h3>{{ __('cookies_section2_title') }}</h3>
                    <h4>{{ __('cookies_section2_1_title') }}</h4>
                    <p>{!! __('cookies_section2_1_text') !!}</p>

                    <h4>{{ __('cookies_section2_2_title') }}</h4>
                    <p>{!! __('cookies_section2_2_text') !!}</p>

                    <h4>{{ __('cookies_section2_3_title') }}</h4>
                    <p>{{ __('cookies_section2_3_text') }}</p>

                    <h4>{{ __('cookies_section2_4_title') }}</h4>
                    <p>{{ __('cookies_section2_4_text') }}</p>

                    <h3>{{ __('cookies_section3_title') }}</h3>
                    <ul>
                        <li><strong>{{ __('cookies_session_cookies') }}</strong></li>
                        <li><strong>{{ __('cookies_persistent_cookies') }}</strong></li>
                        <li><strong>{{ __('cookies_analytics_cookies') }}</strong></li>
                    </ul>

                    <h3>{{ __('cookies_section4_title') }}</h3>
                    <p>{!! __('cookies_section4_text') !!}</p>
                    <ul>
                        <li><a href="https://support.google.com/chrome/answer/95647" target="_blank">{{ __('cookies_chrome') }}</a></li>
                        <li><a href="https://support.mozilla.org/en-US/kb/enhanced-tracking-protection-firefox-windows" target="_blank">{{ __('cookies_firefox') }}</a></li>
                        <li><a href="https://support.apple.com/en-us/guide/safari/sfri11471/mac" target="_blank">{{ __('cookies_safari') }}</a></li>
                        <li><a href="https://support.microsoft.com/en-us/microsoft-edge/delete-cookies-in-microsoft-edge" target="_blank">{{ __('cookies_edge') }}</a></li>
                    </ul>

                    <h3>{{ __('cookies_section5_title') }}</h3>
                    <p>{{ __('cookies_section5_text') }}</p>

                    <h3>{{ __('cookies_section6_title') }}</h3>
                    <p>{!! __('cookies_section6_text') !!}</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
