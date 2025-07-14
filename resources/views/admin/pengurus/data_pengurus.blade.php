@extends('admin.layout.template_admin')
@section('title', 'Data Pengurus UGT')
@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-12">
                @if (session('success'))
                    <div class="alert alert-success mt-2">{{ session('success') }}</div>
                @endif
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="bg-light rounded h-100 p-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <h6 class="mb-4">Data Pengurus UGT</h6>
                        <button type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling"
                            aria-controls="offcanvasScrolling" class="btn btn-success mb-3"><i
                                class="fas fa-plus"></i></button>
                    </div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Alamat</th>
                                <th scope="col">Email</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pengurus as $key => $value)
                                <tr>
                                    <th scope="row">{{ $key + 1 }}</th>
                                    <td>{{ $value->name }}</td>
                                    <td>{{ $value->pengurus->alamat ?? '-' }}</td>
                                    <td>{{ $value->email }}</td>
                                    <td>
                                        <div class="dropdown d-flex justify-content-center mt-3">
                                            <button class="btn btn-link p-0 border-0 text-dark" type="button"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="fas fa-ellipsis-h"></i>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><button type="button" data-bs-toggle="offcanvas"
                                                        data-bs-target="#offcanvasScrolling{{ $value->id }}"
                                                        aria-controls="offcanvasScrolling"
                                                        class="dropdown-item">Edit</button></li>
                                                <li><button class="dropdown-item" type="button" data-bs-toggle="modal"
                                                        data-bs-target="#modalhapus{{ $value->id }}">Hapus</button>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                                <!-- Modal hapus-->
                                <div class="modal fade" id="modalhapus{{ $value->id }}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <img src="{{ asset('assets/img/logo.png') }}" width="30px"
                                                    style="margin-right: 20px" alt="">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Pengurus UGT
                                                </h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Yakin Menghapus Pengurus UGT <span
                                                    class="fw-bold">{{ $value->name }}</span>
                                                ?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Tutup</button>
                                                <a href="{{ url('admin/data-pengurus/delete/' . $value->id) }}"
                                                    type="button" class="btn btn-success">Hapus</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="offcanvas offcanvas-end" data-bs-scroll="true" data-bs-backdrop="false"
                                    tabindex="-1" id="offcanvasScrolling{{ $value->id }}"
                                    aria-labelledby="offcanvasScrollingLabel">
                                    <div class="offcanvas-header">
                                        <h5 class="offcanvas-title" id="offcanvasScrollingLabel">Edit Pengurus</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="offcanvas-body">
                                        <div class="bg-light rounded h-100 p-4">
                                            <h6 class="mb-4">Form Edit Pengurus</h6>
                                            <form action="{{ url('admin/data-pengurus/update/' . $value->id) }}"
                                                method="POST">
                                                @csrf
                                                <div class="mb-3">
                                                    <abel for="exampleInput{{ $value->name }}" class="form-label">Nama
                                                        GT</abel>
                                                    <input type="text" class="form-control" value="{{ $value->name }}"
                                                        name="name" id="exampleInput{{ $value->name }}">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="exampleInput{{ $value->pengurus->alamat ?? '' }}"
                                                        class="form-label">Alamat</label>
                                                    <input type="text" class="form-control "
                                                        value="{{ $value->pengurus->alamat ?? '' }}" name="alamat"
                                                        id="exampleInput{{ $value->pengurus->alamat ?? '' }}">
                                                </div>
                                                <div class="mb-3 form-check">
                                                    <input type="checkbox" class="form-check-input"
                                                        id="exampleCheck{{ $value->id }}">
                                                    <label class="form-check-label"
                                                        for="exampleCheck{{ $value->id }}">Yakin ??</label>
                                                </div>
                                                <button type="submit" class="btn btn-success mb-4"
                                                    id="submitBtn{{ $value->id }}" disabled>Simpan</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <script>
                                    document.addEventListener('DOMContentLoaded', function() {
                                        const checkbox = document.getElementById('exampleCheck{{ $value->id }}');
                                        const button = document.getElementById('submitBtn{{ $value->id }}');

                                        checkbox.addEventListener('change', function() {
                                            button.disabled = !this.checked;
                                        });
                                    });
                                </script>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
<a href="#" class="btn btn-lg btn-success btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
<div class="offcanvas offcanvas-end" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1"
    id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasScrollingLabel">Tambah Pengurus</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <div class="bg-light rounded h-100 p-4">
            <h6 class="mb-4">Form Tambah Pengurus</h6>
            <form action="{{ url('admin/data-pengurus/store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <abel for="exampleInputGT" class="form-label">Nama Pengurus</abel>
                    <input type="text" class="form-control" name="name" id="exampleInputGT">
                </div>
                <div class="mb-3">
                    <abel for="exampleInputemail" class="form-label">Email</abel>
                    <input type="email" class="form-control" name="email" id="exampleInputemail">
                </div>
                <div class="mb-3">
                    <label for="exampleInputpassword" class="form-label">Password</label>
                    <input type="password" class="form-control " name="password" id="exampleInputpassword">
                </div>
                <div class="mb-3">
                    <label for="exampleInputAlamat" class="form-label">Alamat</label>
                    <input type="text" class="form-control " name="alamat" id="exampleInputAlamat">
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck">
                    <label class="form-check-label" for="exampleCheck">Yakin ??</label>
                </div>
                <button type="submit" class="btn btn-success mb-4" id="submitBtn" disabled>Simpan</button>
            </form>
        </div>
    </div>
</div>
{{-- script button submit --}}
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const checkbox = document.getElementById('exampleCheck');
        const button = document.getElementById('submitBtn');

        checkbox.addEventListener('change', function() {
            button.disabled = !this.checked;
        });
    });
</script>
