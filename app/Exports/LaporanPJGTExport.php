<?php

namespace App\Exports;

use App\Models\LaporanPJGTModel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class LaporanPJGTExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $laporan = LaporanPJGTModel::with(['pjgt.user', 'pjgt.madrasah', 'pjgt.gt.user'])->get();
        $data= $laporan->map(function ($laporan,$index) {
            return [
                'no' => $index + 1,
                'laporan_ke' => $laporan->laporan_ke,
                'laporan_bulan' => $laporan->laporan_bulan,
                'tahun' => $laporan->tahun,
                'wali_kelas' => $laporan->wali_kelas,
                'tingkat' => implode(', ', is_array($laporan->tingkat) ? $laporan->tingkat : json_decode($laporan->tingkat, true) ?? []),
                'guru_fak_kelas' => implode(', ', is_array($laporan->guru_fak_kelas) ? $laporan->guru_fak_kelas : json_decode($laporan->guru_fak_kelas, true) ?? []),
                'menjadi_guru' => implode(', ', is_array($laporan->menjadi_guru) ? $laporan->menjadi_guru : json_decode($laporan->menjadi_guru, true) ?? []),
                'gt_masuk_madrasah' => $laporan->gt_masuk_madrasah,
                'murid_balighah' => $laporan->murid_balighah,
                'jenis_kegiatan' => $laporan->jenis_kegiatan,
                'waktu_kegiatan' => implode(', ', is_array($laporan->waktu_kegiatan) ? $laporan->waktu_kegiatan : json_decode($laporan->waktu_kegiatan, true) ?? []),
                'sifat_kegiatan' => $laporan->sifat_kegiatan,
                'rambut_gt' => $laporan->rambut_gt,
                'gt_bepergian' => $laporan->gt_bepergian,
                'berpergian_sebanyak' => $laporan->berpergian_sebanyak,
                'tujuan_bepergian' => $laporan->tujuan_bepergian,
                'gt_pernah_pulang_kampung' => $laporan->gt_pernah_pulang_kampung,
                'pulang_kampung_sebanyak' => $laporan->pulang_kampung_sebanyak,
                'gt_melakukan_pelanggaran' => $laporan->gt_melakukan_pelanggaran,
                'pelanggran_berupa' => $laporan->pelanggran_berupa,
                'pjgt_mengambil_tindakan' => $laporan->pjgt_mengambil_tindakan,
                'tindakan_berupa' => $laporan->tindakan_berupa,
                'surat_ijin_dipakai' => $laporan->surat_ijin_dipakai,
                'hubungan_dengan_pjgt' => $laporan->hubungan_dengan_pjgt,
                'hubungan_dengan_kepmad' => $laporan->hubungan_dengan_kepmad,
                'hubungan_dengan_guru' => $laporan->hubungan_dengan_guru,
                'hubungan_dengan_wali_murid_masyarakat' => $laporan->hubungan_dengan_wali_murid_masyarakat,
                'hubungan_dengan_murid_dikelas' => $laporan->hubungan_dengan_murid_dikelas,
                'hubungan_dengan_murid_diluar' => $laporan->hubungan_dengan_murid_diluar,
                'tanggapan_murid' => $laporan->tanggapan_murid,
                'tanggapan_masyarakat' => $laporan->tanggapan_masyarakat,
                'bisyaroh_satu' => $laporan->bisyaroh_satu,
                'bisyaroh_satu_sebanyak' => $laporan->bisyaroh_satu_sebanyak,
                'bisyaroh_dua' => $laporan->bisyaroh_dua,
                'bisyaroh_dua_sebanyak' => $laporan->bisyaroh_dua_sebanyak,
                'bisyaroh_tiga' => $laporan->bisyaroh_tiga,
                'bisyaroh_tiga_sebanyak' => $laporan->bisyaroh_tiga_sebanyak,
                'bisyaroh_empat' => $laporan->bisyaroh_empat,
                'bisyaroh_empat_sebanyak' => $laporan->bisyaroh_empat_sebanyak,
                'bisyaroh_lima' => $laporan->bisyaroh_lima,
                'bisyaroh_lima_sebanyak' => $laporan->bisyaroh_lima_sebanyak,
                'bisyaroh_enam' => $laporan->bisyaroh_enam,
                'bisyaroh_enam_sebanyak' => $laporan->bisyaroh_enam_sebanyak,
                'bisyaroh_tujuh' => $laporan->bisyaroh_tujuh,
                'bisyaroh_tujuh_sebanyak' => $laporan->bisyaroh_tujuh_sebanyak,
                'bisyaroh_delapan' => $laporan->bisyaroh_delapan,
                'bisyaroh_delapan_sebanyak' => $laporan->bisyaroh_delapan_sebanyak,
                'bisyaroh_sembilan' => $laporan->bisyaroh_sembilan,
                'bisyaroh_sembilan_sebanyak' => $laporan->bisyaroh_sembilan_sebanyak,
                'bisyaroh_sepuluh' => $laporan->bisyaroh_sepuluh,
                'bisyaroh_sepuluh_sebanyak' => $laporan->bisyaroh_sepuluh_sebanyak,
                'usulan' => $laporan->usulan,
            ];
        });
        return $data;
    }
    public function headings(): array
    {
        return [
            'No',
            'Laporan Ke',
            'Laporan Bulan',
            'Tahun',
            'Wali Kelas',
            'Tingkat',
            'Guru Fak Kelas',
            'Menjadi Guru',
            'GT Masuk Madrasah',
            'Murid Balighah',
            'Jenis Kegiatan',
            'Waktu Kegiatan',
            'Sifat Kegiatan',
            'Rambut GT',
            'GT Bepergian',
            'Berpergian Sebanyak',
            'Tujuan Bepergian',
            'GT Pernah Pulang Kampung',
            'Pulang Kampung Sebanyak',
            'GT Melakukan Pelanggaran',
            'Pelanggran Berupa',
            'PJGT Mengambil Tindakan',
            'Tindakan Berupa',
            'Surat Ijin Dipakai',
            'Hubungan Dengan PJGT',
            'Hubungan Dengan Kepmad',
            'Hubungan Dengan Guru',
            'Hubungan Dengan Wali Murid Masyarakat',
            'Hubungan Dengan Murid Dikelas',
            'Hubungan Dengan Murid Diluar',
            'Tanggapan Murid',
            'Tanggapan Masyarakat',
            'Bisyaroh Satu',
            'Bisyaroh Satu Sebanyak',
            'Bisyaroh Dua',
            'Bisyaroh Dua Sebanyak',
            'Bisyaroh Tiga',
            'Bisyaroh Tiga Sebanyak',
            'Bisyaroh Empat',
            'Bisyaroh Empat Sebanyak',
            'Bisyaroh Lima',
            'Bisyaroh Lima Sebanyak',
            'Bisyaroh Enam',
            'Bisyaroh Enam Sebanyak',
            'Bisyaroh Tujuh',
            'Bisyaroh Tujuh Sebanyak',
            'Bisyaroh Delapan',
            'Bisyaroh Delapan Sebanyak',
            'Bisyaroh Sembilan',
            'Bisyaroh Sembilan Sebanyak',
            'Bisyaroh Sepuluh',
            'Bisyaroh Sepuluh Sebanyak',
            'Usulan',
        ];
    }
}
