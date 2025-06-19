<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Laporan Guru Tugas</title>
    <style>
        body {
            font-family: DejaVu Sans, Arial, Helvetica, sans-serif;
            font-size: 12px;
            color: #222;
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
        }
        .footer {
            margin-top: 30px;
            text-align: right;
        }
        .section-title {
            font-weight: bold;
            margin-top: 18px;
            margin-bottom: 8px;
            font-size: 15px;
        }
        .info-table, .info-table th, .info-table td {
            border: 1px solid #222;
            border-collapse: collapse;
        }
        .info-table {
            width: 100%;
            margin-bottom: 10px;
        }
        .info-table th, .info-table td {
            padding: 6px 8px;
            text-align: left;
        }
        .info-table th {
            background: #f2f2f2;
        }
        .page-break {
            page-break-after: always;
        }
    </style>
</head>
<body>
@foreach ($laporanSet as $key => $laporan)
<div class="img">
    @php
        $path = public_path('assets/img/image.png');
        $img = 'data:image/png;base64,' . base64_encode(file_get_contents($path));
    @endphp

    <img src="{{ $img }}" width="350px">
</div>
    <div class="header">
        <h2>Laporan Guru Tugas (GT)</h2>
    </div>

    <table class="info-table">
        <tr>
            <th style="width: 25%;">Laporan Ke</th>
            <td>{{ $laporan->laporan_ke }}</td>
        </tr>
        <tr>
            <th>Bulan/Tahun</th>
            <td>{{ $laporan->bulan_tahun ?? ($laporan->laporan_bulan . ' ' . $laporan->tahun) }}</td>
        </tr>
        <tr>
            <th>Tanggal Laporan</th>
            <td>{{ $laporan->tanggal_laporan ?? '-' }}</td>
        </tr>
    </table>

    <div class="section-title">Data GT</div>
    <table class="info-table">
        <tr>
            <th>Nama</th>
            <td>{{ $laporan->gt->user->name ?? '-' }}</td>
        </tr>
        <tr>
            <th>Alamat Lengkap</th>
            <td>{{ $laporan->gt->alamat ?? '-' }}</td>
        </tr>
        <tr>
            <th>Asal Kelas</th>
            <td>{{ $laporan->gt->asal_kelas ?? '-' }}</td>
        </tr>
        <tr>
            <th>Status Tugas</th>
            <td>{{ $laporan->gt->status_tugas ?? '-' }}</td>
        </tr>
    </table>

    <div class="section-title">Tempat Bertugas</div>
    <table class="info-table">
        <tr>
            <th>Nama Madrasah</th>
            <td>{{ $laporan->gt->madrasah->nama_madrasah ?? '-' }}</td>
        </tr>
        <tr>
            <th>Alamat Madrasah</th>
            <td>{{ $laporan->gt->madrasah->alamat_madrasah ?? '-' }}</td>
        </tr>
        <tr>
            <th>Nama Kepala</th>
            <td>{{ $laporan->gt->madrasah->nama_kepala_madrasah ?? '-' }}</td>
        </tr>
        <tr>
            <th>Nama PJGT</th>
            <td>{{ $laporan->gt->pjgt->user->name ?? '-' }}</td>
        </tr>
    </table>

    <div class="section-title">Kegiatan Madrasah</div>
    <table class="info-table">
        <tr>
            <th>Wali Kelas</th>
            <td>{{ $laporan->wali_kelas ?? '-' }}</td>
        </tr>
        <tr>
            <th>Guru Kelas</th>
            <td>
                @php
                    $guru_kelas = $laporan->guru_kelas ?? [];
                    if (!is_array($guru_kelas)) $guru_kelas = json_decode($guru_kelas, true) ?? [];
                @endphp
                {{ implode(', ', $guru_kelas) }}
            </td>
        </tr>
        <tr>
            <th>Guru Fan</th>
            <td>{{ $laporan->guru_fan ?? '-' }}</td>
        </tr>
        <tr>
            <th>Jenis Kelamin Murid</th>
            <td>
                @php
                    $jk_murid = $laporan->jenis_kelamin_murid ?? [];
                    if (!is_array($jk_murid)) $jk_murid = json_decode($jk_murid, true) ?? [];
                @endphp
                {{ implode(', ', $jk_murid) }}
            </td>
        </tr>
    </table>

    <div class="section-title">Jumlah Hari Mengajar / Tidak Mengajar</div>
    <table class="info-table">
        <tr>
            <th>Jumlah Hari Mengajar Dalam Satu Minggu</th>
            <td>{{ $laporan->jumlah_mengajar_satu_minggu ?? '-' }}</td>
        </tr>
        <tr>
            <th>Jumlah Hari Mengajar Dalam Satu Bulan</th>
            <td>{{ $laporan->jumlah_mengajar_satu_bulan ?? '-' }}</td>
        </tr>
        <tr>
            <th>Alasan Tidak Masuk</th>
            <td>
                @php
                    $alasan = $laporan->alasan_tidak_masuk ?? [];
                    if (!is_array($alasan)) $alasan = json_decode($alasan, true) ?? [];
                @endphp
                {{ implode(', ', $alasan) }}
            </td>
        </tr>
        <tr>
            <th>Jumlah Hari Sakit</th>
            <td>{{ $laporan->jumlah_hari_sakit ?? '-' }}</td>
        </tr>
        <tr>
            <th>Jumlah Hari Pulang</th>
            <td>{{ $laporan->jumlah_hari_pulang ?? '-' }}</td>
        </tr>
        <tr>
            <th>Jumlah Hari Lain</th>
            <td>{{ $laporan->jumlah_alasan_lain ?? '-' }}</td>
        </tr>
    </table>

    <div class="section-title">Kegiatan Luar</div>
    <table class="info-table">
        <tr>
            <th>Jenis Kegiatan</th>
            <td>
                @php
                    $kegiatan_luar = $laporan->kegiatan_gt_Diluar_kelas ?? [];
                    if (!is_array($kegiatan_luar)) $kegiatan_luar = json_decode($kegiatan_luar, true) ?? [];
                @endphp
                {{ implode(', ', $kegiatan_luar) }}
            </td>
        </tr>
    </table>

    <div class="section-title">Interaksi Sosial</div>
    <table class="info-table">
        <tr>
            <th>Interaksi Dengan PJGT</th>
            <td>{{ $laporan->interaksi_dengan_pjgt ?? '-' }}</td>
        </tr>
        <tr>
            <th>Interaksi Dengan Kepala Madrasah</th>
            <td>{{ $laporan->interaksi_dengan_kepmad ?? '-' }}</td>
        </tr>
        <tr>
            <th>Interaksi Dengan Guru Lainnya</th>
            <td>{{ $laporan->interaksi_dengan_guru ?? '-' }}</td>
        </tr>
    </table>

    <div class="section-title">Bisyaroh</div>
    <table class="info-table">
        <tr>
            <th>Status</th>
            <td>{{ $laporan->bisyaroh_bulan_ini ?? '-' }}</td>
        </tr>
        <tr>
            <th>Jumlah</th>
            <td>
                @if(isset($laporan->bisyaroh_bulan_ini_sebanyak))
                    Rp. {{ number_format($laporan->bisyaroh_bulan_ini_sebanyak, 0, ',', '.') }}
                @else
                    -
                @endif
            </td>
        </tr>
    </table>

    <div class="section-title">Informasi Lain</div>
    <table class="info-table">
        <tr>
            <th>Kendala</th>
            <td>{{ $laporan->kendala_bulan_ini ?? '-' }}</td>
        </tr>
        <tr>
            <th>Langkah Pemecahan Kendala</th>
            <td>{{ $laporan->langkah_pemecahan_kendala ?? '-' }}</td>
        </tr>
        <tr>
            <th>Tugas Baru Dari KM/PJGT</th>
            <td>{{ $laporan->tugas_dari_km_pjgt ?? '-' }}</td>
        </tr>
        <tr>
            <th>Tugas Belum Terlaksana</th>
            <td>{{ $laporan->tugas_belum_terlaksana ?? '-' }}</td>
        </tr>
        <tr>
            <th>Usulan Dan Saran</th>
            <td>{{ $laporan->usulan ?? '-' }}</td>
        </tr>
    </table>

    <div class="footer">
        Dicetak pada: {{ \Carbon\Carbon::now()->format('d-m-Y H:i') }}
    </div>
    @if (!$loop->last)
        <div class="page-break"></div>
    @endif
@endforeach
</body>
</html>

