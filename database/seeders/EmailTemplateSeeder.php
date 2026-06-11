<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmailTemplateSeeder extends Seeder
{
    public function run(): void
    {
        $now = now();

        $templates = [
            [
                'name'          => 'Demande de prêt — Confirmation utilisateur',
                'code'          => 'loan_request_user',
                'for'           => 'User',
                'subject'       => 'Confirmation de votre demande de prêt — [[site_title]]',
                'title'         => 'Demande de prêt reçue',
                'salutation'    => 'Bonjour [[full_name]],',
                'message_body'  => '<p>Nous avons bien reçu votre demande de prêt et elle est en cours de traitement.</p><p><strong>Référence :</strong> [[reference]]<br><strong>Type :</strong> [[loan_type]]<br><strong>Montant :</strong> [[loan_amount]]<br><strong>Durée :</strong> [[duration_months]] mois</p><p>Notre équipe vous contactera dans les meilleurs délais.</p>',
                'button_level'  => 'Visiter notre site',
                'button_link'   => '[[site_url]]',
                'footer_status' => 1,
                'footer_body'   => "Cordialement,<br>L'équipe [[site_title]]",
                'bottom_status' => 0,
                'short_codes'   => '[[full_name]], [[reference]], [[loan_type]], [[loan_amount]], [[duration_months]], [[purpose]], [[site_title]], [[site_url]]',
                'status'        => 1,
            ],
            [
                'name'          => 'Demande de prêt — Notification admin',
                'code'          => 'loan_request_admin',
                'for'           => 'Admin',
                'subject'       => 'Nouvelle demande de prêt — [[reference]]',
                'title'         => 'Nouvelle demande de prêt',
                'salutation'    => 'Bonjour,',
                'message_body'  => '<p>Une nouvelle demande de prêt a été soumise.</p><p><strong>Référence :</strong> [[reference]]<br><strong>Client :</strong> [[full_name]]<br><strong>Email :</strong> [[email]]<br><strong>Téléphone :</strong> [[phone]]<br><strong>Type :</strong> [[loan_type]]<br><strong>Montant :</strong> [[loan_amount]]<br><strong>Durée :</strong> [[duration_months]] mois</p>',
                'button_level'  => "Accéder à l'administration",
                'button_link'   => '[[site_url]]',
                'footer_status' => 1,
                'footer_body'   => 'Système automatique — [[site_title]]',
                'bottom_status' => 0,
                'short_codes'   => '[[full_name]], [[reference]], [[loan_type]], [[loan_amount]], [[duration_months]], [[purpose]], [[email]], [[phone]], [[site_title]], [[site_url]]',
                'status'        => 1,
            ],
            [
                'name'          => 'Prêt approuvé — Notification utilisateur',
                'code'          => 'loan_request_approved',
                'for'           => 'User',
                'subject'       => 'Votre prêt a été approuvé — [[site_title]]',
                'title'         => 'Prêt approuvé',
                'salutation'    => 'Bonjour [[full_name]],',
                'message_body'  => '<p>Votre demande de prêt a été <strong>approuvée</strong> et le montant a été crédité sur votre compte.</p><p><strong>Référence :</strong> [[reference]]<br><strong>Montant :</strong> [[loan_amount]]</p><p>[[message]]</p>',
                'button_level'  => 'Voir mon compte',
                'button_link'   => '[[site_url]]',
                'footer_status' => 1,
                'footer_body'   => "Cordialement,<br>L'équipe [[site_title]]",
                'bottom_status' => 0,
                'short_codes'   => '[[full_name]], [[reference]], [[loan_amount]], [[message]], [[site_title]], [[site_url]]',
                'status'        => 1,
            ],
            [
                'name'          => 'Opération manuelle sur compte',
                'code'          => 'user_mail',
                'for'           => 'User',
                'subject'       => '[[subject]]',
                'title'         => 'Opération sur votre compte',
                'salutation'    => 'Bonjour [[full_name]],',
                'message_body'  => '<p>[[message]]</p><p><strong>Montant :</strong> [[amount]]<br><strong>Portefeuille :</strong> [[wallet_name]]</p>',
                'button_level'  => 'Voir mon compte',
                'button_link'   => '[[site_url]]',
                'footer_status' => 1,
                'footer_body'   => "Cordialement,<br>L'équipe [[site_title]]",
                'bottom_status' => 0,
                'short_codes'   => '[[full_name]], [[subject]], [[amount]], [[wallet_name]], [[admin_name]], [[message]], [[site_title]], [[site_url]]',
                'status'        => 1,
            ],
            [
                'name'          => 'Formulaire de contact — Notification admin',
                'code'          => 'contact_mail',
                'for'           => 'Admin',
                'subject'       => 'Nouveau message de contact — [[subject]]',
                'title'         => 'Nouveau message de contact',
                'salutation'    => 'Bonjour,',
                'message_body'  => '<p>Un visiteur a envoyé un message via le formulaire de contact.</p><table style="width:100%;border-collapse:collapse;margin:16px 0"><tr><td style="padding:8px;border:1px solid #e0e0e0;background:#f9f9f9;font-weight:bold;width:45%">Nom</td><td style="padding:8px;border:1px solid #e0e0e0">[[full_name]]</td></tr><tr><td style="padding:8px;border:1px solid #e0e0e0;background:#f9f9f9;font-weight:bold">Email</td><td style="padding:8px;border:1px solid #e0e0e0">[[email]]</td></tr><tr><td style="padding:8px;border:1px solid #e0e0e0;background:#f9f9f9;font-weight:bold">Sujet</td><td style="padding:8px;border:1px solid #e0e0e0">[[subject]]</td></tr></table><p><strong>Message :</strong><br>[[message]]</p>',
                'button_level'  => "Accéder à l'administration",
                'button_link'   => '[[site_url]]',
                'footer_status' => 1,
                'footer_body'   => 'Système automatique — [[site_title]]',
                'bottom_status' => 0,
                'short_codes'   => '[[full_name]], [[email]], [[subject]], [[message]], [[site_title]], [[site_url]]',
                'status'        => 1,
            ],
            [
                'name'          => 'Réponse à un ticket support — Notification utilisateur',
                'code'          => 'user_support_ticket',
                'for'           => 'User',
                'subject'       => 'Réponse à votre ticket [[subject]] — [[site_title]]',
                'title'         => 'Nouvelle réponse à votre ticket',
                'salutation'    => 'Bonjour [[full_name]],',
                'message_body'  => '<p>Vous avez reçu une nouvelle réponse à votre ticket de support.</p><table style="width:100%;border-collapse:collapse;margin:16px 0"><tr><td style="padding:8px;border:1px solid #e0e0e0;background:#f9f9f9;font-weight:bold;width:45%">Sujet</td><td style="padding:8px;border:1px solid #e0e0e0">[[title]]</td></tr><tr><td style="padding:8px;border:1px solid #e0e0e0;background:#f9f9f9;font-weight:bold">Statut</td><td style="padding:8px;border:1px solid #e0e0e0">[[status]]</td></tr></table><p><strong>Message :</strong><br>[[message]]</p>',
                'button_level'  => 'Voir le ticket',
                'button_link'   => '[[site_url]]',
                'footer_status' => 1,
                'footer_body'   => "Cordialement,<br>L'équipe [[site_title]]",
                'bottom_status' => 0,
                'short_codes'   => '[[full_name]], [[title]], [[message]], [[status]], [[site_title]], [[site_url]]',
                'status'        => 1,
            ],
            [
                'name'          => 'Ticket support — Notification admin',
                'code'          => 'admin_support_ticket',
                'for'           => 'Admin',
                'subject'       => 'Nouveau message sur le ticket [[subject]] — [[site_title]]',
                'title'         => 'Activité sur un ticket support',
                'salutation'    => 'Bonjour,',
                'message_body'  => '<p>Une nouvelle activité a eu lieu sur un ticket de support.</p><table style="width:100%;border-collapse:collapse;margin:16px 0"><tr><td style="padding:8px;border:1px solid #e0e0e0;background:#f9f9f9;font-weight:bold;width:45%">Client</td><td style="padding:8px;border:1px solid #e0e0e0">[[full_name]] ([[email]])</td></tr><tr><td style="padding:8px;border:1px solid #e0e0e0;background:#f9f9f9;font-weight:bold">Sujet</td><td style="padding:8px;border:1px solid #e0e0e0">[[title]]</td></tr><tr><td style="padding:8px;border:1px solid #e0e0e0;background:#f9f9f9;font-weight:bold">Statut</td><td style="padding:8px;border:1px solid #e0e0e0">[[status]]</td></tr></table><p><strong>Message :</strong><br>[[message]]</p>',
                'button_level'  => "Accéder à l'administration",
                'button_link'   => '[[site_url]]',
                'footer_status' => 1,
                'footer_body'   => 'Système automatique — [[site_title]]',
                'bottom_status' => 0,
                'short_codes'   => '[[full_name]], [[email]], [[title]], [[message]], [[status]], [[site_title]], [[site_url]]',
                'status'        => 1,
            ],
        ];

        foreach ($templates as $template) {
            $exists = DB::table('email_templates')->where('code', $template['code'])->exists();
            if ($exists) {
                DB::table('email_templates')->where('code', $template['code'])
                    ->update(array_merge($template, ['updated_at' => $now]));
            } else {
                DB::table('email_templates')
                    ->insert(array_merge($template, ['created_at' => $now, 'updated_at' => $now]));
            }
        }
    }
}
