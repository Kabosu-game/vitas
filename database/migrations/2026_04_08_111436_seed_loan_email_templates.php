<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        $now = now();

        $templates = [
            [
                'name'         => 'Demande de prêt — Confirmation utilisateur',
                'code'         => 'loan_request_user',
                'for'          => 'User',
                'subject'      => 'Confirmation de votre demande de prêt — [[site_title]]',
                'title'        => 'Demande de prêt reçue',
                'salutation'   => 'Bonjour [[full_name]],',
                'message_body' => '<p>Nous avons bien reçu votre demande de prêt et elle est en cours de traitement.</p><table style="width:100%;border-collapse:collapse;margin:16px 0"><tr><td style="padding:8px;border:1px solid #e0e0e0;background:#f9f9f9;font-weight:bold;width:45%">Référence</td><td style="padding:8px;border:1px solid #e0e0e0">[[reference]]</td></tr><tr><td style="padding:8px;border:1px solid #e0e0e0;background:#f9f9f9;font-weight:bold">Type de prêt</td><td style="padding:8px;border:1px solid #e0e0e0">[[loan_type]]</td></tr><tr><td style="padding:8px;border:1px solid #e0e0e0;background:#f9f9f9;font-weight:bold">Montant demandé</td><td style="padding:8px;border:1px solid #e0e0e0">[[loan_amount]]</td></tr><tr><td style="padding:8px;border:1px solid #e0e0e0;background:#f9f9f9;font-weight:bold">Durée</td><td style="padding:8px;border:1px solid #e0e0e0">[[duration_months]] mois</td></tr></table><p>Notre équipe étudiera votre dossier et vous contactera dans les meilleurs délais.</p>',
                'button_level' => 'Visiter notre site',
                'button_link'  => '[[site_url]]',
                'footer_status'=> 1,
                'footer_body'  => "Cordialement,<br>L'équipe [[site_title]]",
                'bottom_status'=> 0,
                'short_codes'  => '[[full_name]], [[reference]], [[loan_type]], [[loan_amount]], [[duration_months]], [[purpose]], [[site_title]], [[site_url]]',
                'status'       => 1,
            ],
            [
                'name'         => 'Demande de prêt — Notification admin',
                'code'         => 'loan_request_admin',
                'for'          => 'Admin',
                'subject'      => 'Nouvelle demande de prêt — [[reference]]',
                'title'        => 'Nouvelle demande de prêt reçue',
                'salutation'   => 'Bonjour,',
                'message_body' => '<p>Une nouvelle demande de prêt vient d\'être soumise.</p><table style="width:100%;border-collapse:collapse;margin:16px 0"><tr><td style="padding:8px;border:1px solid #e0e0e0;background:#f9f9f9;font-weight:bold;width:45%">Référence</td><td style="padding:8px;border:1px solid #e0e0e0">[[reference]]</td></tr><tr><td style="padding:8px;border:1px solid #e0e0e0;background:#f9f9f9;font-weight:bold">Demandeur</td><td style="padding:8px;border:1px solid #e0e0e0">[[full_name]]</td></tr><tr><td style="padding:8px;border:1px solid #e0e0e0;background:#f9f9f9;font-weight:bold">Montant</td><td style="padding:8px;border:1px solid #e0e0e0">[[loan_amount]]</td></tr></table>',
                'button_level' => "Accéder à l'administration",
                'button_link'  => '[[site_url]]',
                'footer_status'=> 1,
                'footer_body'  => 'Système automatique — [[site_title]]',
                'bottom_status'=> 0,
                'short_codes'  => '[[full_name]], [[reference]], [[loan_type]], [[loan_amount]], [[duration_months]], [[purpose]], [[email]], [[phone]], [[site_title]], [[site_url]]',
                'status'       => 1,
            ],
            [
                'name'         => 'Prêt approuvé — Notification utilisateur',
                'code'         => 'loan_request_approved',
                'for'          => 'User',
                'subject'      => 'Votre prêt a été approuvé — [[site_title]]',
                'title'        => 'Prêt approuvé et crédité',
                'salutation'   => 'Bonjour [[full_name]],',
                'message_body' => '<p>Votre demande de prêt a été <strong style="color:#27ae60">approuvée</strong> et le montant a été crédité sur votre compte.</p><table style="width:100%;border-collapse:collapse;margin:16px 0"><tr><td style="padding:8px;border:1px solid #e0e0e0;background:#f9f9f9;font-weight:bold;width:45%">Référence</td><td style="padding:8px;border:1px solid #e0e0e0">[[reference]]</td></tr><tr><td style="padding:8px;border:1px solid #e0e0e0;background:#f9f9f9;font-weight:bold">Montant crédité</td><td style="padding:8px;border:1px solid #e0e0e0;color:#27ae60;font-weight:bold">[[loan_amount]]</td></tr></table><p>[[message]]</p>',
                'button_level' => 'Voir mon compte',
                'button_link'  => '[[site_url]]',
                'footer_status'=> 1,
                'footer_body'  => "Cordialement,<br>L'équipe [[site_title]]",
                'bottom_status'=> 0,
                'short_codes'  => '[[full_name]], [[reference]], [[loan_amount]], [[message]], [[site_title]], [[site_url]]',
                'status'       => 1,
            ],
            [
                'name'         => 'Prêt rejeté — Notification utilisateur',
                'code'         => 'loan_request_rejected',
                'for'          => 'User',
                'subject'      => 'Votre demande de prêt a été refusée — [[site_title]]',
                'title'        => 'Demande de prêt refusée',
                'salutation'   => 'Bonjour [[full_name]],',
                'message_body' => '<p>Après examen de votre dossier, nous avons le regret de vous informer que votre demande de prêt n\'a pas pu être accordée.</p><table style="width:100%;border-collapse:collapse;margin:16px 0"><tr><td style="padding:8px;border:1px solid #e0e0e0;background:#f9f9f9;font-weight:bold;width:45%">Référence</td><td style="padding:8px;border:1px solid #e0e0e0">[[reference]]</td></tr><tr><td style="padding:8px;border:1px solid #e0e0e0;background:#f9f9f9;font-weight:bold">Statut</td><td style="padding:8px;border:1px solid #e0e0e0;color:#e74c3c">Refusé ✗</td></tr></table><p>[[message]]</p>',
                'button_level' => 'Nous contacter',
                'button_link'  => '[[site_url]]',
                'footer_status'=> 1,
                'footer_body'  => "Cordialement,<br>L'équipe [[site_title]]",
                'bottom_status'=> 0,
                'short_codes'  => '[[full_name]], [[reference]], [[loan_amount]], [[message]], [[site_title]], [[site_url]]',
                'status'       => 1,
            ],
        ];

        foreach ($templates as $template) {
            DB::table('email_templates')->updateOrInsert(
                ['code' => $template['code']],
                array_merge($template, ['updated_at' => $now, 'created_at' => $now])
            );
        }

        // Mettre à jour le template email_verification pour utiliser le code OTP
        DB::table('email_templates')->where('code', 'email_verification')->update([
            'message_body' => '<p>Merci de votre inscription sur <strong>[[site_title]]</strong>.</p><p>Votre code de vérification est :</p><h2 style="text-align:center;letter-spacing:8px;font-size:36px;color:#6e00ff">[[token]]</h2><p>Ce code est valable <strong>10 minutes</strong>. Ne le partagez avec personne.</p>',
            'button_level'  => null,
            'button_link'   => null,
            'short_codes'   => '[[full_name]], [[token]], [[site_title]], [[site_url]]',
            'updated_at'    => $now,
        ]);
    }

    public function down(): void
    {
        DB::table('email_templates')->whereIn('code', [
            'loan_request_user', 'loan_request_admin',
            'loan_request_approved', 'loan_request_rejected',
        ])->delete();
    }
};
