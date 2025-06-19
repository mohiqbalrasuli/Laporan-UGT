<?php

namespace App\Exports;

use App\Models\LaporanGT;
use App\Models\LaporanGTModel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class LaporanGTExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $laporan = LaporanGTModel::with(['gt.user', 'gt.madrasah', 'gt.pjgt.user'])->get();
        $data = $laporan->map(function ($laporan, $index) {
            return [
                'no' => $index + 1,
                'laporan_ke' => $laporan->laporan_ke,
                'bulan_tahun' => $laporan->bulan_tahun,
                'tanggal_laporan' => $laporan->tanggal_laporan,
                'nama' => $laporan->gt->user->name,
                'alamat' => $laporan->gt->alamat,
                'asal_kelas' => $laporan->gt->asal_kelas,
                'status_tugas' => $laporan->gt->status_tugas,
                'nama_madrasah' => $laporan->gt->madrasah->nama_madrasah,
                'alamat_madrasah' => $laporan->gt->madrasah->alamat_madrasah,
                'nama_kepala' => $laporan->gt->madrasah->nama_kepala_madrasah,
                'nama_pjgt' => $laporan->gt->pjgt->user->name,
                'wali_kelas' => $laporan->wali_kelas,
                'guru_kelas' => implode(', ', is_array($laporan->guru_kelas) ? $laporan->guru_kelas : json_decode($laporan->guru_kelas, true) ?? []),
                'guru_fan' => implode(', ', is_array($laporan->guru_fan) ? $laporan->guru_fan : json_decode($laporan->guru_fan, true) ?? []),
                'jenis_kelamin_murid' => implode(', ', is_array($laporan->jenis_kelamin_murid) ? $laporan->jenis_kelamin_murid : json_decode($laporan->jenis_kelamin_murid, true) ?? []),
                'jumlah_mengajar_satu_minggu' => $laporan->jumlah_mengajar_satu_minggu,
                'jumlah_mengajar_satu_bulan' => $laporan->jumlah_mengajar_satu_bulan,
                'alasan_tidak_mengajar' => implode(', ', is_array($laporan->alasan_tidak_mengajar) ? $laporan->alasan_tidak_mengajar : json_decode($laporan->alasan_tidak_mengajar, true) ?? []),
                'jumlah_hari_sakit' => $laporan->jumlah_hari_sakit,
                'jumlah_hari_pulang' => $laporan->jumlah_hari_pulang,
                'jumlah_alasan_lain' => $laporan->jumlah_alasan_lain,
                'kegiatan_gt_diluar_kelas' => $laporan->kegiatan_gt_diluar_kelas,
                'interaksi_dengan_pjgt' => $laporan->interaksi_dengan_pjgt,
                'interaksi_dengan_kepmad' => $laporan->interaksi_dengan_kepmad,
                'interaksi_dengan_guru' => $laporan->interaksi_dengan_guru,
                'bisyaroh_bulan_ini' => $laporan->bisyaroh_bulan_ini,
                'bisyaroh_bulan_ini_sebanyak' => $laporan->bisyaroh_bulan_ini_sebanyak,
                'kendala_bulan_ini' => $laporan->kendala_bulan_ini,
                'langkah_pemecahan_kendala' => $laporan->langkah_pemecahan_kendala,
                'tugas_dari_km_pjgt' => $laporan->tugas_dari_km_pjgt,
                'tugas_belum_terlaksana' => $laporan->tugas_belum_terlaksana,
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
            'Bulan/Tahun',
            'Tanggal Laporan',
            'Nama',
            'Alamat',
            'Asal Kelas',
            'Status Tugas',
            'Nama Madrasah',
            'Alamat Madrasah',
            'Nama Kepala Madrasah',
            'Nama PJGT',
            'Wali Kelas',
            'Guru Kelas',
            'Guru Fan',
            'Jenis Kelamin Murid',
            'Jumlah Mengajar Satu Minggu',
            'Jumlah Mengajar Satu Bulan',
            'Alasan Tidak Mengajar',
            'Jumlah Hari Sakit',
            'Jumlah Hari Pulang',
            'Jumlah Alasan Lain',
            'Kegiatan GT Diluar Kelas',
            'Interaksi Dengan PJGT',
            'Interaksi Dengan Kepmad',
            'Interaksi Dengan Guru',
            'Bisyaroh Bulan Ini',
            'Bisyaroh Bulan Ini Sebanyak',
            'Kendala Bulan Ini',
            'Langkah Pemecahan Kendala',
            'Tugas Dari KM/PJGT',
            'Tugas Belum Terlaksana',
            'Usulan',
        ];
    }
}
