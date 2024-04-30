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
        Schema::create('rated_products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable(true);
            $table->foreignId('product_id')->nullable(true);
            $table->double('value')->nullable(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rated_products');
    }
};
