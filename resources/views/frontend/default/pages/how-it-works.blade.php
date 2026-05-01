@extends('frontend::pages.index')
@section('title') {{ __('How It Works') }} @endsection

@section('page-content')
    @include('frontend::home.include.__workstepsection')
    @include('frontend::home.include.__powerfulsection')
    @include('frontend::home.include.__whychooseus')
    @include('frontend::home.include.__cta')
@endsection
