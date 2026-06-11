<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (! Schema::hasColumn('loan_requests', 'locale')) {
            Schema::table('loan_requests', function (Blueprint $table) {
                $table->string('locale', 5)->nullable()->after('status');
            });
        }
    }

    public function down(): void
    {
        if (Schema::hasColumn('loan_requests', 'locale')) {
            Schema::table('loan_requests', function (Blueprint $table) {
                $table->dropColumn('locale');
            });
        }
    }
};
