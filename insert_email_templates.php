<?php

/**
 * Script d'insertion des templates email professionnels
 * Usage : php insert_email_templates.php
 */

require __DIR__ . '/vendor/autoload.php';

$app = require_once __DIR__ . '/bootstrap/app.php';
$app->make(\Illuminate\Contracts\Console\Kernel::class)->bootstrap();

use Illuminate\Support\Facades\DB;

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
        'name'         => 'Prêt rejeté — Notification utilisateur',
        'code'         => 'loan_request_rejected',
        'for'          => 'User',
        'subject'      => 'Votre demande de prêt a été refusée — [[site_title]]',
        'title'        => 'Demande de prêt refusée',
        'salutation'   => 'Bonjour [[full_name]],',
        'message_body' => '<p>Après examen de votre dossier, nous avons le regret de vous informer que votre demande de prêt n\'a pas pu être accordée.</p><table style="width:100%;border-collapse:collapse;margin:16px 0"><tr><td style="padding:8px;border:1px solid #e0e0e0;background:#f9f9f9;font-weight:bold;width:45%">Référence</td><td style="padding:8px;border:1px solid #e0e0e0">[[reference]]</td></tr><tr><td style="padding:8px;border:1px solid #e0e0e0;background:#f9f9f9;font-weight:bold">Montant demandé</td><td style="padding:8px;border:1px solid #e0e0e0">[[loan_amount]]</td></tr><tr><td style="padding:8px;border:1px solid #e0e0e0;background:#f9f9f9;font-weight:bold">Statut</td><td style="padding:8px;border:1px solid #e0e0e0;color:#e74c3c">Refusé ✗</td></tr></table><p>[[message]]</p><p>Pour toute question, n\'hésitez pas à nous contacter.</p>',
        'button_level' => 'Nous contacter',
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

$inserted = 0;
$updated  = 0;

foreach ($templates as $template) {
    $exists = DB::table('email_templates')->where('code', $template['code'])->exists();

    if ($exists) {
        DB::table('email_templates')
            ->where('code', $template['code'])
            ->update(array_merge($template, ['updated_at' => $now]));
        $updated++;
        echo "Updated : {$template['code']}\n";
    } else {
        DB::table('email_templates')
            ->insert(array_merge($template, ['created_at' => $now, 'updated_at' => $now]));
        $inserted++;
        echo "Inserted: {$template['code']}\n";
    }
}

// Mise à jour des templates de retrait existants
DB::table('email_templates')->where('code', 'withdraw_request')->update([
    'subject'      => 'Nouvelle demande de retrait — [[site_title]]',
    'salutation'   => 'Bonjour,',
    'message_body' => '<p>Une demande de retrait vient d\'être soumise.</p><table style="width:100%;border-collapse:collapse;margin:16px 0"><tr><td style="padding:8px;border:1px solid #e0e0e0;background:#f9f9f9;font-weight:bold;width:45%">Utilisateur</td><td style="padding:8px;border:1px solid #e0e0e0">[[full_name]]</td></tr><tr><td style="padding:8px;border:1px solid #e0e0e0;background:#f9f9f9;font-weight:bold">N° transaction</td><td style="padding:8px;border:1px solid #e0e0e0">[[txn]]</td></tr><tr><td style="padding:8px;border:1px solid #e0e0e0;background:#f9f9f9;font-weight:bold">Méthode</td><td style="padding:8px;border:1px solid #e0e0e0">[[method_name]]</td></tr><tr><td style="padding:8px;border:1px solid #e0e0e0;background:#f9f9f9;font-weight:bold">Montant</td><td style="padding:8px;border:1px solid #e0e0e0;font-weight:bold">[[withdraw_amount]]</td></tr></table>',
    'short_codes'  => '[[full_name]], [[txn]], [[method_name]], [[withdraw_amount]], [[site_title]], [[site_url]]',
    'updated_at'   => $now,
]);
echo "Updated : withdraw_request\n";

DB::table('email_templates')->where('code', 'withdraw_request_user')->update([
    'subject'      => 'Votre demande de retrait a été enregistrée — [[site_title]]',
    'salutation'   => 'Bonjour [[full_name]],',
    'message_body' => '<p>Votre demande de retrait a bien été enregistrée et est en cours de traitement.</p><table style="width:100%;border-collapse:collapse;margin:16px 0"><tr><td style="padding:8px;border:1px solid #e0e0e0;background:#f9f9f9;font-weight:bold;width:45%">N° transaction</td><td style="padding:8px;border:1px solid #e0e0e0">[[txn]]</td></tr><tr><td style="padding:8px;border:1px solid #e0e0e0;background:#f9f9f9;font-weight:bold">Méthode</td><td style="padding:8px;border:1px solid #e0e0e0">[[method_name]]</td></tr><tr><td style="padding:8px;border:1px solid #e0e0e0;background:#f9f9f9;font-weight:bold">Montant</td><td style="padding:8px;border:1px solid #e0e0e0;font-weight:bold">[[withdraw_amount]]</td></tr><tr><td style="padding:8px;border:1px solid #e0e0e0;background:#f9f9f9;font-weight:bold">Statut</td><td style="padding:8px;border:1px solid #e0e0e0">En traitement…</td></tr></table>',
    'short_codes'  => '[[full_name]], [[txn]], [[method_name]], [[withdraw_amount]], [[site_title]], [[site_url]]',
    'updated_at'   => $now,
]);
echo "Updated : withdraw_request_user\n";

echo "\nTerminé — {$inserted} insertions, {$updated} mises à jour.\n";
