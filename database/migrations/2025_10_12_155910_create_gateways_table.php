<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('gateways', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('logo');
            $table->string('name');
            $table->string('gateway_code')->unique();
            $table->text('supported_currencies')->nullable();
            $table->text('credentials');
            $table->string('is_withdraw')->nullable()->default('0');
            $table->boolean('status');
            $table->decimal('charge', 28, 8)->default(0);
            $table->string('charge_type')->default('fixed');
            $table->string('currency')->nullable();
            $table->string('currency_symbol')->nullable();
            $table->decimal('rate', 28, 8)->default(1);
            $table->decimal('minimum_deposit', 28, 8)->default(0);
            $table->decimal('maximum_deposit', 28, 8)->default(0);
            $table->string('type')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gateways');
    }
};
