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
        Schema::create('jawal_balances', function (Blueprint $table) {
            $table->id();
            $table->decimal('jawal_blance');
            $table->decimal('recent_add');
            $table->decimal('recent_withdrawn')->nullable();
            $table->decimal('old_jawal_blance');
            $table->boolean('is_debt');
            $table->string('trader_name')->nullable();
            $table->string('remm')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jawal_balances');
    }
};
