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
                            @php
                                $laporanKeList = \App\Models\LaporanPJGTModel::select('laporan_ke')->distinct()->orderBy('laporan_ke')->pluck('laporan_ke');
                            @endphp

                            <div class="dropdown me-2 d-inline">
                                <button class="btn btn-danger dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                    <i class="fas fa-file-pdf me-2"></i>Export PDF
                                </button>
                                <ul class="dropdown-menu">
                                    @foreach($laporanKeList as $laporanKe)
                                        <li>
                                            <a class="dropdown-item" href="{{ url('admin/data-PJGT/laporan/per-laporan-ke/'.$laporanKe .'/zip') }}">
                                                Laporan Ke-{{ $laporanKe }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <a href="{{ url('admin/data-PJGT/export-laporan') }}" class="btn btn-success"><i class="fas fa-file-excel me-2"></i>Export Spreadsheet</a>
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
                                @foreach ($laporan_pjgt as $key =>$laporan )
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $laporan->laporan_ke }}</td>
                                    <td>{{ $laporan->laporan_bulan }} {{ $laporan->tahun }}</td>
                                    <td>{{ $laporan->pjgt->no_induk }}</td>
                                    <td>{{ $laporan->pjgt->user->name }}</td>
                                    <td>{{ $laporan->pjgt->alamat }}</td>
                                    <td>{{ $laporan->pjgt->madrasah->nama_madrasah ?? '-' }}</td>
                                    <td>{{ $laporan->pjgt->madrasah->alamat_madrasah ?? '-' }}</td>
                                    <td>{{ $laporan->pjgt->gt->user->name ?? '-' }}</td>
                                    <td>{{ $laporan->pjgt->gt->alamat ?? '-' }}</td>
                                    <td>
                                        <a href="#" class="btn btn-primary btn-sm" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDetail{{ $laporan->id }}" aria-controls="offcanvasDetail">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                    </td>
                                </tr>
                                <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasDetail{{ $laporan->id }}" aria-labelledby="offcanvasDetailLabel">
                                    <div class="offcanvas-header">
                                        <h5 class="offcanvas-title" id="offcanvasDetailLabel">Detail Laporan PJGT</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                                    </div>
                                    <div class="offcanvas-body">
                                        <div class="row mb-3">
                                            <div class="col-md-4">
                                                <label class="form-label fw-bold">Laporan Ke</label>
                                                <p>{{ $laporan->laporan_ke }}</p>
                                            </div>
                                            <div class="col-md-4">
                                                <label class="form-label fw-bold">Bulan/Tahun</label>
                                                <p>{{ $laporan->laporan_bulan }} {{ $laporan->tahun }}</p>
                                            </div>
                                        </div>

                                        <h6 class="mb-3">Data PJGT</h6>
                                        <div class="row mb-3">
                                            <div class="col-md-12">
                                                <label class="form-label fw-bold">No. Induk PJGT</label>
                                                <p>{{ $laporan->pjgt->no_induk }}</p>
                                            </div>
                                            <div class="col-md-12">
                                                <label class="form-label fw-bold">Nama PJGT</label>
                                                <p>{{ $laporan->pjgt->user->name }}</p>
                                            </div>
                                            <div class="col-md-12">
                                                <label class="form-label fw-bold">Alamat Rumah</label>
                                                <p>{{ $laporan->pjgt->alamat }}</p>
                                            </div>
                                            <div class="col-md-12">
                                                <label class="form-label fw-bold">Nama Madrasah</label>
                                                <p>{{ $laporan->pjgt->madrasah->nama_madrasah ?? '-' }}</p>
                                            </div>
                                            <div class="col-md-12">
                                                <label class="form-label fw-bold">Alamat Madrasah</label>
                                                <p>{{ $laporan->pjgt->madrasah->alamat_madrasah ?? '-' }}</p>
                                            </div>
                                            <div class="col-md-12">
                                                <label class="form-label fw-bold">Kepala Madrasah</label>
                                                <p>{{ $laporan->pjgt->madrasah->nama_kepala_madrasah ?? '-' }}</p>
                                            </div>
                                        </div>

                                        <h6 class="mb-3">Data Guru Tugas</h6>
                                        <div class="row mb-3">
                                            <div class="col-md-12">
                                                <label class="form-label fw-bold">Nama GT</label>
                                                <p>{{ $laporan->pjgt->gt->user->name ?? '-' }}</p>
                                            </div>
                                            <div class="col-md-12">
                                                <label class="form-label fw-bold">Alamat GT</label>
                                                <p>{{ $laporan->pjgt->gt->alamat ?? '-' }}</p>
                                            </div>
                                        </div>

                                        <h6 class="mb-3">Kegiatan GT Dalam Kelas</h6>
                                        <div class="row mb-3">
                                            <div class="col-md-12">
                                                <label class="form-label fw-bold">Wali Kelas</label>
                                                <p>{{ $laporan->wali_kelas }}</p>
                                            </div>
                                            <div class="col-md-12">
                                                <label class="form-label fw-bold">Tingkat</label>
                                                <p>{{ implode(', ', $laporan->guru_fak_kelas) }}</p>
                                            </div>
                                            <div class="col-md-12">
                                                <label class="form-label fw-bold">GT Menjadi guru</label>
                                                <p>{{ implode(', ', $laporan->menjadi_guru) }}</p>
                                            </div>
                                            <div class="col-md-12">
                                                <label class="form-label fw-bold">GT Masuk Madrasah/Sekolah</label>
                                                <p>{{ $laporan->gt_masuk_madrasah }}</p>
                                            </div>
                                            <div class="col-md-12">
                                                <label class="form-label fw-bold">Mengajar Murid Balighah</label>
                                                <p>{{ $laporan->murid_balighah }}</p>
                                            </div>
                                        </div>
                                        <h6 class="mb-3">Kegiatan GT Luar Kelas</h6>
                                        <div class="row mb-3">
                                            <div class="col-md-12">
                                                <label class="form-label fw-bold">Jenis Kegiatan</label>
                                                <p>{{ $laporan->jenis_kegiatan }}</p>
                                            </div>
                                            <div class="col-md-12">
                                                <label class="form-label fw-bold">Dilaksanakan Diwaktu</label>
                                                <p>{{ implode(', ', $laporan->waktu_kegiatan) }}</p>
                                            </div>
                                            <div class="col-md-12">
                                                <label class="form-label fw-bold">Sifat Kegiatan</label>
                                                <p>{{ $laporan->sifat_kegiatan }}</p>
                                            </div>
                                        </div>
                                        <h6 class="mb-3">Kedisiplinan</h6>
                                        <div class="row mb-3">
                                            <div class="col-md-12">
                                                <label class="form-label fw-bold">Rambut GT</label>
                                                <p>{{ $laporan->rambut_gt }}</p>
                                            </div>
                                            <div class="col-md-12">
                                            </div>
                                            <div class="col-md-12">
                                                <label class="form-label fw-bold">GT Pernah Bepergian</label>
                                                <p>{{ $laporan->gt_bepergian }}</p>
                                            </div>
                                            <div class="col-md-12">
                                                <label class="form-label fw-bold">Bepergian Sebanyak</label>
                                                <p>{{ $laporan->berpergian_sebanyak ?? '-' }} kali</p>
                                            </div>
                                            <div class="col-md-12">
                                                <label class="form-label fw-bold">Tujuan Bepergian</label>
                                                <p>{{ $laporan->tujuan_bepergian ?? '-' }} kali</p>
                                            </div>
                                            <div class="col-md-12">
                                                <label class="form-label fw-bold">GT pernah Pulang Kampung</label>
                                                <p>{{ $laporan->gt_pernah_pulang_kampung }}</p>
                                            </div>
                                            <div class="col-md-12">
                                                <label class="form-label fw-bold">Pulang Kampung Sebanyak</label>
                                                <p>{{ $laporan->pulang_kampung_sebanyak ?? '-' }} kali</p>
                                            </div>
                                            <div class="col-md-12">
                                                <label class="form-label fw-bold">GT Pernah Melakukan Pelanggaran</label>
                                                <p>{{ $laporan->gt_melakukan_pelanggaran }}</p>
                                            </div>
                                            <div class="col-md-12">
                                                <label class="form-label fw-bold">Pelanggaran Berupa</label>
                                                <p>{{ $laporan->pelanggran_berupa ?? '-' }}</p>
                                            </div>
                                            <div class="col-md-12">
                                                <label class="form-label fw-bold">PJGT Mengambil Tindakan Pelanggaran</label>
                                                <p>{{ $laporan->pjgt_mengambil_tindakan }}</p>
                                            </div>
                                            <div class="col-md-12">
                                                <label class="form-label fw-bold">Tindakan Berupa</label>
                                                <p>{{ $laporan->tindakan_berupa }}</p>
                                            </div>
                                            <div class="col-md-12">
                                                <label class="form-label fw-bold">Surat Ijin Dari Pengurus Telah Dipakai</label>
                                                <p>{{ $laporan->surat_ijin_dipakai }} kali</p>
                                            </div>
                                        </div>

                                        <h6 class="mb-3">Hubungan Sosial</h6>
                                        <div class="row mb-3">
                                            <div class="col-md-12">
                                                <label class="form-label fw-bold">Dengan PJGT</label>
                                                <p>{{ $laporan->hubungan_dengan_pjgt }}</p>
                                            </div>
                                            <div class="col-md-12">
                                                <label class="form-label fw-bold">Dengan Kepala Madrasah</label>
                                                <p>{{ $laporan->hubungan_dengan_kepmad }}</p>
                                            </div>
                                            <div class="col-md-12">
                                                <label class="form-label fw-bold">Dengan Guru</label>
                                                <p>{{ $laporan->hubungan_dengan_guru }}</p>
                                            </div>
                                            <div class="col-md-12">
                                                <label class="form-label fw-bold">Dengan Masyarakat</label>
                                                <p>{{ $laporan->hubungan_dengan_wali_murid_masyarakat }}</p>
                                            </div>
                                            <div class="col-md-12">
                                                <label class="form-label fw-bold">Hubungan Sosial Didalam Kelas</label>
                                                <p>{{ $laporan->hubungan_dengan_murid_dikelas }}</p>
                                            </div>
                                            <div class="col-md-12">
                                                <label class="form-label fw-bold">Hubungan Sosial Diluar Kelas</label>
                                                <p>{{ $laporan->hubungan_dengan_murid_diluar }}</p>
                                            </div>
                                            <div class="col-md-12">
                                                <label class="form-label fw-bold">Tanggapan Umum Murid Terhadap Guru Tugas</label>
                                                <p>{{ $laporan->tanggapan_murid }}</p>
                                            </div>
                                            <div class="col-md-12">
                                                <label class="form-label fw-bold">Tanggapan Umum Masyarakat Terhadap Guru Tugas</label>
                                                <p>{{ $laporan->tanggapan_masyarakat }}</p>
                                            </div>
                                        </div>

                                        <h6 class="mb-3">Bisyaroh 1</h6>
                                        <div class="row mb-3">
                                            <div class="col-md-12">
                                                <label class="form-label fw-bold">Status</label>
                                                <p>{{ $laporan->bisyaroh_satu }}</p>
                                            </div>
                                            <div class="col-md-12">
                                                <label class="form-label fw-bold">Jumlah</label>
                                                <p>{{ $laporan->bisyaroh_satu === 'Ya' ? ', Rp' . $laporan->bisyaroh_satu_sebanyak : '' }}</p>
                                            </div>
                                        </div>
                                        <h6 class="mb-3">Bisyaroh 2</h6>
                                        <div class="row mb-3">
                                            <div class="col-md-12">
                                                <label class="form-label fw-bold">Status</label>
                                                <p>{{ $laporan->bisyaroh_dua }}</p>
                                            </div>
                                            <div class="col-md-12">
                                                <label class="form-label fw-bold">Jumlah</label>
                                                <p>{{ $laporan->bisyaroh_dua === 'Ya' ? ', Rp' . $laporan->bisyaroh_dua_sebanyak : '' }}</p>
                                            </div>
                                        </div>
                                        <h6 class="mb-3">Bisyaroh 3</h6>
                                        <div class="row mb-3">
                                            <div class="col-md-12">
                                                <label class="form-label fw-bold">Status</label>
                                                <p>{{ $laporan->bisyaroh_tiga }}</p>
                                            </div>
                                            <div class="col-md-12">
                                                <label class="form-label fw-bold">Jumlah</label>
                                                <p>{{ $laporan->bisyaroh_tiga === 'Ya' ? ', Rp' . $laporan->bisyaroh_tiga_sebanyak : '' }}</p>
                                            </div>
                                        </div>
                                        <h6 class="mb-3">Bisyaroh 4</h6>
                                        <div class="row mb-3">
                                            <div class="col-md-12">
                                                <label class="form-label fw-bold">Status</label>
                                                <p>{{ $laporan->bisyaroh_empat }}</p>
                                            </div>
                                            <div class="col-md-12">
                                                <label class="form-label fw-bold">Jumlah</label>
                                                <p>{{ $laporan->bisyaroh_empat === 'Ya' ? ', Rp' . $laporan->bisyaroh_empat_sebanyak : '' }}</p>
                                            </div>
                                        </div>
                                        <h6 class="mb-3">Bisyaroh 5</h6>
                                        <div class="row mb-3">
                                            <div class="col-md-12">
                                                <label class="form-label fw-bold">Status</label>
                                                <p>{{ $laporan->bisyaroh_lima }}</p>
                                            </div>
                                            <div class="col-md-12">
                                                <label class="form-label fw-bold">Jumlah</label>
                                                <p>{{ $laporan->bisyaroh_lima === 'Ya' ? ', Rp' . $laporan->bisyaroh_lima_sebanyak : '' }}</p>
                                            </div>
                                        </div>
                                        <h6 class="mb-3">Bisyaroh 6</h6>
                                        <div class="row mb-3">
                                            <div class="col-md-12">
                                                <label class="form-label fw-bold">Status</label>
                                                <p>{{ $laporan->bisyaroh_enam }}</p>
                                            </div>
                                            <div class="col-md-12">
                                                <label class="form-label fw-bold">Jumlah</label>
                                                <p>{{ $laporan->bisyaroh_enam === 'Ya' ? ', Rp' . $laporan->bisyaroh_enam_sebanyak : '' }}</p>
                                            </div>
                                        </div>
                                        <h6 class="mb-3">Bisyaroh 7</h6>
                                        <div class="row mb-3">
                                            <div class="col-md-12">
                                                <label class="form-label fw-bold">Status</label>
                                                <p>{{ $laporan->bisyaroh_tujuh }}</p>
                                            </div>
                                            <div class="col-md-12">
                                                <label class="form-label fw-bold">Jumlah</label>
                                                <p>{{ $laporan->bisyaroh_tujuh === 'Ya' ? ', Rp' . $laporan->bisyaroh_tujuh_sebanyak : '' }}</p>
                                            </div>
                                        </div>
                                        <h6 class="mb-3">Bisyaroh 8</h6>
                                        <div class="row mb-3">
                                            <div class="col-md-12">
                                                <label class="form-label fw-bold">Status</label>
                                                <p>{{ $laporan->bisyaroh_delapan }}</p>
                                            </div>
                                            <div class="col-md-12">
                                                <label class="form-label fw-bold">Jumlah</label>
                                                <p>{{ $laporan->bisyaroh_delapan === 'Ya' ? ', Rp' . $laporan->bisyaroh_delapan_sebanyak : '' }}</p>
                                            </div>
                                        </div>
                                        <h6 class="mb-3">Bisyaroh 9</h6>
                                        <div class="row mb-3">
                                            <div class="col-md-12">
                                                <label class="form-label fw-bold">Status</label>
                                                <p>{{ $laporan->bisyaroh_sembilan }}</p>
                                            </div>
                                            <div class="col-md-12">
                                                <label class="form-label fw-bold">Jumlah</label>
                                                <p>{{ $laporan->bisyaroh_sembilan === 'Ya' ? ', Rp' . $laporan->bisyaroh_sembilan_sebanyak : '' }}</p>
                                            </div>
                                        </div>
                                        <h6 class="mb-3">Bisyaroh 10</h6>
                                        <div class="row mb-3">
                                            <div class="col-md-12">
                                                <label class="form-label fw-bold">Status</label>
                                                <p>{{ $laporan->bisyaroh_sepuluh }}</p>
                                            </div>
                                            <div class="col-md-12">
                                                <label class="form-label fw-bold">Jumlah</label>
                                                <p>{{ $laporan->bisyaroh_sepuluh === 'Ya' ? ', Rp' . $laporan->bisyaroh_sepuluh_sebanyak : '' }}</p>
                                            </div>
                                        </div>

                                        <h6 class="mb-3">Informasi Lain</h6>
                                        <div class="row mb-3">
                                            <div class="col-md-12">
                                                <label class="form-label fw-bold">Usulan dan Lain-lain</label>
                                                <p>{{ $laporan->usulan }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Detail Offcanvas -->

@endsection
