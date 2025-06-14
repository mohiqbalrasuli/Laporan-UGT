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
                                        <th>Nama Madrasah</th>
                                        <th>Alamat Madrasah</th>
                                        <th>Nama PJGT</th>
                                        <th>Tanggal Laporan</th>
                                        <th>Aksi</th>
                                    </tr>
                            </thead>
                            <tbody>
                                @foreach ($laporan_gt as $key => $laporan)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $laporan->laporan_ke }}</td>
                                    <td>{{ $laporan->bulan_tahun }}</td>
                                    <td>{{ $laporan->gt->user->name }}</td>
                                    <td>{{ $laporan->gt->alamat }}</td>
                                    <td>{{ $laporan->gt->madrasah->nama_madrasah ?? '-' }}</td>
                                    <td>{{ $laporan->gt->madrasah->alamat_madrasah ?? '-' }}</td>
                                    <td>{{ $laporan->gt->pjgt->user->name ?? '-' }}</td>
                                    <td>{{ $laporan->tanggal_laporan }}</td>
                                    <td>
                                        <a href="#" class="btn btn-primary btn-sm" data-bs-toggle="offcanvas"
                                            data-bs-target="#offcanvasDetail{{ $laporan->id }}" aria-controls="offcanvasDetail">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                    </td>
                                    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasDetail{{ $laporan->id }}"
                                        aria-labelledby="offcanvasDetailLabel">
                                        <div class="offcanvas-header">
                                            <h5 class="offcanvas-title" id="offcanvasDetailLabel">Detail Laporan GT</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="offcanvas-body">
                                            <div class="row mb-3">
                                                <div class="col-md-12">
                                                    <label class="form-label fw-bold">Laporan Ke</label>
                                                    <p>{{ $laporan->laporan_ke }}</p>
                                                </div>
                                                <div class="col-md-12">
                                                    <label class="form-label fw-bold">Bulan/Tahun</label>
                                                    <p>{{ $laporan->bulan_tahun }}</p>
                                                </div>
                                                <div class="col-md-12">
                                                    <label class="form-label fw-bold">Tanggal Laporan</label>
                                                    <p>{{ $laporan->tanggal_laporan }}</p>
                                                </div>
                                            </div>

                                            <h6 class="mb-3">Data GT</h6>
                                            <div class="row mb-3">
                                                <div class="col-md-12">
                                                    <label class="form-label fw-bold">Nama</label>
                                                    <p>{{ $laporan->gt->user->name }}</p>
                                                </div>
                                                <div class="col-md-12">
                                                    <label class="form-label fw-bold">Alamat Lengkap</label>
                                                    <p>{{ $laporan->gt->alamat }}</p>
                                                </div>
                                                <div class="col-md-12">
                                                    <label class="form-label fw-bold">Asal Kelas</label>
                                                    <p>{{ $laporan->gt->asal_kelas }}</p>
                                                </div>
                                                <div class="col-md-12">
                                                    <label class="form-label fw-bold">Status Tugas</label>
                                                    <p>{{ $laporan->gt->status_tugas }}</p>
                                                </div>
                                            </div>

                                            <h6 class="mb-3">Tempat Bertugas</h6>
                                            <div class="row mb-3">
                                                <div class="col-md-12">
                                                    <label class="form-label fw-bold">Nama Madrasah</label>
                                                    <p>{{ $laporan->gt->madrasah->nama_madrasah ?? '-' }}</p>
                                                </div>
                                                <div class="col-md-12">
                                                    <label class="form-label fw-bold">Alamat Madrasah</label>
                                                    <p>{{ $laporan->gt->madrasah->alamat_madrasah ?? '-' }}</p>
                                                </div>
                                                <div class="col-md-12">
                                                    <label class="form-label fw-bold">Nama Kepala</label>
                                                    <p>{{ $laporan->gt->madrasah->nama_kepala_madrasah ?? '-' }}</p>
                                                </div>
                                                <div class="col-md-12">
                                                    <label class="form-label fw-bold">Nama PJGT</label>
                                                    <p>{{ $laporan->gt->pjgt->user->name ?? '-' }}</p>
                                                </div>
                                            </div>

                                            <h6 class="mb-3">Kegiatan Madrasah</h6>
                                            <div class="row mb-3">
                                                <div class="col-md-12">
                                                    <label class="form-label fw-bold">Wali kelas</label>
                                                    <p>{{ $laporan->wali_kelas }}</p>
                                                </div>
                                                <div class="col-md-12">
                                                    <label class="form-label fw-bold">Guru kelas</label>
                                                    <p>{{ implode(', ', $laporan->guru_kelas) }}</p>
                                                </div>
                                                <div class="col-md-12">
                                                    <label class="form-label fw-bold">Guru fan</label>
                                                    <p>{{ $laporan->guru_fan }}</p>
                                                </div>
                                                <div class="col-md-12">
                                                    <label class="form-label fw-bold">Jenis kelamin Murid</label>
                                                    <p>{{ implode(', ', $laporan->jenis_kelamin_murid) }}</p>
                                                </div>
                                            </div>

                                            <h6 class="mb-3">Jumlah Hari Mengajar / Tidak Mengajar</h6>
                                            <div class="row mb-3">
                                                <div class="col-md-12">
                                                    <label class="form-label fw-bold">Jumlah Hari Mengajar Dalam Satu Minggu</label>
                                                    <p>{{ $laporan->jumlah_mengajar_satu_minggu }}</p>
                                                </div>
                                                <div class="col-md-12">
                                                    <label class="form-label fw-bold">Jumlah Hari Mengajar Dalam Satu Bulan</label>
                                                    <p>{{ $laporan->jumlah_mengajar_satu_bulan }}</p>
                                                </div>
                                                <div class="col-md-12">
                                                    <label class="form-label fw-bold">Alasan Tidak Masuk</label>
                                                    <p>{{ implode(', ', $laporan->alasan_tidak_masuk) }}</p>
                                                </div>
                                                <div class="col-md-12">
                                                    <label class="form-label fw-bold">Jumlah hari Sakit</label>
                                                    <p>{{ $laporan->jumlah_hari_sakit }}</p>
                                                </div>
                                                <div class="col-md-12">
                                                    <label class="form-label fw-bold">Jumlah Hari Pulang</label>
                                                    <p>{{ $laporan->jumlah_hari_pulang }}</p>
                                                </div>
                                                <div class="col-md-12">
                                                    <label class="form-label fw-bold">Jumlah Hari Lain</label>
                                                    <p>{{ $laporan->jumlah_alasan_lain }}</p>
                                                </div>
                                            </div>

                                            <h6 class="mb-3">Kegiatan Luar</h6>
                                            <div class="row mb-3">
                                                <div class="col-md-12">
                                                    <label class="form-label fw-bold">Jenis Kegiatan</label>
                                                    <p>{{ implode(', ', $laporan->kegiatan_gt_Diluar_kelas) }}</p>
                                                </div>
                                            </div>

                                            <h6 class="mb-3">Interaksi Sosial</h6>
                                            <div class="row mb-3">
                                                <div class="col-md-12">
                                                    <label class="form-label fw-bold">Interaksi Dengan PJGT</label>
                                                    <p>{{ $laporan->interaksi_dengan_pjgt }}</p>
                                                </div>
                                                <div class="col-md-12">
                                                    <label class="form-label fw-bold">Interaksi Dengan Kepala Madrasah</label>
                                                    <p>{{ $laporan->interaksi_dengan_kepmad }}</p>
                                                </div>
                                                <div class="col-md-12">
                                                    <label class="form-label fw-bold">Interaksi Dengan Guru Lainnya</label>
                                                    <p>{{ $laporan->interaksi_dengan_guru }}</p>
                                                </div>
                                            </div>

                                            <h6 class="mb-3">Bisyaroh</h6>
                                            <div class="row mb-3">
                                                <div class="col-md-12">
                                                    <label class="form-label fw-bold">Status</label>
                                                    <p>{{ $laporan->bisyaroh_bulan_ini }}</p>
                                                </div>
                                                <div class="col-md-12">
                                                    <label class="form-label fw-bold">Jumlah</label>
                                                    <p>Rp. {{ number_format($laporan->bisyaroh_bulan_ini_sebanyak, 0, ',', '.') }}</p>
                                                </div>
                                            </div>

                                            <h6 class="mb-3">Informasi Lain</h6>
                                            <div class="row mb-3">
                                                <div class="col-md-12">
                                                    <label class="form-label fw-bold">Kendala</label>
                                                    <p>{{ $laporan->kendala_bulan_ini }}</p>
                                                </div>
                                                <div class="col-md-12">
                                                    <label class="form-label fw-bold">Langkah Pemecahan Kendala</label>
                                                    <p>{{ $laporan->langkah_pemecahan_kendala }}</p>
                                                </div>
                                                <div class="col-md-12">
                                                    <label class="form-label fw-bold">Tugas Baru Dari KM/PJGT</label>
                                                    <p>{{ $laporan->tugas_dari_km_pjgt }}</p>
                                                </div>
                                                <div class="col-md-12">
                                                    <label class="form-label fw-bold">Tugas belum Terlaksana</label>
                                                    <p>{{ $laporan->tugas_belum_terlaksana }}</p>
                                                </div>
                                                <div class="col-md-12">
                                                    <label class="form-label fw-bold">Usulan Dan Saran</label>
                                                    <p>{{ $laporan->usulan }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
