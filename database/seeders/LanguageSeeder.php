<?php

namespace Database\Seeders;

use App\Models\Language;
use Illuminate\Database\Seeder;

class LanguageSeeder extends Seeder
{
    public function run(): void
    {
        $languages = [
            ['name' => 'Deutsch',    'locale' => 'de', 'is_default' => true,  'status' => true],
            ['name' => 'English',    'locale' => 'en', 'is_default' => false, 'status' => true],
            ['name' => 'Français',   'locale' => 'fr', 'is_default' => false, 'status' => true],
            ['name' => 'Español',    'locale' => 'es', 'is_default' => false, 'status' => true],
            ['name' => 'Português',  'locale' => 'pt', 'is_default' => false, 'status' => true],
        ];

        foreach ($languages as $lang) {
            Language::updateOrCreate(['locale' => $lang['locale']], $lang);
        }
    }
}
