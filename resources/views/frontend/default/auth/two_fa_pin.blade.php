@extends('frontend::layouts.auth')
@section('title')
    {{ __('2FA Security') }}
@endsection
@section('content')
    <div class="half-authpage">
        <div class="authOne">
            <div class="auth-contents">
                <div class="logo">
                    <a href="{{ route('home')}}">@include('frontend::include.__brand_logo', ['maxHeight' => 52, 'maxWidth' => 220, 'loading' => 'eager'])</a>
                    <div class="no-user-header">
                        @include('frontend::include.__language_switcher', ['selectId' => 'auth-2fa-lang'])
                        <div class="color-switcher">
                            <img class="light-icon" src="{{ asset('front/images/icons/sun.png') }}" alt="">
                            <img class="dark-icon" src="{{ asset('front/images/icons/moon.png') }}" alt="">
                        </div>
                    </div>
                </div>
                <div class="contents">
                    <div class="content">
                        <h3>{{ __('2FA Security') }}</h3>
                        @if ($errors->any())
                            <div class="error-message">
                                @foreach($errors->all() as $error)
                                    <p>{{$error}}</p>
                                @endforeach
                            </div>
                        @endif
                        <form method="POST" action="{{ route('user.setting.2fa.verify') }}">
                            @csrf
                            <div class="inputs">
                                <p>
                                    {{ __('Please enter the') }}
                                        <strong>{{ __('OTP') }}</strong> {{ __('generated on your Authenticator App.') }}
                                        <br> {{ __('Ensure you submit the current one because it refreshes every 30 seconds.') }}
                                </p>
                                <label for="">
                                    {{ __('One Time Password') }}
                                </label>
                                <input type="password" class="box-input" name="one_time_password" autofocus placeholder="One Time Password" required>
                            </div>

                            <div class="inputs">
                                <button type="submit" class="site-btn primary-btn w-100"><i data-lucide="key"></i>
                                    {{ __('Authenticate Now') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="authOne">
            <div class="auth-banner"
                 style="background: url('{{ asset(getPageSetting('breadcrumb')) }}') no-repeat;"></div>
        </div>
    </div>
@endsection


