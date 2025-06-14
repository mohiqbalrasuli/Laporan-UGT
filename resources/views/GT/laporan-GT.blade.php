@extends('GT.layout.template_GT')

@section('title','Data Laporan Guru Tugas')

@section('content')
@foreach ($laporan_gt as $laporan)
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-12">
            <div class="bg-light rounded h-100 p-4">
                <div class="d-flex justify-content-between align-items-center">
                    <h6 class="mb-4">Data Laporan Guru Tugas</h6>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th>Laporan Ke</th>
                            <th> : </th>
                            <td>{{ $laporan->laporan_ke }}</td>
                        </tr>
                        <tr>
                            <th>Bulan / Tahun</th>
                            <th> : </th>
                            <td>{{ $laporan->bulan_tahun }}</td>
                        </tr>
                        <tr>
                            <th>Nama</th>
                            <th> : </th>
                            <td>{{ $laporan->gt->user->name }}</td>
                        </tr>
                        <tr>
                            <th>Alamat Lengkap</th>
                            <th> : </th>
                            <td>{{ $laporan->gt->alamat }}</td>
                        </tr>
                        <tr>
                            <th>Asal Kelas</th>
                            <th> : </th>
                            <td>{{ $laporan->gt->asal_kelas }}</td>
                        </tr>
                        <tr>
                            <th>Status Tugas</th>
                            <th> : </th>
                            <td>{{ $laporan->gt->status_tugas }}</td>
                        </tr>
                        <tr>
                            <th>Nama Madrasah</th>
                            <th> : </th>
                            <td>{{ $laporan->gt->madrasah->nama_madrasah ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th>Alamat Madrasah</th>
                            <th> : </th>
                            <td>{{ $laporan->gt->madrasah->alamat_madrasah ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th>Nama Kepala Madrasah</th>
                            <th> : </th>
                            <td>{{ $laporan->gt->madrasah->nama_kepala_madrasah ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th>Nama PJGT</th>
                            <th> : </th>
                            <td>{{ $laporan->gt->pjgt->user->name ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th>Wali Kelas</th>
                            <th> : </th>
                            <td>{{ $laporan->wali_kelas }}</td>
                        </tr>
                        <tr>
                            <th>Guru Kelas</th>
                            <th> : </th>
                            <td>{{ implode(', ', $laporan->guru_kelas) }}</td>
                        </tr>
                        <tr>
                            <th>Guru Fan</th>
                            <th> : </th>
                            <td>{{ $laporan->guru_fan }}</td>
                        </tr>
                        <tr>
                            <th>Jenis Kelamin Murid</th>
                            <th> : </th>
                            <td>{{ implode(', ', $laporan->jenis_kelamin_murid) }}</td>
                        </tr>
                        <tr>
                            <th>Jumlah Hari Mengajar 1 Pekan</th>
                            <th> : </th>
                            <td>{{ $laporan->jumlah_mengajar_satu_minggu }}</td>
                        </tr>
                        <tr>
                            <th>Jumlah Hari Mengajar 1 Bulan</th>
                            <th> : </th>
                            <td>{{ $laporan->jumlah_mengajar_satu_bulan }}</td>
                        </tr>
                        <tr>
                            <th>Alasan Tidak Mengajar</th>
                            <th> : </th>
                            <td>{{ implode(', ', $laporan->alasan_tidak_masuk) }}</td>
                        </tr>
                        <tr>
                            <th>Jumlah Hari Sakit</th>
                            <th> : </th>
                            <td>{{ $laporan->jumlah_hari_sakit }}</td>
                        </tr>
                        <tr>
                            <th>Jumlah Hari Pulang</th>
                            <th> : </th>
                            <td>{{ $laporan->jumlah_hari_pulang }}</td>
                        </tr>
                        <tr>
                            <th>Jumlah Hari Lain</th>
                            <th> : </th>
                            <td>{{ $laporan->jumlah_alasan_lain }}</td>
                        </tr>
                        <tr>
                            <th>Kegiatan GT Di Luar Kelas</th>
                            <th> : </th>
                            <td>{{ implode(', ', $laporan->kegiatan_gt_Diluar_kelas) }}</td>
                        </tr>
                        <tr>
                            <th>Interaksi Dengan PJGT</th>
                            <th> : </th>
                            <td>{{ $laporan->interaksi_dengan_pjgt }}</td>
                        </tr>
                        <tr>
                            <th>Interaksi Dengan Kepala Madrasah</th>
                            <th> : </th>
                            <td>{{ $laporan->interaksi_dengan_kepmad }}</td>
                        </tr>
                        <tr>
                            <th>Interaksi Dengan Guru</th>
                            <th> : </th>
                            <td>{{ $laporan->interaksi_dengan_guru }}</td>
                        </tr>
                        <tr>
                            <th>Bisyaroh Bulan Ini</th>
                            <th> : </th>
                            <td>{{ $laporan->bisyaroh_bulan_ini }}</td>
                        </tr>
                        <tr>
                            <th>Jumlah Bisyaroh</th>
                            <th> : </th>
                            <td>Rp. {{ number_format($laporan->bisyaroh_bulan_ini_sebanyak, 0, ',', '.') }}</td>
                        </tr>
                        <tr>
                            <th>Kendala Bulan Ini</th>
                            <th> : </th>
                            <td>{{ $laporan->kendala_bulan_ini }}</td>
                        </tr>
                        <tr>
                            <th>Langkah Pemecahan Kendala</th>
                            <th> : </th>
                            <td>{{ $laporan->langkah_pemecahan_kendala }}</td>
                        </tr>
                        <tr>
                            <th>Tugas Baru Dari KM/PJGT</th>
                            <th> : </th>
                            <td>{{ $laporan->tugas_dari_km_pjgt }}</td>
                        </tr>
                        <tr>
                            <th>Tugas Belum Terlaksana</th>
                            <th> : </th>
                            <td>{{ $laporan->tugas_belum_terlaksana }}</td>
                        </tr>
                        <tr>
                            <th>Usulan/Saran</th>
                            <th> : </th>
                            <td>{{ $laporan->usulan }}</td>
                        </tr>
                        <tr>
                            <th>Tanggal Laporan</th>
                            <th> : </th>
                            <td>{{ $laporan->tanggal_laporan }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection
