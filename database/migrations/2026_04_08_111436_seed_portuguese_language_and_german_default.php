<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        // Ajouter le portugais si absent
        $pt = DB::table('languages')->where('locale', 'pt')->first();
        if (! $pt) {
            DB::table('languages')->insert([
                'name'       => 'Português',
                'locale'     => 'pt',
                'status'     => 1,
                'is_default' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        } else {
            DB::table('languages')->where('locale', 'pt')->update(['status' => 1, 'updated_at' => now()]);
        }

        // Définir l'allemand comme langue par défaut
        DB::table('languages')->update(['is_default' => 0]);
        DB::table('languages')->where('locale', 'de')->update(['is_default' => 1, 'updated_at' => now()]);
    }

    public function down(): void {}
};
