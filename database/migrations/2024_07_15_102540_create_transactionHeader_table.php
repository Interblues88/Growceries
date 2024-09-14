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
        Schema::create('transactionHeader', function (Blueprint $table) {
            $table->id('orderId');
            $table->unsignedBigInteger('userId');
            $table->unsignedBigInteger('courierId');
            $table->string('orderStatus', 200)->default('Packing');
            $table->timestamp('deliveryTime');		
            $table->timestamps();
            $table->dateTime('droppeddatetime')->nullable();
            $table->string('payment', 100);
            $table->unsignedBigInteger('addressId');
            $table->foreign('addressId')->references('addressId')->on('address')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('userId')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('courierId')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaction_header');
    }
};
