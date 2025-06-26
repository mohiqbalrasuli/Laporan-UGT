@extends('pengurus.layout.template_pengurus')
@section('title','Data PJGT')
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
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
