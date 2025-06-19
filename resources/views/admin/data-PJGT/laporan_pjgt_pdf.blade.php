<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Laporan PJGT</title>
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
        .row {
            display: flex;
            flex-wrap: wrap;
            margin-bottom: 8px;
        }
        .col {
            flex: 1 0 45%;
            margin-bottom: 6px;
        }
        .label {
            font-weight: bold;
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
        <h2>Laporan Penanggung Jawab Guru Tugas (PJGT)</h2>
    </div>

    <table class="info-table">
        <tr>
            <th style="width: 25%;">Laporan Ke</th>
            <td>{{ $laporan->laporan_ke }}</td>
        </tr>
        <tr>
            <th>Bulan/Tahun</th>
            <td>{{ $laporan->laporan_bulan }} {{ $laporan->tahun }}</td>
        </tr>
    </table>

    <div class="section-title">Data PJGT</div>
    <table class="info-table">
        <tr>
            <th>No. Induk PJGT</th>
            <td>{{ $laporan->pjgt->no_induk }}</td>
        </tr>
        <tr>
            <th>Nama PJGT</th>
            <td>{{ $laporan->pjgt->user->name }}</td>
        </tr>
        <tr>
            <th>Alamat Rumah</th>
            <td>{{ $laporan->pjgt->alamat }}</td>
        </tr>
        <tr>
            <th>Nama Madrasah</th>
            <td>{{ $laporan->pjgt->madrasah->nama_madrasah ?? '-' }}</td>
        </tr>
        <tr>
            <th>Alamat Madrasah</th>
            <td>{{ $laporan->pjgt->madrasah->alamat_madrasah ?? '-' }}</td>
        </tr>
        <tr>
            <th>Kepala Madrasah</th>
            <td>{{ $laporan->pjgt->madrasah->nama_kepala_madrasah ?? '-' }}</td>
        </tr>
    </table>

    <div class="section-title">Data Guru Tugas</div>
    <table class="info-table">
        <tr>
            <th>Nama GT</th>
            <td>{{ $laporan->pjgt->gt->user->name ?? '-' }}</td>
        </tr>
        <tr>
            <th>Alamat GT</th>
            <td>{{ $laporan->pjgt->gt->alamat ?? '-' }}</td>
        </tr>
    </table>

    <div class="section-title">Kegiatan GT Dalam Kelas</div>
    <table class="info-table">
        <tr>
            <th>Wali Kelas</th>
            <td>{{ $laporan->wali_kelas }}</td>
        </tr>
        <tr>
            <th>Tingkat</th>
            <td>
                @php
                        $tingkat = $laporan->tingkat ?? [];
                        if (!is_array($tingkat)) $tingkat = json_decode($tingkat, true) ?? [];
                    @endphp
                    {{ implode(', ', $tingkat) }}
            </td>
        </tr>
        <tr>
            <th>GT Menjadi Guru Fak Kelas</th>
            <td>@php
                $guru_fak_kelas = $laporan->guru_fak_kelas ?? [];
                if (!is_array($guru_fak_kelas)) $guru_fak_kelas = json_decode($guru_fak_kelas, true) ?? [];
            @endphp
            {{ implode(', ', $guru_fak_kelas) }}</td>
        </tr>
        <tr>
            <th>GT Menjadi guru</th>
            <td>@php
                $menjadi_guru = $laporan->menjadi_guru ?? [];
                if (!is_array($menjadi_guru)) $menjadi_guru = json_decode($menjadi_guru, true) ?? [];
            @endphp
            {{ implode(', ', $menjadi_guru) }}</td>
        </tr>
        <tr>
            <th>GT Masuk Madrasah/Sekolah</th>
            <td>{{ $laporan->gt_masuk_madrasah }}</td>
        </tr>
        <tr>
            <th>Mengajar Murid Balighah</th>
            <td>{{ $laporan->murid_balighah }}</td>
        </tr>
    </table>

    <div class="section-title">Kegiatan GT Luar Kelas</div>
    <table class="info-table">
        <tr>
            <th>Jenis Kegiatan</th>
            <td>{{ $laporan->jenis_kegiatan }}</td>
        </tr>
        <tr>
            <th>Dilaksanakan Diwaktu</th>
            <td>@php
                $waktu_kegiatan = $laporan->waktu_kegiatan ?? [];
                if (!is_array($waktu_kegiatan)) $waktu_kegiatan = json_decode($waktu_kegiatan, true) ?? [];
            @endphp
            {{ implode(', ', $waktu_kegiatan) }}</td>
        </tr>
        <tr>
            <th>Sifat Kegiatan</th>
            <td>{{ $laporan->sifat_kegiatan }}</td>
        </tr>
    </table>

    <div class="section-title">Kedisiplinan</div>
    <table class="info-table">
        <tr>
            <th>Rambut GT</th>
            <td>{{ $laporan->rambut_gt }}</td>
        </tr>
        <tr>
            <th>GT Pernah Bepergian</th>
            <td>{{ $laporan->gt_bepergian }}</td>
        </tr>
        <tr>
            <th>Bepergian Sebanyak</th>
            <td>{{ $laporan->berpergian_sebanyak ?? '-' }} kali</td>
        </tr>
        <tr>
            <th>Tujuan Bepergian</th>
            <td>{{ $laporan->tujuan_bepergian ?? '-' }}</td>
        </tr>
        <tr>
            <th>GT pernah Pulang Kampung</th>
            <td>{{ $laporan->gt_pernah_pulang_kampung }}</td>
        </tr>
        <tr>
            <th>Pulang Kampung Sebanyak</th>
            <td>{{ $laporan->pulang_kampung_sebanyak ?? '-' }} kali</td>
        </tr>
        <tr>
            <th>GT Pernah Melakukan Pelanggaran</th>
            <td>{{ $laporan->gt_melakukan_pelanggaran }}</td>
        </tr>
        <tr>
            <th>Pelanggaran Berupa</th>
            <td>{{ $laporan->pelanggran_berupa ?? '-' }}</td>
        </tr>
        <tr>
            <th>PJGT Mengambil Tindakan Pelanggaran</th>
            <td>{{ $laporan->pjgt_mengambil_tindakan }}</td>
        </tr>
        <tr>
            <th>Tindakan Berupa</th>
            <td>{{ $laporan->tindakan_berupa }}</td>
        </tr>
        <tr>
            <th>Surat Ijin Dari Pengurus Telah Dipakai</th>
            <td>{{ $laporan->surat_ijin_dipakai }} kali</td>
        </tr>
    </table>

    <div class="section-title">Hubungan Sosial</div>
    <table class="info-table">
        <tr>
            <th>Dengan PJGT</th>
            <td>{{ $laporan->hubungan_dengan_pjgt }}</td>
        </tr>
        <tr>
            <th>Dengan Kepala Madrasah</th>
            <td>{{ $laporan->hubungan_dengan_kepmad }}</td>
        </tr>
        <tr>
            <th>Dengan Guru</th>
            <td>{{ $laporan->hubungan_dengan_guru }}</td>
        </tr>
        <tr>
            <th>Dengan Masyarakat</th>
            <td>{{ $laporan->hubungan_dengan_wali_murid_masyarakat }}</td>
        </tr>
        <tr>
            <th>Hubungan Sosial Didalam Kelas</th>
            <td>{{ $laporan->hubungan_dengan_murid_dikelas }}</td>
        </tr>
        <tr>
            <th>Hubungan Sosial Diluar Kelas</th>
            <td>{{ $laporan->hubungan_dengan_murid_diluar }}</td>
        </tr>
        <tr>
            <th>Tanggapan Umum Murid Terhadap Guru Tugas</th>
            <td>{{ $laporan->tanggapan_murid }}</td>
        </tr>
        <tr>
            <th>Tanggapan Umum Masyarakat Terhadap Guru Tugas</th>
            <td>{{ $laporan->tanggapan_masyarakat }}</td>
        </tr>
    </table>

    <div class="section-title">Bisyaroh</div>
    <table class="info-table">
        <tr>
            <th>Bisyaroh 1</th>
            <td>Status: {{ $laporan->bisyaroh_satu }}<br>
                Jumlah: {{ $laporan->bisyaroh_satu === 'Ya' ? 'Rp' . $laporan->bisyaroh_satu_sebanyak : '-' }}</td>
        </tr>
        <tr>
            <th>Bisyaroh 2</th>
            <td>Status: {{ $laporan->bisyaroh_dua }}<br>
                Jumlah: {{ $laporan->bisyaroh_dua === 'Ya' ? 'Rp' . $laporan->bisyaroh_dua_sebanyak : '-' }}</td>
        </tr>
        <tr>
            <th>Bisyaroh 3</th>
            <td>Status: {{ $laporan->bisyaroh_tiga }}<br>
                Jumlah: {{ $laporan->bisyaroh_tiga === 'Ya' ? 'Rp' . $laporan->bisyaroh_tiga_sebanyak : '-' }}</td>
        </tr>
        <tr>
            <th>Bisyaroh 4</th>
            <td>Status: {{ $laporan->bisyaroh_empat }}<br>
                Jumlah: {{ $laporan->bisyaroh_empat === 'Ya' ? 'Rp' . $laporan->bisyaroh_empat_sebanyak : '-' }}</td>
        </tr>
        <tr>
            <th>Bisyaroh 5</th>
            <td>Status: {{ $laporan->bisyaroh_lima }}<br>
                Jumlah: {{ $laporan->bisyaroh_lima === 'Ya' ? 'Rp' . $laporan->bisyaroh_lima_sebanyak : '-' }}</td>
        </tr>
        <tr>
            <th>Bisyaroh 6</th>
            <td>Status: {{ $laporan->bisyaroh_enam }}<br>
                Jumlah: {{ $laporan->bisyaroh_enam === 'Ya' ? 'Rp' . $laporan->bisyaroh_enam_sebanyak : '-' }}</td>
        </tr>
        <tr>
            <th>Bisyaroh 7</th>
            <td>Status: {{ $laporan->bisyaroh_tujuh }}<br>
                Jumlah: {{ $laporan->bisyaroh_tujuh === 'Ya' ? 'Rp' . $laporan->bisyaroh_tujuh_sebanyak : '-' }}</td>
        </tr>
        <tr>
            <th>Bisyaroh 8</th>
            <td>Status: {{ $laporan->bisyaroh_delapan }}<br>
                Jumlah: {{ $laporan->bisyaroh_delapan === 'Ya' ? 'Rp' . $laporan->bisyaroh_delapan_sebanyak : '-' }}</td>
        </tr>
        <tr>
            <th>Bisyaroh 9</th>
            <td>Status: {{ $laporan->bisyaroh_sembilan }}<br>
                Jumlah: {{ $laporan->bisyaroh_sembilan === 'Ya' ? 'Rp' . $laporan->bisyaroh_sembilan_sebanyak : '-' }}</td>
        </tr>
        <tr>
            <th>Bisyaroh 10</th>
            <td>Status: {{ $laporan->bisyaroh_sepuluh }}<br>
                Jumlah: {{ $laporan->bisyaroh_sepuluh === 'Ya' ? 'Rp' . $laporan->bisyaroh_sepuluh_sebanyak : '-' }}</td>
        </tr>
    </table>

    <div class="section-title">Informasi Lain</div>
    <table class="info-table">
        <tr>
            <th>Usulan dan Lain-lain</th>
            <td>{{ $laporan->usulan }}</td>
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
