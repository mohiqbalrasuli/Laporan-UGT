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
        Schema::create('table_laporan_permasalahan_gt', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('gt_id')->nullable();
            $table->foreign('gt_id')
                  ->references('id')->on('table_gt')
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
        Schema::dropIfExists('table_laporan_permasalahan_gt');
    }
};
