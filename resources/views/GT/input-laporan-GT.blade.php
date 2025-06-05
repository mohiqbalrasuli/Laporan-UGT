@extends('GT.layout.template_GT')

@section('title','Input Laporan Guru Tugas')

@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-12">
                <h5 class="mb-4">Detail Laporan Guru Tugas</h5>
            </div>
        </div>
    </div>
    <form action="" method="POST">
        <div class="container-fluid pt-4 px-4">
            <div class="row g-4">
                <div class="col-12">
                    <div class="bg-light rounded h-100 p-4">
                        <h6 class="mb-4">Tahapan Laporan</h6>
                        <div class="mb-3">
                            <label for="LaporanKe" class="form-label">Laporan Ke</label>
                            <input type="number" class="form-control" id="LaporanKe">
                        </div>
                        <div class="mb-3">
                            <label for="AlamatGT" class="form-label">Bulan / Tahun</label>
                            <select class="form-select mb-3" id="StatusTugas" aria-label="Default select ">
                                <option selected disabled>--Pilih Bulan / Tahun--</option>
                                <option value="Syawal-Dzul Qo'dah 1446">Syawal-Dzul Qo'dah 1446</option>
                                <option value="Dzul Qo'dah-Dzul Hijjah 1446">Dzul Qo'dah-Dzul Hijjah 1446</option>
                                <option value="Dzul Hijjah-Muharram 1447">Dzul Hijjah-Muharram 1447</option>
                                <option value="Muharram-Shafar 1447">Muharram-Shafar 1447</option>
                                <option value="Shafar-Rabiul Awal 1447">Shafar-Rabiul Awal 1447</option>
                                <option value="Rabiul Awal-Rabiul Tsani 1447">Rabiul Awal-Rabiul Tsani 1447</option>
                                <option value="Rabiul Tsani-Jumadal Ula 1447">Rabiul Tsani-Jumadal Ula 1447</option>
                                <option value="Jumadal Ula-Jumadal Tsaniyah 1447">Jumadal Ula-Jumadal Tsaniyah 1447</option>
                                <option value="Jumadal Tsaniyah-Rajab 1447">Jumadal Tsaniyah-Rajab 1447</option>
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
                        <h6 class="mb-4">Identitas Pelapor</h6>
                        <div class="mb-3">
                            <label for="Name" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="Name">
                        </div>
                        <div class="mb-3">
                            <label for="AlamatGT" class="form-label">Alamat Lengkap</label>
                            <textarea class="form-control" id="AlamatGT"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="AsalKelas" class="form-label">Asal Kelas</label>
                            <select class="form-select mb-3" id="AsalKelas" aria-label="Default select ">
                                <option selected disabled>--Pilih Status Tugas--</option>
                                <option value="1">MMU Ibtidaiyah</option>
                                <option value="2">MMU Tsanawiyah</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="StatusTugas" class="form-label">Status Tugas</label>
                            <select class="form-select mb-3" id="StatusTugas" aria-label="Default select ">
                                <option selected disabled>--Pilih Status Tugas--</option>
                                <option value="1">Wajib</option>
                                <option value="2">Tathowwu'</option>
                                <option value="3">Qodla'</option>
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
                        <h6 class="mb-4">Tempat Bertugas</h6>
                        <div class="mb-3">
                            <label for="NameMadrasah" class="form-label">Nama Madrasah</label>
                            <input type="text" class="form-control" id="NameMadrasah">
                        </div>
                        <div class="mb-3">
                            <label for="AlamatMadrasah" class="form-label">Alamat Madrasah</label>
                            <textarea class="form-control" id="AlamatMadrasah"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="NameKepalaMadrasah" class="form-label">Nama Kepala Madrasah</label>
                            <input type="text" class="form-control" id="NameKepalaMadrasah">
                        </div>
                        <div class="mb-3">
                            <label for="NamePJGT" class="form-label">Nama PJGT</label>
                            <input type="text" class="form-control" id="NamePJGT">
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
                            <select class="form-select mb-3" id="WaliKelas" aria-label="Default select ">
                                <option selected disabled>--Pilih Wali Kelas--</option>
                                <option value="1">1 Ibtidaiyah</option>
                                <option value="1">2 Ibtidaiyah</option>
                                <option value="1">3 Ibtidaiyah</option>
                                <option value="1">4 Ibtidaiyah</option>
                                <option value="1">5 Ibtidaiyah</option>
                                <option value="1">6 Ibtidaiyah</option>
                                <option value="1">1 Tsanawiyah</option>
                                <option value="1">2 Tsanawiyah</option>
                                <option value="1">3 Tsanawiyah</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <p>Guru Kelas</p>
                            <div class="form-chek">
                                <input type="checkbox" class="form-check-input" id="GuruKelas1">
                                <label class="form-check-label" for="GuruKelas1">1 Ibtidaiyah</label><br>
                                <input type="checkbox" class="form-check-input" id="GuruKelas2">
                                <label class="form-check-label" for="GuruKelas2">2 Ibtidaiyah</label><br>
                                <input type="checkbox" class="form-check-input" id="GuruKelas3">
                                <label class="form-check-label" for="GuruKelas3">3 Ibtidaiyah</label><br>
                                <input type="checkbox" class="form-check-input" id="GuruKelas4">
                                <label class="form-check-label" for="GuruKelas4">4 Ibtidaiyah</label><br>
                                <input type="checkbox" class="form-check-input" id="GuruKelas5">
                                <label class="form-check-label" for="GuruKelas5">5 Ibtidaiyah</label><br>
                                <input type="checkbox" class="form-check-input" id="GuruKelas6">
                                <label class="form-check-label" for="GuruKelas6">6 Ibtidaiyah</label><br>
                                <input type="checkbox" class="form-check-input" id="GuruKelas7">
                                <label class="form-check-label" for="GuruKelas7">1 Tsanawiyah</label><br>
                                <input type="checkbox" class="form-check-input" id="GuruKelas8">
                                <label class="form-check-label" for="GuruKelas8">2 Tsanawiyah</label><br>
                                <input type="checkbox" class="form-check-input" id="GuruKelas9">
                                <label class="form-check-label" for="GuruKelas9">3 Tsanawiyah</label><br>
                                <input type="checkbox" class="form-check-input" id="tidakada">
                                <label class="form-check-label" for="tidakada">Tidak Ada</label><br>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="GuruFan" class="form-label">Guru Fan</label>
                            <input type="text" class="form-control" id="GuruFan">
                        </div>
                        <div class="mb-3">
                            <p>Jenis Kelamin Murid</p>
                            <div class="form-chek">
                                <input type="checkbox" class="form-check-input" id="JKmurid1">
                                <label class="form-check-label" for="JKmurid1">Banin/Putra</label><br>
                                <input type="checkbox" class="form-check-input" id="JKmurid2">
                                <label class="form-check-label" for="JKmurid2">Banat/Putri</label><br>
                                <input type="checkbox" class="form-check-input" id="JKmurid3">
                                <label class="form-check-label" for="JKmurid3">Banin - Banat</label><br>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="jml1pekan" class="form-label">Jumlah Hari Mengajar 1 Pekan</label>
                            <input type="number" class="form-control" id="jml1pekan" aria-describedby="jml1pekan">
                            <div id="jml1pekan" style="font-size: 10px" class="form-text fst-italic">(* Hitung Jumlah
                                Hari Saudara Mengajar dalam 1 Pekan
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="jmljam1pekan" class="form-label">Jumlah Jam Mengajar 1 Pekan</label>
                            <input type="number" class="form-control" id="jmljam1pekan"
                                aria-describedby="jmljam1pekan">
                            <div id="jmljam1pekan" style="font-size: 10px" class="form-text fst-italic">(* Hitung Jumlah
                                Jam Saudara Mengajar dalam 1 Pekan
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="jml1bulan" class="form-label">Jumlah Hari Mengajar 1 Bulan</label>
                            <input type="number" class="form-control" id="jml1bulan" aria-describedby="jml1bulan">
                            <div id="jml1bulan" style="font-size: 10px" class="form-text fst-italic">(* Hitung Jumlah
                                Hari Saudara Mengajar dalam 1 Bulan
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="jmljam1bulan" class="form-label">Jumlah Jam Mengajar 1 Bulan</label>
                            <input type="number" class="form-control" id="jmljam1bulan"
                                aria-describedby="jmljam1bulan">
                            <div id="jmljam1bulan" style="font-size: 10px" class="form-text fst-italic">(* Hitung Jumlah
                                Jam Saudara Mengajar dalam 1 Bulan
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="alasantidakmengajar" class="form-label">Alasan Tidak Mengajar</label>
                            <select class="form-select mb-3" id="alasantidakmengajar" aria-label="Default select ">
                                <option selected disabled>--Pilih Wali Kelas--</option>
                                <option value="1">Sakit</option>
                                <option value="1">Pulang</option>
                                <option value="1">Lain-Lain</option>
                                <option value="1">Tidak Ada</option>
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
                        <h6 class="mb-4">Rincian Alasan Sakit</h6>
                        <div class="mb-3">
                            <div class="mb-3">
                                <label for="jumlahsakit" class="form-label">Jumlah Hari Sakit</label>
                                <input type="number" class="form-control" id="jumlahsakit"
                                    aria-describedby="jumlahsakit">
                            </div>
                            <div class="mb-3">
                                <label for="jumlahjamsakit" class="form-label">Jumlah Jam Sakit</label>
                                <input type="number" class="form-control" id="jumlahjamsakit"
                                    aria-describedby="jumlahjamsakit">
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
                        <h6 class="mb-4">Rincian Alasan Pulang</h6>
                        <div class="mb-3">
                            <div class="mb-3">
                                <label for="jumlahpulang" class="form-label">Jumlah Hari Pulang</label>
                                <input type="number" class="form-control" id="jumlahpulang"
                                    aria-describedby="jumlahpulang">
                            </div>
                            <div class="mb-3">
                                <label for="jumlahjampulang" class="form-label">Jumlah Jam Pulang</label>
                                <input type="number" class="form-control" id="jumlahjampulang"
                                    aria-describedby="jumlahjampulang">
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
                        <h6 class="mb-4">Rincian Alasan lain</h6>
                        <div class="mb-3">
                            <div class="mb-3">
                                <label for="jumlahlain" class="form-label">Jumlah Hari lain</label>
                                <input type="number" class="form-control" id="jumlahlain"
                                    aria-describedby="jumlahlain">
                            </div>
                            <div class="mb-3">
                                <label for="jumlahjamlain" class="form-label">Jumlah Jam lain</label>
                                <input type="number" class="form-control" id="jumlahjamlain"
                                    aria-describedby="jumlahjamlain">
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
                            <p>Kegiatan GT Di Luar Kelas</p>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="kegiatan1">
                                <label class="form-check-label" for="kegiatan1">Mengajar Al-Qur'an Bit-Tartil</label><br>

                                <input type="checkbox" class="form-check-input" id="kegiatan2">
                                <label class="form-check-label" for="kegiatan2">Mengajar Kitabiyah</label><br>

                                <input type="checkbox" class="form-check-input" id="kegiatan3">
                                <label class="form-check-label" for="kegiatan3">Menjadi Imam Shalat Rawatib</label><br>

                                <input type="checkbox" class="form-check-input" id="kegiatan4">
                                <label class="form-check-label" for="kegiatan4">Menjadi Imam Shalat Jum'at</label><br>

                                <input type="checkbox" class="form-check-input" id="kegiatan5">
                                <label class="form-check-label" for="kegiatan5">Menjadi Bilal Shalat Jum'at</label><br>

                                <input type="checkbox" class="form-check-input" id="kegiatan6">
                                <label class="form-check-label" for="kegiatan6">Kegiatan Kemasyarakatan</label><br>

                                <input type="checkbox" class="form-check-input" id="kegiatan7">
                                <label class="form-check-label" for="kegiatan7">Tidak Ada</label><br>

                                <input class="form-check-input" type="checkbox" id="kegiatanLain"
                                    onchange="document.getElementById('inputKegiatanLain').disabled = !this.checked;">
                                <label class="form-check-label me-2" for="kegiatanLain">Yang lain:</label>
                                <input type="text" class="form-control" id="inputKegiatanLain"
                                    placeholder="Tuliskan kegiatan lain..." disabled>
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
                            <label for="alasantidakmengajar" class="form-label">Interaksi Dengan PJGT</label>
                            <select class="form-select mb-3" id="alasantidakmengajar" aria-label="Default select ">
                                <option selected disabled>--Pilih--</option>
                                <option value="1">Jarang</option>
                                <option value="1">Sering</option>
                                <option value="1">Tidak Pernah</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="alasantidakmengajar" class="form-label">Interaksi Dengan Kepala Madrasah</label>
                            <select class="form-select mb-3" id="alasantidakmengajar" aria-label="Default select ">
                                <option selected disabled>--Pilih--</option>
                                <option value="1">Jarang</option>
                                <option value="1">Sering</option>
                                <option value="1">Tidak Pernah</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="alasantidakmengajar" class="form-label">Interaksi Dengan Guru</label>
                            <select class="form-select mb-3" id="alasantidakmengajar" aria-label="Default select ">
                                <option selected disabled>--Pilih--</option>
                                <option value="1">Jarang</option>
                                <option value="1">Sering</option>
                                <option value="1">Tidak Pernah</option>
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
                            <p>Bisyaroh Bulan Ini</p>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions"
                                    id="inlineRadio1" value="option1">
                                <label class="form-check-label" for="inlineRadio1">Ya</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions"
                                    id="inlineRadio2" value="option2">
                                <label class="form-check-label" for="inlineRadio2">Tidak</label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="sebanyak" class="form-label">Sebanyak Rp.</label>
                            <input type="number" class="form-control" id="sebanyak" aria-describedby="sebanyak">
                            <div id="sebanyak" style="font-size: 10px" class="form-text fst-italic mb-4">(* Ditulis
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
                            <label for="kendala" class="form-label">Kendala Bulan Ini</label>
                            <input type="text" class="form-control" id="kendala" aria-describedby="descKendala">
                            <div id="descKendala" style="font-size: 10px" class="form-text fst-italic mb-4">
                                (* jika tidak ada kendala ketik "Tidak ada")
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="pemecahan" class="form-label">Langkah Pemecahan Kendala</label>
                            <input type="text" class="form-control" id="pemecahan" aria-describedby="descPemecahan">
                            <div id="descPemecahan" style="font-size: 10px" class="form-text fst-italic mb-4">
                                (* jika tidak ada langkah yang dilakukan ketik "Tidak ada")
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="tugasBaru" class="form-label">Tugas Baru Dari KM/PJGT</label>
                            <input type="text" class="form-control" id="tugasBaru" aria-describedby="descTugasBaru">
                            <div id="descTugasBaru" style="font-size: 10px" class="form-text fst-italic mb-4">
                                (* jika tidak ada tugas baru ketik "Tidak ada")
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="tugasBelum" class="form-label">Tugas Belum Terlaksana</label>
                            <input type="text" class="form-control" id="tugasBelum"
                                aria-describedby="descTugasBelum">
                            <div id="descTugasBelum" style="font-size: 10px" class="form-text fst-italic mb-4">
                                (* jika semua tugas Tuntas ketik "Tidak ada")
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="saran" class="form-label">Usulan/Saran</label>
                            <input type="text" class="form-control" id="saran" aria-describedby="descSaran">
                            <div id="descSaran" style="font-size: 10px" class="form-text fst-italic mb-4">
                                (* jika tidak ada usulan/saran ketik "Tidak ada")
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
                            <label for="tglLaporan" class="form-label">Tanggal Laporan</label>
                            <input type="text" class="form-control">
                            <div id="descSaran" style="font-size: 10px" class="form-text fst-italic mb-4">
                                (* tanggal ditulis menggunakan tanggal Hijriyah. (Contoh : 15 Dzul Qo'dah1444)
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
@endsection

