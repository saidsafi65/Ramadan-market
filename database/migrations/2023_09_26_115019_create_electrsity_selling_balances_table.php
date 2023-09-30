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
        Schema::create('electrsity_selling_balances', function (Blueprint $table) {
            $table->id();
            $table->decimal('electrsity_blance');
            $table->decimal('selling_blance');
            $table->decimal('remaining_blance');
            $table->boolean('is_loan');
            $table->string('loan_name')->nullable();
            $table->string('remm')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('electrsity_selling_balances');
    }
};
