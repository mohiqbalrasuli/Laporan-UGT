@extends('admin.layout.template_admin')
@section('title', 'Data Guru Tugas')
@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-12">
                <div class="bg-light rounded h-100 p-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <h6 class="mb-4">Data Guru Tugas</h6>
                        <a href="" class="btn btn-success mb-3"><i class="fas fa-plus"></i></a>
                    </div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama GT</th>
                                <th scope="col">Alamat</th>
                                <th scope="col">Nama Madrasah </th>
                                <th scope="col">Alamat Madrasah</th>
                                <th scope="col">Status</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- <tr>
                                <th scope="row">1</th>
                                <td>{{ $value->name }}</td>
                                <td>{{ $value->gt->alamat ?? '-' }}</td>
                                <td>{{ $value->gt->madrasah->nama_madrasah ?? '-' }}</td>
                                <td>{{ $value->gt->madrasah->alamat ?? '-' }}</td>
                                <td><span class="btn btn-success">{{ $value->status }}</span></td>
                                <td>
                                    <div class="dropdown d-flex justify-content-center mt-3">
                                        <button class="btn btn-link p-0 border-0 text-dark" type="button"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="fas fa-ellipsis-h"></i> <!-- untuk vertikal -->
                                            <!-- Atau ganti dengan fa-ellipsis-h jika mau horizontal -->
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><button class="dropdown-item" type="button" data-bs-toggle="modal"
                                                    data-bs-target="#exampleModal1">Edit</button></li>
                                            <li><button class="dropdown-item" type="button" data-bs-toggle="modal"
                                                    data-bs-target="#exampleModal1">Nonaktifkan</button></li>
                                            <li><button class="dropdown-item" type="button" data-bs-toggle="modal"
                                                    data-bs-target="#exampleModal">Hapus</button></li>
                                        </ul>
                                    </div>
                                </td>
                                <!-- Modal nonaktif-->
                                <div class="modal fade" id="exampleModal1" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <img src="{{ asset('assets/img/logo.png') }}" width="30px"
                                                    style="margin-right: 20px" alt="">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Nonaktifkan Guru
                                                    Tugas</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Yakin Meonaktifkan Guru Tugas <span class="fw-bold">Moh. Wildan</span> ?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Tutup</button>
                                                <a href="" type="button" class="btn btn-success">Nonaktifkan</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Modal hapus-->
                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <img src="{{ asset('assets/img/logo.png') }}" width="30px"
                                                    style="margin-right: 20px" alt="">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Guru Tugas
                                                </h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Yakin Menghapus Guru Tugas <span class="fw-bold">Moh. Wildan</span> ?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Tutup</button>
                                                <a href="" type="button" class="btn btn-success">Hapus</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </tr> --}}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
<!-- Back to Top -->
<a href="#" class="btn btn-lg btn-success btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
