<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('loan_requests', function (Blueprint $table) {
            $table->string('currency', 10)->default('EUR')->after('amount');
            $table->string('id_doc_recto')->nullable()->after('id_number');
            $table->string('id_doc_verso')->nullable()->after('id_doc_recto');
            $table->string('address_proof')->nullable()->after('id_doc_verso');
        });
    }

    public function down(): void
    {
        Schema::table('loan_requests', function (Blueprint $table) {
            $table->dropColumn(['currency', 'id_doc_recto', 'id_doc_verso', 'address_proof']);
        });
    }
};
