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
        Schema::create('rejects', function (Blueprint $table) {
            $table->id();
            $table->string('NO_REJECT');
            $table->string('WO_NUMBER')->nullable();
            $table->string('ITEM_ID')->nullable();
            $table->string('PARTNUMBER')->nullable();
            $table->string('TYPE')->nullable();
            $table->string('CUSTOMER')->nullable();
            $table->string('CUST_ID')->nullable();
            $table->float('QTY')->nullable();
            $table->float('WEIGHT')->nullable();
            $table->string('SECTION')->nullable();
            $table->string('DETAIL')->nullable();
            $table->string('OPR_NAME')->nullable();
            $table->integer('SHIFT')->nullable();
            $table->string('UPDATED_BY')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rejects');
    }
};
