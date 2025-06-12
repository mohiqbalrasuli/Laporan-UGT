<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LaporanPJGTModel extends Model
{
    protected $table = 'table_laporan_pjgt';
    protected $fillable = [
        'pjgt_id',
        'laporan_ke',
        'laporan_bulan',
        'tahun',
        'wali_kelas',
        'tingkat',
        'guru_fak_kelas',
        'menjadi_guru',
        'gt_masuk_madrasah',
        'murid_balighah',
        'jenis_kegiatan',
        'waktu_kegiatan',
        'sifat_kegiatan',
        'rambut_gt',
        'gt_bepergian',
        'berpergian_sebanyak',
        'tujuan_bepergian',
        'gt_pernah_pulang_kampung',
        'pulang_kampung_sebanyak',
        'gt_melakukan_pelanggaran',
        'pelanggran_berupa',
        'pjgt_mengambil_tindakan',
        'tindakan_berupa',
        'surat_ijin_dipakai',
        'hubungan_dengan_pjgt',
        'hubungan_dengan_kepmad',
        'hubungan_dengan_guru',
        'hubungan_dengan_wali_murid_masyarakat',
        'hubungan_dengan_murid_dikelas',
        'hubungan_dengan_murid_diluar',
        'tanggapan_murid',
        'tanggapan_masyarakat',
        'bisyaroh_satu',
        'bisyaroh_satu_sebanyak',
        'bisyaroh_dua',
        'bisyaroh_dua_sebanyak',
        'bisyaroh_tiga',
        'bisyaroh_tiga_sebanyak',
        'bisyaroh_empat',
        'bisyaroh_empat_sebanyak',
        'bisyaroh_lima',
        'bisyaroh_lima_sebanyak',
        'bisyaroh_enam',
        'bisyaroh_enam_sebanyak',
        'bisyaroh_tujuh',
        'bisyaroh_tujuh_sebanyak',
        'bisyaroh_delapan',
        'bisyaroh_delapan_sebanyak',
        'bisyaroh_sembilan',
        'bisyaroh_sembilan_sebanyak',
        'bisyaroh_sepuluh',
        'bisyaroh_sepuluh_sebanyak',
        'usulan',
        'tanggal_laporan'
    ];

    public function pjgt()
    {
        return $this->belongsTo(PJGTModel::class, 'pjgt_id'); // sesuaikan foreign key-nya
    }
}
