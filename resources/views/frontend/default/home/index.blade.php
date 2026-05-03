@extends('frontend::layouts.app')
@section('title') {{ __('Home') }} @endsection
@section('meta_keywords') {{ __('home.meta_keywords') }} @endsection
@section('meta_description') {{ __('home.meta_description') }} @endsection

@section('content')
    @include('frontend::home.include.__hero')
    @include('frontend::home.include.__bankingsolution')
    @include('frontend::home.include.__workstepsection')
    @include('frontend::home.include.__pretsection')
    @include('frontend::home.include.__powerfulsection')
    @include('frontend::home.include.__experiencesection')
    @include('frontend::home.include.__faq')
    @include('frontend::home.include.__testimonialsection')
    @include('frontend::home.include.__whychooseus')
    @include('frontend::home.include.__cta')
@endsection
