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
        Schema::create('transactionDetail', function (Blueprint $table) {
            $table->id('orderDetailId');
            $table->unsignedBigInteger('orderId');
            $table->unsignedBigInteger('productId');
            $table->integer('quantity');
            $table->timestamps();
            $table->foreign('orderId')->references('orderId')->on('transactionHeader')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('productId')->references('productId')->on('product')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaction_detail');
    }
};
