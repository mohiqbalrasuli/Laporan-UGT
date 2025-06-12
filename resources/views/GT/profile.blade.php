@extends('GT.layout.template_GT')

@section('title','Profile Guru Tugas')

@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-12">
                <div class="bg-light rounded h-100 p-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <h6 class="mb-4">Data Guru Tugas</h6>
                        <button class="btn btn-link p-0 border-0 text-dark" type="button" >
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
                                <td>{{ $gt->gt->asal_kelas '-' }}</td>
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
                                <td>{{ $gt->gt->pjgt->name ?? '-' }}</td>
                            </tr>
                            <tr>
                                <th>Nama Madrasah</th>
                                <th> : </th>
                                <td>{{ $gt->gt->madrasah->nama_madrasah ?? '-' }}</td>
                            </tr>
                            <tr>
                                <th>Kepala Madrasah</th>
                                <th> : </th>
                                <td>{{ $gt->gt->madrasah->nama_kepala_madrasah ?? '-' }}</td>
                            </tr>
                            <tr>
                                <th>Alamat Madrasah</th>
                                <th> : </th>
                                <td>{{ $gt->gt->madrasah->alamat_madrasah ?? '-' }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
