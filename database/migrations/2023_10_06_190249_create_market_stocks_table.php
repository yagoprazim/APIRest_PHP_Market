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
        Schema::create('market_stocks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('marketplace_id');
            $table->unsignedBigInteger('product_id');
            $table->double('unit_price');
            $table->integer('stock');
            $table->timestamps();

            $table->foreign('marketplace_id')->references('id')->on('marketplaces');
            $table->foreign('product_id')->references('id')->on('products');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('market_stocks');
    }
};
