@extends('frontend::layouts.auth')
@section('title')
    {{ __('Reset Password') }}
@endsection
@section('content')
    <!-- Login Section -->
    <div class="half-authpage">
        <div class="authOne">
            <div class="auth-contents">
                <div class="logo">
                    <a href="{{ route('home') }}">@include('frontend::include.__brand_logo', ['maxHeight' => 52, 'maxWidth' => 220, 'loading' => 'eager'])</a>
                    <div class="no-user-header">
                        @include('frontend::include.__language_switcher', ['selectId' => 'auth-reset-lang'])
                        <div class="color-switcher">
                            <img class="light-icon" src="{{ asset('front/images/icons/sun.png') }}" alt="">
                            <img class="dark-icon" src="{{ asset('front/images/icons/moon.png') }}" alt="">
                        </div>
                    </div>
                </div>
                <div class="contents">
                    <div class="content">
                        <h3>{{ __('Reset Password') }}</h3>
                        @if ($errors->any())
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                @foreach ($errors->all() as $error)
                                    <strong>{{ $error }}</strong>
                                @endforeach
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif
                        <form method="POST" action="{{ route('password.update') }}">
                            @csrf
                            <!-- Password Reset Token -->
                            <input type="hidden" name="token" value="{{ $request->route('token') }}">

                            <div class="inputs">
                                <label for="">{{ __('Email Address') }}</label>
                                <input type="email" name="email" value="{{ old('email', $request->email) }}"
                                    class="box-input" required>
                            </div>

                            <div class="inputs">
                                <label for="">{{ __('New Password') }}</label>
                                <input type="password" name="password" class="box-input" required>
                            </div>
                            <div class="inputs">
                                <label for="">{{ __('Confirm Password') }}</label>
                                <input type="password" name="password_confirmation" class="box-input" required>
                            </div>

                            <div class="inputs">
                                <button type="submit" class="site-btn primary-btn w-100"><i
                                        data-lucide="check"></i>{{ __('Reset Password') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Login Section End -->
@endsection
