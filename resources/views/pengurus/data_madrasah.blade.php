@extends('pengurus.layout.template_pengurus')
@section('title','Data madrasah')
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
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
