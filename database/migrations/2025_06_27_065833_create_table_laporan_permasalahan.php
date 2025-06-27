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
        Schema::create('table_laporan_permasalahan_pjgt', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pjgt_id')->nullable();
            $table->foreign('pjgt_id')
                  ->references('id')->on('table_pjgt')
                  ->onDelete('set null');
            $table->string('Subjek')->nullable();
            $table->text('Isi')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_laporan_permasalahan');
    }
};
