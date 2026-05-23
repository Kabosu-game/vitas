<!DOCTYPE html>
@php
    $isRtl = isRtl(app()->getLocale());
@endphp
<html lang="{{ app()->getLocale() }}" @if($isRtl) dir="rtl" @endif>
@include('frontend::include.__head')
<body @class([
    'rtl_mode' => $isRtl
])>
    <!--Notification-->
    @include('global._notify')

    @yield('content')

    @include('frontend::include.__script')
</body>
</html>


