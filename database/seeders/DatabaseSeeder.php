<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $this->call([
            PermissionSeeder::class,
            LanguageSeeder::class,
            EmailTemplateSeeder::class,
            SettingsSeeder::class,
            // AdminSeeder::class,       // une seule fois manuellement
            // PluginSeeder::class,
            // GatewaySeeder::class,
            // UserNavigationSeeder::class,
            // CronJobSeeder::class,
            // PushNotificationSeeder::class
        ]);
    }
}
