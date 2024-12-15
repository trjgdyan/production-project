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
            $table->string('NAME');
            $table->string('TYPE')->nullable();
            $table->string('KATEGORI')->nullable();
            $table->string('SIZE')->nullable();
            $table->string('ISI')->nullable();
            $table->string('SATUAN')->nullable();
            $table->decimal('HARGA', 10, 2)->nullable();
            $table->text('BOM')->nullable();
            $table->string('MESIN')->nullable();
            $table->string('WARNA')->nullable();
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
