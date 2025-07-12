@extends('pengurus.layout.template_pengurus')
@section('title','Data GT')
@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            @if (session('success'))
                <div class="alert alert-success mt-2">{{ session('success') }}</div>
            @endif
            <div class="col-12">
                <div class="bg-light rounded h-100 p-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <h6 class="mb-4">Data Guru Tugas</h6>
                    </div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama GT</th>
                                <th scope="col">Alamat</th>
                                <th scope="col">Status Tugas</th>
                                <th scope="col">Asal kelas</th>
                                <th scope="col">Nama Madrasah </th>
                                <th scope="col">Nama PJGT</th>
                                <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                           @foreach ($gt as $key => $value)
                                <tr>
                                    <th scope="row">{{ $key + 1 }}</th>
                                    <td>{{ $value->name }}</td>
                                    <td>{{ $value->gt->alamat ?? '-' }}</td>
                                    <td>{{ $value->gt->status_tugas ?? '-' }}</td>
                                    <td>{{ $value->gt->asal_kelas ?? '-' }}</td>
                                    <td>{{ $value->gt->madrasah->nama_madrasah ?? '-' }}</td>
                                    <td>{{ $value->gt->pjgt->user->name ?? '-' }}</td>
                                    <td><span class="btn btn-success">{{ $value->status }}</span></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
