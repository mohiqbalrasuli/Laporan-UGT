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
        Schema::create('table_madrasah', function (Blueprint $table) {
            $table->id();
            $table->string('nama_madrasah');
            $table->string('alamat_madrasah');
            $table->string('nama_kepala_madrasah');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_madrasah');
    }
};
