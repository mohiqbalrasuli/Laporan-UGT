<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class pengajuanGt extends Model
{
    protected $table = 'table_pengajuan_gt';
    protected $fillable = [
        'nama_madrasah',
        'alamat_madrasah',
        'no_telp',
        'nama_pjgt',
        'umur_pjgt',
        'kepala_madrasah',
        'umur_kepala_madrasah',
        'ketua',
        'wakil_ketua',
        'sekretaris',
        'bendahara',
        'madrasah_berada_di',
        'kitab_yang_dibaca',
        'bahasa_makna_kitab',
        'bahasa_pengantar_Pelajaran',
        'jumlah_guru',
        'jumlah_guru_lk',
        'jumlah_guru_pr',
        'jumlah_murid_lk',
        'jumlah_murid_pr',
        'jumlah_murid',
        'jumlah_kelas_1',
        'jumlah_kelas_1_lk',
        'jumlah_kelas_1_pr',
        'jumlah_kelas_2',
        'jumlah_kelas_2_lk',
        'jumlah_kelas_2_pr',
        'jumlah_kelas_3',
        'jumlah_kelas_3_lk',
        'jumlah_kelas_3_pr',
        'jumlah_kelas_4',
        'jumlah_kelas_4_lk',
        'jumlah_kelas_4_pr',
        'jumlah_kelas_5',
        'jumlah_kelas_5_lk',
        'jumlah_kelas_5_pr',
        'jumlah_kelas_6',
        'jumlah_kelas_6_lk',
        'jumlah_kelas_6_pr',
        'gt_yang_diajukan',
        'rencana_mengajar_kelas',
        'lain_lain',
    ];
}
