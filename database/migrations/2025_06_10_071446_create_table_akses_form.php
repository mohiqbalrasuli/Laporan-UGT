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
        Schema::create('table_akses_form', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal_mulai_pjgt');
            $table->date('tanggal_akhir_pjgt');
            $table->date('tanggal_mulai_gt');
            $table->date('tanggal_akhir_gt');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_akses_form');
    }
};
