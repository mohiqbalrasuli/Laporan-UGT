@extends('GT.layout.template_GT')

@section('title', 'Profile Guru Tugas')

@section('content')
    <div class="container-fluid pt-4 px-4">
        @if (session('success_login'))
            <div class="alert alert-success mt-2" role="alert">{{ session('success_login') }}</div>
        @endif
        @if (session('success'))
            <div class="alert alert-success mt-2" role="alert">{{ session('success') }}</div>
        @endif
        <div class="row g-4">
            <div class="col-12">
                <div class="bg-light rounded h-100 p-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <h6 class="mb-4">Data Guru Tugas</h6>
                        <button class="btn btn-link p-0 border-0 text-dark" type="button" data-bs-toggle="offcanvas"
                            data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling">
                            <i class="fas fa-edit"></i> <!-- untuk vertikal -->
                            <!-- Atau ganti dengan fa-ellipsis-h jika mau horizontal -->
                        </button>
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
                                <td>{{ $gt->name }}</td>
                            </tr>
                            <tr>
                                <th>Alamat Lengkap</th>
                                <th> : </th>
                                <td>{{ $gt->gt->alamat ?? '-' }}</td>
                            </tr>
                            <tr>
                                <th>Asal Kelas</th>
                                <th> : </th>
                                <td>{{ $gt->gt->asal_kelas ?? '-' }}</td>
                            </tr>
                            <tr>
                                <th>Status Tugas</th>
                                <th> : </th>
                                <td>{{ $gt->gt->status_tugas ?? '-' }}</td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <th> : </th>
                                <td>{{ $gt->email }}</td>
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
                        <h6 class="mb-4">Data PJGT</h6>
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
                                <th>Nama PJGT</th>
                                <th> : </th>
                                <td>{{ $gt->pjgt->pjgt->user->name ?? '-' }}</td>
                            </tr>
                            <tr>
                                <th>Nama Madrasah</th>
                                <th> : </th>
                                <td>{{ $gt->pjgt->madrasah->nama_madrasah ?? '-' }}</td>
                            </tr>
                            <tr>
                                <th>Kepala Madrasah</th>
                                <th> : </th>
                                <td>{{ $gt->pjgt->madrasah->nama_kepala_madrasah ?? '-' }}</td>
                            </tr>
                            <tr>
                                <th>Alamat Madrasah</th>
                                <th> : </th>
                                <td>{{ $gt->pjgt->madrasah->alamat_madrasah ?? '-' }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
<div class="offcanvas offcanvas-end" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1"
    id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasScrollingLabel">Edit Data GT</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <div class="bg-light rounded h-100 p-4">
            <h6 class="mb-4">Form Edit Data GT</h6>
            <form action="{{ url('GT/update/' . $gt->id) }}" method="POST">
                @csrf
                <div class="mb-3">
                    <abel for="exampleInputGT" class="form-label">Nama GT</abel>
                    <input type="text" class="form-control" value="{{ $gt->name }}" name="name"
                        id="exampleInputGT">
                </div>
                <div class="mb-3">
                    <label for="exampleInputAlamat" class="form-label">Alamat</label>
                    <input type="text" class="form-control " name="alamat" value="{{ $gt->gt->alamat }}"
                        id="exampleInputAlamat">
                </div>
                <div class="mb-3">
                    <label for="exampleInputstatustugas" class="form-label">Status Tugas</label>
                    <select class="form-select" name="status_tugas" id="exampleInputstatustugas">
                        <option disabled {{ is_null($gt->gt?->status_tugas) ? 'selected' : '' }}>Pilih Status Tugas
                        </option>
                        <option value="Wajib" {{ $gt->gt?->status_tugas == 'Wajib' ? 'selected' : '' }}>Wajib</option>
                        <option value="Qodla" {{ $gt->gt?->status_tugas == 'Qodla' ? 'selected' : '' }}>Qodla</option>
                        <option value="Tathowwu" {{ $gt->gt?->status_tugas == 'Tathowwu' ? 'selected' : '' }}>Tathowwu
                        </option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="exampleInputasalkelas" class="form-label">Asal
                        Kelas</label>
                    <select class="form-select" name="asal_kelas" id="exampleInputasalkelas">
                        <option disabled {{ is_null($gt->gt?->asal_kelas) ? 'selected' : '' }}>Pilih Asal Kelas
                        </option>
                        <option
                            value="MMU Ibtidaiyah"{{ $gt->gt?->asal_kelas == 'MMU Ibtidaiyah' ? 'selected' : '' }}>
                            MMU Ibtidaiyah</option>
                        <option value="MMU Tsanawiyah"
                            {{ $gt->gt?->asal_kelas == 'MMU Tsanawiyah' ? 'selected' : '' }}>MMU Tsanawiyah</option>
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
