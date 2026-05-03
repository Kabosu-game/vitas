@php
    $path = trim((string) setting('site_logo', 'global'));
    if ($path === '') {
        $src = asset('logo/logo.png');
    } elseif (preg_match('#^https?://#i', $path) || str_starts_with($path, '//')) {
        $src = $path;
    } elseif (str_starts_with($path, '/')) {
        $src = $path;
    } else {
        $rel = ltrim($path, '/');
        $src = asset($rel);
        if ($rel !== '' && ! is_file(public_path($rel)) && ! str_starts_with($rel, 'assets/')) {
            $underAssets = 'assets/'.$rel;
            if (is_file(public_path($underAssets))) {
                $src = asset($underAssets);
            }
        }
    }
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
<img class="{{ $class }}" src="{{ $src }}" alt="{{ strip_tags((string) setting('site_title', 'global')) }}" style="max-height:{{ $maxH }}px;max-width:{{ $maxW }}px;width:auto;height:auto;object-fit:contain;object-position:left center;display:block;" loading="{{ $loading }}" decoding="async">
