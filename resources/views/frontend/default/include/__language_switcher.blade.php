@php
    $switcherLangs = collect();
    try {
        if (\Illuminate\Support\Facades\Schema::hasTable('languages')) {
            $switcherLangs = \App\Models\Language::query()->where('status', true)->orderBy('name')->get();
        }
    } catch (\Throwable $e) {
        $switcherLangs = collect();
    }
    $switcherPermission = filter_var(setting('language_switcher', 'permission'), FILTER_VALIDATE_BOOLEAN);
    $showLanguageSwitcher = $switcherLangs->isNotEmpty() && ($switcherLangs->count() > 1 || $switcherPermission);
    $selectId = $selectId ?? 'lang-select';
    $selectClass = trim('langu-swit small '.($selectClass ?? ''));
@endphp
@if ($showLanguageSwitcher)
    <div class="{{ trim('language-switcher '.($wrapperClass ?? '')) }}">
        <label class="visually-hidden" for="{{ $selectId }}">{{ __('Language') }}</label>
        <select id="{{ $selectId }}" name="language" class="{{ $selectClass }}" title="{{ __('Language') }}" aria-label="{{ __('Language') }}" onchange="window.location.href=this.options[this.selectedIndex].value;">
            @foreach ($switcherLangs as $lang)
                <option value="{{ route('language-update', ['name' => $lang->locale]) }}" @selected(app()->getLocale() == $lang->locale || $lang->is_default)>{{ $lang->name }}</option>
            @endforeach
        </select>
    </div>
@endif
