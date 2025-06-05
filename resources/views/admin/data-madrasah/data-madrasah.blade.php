@extends('admin.layout.template_admin')
@section('title','Data Madrasah')
@section('content')
    <div class="container-fluid pt-4 px-4">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a class="text-success" href="{{ url('/admin/dashboard') }}">Beranda</a></li>
                <li class="breadcrumb-item active" aria-current="page">Data Madrasah</li>
            </ol>
        </nav>
        <div class="row g-4">
            <div class="col-12">
                <div class="bg-light rounded h-100 p-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <h6 class="mb-4">Data Madrasah</h6>
                        <button type="button" type="button" data-bs-toggle="offcanvas"
                            data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling"
                            class="btn btn-success mb-3"><i class="fas fa-plus"></i></button>
                    </div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama Madrasah</th>
                                <th scope="col">Nama Kepala </th>
                                <th scope="col">Alamat</th>
                                <th scope="col">Nama PJGT</th>
                                <th scope="col">Nama GT</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>MDT Al - Barokah</td>
                                <td>Akh. Ainur Rasyidi</td>
                                <td>Batuputih Laok Batuputih Sumenep</td>
                                <td>Ach. Hamzah Ilahi Maulana Muhammadi</td>
                                <td>Moh. Wildan</td>
                                <td>
                                    <div class="dropdown d-flex justify-content-center mt-3">
                                        <button class="btn btn-link p-0 border-0 text-dark" type="button"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="fas fa-ellipsis-h"></i>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><button type="button" data-bs-toggle="offcanvas"
                                                    data-bs-target="#offcanvasScrolling1" aria-controls="offcanvasScrolling"
                                                    class="dropdown-item">Edit</button></li>
                                            <li><button class="dropdown-item" type="button" data-bs-toggle="modal"
                                                    data-bs-target="#exampleModal">Hapus</button></li>
                                        </ul>
                                    </div>
                                </td>
                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <img src="{{ asset('assets/img/logo.png') }}" width="30px"
                                                    style="margin-right: 20px" alt="">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Madrasah</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Yakin Menghapus <span class="fw-bold">MDT Al-Barokah</span> ?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Tutup</button>
                                                <a href="" type="button" class="btn btn-success">Hapus</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- canvas Edit Madrasah --}}
                                <div class="offcanvas offcanvas-end" data-bs-scroll="true" data-bs-backdrop="false"
                                    tabindex="-1" id="offcanvasScrolling1" aria-labelledby="offcanvasScrollingLabel">
                                    <div class="offcanvas-header">
                                        <h5 class="offcanvas-title" id="offcanvasScrollingLabel">Update Data Madrasah</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="offcanvas-body">
                                        <div class="bg-light rounded h-100 p-4">
                                            <h6 class="mb-4">Form Update Data Madrasah</h6>
                                            <form>
                                                <div class="mb-3">
                                                    <label for="exampleInputMadrasah" class="form-label">Nama
                                                        Madrasah</label>
                                                    <input type="text" value="MDT Al-Barokah" class="form-control"
                                                        id="exampleInputMadrasah">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="exampleInputKepMad" class="form-label">Nama Kepala
                                                        Madrasah</label>
                                                    <input type="text" value="Akh. Ainur Rasyidi" class="form-control "
                                                        id="exampleInputKepMad">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="exampleInputAlamat" class="form-label">Alamat
                                                        Madrasah</label>
                                                    <input type="text" value="Batuputih Laok Batuputih Sumenep"
                                                        class="form-control " id="exampleInputAlamat">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="exampleInputEmail" class="form-label">Email
                                                        Madrasah</label>
                                                    <input type="email" value="mdtalbarokah@gmail.com"
                                                        class="form-control " id="exampleInputEmail"
                                                        aria-describedby="emailHelp">
                                                </div>
                                                <div class="mb-3 form-check">
                                                    <input type="checkbox" class="form-check-input" id="exampleCheck2">
                                                    <label class="form-check-label" for="exampleCheck2">Yakin ??</label>
                                                </div>
                                                <button type="submit" class="btn btn-success" id="submitBtn1"
                                                    disabled>Simpan</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
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

{{-- canvas tambah madrasah --}}
<div class="offcanvas offcanvas-end" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1"
    id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasScrollingLabel">Tambah Madrasah</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <div class="bg-light rounded h-100 p-4">
            <h6 class="mb-4">Form Tambah Data Madrasah</h6>
            <form>
                <div class="mb-3">
                    <label for="exampleInputMadrasah" class="form-label">Nama Madrasah</label>
                    <input type="text" class="form-control" id="exampleInputMadrasah">
                </div>
                <div class="mb-3">
                    <label for="exampleInputKepMad" class="form-label">Nama Kepala Madrasah</label>
                    <input type="text" class="form-control " id="exampleInputKepMad">
                </div>
                <div class="mb-3">
                    <label for="exampleInputAlamat" class="form-label">Alamat Madrasah</label>
                    <input type="text" class="form-control " id="exampleInputAlamat">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail" class="form-label">Email Madrasah</label>
                    <input type="email" class="form-control " id="exampleInputEmail" aria-describedby="emailHelp">
                    {{-- <div id="emailHelp" class="form-text">Kami tidak akan pernah membagikan email Anda kepada orang lain.
                            </div> --}}
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Yakin ??</label>
                </div>
                <button type="submit" class="btn btn-success" id="submitBtn" disabled>Simpan</button>
            </form>
        </div>
    </div>
</div>
{{-- script button submit --}}
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const checkbox = document.getElementById('exampleCheck1');
        const button = document.getElementById('submitBtn');

        checkbox.addEventListener('change', function() {
            button.disabled = !this.checked;
        });
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const checkbox = document.getElementById('exampleCheck2');
        const button = document.getElementById('submitBtn1');

        checkbox.addEventListener('change', function() {
            button.disabled = !this.checked;
        });
    });
</script>
