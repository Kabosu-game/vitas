@extends('frontend::layouts.auth')

@section('title')
    {{ __('Finish Up') }}
@endsection

@section('content')
    <!-- Register Section -->
    <div class="half-authpage">
        <div class="authOne">
            <div class="auth-contents">
                <div class="logo">
                    <a href="{{ route('home')}}">@include('frontend::include.__brand_logo', ['maxHeight' => 52, 'maxWidth' => 220, 'loading' => 'eager'])</a>
                    <div class="no-user-header">
                        @include('frontend::include.__language_switcher', ['selectId' => 'auth-final-lang'])
                        <div class="color-switcher">
                            <img class="light-icon" src="{{ asset('front/images/icons/sun.png') }}" alt="">
                            <img class="dark-icon" src="{{ asset('front/images/icons/moon.png') }}" alt="">
                        </div>
                    </div>
                </div>
                <div class="contents">
                    <div class="content finish-wrapper">
                        <h3 class="centered">
                            @if(setting('referral_signup_bonus','permission'))
                            {{ __('Congratulations! You have earned :bonus by signing up.',['bonus' => $currencySymbol.setting('signup_bonus','fee')]) }}
                            @else
                            {{ __('Congratulations! You made it.') }}
                            @endif
                        </h3>
                        <div class="inputs centered">
                            <a href="{{ route('user.dashboard') }}" class="site-btn primary-btn"><i data-lucide="inbox"></i>{{ __('Go to Dashboard') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Register Section End -->
@endsection

@push('js')
<script type="text/javascript" src="{{ asset('front/js/confetti.min.js') }}"></script>
<script>
    'use strict';

    // start
    const start = () => {
        setTimeout(function() {
            confetti.start()
        }, 1000); // 1000 is time that after 1 second start the confetti ( 1000 = 1 sec)
    };

    start();
</script>
@endpush
