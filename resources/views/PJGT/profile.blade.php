@extends('PJGT.layout.template_PJGT')

@section('title', 'Profile Penanggung Jawab Guru Tugas')

@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-12">
                @if (session('success_login'))
                    <div class="alert alert-success mt-2" role="alert">{{ session('success_login') }}</div>
                @endif
                @if (session('success'))
                    <div class="alert alert-success mt-2" role="alert">{{ session('success') }}</div>
                @if (session('error'))
                    <div class="alert alert-success mt-2" role="alert">{{ session('error') }}</div>
                @endif
                <div class="bg-light rounded h-100 p-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <h6 class="mb-4">Data PJGT</h6>
                        <div class="dropdown d-flex justify-content-center mb-4">
                            <button class="btn btn-link p-0 border-0 text-dark" type="button" data-bs-toggle="offcanvas"
                                data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling">
                                <i class="fas fa-edit"></i> <!-- untuk vertikal -->
                                <!-- Atau ganti dengan fa-ellipsis-h jika mau horizontal -->
                            </button>
                            <ul class="dropdown-menu">
                                <li><a href="/admin/data-madrasah/edit" class="dropdown-item">Edit</a></li>
                                <li><button class="dropdown-item" type="button" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal">Hapus</button></li>
                            </ul>
                        </div>
                    </div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>No Induk PJGT</th>
                                <th> : </th>
                                <td>{{ $pjgt->pjgt->no_induk ?? '-' }}</td>
                            </tr>
                            <tr>
                                <th>Nama PJGT</th>
                                <th> : </th>
                                <td>{{ $pjgt->name }}</td>
                            </tr>
                            <tr>
                                <th>Alamat</th>
                                <th> : </th>
                                <td>{{ $pjgt->pjgt->alamat ?? '-' }}</td>
                            </tr>
                            <tr>
                                <th>Nama Madrasah</th>
                                <th> : </th>
                                <td>{{ $pjgt->pjgt->madrasah->nama_madrasah ?? '-' }}</td>
                            </tr>
                            <tr>
                                <th>Kepala Madrasah</th>
                                <th> : </th>
                                <td>{{ $pjgt->pjgt->madrasah->nama_kepala_madrasah ?? '-' }}</td>
                            </tr>
                            <tr>
                                <th>Alamat Madrasah</th>
                                <th> : </th>
                                <td>{{ $pjgt->pjgt->madrasah->alamat_madrasah ?? '-' }}</td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <th> : </th>
                                <td>{{ $pjgt->email }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-12">
                <div class="bg-light rounded h-100 p-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <h6 class="mb-4">Data Guru Tugas</h6>
                    </div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>Nama GT</th>
                                <th> : </th>
                                <td>{{ $pjgt->pjgt->gt->user->name ?? "-" }}</td>
                            </tr>
                            <tr>
                                <th>Alamat Lengkap</th>
                                <th> : </th>
                                <td>{{ $pjgt->pjgt->gt->alamat ?? "-" }}</td>
                            </tr>
                            <tr>
                                <th>Asal Kelas</th>
                                <th> : </th>
                                <td>{{ $pjgt->pjgt->gt->asal_kelas ?? "-" }}</td>
                            </tr>
                            <tr>
                                <th>Status Tugas</th>
                                <th> : </th>
                                <td>{{ $pjgt->pjgt->gt->status_tugas ?? "-" }}</td>
                            </tr>
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
        <h5 class="offcanvas-title" id="offcanvasScrollingLabel">Edit PJGT</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <div class="bg-light rounded h-100 p-4">
            <h6 class="mb-4">Form Edit PJGT</h6>
            <form action="{{ url('PJGT/update/' . $pjgt->id) }}" method="POST">
                @csrf
                <div class="mb-3">
                    <abel for="exampleInput{{ $pjgt->name }}" class="form-label">Nama PJGT</abel>
                    <input type="text" class="form-control" value="{{ $pjgt->name }}" name="name"
                        id="exampleInput{{ $pjgt->name }}">
                </div>
                <div class="mb-3">
                    <label for="exampleInput{{ $pjgt->pjgt?->alamat ?? '' }}" class="form-label">Alamat</label>
                    <input type="text" class="form-control " value="{{ $pjgt->pjgt?->alamat ?? '' }}"
                        name="alamat" id="exampleInput{{ $pjgt->pjgt?->alamat ?? '' }}">
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck{{ $pjgt->id }}">
                    <label class="form-check-label" for="exampleCheck{{ $pjgt->id }}">Yakin ??</label>
                </div>
                <button type="submit" class="btn btn-success mb-4" id="submitBtn{{ $pjgt->id }}"
                    disabled>Simpan</button>
            </form>
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const checkbox = document.getElementById('exampleCheck{{ $pjgt->id }}');
        const button = document.getElementById('submitBtn{{ $pjgt->id }}');

        checkbox.addEventListener('change', function() {
            button.disabled = !this.checked;
        });
    });
</script>
