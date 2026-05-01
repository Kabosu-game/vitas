<li @class([
    'active' => request()->url() == url($navigation->url),
    'logout' => $navigation->type == 'logout',
])>
    <a href="{{ url($navigation->url) }}">
        <i data-lucide="{{ $navigation->icon }}"></i>
        <span>{{ $navigation->getTranslatedName() }}</span>
        @if($navigation->type == 'loan' && $loan_running > 0)
            <b class="count-number">{{ $loan_running }}</b>
        @elseif($navigation->type == 'support' && $ticket_running > 0)
            <b class="count-number">{{ $ticket_running }}</b>
        @endif
    </a>
</li>
