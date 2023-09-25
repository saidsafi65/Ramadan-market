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
        Schema::create('ooredo_o_balances', function (Blueprint $table) {
            $table->id();
            $table->decimal('ooredo_blance');
            $table->decimal('recent_add');
            $table->decimal('recent_withdrawn')->nullable();
            $table->decimal('old_ooredo_blance');
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
        Schema::dropIfExists('ooredo_o_balances');
    }
};
