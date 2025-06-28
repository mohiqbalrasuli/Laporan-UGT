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
        Schema::create('table_pengajuan_gt', function (Blueprint $table) {
            $table->id();
            $table->string('nama_madrasah');
            $table->string('alamat_madrasah');
            $table->string('no_telp');
            $table->string('nama_pjgt');
            $table->integer('umur_pjgt');
            $table->string('kepala_madrasah');
            $table->string('umur_kepala_madrasah');
            $table->string('ketua');
            $table->string('wakil_ketua');
            $table->string('sekretaris');
            $table->string('bendahara');
            $table->string('madrasah_berada_di');
            $table->string('kitab_yang_dibaca');
            $table->string('bahasa_makna_kitab');
            $table->string('bahasa_pengantar_Pelajaran');
            $table->integer('jumlah_guru');
            $table->integer('jumlah_guru_lk');
            $table->integer('jumlah_guru_pr');
            $table->integer('jumlah_murid_lk');
            $table->integer('jumlah_murid_pr');
            $table->integer('jumlah_murid');
            $table->integer('jumlah_kelas_1');
            $table->integer('jumlah_kelas_1_lk');
            $table->integer('jumlah_kelas_1_pr');
            $table->integer('jumlah_kelas_2');
            $table->integer('jumlah_kelas_2_lk');
            $table->integer('jumlah_kelas_2_pr');
            $table->integer('jumlah_kelas_3');
            $table->integer('jumlah_kelas_3_lk');
            $table->integer('jumlah_kelas_3_pr');
            $table->integer('jumlah_kelas_4');
            $table->integer('jumlah_kelas_4_lk');
            $table->integer('jumlah_kelas_4_pr');
            $table->integer('jumlah_kelas_5');
            $table->integer('jumlah_kelas_5_lk');
            $table->integer('jumlah_kelas_5_pr');
            $table->integer('jumlah_kelas_6');
            $table->integer('jumlah_kelas_6_lk');
            $table->integer('jumlah_kelas_6_pr');
            $table->integer('gt_yang_diajukan');
            $table->string('rencana_mengajar_kelas');
            $table->string('lain_lain');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_pengajuan_gt');
    }
};
