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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('NAME')->nullable();
            $table->string('ITEM_ID')->nullable();
            $table->string('PARTNUMBER')->nullable();
            $table->string('PARTNAME')->nullable();
            $table->string('TYPE')->nullable();
            $table->string('CUSTOMER')->nullable();
            $table->string('CUST_ID')->nullable();
            $table->string('SATUAN')->nullable();
            $table->integer('ISI')->nullable();
            $table->string('SIZE')->nullable();
            $table->decimal('HARGA', 10, 2)->nullable();
            $table->string('STATUS')->nullable();
            $table->timestamp('CREATED_DATE')->useCurrent()->nullable();
            $table->string('CREATED_BY')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
