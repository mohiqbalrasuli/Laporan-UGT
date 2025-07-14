@extends('admin.layout.template_admin')
@section('title', 'validasi Guru Tugas')
@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-12">
                @if (session('success'))
                    <div class="alert alert-success mt-2">{{ session('success') }}</div>
                @elseif (session('error'))
                    <div class="alert alert-success mt-2">{{ session('error') }}</div>
                @endif
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
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($gt as $key => $value)
                                <tr>
                                    <th scope="row">{{ $key + 1 }}</th>
                                    <td>{{ $value->name }}</td>
                                    <td>
                                        <button class="btn btn-success" type="button" data-bs-toggle="modal"
                                            data-bs-target="#nonaktifModal{{ $value->id }}">Validasi</button>
                                        <button class="btn btn-success" type="button" data-bs-toggle="modal"
                                            data-bs-target="#modalhapus{{ $value->id }}">Hapus</button>
                                    </td>
                                </tr>
                                <div class="modal fade" id="nonaktifModal{{ $value->id }}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <img src="{{ asset('assets/img/logo.png') }}" width="30px"
                                                    style="margin-right: 20px" alt="">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Validasi GT
                                                </h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Yakin Memvalidasi PJGT <span class="fw-bold">{{ $value->name }}</span> ?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Tutup</button>
                                                <form action="{{ url('admin/data-GT/validasi/' . $value->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    <button type="submit" class="btn btn-success">Validasi</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Modal hapus-->
                                <div class="modal fade" id="modalhapus{{ $value->id }}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                Yakin Menghapus Guru Tugas <span class="fw-bold">{{ $value->name }}</span>
                                                ?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Tutup</button>
                                                <a href="{{ url('admin/data-GT/delete/' . $value->id) }}" type="button"
                                                    class="btn btn-success">Hapus</a>
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
