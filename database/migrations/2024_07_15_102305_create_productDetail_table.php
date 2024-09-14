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
        Schema::create('productDetail', function (Blueprint $table) {
            $table->id('productDetailId');
            $table->integer('calories');
            $table->float('fat');
            $table->float('sugar');
            $table->float('carbohydrate');
            $table->float('protein');
            $table->string('shelfLife', 100);
            $table->string('productCategory', 100);
            $table->string('productDesc', 255);
            $table->string('productName', 100);
            $table->string('origin', 100);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productDetail');
    }
};
