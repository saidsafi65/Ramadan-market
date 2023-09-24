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
        Schema::create('snaks', function (Blueprint $table) {
            $table->id();
            $table->string('snaks_type');
            $table->string('snaks_weight')->nullable();
            $table->decimal('snaks_prise');
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
        Schema::dropIfExists('snaks');
    }
};
