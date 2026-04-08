<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        $translations = [
            'dashboard'     => ['fr'=>'Tableau de bord',      'de'=>'Dashboard',         'es'=>'Panel',              'pt'=>'Painel',             'et'=>'Armatuurlaud',    'lv'=>'Vadības panelis', 'lt'=>'Skydelis',        'en'=>'Dashboard'],
            'deposit'       => ['fr'=>'Dépôt',                'de'=>'Einzahlung',        'es'=>'Depósito',           'pt'=>'Depósito',           'et'=>'Sissemakse',      'lv'=>'Iemaksa',         'lt'=>'Indėlis',         'en'=>'Deposit'],
            'fund_transfer' => ['fr'=>'Virement',             'de'=>'Überweisung',       'es'=>'Transferencia',      'pt'=>'Transferência',      'et'=>'Ülekanne',        'lv'=>'Pārskaitījums',   'lt'=>'Pavedimas',       'en'=>'Fund Transfer'],
            'dps'           => ['fr'=>'DPS',                   'de'=>'DPS',               'es'=>'DPS',                'pt'=>'DPS',                'et'=>'DPS',             'lv'=>'DPS',             'lt'=>'DPS',             'en'=>'DPS'],
            'fdr'           => ['fr'=>'FDR',                   'de'=>'FDR',               'es'=>'FDR',                'pt'=>'FDR',                'et'=>'FDR',             'lv'=>'FDR',             'lt'=>'FDR',             'en'=>'FDR'],
            'loan'          => ['fr'=>'Prêt',                  'de'=>'Darlehen',          'es'=>'Préstamo',           'pt'=>'Empréstimo',         'et'=>'Laen',            'lv'=>'Aizdevums',       'lt'=>'Paskola',         'en'=>'Loan'],
            'pay_bill'      => ['fr'=>'Payer une facture',    'de'=>'Rechnung bezahlen', 'es'=>'Pagar factura',      'pt'=>'Pagar conta',        'et'=>'Maksa arve',      'lv'=>'Apmaksāt rēķinu', 'lt'=>'Apmokėti sąsk.', 'en'=>'Pay Bill'],
            'transactions'  => ['fr'=>'Transactions',         'de'=>'Transaktionen',     'es'=>'Transacciones',      'pt'=>'Transações',         'et'=>'Tehingud',        'lv'=>'Darījumi',        'lt'=>'Operacijos',      'en'=>'Transactions'],
            'withdraw'      => ['fr'=>'Retrait',              'de'=>'Abhebung',          'es'=>'Retiro',             'pt'=>'Levantamento',       'et'=>'Väljamakse',      'lv'=>'Izņēmums',        'lt'=>'Išėmimas',        'en'=>'Withdraw'],
            'referral'      => ['fr'=>'Parrainage',           'de'=>'Empfehlung',        'es'=>'Referido',           'pt'=>'Indicação',          'et'=>'Soovitus',        'lv'=>'Atsauce',         'lt'=>'Rekomendacija',   'en'=>'Referral'],
            'portfolio'     => ['fr'=>'Portefeuille',         'de'=>'Portfolio',         'es'=>'Cartera',            'pt'=>'Portfólio',          'et'=>'Portfell',        'lv'=>'Portfelis',       'lt'=>'Portfelis',       'en'=>'Portfolio'],
            'rewards'       => ['fr'=>'Récompenses',          'de'=>'Belohnungen',       'es'=>'Recompensas',        'pt'=>'Recompensas',        'et'=>'Auhinnad',        'lv'=>'Atlīdzības',      'lt'=>'Atlygiai',        'en'=>'Rewards'],
            'support'       => ['fr'=>'Assistance',           'de'=>'Support',           'es'=>'Soporte',            'pt'=>'Suporte',            'et'=>'Tugi',            'lv'=>'Atbalsts',        'lt'=>'Palaikymas',      'en'=>'Support'],
            'settings'      => ['fr'=>'Paramètres',           'de'=>'Einstellungen',     'es'=>'Configuración',      'pt'=>'Configurações',      'et'=>'Seaded',          'lv'=>'Iestatījumi',     'lt'=>'Nustatymai',      'en'=>'Settings'],
            'logout'        => ['fr'=>'Déconnexion',          'de'=>'Abmelden',          'es'=>'Cerrar sesión',      'pt'=>'Sair',               'et'=>'Logi välja',      'lv'=>'Iziet',           'lt'=>'Atsijungti',      'en'=>'Logout'],
            'cards'         => ['fr'=>'Carte Virtuelle',      'de'=>'Virtuelle Karte',   'es'=>'Tarjeta Virtual',    'pt'=>'Cartão Virtual',     'et'=>'Virtuaalkaart',   'lv'=>'Virtuālā karte',  'lt'=>'Virtuali kortelė','en'=>'Virtual Card'],
            'wallets'       => ['fr'=>'Tous les portefeuilles','de'=>'Alle Wallets',     'es'=>'Todas las carteras', 'pt'=>'Todas as carteiras', 'et'=>'Kõik rahakotid',  'lv'=>'Visas maki',      'lt'=>'Visos piniginės', 'en'=>'All Wallets'],
        ];

        foreach ($translations as $type => $trans) {
            DB::table('user_navigations')->where('type', $type)->update([
                'translation' => json_encode($trans),
                'updated_at'  => now(),
            ]);
        }
    }

    public function down(): void {}
};
