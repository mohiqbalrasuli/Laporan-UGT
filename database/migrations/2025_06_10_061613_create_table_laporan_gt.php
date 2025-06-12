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
        Schema::create('table_laporan_gt', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('gt_id')->nullable();

            $table->foreign('gt_id')
                  ->references('id')->on('table_gt')
                  ->onDelete('set null');
            $table->integer('laporan_ke')->nullable();
            $table->string('bulan_tahun')->nullable();
            $table->string('wali_kelas')->nullable();
            $table->string('guru_kelas')->nullable();
            $table->string('guru_fan')->nullable();
            $table->string('jenis_kelamin_murid')->nullable();
            $table->integer('jumlah_mengajar_satu_minggu')->nullable();
            $table->integer('jumlah_mengajar_satu_bulan')->nullable();
            $table->string('alasan_tidak_masuk')->nullable();
            $table->integer('jumlah_hari_sakit')->nullable();
            $table->integer('jumlah_hari_pulang')->nullable();
            $table->integer('jumlah_alasan_lain')->nullable();
            $table->string('kegiatan_gt_Diluar_kelas')->nullable();
            $table->string('interaksi_dengan_pjgt')->nullable();
            $table->string('interaksi_dengan_kepmad')->nullable();
            $table->string('interaksi_dengan_guru')->nullable();
            $table->string('bisyaroh_bulan_ini')->nullable();
            $table->integer('bisyaroh_bulan_ini_sebanyak')->nullable();
            $table->string('kendala_bulan_ini')->nullable();
            $table->string('langkah_pemecahan_kendala')->nullable();
            $table->string('tugas_dari_km_pjgt')->nullable();
            $table->string('tugas_belum_terlaksana')->nullable();
            $table->string('usulan')->nullable();
            $table->string('tanggal_laporan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_laporan_gt');
    }
};
