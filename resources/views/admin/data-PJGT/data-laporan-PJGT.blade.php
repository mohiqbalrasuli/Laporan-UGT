@extends('admin.layout.template_admin')
@section('title','Data Laporan PJGT')
@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-12">
                <div class="bg-light rounded h-100 p-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <h6 class="mb-4">Data Laporan Penanggung Jawab Guru Tugas</h6>
                        <div class="mb-4">
                            <button type="button" class="btn btn-danger me-2"><i class="fas fa-file-pdf me-2"></i>Export PDF</button>
                            <button type="button" class="btn btn-success"><i class="fas fa-file-excel me-2"></i>Export Spreadsheet</button>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Laporan Ke</th>
                                    <th>Bulan/Tahun</th>
                                    <th>No. Induk PJGT</th>
                                    <th>Nama PJGT</th>
                                    <th>Alamat Rumah</th>
                                    <th>Nama Madrasah</th>
                                    <th>Alamat Madrasah</th>
                                    <th>Nama GT</th>
                                    <th>Alamat GT</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>1</td>
                                    <td>Muharram 1446</td>
                                    <td>12345</td>
                                    <td>Nama PJGT</td>
                                    <td>Alamat Rumah PJGT</td>
                                    <td>MI Nurul Huda</td>
                                    <td>Alamat Madrasah</td>
                                    <td>Nama GT</td>
                                    <td>Alamat GT</td>
                                    <td>
                                        <a href="#" class="btn btn-primary btn-sm" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDetail" aria-controls="offcanvasDetail">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Detail Offcanvas -->
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasDetail" aria-labelledby="offcanvasDetailLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasDetailLabel">Detail Laporan PJGT</h5>
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
                    <p>Muharram 1446</p>
                </div>
                <div class="col-md-4">
                    <label class="form-label fw-bold">Tanggal Laporan</label>
                    <p>15 Muharram 1446</p>
                </div>
            </div>

            <h6 class="mb-3">Data PJGT</h6>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label fw-bold">No. Induk PJGT</label>
                    <p>12345</p>
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-bold">Nama PJGT</label>
                    <p>Nama PJGT</p>
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-bold">Alamat Rumah</label>
                    <p>Alamat Rumah PJGT</p>
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-bold">Nama Madrasah</label>
                    <p>MI Nurul Huda</p>
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-bold">Alamat Madrasah</label>
                    <p>Alamat Madrasah</p>
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-bold">Nama Pengirim</label>
                    <p>Nama Pengirim</p>
                </div>
            </div>

            <h6 class="mb-3">Data Guru Tugas</h6>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label fw-bold">Nama GT</label>
                    <p>Nama GT</p>
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-bold">Alamat GT</label>
                    <p>Alamat GT</p>
                </div>
            </div>

            <h6 class="mb-3">Kegiatan GT Dalam Kelas</h6>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label fw-bold">Wali Kelas</label>
                    <p>Kelas 1</p>
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-bold">Status Guru</label>
                    <p>Banin-Banat</p>
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-bold">Kehadiran</label>
                    <p>Rajin</p>
                </div>
            </div>

            <h6 class="mb-3">Kedisiplinan</h6>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label fw-bold">Rambut</label>
                    <p>Pendek</p>
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-bold">Bepergian</label>
                    <p>Tidak</p>
                </div>
            </div>

            <h6 class="mb-3">Hubungan Sosial</h6>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label fw-bold">Dengan PJGT</label>
                    <p>Sering</p>
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-bold">Dengan Kepala Madrasah</label>
                    <p>Sering</p>
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-bold">Dengan Guru</label>
                    <p>Sering</p>
                </div>
                <div class="col-md-6">
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
                <div class="col-md-12">
                    <label class="form-label fw-bold">Usulan dan Lain-lain</label>
                    <p>Tidak ada</p>
                </div>
            </div>
        </div>
    </div>
@endsection
