@extends('admin.layout.template_admin')
@section('title', 'Validasi PJGT')
@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-12">
                <div class="bg-light rounded h-100 p-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <h6 class="mb-4">Data Penanggung Jawab Guru Tugas Non Aktif</h6>
                        <a href="" class="btn btn-success mb-3"><i class="fas fa-plus"></i></a>
                    </div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama PJGT</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pjgt as $item => $pjgt)
                                <tr>
                                    <th scope="row">{{ $item + 1 }}</th>
                                    <td>{{ $pjgt->name }}</td>
                                    <td>
                                        <button class="btn btn-success" type="button" data-bs-toggle="modal"
                                            data-bs-target="#nonaktifModal{{ $pjgt->id }}">Validasi</button>
                                    </td>
                                </tr>
                                <div class="modal fade" id="nonaktifModal{{ $pjgt->id }}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <img src="{{ asset('assets/img/logo.png') }}" width="30px"
                                                    style="margin-right: 20px" alt="">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">mvalidasi PJGT
                                                </h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Yakin Memvalidasi PJGT <span class="fw-bold">{{ $pjgt->name }}</span> ?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Tutup</button>
                                                <form action="{{ url('admin/data-PJGT/validasi/' . $pjgt->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    <button type="submit" class="btn btn-success">Validasi</button>
                                                </form>
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
