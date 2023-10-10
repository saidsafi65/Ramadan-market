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
        Schema::create('mobile_ex_expenses', function (Blueprint $table) {
            $table->id();
            $table->string('mobileEx_type',300);
            $table->decimal('mobileEx_total');
            $table->boolean('is_loan_mobileEx');
            $table->string('loan_name_mobileEx')->nullable();
            $table->string('mobileEx_remm')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mobile_ex_expenses');
    }
};
