@extends('admin.layout.template_admin')

@section('title', 'Data Laporan Guru Tugas')

@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-12">
                <div class="bg-light rounded h-100 p-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <h6 class="mb-4">Data Laporan Guru Tugas</h6>
                        <div class="mb-4">
                            <button type="button" class="btn btn-danger me-2"><i class="fas fa-file-pdf me-2"></i>Export
                                PDF</button>
                            <button type="button" class="btn btn-success"><i class="fas fa-file-excel me-2"></i>Export
                                Spreadsheet</button>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Laporan Ke</th>
                                    <th>Bulan / Tahun</th>
                                    <th>Nama</th>
                                    <th>Alamat</th>
                                    <th>Asal Kelas</th>
                                    <th>Status Tugas</th>
                                    <th>Nama Madrasah</th>
                                    <th>Alamat Madrasah</th>
                                    <th>Kepala Madrasah</th>
                                    <th>PJGT</th>
                                    <th>Tanggal Laporan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>1</td>
                                    <td>Syawal-Dzul Qo'dah 1446</td>
                                    <td>Nama GT</td>
                                    <td>Alamat GT</td>
                                    <td>MMU Ibtidaiyah</td>
                                    <td>Wajib</td>
                                    <td>Nama Madrasah</td>
                                    <td>Alamat Madrasah</td>
                                    <td>Nama Kepala</td>
                                    <td>Nama PJGT</td>
                                    <td>15 Dzul Qo'dah 1446</td>
                                    <td>
                                        <a href="#" class="btn btn-primary btn-sm" data-bs-toggle="offcanvas"
                                            data-bs-target="#offcanvasDetail" aria-controls="offcanvasDetail">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                    </td>
                                    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasDetail" aria-labelledby="offcanvasDetailLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasDetailLabel">Detail Laporan GT</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <div class="row mb-3">
                <div class="col-md-4">
                    <label class="form-label fw-bold">Laporan Ke</label>
                    <p>1</p>
                </div>
                <div class="col-md-4">
                    <label class="form-label fw-bold">Bulan/Tahun</label>
                    <p>Syawal-Dzul Qo'dah 1446</p>
                </div>
                <div class="col-md-4">
                    <label class="form-label fw-bold">Tanggal Laporan</label>
                    <p>15 Dzul Qo'dah 1446</p>
                </div>
            </div>

            <h6 class="mb-3">Data GT</h6>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label fw-bold">Nama</label>
                    <p>Moh. Wildan</p>
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-bold">Alamat Lengkap</label>
                    <p>Batuputih Laok Batuputih sumenep</p>
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-bold">Asal Kelas</label>
                    <p>MMU Ibtidaiyah</p>
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-bold">Status Tugas</label>
                    <p>Wajib</p>
                </div>
            </div>

            <h6 class="mb-3">Tempat Bertugas</h6>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label fw-bold">Nama Madrasah</label>
                    <p>MI Nurul Huda</p>
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-bold">Alamat Madrasah</label>
                    <p>Jl. Raya Batuputih</p>
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-bold">Nama Kepala</label>
                    <p>Akh. Ainur Rasyidi</p>
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-bold">Nama PJGT</label>
                    <p>Ach. Hamzah Ilahi Maulana Muhammadi</p>
                </div>
            </div>

            <h6 class="mb-3">Kegiatan Madrasah</h6>
            <div class="row mb-3">
                <div class="col-md-4">
                    <label class="form-label fw-bold">Kelas yang Diampu</label>
                    <p>1 Ibtidaiyah</p>
                </div>
                <div class="col-md-4">
                    <label class="form-label fw-bold">Kelas yang Dibantu</label>
                    <p>1,2,3 Ibtidaiyah</p>
                </div>
                <div class="col-md-4">
                    <label class="form-label fw-bold">Mata Pelajaran</label>
                    <p>Matematika</p>
                </div>
            </div>

            <h6 class="mb-3">Jadwal Mengajar</h6>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label fw-bold">Hari Mengajar</label>
                    <p>5 hari</p>
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-bold">Jam Mengajar</label>
                    <p>20 jam</p>
                </div>
            </div>

            <h6 class="mb-3">Alasan Tidak Mengajar</h6>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label fw-bold">Sakit</label>
                    <p>2 hari (8 jam)</p>
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-bold">Izin</label>
                    <p>1 hari (4 jam)</p>
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-bold">Tanpa Keterangan</label>
                    <p>0 hari (0 jam)</p>
                </div>
            </div>

            <h6 class="mb-3">Kegiatan Luar</h6>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label fw-bold">Jenis Kegiatan</label>
                    <p>Mengajar Al-Qur'an</p>
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-bold">Keterangan</label>
                    <p>Keterangan</p>
                </div>
            </div>

            <h6 class="mb-3">Interaksi Sosial</h6>
            <div class="row mb-3">
                <div class="col-md-4">
                    <label class="form-label fw-bold">Dengan Guru</label>
                    <p>Sering</p>
                </div>
                <div class="col-md-4">
                    <label class="form-label fw-bold">Dengan Siswa</label>
                    <p>Sering</p>
                </div>
                <div class="col-md-4">
                    <label class="form-label fw-bold">Dengan Masyarakat</label>
                    <p>Sering</p>
                </div>
            </div>

            <h6 class="mb-3">Bisyaroh</h6>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label fw-bold">Status</label>
                    <p>Ya</p>
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-bold">Jumlah</label>
                    <p>Rp. 1.000.000</p>
                </div>
            </div>

            <h6 class="mb-3">Informasi Lain</h6>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label fw-bold">Kendala</label>
                    <p>Tidak ada</p>
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-bold">Solusi</label>
                    <p>Tidak ada</p>
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-bold">Saran</label>
                    <p>Tidak ada</p>
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-bold">Kritik</label>
                    <p>Tidak ada</p>
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-bold">Harapan</label>
                    <p>Tidak ada</p>
                </div>
            </div>
        </div>
    </div>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
