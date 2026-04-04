@extends('backend.layouts.app')
@section('title', 'Demandes de Prêt')
@section('content')
<div class="main-content">
    <div class="page-title">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="title-content">
                        <h2 class="title">Demandes de Prêt</h2>
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
                        @foreach(['all'=>'Toutes','pending'=>'En attente','reviewing'=>'En cours','approved'=>'Approuvées','rejected'=>'Rejetées'] as $key => $label)
                        <li class="{{ $status === $key ? 'active' : '' }}">
                            <a href="{{ route('admin.loan-request.index', ['status'=>$key]) }}">
                                {{ $label }} <span class="badge bg-secondary ms-1">{{ $counts[$key] }}</span>
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>

                {{-- Search --}}
                <form method="GET" class="mb-3 d-flex gap-2">
                    <input type="hidden" name="status" value="{{ $status }}">
                    <input type="text" name="search" value="{{ $search }}" class="form-control" style="max-width:300px" placeholder="Rechercher nom, email, référence...">
                    <button class="site-btn primary-btn">Rechercher</button>
                </form>

                <div class="site-table table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Référence</th>
                                <th>Nom</th>
                                <th>Email</th>
                                <th>Type de prêt</th>
                                <th>Montant</th>
                                <th>Durée</th>
                                <th>Date</th>
                                <th>Statut</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @forelse($loanRequests as $item)
                            <tr>
                                <td><code>{{ $item->reference }}</code></td>
                                <td>{{ $item->full_name }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->loan_type }}</td>
                                <td>{{ setting('currency_symbol','global') }}{{ number_format($item->amount, 2) }}</td>
                                <td>{{ $item->duration_months }} mois</td>
                                <td>{{ $item->created_at->format('d/m/Y H:i') }}</td>
                                <td>
                                    @php
                                        $badge = match($item->status) {
                                            'pending'   => 'warning',
                                            'reviewing' => 'info',
                                            'approved'  => 'success',
                                            'rejected'  => 'danger',
                                            default     => 'secondary',
                                        };
                                        $label = match($item->status) {
                                            'pending'   => 'En attente',
                                            'reviewing' => 'En cours',
                                            'approved'  => 'Approuvée',
                                            'rejected'  => 'Rejetée',
                                            default     => $item->status,
                                        };
                                    @endphp
                                    <span class="badge bg-{{ $badge }}">{{ $label }}</span>
                                </td>
                                <td>
                                    <a href="{{ route('admin.loan-request.show', $item) }}" class="site-btn primary-btn btn-sm">
                                        <i data-lucide="eye" style="width:14px;height:14px"></i> Voir
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr><td colspan="9" class="text-center py-4">Aucune demande trouvée.</td></tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
                {{ $loanRequests->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
