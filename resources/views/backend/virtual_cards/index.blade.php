@extends('backend.layouts.app')
@section('title', 'Cartes Virtuelles')
@section('content')
<div class="main-content">
    <div class="page-title">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="title-content">
                        <h2 class="title">Cartes Virtuelles</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">

                {{-- Tabs --}}
                <div class="site-tab-bars mb-3">
                    <ul>
                        @foreach(['all'=>'Toutes','pending'=>'En attente','active'=>'Actives','inactive'=>'Inactives'] as $key => $lbl)
                        <li class="{{ (request('status',$key==='all'?null:$key) === ($key==='all'?null:$key)) && (request('status') === ($key==='all'?null:$key)) ? 'active':'' }}
                            {{ request('status',$key) === $key || ($key==='all' && !request('status')) ? 'active':'' }}">
                            <a href="{{ route('admin.virtual.cards', $key==='all' ? [] : ['status'=>$key]) }}">{{ $lbl }}</a>
                        </li>
                        @endforeach
                    </ul>
                </div>

                <div class="site-table table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Utilisateur</th>
                                <th>Nom titulaire</th>
                                <th>Numéro de carte</th>
                                <th>Expiration</th>
                                <th>CVV</th>
                                <th>Statut</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        @forelse($cards as $card)
                            <tr>
                                <td>{{ $card->created_at->format('d/m/Y H:i') }}</td>
                                <td>
                                    <a href="{{ route('admin.user.edit', $card->user_id) }}" class="link">
                                        {{ $card->user?->full_name ?? $card->user?->username ?? '—' }}
                                    </a>
                                    <div style="font-size:11px;color:#9ca3af">{{ $card->user?->email }}</div>
                                </td>
                                <td>{{ strtoupper($card->cardholder_name ?? '—') }}</td>
                                <td>
                                    @if($card->status->value === 'pending')
                                        <span class="text-muted">En attente</span>
                                    @else
                                        <code>{{ implode(' ', str_split($card->card_number, 4)) }}</code>
                                    @endif
                                </td>
                                <td>
                                    @if($card->status->value === 'pending') —
                                    @else {{ str_pad($card->expiration_month,2,'0',STR_PAD_LEFT) }}/{{ $card->expiration_year }}
                                    @endif
                                </td>
                                <td>
                                    @if($card->status->value === 'pending') —
                                    @else {{ $card->cvc }}
                                    @endif
                                </td>
                                <td>
                                    @if($card->status->value === 'pending')
                                        <span class="badge bg-warning text-dark">En attente</span>
                                    @elseif($card->status->value === 'active')
                                        <span class="badge bg-success">Active</span>
                                    @else
                                        <span class="badge bg-secondary">Inactive</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="d-flex gap-2 flex-wrap">
                                        @if($card->status->value === 'pending')
                                        <form action="{{ route('admin.user.card.approve', $card) }}" method="POST" onsubmit="return confirm('Approuver et activer cette carte ?')">
                                            @csrf
                                            <button class="site-btn success-btn btn-sm" style="font-size:12px;padding:5px 12px">
                                                <i data-lucide="check-circle" style="width:13px;height:13px"></i> Approuver
                                            </button>
                                        </form>
                                        @else
                                        <a href="{{ route('admin.user.card.status.update', $card->card_id) }}"
                                           class="site-btn btn-sm {{ $card->status->value === 'active' ? 'red-btn' : 'primary-btn' }}"
                                           style="font-size:12px;padding:5px 12px">
                                            {{ $card->status->value === 'active' ? 'Désactiver' : 'Activer' }}
                                        </a>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr><td colspan="8" class="text-center py-4">Aucune carte trouvée.</td></tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>

                {{ $cards->links('backend.include.__pagination') }}
            </div>
        </div>
    </div>
</div>
@endsection
