@extends('admin.layout.template_admin')
@section('title', 'Data Madrasah')
@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-12">
                @if (session('success'))
                    <div class="alert alert-success mt-2" role="alert">{{ session('success') }}</div>
                @endif
            </div>
            <div class="col-12">
                <div class="bg-light rounded h-100 p-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <h6 class="mb-4">Data Madrasah</h6>
                        <button type="button" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling"
                            aria-controls="offcanvasScrolling" class="btn btn-success mb-3"><i
                                class="fas fa-plus"></i></button>
                    </div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama Madrasah</th>
                                <th scope="col">Nama Kepala Madrasah</th>
                                <th scope="col">Alamat</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($madrasah as $key => $data)
                                <tr>
                                    <td scope="row">{{ $key + 1 }}</td>
                                    <td>{{ $data->nama_madrasah }}</td>
                                    <td>{{ $data->nama_kepala_madrasah }}</td>
                                    <td>{{ $data->alamat_madrasah }}</td>
                                    <td>
                                        <div class="dropdown d-flex justify-content-center mt-3">
                                            <button class="btn btn-link p-0 border-0 text-dark" type="button"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="fas fa-ellipsis-h"></i>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><button type="button" data-bs-toggle="offcanvas"
                                                        data-bs-target="#offcanvasScrolling{{ $data->id }}"
                                                        aria-controls="offcanvasScrolling"
                                                        class="dropdown-item">Edit</button></li>
                                                <li><button class="dropdown-item" type="button" data-bs-toggle="modal"
                                                        data-bs-target="#exampleModal{{ $data->id }}">Hapus</button>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                                <div class="offcanvas offcanvas-end" data-bs-scroll="true" data-bs-backdrop="false"
                                    tabindex="-1" id="offcanvasScrolling{{ $data->id }}"
                                    aria-labelledby="offcanvasScrollingLabel">
                                    <div class="offcanvas-header">
                                        <h5 class="offcanvas-title" id="offcanvasScrollingLabel">Edit Madrasah</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="offcanvas-body">
                                        <div class="bg-light rounded h-100 p-4">
                                            <h6 class="mb-4">Form Edit Data Madrasah</h6>
                                            <form action="{{ url('admin/data-madrasah/update', $data->id) }}"
                                                method="POST">
                                                @csrf
                                                <div class="mb-3">
                                                    <label for="exampleInputMadrasah" class="form-label">Nama
                                                        Madrasah</label>
                                                    <input type="text" class="form-control"
                                                        value="{{ $data->nama_madrasah }}" name="nama_madrasah"
                                                        id="exampleInputMadrasah">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="exampleInputKepMad" class="form-label">Nama Kepala
                                                        Madrasah</label>
                                                    <input type="text" class="form-control "
                                                        value="{{ $data->nama_kepala_madrasah }}"
                                                        name="nama_kepala_madrasah" id="exampleInputKepMad">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="exampleInputAlamat" class="form-label">Alamat
                                                        Madrasah</label>
                                                    <input type="text" class="form-control "
                                                        value="{{ $data->alamat_madrasah }}" name="alamat_madrasah"
                                                        id="exampleInputAlamat">
                                                </div>
                                                <div class="mb-3 form-check">
                                                    <input type="checkbox" class="form-check-input"
                                                        id="exampleCheck{{ $data->id }}">
                                                    <label class="form-check-label"
                                                        for="exampleCheck{{ $data->id }}">Yakin ??</label>
                                                </div>

                                                <button type="submit" class="btn btn-success"
                                                    id="submitBtn{{ $data->id }}" disabled>Simpan</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <script>
                                    document.addEventListener('DOMContentLoaded', function() {
                                        const checkbox = document.getElementById('exampleCheck{{ $data->id }}');
                                        const button = document.getElementById('submitBtn{{ $data->id }}');

                                        checkbox.addEventListener('change', function() {
                                            button.disabled = !this.checked;
                                        });
                                    });
                                </script>
                                <div class="modal fade" id="exampleModal{{ $data->id }}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <img src="{{ asset('assets/img/logo.png') }}" width="30px"
                                                    style="margin-right: 20px" alt="">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Madrasah</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Yakin Menghapus <span class="fw-bold">{{ $data->nama_madrasah }}</span> ?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Tutup</button>
                                                <a href="{{ url('admin/data-madrasah/delete/' . $data->id) }}"
                                                    type="button" class="btn btn-success">Hapus</a>
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
@endsection
<!-- Back to Top -->
<a href="#" class="btn btn-lg btn-success btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>

{{-- canvas tambah madrasah --}}
<div class="offcanvas offcanvas-end" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1"
    id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasScrollingLabel">Tambah Madrasah</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <div class="bg-light rounded h-100 p-4">
            <h6 class="mb-4">Form Tambah Data Madrasah</h6>
            <form action="{{ url('admin/data-madrasah/store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="exampleInputMadrasah" class="form-label">Nama Madrasah</label>
                    <input type="text" class="form-control" name="nama_madrasah" id="exampleInputMadrasah">
                </div>
                <div class="mb-3">
                    <label for="exampleInputKepMad" class="form-label">Nama Kepala Madrasah</label>
                    <input type="text" class="form-control " name="nama_kepala_madrasah" id="exampleInputKepMad">
                </div>
                <div class="mb-3">
                    <label for="exampleInputAlamat" class="form-label">Alamat Madrasah</label>
                    <input type="text" class="form-control " name="alamat_madrasah" id="exampleInputAlamat">
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck">
                    <label class="form-check-label" for="exampleCheck">Yakin ??</label>
                </div>
                <button type="submit" class="btn btn-success" id="submitBtn" disabled>Simpan</button>
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
