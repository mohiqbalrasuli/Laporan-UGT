@extends('GT.layout.template_GT')

@section('title', 'Input Laporan Guru Tugas')

@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-12">
                <h5 class="mb-4">Detail Laporan Guru Tugas</h5>
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
        <form action="{{ url('GT/input-laporan/store') }}" method="POST">
            @csrf
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-12">
                        <div class="bg-light rounded h-100 p-4">
                            <h6 class="mb-4">Tahapan Laporan</h6>
                            <div class="mb-3">
                                <label for="LaporanKe" class="form-label">Laporan Ke</label>
                                <input type="number" class="form-control" name="laporan_ke" id="LaporanKe" required>
                            </div>
                            <div class="mb-3">
                                <label for="AlamatGT" class="form-label">Bulan / Tahun</label>
                                <select class="form-select mb-3" id="StatusTugas" name="bulan_tahun"
                                    aria-label="Default select" required>
                                    <option selected disabled>--Pilih Bulan / Tahun--</option>
                                    <option value="Syawal-Dzul Qo'dah 1446">Syawal-Dzul Qo'dah 1446
                                    </option>
                                    <option value="Dzul Qo'dah-Dzul Hijjah 1446">Dzul Qo'dah-Dzul
                                        Hijjah 1446</option>
                                    <option value="Dzul Hijjah-Muharram 1447">Dzul Hijjah-Muharram
                                        1447</option>
                                    <option value="Muharram-Shafar 1447">Muharram-Shafar 1447
                                    </option>
                                    <option value="Shafar-Rabiul Awal 1447">Shafar-Rabiul Awal 1447
                                    </option>
                                    <option value="Rabiul Awal-Rabiul Tsani 1447">Rabiul Awal-Rabiul
                                        Tsani 1447</option>
                                    <option value="Rabiul Tsani-Jumadal Ula 1447">Rabiul
                                        Tsani-Jumadal Ula 1447</option>
                                    <option value="Jumadal Ula-Jumadal Tsaniyah 1447">Jumadal
                                        Ula-Jumadal Tsaniyah 1447
                                    </option>
                                    <option value="Jumadal Tsaniyah-Rajab 1447">Jumadal
                                        Tsaniyah-Rajab 1447</option>
                                    <option value="Rajab-Sya'ban 1447">Rajab-Sya'ban 1447</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-12">
                        <div class="bg-light rounded h-100 p-4">
                            <h6 class="mb-4">Kegiatan Madrasah</h6>
                            <div class="mb-3">
                                <label for="WaliKelas" class="form-label">Wali Kelas</label>
                                <select class="form-select mb-3" id="WaliKelas" name="wali_kelas"
                                    aria-label="Default select " required>
                                    <option selected disabled>--Pilih Wali Kelas--</option>
                                    <option value="1 ibtidaiyah">1 Ibtidaiyah</option>
                                    <option value="2 ibtidaiyah">2 Ibtidaiyah</option>
                                    <option value="3 ibtidaiyah">3 Ibtidaiyah</option>
                                    <option value="4 ibtidaiyah">4 Ibtidaiyah</option>
                                    <option value="5 ibtidaiyah">5 Ibtidaiyah</option>
                                    <option value="6 ibtidaiyah">6 Ibtidaiyah</option>
                                    <option value="1 tsanawiyah">1 Tsanawiyah</option>
                                    <option value="2 tsanawiyah">2 Tsanawiyah</option>
                                    <option value="3 tsanawiyah">3 Tsanawiyah</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <div class="mb-0">Guru Kelas</div>
                                <div class="form-chek">
                                    <input type="checkbox" class="form-check-input" name="guru_kelas[]" id="GuruKelas1"
                                        value="1 ibtidaiyah">
                                    <label class="form-check-label" for="GuruKelas1">1 Ibtidaiyah</label><br>
                                    <input type="checkbox" class="form-check-input" name="guru_kelas[]" id="GuruKelas2"
                                        value="2 ibtidaiyah">
                                    <label class="form-check-label" for="GuruKelas2">2 Ibtidaiyah</label><br>
                                    <input type="checkbox" class="form-check-input" name="guru_kelas[]" id="GuruKelas3"
                                        value="3 ibtidaiyah">
                                    <label class="form-check-label" for="GuruKelas3">3 Ibtidaiyah</label><br>
                                    <input type="checkbox" class="form-check-input" name="guru_kelas[]" id="GuruKelas4"
                                        value="4 ibtidaiyah">
                                    <label class="form-check-label" for="GuruKelas4">4 Ibtidaiyah</label><br>
                                    <input type="checkbox" class="form-check-input" name="guru_kelas[]" id="GuruKelas5"
                                        value="5 ibtidaiyah">
                                    <label class="form-check-label" for="GuruKelas5">5 Ibtidaiyah</label><br>
                                    <input type="checkbox" class="form-check-input" name="guru_kelas[]" id="GuruKelas6"
                                        value="6 ibtidaiyah">
                                    <label class="form-check-label" for="GuruKelas6">6 Ibtidaiyah</label><br>
                                    <input type="checkbox" class="form-check-input" name="guru_kelas[]" id="GuruKelas7"
                                        value="1 tsanawiyah">
                                    <label class="form-check-label" for="GuruKelas7">1 Tsanawiyah</label><br>
                                    <input type="checkbox" class="form-check-input" name="guru_kelas[]" id="GuruKelas8"
                                        value="2 tsanawiyah">
                                    <label class="form-check-label" for="GuruKelas8">2 Tsanawiyah</label><br>
                                    <input type="checkbox" class="form-check-input" name="guru_kelas[]" id="GuruKelas9"
                                        value="3 tsanawiyah">
                                    <label class="form-check-label" for="GuruKelas9">3 Tsanawiyah</label><br>
                                    <input type="checkbox" class="form-check-input" name="guru_kelas[]" id="tidakada"
                                        value="tidak ada">
                                    <label class="form-check-label" for="tidakada">Tidak Ada</label><br>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="GuruFan" class="form-label">Guru Fan</label>
                                <input type="text" class="form-control" name="guru_fan" id="GuruFan" required>
                            </div>
                            <div class="mb-3">
                                <div class="mb-0">Jenis Kelamin Murid</label>
                                    <div class="form-chek">
                                        <input type="checkbox" class="form-check-input" name="jenis_kelamin_murid[]"
                                            id="JKmurid1" value="banin">
                                        <label class="form-check-label" for="JKmurid1">Banin/Putra</label><br>
                                        <input type="checkbox" class="form-check-input" name="jenis_kelamin_murid[]"
                                            id="JKmurid2" value="banat">
                                        <label class="form-check-label" for="JKmurid2">Banat/Putri</label><br>
                                        <input type="checkbox" class="form-check-input" name="jenis_kelamin_murid[]"
                                            id="JKmurid3" value="banin-banat">
                                        <label class="form-check-label" for="JKmurid3">Banin - Banat</label><br>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="jml1pekan" class="form-label">Jumlah Hari Mengajar
                                        1 Pekan</label>
                                    <input type="number" class="form-control" name="jumlah_mengajar_satu_minggu"
                                        id="jml1pekan" aria-describedby="jml1pekan" required>
                                    <div id="jml1pekan" style="font-size: 10px" class="form-text fst-italic">(* Hitung
                                        Jumlah
                                        Hari Saudara Mengajar dalam 1 Pekan
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="jml1bulan" class="form-label">Jumlah Hari Mengajar
                                        1 Bulan</label>
                                    <input type="number" class="form-control" name="jumlah_mengajar_satu_bulan"
                                        id="jml1bulan" aria-describedby="jml1bulan" required>
                                    <div id="jml1bulan" style="font-size: 10px" class="form-text fst-italic">(* Hitung
                                        Jumlah
                                        Hari Saudara Mengajar dalam 1 Bulan
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="alasantidakmengajar" class="form-label">Alasan
                                        Tidak Mengajar</label>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" name="alasan_tidak_masuk[]"
                                            id="sakit" value="sakit">
                                        <label class="form-check-label" for="sakit">Sakit</label><br>
                                        <input type="checkbox" class="form-check-input" name="alasan_tidak_masuk[]"
                                            id="pulang" value="pulang">
                                        <label class="form-check-label" for="pulang">Pulang</label><br>
                                        <input type="checkbox" class="form-check-input" name="alasan_tidak_masuk[]"
                                            id="lain_lain" value="lain_lain">
                                        <label class="form-check-label" for="lain_lain">Lain-Lain</label><br>
                                        <input type="checkbox" class="form-check-input" name="alasan_tidak_masuk[]"
                                            id="tidak_ada" value="tidak_ada">
                                        <label class="form-check-label" for="tidak_ada">Tidak Ada</label><br>
                                    </div>
                                    </select>
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
                            <h6 class="mb-4">Rincian Alasan Tidak Mengajar</h6>
                            <div class="mb-3">
                                <div class="mb-3">
                                    <label for="jumlahsakit" class="form-label">Jumlah Hari
                                        Sakit</label>
                                    <input type="number" class="form-control" name="jumlah_hari_sakit" id="jumlahsakit"
                                        aria-describedby="jumlahsakit">
                                </div>
                                <div class="mb-3">
                                    <label for="jumlahpulang" class="form-label">Jumlah Hari
                                        Pulang</label>
                                    <input type="number" class="form-control" name="jumlah_hari_pulang"
                                        id="jumlahpulang" aria-describedby="jumlahpulang">
                                </div>
                                <div class="mb-3">
                                    <label for="jumlahjamlain" class="form-label">Jumlah Alasan
                                        lain</label>
                                    <input type="number" class="form-control" name="jumlah_alasan_lain"
                                        id="jumlahjamlain" aria-describedby="jumlahjamlain">
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
                            <h6 class="mb-4">Kegiatan Luar Madrasah</h6>
                            <div class="mb-3">
                                <div class="mb-0">Kegiatan GT Di Luar Kelas</div>
                                <div class="form-check">
                                    <input type="checkbox" name="kegiatan_gt_Diluar_kelas[]" class="form-check-input"
                                        id="kegiatan1" value="mengajar alquran">
                                    <label class="form-check-label" for="kegiatan1">Mengajar Al-Qur'an
                                        Bit-Tartil</label><br>

                                    <input type="checkbox" name="kegiatan_gt_Diluar_kelas[]" class="form-check-input"
                                        id="kegiatan2" value="mengajar kitabiyah">
                                    <label class="form-check-label" for="kegiatan2">Mengajar Kitabiyah</label><br>

                                    <input type="checkbox" name="kegiatan_gt_Diluar_kelas[]" class="form-check-input"
                                        id="kegiatan3" value="imam shalat rawatib">
                                    <label class="form-check-label" for="kegiatan3">Menjadi Imam Shalat
                                        Rawatib</label><br>

                                    <input type="checkbox" name="kegiatan_gt_Diluar_kelas[]" class="form-check-input"
                                        id="kegiatan4" value="imam shalat jumat">
                                    <label class="form-check-label" for="kegiatan4">Menjadi Imam Shalat Jum'at</label><br>

                                    <input type="checkbox" name="kegiatan_gt_Diluar_kelas[]" class="form-check-input"
                                        id="kegiatan5" value="bilal shalat jumat">
                                    <label class="form-check-label" for="kegiatan5">Menjadi Bilal Shalat
                                        Jum'at</label><br>

                                    <input type="checkbox" name="kegiatan_gt_Diluar_kelas[]" class="form-check-input"
                                        id="kegiatan6" value="kegiatan kemasyarakatan">
                                    <label class="form-check-label" for="kegiatan6">Kegiatan Kemasyarakatan</label><br>

                                    <input type="checkbox" name="kegiatan_gt_Diluar_kelas[]" class="form-check-input"
                                        id="kegiatan7" value="tidak ada">
                                    <label class="form-check-label" for="kegiatan7">Tidak Ada</label><br>

                                    <input class="form-check-input" type="checkbox" id="kegiatanLain"
                                        onchange="document.getElementById('inputKegiatanLain').disabled = !this.checked;">
                                    <label class="form-check-label me-2" for="kegiatanLain">Yang lain:</label>
                                    <input type="text" class="form-control" name="kegiatan_gt_Diluar_kelas[]"
                                        id="inputKegiatanLain" placeholder="Tuliskan kegiatan lain..." disabled>
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
                            <h6 class="mb-4">Interaksi Sosial GT</h6>
                            <div class="mb-3">
                                <label for="alasantidakmengajar" class="form-label">Interaksi
                                    Dengan PJGT</label>
                                <select class="form-select mb-3" name="interaksi_dengan_pjgt" id="alasantidakmengajar"
                                    aria-label="Default select " required>
                                    <option selected disabled>--Pilih--</option>
                                    <option value="jarang">Jarang</option>
                                    <option value="sering">Sering</option>
                                    <option value="tidak pernah">Tidak Pernah</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="alasantidakmengajar" class="form-label">Interaksi
                                    Dengan Kepala
                                    Madrasah</label>
                                <select class="form-select mb-3" name="interaksi_dengan_kepmad" id="alasantidakmengajar"
                                    aria-label="Default select " required>
                                    <option selected disabled>--Pilih--</option>
                                    <option value="jarang">Jarang</option>
                                    <option value="sering">Sering</option>
                                    <option value="tidak pernah">Tidak Pernah</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="alasantidakmengajar"
                                    class="form-label">Interaksi
                                    Dengan Guru</label>
                                <select class="form-select mb-3" name="interaksi_dengan_guru" id="alasantidakmengajar" aria-label="Default select "
                                    required>
                                    <option selected disabled>--Pilih--</option>
                                    <option value="jarang">Jarang</option>
                                    <option value="sering">Sering</option>
                                    <option value="tidak pernah">Tidak Pernah</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-12">
                        <div class="bg-light rounded h-100 p-4">
                            <h6 class="mb-4">Bisyaroh GT</h6>
                            <div class="mb-3">
                                <div class="mb-0">Bisyaroh Bulan Ini</div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" name="bisyaroh_bulan_ini" type="radio"
                                        id="inlineRadio1" value="ya">
                                    <label class="form-check-label" for="inlineRadio1">Ya</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" name="bisyaroh_bulan_ini" type="radio"
                                        id="inlineRadio2" value="tidak">
                                    <label class="form-check-label" for="inlineRadio2">Tidak</label>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="sebanyak" class="form-label">Sebanyak Rp.</label>
                                <input type="number" class="form-control" name="bisyaroh_bulan_ini_sebanyak"
                                    id="sebanyak" aria-describedby="sebanyak">
                                <div id="sebanyak" style="font-size: 10px" class="form-text fst-italic mb-4">(*
                                    Ditulis
                                    berupa
                                    angka
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
                            <h6 class="mb-4">Informasi Lain-Lain</h6>
                            <div class="mb-3">
                                <label for="kendala" class="form-label">Kendala Bulan
                                    Ini</label>
                                <input type="text" class="form-control" name="kendala_bulan_ini" id="kendala"
                                    aria-describedby="descKendala" required>
                                <div id="descKendala" style="font-size: 10px" class="form-text fst-italic mb-4">
                                    (* jika tidak ada kendala ketik "Tidak ada"
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="pemecahan" class="form-label">Langkah Pemecahan
                                    Kendala</label>
                                <input type="text" class="form-control" name="langkah_pemecahan_kendala"
                                    id="pemecahan" aria-describedby="descPemecahan" required>
                                <div id="descPemecahan" style="font-size: 10px" class="form-text fst-italic mb-4">
                                    (* jika tidak ada langkah yang dilakukan ketik "Tidak ada"
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="tugasBaru" class="form-label">Tugas Baru Dari
                                    KM/PJGT</label>
                                <input type="text" class="form-control" name="tugas_dari_km_pjgt" id="tugasBaru"
                                    aria-describedby="descTugasBaru" required>
                                <div id="descTugasBaru" style="font-size: 10px" class="form-text fst-italic mb-4">
                                    (* jika tidak ada tugas baru ketik "Tidak ada"
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="tugasBelum" class="form-label">Tugas Belum
                                    Terlaksana</label>
                                <input type="text" class="form-control" name="tugas_belum_terlaksana" id="tugasBelum"
                                    aria-describedby="descTugasBelum" required>
                                <div id="descTugasBelum" style="font-size: 10px" class="form-text fst-italic mb-4">
                                    (* jika semua tugas Tuntas ketik "Tidak ada"
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="saran" class="form-label">Usulan/Saran</label>
                                <input type="text" class="form-control" name="usulan" id="saran"
                                    aria-describedby="descSaran" required>
                                <div id="descSaran" style="font-size: 10px" class="form-text fst-italic mb-4">
                                    (* jika tidak ada usulan/saran ketik "Tidak ada"
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
                            <h6 class="mb-4">Tanggal Laporan</h6>
                            <div class="mb-3">
                                <label for="tglLaporan" class="form-label">Tanggal
                                    Laporan</label>
                                <input type="text" name="tanggal_laporan" class="form-control" required>
                                <div id="descSaran" style="font-size: 10px" class="form-text fst-italic mb-4">
                                    (* tanggal ditulis menggunakan tanggal Hijriyah. (Contoh :
                                    15 Dzul Qo'dah1444)
                                </div>
                            </div>
                            <div class="d-flex justify-content-center gap-2">
                                <a href="{{ url('GT/profile') }}" class="btn btn-danger">
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
