<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('cards', function (Blueprint $table) {
            $table->unsignedBigInteger('card_holder_id')->nullable()->change();
            $table->string('cvc')->nullable()->change();
            $table->string('expiration_month')->nullable()->change();
            $table->string('expiration_year')->nullable()->change();
            $table->string('last_four_digits')->nullable()->change();
        });
    }

    public function down(): void
    {
        Schema::table('cards', function (Blueprint $table) {
            $table->unsignedBigInteger('card_holder_id')->nullable(false)->change();
        });
    }
};
