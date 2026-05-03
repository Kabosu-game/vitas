@extends('frontend::layouts.auth')
@section('title')
    {{ __('Forgot password') }}
@endsection
@section('content')
    <!-- Login Section -->
    <div class="half-authpage">
        <div class="authOne">
            <div class="auth-contents">
                <div class="logo">
                    <a href="{{ route('home')}}">@include('frontend::include.__brand_logo', ['maxHeight' => 52, 'maxWidth' => 220, 'loading' => 'eager'])</a>
                    <div class="no-user-header">
                        @include('frontend::include.__language_switcher', ['selectId' => 'auth-forgot-lang'])
                        <div class="color-switcher">
                            <img class="light-icon" src="{{ asset('front/images/icons/sun.png') }}" alt="">
                            <img class="dark-icon" src="{{ asset('front/images/icons/moon.png') }}" alt="">
                        </div>
                    </div>
                </div>
                <div class="contents">
                    <div class="content">
                        <h3>{{ $data['title'] }}</h3>

                        @if(session('error'))
                            <div class="error-message">
                                    <p>{{ session('error') }}</p>
                            </div>
                        @endif
                        @if(session('status'))
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <strong>{{ session('status') }}</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                            </div>
                        @endif
                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf
                            <div class="inputs">
                                <label for="">{{ __('Email') }}</label>
                                <input type="email" name="email" value="{{ old('email') }}" class="box-input" required>
                            </div>
                            <div class="inputs">
                                <button type="submit" class="site-btn primary-btn w-100"><i data-lucide="check"></i>{{ __('Reset Password') }}</button>
                            </div>
                        </form>
                        <p>{{ __('Already have an account?') }} <a href="{{ route('login') }}">{{ __('Login here') }}</a></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="authOne">
            <div class="auth-banner" style="background: url('{{ asset($data['right_image']) }}') no-repeat;"></div>
        </div>
    </div>
    <!-- Login Section End -->
@endsection


