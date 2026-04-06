@extends('backend.layouts.app')

@section('title')
    Éditer — {{ $template->name }}
@endsection

@section('style')
<style>
.tpl-edit-header {
    display: flex; align-items: center; gap: 14px;
    margin-bottom: 24px; flex-wrap: wrap;
}
.tpl-edit-header .tpl-badge {
    background: #f0ebff; color: #5e3fc9;
    border-radius: 6px; padding: 4px 12px; font-size: 12px; font-weight: 600;
}
.tpl-edit-header .tpl-code {
    background: #f5f5f5; color: #555;
    border-radius: 6px; padding: 4px 12px; font-size: 12px; font-family: monospace;
}
.field-group {
    margin-bottom: 22px;
}
.field-group label {
    display: block; font-weight: 600; font-size: 13px;
    color: #444; margin-bottom: 6px;
}
.field-group .hint {
    font-size: 11px; color: #999; margin-top: 4px;
}
.field-group input[type=text], .field-group input[type=url] {
    width: 100%; border: 1px solid #ddd; border-radius: 8px;
    padding: 9px 14px; font-size: 14px; outline: none; transition: .2s;
}
.field-group input:focus { border-color: #5e3fc9; }
.title-warning {
    background: #fff3cd; border: 1px solid #ffc107;
    border-radius: 8px; padding: 10px 16px; font-size: 13px;
    color: #856404; margin-bottom: 16px; display: flex; align-items: center; gap: 8px;
}
.section-divider {
    border: none; border-top: 1px solid #eee;
    margin: 28px 0;
}
.shortcodes-box {
    background: #f8f7ff; border-radius: 8px; padding: 14px 16px; margin-top: 20px;
}
.shortcodes-box .sc-title {
    font-size: 12px; font-weight: 700; color: #5e3fc9; margin-bottom: 8px;
    text-transform: uppercase; letter-spacing: .5px;
}
.shortcodes-box .sc-list {
    display: flex; flex-wrap: wrap; gap: 6px;
}
.shortcodes-box .sc-chip {
    background: #fff; border: 1px solid #d0c4f7;
    border-radius: 4px; padding: 3px 10px; font-size: 12px;
    font-family: monospace; color: #5e3fc9; cursor: pointer;
    transition: .15s; user-select: none;
}
.shortcodes-box .sc-chip:hover { background: #5e3fc9; color: #fff; border-color: #5e3fc9; }
.toggle-section {
    display: flex; align-items: center; gap: 20px; flex-wrap: wrap;
}
.toggle-label {
    font-weight: 600; font-size: 13px; color: #444; min-width: 80px;
}
.switch-field label {
    padding: 6px 16px; font-size: 13px;
}
.btn-save {
    background: #5e3fc9; color: #fff; border: none;
    border-radius: 8px; padding: 12px 36px;
    font-size: 15px; font-weight: 600; cursor: pointer; transition: .2s;
    width: 100%;
}
.btn-save:hover { background: #4a2fa8; }
.preview-btn {
    background: #f0ebff; color: #5e3fc9; border: 1px solid #d0c4f7;
    border-radius: 8px; padding: 8px 18px; font-size: 13px;
    font-weight: 500; text-decoration: none; display: inline-block; transition: .2s;
}
.preview-btn:hover { background: #5e3fc9; color: #fff; }
.note-editor { border-radius: 8px !important; border-color: #ddd !important; }
</style>
@endsection

@section('content')
<div class="main-content">
    <div class="page-title">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="title-content">
                        <h2 class="title">Éditer le template</h2>
                        <a href="{{ route('admin.email-template') }}" class="title-btn">
                            <i data-lucide="arrow-left"></i> Tous les templates
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-xl-9 col-lg-11">

                {{-- Header info --}}
                <div class="tpl-edit-header">
                    <span class="tpl-badge">{{ $template->for == 'Admin' ? '🔐 Admin' : '👤 Utilisateur' }}</span>
                    <strong style="font-size:18px;">{{ $template->name }}</strong>
                    <span class="tpl-code">{{ $template->code }}</span>
                    @if($template->status)
                        <span style="background:#e8f5e9;color:#2e7d32;border-radius:20px;padding:3px 10px;font-size:11px;font-weight:600;">✓ Actif</span>
                    @else
                        <span style="background:#fafafa;color:#aaa;border:1px solid #ddd;border-radius:20px;padding:2px 10px;font-size:11px;">Inactif</span>
                    @endif
                </div>

                <div class="site-card">
                    <div class="site-card-body" style="padding: 30px;">

                        <form action="{{ route('admin.email-template-update') }}" method="post" enctype="multipart/form-data" id="tplForm">
                            @csrf
                            <input type="hidden" name="id" value="{{ $template->id }}">

                            {{-- SUJET --}}
                            <div class="field-group">
                                <label>📧 Sujet de l'e-mail <span style="color:red">*</span></label>
                                <input type="text" name="subject" value="{{ $template->subject }}" required>
                                <div class="hint">Apparaît dans la boîte de réception. Peut contenir des shortcodes.</div>
                            </div>

                            {{-- TITRE --}}
                            <div class="field-group">
                                <label>📌 Titre affiché dans l'e-mail <span style="color:red">*</span></label>
                                @php
                                    $isSample = stripos($template->title ?? '', 'sample') !== false || empty($template->title);
                                @endphp
                                @if($isSample)
                                <div class="title-warning">
                                    ⚠️ Ce titre contient du texte générique ou est vide. Mettez-le à jour pour ne pas afficher "Sample Email" dans vos e-mails.
                                </div>
                                @endif
                                <input type="text" name="title" value="{{ $template->title }}" required id="titleInput">
                                <div class="hint">Grand titre visible en haut du corps de l'e-mail (ex: "Votre dépôt a été confirmé").</div>
                            </div>

                            {{-- SALUTATION --}}
                            <div class="field-group">
                                <label>👋 Salutation</label>
                                <input type="text" name="salutation" value="{{ $template->salutation }}">
                                <div class="hint">Ex: "Bonjour [[full_name]],"</div>
                            </div>

                            <hr class="section-divider">

                            {{-- MESSAGE BODY --}}
                            <div class="field-group">
                                <label>✉️ Corps du message <span style="color:red">*</span></label>
                                <textarea name="message_body" id="messageBody" class="form-textarea summernote-editor" rows="8">{{ br2nl($template->message_body) }}</textarea>
                            </div>

                            <hr class="section-divider">

                            {{-- BANNIÈRE --}}
                            <div class="field-group">
                                <label>🖼 Bannière (optionnelle)</label>
                                <div class="wrap-custom-file">
                                    <input type="file" name="banner" id="bannerImg" accept=".gif,.jpg,.jpeg,.png">
                                    <label for="bannerImg" @if($template->banner) class="file-ok" style="background-image: url({{ asset($template->banner) }})" @endif>
                                        <img class="upload-icon" src="{{ asset('global/materials/upload.svg') }}" alt="">
                                        <span>{{ $template->banner ? 'Changer la bannière' : 'Ajouter une bannière' }}</span>
                                    </label>
                                </div>
                                @if($template->banner)
                                    <div style="margin-top:6px;">
                                        <label style="font-size:12px;color:#e74c3c;cursor:pointer;">
                                            <input type="checkbox" name="remove_banner" value="1"> Supprimer la bannière actuelle
                                        </label>
                                    </div>
                                @endif
                                <div class="hint">Laissez vide pour ne pas afficher de bannière.</div>
                            </div>

                            <hr class="section-divider">

                            {{-- BOUTON --}}
                            <div class="field-group">
                                <label>🔘 Bouton d'action (optionnel)</label>
                                <div class="row g-2">
                                    <div class="col-md-4">
                                        <input type="text" name="button_level" placeholder="Texte du bouton" value="{{ $template->button_level }}">
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" name="button_link" placeholder="URL du bouton" value="{{ $template->button_link }}">
                                    </div>
                                </div>
                                <div class="hint">Laissez vide si vous ne souhaitez pas de bouton.</div>
                            </div>

                            <hr class="section-divider">

                            {{-- FOOTER --}}
                            <div class="field-group">
                                <div class="toggle-section mb-3">
                                    <span class="toggle-label">Pied de page</span>
                                    <div class="switch-field">
                                        <input type="radio" id="footer_on" name="footer_status" value="1" @checked($template->footer_status)>
                                        <label for="footer_on">Activé</label>
                                        <input type="radio" id="footer_off" name="footer_status" value="0" @checked(!$template->footer_status)>
                                        <label for="footer_off">Désactivé</label>
                                    </div>
                                </div>
                                <textarea name="footer_body" class="form-textarea" rows="3" placeholder="Texte du pied de page…">{{ br2nl($template->footer_body) }}</textarea>
                            </div>

                            <hr class="section-divider">

                            {{-- BOTTOM SECTION --}}
                            <div class="field-group">
                                <div class="toggle-section mb-3">
                                    <span class="toggle-label">Section bas</span>
                                    <div class="switch-field">
                                        <input type="radio" id="bottom_on" name="bottom_status" value="1" @checked($template->bottom_status)>
                                        <label for="bottom_on">Activée</label>
                                        <input type="radio" id="bottom_off" name="bottom_status" value="0" @checked(!$template->bottom_status)>
                                        <label for="bottom_off">Désactivée</label>
                                    </div>
                                </div>
                                <input type="text" name="bottom_title" placeholder="Titre de la section bas" value="{{ $template->bottom_title }}" style="margin-bottom:8px;">
                                <textarea name="bottom_body" class="form-textarea" rows="3" placeholder="Contenu de la section bas…">{{ br2nl($template->bottom_body) }}</textarea>
                            </div>

                            <hr class="section-divider">

                            {{-- STATUT --}}
                            <div class="field-group">
                                <div class="toggle-section">
                                    <span class="toggle-label">Statut</span>
                                    <div class="switch-field">
                                        <input type="radio" id="status_on" name="status" value="1" @checked($template->status)>
                                        <label for="status_on">Actif</label>
                                        <input type="radio" id="status_off" name="status" value="0" @checked(!$template->status)>
                                        <label for="status_off">Inactif</label>
                                    </div>
                                </div>
                            </div>

                            {{-- SHORTCODES --}}
                            @if($template->short_codes)
                            <div class="shortcodes-box">
                                <div class="sc-title">Shortcodes disponibles — cliquez pour copier</div>
                                <div class="sc-list">
                                    @foreach(json_decode($template->short_codes) as $sc)
                                        <span class="sc-chip" onclick="copyShortcode('{{ $sc }}')">{{ $sc }}</span>
                                    @endforeach
                                </div>
                            </div>
                            @endif

                            <div class="mt-4 row g-2">
                                <div class="col-md-8">
                                    <button type="submit" class="btn-save">💾 Enregistrer les modifications</button>
                                </div>
                                <div class="col-md-4">
                                    <button type="button" class="btn-save" id="btnOpenTest"
                                        style="background:#e8f5e9;color:#2e7d32;border:1px solid #b2dfdb;">
                                        <i data-lucide="send" style="width:16px;height:16px;vertical-align:middle;"></i>
                                        Envoyer test
                                    </button>
                                </div>
                            </div>

                            {{-- Inline test panel --}}
                            <div id="testPanel" style="display:none;margin-top:16px;background:#f8f7ff;border-radius:10px;padding:18px;border:1px solid #e0d9f7;">
                                <label style="font-size:13px;font-weight:600;color:#444;margin-bottom:6px;display:block;">
                                    📧 Adresse de réception du test
                                </label>
                                <div style="display:flex;gap:10px;flex-wrap:wrap;">
                                    <input type="email" id="testEmailInput" value="{{ Auth::user()->email }}"
                                        placeholder="votre@email.com"
                                        style="flex:1;min-width:200px;border:1px solid #ddd;border-radius:8px;padding:9px 14px;font-size:14px;outline:none;">
                                    <button type="button" id="btnSendTest"
                                        style="background:#5e3fc9;color:#fff;border:none;border-radius:8px;padding:9px 22px;font-size:13px;font-weight:600;cursor:pointer;white-space:nowrap;">
                                        <i data-lucide="send" style="width:14px;height:14px;vertical-align:middle;"></i>
                                        Envoyer
                                    </button>
                                </div>
                                <div id="testResult" style="display:none;margin-top:12px;border-radius:8px;padding:10px 14px;font-size:13px;"></div>
                            </div>

                        </form>

                    </div>
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

    // Summernote on message body
    $('#messageBody').summernote({
        height: 220,
        toolbar: [
            ['style', ['bold', 'italic', 'underline', 'clear']],
            ['font', ['strikethrough']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['insert', ['link']],
            ['view', ['codeview', 'help']],
        ],
        callbacks: {
            onInit: function () {
                // Remove nl2br artifacts — Summernote gets clean text
            }
        }
    });

    // Warn if title looks like sample
    $('#titleInput').on('input', function () {
        var val = $(this).val().toLowerCase();
        $(this).css('border-color', val.indexOf('sample') !== -1 ? '#ffc107' : '#ddd');
    });

    // Test panel toggle
    $('#btnOpenTest').on('click', function () {
        var $p = $('#testPanel');
        $p.toggle();
        if ($p.is(':visible')) {
            $('html, body').animate({ scrollTop: $p.offset().top - 20 }, 300);
        }
    });

    // Send test from edit page
    $('#btnSendTest').on('click', function () {
        var $btn = $(this);
        var email = $('#testEmailInput').val().trim();
        if (!email) { showTestResult('error', 'Veuillez saisir une adresse e-mail.'); return; }

        $btn.prop('disabled', true).text('Envoi…');

        $.ajax({
            url: '{{ route("admin.email-template-test", $template->id) }}',
            method: 'POST',
            data: { _token: '{{ csrf_token() }}', email: email },
            success: function (res) {
                showTestResult(res.success ? 'success' : 'error', res.message);
            },
            error: function () {
                showTestResult('error', 'Erreur réseau — vérifiez la configuration SMTP.');
            },
            complete: function () {
                $btn.prop('disabled', false).html('<i data-lucide="send" style="width:14px;height:14px;vertical-align:middle;"></i> Envoyer');
                lucide.createIcons();
            }
        });
    });

    function showTestResult(type, msg) {
        var colors = type === 'success'
            ? { bg: '#e8f5e9', color: '#2e7d32', border: '#a5d6a7' }
            : { bg: '#fce4ec', color: '#c62828', border: '#ef9a9a' };
        $('#testResult')
            .css({ background: colors.bg, color: colors.color, border: '1px solid ' + colors.border })
            .text((type === 'success' ? '✓ ' : '✗ ') + msg)
            .show();
    }

})(jQuery);

// Copy shortcode to clipboard
function copyShortcode(code) {
    if (navigator.clipboard) {
        navigator.clipboard.writeText(code).then(function () {
            // Also insert into Summernote if focused
            if ($('.note-editable:focus').length) {
                $('#messageBody').summernote('insertText', code);
            }
        });
    }
    // Visual feedback
    event.target.style.background = '#5e3fc9';
    event.target.style.color = '#fff';
    setTimeout(function () {
        event.target.style.background = '';
        event.target.style.color = '';
    }, 800);
}
</script>
@endsection
