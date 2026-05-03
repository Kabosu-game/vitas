@php
    $path = setting('site_logo', 'global');
    $src = ! empty($path) ? asset($path) : asset('logo/logo.png');
    $hRaw = setting('site_logo_height', 'global');
    $wRaw = setting('site_logo_width', 'global');
    $maxH = isset($maxHeight) ? (int) $maxHeight : 52;
    if (is_numeric($hRaw) && (int) $hRaw > 0) {
        $maxH = (int) min(120, max(24, (int) $hRaw));
    }
    $maxW = isset($maxWidth) ? (int) $maxWidth : 220;
    if (is_numeric($wRaw) && (int) $wRaw > 0) {
        $maxW = (int) min(320, max(72, (int) $wRaw));
    }
    $class = $class ?? 'header-brand-logo';
    $loading = $loading ?? 'lazy';
@endphp
<img class="{{ $class }}" src="{{ $src }}" alt="{{ strip_tags((string) setting('site_title', 'global')) }}" style="max-height:{{ $maxH }}px;max-width:{{ $maxW }}px;width:auto;height:auto;object-fit:contain;display:block;" loading="{{ $loading }}" decoding="async">
