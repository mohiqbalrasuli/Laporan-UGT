@extends('admin.layout.template_admin')
@section('title','validasi Guru Tugas')
@section('content')
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-12">
            <div class="bg-light rounded h-100 p-4">
                <div class="d-flex justify-content-between align-items-center">
                    <h6 class="mb-4">Data Guru Tugas</h6>
                    <a href="" class="btn btn-success mb-3"><i
                            class="fas fa-plus"></i></a>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama GT</th>
                            <th scope="col">Nama Madrasah </th>
                            <th scope="col">Alamat Madrasah</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Moh. Wildan</td>
                            <td>MDT Al - Barokah</td>
                            <td>Batuputih Laok Batuputih Sumenep</td>
                            <td>
                                <button class="btn btn-success">Validasi</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection