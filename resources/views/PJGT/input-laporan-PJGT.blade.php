@extends('PJGT.layout.template_PJGT')

@section('title', 'Input Laporan PJGT')

@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-12">
                <h5 class="mb-4">Detail Laporan Penanggung Jawab Guru Tugas</h5>
            </div>
        </div>
    </div>
    @if (!$dalamRentang)
        <div class="container-fluid pt-4 px-4">
            <div class="row g-4">
                <div class="col-12">
                    <div class="alert alert-warning">
                        <strong>Laporan bulan ini belum dibuka.</strong><br>
                    </div>
                </div>
            </div>
        </div>
    @elseif ($sudahLapor)
        <div class="container-fluid pt-4 px-4">
            <div class="row g-4">
                <div class="col-12">
                    <div class="alert alert-info">
                        <strong>Anda sudah melakukan laporan bulan ini.</strong>
                    </div>
                </div>
            </div>
        </div>
    @else
        @if (session('error'))
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-12">
                        <div class="alert alert-info">
                            <div class="alert alert-danger mt-2" role="alert">{{ session('error') }}</div>
                        </div>
                    </div>
                </div>
            </div>
        @elseif (session('success'))
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-12">
                        <div class="alert alert-info">
                            <div class="alert alert-success mt-2" role="alert">{{ session('success') }}</div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        <form action="{{ url('/PJGT/input-laporan/store') }}" method="POST">
            @csrf
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-12">
                        <div class="bg-light rounded h-100 p-4">
                            <h6 class="mb-4">Tahapan Laporan</h6>
                            <div class="mb-3">
                                <label for="laporan_ke" class="form-label">Laporan Ke</label>
                                <input type="number" class="form-control" id="laporan_ke" name="laporan_ke">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-12">
                        <div class="bg-light rounded h-100 p-4">
                            <h6 class="mb-4">Laporan Penanggung Jawab Guru Tugas (PJGT)</h6>
                            <div class="mb-3">
                                <div class="mb-0">Laporan Ke</div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="laporan_bulan" id="radioMuharram"
                                        value="Muharram">
                                    <label class="form-check-label" for="radioMuharram">1. Muharram</label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="laporan_bulan" id="radioRabiulAwal"
                                        value="Rabiul Awal">
                                    <label class="form-check-label" for="radioRabiulAwal">2. Rabiul Awal</label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="laporan_bulan"
                                        id="radioJumadalTsaniyah" value="Jumadal Tsaniyah">
                                    <label class="form-check-label" for="radioJumadalTsaniyah">3. Jumadal Tsaniyah</label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="laporan_bulan" id="radioSyaban"
                                        value="Sya'ban">
                                    <label class="form-check-label" for="radioSyaban">4. Sya'ban</label>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="tahun" class="form-label">Tahun</label>
                                <input type="text" class="form-control" id="tahun" name="tahun">
                                <div id="descSaran" style="font-size: 10px" class="form-text fst-italic mb-4">
                                    (* tulis tahun hijriyah, contoh : 1447
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-12">
                        <div class="bg-light rounded h-100 p-4">
                            <h6 class="mb-4">Kegiatan Guru Tugas Dalam Kelas</h6>
                            <!-- Wali Kelas -->
                            <div class="mb-3">
                                <div class="mb-0">GT Menjadi Guru Wali Kelas</div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="wali_kelas" id="wali1"
                                        value="1">
                                    <label class="form-check-label" for="wali1">1</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="wali_kelas" id="wali2"
                                        value="2">
                                    <label class="form-check-label" for="wali2">2</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="wali_kelas" id="wali3"
                                        value="3">
                                    <label class="form-check-label" for="wali3">3</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="wali_kelas" id="wali4"
                                        value="4">
                                    <label class="form-check-label" for="wali4">4</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="wali_kelas" id="wali5"
                                        value="5">
                                    <label class="form-check-label" for="wali5">5</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="wali_kelas" id="wali6"
                                        value="6">
                                    <label class="form-check-label" for="wali6">6</label>
                                </div>
                            </div>
                            <!-- Tingkat -->
                            <div class="mb-3">
                                <div class="mb-0">Tingkat</div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="tingkat1" name="tingkat[]"
                                        value="Ibtidaiyah">
                                    <label class="form-check-label" for="tingkat1">Ibtidaiyah</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="tingkat2" name="tingkat[]"
                                        value="Tsanawiyah">
                                    <label class="form-check-label" for="tingkat2">Tsanawiyah</label>
                                </div>
                            </div>
                            <!-- Guru Fak Kelas -->
                            <div class="mb-3">
                                <div class="mb-0">GT Menjadi Guru Fak Kelas</div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="fakk1"
                                        name="guru_fak_kelas[]" value="1">
                                    <label class="form-check-label" for="fakk1">1</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="fakk2"
                                        name="guru_fak_kelas[]" value="2">
                                    <label class="form-check-label" for="fakk2">2</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="fakk3"
                                        name="guru_fak_kelas[]" value="3">
                                    <label class="form-check-label" for="fakk3">3</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="fakk4"
                                        name="guru_fak_kelas[]" value="4">
                                    <label class="form-check-label" for="fakk4">4</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="fakk5"
                                        name="guru_fak_kelas[]" value="5">
                                    <label class="form-check-label" for="fakk5">5</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="fakk6"
                                        name="guru_fak_kelas[]" value="6">
                                    <label class="form-check-label" for="fakk6">6</label>
                                </div>
                            </div>
                            <!-- GT Menjadi Guru -->
                            <div class="mb-3">
                                <div class="mb-0">GT Menjadi Guru</div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="guru1" name="menjadi_guru[]"
                                        value="Banin">
                                    <label class="form-check-label" for="guru1">Banin (Putra)</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="guru2" name="menjadi_guru[]"
                                        value="Banat">
                                    <label class="form-check-label" for="guru2">Banat (Putri)</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="guru3" name="menjadi_guru[]"
                                        value="Banin-Banat">
                                    <label class="form-check-label" for="guru3">Banin - Banat</label>
                                </div>
                            </div>
                            <!-- Kehadiran -->
                            <div class="mb-3">
                                <div class="mb-0">GT Masuk Madrasah/Sekolah</div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gt_masuk_madrasah"
                                        id="hadir1" value="Rajin">
                                    <label class="form-check-label" for="hadir1">Rajin</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gt_masuk_madrasah"
                                        id="hadir2" value="Tidak Rajin">
                                    <label class="form-check-label" for="hadir2">Tidak Rajin</label>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-12">
                        <div class="bg-light rounded h-100 p-4">
                            <h6 class="mb-4">Murid Balighah</h6>
                            <div class="mb-3">
                                <div class="mb-0">GT Mengajar Murid Balighah</div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="murid_balighah"
                                        id="balighah_ya" value="Ya">
                                    <label class="form-check-label" for="balighah_ya">Ya</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="murid_balighah"
                                        id="balighah_tidak" value="Tidak">
                                    <label class="form-check-label" for="balighah_tidak">Tidak</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-12">
                        <div class="bg-light rounded h-100 p-4">
                            <h6 class="mb-4">Kegiatan Guru Tugas Di Luar Kelas</h6>
                            <div class="mb-3">
                                <label for="jenis_kegiatan" class="form-label">Jenis Kegiatan</label>
                                <input type="text" class="form-control" id="jenis_kegiatan" name="jenis_kegiatan">
                            </div>
                            <div class="mb-3">
                                <div class="mb-0">Dilaksanakan Waktu</div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="waktu_kegiatan[]"
                                        id="waktu_siang" value="Siang">
                                    <label class="form-check-label" for="waktu_siang">Siang</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="waktu_kegiatan[]"
                                        id="waktu_malam" value="Malam">
                                    <label class="form-check-label" for="waktu_malam">Malam</label>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="mb-0">Sifat Kegiatan</div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="sifat_kegiatan" id="sifat_baru"
                                        value="Baru">
                                    <label class="form-check-label" for="sifat_baru">Baru</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="sifat_kegiatan"
                                        id="sifat_lanjut" value="Melanjutkan">
                                    <label class="form-check-label" for="sifat_lanjut">Melanjutkan</label>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-12">
                        <div class="bg-light rounded h-100 p-4">
                            <h6 class="mb-4">Kedisiplinan Dan Ketertiban Guru Tugas</h6>
                            <!-- Rambut -->
                            <div class="mb-3">
                                <div class="mb-0">Rambut Guru Tugas (Dalam Keadaan)</div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="rambut_pendek" name="rambut_gt"
                                        value="Pendek">
                                    <label class="form-check-label" for="rambut_pendek">Pendek</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="rambut_panjang" name="rambut_gt"
                                        value="Melebihi Batas">
                                    <label class="form-check-label" for="rambut_panjang">Melebihi Batas</label>
                                </div>
                            </div>
                            <!-- Pernah Bepergian -->
                            <div class="mb-3">
                                <div class="mb-0">GT Pernah Bepergian</div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="bepergian_ya" name="gt_bepergian"
                                        value="Ya">
                                    <label class="form-check-label" for="bepergian_ya">Ya</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="bepergian_tidak"
                                        name="gt_bepergian" value="Tidak">
                                    <label class="form-check-label" for="bepergian_tidak">Tidak</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-12">
                        <div class="bg-light rounded h-100 p-4">
                            <h6 class="mb-4">GT Bepergian</h6>
                            <!-- Jumlah Bepergian -->
                            <div class="mb-3">
                                <div class="mb-0">Sebanyak</div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" id="bepergian_1"
                                        name="berpergian_sebanyak" value="1">
                                    <label class="form-check-label" for="bepergian_1">1 kali</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" id="bepergian_2"
                                        name="berpergian_sebanyak" value="2">
                                    <label class="form-check-label" for="bepergian_2">2 kali</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" id="bepergian_3"
                                        name="berpergian_sebanyak" value="3">
                                    <label class="form-check-label" for="bepergian_3">3 kali</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" id="bepergian_4"
                                        name="berpergian_sebanyak" value="4">
                                    <label class="form-check-label" for="bepergian_4">4 kali</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" id="bepergian_5"
                                        name="berpergian_sebanyak" value="5">
                                    <label class="form-check-label" for="bepergian_5">5 kali</label>
                                </div>
                            </div>
                            <!-- Tujuan -->
                            <div class="mb-3">
                                <label for="tujuan_bepergian" class="form-label">Dengan Tujuan</label>
                                <input type="text" class="form-control" id="tujuan_bepergian"
                                    name="tujuan_bepergian">
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <!-- GT Pulang Kampung -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-12">
                        <div class="bg-light rounded h-100 p-4">
                            <h6 class="mb-4">GT Pulang Kampung</h6>
                            <!-- Pernah Pulang Kampung -->
                            <div class="mb-3">
                                <div class="mb-0">GT Pernah Pulang Kampung</div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" id="pernah_pulang_ya"
                                        name="gt_pernah_pulang_kampung" value="ya">
                                    <label class="form-check-label" for="pernah_pulang_ya">Ya</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" id="pernah_pulang_tidak"
                                        name="gt_pernah_pulang_kampung" value="tidak">
                                    <label class="form-check-label" for="pernah_pulang_tidak">Tidak</label>
                                </div>
                            </div>
                            <!-- Pulang Kampung Sebanyak -->
                            <div class="mb-3">
                                <div class="mb-0">GT Pulang Kampung Sebanyak</div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" id="pulang_1"
                                        name="pulang_kampung_sebanyak" value="1">
                                    <label class="form-check-label" for="pulang_1">1 Kali</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" id="pulang_2"
                                        name="pulang_kampung_sebanyak" value="2">
                                    <label class="form-check-label" for="pulang_2">2 Kali</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" id="pulang_3"
                                        name="pulang_kampung_sebanyak" value="3">
                                    <label class="form-check-label" for="pulang_3">3 Kali</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" id="pulang_4"
                                        name="pulang_kampung_sebanyak" value="4">
                                    <label class="form-check-label" for="pulang_4">4 Kali</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" id="pulang_5"
                                        name="pulang_kampung_sebanyak" value="5">
                                    <label class="form-check-label" for="pulang_5">5 Kali</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Pelanggaran -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-12">
                        <div class="bg-light rounded h-100 p-4">
                            <h6 class="mb-4">Pelanggaran</h6>
                            <!-- Pernah Melakukan Pelanggaran -->
                            <div class="mb-3">
                                <div class="mb-0">GT Pernah Melakukan Pelanggaran</div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" id="pernah_langgar_ya"
                                        name="gt_melakukan_pelanggaran" value="ya">
                                    <label class="form-check-label" for="pernah_langgar_ya">Ya</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" id="pernah_langgar_tidak"
                                        name="gt_melakukan_pelanggaran" value="tidak">
                                    <label class="form-check-label" for="pernah_langgar_tidak">Tidak</label>
                                </div>
                            </div>
                            <!-- Jenis Pelanggaran -->
                            <div class="mb-3">
                                <label for="pelanggran_berupa" class="form-label">Pelanggaran Berupa</label>
                                <input type="text" class="form-control" id="pelanggran_berupa"
                                    name="pelanggran_berupa">
                            </div>
                            <!-- Tindakan PJGT -->
                            <div class="mb-3">
                                <div class="mb-0">PJGT Mengambil Tindakan Pelanggaran</div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" id="tindakan_diambil_ya"
                                        name="pjgt_mengambil_tindakan" value="ya">
                                    <label class="form-check-label" for="tindakan_diambil_ya">Ya</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" id="tindakan_diambil_tidak"
                                        name="pjgt_mengambil_tindakan" value="tidak">
                                    <label class="form-check-label" for="tindakan_diambil_tidak">Tidak</label>
                                </div>
                            </div>
                            <!-- Bentuk Tindakan -->
                            <div class="mb-3">
                                <label for="tindakan_berupa" class="form-label">Tindakan Pelanggaran Berupa</label>
                                <input type="text" class="form-control" id="tindakan_berupa" name="tindakan_berupa">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-12">
                        <div class="bg-light rounded h-100 p-4">
                            <h6 class="mb-4">Surat Ijin</h6>
                            <div class="mb-3">
                                <div class="mb-0">Surat Ijin Dari Pengurus Telah Dipakai</div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" id="ijin_1"
                                        name="surat_ijin_dipakai" value="1">
                                    <label class="form-check-label" for="ijin_1">1 Kali</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" id="ijin_2"
                                        name="surat_ijin_dipakai" value="2">
                                    <label class="form-check-label" for="ijin_2">2 Kali</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" id="ijin_3"
                                        name="surat_ijin_dipakai" value="3">
                                    <label class="form-check-label" for="ijin_3">3 Kali</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" id="ijin_4"
                                        name="surat_ijin_dipakai" value="4">
                                    <label class="form-check-label" for="ijin_4">4 Kali</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" id="ijin_5"
                                        name="surat_ijin_dipakai" value="5">
                                    <label class="form-check-label" for="ijin_5">5 Kali</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-12">
                        <div class="bg-light rounded h-100 p-4">
                            <h6 class="mb-4">Hubungan Sosial GT</h6>

                            <div class="mb-3">
                                <label for="hubungan_dengan_pjgt" class="form-label">Hubungan Dengan PJGT</label>
                                <select class="form-select mb-3" id="hubungan_dengan_pjgt" name="hubungan_dengan_pjgt"
                                    aria-label="Default select">
                                    <option selected disabled>--Pilih--</option>
                                    <option value="jarang">Jarang</option>
                                    <option value="sering">Sering</option>
                                    <option value="tidak_pernah">Tidak Pernah</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="hubungan_dengan_kepmad" class="form-label">Hubungan Dengan Kepala
                                    Madrasah</label>
                                <select class="form-select mb-3" id="hubungan_dengan_kepmad"
                                    name="hubungan_dengan_kepmad" aria-label="Default select">
                                    <option selected disabled>--Pilih--</option>
                                    <option value="jarang">Jarang</option>
                                    <option value="sering">Sering</option>
                                    <option value="tidak_pernah">Tidak Pernah</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="hubungan_dengan_guru" class="form-label">Hubungan Dengan Guru</label>
                                <select class="form-select mb-3" id="hubungan_dengan_guru" name="hubungan_dengan_guru"
                                    aria-label="Default select">
                                    <option selected disabled>--Pilih--</option>
                                    <option value="jarang">Jarang</option>
                                    <option value="sering">Sering</option>
                                    <option value="tidak_pernah">Tidak Pernah</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="hubungan_dengan_wali_murid_masyarakat" class="form-label">Hubungan Dengan Wali
                                    Santri/Murid/Masyarakat</label>
                                <select class="form-select mb-3" id="hubungan_dengan_wali_murid_masyarakat"
                                    name="hubungan_dengan_wali_murid_masyarakat" aria-label="Default select">
                                    <option selected disabled>--Pilih--</option>
                                    <option value="jarang">Jarang</option>
                                    <option value="sering">Sering</option>
                                    <option value="tidak_pernah">Tidak Pernah</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <div class="mb-0">Hubungan Dengan Murid Didalam Kelas</div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" id="murid_dalam_aktif"
                                        name="hubungan_dengan_murid_dikelas" value="aktif">
                                    <label class="form-check-label" for="murid_dalam_aktif">Aktif</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" id="murid_dalam_pasif"
                                        name="hubungan_dengan_murid_dikelas" value="pasif">
                                    <label class="form-check-label" for="murid_dalam_pasif">Pasif</label>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="mb-0">Hubungan Dengan Murid DiLuar Kelas</div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" id="murid_luar_aktif"
                                        name="hubungan_dengan_murid_diluar" value="aktif">
                                    <label class="form-check-label" for="murid_luar_aktif">Aktif</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" id="murid_luar_pasif"
                                        name="hubungan_dengan_murid_diluar" value="pasif">
                                    <label class="form-check-label" for="murid_luar_pasif">Pasif</label>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="mb-0">Tanggapan Umum Murid Terhadap Guru Tugas</div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" id="tanggapan_murid_baik"
                                        name="tanggapan_murid" value="baik">
                                    <label class="form-check-label" for="tanggapan_murid_baik">Baik</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" id="tanggapan_murid_tidak_baik"
                                        name="tanggapan_murid" value="tidak baik">
                                    <label class="form-check-label" for="tanggapan_murid_tidak_baik">Tidak Baik</label>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="mb-0">Tanggapan Umum Masyarakat Terhadap Guru Tugas</div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" id="tanggapan_masyarakat_baik"
                                        name="tanggapan_masyarakat" value="baik">
                                    <label class="form-check-label" for="tanggapan_masyarakat_baik">Baik</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" id="tanggapan_masyarakat_tidak_baik"
                                        name="tanggapan_masyarakat" value="tidak baik">
                                    <label class="form-check-label" for="tanggapan_masyarakat_tidak_baik">Tidak
                                        Baik</label>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-12">
                        <div class="bg-light rounded h-100 p-4">
                            <h6>Penerimaan Bisyaroh</h6>
                            <div id="jmljam1pekan" style="font-size: 10px" class="fst-italic">(*Ditulis Berupa Angka
                            </div>
                            <div id="descSaran" style="font-size: 10px" class="form-text fst-italic mb-4">
                                (* jika belum ada bisyaroh atau belum sampai pada bulannya, pilih tidak ada dan kosongkan
                                nilai bisyaroh
                            </div>
                            @php
                                $namaBisyaroh = [
                                    1 => 'satu',
                                    2 => 'dua',
                                    3 => 'tiga',
                                    4 => 'empat',
                                    5 => 'lima',
                                    6 => 'enam',
                                    7 => 'tujuh',
                                    8 => 'delapan',
                                    9 => 'sembilan',
                                    10 => 'sepuluh',
                                ];
                                $awal = $batch * 3 + 1;
                                $akhir = $awal + 2;
                            @endphp

                            @for ($i = $awal; $i <= $akhir; $i++)
                                @php
                                    $nama = $namaBisyaroh[$i];
                                @endphp

                                <div class="mb-3">
                                    <div class="mb-0">Bisyaroh {{ $i }} ({{ ucfirst($nama) }})</div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio"
                                            id="bisyaroh_{{ $nama }}_ya" name="bisyaroh_{{ $nama }}"
                                            value="Ya">
                                        <label class="form-check-label" for="bisyaroh_{{ $nama }}_ya">Ya</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio"
                                            id="bisyaroh_{{ $nama }}_tidak" name="bisyaroh_{{ $nama }}"
                                            value="Tidak">
                                        <label class="form-check-label"
                                            for="bisyaroh_{{ $nama }}_tidak">Tidak</label>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="bisyaroh_{{ $nama }}_sebanyak"
                                        class="form-label">Sebanyak</label>
                                    <input type="number" class="form-control"
                                        id="bisyaroh_{{ $nama }}_sebanyak"
                                        name="bisyaroh_{{ $nama }}_sebanyak">
                                </div>
                            @endfor
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-12">
                        <div class="bg-light rounded h-100 p-4">
                            <h6 class="mb-4">Informasi Lain Lain</h6>
                            <div class="mb-3">
                                <label for="usulan" class="form-label">Usulan Dan Lain Lain</label>
                                <textarea class="form-control" id="usulan" name="usulan"></textarea>
                            </div>
                            <div class="d-flex justify-content-center gap-2">
                                <a href="{{ url('PJGT/profile') }}" class="btn btn-danger">
                                    <i class="fas fa-arrow-left"></i> Kembali
                                </a>
                                <button type="submit" class="btn btn-success">
                                    <i class="fas fa-paper-plane"></i> Kirim
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    @endif
@endsection
