<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (! Schema::hasColumn('email_templates', 'lang')) {
            Schema::table('email_templates', function (Blueprint $table) {
                $table->string('lang', 5)->default('fr')->after('code');
            });
        }

        Schema::table('email_templates', function (Blueprint $table) {
            $table->dropUnique('email_templates_code_unique');
            $table->unique(['code', 'lang']);
        });
    }

    public function down(): void
    {
        Schema::table('email_templates', function (Blueprint $table) {
            $table->dropUnique(['code', 'lang']);
            $table->unique('code');
        });

        if (Schema::hasColumn('email_templates', 'lang')) {
            Schema::table('email_templates', function (Blueprint $table) {
                $table->dropColumn('lang');
            });
        }
    }
};
