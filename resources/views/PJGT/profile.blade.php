@extends('PJGT.layout.template_PJGT')

@section('title','Profile Penanggung Jawab Guru Tugas')

@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-12">
                <div class="bg-light rounded h-100 p-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <h6 class="mb-4">Data PJGT</h6>
                        <div class="dropdown d-flex justify-content-center mb-4">
                            <button class="btn btn-link p-0 border-0 text-dark" type="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <i class="fas fa-ellipsis-h"></i> <!-- untuk vertikal -->
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
                                <th>Nama PJGT</th>
                                <th> : </th>
                                <td>Ach. Hamzah Ilahi Maulana Muhammadi</td>
                            </tr>
                            <tr>
                                <th>Alamat</th>
                                <th> : </th>
                                <td>Batuputih Laok Batuputih sumenep</td>
                            </tr>
                            <tr>
                                <th>Nama Madrasah</th>
                                <th> : </th>
                                <td>MDT Al-Barokah</td>
                            </tr>
                            <tr>
                                <th>Kepala Madrasah</th>
                                <th> : </th>
                                <td>Akh. Ainur Rasyidi</td>
                            </tr>
                            <tr>
                                <th>Alamat Madrasah</th>
                                <th> : </th>
                                <td>Batuputih Laok Batuputih sumenep</td>
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
                                <td>Moh. Wildan</td>
                            </tr>
                            <tr>
                                <th>Alamat Lengkap</th>
                                <th> : </th>
                                <td>Batuputih Laok Batuputih sumenep</td>
                            </tr>
                            <tr>
                                <th>Asal Kelas</th>
                                <th> : </th>
                                <td>6 Ibtidaiyah</td>
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
