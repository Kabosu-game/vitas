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
        Schema::create('loan_requests', function (Blueprint $table) {
            $table->id();
            $table->string('reference', 20)->unique();
            $table->string('civility')->nullable();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->string('phone');
            $table->string('country')->nullable();
            $table->string('id_number')->nullable();
            $table->string('loan_type');
            $table->decimal('amount', 15, 2);
            $table->integer('duration_months');
            $table->text('purpose')->nullable();
            $table->string('employment_status')->nullable();
            $table->decimal('monthly_income', 15, 2)->nullable();
            $table->enum('status', ['pending', 'reviewing', 'approved', 'rejected'])->default('pending');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->text('admin_notes')->nullable();
            $table->decimal('approved_amount', 15, 2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('loan_requests');
    }
};
