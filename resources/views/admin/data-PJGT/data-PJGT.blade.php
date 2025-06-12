@extends('admin.layout.template_admin')
@section('title', 'Data PJGT')
@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            @if (session('success'))
                <div class="alert alert-success mt-2">{{ session('success') }}</div>
            @endif
            <div class="col-12">
                <div class="bg-light rounded h-100 p-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <h6 class="mb-4">Data Penanggung Jawab Guru Tugas</h6>
                        <button type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling"
                            aria-controls="offcanvasScrolling" class="btn btn-success mb-3"><i
                                class="fas fa-plus"></i></button>
                    </div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">No.Induk</th>
                                <th scope="col">Nama PJGT</th>
                                <th scope="col">Nama Madrasah </th>
                                <th scope="col">Alamat PJGT</th>
                                <th scope="col">Nama GT</th>
                                <th scope="col">Status</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pjgt as $key => $value)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $value->pjgt->no_induk ?? '-' }}</td>
                                    <td>{{ $value->name }}</td>
                                    <td>{{ $value->pjgt->madrasah->nama_madrasah ?? '-' }}</td>
                                    <td>{{ $value->pjgt->alamat ??'-' }}</td>
                                    <td>{{ $value->pjgt->gt->user->name ?? '-' }}</td>
                                    <td><span class="btn btn-success">{{ $value->status }}</span></td>
                                    <td>
                                        <div class="dropdown d-flex justify-content-center mt-3">
                                            <button class="btn btn-link p-0 border-0 text-dark" type="button"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="fas fa-ellipsis-h"></i> <!-- untuk vertikal -->
                                                <!-- Atau ganti dengan fa-ellipsis-h jika mau horizontal -->
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><button type="button" data-bs-toggle="offcanvas"
                                                        data-bs-target="#offcanvasScrolling{{ $value->id }}"
                                                        aria-controls="offcanvasScrolling"
                                                        class="dropdown-item">Edit</button></li>
                                                <li><button class="dropdown-item" type="button" data-bs-toggle="modal"
                                                        data-bs-target="#nonaktifModal{{ $value->id }}">Nonaktifkan</button></li>
                                                <li><button class="dropdown-item" type="button" data-bs-toggle="modal"
                                                        data-bs-target="#exampleModalhapus{{ $value->id }}">Hapus</button></li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                                <!-- Modal -->
                                <div class="modal fade" id="nonaktifModal{{ $value->id }}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <img src="{{ asset('assets/img/logo.png') }}" width="30px"
                                                    style="margin-right: 20px" alt="">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Nonaktifkan PJGT
                                                </h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Yakin Menonaktifkan PJGT <span class="fw-bold">{{ $value->name }}</span> ?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Tutup</button>
                                                <form action="{{ url('admin/data-PJGT/nonaktif/'.$value->id) }}" method="POST">
                                                    @csrf
                                                    <button type="submit" class="btn btn-success">Nonaktifkan</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal fade" id="exampleModalhapus{{ $value->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <img src="{{ asset('assets/img/logo.png') }}" width="30px"
                                                    style="margin-right: 20px" alt="">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus PJGT</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Yakin Menghapus PJGT <span class="fw-bold">{{ $value->name }}</span> ?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Tutup</button>
                                                <a href="{{ url('admin/data-PJGT/delete/' . $value->id) }}" type="button"
                                                    class="btn btn-success">Hapus</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="offcanvas offcanvas-end" data-bs-scroll="true" data-bs-backdrop="false"
                                    tabindex="-1" id="offcanvasScrolling{{ $value->id }}"
                                    aria-labelledby="offcanvasScrollingLabel">
                                    <div class="offcanvas-header">
                                        <h5 class="offcanvas-title" id="offcanvasScrollingLabel">Edit PJGT</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="offcanvas-body">
                                        <div class="bg-light rounded h-100 p-4">
                                            <h6 class="mb-4">Form Edit PJGT</h6>
                                            <form action="{{ url('admin/data-PJGT/update/' . $value->id) }}"
                                                method="POST">
                                                @csrf
                                                <div class="mb-3">
                                                    <abel for="exampleInput{{ $value->pjgt->no_induk }}" class="form-label">No. Induk</abel>
                                                    <input type="number" class="form-control"
                                                        value="{{ $value->pjgt->no_induk }}" name="no_induk"
                                                        id="exampleInput{{ $value->pjgt->no_induk }}">
                                                </div>
                                                <div class="mb-3">
                                                    <abel for="exampleInput{{ $value->name }}" class="form-label">Nama PJGT</abel>
                                                    <input type="text" class="form-control"
                                                        value="{{ $value->name }}" name="name"
                                                        id="exampleInput{{ $value->name }}">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="exampleInput{{ $value->pjgt->alamat }}" class="form-label">Alamat</label>
                                                    <input type="text" class="form-control "
                                                        value="{{ $value->pjgt->alamat }}" name="alamat"
                                                        id="exampleInput{{ $value->pjgt->alamat }}">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="exampleInput{{ $value->pjgt->gt_id }}" class="form-label">Guru Tugas</label>
                                                    <select class="form-select" name="gt_id" id="exampleInput{{ $value->pjgt->gt_id }}">
                                                        <option disabled selected>Pilih Guru Tugas</option>
                                                        @foreach ($gt as $item)
                                                            <option value="{{ $item->gt->id }}"
                                                                {{ $item->gt->id == $value->pjgt->gt_id ? 'selected' : '' }}>
                                                                {{ $item->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="exampleInput{{ $value->pjgt->madrasah_id }}" class="form-label">Madrasah</label>
                                                    <select class="form-select" name="madrasah_id"
                                                        id="exampleInput{{ $value->pjgt->madrasah_id }}">
                                                        <option disabled selected>Pilih Madrasah</option>
                                                        @foreach ($madrasah as $item)
                                                            <option value="{{ $item->id }}"
                                                                {{ $item->id == $value->pjgt->madrasah_id ? 'selected' : '' }}>
                                                                {{ $item->nama_madrasah }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="mb-3 form-check">
                                                    <input type="checkbox" class="form-check-input" id="exampleCheck{{ $value->id }}">
                                                    <label class="form-check-label" for="exampleCheck{{ $value->id }}">Yakin ??</label>
                                                </div>
                                                <button type="submit" class="btn btn-success mb-4" id="submitBtn{{ $value->id }}"
                                                    disabled>Simpan</button>
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
<!-- Back to Top -->
<a href="#" class="btn btn-lg btn-success btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
<div class="offcanvas offcanvas-end" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1"
    id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasScrollingLabel">Tambah PJGT</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <div class="bg-light rounded h-100 p-4">
            <h6 class="mb-4">Form Tambah PJGT</h6>
            <form action="{{ url('admin/data-PJGT/store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <abel for="exampleInputInduk" class="form-label">No. Induk</abel>
                    <input type="number" class="form-control" name="no_induk" id="exampleInputInduk">
                </div>
                <div class="mb-3">
                    <abel for="exampleInputPJGT" class="form-label">Nama PJGT</abel>
                    <input type="text" class="form-control" name="name" id="exampleInputPJGT">
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
                <div class="mb-3">
                    <label for="exampleInputGT" class="form-label">Guru Tugas</label>
                    <select class="form-select" name="gt_id" id="exampleInputGT">
                        <option selected disabled>Pilih Guru Tugas</option>
                        @foreach ($gt as $item)
                            <option value="{{ $item->gt->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="exampleInputMadrasah" class="form-label">Madrasah</label>
                    <select class="form-select" name="madrasah_id" id="exampleInputMadrasah">
                        <option selected disabled>Pilih Madrasah</option>
                        @foreach ($madrasah as $item)
                            <option value="{{ $item->id }}">{{ $item->nama_madrasah }}</option>
                        @endforeach
                    </select>
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
