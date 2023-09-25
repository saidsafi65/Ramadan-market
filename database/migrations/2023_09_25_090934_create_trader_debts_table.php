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
        Schema::create('trader_debts', function (Blueprint $table) {
            $table->id();
            $table->string('debt_type');
            $table->string('debt_name');
            $table->decimal('debt_money');
            $table->string('remm')->nullable();
            $table->timestamp('date_paying')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trader_debts');
    }
};
