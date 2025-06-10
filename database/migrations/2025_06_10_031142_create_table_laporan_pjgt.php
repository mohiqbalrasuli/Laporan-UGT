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
        Schema::create('table_laporan_pjgt', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pjgt_id')->nullable();
            $table->foreign('pjgt_id')
                  ->references('id')->on('table_pjgt')
                  ->onDelete('set null');
            $table->integer('laporan_ke')->nullable();
            $table->string('laporan_bulan')->nullable();
            $table->string('tahun')->nullable();
            $table->string('wali_kelas')->nullable();
            $table->string('tingkat')->nullable();
            $table->string('guru_fak_kelas')->nullable();
            $table->string('menjadi_guru')->nullable();
            $table->string('gt_menjadi_guru')->nullable();
            $table->string('gt_masuk_madrasah')->nullable();
            $table->string('murid_balighah')->nullable();
            $table->string('jenis_kegiatan')->nullable();
            $table->string('waktu_kegiatan')->nullable();
            $table->string('sifat_kegiatan')->nullable();
            $table->string('rambut_gt')->nullable();
            $table->string('gt_bepergian')->nullable();
            $table->string('berpergian_sebanyak')->nullable();
            $table->string('tujuan_bepergian')->nullable();
            $table->string('gt_pernah_pulang_kampung')->nullable();
            $table->string('pulang_kampung_sebanyak')->nullable();
            $table->string('gt_melakukan_pelanggaran')->nullable();
            $table->string('pelanggran_berupa')->nullable();
            $table->string('pjgt_mengambil_tindakan')->nullable();
            $table->string('tindakan_berupa')->nullable();
            $table->string('surat_ijin_dipakai')->nullable();
            $table->string('hubungan_dengan_pjgt')->nullable();
            $table->string('hubungan_dengan_kepmad')->nullable();
            $table->string('hubungan_dengan_guru')->nullable();
            $table->string('hubungan_dengan_wali_murid_masyarakat')->nullable();
            $table->string('hubungan_dengan_murid_dikelas')->nullable();
            $table->string('hubungan_dengan_murid_diluar')->nullable();
            $table->string('tanggapan_murid')->nullable();
            $table->string('tanggapan_masyarakat')->nullable();
            $table->string('bisyaroh_satu')->nullable();
            $table->integer('bisyaroh_satu_sebanyak')->nullable();
            $table->string('bisyaroh_dua')->nullable();
            $table->integer('bisyaroh_dua_sebanyak')->nullable();
            $table->string('bisyaroh_tiga')->nullable();
            $table->integer('bisyaroh_tiga_sebanyak')->nullable();
            $table->string('bisyaroh_empat')->nullable();
            $table->integer('bisyaroh_empat_sebanyak')->nullable();
            $table->string('bisyaroh_lima')->nullable();
            $table->integer('bisyaroh_lima_sebanyak')->nullable();
            $table->string('bisyaroh_enam')->nullable();
            $table->integer('bisyaroh_enam_sebanyak')->nullable();
            $table->string('bisyaroh_tujuh')->nullable();
            $table->integer('bisyaroh_tujuh_sebanyak')->nullable();
            $table->string('bisyaroh_delapan')->nullable();
            $table->integer('bisyaroh_delapan_sebanyak')->nullable();
            $table->string('bisyaroh_sembilan')->nullable();
            $table->integer('bisyaroh_sembilan_sebanyak')->nullable();
            $table->string('bisyaroh_sepuluh')->nullable();
            $table->integer('bisyaroh_sepuluh_sebanyak')->nullable();
            $table->string('usulan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_laporan_pjgt');
    }
};
