@extends('backend.layouts.app')
@section('title', 'Demande #'.$loanRequest->reference)
@section('content')
<div class="main-content">
    <div class="page-title">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col">
                    <div class="title-content">
                        <a href="{{ route('admin.loan-request.index') }}" class="me-2">
                            <i data-lucide="arrow-left"></i>
                        </a>
                        <h2 class="title d-inline">Demande {{ $loanRequest->reference }}</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row g-4">

            {{-- Détails de la demande --}}
            <div class="col-xl-7">
                <div class="site-card">
                    <div class="site-card-header">
                        <h4>Informations du demandeur</h4>
                        @php
                            $badge = match($loanRequest->status) {
                                'pending'   => 'warning',
                                'reviewing' => 'info',
                                'approved'  => 'success',
                                'rejected'  => 'danger',
                                default     => 'secondary',
                            };
                            $label = match($loanRequest->status) {
                                'pending'   => 'En attente',
                                'reviewing' => 'En cours',
                                'approved'  => 'Approuvée',
                                'rejected'  => 'Rejetée',
                                default     => $loanRequest->status,
                            };
                        @endphp
                        <span class="badge bg-{{ $badge }} fs-6">{{ $label }}</span>
                    </div>
                    <div class="site-card-body">
                        <table class="table table-borderless">
                            <tr><th style="width:200px">Civilité</th><td>{{ $loanRequest->civility }}</td></tr>
                            <tr><th>Prénom</th><td>{{ $loanRequest->first_name }}</td></tr>
                            <tr><th>Nom</th><td>{{ $loanRequest->last_name }}</td></tr>
                            <tr><th>Email</th><td>{{ $loanRequest->email }}</td></tr>
                            <tr><th>Téléphone</th><td>{{ $loanRequest->phone }}</td></tr>
                            <tr><th>Pays</th><td>{{ $loanRequest->country ?? '—' }}</td></tr>
                            <tr><th>N° Pièce d'identité</th><td>{{ $loanRequest->id_number }}</td></tr>
                            <tr><th>Statut emploi</th><td>{{ $loanRequest->employment_status ?? '—' }}</td></tr>
                            <tr><th>Revenus mensuels</th><td>{{ $loanRequest->monthly_income ? setting('currency_symbol','global').number_format($loanRequest->monthly_income,2) : '—' }}</td></tr>
                        </table>

                        @if($loanRequest->id_doc_recto || $loanRequest->id_doc_verso || $loanRequest->address_proof)
                        <hr>
                        <h5 class="mb-3">Documents fournis</h5>
                        <div class="d-flex flex-wrap gap-3 mb-3">
                            @foreach([
                                ['Pièce d\'identité — Recto', $loanRequest->id_doc_recto],
                                ['Pièce d\'identité — Verso', $loanRequest->id_doc_verso],
                                ['Justificatif d\'adresse',   $loanRequest->address_proof],
                            ] as [$docLabel, $docPath])
                                @if($docPath)
                                <a href="{{ asset($docPath) }}" target="_blank" class="site-btn secondary-btn btn-sm" style="font-size:13px">
                                    <i data-lucide="file" style="width:14px;height:14px"></i> {{ $docLabel }}
                                </a>
                                @endif
                            @endforeach
                        </div>
                        @endif

                        <hr>
                        <h5 class="mb-3">Détails du prêt</h5>
                        <table class="table table-borderless">
                            <tr><th style="width:200px">Type de prêt</th><td>{{ $loanRequest->loan_type }}</td></tr>
                            <tr><th>Montant demandé</th><td><strong>{{ $loanRequest->currency ?? 'EUR' }} {{ number_format($loanRequest->amount, 2) }}</strong></td></tr>
                            <tr><th>Devise</th><td>{{ $loanRequest->currency ?? 'EUR' }}</td></tr>
                            <tr><th>Durée souhaitée</th><td>{{ $loanRequest->duration_months }} mois</td></tr>
                            <tr><th>Objet du prêt</th><td>{{ $loanRequest->purpose ?? '—' }}</td></tr>
                            <tr><th>Date de demande</th><td>{{ $loanRequest->created_at->format('d/m/Y H:i') }}</td></tr>
                        </table>

                        @if($loanRequest->approved_amount)
                        <hr>
                        <div class="alert alert-success">
                            <strong>Montant approuvé :</strong> {{ setting('currency_symbol','global') }}{{ number_format($loanRequest->approved_amount, 2) }}
                            @if($loanRequest->user)
                                — Crédité sur le compte de <strong>{{ $loanRequest->user->full_name }}</strong> ({{ $loanRequest->user->email }})
                            @endif
                        </div>
                        @endif
                    </div>
                </div>
            </div>

            {{-- Actions admin --}}
            <div class="col-xl-5">

                {{-- Changer le statut --}}
                <div class="site-card mb-4">
                    <div class="site-card-header"><h4>Changer le statut</h4></div>
                    <div class="site-card-body">
                        <form action="{{ route('admin.loan-request.update', $loanRequest) }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Statut</label>
                                <select name="status" class="form-control">
                                    @foreach(['pending'=>'En attente','reviewing'=>'En cours d\'examen','approved'=>'Approuvée','rejected'=>'Rejetée'] as $val => $lbl)
                                        <option value="{{ $val }}" @selected($loanRequest->status === $val)>{{ $lbl }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Notes admin</label>
                                <textarea name="admin_notes" class="form-control" rows="4" placeholder="Observations internes...">{{ $loanRequest->admin_notes }}</textarea>
                            </div>
                            <button class="site-btn primary-btn w-100">Mettre à jour</button>
                        </form>
                    </div>
                </div>

                {{-- Créditer le compte --}}
                @if($loanRequest->status !== 'rejected')
                <div class="site-card">
                    <div class="site-card-header">
                        <h4>Créditer le compte utilisateur</h4>
                    </div>
                    <div class="site-card-body">
                        @if($loanRequest->approved_amount)
                            <div class="alert alert-info mb-3">Ce prêt a déjà été crédité.</div>
                        @endif
                        <form action="{{ route('admin.loan-request.credit', $loanRequest) }}" method="POST"
                              onsubmit="return confirm('Confirmer le crédit de ce montant sur le compte sélectionné ?')">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Compte utilisateur</label>
                                <select name="user_id" class="form-control" required>
                                    <option value="">-- Sélectionner un utilisateur --</option>
                                    @foreach($users as $user)
                                        <option value="{{ $user->id }}" @selected($loanRequest->user_id == $user->id)>
                                            {{ $user->first_name }} {{ $user->last_name }} ({{ $user->email }})
                                        </option>
                                    @endforeach
                                </select>
                                <small class="text-muted">Si l'utilisateur n'a pas de compte, demandez-lui de s'inscrire d'abord.</small>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Montant à créditer ({{ setting('currency_symbol','global') }})</label>
                                <input type="number" name="approved_amount" class="form-control"
                                       step="0.01" min="1"
                                       value="{{ $loanRequest->approved_amount ?? $loanRequest->amount }}"
                                       required>
                            </div>
                            <button class="site-btn success-btn w-100">
                                <i data-lucide="banknote" style="width:16px;height:16px"></i>
                                Approuver & Créditer
                            </button>
                        </form>
                    </div>
                </div>
                @endif

            </div>
        </div>
    </div>
</div>
@endsection
