@extends($layout)
@section('title','Pengajuan Guru Tugas')
@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-12">
                @if (session('success'))
                    <div class="alert alert-success mt-2">{{ session('success') }}</div>
                @elseif (session('error'))
                    <div class="alert alert-success mt-2">{{ session('error') }}</div>
                @endif
                <div class="bg-light rounded h-100 p-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <h6 class="mb-4">Data Pengajuan Guru Tugas</h6>
                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama Madrasah</th>
                                    <th scope="col">Alamat Madrasah</th>
                                    <th scope="col">Nama Penanggung Jawab</th>
                                    <th scope="col">Kepala Madrasah</th>
                                    <th scope="col">Guru Tugas yang Diajukan</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($hasilpengajuan as $key => $pengajuan)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $pengajuan->nama_madrasah }}</td>
                                    <td>{{ $pengajuan->alamat_madrasah }}</td>
                                    <td>{{ $pengajuan->nama_pjgt }}</td>
                                    <td>{{ $pengajuan->kepala_madrasah }}</td>
                                    <td>{{ $pengajuan->gt_yang_diajukan }} orang</td>
                                    <td class="d-flex gap-2">
                                        <a href="#" class="btn btn-primary btn-sm" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDetail{{ $pengajuan->id }}" aria-controls="offcanvasDetail">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        @if ( Auth::user()->role == 'admin' )
                                            <a href="{{ url('admin/pengajuan-gt/delete/' . $pengajuan->id ) }}" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus pengajuan ini?')">
                                                <i class="fas fa-trash-alt"></i>
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                                <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasDetail{{ $pengajuan->id }}" aria-labelledby="offcanvasDetailLabel">
                                    <div class="offcanvas-header">
                                        <h5 class="offcanvas-title" id="offcanvasDetailLabel">Detail Pengajuan Guru Tugas</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                                    </div>
                                    <div class="offcanvas-body">
                                        <div class="row mb-3">
                                            <div class="col-md-12">
                                                <label class="form-label fw-bold">Tanggal Pengajuan</label>
                                                <p>{{ \Carbon\Carbon::parse($pengajuan->created_at)->translatedFormat('l, d F Y - H:i') }} WIB</p>
                                            </div>
                                        </div>

                                        <h6 class="mb-3">Informasi Madrasah</h6>
                                        <div class="row mb-3">
                                            <div class="col-md-12">
                                                <label class="form-label fw-bold">Nama Madrasah</label>
                                                <p>{{ $pengajuan->nama_madrasah }}</p>
                                            </div>
                                            <div class="col-md-12">
                                                <label class="form-label fw-bold">No. Telepon</label>
                                                <p>{{ $pengajuan->no_telp }}</p>
                                            </div>
                                            <div class="col-md-12">
                                                <label class="form-label fw-bold">Alamat Madrasah</label>
                                                <p>{{ $pengajuan->alamat_madrasah }}</p>
                                            </div>
                                        </div>

                                        <h6 class="mb-3">Pengurus dan Pimpinan</h6>
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <label class="form-label fw-bold">Nama Penanggung Jawab</label>
                                                <p>{{ $pengajuan->nama_pjgt }}</p>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label fw-bold">Umur Penanggung Jawab</label>
                                                <p>{{ $pengajuan->umur_pjgt }} Tahun</p>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label fw-bold">Kepala Madrasah</label>
                                                <p>{{ $pengajuan->kepala_madrasah }}</p>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label fw-bold">Umur Kepala Madrasah</label>
                                                <p>{{ $pengajuan->umur_kepala_madrasah }} Tahun</p>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label fw-bold">Ketua</label>
                                                <p>{{ $pengajuan->ketua }}</p>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label fw-bold">Wakil Ketua</label>
                                                <p>{{ $pengajuan->wakil_ketua }}</p>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label fw-bold">Sekretaris</label>
                                                <p>{{ $pengajuan->sekretaris }}</p>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label fw-bold">Bendahara</label>
                                                <p>{{ $pengajuan->bendahara }}</p>
                                            </div>
                                        </div>

                                        <h6 class="mb-3">Kurikulum dan Pembelajaran</h6>
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <label class="form-label fw-bold">Kitab yang Dibaca</label>
                                                <p>{{ $pengajuan->kitab_yang_dibaca }}</p>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label fw-bold">Bahasa Makna Kitab</label>
                                                <p>{{ $pengajuan->bahasa_makna_kitab }}</p>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label fw-bold">Bahasa Pengantar Pelajaran</label>
                                                <p>{{ $pengajuan->bahasa_pengantar_Pelajaran }}</p>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label fw-bold">Madrasah Berada Di</label>
                                                <p>{{ $pengajuan->madrasah_berada_di }}</p>
                                            </div>
                                        </div>

                                        <h6 class="mb-3">Data Guru</h6>
                                        <div class="row mb-3">
                                            <div class="col-md-4">
                                                <label class="form-label fw-bold">Jumlah Guru Laki-laki</label>
                                                <p>{{ $pengajuan->jumlah_guru_lk }}</p>
                                            </div>
                                            <div class="col-md-4">
                                                <label class="form-label fw-bold">Jumlah Guru Perempuan</label>
                                                <p>{{ $pengajuan->jumlah_guru_pr }}</p>
                                            </div>
                                            <div class="col-md-4">
                                                <label class="form-label fw-bold">Jumlah Guru (Total)</label>
                                                <p>{{ $pengajuan->jumlah_guru }}</p>
                                            </div>
                                        </div>

                                        <h6 class="mb-3">Data Murid - Ibtida'iyah dan Awaliyah/Ula</h6>
                                        <div class="row mb-3">
                                            <div class="col-md-4">
                                                <label class="form-label fw-bold">Jumlah Murid Laki-laki Kelas 1</label>
                                                <p>{{ $pengajuan->jumlah_kelas_1_lk }}</p>
                                            </div>
                                            <div class="col-md-4">
                                                <label class="form-label fw-bold">Jumlah Murid Perempuan Kelas 1</label>
                                                <p>{{ $pengajuan->jumlah_kelas_1_pr }}</p>
                                            </div>
                                            <div class="col-md-4">
                                                <label class="form-label fw-bold">Jumlah Murid Kelas 1 (Total)</label>
                                                <p>{{ $pengajuan->jumlah_kelas_1 }}</p>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-4">
                                                <label class="form-label fw-bold">Jumlah Murid Laki-laki Kelas 2</label>
                                                <p>{{ $pengajuan->jumlah_kelas_2_lk }}</p>
                                            </div>
                                            <div class="col-md-4">
                                                <label class="form-label fw-bold">Jumlah Murid Perempuan Kelas 2</label>
                                                <p>{{ $pengajuan->jumlah_kelas_2_pr }}</p>
                                            </div>
                                            <div class="col-md-4">
                                                <label class="form-label fw-bold">Jumlah Murid Kelas 2 (Total)</label>
                                                <p>{{ $pengajuan->jumlah_kelas_2 }}</p>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-4">
                                                <label class="form-label fw-bold">Jumlah Murid Laki-laki Kelas 3</label>
                                                <p>{{ $pengajuan->jumlah_kelas_3_lk }}</p>
                                            </div>
                                            <div class="col-md-4">
                                                <label class="form-label fw-bold">Jumlah Murid Perempuan Kelas 3</label>
                                                <p>{{ $pengajuan->jumlah_kelas_3_pr }}</p>
                                            </div>
                                            <div class="col-md-4">
                                                <label class="form-label fw-bold">Jumlah Murid Kelas 3 (Total)</label>
                                                <p>{{ $pengajuan->jumlah_kelas_3 }}</p>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-4">
                                                <label class="form-label fw-bold">Jumlah Murid Laki-laki Kelas 4</label>
                                                <p>{{ $pengajuan->jumlah_kelas_4_lk }}</p>
                                            </div>
                                            <div class="col-md-4">
                                                <label class="form-label fw-bold">Jumlah Murid Perempuan Kelas 4</label>
                                                <p>{{ $pengajuan->jumlah_kelas_4_pr }}</p>
                                            </div>
                                            <div class="col-md-4">
                                                <label class="form-label fw-bold">Jumlah Murid Kelas 4 (Total)</label>
                                                <p>{{ $pengajuan->jumlah_kelas_4 }}</p>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-4">
                                                <label class="form-label fw-bold">Jumlah Murid Laki-laki Kelas 5</label>
                                                <p>{{ $pengajuan->jumlah_kelas_5_lk }}</p>
                                            </div>
                                            <div class="col-md-4">
                                                <label class="form-label fw-bold">Jumlah Murid Perempuan Kelas 5</label>
                                                <p>{{ $pengajuan->jumlah_kelas_5_pr }}</p>
                                            </div>
                                            <div class="col-md-4">
                                                <label class="form-label fw-bold">Jumlah Murid Kelas 5 (Total)</label>
                                                <p>{{ $pengajuan->jumlah_kelas_5 }}</p>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-4">
                                                <label class="form-label fw-bold">Jumlah Murid Laki-laki Kelas 6</label>
                                                <p>{{ $pengajuan->jumlah_kelas_6_lk }}</p>
                                            </div>
                                            <div class="col-md-4">
                                                <label class="form-label fw-bold">Jumlah Murid Perempuan Kelas 6</label>
                                                <p>{{ $pengajuan->jumlah_kelas_6_pr }}</p>
                                            </div>
                                            <div class="col-md-4">
                                                <label class="form-label fw-bold">Jumlah Murid Kelas 6 (Total)</label>
                                                <p>{{ $pengajuan->jumlah_kelas_6 }}</p>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-4">
                                                <label class="form-label fw-bold">Jumlah Murid Laki-laki</label>
                                                <p>{{ $pengajuan->jumlah_murid_lk }}</p>
                                            </div>
                                            <div class="col-md-4">
                                                <label class="form-label fw-bold">Jumlah Murid Perempuan</label>
                                                <p>{{ $pengajuan->jumlah_murid_pr }}</p>
                                            </div>
                                            <div class="col-md-4">
                                                <label class="form-label fw-bold">Jumlah Murid (Total)</label>
                                                <p>{{ $pengajuan->jumlah_murid }}</p>
                                            </div>
                                        </div>

                                        <h6 class="mb-3">Informasi Tambahan</h6>
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <label class="form-label fw-bold">Guru Tugas yang Diajukan</label>
                                                <p>{{ $pengajuan->gt_yang_diajukan }} orang</p>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label fw-bold">Rencana Mengajar Kelas</label>
                                                <p>{{ $pengajuan->rencana_mengajar_kelas }}</p>
                                            </div>
                                            <div class="col-md-12">
                                                <label class="form-label fw-bold">Lain-lain</label>
                                                <p>{{ $pengajuan->lain_lain ?? '-' }}</p>
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
@endsection
