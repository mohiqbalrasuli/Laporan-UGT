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
    <form action="">
        <div class="container-fluid pt-4 px-4">
            <div class="row g-4">
                <div class="col-12">
                    <div class="bg-light rounded h-100 p-4">
                        <h6 class="mb-4">Tahapan Laporan</h6>
                        <div class="mb-3">
                            <label for="LaporanKe" class="form-label">Laporan Ke</label>
                            <input type="number" class="form-control" id="LaporanKe">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid pt-4 px-4">
            <div class="row g-4">
                <div class="col-12">
                    <div class="bg-light rounded h-100 p-4">
                        <h6 class="mb-4">Identitas PJGT</h6>
                        <div class="mb-3">
                            <label for="LaporanKe" class="form-label">No. Induk PJGT</label>
                            <input type="number" class="form-control" id="LaporanKe">
                        </div>
                        <div class="mb-3">
                            <label for="LaporanKe" class="form-label">Nama PJGT</label>
                            <input type="text" class="form-control" id="LaporanKe">
                        </div>
                        <div class="mb-3">
                            <label for="LaporanKe" class="form-label">Alamat Rumah</label>
                            <input type="text" class="form-control" id="LaporanKe">
                        </div>
                        <div class="mb-3">
                            <label for="LaporanKe" class="form-label">Nama Madrasah</label>
                            <input type="text" class="form-control" id="LaporanKe">
                        </div>
                        <div class="mb-3">
                            <label for="LaporanKe" class="form-label">Alamat Madrasah</label>
                            <input type="text" class="form-control" id="LaporanKe">
                        </div>
                        <div class="mb-3">
                            <label for="LaporanKe" class="form-label">Nama Pengirim Laporan</label>
                            <input type="text" class="form-control" id="LaporanKe">
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
                            <p>Laporan Ke</p>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="radioDefault" id="radioDefault1">
                                <label class="form-check-label" for="radioDefault1">1. Muharram</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="radioDefault" id="radioDefault1">
                                <label class="form-check-label" for="radioDefault1">2. Rabiul Awal</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="radioDefault" id="radioDefault1">
                                <label class="form-check-label" for="radioDefault1">3. Jumadal Tsaniyah</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="radioDefault" id="radioDefault1">
                                <label class="form-check-label" for="radioDefault1">4. Sya'ban</label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="LaporanKe" class="form-label">Tahun</label>
                            <input type="text" class="form-control" id="LaporanKe">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid pt-4 px-4">
            <div class="row g-4">
                <div class="col-12">
                    <div class="bg-light rounded h-100 p-4">
                        <h6 class="mb-4">Guru tugas</h6>
                        <div class="mb-3">
                            <label for="LaporanKe" class="form-label">Nama Guru tugas</label>
                            <input type="text" class="form-control" id="LaporanKe">
                        </div>
                        <div class="mb-3">
                            <label for="LaporanKe" class="form-label">Alamat Guru Tugas</label>
                            <input type="text" class="form-control" id="LaporanKe">
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
                        <div class="mb-3">
                            <p>GT Menjadi Guru Wali kelas</p>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="kelas_wali" id="kelas1"
                                    value="1">
                                <label class="form-check-label" for="kelas1">1</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="kelas_wali" id="kelas2"
                                    value="2">
                                <label class="form-check-label" for="kelas2">2</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="kelas_wali" id="kelas3"
                                    value="3">
                                <label class="form-check-label" for="kelas3">3</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="kelas_wali" id="kelas4"
                                    value="4">
                                <label class="form-check-label" for="kelas4">4</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="kelas_wali" id="kelas5"
                                    value="5">
                                <label class="form-check-label" for="kelas5">5</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="kelas_wali" id="kelas6"
                                    value="6">
                                <label class="form-check-label" for="kelas6">6</label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <p>Tingkat</p>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="fak1" name="kelas_fak"
                                    value="1">
                                <label class="form-check-label" for="fak1">Ibtidaiyah</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="fak2" name="kelas_fak"
                                    value="2">
                                <label class="form-check-label" for="fak2">Tsanawiyah</label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <p>GT Menjadi Guru Fak Kelas</p>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="fak1" name="kelas_fak"
                                    value="1">
                                <label class="form-check-label" for="fak1">1</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="fak2" name="kelas_fak"
                                    value="2">
                                <label class="form-check-label" for="fak2">2</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="fak3" name="kelas_fak"
                                    value="3">
                                <label class="form-check-label" for="fak3">3</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="fak4" name="kelas_fak"
                                    value="4">
                                <label class="form-check-label" for="fak4">4</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="fak5" name="kelas_fak"
                                    value="5">
                                <label class="form-check-label" for="fak5">5</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="fak6" name="kelas_fak"
                                    value="6">
                                <label class="form-check-label" for="fak6">6</label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <p>GT Menjadi Guru</p>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="fak1" name="kelas_fak"
                                    value="1">
                                <label class="form-check-label" for="fak1">Banin (Putra)</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="fak2" name="kelas_fak"
                                    value="2">
                                <label class="form-check-label" for="fak2">Banat (Putri)</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="fak2" name="kelas_fak"
                                    value="2">
                                <label class="form-check-label" for="fak2">Banin - Banat</label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <p>GT Masuk Madrasah/Sekolah</p>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="kelas_wali" id="kelas1"
                                    value="1">
                                <label class="form-check-label" for="kelas1">Rajin</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="kelas_wali" id="kelas2"
                                    value="2">
                                <label class="form-check-label" for="kelas2">Tidak Rajin</label>
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
                            <p>GT Mengajar Murid Balighah</p>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="kelas_wali" id="kelas1"
                                    value="1">
                                <label class="form-check-label" for="kelas1">Ya</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="kelas_wali" id="kelas2"
                                    value="2">
                                <label class="form-check-label" for="kelas2">Tidak</label>
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
                        <h6 class="mb-4">Kegiatan Guru Tugas Diluar Kelas</h6>
                        <div class="mb-3">
                            <label for="LaporanKe" class="form-label">Jenis kegiatan</label>
                            <input type="text" class="form-control" id="LaporanKe">
                        </div>
                        <div class="mb-3">
                            <p>Dilaksanakan Waktu</p>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="kelas_wali" id="kelas1"
                                    value="1">
                                <label class="form-check-label" for="kelas1">Siang</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="kelas_wali" id="kelas2"
                                    value="2">
                                <label class="form-check-label" for="kelas2">Malam</label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <p>Sifat Kegiatan</p>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="kelas_wali" id="kelas1"
                                    value="1">
                                <label class="form-check-label" for="kelas1">Baru</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="kelas_wali" id="kelas2"
                                    value="2">
                                <label class="form-check-label" for="kelas2">Melanjutkan</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
         </div>
    </form>
@endsection
