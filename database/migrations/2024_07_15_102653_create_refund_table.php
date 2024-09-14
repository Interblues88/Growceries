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
        Schema::create('refund', function (Blueprint $table) {
            $table->id('refundId');
            $table->unsignedBigInteger('orderId');
            $table->string('content', 255);
            $table->string('image', 255);
            $table->timestamp('refundedtime')->nullable();
            $table->timestamps();
            $table->foreign('orderId')->references('orderId')->on('transactionHeader')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('refund');
    }
};
