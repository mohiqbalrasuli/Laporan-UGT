<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LaporanGTModel extends Model
{
    protected $table = 'table_laporan_gt';
    protected $fillable = [
        'gt_id',
        'laporan_ke',
        'bulan_tahun',
        'wali_kelas',
        'guru_kelas',
        'guru_fan',
        'jenis_kelamin_murid',
        'jumlah_mengajar_satu_minggu',
        'jumlah_mengajar_satu_bulan',
        'alasan_tidak_masuk',
        'jumlah_hari_sakit',
        'jumlah_hari_pulang',
        'jumlah_alasan_lain',
        'kegiatan_gt_Diluar_kelas',
        'interaksi_dengan_pjgt',
        'interaksi_dengan_kepmad',
        'interaksi_dengan_guru',
        'bisyaroh_bulan_ini',
        'bisyaroh_bulan_ini_sebanyak',
        'kendala_bulan_ini',
        'langkah_pemecahan_kendala',
        'tugas_dari_km_pjgt',
        'tugas_belum_terlaksana',
        'usulan',
        'tanggal_laporan'
    ];
}
