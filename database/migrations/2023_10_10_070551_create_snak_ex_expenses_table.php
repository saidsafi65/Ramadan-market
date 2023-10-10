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
        Schema::create('snak_ex_expenses', function (Blueprint $table) {
            $table->id();
            $table->string('snakEx_type', 300);
            $table->decimal('snakEx_total');
            $table->boolean('is_loan_snakEx');
            $table->string('loan_name_snakEx')->nullable();
            $table->string('snakEx_remm')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('snak_ex_expenses');
    }
};
