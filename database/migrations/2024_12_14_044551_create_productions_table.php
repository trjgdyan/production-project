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
        Schema::create('productions', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('NO_PRODUKSI')->unique();
            $table->timestamp('TANGGAL')->nullable();
            $table->string('ITEM_ID')->nullable();
            $table->integer('SHIFT')->nullable();
            $table->string('PARTNUMBER')->nullable();
            $table->integer('LOT')->nullable();
            $table->string('CUST_ID')->nullable();
            $table->string('ORDER_ID')->nullable();
            $table->float('OK')->nullable();
            $table->float('REJECT')->nullable();
            $table->float('WEIGHT_OK')->nullable();
            $table->float('WEIGHT_REJECT')->nullable();
            $table->string('STATUS')->nullable();
            $table->string('SECTION')->nullable();
            $table->string('WO_NUMBER')->nullable();
            $table->timestamp('CREATED_DATE')->nullable();
            $table->timestamp('LAST_UPDATE')->nullable();
            $table->string('CREATED_BY')->nullable();
            $table->string('UPDATED_BY')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productions');
    }
};
