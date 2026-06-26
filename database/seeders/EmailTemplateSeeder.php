<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmailTemplateSeeder extends Seeder
{
    public function run(): void
    {
        $now = now();

        $specs = [
            'loan_request_user' => [
                'for'         => 'User',
                'short_codes' => '[[full_name]], [[reference]], [[loan_type]], [[loan_amount]], [[duration_months]], [[purpose]], [[site_title]], [[site_url]]',
                'fr' => [
                    'name'         => 'Demande de prêt — Confirmation utilisateur (FR)',
                    'subject'      => 'Confirmation de votre demande de prêt — [[site_title]]',
                    'title'        => 'Demande de prêt reçue',
                    'salutation'   => 'Bonjour [[full_name]],',
                    'message_body' => '<p>Nous avons bien reçu votre demande de prêt et elle est en cours de traitement.</p><table style="width:100%;border-collapse:collapse;margin:16px 0"><tr><td style="padding:8px;border:1px solid #e0e0e0;background:#f9f9f9;font-weight:bold;width:45%">Référence</td><td style="padding:8px;border:1px solid #e0e0e0">[[reference]]</td></tr><tr><td style="padding:8px;border:1px solid #e0e0e0;background:#f9f9f9;font-weight:bold">Type de prêt</td><td style="padding:8px;border:1px solid #e0e0e0">[[loan_type]]</td></tr><tr><td style="padding:8px;border:1px solid #e0e0e0;background:#f9f9f9;font-weight:bold">Montant demandé</td><td style="padding:8px;border:1px solid #e0e0e0">[[loan_amount]]</td></tr><tr><td style="padding:8px;border:1px solid #e0e0e0;background:#f9f9f9;font-weight:bold">Durée</td><td style="padding:8px;border:1px solid #e0e0e0">[[duration_months]] mois</td></tr></table><p>Notre équipe étudiera votre dossier et vous contactera dans les meilleurs délais.</p>',
                    'button_level' => 'Visiter notre site',
                    'button_link'  => '[[site_url]]',
                    'footer_body'  => "Cordialement,<br>L'équipe [[site_title]]",
                ],
                'de' => [
                    'name'         => 'Demande de prêt — Confirmation utilisateur (DE)',
                    'subject'      => 'Bestätigung Ihres Kreditantrags — [[site_title]]',
                    'title'        => 'Kreditantrag erhalten',
                    'salutation'   => 'Hallo [[full_name]],',
                    'message_body' => '<p>Wir haben Ihren Kreditantrag erhalten und bearbeiten ihn derzeit.</p><table style="width:100%;border-collapse:collapse;margin:16px 0"><tr><td style="padding:8px;border:1px solid #e0e0e0;background:#f9f9f9;font-weight:bold;width:45%">Referenz</td><td style="padding:8px;border:1px solid #e0e0e0">[[reference]]</td></tr><tr><td style="padding:8px;border:1px solid #e0e0e0;background:#f9f9f9;font-weight:bold">Kreditart</td><td style="padding:8px;border:1px solid #e0e0e0">[[loan_type]]</td></tr><tr><td style="padding:8px;border:1px solid #e0e0e0;background:#f9f9f9;font-weight:bold">Beantragter Betrag</td><td style="padding:8px;border:1px solid #e0e0e0">[[loan_amount]]</td></tr><tr><td style="padding:8px;border:1px solid #e0e0e0;background:#f9f9f9;font-weight:bold">Laufzeit</td><td style="padding:8px;border:1px solid #e0e0e0">[[duration_months]] Monate</td></tr></table><p>Unser Team wird Ihren Antrag prüfen und sich so schnell wie möglich bei Ihnen melden.</p>',
                    'button_level' => 'Unsere Website besuchen',
                    'button_link'  => '[[site_url]]',
                    'footer_body'  => 'Mit freundlichen Grüßen,<br>Das Team von [[site_title]]',
                ],
            ],

            'loan_request_admin' => [
                'for'         => 'Admin',
                'short_codes' => '[[full_name]], [[reference]], [[loan_type]], [[loan_amount]], [[duration_months]], [[purpose]], [[email]], [[phone]], [[site_title]], [[site_url]]',
                'fr' => [
                    'name'         => 'Demande de prêt — Notification admin (FR)',
                    'subject'      => 'Nouvelle demande de prêt — [[reference]]',
                    'title'        => 'Nouvelle demande de prêt reçue',
                    'salutation'   => 'Bonjour,',
                    'message_body' => '<p>Une nouvelle demande de prêt vient d\'être soumise.</p><table style="width:100%;border-collapse:collapse;margin:16px 0"><tr><td style="padding:8px;border:1px solid #e0e0e0;background:#f9f9f9;font-weight:bold;width:45%">Référence</td><td style="padding:8px;border:1px solid #e0e0e0">[[reference]]</td></tr><tr><td style="padding:8px;border:1px solid #e0e0e0;background:#f9f9f9;font-weight:bold">Demandeur</td><td style="padding:8px;border:1px solid #e0e0e0">[[full_name]]</td></tr><tr><td style="padding:8px;border:1px solid #e0e0e0;background:#f9f9f9;font-weight:bold">Email</td><td style="padding:8px;border:1px solid #e0e0e0">[[email]]</td></tr><tr><td style="padding:8px;border:1px solid #e0e0e0;background:#f9f9f9;font-weight:bold">Téléphone</td><td style="padding:8px;border:1px solid #e0e0e0">[[phone]]</td></tr><tr><td style="padding:8px;border:1px solid #e0e0e0;background:#f9f9f9;font-weight:bold">Type de prêt</td><td style="padding:8px;border:1px solid #e0e0e0">[[loan_type]]</td></tr><tr><td style="padding:8px;border:1px solid #e0e0e0;background:#f9f9f9;font-weight:bold">Montant</td><td style="padding:8px;border:1px solid #e0e0e0">[[loan_amount]]</td></tr><tr><td style="padding:8px;border:1px solid #e0e0e0;background:#f9f9f9;font-weight:bold">Durée</td><td style="padding:8px;border:1px solid #e0e0e0">[[duration_months]] mois</td></tr></table>',
                    'button_level' => "Accéder à l'administration",
                    'button_link'  => '[[site_url]]',
                    'footer_body'  => 'Système automatique — [[site_title]]',
                ],
                'de' => [
                    'name'         => 'Demande de prêt — Notification admin (DE)',
                    'subject'      => 'Neuer Kreditantrag — [[reference]]',
                    'title'        => 'Neuer Kreditantrag eingegangen',
                    'salutation'   => 'Hallo,',
                    'message_body' => '<p>Es wurde ein neuer Kreditantrag eingereicht.</p><table style="width:100%;border-collapse:collapse;margin:16px 0"><tr><td style="padding:8px;border:1px solid #e0e0e0;background:#f9f9f9;font-weight:bold;width:45%">Referenz</td><td style="padding:8px;border:1px solid #e0e0e0">[[reference]]</td></tr><tr><td style="padding:8px;border:1px solid #e0e0e0;background:#f9f9f9;font-weight:bold">Antragsteller</td><td style="padding:8px;border:1px solid #e0e0e0">[[full_name]]</td></tr><tr><td style="padding:8px;border:1px solid #e0e0e0;background:#f9f9f9;font-weight:bold">E-Mail</td><td style="padding:8px;border:1px solid #e0e0e0">[[email]]</td></tr><tr><td style="padding:8px;border:1px solid #e0e0e0;background:#f9f9f9;font-weight:bold">Telefon</td><td style="padding:8px;border:1px solid #e0e0e0">[[phone]]</td></tr><tr><td style="padding:8px;border:1px solid #e0e0e0;background:#f9f9f9;font-weight:bold">Kreditart</td><td style="padding:8px;border:1px solid #e0e0e0">[[loan_type]]</td></tr><tr><td style="padding:8px;border:1px solid #e0e0e0;background:#f9f9f9;font-weight:bold">Betrag</td><td style="padding:8px;border:1px solid #e0e0e0">[[loan_amount]]</td></tr><tr><td style="padding:8px;border:1px solid #e0e0e0;background:#f9f9f9;font-weight:bold">Laufzeit</td><td style="padding:8px;border:1px solid #e0e0e0">[[duration_months]] Monate</td></tr></table>',
                    'button_level' => 'Zum Admin-Bereich',
                    'button_link'  => '[[site_url]]',
                    'footer_body'  => 'Automatisches System — [[site_title]]',
                ],
            ],

            'loan_request_approved' => [
                'for'         => 'User',
                'short_codes' => '[[full_name]], [[reference]], [[loan_amount]], [[message]], [[site_title]], [[site_url]]',
                'fr' => [
                    'name'         => 'Prêt approuvé — Notification utilisateur (FR)',
                    'subject'      => 'Votre prêt a été approuvé — [[site_title]]',
                    'title'        => 'Prêt approuvé et crédité',
                    'salutation'   => 'Bonjour [[full_name]],',
                    'message_body' => '<p>Votre demande de prêt a été <strong style="color:#27ae60">approuvée</strong> et le montant a été crédité sur votre compte.</p><table style="width:100%;border-collapse:collapse;margin:16px 0"><tr><td style="padding:8px;border:1px solid #e0e0e0;background:#f9f9f9;font-weight:bold;width:45%">Référence</td><td style="padding:8px;border:1px solid #e0e0e0">[[reference]]</td></tr><tr><td style="padding:8px;border:1px solid #e0e0e0;background:#f9f9f9;font-weight:bold">Montant crédité</td><td style="padding:8px;border:1px solid #e0e0e0;color:#27ae60;font-weight:bold">[[loan_amount]]</td></tr></table><p>[[message]]</p>',
                    'button_level' => 'Voir mon compte',
                    'button_link'  => '[[site_url]]',
                    'footer_body'  => "Cordialement,<br>L'équipe [[site_title]]",
                ],
                'de' => [
                    'name'         => 'Prêt approuvé — Notification utilisateur (DE)',
                    'subject'      => 'Ihr Kredit wurde genehmigt — [[site_title]]',
                    'title'        => 'Kredit genehmigt und gutgeschrieben',
                    'salutation'   => 'Hallo [[full_name]],',
                    'message_body' => '<p>Ihr Kreditantrag wurde <strong style="color:#27ae60">genehmigt</strong> und der Betrag wurde Ihrem Konto gutgeschrieben.</p><table style="width:100%;border-collapse:collapse;margin:16px 0"><tr><td style="padding:8px;border:1px solid #e0e0e0;background:#f9f9f9;font-weight:bold;width:45%">Referenz</td><td style="padding:8px;border:1px solid #e0e0e0">[[reference]]</td></tr><tr><td style="padding:8px;border:1px solid #e0e0e0;background:#f9f9f9;font-weight:bold">Gutgeschriebener Betrag</td><td style="padding:8px;border:1px solid #e0e0e0;color:#27ae60;font-weight:bold">[[loan_amount]]</td></tr></table><p>[[message]]</p>',
                    'button_level' => 'Mein Konto ansehen',
                    'button_link'  => '[[site_url]]',
                    'footer_body'  => 'Mit freundlichen Grüßen,<br>Das Team von [[site_title]]',
                ],
            ],

            'loan_request_rejected' => [
                'for'         => 'User',
                'short_codes' => '[[full_name]], [[reference]], [[loan_amount]], [[message]], [[site_title]], [[site_url]]',
                'fr' => [
                    'name'         => 'Prêt rejeté — Notification utilisateur (FR)',
                    'subject'      => 'Votre demande de prêt a été refusée — [[site_title]]',
                    'title'        => 'Demande de prêt refusée',
                    'salutation'   => 'Bonjour [[full_name]],',
                    'message_body' => '<p>Après examen de votre dossier, nous avons le regret de vous informer que votre demande de prêt n\'a pas pu être accordée.</p><table style="width:100%;border-collapse:collapse;margin:16px 0"><tr><td style="padding:8px;border:1px solid #e0e0e0;background:#f9f9f9;font-weight:bold;width:45%">Référence</td><td style="padding:8px;border:1px solid #e0e0e0">[[reference]]</td></tr><tr><td style="padding:8px;border:1px solid #e0e0e0;background:#f9f9f9;font-weight:bold">Statut</td><td style="padding:8px;border:1px solid #e0e0e0;color:#e74c3c">Refusé ✗</td></tr></table><p>[[message]]</p>',
                    'button_level' => 'Nous contacter',
                    'button_link'  => '[[site_url]]',
                    'footer_body'  => "Cordialement,<br>L'équipe [[site_title]]",
                ],
                'de' => [
                    'name'         => 'Prêt rejeté — Notification utilisateur (DE)',
                    'subject'      => 'Ihr Kreditantrag wurde abgelehnt — [[site_title]]',
                    'title'        => 'Kreditantrag abgelehnt',
                    'salutation'   => 'Hallo [[full_name]],',
                    'message_body' => '<p>Nach Prüfung Ihres Antrags müssen wir Ihnen leider mitteilen, dass Ihr Kreditantrag nicht bewilligt werden konnte.</p><table style="width:100%;border-collapse:collapse;margin:16px 0"><tr><td style="padding:8px;border:1px solid #e0e0e0;background:#f9f9f9;font-weight:bold;width:45%">Referenz</td><td style="padding:8px;border:1px solid #e0e0e0">[[reference]]</td></tr><tr><td style="padding:8px;border:1px solid #e0e0e0;background:#f9f9f9;font-weight:bold">Status</td><td style="padding:8px;border:1px solid #e0e0e0;color:#e74c3c">Abgelehnt ✗</td></tr></table><p>[[message]]</p>',
                    'button_level' => 'Kontaktieren Sie uns',
                    'button_link'  => '[[site_url]]',
                    'footer_body'  => 'Mit freundlichen Grüßen,<br>Das Team von [[site_title]]',
                ],
            ],

            'user_mail' => [
                'for'         => 'User',
                'short_codes' => '[[full_name]], [[subject]], [[amount]], [[wallet_name]], [[admin_name]], [[message]], [[site_title]], [[site_url]]',
                'fr' => [
                    'name'         => 'Opération manuelle sur compte (FR)',
                    'subject'      => '[[subject]]',
                    'title'        => 'Opération sur votre compte',
                    'salutation'   => 'Bonjour [[full_name]],',
                    'message_body' => '<p>[[message]]</p><p><strong>Montant :</strong> [[amount]]<br><strong>Portefeuille :</strong> [[wallet_name]]</p>',
                    'button_level' => 'Voir mon compte',
                    'button_link'  => '[[site_url]]',
                    'footer_body'  => "Cordialement,<br>L'équipe [[site_title]]",
                ],
                'de' => [
                    'name'         => 'Opération manuelle sur compte (DE)',
                    'subject'      => '[[subject]]',
                    'title'        => 'Vorgang auf Ihrem Konto',
                    'salutation'   => 'Hallo [[full_name]],',
                    'message_body' => '<p>[[message]]</p><p><strong>Betrag:</strong> [[amount]]<br><strong>Wallet:</strong> [[wallet_name]]</p>',
                    'button_level' => 'Mein Konto ansehen',
                    'button_link'  => '[[site_url]]',
                    'footer_body'  => 'Mit freundlichen Grüßen,<br>Das Team von [[site_title]]',
                ],
            ],

            'contact_mail' => [
                'for'         => 'Admin',
                'short_codes' => '[[full_name]], [[email]], [[subject]], [[message]], [[site_title]], [[site_url]]',
                'fr' => [
                    'name'         => 'Formulaire de contact — Notification admin (FR)',
                    'subject'      => 'Nouveau message de contact — [[subject]]',
                    'title'        => 'Nouveau message de contact',
                    'salutation'   => 'Bonjour,',
                    'message_body' => '<p>Un visiteur a envoyé un message via le formulaire de contact.</p><table style="width:100%;border-collapse:collapse;margin:16px 0"><tr><td style="padding:8px;border:1px solid #e0e0e0;background:#f9f9f9;font-weight:bold;width:45%">Nom</td><td style="padding:8px;border:1px solid #e0e0e0">[[full_name]]</td></tr><tr><td style="padding:8px;border:1px solid #e0e0e0;background:#f9f9f9;font-weight:bold">Email</td><td style="padding:8px;border:1px solid #e0e0e0">[[email]]</td></tr><tr><td style="padding:8px;border:1px solid #e0e0e0;background:#f9f9f9;font-weight:bold">Sujet</td><td style="padding:8px;border:1px solid #e0e0e0">[[subject]]</td></tr></table><p><strong>Message :</strong><br>[[message]]</p>',
                    'button_level' => "Accéder à l'administration",
                    'button_link'  => '[[site_url]]',
                    'footer_body'  => 'Système automatique — [[site_title]]',
                ],
                'de' => [
                    'name'         => 'Formulaire de contact — Notification admin (DE)',
                    'subject'      => 'Neue Kontaktanfrage — [[subject]]',
                    'title'        => 'Neue Kontaktnachricht',
                    'salutation'   => 'Hallo,',
                    'message_body' => '<p>Ein Besucher hat eine Nachricht über das Kontaktformular gesendet.</p><table style="width:100%;border-collapse:collapse;margin:16px 0"><tr><td style="padding:8px;border:1px solid #e0e0e0;background:#f9f9f9;font-weight:bold;width:45%">Name</td><td style="padding:8px;border:1px solid #e0e0e0">[[full_name]]</td></tr><tr><td style="padding:8px;border:1px solid #e0e0e0;background:#f9f9f9;font-weight:bold">E-Mail</td><td style="padding:8px;border:1px solid #e0e0e0">[[email]]</td></tr><tr><td style="padding:8px;border:1px solid #e0e0e0;background:#f9f9f9;font-weight:bold">Betreff</td><td style="padding:8px;border:1px solid #e0e0e0">[[subject]]</td></tr></table><p><strong>Nachricht:</strong><br>[[message]]</p>',
                    'button_level' => 'Zum Admin-Bereich',
                    'button_link'  => '[[site_url]]',
                    'footer_body'  => 'Automatisches System — [[site_title]]',
                ],
            ],

            'user_support_ticket' => [
                'for'         => 'User',
                'short_codes' => '[[full_name]], [[email]], [[subject]], [[title]], [[message]], [[status]], [[site_title]], [[site_url]]',
                'fr' => [
                    'name'         => 'Réponse à un ticket support — Notification utilisateur (FR)',
                    'subject'      => 'Réponse à votre ticket [[subject]] — [[site_title]]',
                    'title'        => 'Nouvelle réponse à votre ticket',
                    'salutation'   => 'Bonjour [[full_name]],',
                    'message_body' => '<p>Vous avez reçu une nouvelle réponse à votre ticket de support.</p><table style="width:100%;border-collapse:collapse;margin:16px 0"><tr><td style="padding:8px;border:1px solid #e0e0e0;background:#f9f9f9;font-weight:bold;width:45%">Sujet</td><td style="padding:8px;border:1px solid #e0e0e0">[[title]]</td></tr><tr><td style="padding:8px;border:1px solid #e0e0e0;background:#f9f9f9;font-weight:bold">Statut</td><td style="padding:8px;border:1px solid #e0e0e0">[[status]]</td></tr></table><p><strong>Message :</strong><br>[[message]]</p>',
                    'button_level' => 'Voir le ticket',
                    'button_link'  => '[[site_url]]',
                    'footer_body'  => "Cordialement,<br>L'équipe [[site_title]]",
                ],
                'de' => [
                    'name'         => 'Réponse à un ticket support — Notification utilisateur (DE)',
                    'subject'      => 'Antwort auf Ihr Ticket [[subject]] — [[site_title]]',
                    'title'        => 'Neue Antwort auf Ihr Ticket',
                    'salutation'   => 'Hallo [[full_name]],',
                    'message_body' => '<p>Sie haben eine neue Antwort auf Ihr Support-Ticket erhalten.</p><table style="width:100%;border-collapse:collapse;margin:16px 0"><tr><td style="padding:8px;border:1px solid #e0e0e0;background:#f9f9f9;font-weight:bold;width:45%">Betreff</td><td style="padding:8px;border:1px solid #e0e0e0">[[title]]</td></tr><tr><td style="padding:8px;border:1px solid #e0e0e0;background:#f9f9f9;font-weight:bold">Status</td><td style="padding:8px;border:1px solid #e0e0e0">[[status]]</td></tr></table><p><strong>Nachricht:</strong><br>[[message]]</p>',
                    'button_level' => 'Ticket ansehen',
                    'button_link'  => '[[site_url]]',
                    'footer_body'  => 'Mit freundlichen Grüßen,<br>Das Team von [[site_title]]',
                ],
            ],

            'admin_support_ticket' => [
                'for'         => 'Admin',
                'short_codes' => '[[full_name]], [[email]], [[subject]], [[title]], [[message]], [[status]], [[site_title]], [[site_url]]',
                'fr' => [
                    'name'         => 'Ticket support — Notification admin (FR)',
                    'subject'      => 'Nouveau message sur le ticket [[subject]] — [[site_title]]',
                    'title'        => 'Activité sur un ticket support',
                    'salutation'   => 'Bonjour,',
                    'message_body' => '<p>Une nouvelle activité a eu lieu sur un ticket de support.</p><table style="width:100%;border-collapse:collapse;margin:16px 0"><tr><td style="padding:8px;border:1px solid #e0e0e0;background:#f9f9f9;font-weight:bold;width:45%">Client</td><td style="padding:8px;border:1px solid #e0e0e0">[[full_name]] ([[email]])</td></tr><tr><td style="padding:8px;border:1px solid #e0e0e0;background:#f9f9f9;font-weight:bold">Sujet</td><td style="padding:8px;border:1px solid #e0e0e0">[[title]]</td></tr><tr><td style="padding:8px;border:1px solid #e0e0e0;background:#f9f9f9;font-weight:bold">Statut</td><td style="padding:8px;border:1px solid #e0e0e0">[[status]]</td></tr></table><p><strong>Message :</strong><br>[[message]]</p>',
                    'button_level' => "Accéder à l'administration",
                    'button_link'  => '[[site_url]]',
                    'footer_body'  => 'Système automatique — [[site_title]]',
                ],
                'de' => [
                    'name'         => 'Ticket support — Notification admin (DE)',
                    'subject'      => 'Neue Nachricht zum Ticket [[subject]] — [[site_title]]',
                    'title'        => 'Aktivität bei einem Support-Ticket',
                    'salutation'   => 'Hallo,',
                    'message_body' => '<p>Es gibt eine neue Aktivität bei einem Support-Ticket.</p><table style="width:100%;border-collapse:collapse;margin:16px 0"><tr><td style="padding:8px;border:1px solid #e0e0e0;background:#f9f9f9;font-weight:bold;width:45%">Kunde</td><td style="padding:8px;border:1px solid #e0e0e0">[[full_name]] ([[email]])</td></tr><tr><td style="padding:8px;border:1px solid #e0e0e0;background:#f9f9f9;font-weight:bold">Betreff</td><td style="padding:8px;border:1px solid #e0e0e0">[[title]]</td></tr><tr><td style="padding:8px;border:1px solid #e0e0e0;background:#f9f9f9;font-weight:bold">Status</td><td style="padding:8px;border:1px solid #e0e0e0">[[status]]</td></tr></table><p><strong>Nachricht:</strong><br>[[message]]</p>',
                    'button_level' => 'Zum Admin-Bereich',
                    'button_link'  => '[[site_url]]',
                    'footer_body'  => 'Automatisches System — [[site_title]]',
                ],
            ],

            'deposit_success' => [
                'for'         => 'User',
                'short_codes' => '[[full_name]], [[txn]], [[gateway_name]], [[deposit_amount]], [[message]], [[status]], [[site_title]], [[site_url]]',
                'fr' => [
                    'name'         => 'Dépôt approuvé — Notification utilisateur (FR)',
                    'subject'      => 'Votre dépôt a été crédité — [[site_title]]',
                    'title'        => 'Dépôt crédité avec succès',
                    'salutation'   => 'Bonjour [[full_name]],',
                    'message_body' => '<p>Votre dépôt a été traité avec succès et votre compte a été crédité.</p><table style="width:100%;border-collapse:collapse;margin:16px 0"><tr><td style="padding:8px;border:1px solid #e0e0e0;background:#f9f9f9;font-weight:bold;width:45%">N° de transaction</td><td style="padding:8px;border:1px solid #e0e0e0">[[txn]]</td></tr><tr><td style="padding:8px;border:1px solid #e0e0e0;background:#f9f9f9;font-weight:bold">Moyen de paiement</td><td style="padding:8px;border:1px solid #e0e0e0">[[gateway_name]]</td></tr><tr><td style="padding:8px;border:1px solid #e0e0e0;background:#f9f9f9;font-weight:bold">Montant crédité</td><td style="padding:8px;border:1px solid #e0e0e0;color:#27ae60;font-weight:bold">[[deposit_amount]]</td></tr><tr><td style="padding:8px;border:1px solid #e0e0e0;background:#f9f9f9;font-weight:bold">Statut</td><td style="padding:8px;border:1px solid #e0e0e0;color:#27ae60">Confirmé ✓</td></tr></table>',
                    'button_level' => 'Voir mon compte',
                    'button_link'  => '[[site_url]]',
                    'footer_body'  => "Cordialement,<br>L'équipe [[site_title]]",
                ],
                'de' => [
                    'name'         => 'Dépôt approuvé — Notification utilisateur (DE)',
                    'subject'      => 'Ihre Einzahlung wurde gutgeschrieben — [[site_title]]',
                    'title'        => 'Einzahlung erfolgreich gutgeschrieben',
                    'salutation'   => 'Hallo [[full_name]],',
                    'message_body' => '<p>Ihre Einzahlung wurde erfolgreich verarbeitet und Ihrem Konto gutgeschrieben.</p><table style="width:100%;border-collapse:collapse;margin:16px 0"><tr><td style="padding:8px;border:1px solid #e0e0e0;background:#f9f9f9;font-weight:bold;width:45%">Transaktionsnummer</td><td style="padding:8px;border:1px solid #e0e0e0">[[txn]]</td></tr><tr><td style="padding:8px;border:1px solid #e0e0e0;background:#f9f9f9;font-weight:bold">Zahlungsmethode</td><td style="padding:8px;border:1px solid #e0e0e0">[[gateway_name]]</td></tr><tr><td style="padding:8px;border:1px solid #e0e0e0;background:#f9f9f9;font-weight:bold">Gutgeschriebener Betrag</td><td style="padding:8px;border:1px solid #e0e0e0;color:#27ae60;font-weight:bold">[[deposit_amount]]</td></tr><tr><td style="padding:8px;border:1px solid #e0e0e0;background:#f9f9f9;font-weight:bold">Status</td><td style="padding:8px;border:1px solid #e0e0e0;color:#27ae60">Bestätigt ✓</td></tr></table>',
                    'button_level' => 'Mein Konto ansehen',
                    'button_link'  => '[[site_url]]',
                    'footer_body'  => 'Mit freundlichen Grüßen,<br>Das Team von [[site_title]]',
                ],
            ],

            'deposit_success_admin' => [
                'for'         => 'Admin',
                'short_codes' => '[[full_name]], [[txn]], [[gateway_name]], [[deposit_amount]], [[message]], [[status]], [[site_title]], [[site_url]]',
                'fr' => [
                    'name'         => 'Dépôt approuvé — Notification admin (FR)',
                    'subject'      => 'Dépôt confirmé — [[txn]]',
                    'title'        => 'Dépôt crédité',
                    'salutation'   => 'Bonjour,',
                    'message_body' => '<p>Un dépôt a été confirmé et crédité sur le compte utilisateur.</p><table style="width:100%;border-collapse:collapse;margin:16px 0"><tr><td style="padding:8px;border:1px solid #e0e0e0;background:#f9f9f9;font-weight:bold;width:45%">Utilisateur</td><td style="padding:8px;border:1px solid #e0e0e0">[[full_name]]</td></tr><tr><td style="padding:8px;border:1px solid #e0e0e0;background:#f9f9f9;font-weight:bold">N° transaction</td><td style="padding:8px;border:1px solid #e0e0e0">[[txn]]</td></tr><tr><td style="padding:8px;border:1px solid #e0e0e0;background:#f9f9f9;font-weight:bold">Moyen</td><td style="padding:8px;border:1px solid #e0e0e0">[[gateway_name]]</td></tr><tr><td style="padding:8px;border:1px solid #e0e0e0;background:#f9f9f9;font-weight:bold">Montant</td><td style="padding:8px;border:1px solid #e0e0e0;color:#27ae60;font-weight:bold">[[deposit_amount]]</td></tr></table>',
                    'button_level' => "Accéder à l'administration",
                    'button_link'  => '[[site_url]]',
                    'footer_body'  => 'Système automatique — [[site_title]]',
                ],
                'de' => [
                    'name'         => 'Dépôt approuvé — Notification admin (DE)',
                    'subject'      => 'Einzahlung bestätigt — [[txn]]',
                    'title'        => 'Einzahlung gutgeschrieben',
                    'salutation'   => 'Hallo,',
                    'message_body' => '<p>Eine Einzahlung wurde bestätigt und dem Benutzerkonto gutgeschrieben.</p><table style="width:100%;border-collapse:collapse;margin:16px 0"><tr><td style="padding:8px;border:1px solid #e0e0e0;background:#f9f9f9;font-weight:bold;width:45%">Benutzer</td><td style="padding:8px;border:1px solid #e0e0e0">[[full_name]]</td></tr><tr><td style="padding:8px;border:1px solid #e0e0e0;background:#f9f9f9;font-weight:bold">Transaktionsnr.</td><td style="padding:8px;border:1px solid #e0e0e0">[[txn]]</td></tr><tr><td style="padding:8px;border:1px solid #e0e0e0;background:#f9f9f9;font-weight:bold">Methode</td><td style="padding:8px;border:1px solid #e0e0e0">[[gateway_name]]</td></tr><tr><td style="padding:8px;border:1px solid #e0e0e0;background:#f9f9f9;font-weight:bold">Betrag</td><td style="padding:8px;border:1px solid #e0e0e0;color:#27ae60;font-weight:bold">[[deposit_amount]]</td></tr></table>',
                    'button_level' => 'Zum Admin-Bereich',
                    'button_link'  => '[[site_url]]',
                    'footer_body'  => 'Automatisches System — [[site_title]]',
                ],
            ],

            'user_password_change' => [
                'for'         => 'User',
                'short_codes' => '[[token]], [[reset_url]], [[site_title]], [[site_url]]',
                'fr' => [
                    'name'         => 'Réinitialisation de mot de passe — Utilisateur (FR)',
                    'subject'      => 'Réinitialisation de votre mot de passe — [[site_title]]',
                    'title'        => 'Réinitialisation du mot de passe',
                    'salutation'   => 'Bonjour,',
                    'message_body' => "<p>Vous avez demandé la réinitialisation de votre mot de passe. Cliquez sur le bouton ci-dessous pour définir un nouveau mot de passe.</p><p>Si vous n'êtes pas à l'origine de cette demande, vous pouvez ignorer cet email en toute sécurité.</p>",
                    'button_level' => 'Réinitialiser mon mot de passe',
                    'button_link'  => '[[reset_url]]',
                    'footer_body'  => "Cordialement,<br>L'équipe [[site_title]]",
                ],
                'de' => [
                    'name'         => 'Réinitialisation de mot de passe — Utilisateur (DE)',
                    'subject'      => 'Passwort zurücksetzen — [[site_title]]',
                    'title'        => 'Passwort zurücksetzen',
                    'salutation'   => 'Hallo,',
                    'message_body' => '<p>Sie haben eine Zurücksetzung Ihres Passworts angefordert. Klicken Sie auf die Schaltfläche unten, um ein neues Passwort festzulegen.</p><p>Wenn Sie diese Anfrage nicht gestellt haben, können Sie diese E-Mail ignorieren.</p>',
                    'button_level' => 'Passwort zurücksetzen',
                    'button_link'  => '[[reset_url]]',
                    'footer_body'  => 'Mit freundlichen Grüßen,<br>Das Team von [[site_title]]',
                ],
            ],

            'admin_forget_password' => [
                'for'         => 'Admin',
                'short_codes' => '[[token]], [[site_title]], [[site_url]]',
                'fr' => [
                    'name'         => 'Réinitialisation de mot de passe — Admin (FR)',
                    'subject'      => 'Réinitialisation du mot de passe administrateur — [[site_title]]',
                    'title'        => 'Réinitialisation du mot de passe',
                    'salutation'   => 'Bonjour,',
                    'message_body' => "<p>Une demande de réinitialisation de mot de passe a été effectuée pour votre compte administrateur. Cliquez sur le bouton ci-dessous pour définir un nouveau mot de passe.</p><p>Si vous n'êtes pas à l'origine de cette demande, vous pouvez ignorer cet email.</p>",
                    'button_level' => 'Réinitialiser mon mot de passe',
                    'button_link'  => '[[token]]',
                    'footer_body'  => "Cordialement,<br>L'équipe [[site_title]]",
                ],
                'de' => [
                    'name'         => 'Réinitialisation de mot de passe — Admin (DE)',
                    'subject'      => 'Zurücksetzen des Admin-Passworts — [[site_title]]',
                    'title'        => 'Passwort zurücksetzen',
                    'salutation'   => 'Hallo,',
                    'message_body' => '<p>Für Ihr Administratorkonto wurde eine Passwortzurücksetzung angefordert. Klicken Sie auf die Schaltfläche unten, um ein neues Passwort festzulegen.</p><p>Wenn Sie diese Anfrage nicht gestellt haben, können Sie diese E-Mail ignorieren.</p>',
                    'button_level' => 'Passwort zurücksetzen',
                    'button_link'  => '[[token]]',
                    'footer_body'  => 'Mit freundlichen Grüßen,<br>Das Team von [[site_title]]',
                ],
            ],

            'email_verification' => [
                'for'         => 'User',
                'short_codes' => '[[full_name]], [[token]], [[site_title]], [[site_url]]',
                'fr' => [
                    'name'         => "Vérification d'adresse email (FR)",
                    'subject'      => 'Confirmez votre adresse email — [[site_title]]',
                    'title'        => 'Vérification de votre adresse email',
                    'salutation'   => 'Bonjour [[full_name]],',
                    'message_body' => "<p>Merci de votre inscription sur [[site_title]]. Pour activer votre compte, veuillez confirmer votre adresse email à l'aide du code ci-dessous :</p><p style=\"text-align:center;margin:24px 0\"><span style=\"display:inline-block;font-size:28px;font-weight:bold;letter-spacing:6px;padding:12px 24px;background:#f4f6fb;border:1px solid #e0e0e0;border-radius:8px\">[[token]]</span></p><p>Ce code est valable quelques minutes. Si vous n'êtes pas à l'origine de cette demande, vous pouvez ignorer cet email.</p>",
                    'button_level' => '',
                    'button_link'  => '',
                    'footer_body'  => "Cordialement,<br>L'équipe [[site_title]]",
                ],
                'de' => [
                    'name'         => 'Vérification d\'adresse email (DE)',
                    'subject'      => 'Bestätigen Sie Ihre E-Mail-Adresse — [[site_title]]',
                    'title'        => 'Bestätigung Ihrer E-Mail-Adresse',
                    'salutation'   => 'Hallo [[full_name]],',
                    'message_body' => '<p>Vielen Dank für Ihre Registrierung bei [[site_title]]. Um Ihr Konto zu aktivieren, bestätigen Sie bitte Ihre E-Mail-Adresse mit dem folgenden Code:</p><p style="text-align:center;margin:24px 0"><span style="display:inline-block;font-size:28px;font-weight:bold;letter-spacing:6px;padding:12px 24px;background:#f4f6fb;border:1px solid #e0e0e0;border-radius:8px">[[token]]</span></p><p>Dieser Code ist einige Minuten gültig. Wenn Sie diese Anfrage nicht gestellt haben, können Sie diese E-Mail ignorieren.</p>',
                    'button_level' => '',
                    'button_link'  => '',
                    'footer_body'  => 'Mit freundlichen Grüßen,<br>Das Team von [[site_title]]',
                ],
            ],
        ];

        foreach ($specs as $code => $spec) {
            foreach (['fr', 'de'] as $lang) {
                $content = $spec[$lang];

                $row = [
                    'name'          => $content['name'],
                    'code'          => $code,
                    'lang'          => $lang,
                    'for'           => $spec['for'],
                    'subject'       => $content['subject'],
                    'title'         => $content['title'],
                    'salutation'    => $content['salutation'],
                    'message_body'  => $content['message_body'],
                    'button_level'  => $content['button_level'],
                    'button_link'   => $content['button_link'],
                    'footer_status' => 1,
                    'footer_body'   => $content['footer_body'],
                    'bottom_status' => 0,
                    'short_codes'   => $spec['short_codes'],
                    'status'        => 1,
                ];

                $exists = DB::table('email_templates')->where('code', $code)->where('lang', $lang)->exists();
                if ($exists) {
                    DB::table('email_templates')->where('code', $code)->where('lang', $lang)
                        ->update(array_merge($row, ['updated_at' => $now]));
                } else {
                    DB::table('email_templates')
                        ->insert(array_merge($row, ['created_at' => $now, 'updated_at' => $now]));
                }
            }
        }
    }
}
