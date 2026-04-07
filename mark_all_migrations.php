<?php

/**
 * Script pour marquer toutes les migrations en attente comme exécutées
 */

require_once __DIR__ . '/vendor/autoload.php';

$app = require_once __DIR__ . '/bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

use Illuminate\Support\Facades\DB;

echo "=== MARQUAGE DES MIGRATIONS EN ATTENTE ===\n\n";

$pendingMigrations = [
    '2025_10_12_155910_create_admins_table',
    '2025_10_12_155910_create_beneficiaries_table',
    '2025_10_12_155910_create_bill_services_table',
    '2025_10_12_155910_create_bills_table',
    '2025_10_12_155910_create_blogs_table',
    '2025_10_12_155910_create_branch_staff_table',
    '2025_10_12_155910_create_branches_table',
    '2025_10_12_155910_create_cache_locks_table',
    '2025_10_12_155910_create_cache_table',
    '2025_10_12_155910_create_card_holders_table',
    '2025_10_12_155910_create_cards_table',
    '2025_10_12_155910_create_categories_table',
    '2025_10_12_155910_create_cron_job_logs_table',
    '2025_10_12_155910_create_cron_jobs_table',
    '2025_10_12_155910_create_currencies_table',
    '2025_10_12_155910_create_custom_css_table',
    '2025_10_12_155910_create_deposit_methods_table',
    '2025_10_12_155910_create_dps_plans_table',
    '2025_10_12_155910_create_dps_table',
    '2025_10_12_155910_create_dps_transactions_table',
    '2025_10_12_155910_create_email_templates_table',
    '2025_10_12_155910_create_failed_jobs_table',
    '2025_10_12_155910_create_fdr_plans_table',
    '2025_10_12_155910_create_fdr_table',
    '2025_10_12_155910_create_fdr_transactions_table',
    '2025_10_12_155910_create_gateways_table',
    '2025_10_12_155910_create_jobs_table',
    '2025_10_12_155910_create_kycs_table',
    '2025_10_12_155910_create_labels_table',
    '2025_10_12_155910_create_landing_contents_table',
    '2025_10_12_155910_create_landing_pages_table',
    '2025_10_12_155910_create_languages_table',
    '2025_10_12_155910_create_level_referrals_table',
    '2025_10_12_155910_create_loan_plans_table',
    '2025_10_12_155910_create_loan_transactions_table',
    '2025_10_12_155910_create_loans_table',
    '2025_10_12_155910_create_login_activities_table',
    '2025_10_12_155910_create_messages_table',
    '2025_10_12_155910_create_model_has_permissions_table',
    '2025_10_12_155910_create_model_has_roles_table',
    '2025_10_12_155910_create_navigations_table',
    '2025_10_12_155910_create_notifications_table',
    '2025_10_12_155910_create_others_banks_table',
    '2025_10_12_155910_create_page_settings_table',
    '2025_10_12_155910_create_pages_table',
    '2025_10_12_155910_create_password_resets_table',
    '2025_10_12_155910_create_permissions_table',
    '2025_10_12_155910_create_personal_access_tokens_table',
    '2025_10_12_155910_create_plugins_table',
    '2025_10_12_155910_create_portfolios_table',
    '2025_10_12_155910_create_push_notification_templates_table',
    '2025_10_12_155910_create_referral_links_table',
    '2025_10_12_155910_create_referral_programs_table',
    '2025_10_12_155910_create_referral_relationships_table',
    '2025_10_12_155910_create_reward_point_earnings_table',
    '2025_10_12_155910_create_reward_point_redeems_table',
    '2025_10_12_155910_create_role_has_permissions_table',
    '2025_10_12_155910_create_roles_table',
    '2025_10_12_155910_create_set_tunes_table',
    '2025_10_12_155910_create_settings_table',
    '2025_10_12_155910_create_sms_templates_table',
    '2025_10_12_155910_create_socials_table',
    '2025_10_12_155910_create_subscriptions_table',
    '2025_10_12_155910_create_testimonials_table',
    '2025_10_12_155910_create_themes_table',
    '2025_10_12_155910_create_tickets_table',
    '2025_10_12_155910_create_transactions_table',
    '2025_10_12_155910_create_user_kycs_table',
    '2025_10_12_155910_create_user_navigations_table',
    '2025_10_12_155910_create_user_wallets_table',
    '2025_10_12_155910_create_users_table',
    '2025_10_12_155910_create_wire_transfars_table',
    '2025_10_12_155910_create_withdraw_accounts_table',
    '2025_10_12_155910_create_withdraw_methods_table',
    '2025_10_12_155910_create_withdrawal_schedules_table'
];

$markedCount = 0;
$skippedCount = 0;

foreach ($pendingMigrations as $migration) {
    try {
        DB::table('migrations')->insert([
            'migration' => $migration,
            'batch' => 200
        ]);
        echo "MARKED: {$migration}\n";
        $markedCount++;
    } catch (Exception $e) {
        echo "SKIPPED: {$migration} (déjà marquée)\n";
        $skippedCount++;
    }
}

echo "\n=== RÉSUMÉ ===\n";
echo "Migrations marquées: {$markedCount}\n";
echo "Migrations ignorées: {$skippedCount}\n";
echo "Total traitées: " . ($markedCount + $skippedCount) . "\n";

echo "\n=== VÉRIFICATION ===\n";
$totalMigrations = DB::table('migrations')->count();
echo "Total migrations dans la base: {$totalMigrations}\n";

if ($markedCount > 0) {
    echo "\nSUCCESS: {$markedCount} migrations marquées comme exécutées.\n";
    echo "L'erreur 500 devrait maintenant être résolue.\n";
    echo "Testez l'inscription sur votre site.\n";
}

echo "\n=== TERMINÉ ===\n";
