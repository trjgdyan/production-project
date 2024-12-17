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
            $table->string('NO_PROUKSI');
            $table->string('WO_NUMBER');
            $table->string('ITEM_ID');
            $table->string('PARTNUMBER');
            $table->string('TYPE');
            $table->string('CUSTOMER');
            $table->string('CUST_ID');
            $table->float('QTY');
            $table->float('WEIGHT');
            $table->string('SECTION');
            $table->string('DETAIL');
            $table->string('OPR_NAME');
            $table->integer('SHIFT');
            $table->string('UPDATED_BY');
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
