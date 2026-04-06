@extends('frontend::layouts.auth')
@section('title')
    {{ __('Verify Email') }}
@endsection
@section('content')
<section class="td-authentication-section">
    <div class="container">
        <div class="auth-main-grid">
            <div class="auth-main-from">
            <div class="auth-from-inner">
                <div class="auth-from-top-content">
                    <h3 class="title">{{ __('Email Verification') }}</h3>
                </div>
                <div class="auth-from-box">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $error)
                                <p>{{ $error }}</p>
                            @endforeach
                        </div>
                    @endif

                    @if (session('status') === 'verification-link-sent')
                        <div class="alert alert-success">
                            <p>{{ __('A new verification code has been sent to the email address you provided during registration.') }}</p>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('verification.otp.verify') }}">
                        @csrf
                        <div class="row gy-24">
                            <div class="col-xxl-12">
                                <div class="single-floating-input">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="code" name="code" value="{{ old('code') }}" placeholder="{{ __('Verification Code') }}" required autofocus>
                                        <label for="code">{{ __('Verification Code') }}</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="auth-bottom-content">
                            <div class="auth-from-btn-wrap">
                                <button type="submit" class="site-btn gdt-btn w-100">{{ __('Verify') }}</button>
                            </div>
                        </div>
                    </form>

                    <form method="POST" action="{{ route('verification.send') }}">
                        @csrf
                        <div class="auth-bottom-content">
                            <div class="auth-from-btn-wrap">
                               <button type="submit" class="site-btn gdt-btn w-100">{{ __('Resend the code') }}</button>
                            </div>
                            <div class="auth-account">
                               <p class="description">{{ __('Already have an account?') }} <a class="link" href="{{ route('login') }}">{{ __('Login') }}</a></p>
                            </div>
                         </div>
                    </form>
                </div>
            </div>
            </div>
            <div class="auth-thumb-wrapper">
                <div class="auth-sing-in-thumb">
                    <img src="{{ asset(getPageSetting('breadcrumb')) }}" alt="auth-banner">
                </div>
            </div>
        </div>
    </div>
</section>
@endsection



