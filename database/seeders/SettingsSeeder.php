<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingsSeeder extends Seeder
{
    public function run(): void
    {
        $settings = [
            // --- Global ---
            ['name' => 'site_title',                 'val' => 'Eurovitas Finanzen',   'type' => 'global'],
            ['name' => 'site_logo',                  'val' => 'logo/logo.png',        'type' => 'global'],
            ['name' => 'site_logo_height',           'val' => '34',                   'type' => 'global'],
            ['name' => 'site_logo_width',            'val' => 'auto',                 'type' => 'global'],
            ['name' => 'site_favicon',               'val' => 'logo/icone.png',       'type' => 'global'],
            ['name' => 'currency_symbol',            'val' => '$',                    'type' => 'global'],
            ['name' => 'site_currency',              'val' => 'USD',                  'type' => 'global'],
            ['name' => 'site_timezone',              'val' => 'UTC',                  'type' => 'global'],
            ['name' => 'referral_code_limit',        'val' => '6',                    'type' => 'global'],
            ['name' => 'account_number_limit',       'val' => '10',                   'type' => 'global'],
            ['name' => 'account_number_prefix',      'val' => '',                     'type' => 'global'],
            ['name' => 'home_redirect',              'val' => '/',                    'type' => 'global'],
            ['name' => 'site_email',                 'val' => 'admin@eurovitas.com',  'type' => 'global'],
            ['name' => 'support_email',              'val' => 'support@eurovitas.com','type' => 'global'],
            ['name' => 'site_admin_prefix',          'val' => 'admin',                'type' => 'global'],
            ['name' => 'referral_rules_visibility',  'val' => '1',                    'type' => 'global'],
            ['name' => 'multi_branch',               'val' => '0',                    'type' => 'global'],

            // --- Permissions ---
            ['name' => 'default_mode',               'val' => 'dark',                 'type' => 'permission'],
            ['name' => 'passcode_verification',      'val' => '1',                    'type' => 'permission'],
            ['name' => 'email_verification',         'val' => '1',                    'type' => 'permission'],
            ['name' => 'kyc_verification',           'val' => '1',                    'type' => 'permission'],
            ['name' => 'fa_verification',            'val' => '1',                    'type' => 'permission'],
            ['name' => 'otp_verification',           'val' => '1',                    'type' => 'permission'],
            ['name' => 'account_creation',           'val' => '1',                    'type' => 'permission'],
            ['name' => 'virtual_card',               'val' => '1',                    'type' => 'permission'],
            ['name' => 'multiple_currency',          'val' => '0',                    'type' => 'permission'],
            ['name' => 'user_deposit',               'val' => '1',                    'type' => 'permission'],
            ['name' => 'user_dps',                   'val' => '1',                    'type' => 'permission'],
            ['name' => 'user_fdr',                   'val' => '1',                    'type' => 'permission'],
            ['name' => 'user_loan',                  'val' => '1',                    'type' => 'permission'],
            ['name' => 'user_reward',                'val' => '1',                    'type' => 'permission'],
            ['name' => 'user_portfolio',             'val' => '1',                    'type' => 'permission'],
            ['name' => 'user_withdraw',              'val' => '1',                    'type' => 'permission'],
            ['name' => 'transfer_status',            'val' => '1',                    'type' => 'permission'],
            ['name' => 'user_pay_bill',              'val' => '1',                    'type' => 'permission'],
            ['name' => 'sign_up_referral',           'val' => '1',                    'type' => 'permission'],
            ['name' => 'referral_signup_bonus',      'val' => '1',                    'type' => 'permission'],
            ['name' => 'site_animation',             'val' => '1',                    'type' => 'permission'],
            ['name' => 'back_to_top',                'val' => '1',                    'type' => 'permission'],
            ['name' => 'language_switcher',          'val' => '1',                    'type' => 'permission'],
            ['name' => 'card_creation',              'val' => '1',                    'type' => 'permission'],
            ['name' => 'card_topup',                 'val' => '1',                    'type' => 'permission'],
            ['name' => 'debug_mode',                 'val' => '0',                    'type' => 'permission'],

            // --- Fees & Limits ---
            ['name' => 'referral_bonus',             'val' => '20',                   'type' => 'fee'],
            ['name' => 'signup_bonus',               'val' => '20',                   'type' => 'fee'],
            ['name' => 'min_fund_transfer',          'val' => '100',                  'type' => 'fee'],
            ['name' => 'max_fund_transfer',          'val' => '100',                  'type' => 'fee'],
            ['name' => 'fund_transfer_charge',       'val' => '4',                    'type' => 'fee'],
            ['name' => 'fund_transfer_charge_type',  'val' => 'percentage',           'type' => 'fee'],

            // --- Passcodes ---
            ['name' => 'deposit_passcode_status',       'val' => '0',                 'type' => 'passcode'],
            ['name' => 'fund_transfer_passcode_status', 'val' => '0',                 'type' => 'passcode'],
            ['name' => 'dps_passcode_status',           'val' => '0',                 'type' => 'passcode'],
            ['name' => 'fdr_passcode_status',           'val' => '0',                 'type' => 'passcode'],
            ['name' => 'loan_passcode_status',          'val' => '0',                 'type' => 'passcode'],
            ['name' => 'pay_bill_passcode_status',      'val' => '0',                 'type' => 'passcode'],
            ['name' => 'withdraw_passcode_status',      'val' => '0',                 'type' => 'passcode'],

            // --- GDPR ---
            ['name' => 'gdpr_status',                'val' => '1',                    'type' => 'gdpr'],
            ['name' => 'gdpr_button_url',            'val' => '/privacy-policy',      'type' => 'gdpr'],
            ['name' => 'gdpr_button_label',          'val' => 'Learn More',           'type' => 'gdpr'],
            ['name' => 'gdpr_text',                  'val' => 'Please allow us to collect data about how you use our website. We will use it to improve our website and your browsing experience.', 'type' => 'gdpr'],

            // --- Virtual Card ---
            ['name' => 'card_creation_charge',       'val' => '2',                    'type' => 'virtual_card'],
            ['name' => 'card_topup_charge',          'val' => '2',                    'type' => 'virtual_card'],
            ['name' => 'card_topup_charge_type',     'val' => 'percentage',           'type' => 'virtual_card'],
            ['name' => 'min_card_topup',             'val' => '10',                   'type' => 'virtual_card'],
            ['name' => 'max_card_topup',             'val' => '100',                  'type' => 'virtual_card'],
            ['name' => 'card_creation_limit',        'val' => '4',                    'type' => 'virtual_card'],

            // --- Inactive User ---
            ['name' => 'inactive_account_disabled',  'val' => '1',                    'type' => 'inactive_user'],
            ['name' => 'inactive_days',              'val' => '30',                   'type' => 'inactive_user'],
            ['name' => 'inactive_account_fees',      'val' => '1',                    'type' => 'inactive_user'],
            ['name' => 'fee_amount',                 'val' => '5',                    'type' => 'inactive_user'],

            // --- KYC restrictions for unverified users ---
            ['name' => 'kyc_deposit',                'val' => '0',                    'type' => 'kyc'],
            ['name' => 'kyc_fund_transfer',          'val' => '0',                    'type' => 'kyc'],
            ['name' => 'kyc_dps',                    'val' => '0',                    'type' => 'kyc'],
            ['name' => 'kyc_fdr',                    'val' => '0',                    'type' => 'kyc'],
            ['name' => 'kyc_loan',                   'val' => '0',                    'type' => 'kyc'],
            ['name' => 'kyc_pay_bill',               'val' => '0',                    'type' => 'kyc'],
            ['name' => 'kyc_withdraw',               'val' => '0',                    'type' => 'kyc'],

            // --- Mail (SMTP) ---
            ['name' => 'mail_host',                  'val' => 'smtp.gmail.com',       'type' => 'global'],
            ['name' => 'mail_port',                  'val' => '587',                  'type' => 'global'],
            ['name' => 'mail_secure',                'val' => 'tls',                  'type' => 'global'],
            ['name' => 'mail_username',              'val' => 'kbosugame@gmail.com',  'type' => 'global'],
            ['name' => 'mail_password',              'val' => 'mfjdwioyojnbpovj',     'type' => 'global'],
            ['name' => 'email_from_address',         'val' => 'kbosugame@gmail.com',  'type' => 'global'],
            ['name' => 'email_from_name',            'val' => 'Eurovitas Finanzen',   'type' => 'global'],

            // --- Maintenance ---
            ['name' => 'maintenance_mode',           'val' => '0',                    'type' => 'site_maintenance'],
            ['name' => 'secret_key',                 'val' => 'secret123',            'type' => 'site_maintenance'],
        ];

        foreach ($settings as $setting) {
            DB::table('settings')->updateOrInsert(
                ['name' => $setting['name']],
                array_merge($setting, [
                    'created_at' => now(),
                    'updated_at' => now(),
                ])
            );
        }

        $this->command->info('Settings seeded — ' . \count($settings) . ' entries processed.');
    }
}
