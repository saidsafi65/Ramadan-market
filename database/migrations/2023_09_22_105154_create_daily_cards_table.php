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
        Schema::create('daily_cards', function (Blueprint $table) {
            $table->id();
            $table->string('cardtype');
            $table->string('number_dailycard');
            $table->decimal('total_dailycard');
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
        Schema::dropIfExists('daily_cards');
    }
};
