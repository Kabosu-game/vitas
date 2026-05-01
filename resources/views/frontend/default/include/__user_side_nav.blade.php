<aside class="user-sidebar">
    @php
        $height = setting('site_logo_height','global') == 'auto' ? 'auto' : setting('site_logo_height','global').'px';
        $width = setting('site_logo_width','global') == 'auto' ? 'auto' : setting('site_logo_width','global').'px';
    @endphp
    <div class="site-logo">
        <a href="{{route('home')}}" class="logo"><img src="{{ asset('logo/logo.png') }}" style="height:{{ $height }};width:{{ $width }};max-width:none" alt="{{ auth()->user()->full_name }}"></a>
    </div>
    @php
        $loan_running = loanRunning();
        $ticket_running = App\Models\Ticket::Opened()->where('user_id',auth()->id())->count();
        $navigations = App\Models\UserNavigation::orderBy('position')->get();
    @endphp
    <nav class="user-nav">
        <ul>
            @foreach ($navigations as $navigation)
                @if ($navigation->type == 'cards' && setting('virtual_card', 'permission'))
                    @include('frontend::include.__menu-item',['navigation' => $navigation])
                @elseif ($navigation->type == 'wallets' && setting('multiple_currency', 'permission'))
                    @include('frontend::include.__menu-item',['navigation' => $navigation])
                @elseif ($navigation->type == 'loan' && setting('user_loan', 'permission') && auth()->user()->loan_status)
                    {{-- Loan menu disabled --}}
                    {{-- @include('frontend::include.__menu-item',['navigation' => $navigation]) --}}
                @elseif ($navigation->type == 'deposit' && setting('user_deposit', 'permission') && auth()->user()->deposit_status)
                    @include('frontend::include.__menu-item',['navigation' => $navigation])
                @elseif ($navigation->type == 'withdraw' && setting('user_withdraw', 'permission') && auth()->user()->withdraw_status)
                    @include('frontend::include.__menu-item',['navigation' => $navigation])
                @elseif ($navigation->type == 'dashboard' || $navigation->type == 'support' || $navigation->type == 'transactions' || $navigation->type == 'settings' || $navigation->type == 'logout')
                    @include('frontend::include.__menu-item',['navigation' => $navigation])
                @endif
            @endforeach
        </ul>
    </nav>
</aside>
