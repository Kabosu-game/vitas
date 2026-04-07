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
        'message_body' => '<p>Nous avons bien reçu votre demande de prêt et elle est en cours de traitement.</p><table style="width:100%;border-collapse:collapse;margin:16px 0"><tr><td style="padding:8px;border:1px solid #e0e0e0;background:#f9f9f9;font-weight:bold;width:45%">Référence</td><td style="padding:8px;border:1px solid #e0e0e0">[[reference]]</td></tr><tr><td style="padding:8px;border:1px solid #e0e0e0;background:#f9f9f9;font-weight:bold">Type de prêt</td><td style="padding:8px;border:1px solid #e0e0e0">[[loan_type]]</td></tr><tr><td style="padding:8px;border:1px solid #e0e0e0;background:#f9f9f9;font-weight:bold">Montant demandé</td><td style="padding:8px;border:1px solid #e0e0e0">[[loan_amount]]</td></tr><tr><td style="padding:8px;border:1px solid #e0e0e0;background:#f9f9f9;font-weight:bold">Durée</td><td style="padding:8px;border:1px solid #e0e0e0">[[duration_months]] mois</td></tr><tr><td style="padding:8px;border:1px solid #e0e0e0;background:#f9f9f9;font-weight:bold">Objet</td><td style="padding:8px;border:1px solid #e0e0e0">[[purpose]]</td></tr></table><p>Notre équipe étudiera votre dossier et vous contactera dans les meilleurs délais.</p>',
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
        'message_body' => '<p>Une nouvelle demande de prêt vient d\'être soumise.</p><table style="width:100%;border-collapse:collapse;margin:16px 0"><tr><td style="padding:8px;border:1px solid #e0e0e0;background:#f9f9f9;font-weight:bold;width:45%">Référence</td><td style="padding:8px;border:1px solid #e0e0e0">[[reference]]</td></tr><tr><td style="padding:8px;border:1px solid #e0e0e0;background:#f9f9f9;font-weight:bold">Demandeur</td><td style="padding:8px;border:1px solid #e0e0e0">[[full_name]]</td></tr><tr><td style="padding:8px;border:1px solid #e0e0e0;background:#f9f9f9;font-weight:bold">Email</td><td style="padding:8px;border:1px solid #e0e0e0">[[email]]</td></tr><tr><td style="padding:8px;border:1px solid #e0e0e0;background:#f9f9f9;font-weight:bold">Téléphone</td><td style="padding:8px;border:1px solid #e0e0e0">[[phone]]</td></tr><tr><td style="padding:8px;border:1px solid #e0e0e0;background:#f9f9f9;font-weight:bold">Montant</td><td style="padding:8px;border:1px solid #e0e0e0">[[loan_amount]]</td></tr><tr><td style="padding:8px;border:1px solid #e0e0e0;background:#f9f9f9;font-weight:bold">Durée</td><td style="padding:8px;border:1px solid #e0e0e0">[[duration_months]] mois</td></tr></table>',
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
        'message_body' => '<p>Votre demande de prêt a été <strong style="color:#27ae60">approuvée</strong> et le montant a été crédité sur votre compte.</p><table style="width:100%;border-collapse:collapse;margin:16px 0"><tr><td style="padding:8px;border:1px solid #e0e0e0;background:#f9f9f9;font-weight:bold;width:45%">Référence</td><td style="padding:8px;border:1px solid #e0e0e0">[[reference]]</td></tr><tr><td style="padding:8px;border:1px solid #e0e0e0;background:#f9f9f9;font-weight:bold">Montant crédité</td><td style="padding:8px;border:1px solid #e0e0e0;color:#27ae60;font-weight:bold">[[loan_amount]]</td></tr><tr><td style="padding:8px;border:1px solid #e0e0e0;background:#f9f9f9;font-weight:bold">Statut</td><td style="padding:8px;border:1px solid #e0e0e0;color:#27ae60">Approuvé ✓</td></tr></table><p>[[message]]</p>',
        'button_level' => 'Voir mon compte',
        'button_link'  => '[[site_url]]',
        'footer_status'=> 1,
        'footer_body'  => "Cordialement,<br>L'équipe [[site_title]]",
        'bottom_status'=> 0,
        'short_codes'  => '[[full_name]], [[reference]], [[loan_amount]], [[message]], [[site_title]], [[site_url]]',
        'status'       => 1,
    ],
    [
        'name'         => 'Dépôt approuvé — Notification utilisateur',
        'code'         => 'deposit_success',
        'for'          => 'User',
        'subject'      => 'Votre dépôt a été crédité — [[site_title]]',
        'title'        => 'Dépôt crédité avec succès',
        'salutation'   => 'Bonjour [[full_name]],',
        'message_body' => '<p>Votre dépôt a été traité avec succès et votre compte a été crédité.</p><table style="width:100%;border-collapse:collapse;margin:16px 0"><tr><td style="padding:8px;border:1px solid #e0e0e0;background:#f9f9f9;font-weight:bold;width:45%">N° de transaction</td><td style="padding:8px;border:1px solid #e0e0e0">[[txn]]</td></tr><tr><td style="padding:8px;border:1px solid #e0e0e0;background:#f9f9f9;font-weight:bold">Moyen de paiement</td><td style="padding:8px;border:1px solid #e0e0e0">[[gateway_name]]</td></tr><tr><td style="padding:8px;border:1px solid #e0e0e0;background:#f9f9f9;font-weight:bold">Montant crédité</td><td style="padding:8px;border:1px solid #e0e0e0;color:#27ae60;font-weight:bold">[[deposit_amount]]</td></tr><tr><td style="padding:8px;border:1px solid #e0e0e0;background:#f9f9f9;font-weight:bold">Statut</td><td style="padding:8px;border:1px solid #e0e0e0;color:#27ae60">Confirmé ✓</td></tr></table>',
        'button_level' => 'Voir mon compte',
        'button_link'  => '[[site_url]]',
        'footer_status'=> 1,
        'footer_body'  => "Cordialement,<br>L'équipe [[site_title]]",
        'bottom_status'=> 0,
        'short_codes'  => '[[full_name]], [[txn]], [[gateway_name]], [[deposit_amount]], [[site_title]], [[site_url]]',
        'status'       => 1,
    ],
    [
        'name'         => 'Dépôt approuvé — Notification admin',
        'code'         => 'deposit_success_admin',
        'for'          => 'Admin',
        'subject'      => 'Dépôt confirmé — [[txn]]',
        'title'        => 'Dépôt crédité',
        'salutation'   => 'Bonjour,',
        'message_body' => '<p>Un dépôt a été confirmé et crédité sur le compte utilisateur.</p><table style="width:100%;border-collapse:collapse;margin:16px 0"><tr><td style="padding:8px;border:1px solid #e0e0e0;background:#f9f9f9;font-weight:bold;width:45%">Utilisateur</td><td style="padding:8px;border:1px solid #e0e0e0">[[full_name]]</td></tr><tr><td style="padding:8px;border:1px solid #e0e0e0;background:#f9f9f9;font-weight:bold">N° transaction</td><td style="padding:8px;border:1px solid #e0e0e0">[[txn]]</td></tr><tr><td style="padding:8px;border:1px solid #e0e0e0;background:#f9f9f9;font-weight:bold">Moyen</td><td style="padding:8px;border:1px solid #e0e0e0">[[gateway_name]]</td></tr><tr><td style="padding:8px;border:1px solid #e0e0e0;background:#f9f9f9;font-weight:bold">Montant</td><td style="padding:8px;border:1px solid #e0e0e0;color:#27ae60;font-weight:bold">[[deposit_amount]]</td></tr></table>',
        'button_level' => null,
        'button_link'  => null,
        'footer_status'=> 1,
        'footer_body'  => 'Système automatique — [[site_title]]',
        'bottom_status'=> 0,
        'short_codes'  => '[[full_name]], [[txn]], [[gateway_name]], [[deposit_amount]], [[site_title]], [[site_url]]',
        'status'       => 1,
    ],
    [
        'name'         => 'Opération manuelle sur compte',
        'code'         => 'user_mail',
        'for'          => 'User',
        'subject'      => '[[subject]]',
        'title'        => 'Opération sur votre compte',
        'salutation'   => 'Bonjour [[full_name]],',
        'message_body' => '<p>[[message]]</p><table style="width:100%;border-collapse:collapse;margin:16px 0"><tr><td style="padding:8px;border:1px solid #e0e0e0;background:#f9f9f9;font-weight:bold;width:45%">Montant</td><td style="padding:8px;border:1px solid #e0e0e0;font-weight:bold">[[amount]]</td></tr><tr><td style="padding:8px;border:1px solid #e0e0e0;background:#f9f9f9;font-weight:bold">Portefeuille</td><td style="padding:8px;border:1px solid #e0e0e0">[[wallet_name]]</td></tr><tr><td style="padding:8px;border:1px solid #e0e0e0;background:#f9f9f9;font-weight:bold">Effectué par</td><td style="padding:8px;border:1px solid #e0e0e0">[[admin_name]]</td></tr></table>',
        'button_level' => 'Voir mon compte',
        'button_link'  => '[[site_url]]',
        'footer_status'=> 1,
        'footer_body'  => "Cordialement,<br>L'équipe [[site_title]]",
        'bottom_status'=> 0,
        'short_codes'  => '[[full_name]], [[subject]], [[amount]], [[wallet_name]], [[admin_name]], [[message]], [[site_title]], [[site_url]]',
        'status'       => 1,
    ],

        ];

        foreach ($templates as $template) {
            DB::table('email_templates')->updateOrInsert(
                ['code' => $template['code']],
                array_merge($template, [
                    'created_at' => $now,
                    'updated_at' => $now,
                ])
            );
        }
    }

    public function down(): void
    {
        $codes = [
            'loan_request_user',
            'loan_request_admin',
            'loan_request_approved',
            'deposit_success',
            'deposit_success_admin',
            'user_mail',
            'withdraw_request',
            'withdraw_request_user',
        ];

        DB::table('email_templates')->whereIn('code', $codes)->delete();
    }
};
