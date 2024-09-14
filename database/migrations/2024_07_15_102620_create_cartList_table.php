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
        Schema::create('cartList', function (Blueprint $table) {
            $table->unsignedBigInteger('cartId');
            $table->unsignedBigInteger('productId');
            $table->integer('quantity')->default(1);
            $table->foreign('cartId')->references('cartId')->on('cart')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('productId')->references('productId')->on('product')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
            $table->primary(['cartId', 'productId']);

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cart_list');
    }
};
