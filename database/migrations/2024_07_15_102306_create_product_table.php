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
        Schema::create('product', function (Blueprint $table) {
            $table->id('productId');
            $table->unsignedBigInteger('productDetailId')->nullable(false);
            $table->string('productName', 100)->nullable(false);
            $table->integer('productPrice')->nullable(false);
            $table->integer('stock')->nullable(false);
            $table->string('variant', 200)->nullable(false);
            $table->string('image', 255)->nullable();
            $table->foreign('productDetailId')->references('productDetailId')->on('productDetail')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product');
    }
};
