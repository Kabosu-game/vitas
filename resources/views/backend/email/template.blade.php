@extends('backend.layouts.app')

@section('title')
    {{ __('Modèles d\'e-mail') }}
@endsection

@section('style')
<style>
.tpl-tabs .nav-link {
    border-radius: 8px 8px 0 0;
    font-weight: 500;
    color: #555;
    padding: 10px 22px;
    border: 1px solid #e0e0e0;
    border-bottom: none;
    background: #f5f5f5;
    margin-right: 4px;
}
.tpl-tabs .nav-link.active {
    background: #fff;
    color: #5e3fc9;
    border-color: #dee2e6;
    border-bottom-color: #fff;
}
.tpl-table th {
    background: #f8f7ff;
    font-size: 12px;
    text-transform: uppercase;
    letter-spacing: .5px;
    color: #888;
    font-weight: 600;
    padding: 12px 16px;
}
.tpl-table td {
    vertical-align: middle;
    padding: 12px 16px;
    border-bottom: 1px solid #f0f0f0;
}
.tpl-table tr:last-child td { border-bottom: none; }
.tpl-name { font-weight: 600; color: #333; font-size: 14px; }
.tpl-subject { font-size: 12px; color: #777; margin-top: 2px; }
.tpl-title-badge {
    display: inline-block;
    background: #f0ebff;
    color: #5e3fc9;
    border-radius: 4px;
    padding: 2px 8px;
    font-size: 12px;
    max-width: 260px;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
    vertical-align: middle;
}
.tpl-title-badge.sample {
    background: #fff3cd;
    color: #856404;
}
.badge-enabled { background: #e8f5e9; color: #2e7d32; border-radius: 20px; padding: 3px 10px; font-size: 11px; font-weight: 600; }
.badge-disabled { background: #fafafa; color: #aaa; border: 1px solid #ddd; border-radius: 20px; padding: 2px 10px; font-size: 11px; }
.edit-btn {
    display: inline-flex; align-items: center; gap: 5px;
    padding: 5px 12px; border-radius: 6px;
    background: #5e3fc9; color: #fff; font-size: 12px;
    font-weight: 500; text-decoration: none; transition: .2s;
}
.edit-btn:hover { background: #4a2fa8; color: #fff; }
.test-btn {
    display: inline-flex; align-items: center; gap: 5px;
    padding: 5px 12px; border-radius: 6px;
    background: #e8f5e9; color: #2e7d32; font-size: 12px;
    font-weight: 500; border: 1px solid #b2dfdb; cursor: pointer; transition: .2s;
    margin-left: 4px;
}
.test-btn:hover { background: #2e7d32; color: #fff; }
.test-btn:disabled { opacity: .5; cursor: not-allowed; }
.search-bar {
    display: flex; gap: 10px; align-items: center;
    margin-bottom: 18px; flex-wrap: wrap;
}
.search-bar input {
    border: 1px solid #ddd; border-radius: 8px;
    padding: 8px 14px; font-size: 13px; width: 260px; outline: none;
}
.search-bar input:focus { border-color: #5e3fc9; }
.stat-card {
    background: #fff; border-radius: 12px; padding: 18px 22px;
    border: 1px solid #f0f0f0; text-align: center;
}
.stat-card .num { font-size: 28px; font-weight: 700; color: #5e3fc9; }
.stat-card .lbl { font-size: 12px; color: #888; margin-top: 2px; }
/* Test modal */
#testModal .modal-header { background: #5e3fc9; color: #fff; border-radius: 12px 12px 0 0; }
#testModal .modal-header .btn-close { filter: invert(1); }
#testModal .modal-body { padding: 24px; }
#testModal .test-email-input {
    border: 1px solid #ddd; border-radius: 8px;
    padding: 10px 14px; font-size: 14px; width: 100%; outline: none;
}
#testModal .test-email-input:focus { border-color: #5e3fc9; }
#testModal .btn-send-test {
    background: #5e3fc9; color: #fff; border: none;
    border-radius: 8px; padding: 10px 28px;
    font-size: 14px; font-weight: 600; cursor: pointer; width: 100%;
    display: flex; align-items: center; justify-content: center; gap: 8px;
}
#testModal .btn-send-test:hover { background: #4a2fa8; }
#testModal .btn-send-test:disabled { opacity: .6; cursor: not-allowed; }
#testResult { border-radius: 8px; padding: 12px 16px; font-size: 13px; margin-top: 14px; display: none; }
#testResult.success { background: #e8f5e9; color: #2e7d32; border: 1px solid #a5d6a7; }
#testResult.error { background: #fce4ec; color: #c62828; border: 1px solid #ef9a9a; }
</style>
@endsection

@section('content')
<div class="main-content">
    <div class="page-title">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col">
                    <div class="title-content">
                        <h2 class="title">{{ __('Modèles d\'e-mail') }}</h2>
                        <a href="{{ route('admin.settings.mail') }}" class="title-btn">
                            <i data-lucide="settings"></i> Configuration SMTP
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">

        {{-- Stats --}}
        <div class="row g-3 mb-4">
            <div class="col-6 col-md-3">
                <div class="stat-card">
                    <div class="num">{{ $emails->count() }}</div>
                    <div class="lbl">Total templates</div>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="stat-card">
                    <div class="num">{{ $emails->where('status', true)->count() }}</div>
                    <div class="lbl">Actifs</div>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="stat-card">
                    <div class="num">{{ $emails->where('for', 'User')->count() }}</div>
                    <div class="lbl">Utilisateurs</div>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="stat-card">
                    <div class="num">{{ $emails->where('for', 'Admin')->count() }}</div>
                    <div class="lbl">Admin</div>
                </div>
            </div>
        </div>

        {{-- Search --}}
        <div class="search-bar">
            <input type="text" id="tpl-search" placeholder="Rechercher un template…" autocomplete="off">
            <span style="font-size:12px;color:#888;">{{ $emails->count() }} templates disponibles</span>
        </div>

        {{-- Tabs --}}
        <ul class="nav tpl-tabs mb-0" id="tplTabs">
            <li class="nav-item"><a class="nav-link active" data-tab="all" href="#">Tous</a></li>
            <li class="nav-item"><a class="nav-link" data-tab="User" href="#">👤 Utilisateurs</a></li>
            <li class="nav-item"><a class="nav-link" data-tab="Admin" href="#">🔐 Admin</a></li>
            <li class="nav-item"><a class="nav-link" data-tab="disabled" href="#">⏸ Désactivés</a></li>
        </ul>

        <div class="site-card-body" style="border-radius: 0 8px 8px 8px; border-top: none; padding: 0;">
            <div class="table-responsive">
                <table class="table tpl-table mb-0" id="tplTable">
                    <thead>
                        <tr>
                            <th style="width:28%">Nom du template</th>
                            <th style="width:24%">Titre affiché dans l'e-mail</th>
                            <th style="width:22%">Sujet</th>
                            <th style="width:8%">Statut</th>
                            <th style="width:18%">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($emails as $email)
                    @php
                        $isSample = stripos($email->title ?? '', 'sample') !== false || empty($email->title);
                    @endphp
                    <tr
                        data-for="{{ $email->for }}"
                        data-status="{{ $email->status ? 'enabled' : 'disabled' }}"
                        data-search="{{ strtolower($email->name . ' ' . $email->subject . ' ' . ($email->title ?? '') . ' ' . $email->code) }}"
                    >
                        <td>
                            <div class="tpl-name">{{ $email->name }}</div>
                            <div class="tpl-subject">code: <code>{{ $email->code }}</code></div>
                        </td>
                        <td>
                            @if($isSample)
                                <span class="tpl-title-badge sample">⚠ {{ empty($email->title) ? '(vide)' : $email->title }}</span>
                            @else
                                <span class="tpl-title-badge">{{ $email->title }}</span>
                            @endif
                        </td>
                        <td>
                            <div style="font-size:12px;color:#555;max-width:200px;overflow:hidden;text-overflow:ellipsis;white-space:nowrap;">
                                {{ $email->subject ?: '—' }}
                            </div>
                        </td>
                        <td>
                            @if($email->status)
                                <span class="badge-enabled">✓ Actif</span>
                            @else
                                <span class="badge-disabled">Inactif</span>
                            @endif
                        </td>
                        <td style="white-space:nowrap;">
                            <a href="{{ route('admin.email-template-edit', $email->id) }}" class="edit-btn">
                                <i data-lucide="edit-3" style="width:13px;height:13px;"></i> Éditer
                            </a>
                            <button
                                class="test-btn"
                                data-id="{{ $email->id }}"
                                data-name="{{ $email->name }}"
                                data-url="{{ route('admin.email-template-test', $email->id) }}"
                                title="Envoyer un e-mail de test"
                            >
                                <i data-lucide="send" style="width:13px;height:13px;"></i> Test
                            </button>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div id="no-results" class="text-center py-5 d-none" style="color:#aaa;">Aucun template trouvé.</div>

    </div>
</div>

{{-- Modal test --}}
<div class="modal fade" id="testModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="max-width:440px;">
        <div class="modal-content" style="border-radius:12px;border:none;box-shadow:0 8px 32px rgba(0,0,0,.15);">
            <div class="modal-header">
                <h5 class="modal-title" style="font-size:15px;">
                    <i data-lucide="send" style="width:16px;height:16px;margin-right:6px;vertical-align:middle;"></i>
                    Envoyer un e-mail de test
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <p style="font-size:13px;color:#666;margin-bottom:16px;">
                    Template : <strong id="testTemplateName">—</strong><br>
                    Les shortcodes seront remplacés par des valeurs fictives.
                </p>
                <label style="font-size:13px;font-weight:600;color:#444;margin-bottom:6px;display:block;">
                    Adresse e-mail destinataire
                </label>
                <input
                    type="email"
                    id="testEmailInput"
                    class="test-email-input"
                    placeholder="votre@email.com"
                    value="{{ Auth::user()->email }}"
                >
                <div id="testResult"></div>
                <div style="margin-top:16px;">
                    <button class="btn-send-test" id="btnSendTest">
                        <i data-lucide="send" style="width:15px;height:15px;"></i>
                        Envoyer le test
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
(function ($) {
    'use strict';
    lucide.createIcons();

    // ---- Table filter ----
    var $rows = $('#tplTable tbody tr');
    var activeTab = 'all';
    var searchVal = '';

    function filterTable() {
        var visible = 0;
        $rows.each(function () {
            var $r = $(this);
            var forVal    = $r.data('for');
            var statusVal = $r.data('status');
            var searchStr = $r.data('search');
            var tabMatch  = activeTab === 'all'
                || (activeTab === 'disabled' && statusVal === 'disabled')
                || (activeTab !== 'disabled' && forVal === activeTab);
            var searchMatch = !searchVal || searchStr.indexOf(searchVal) !== -1;
            if (tabMatch && searchMatch) { $r.show(); visible++; } else { $r.hide(); }
        });
        $('#no-results').toggleClass('d-none', visible > 0);
    }

    $('.tpl-tabs .nav-link').on('click', function (e) {
        e.preventDefault();
        $('.tpl-tabs .nav-link').removeClass('active');
        $(this).addClass('active');
        activeTab = $(this).data('tab');
        filterTable();
    });

    $('#tpl-search').on('input', function () {
        searchVal = $(this).val().toLowerCase().trim();
        filterTable();
    });

    // ---- Test modal ----
    var currentTestUrl = '';

    $(document).on('click', '.test-btn', function () {
        currentTestUrl = $(this).data('url');
        var name = $(this).data('name');
        $('#testTemplateName').text(name);
        $('#testResult').hide().removeClass('success error').text('');
        $('#testModal').modal('show');
        lucide.createIcons();
    });

    $('#btnSendTest').on('click', function () {
        var $btn = $(this);
        var email = $('#testEmailInput').val().trim();

        if (!email) {
            showResult('error', 'Veuillez saisir une adresse e-mail.');
            return;
        }

        $btn.prop('disabled', true).html('<i data-lucide="loader" style="width:15px;height:15px;"></i> Envoi…');
        lucide.createIcons();

        $.ajax({
            url: currentTestUrl,
            method: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                email: email
            },
            success: function (res) {
                if (res.success) {
                    showResult('success', '✓ ' + res.message);
                } else {
                    showResult('error', '✗ ' + res.message);
                }
            },
            error: function () {
                showResult('error', '✗ Erreur réseau — vérifiez la configuration SMTP.');
            },
            complete: function () {
                $btn.prop('disabled', false).html('<i data-lucide="send" style="width:15px;height:15px;"></i> Envoyer le test');
                lucide.createIcons();
            }
        });
    });

    function showResult(type, msg) {
        $('#testResult').removeClass('success error').addClass(type).text(msg).show();
    }

})(jQuery);
</script>
@endsection
