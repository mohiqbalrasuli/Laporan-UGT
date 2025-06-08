@extends('admin.layout.template_admin')
@section('title','Dashboard Laporan PJGT dan GT')
@section('content')
<!-- Spinner Start -->
        <div id="spinner"
            class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-success" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->
     <!-- Sale & Revenue Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-school fa-3x text-success"></i>
                            <div class="ms-3">
                                <p class="mb-2">Madrasah</p>
                                <h6 class="mb-0">10</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-user-tie fa-3x text-success"></i>
                            <div class="ms-3">
                                <p class="mb-2">Total PJGT</p>
                                <h6 class="mb-0">10</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-user fa-3x text-success"></i>
                            <div class="ms-3">
                                <p class="mb-2">Today GT</p>
                                <h6 class="mb-0">10</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-file-alt fa-3x text-success"></i>
                            <div class="ms-3">
                                <p class="mb-2">Laporan PJGT/GT</p>
                                <h6 class="mb-0">3/10</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Sale & Revenue End -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-12">
                        <div class="bg-light rounded h-100 p-4">
                            <h6 class="mb-4">Laporan Guru Tugas Terbaru</h6>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Nama GT</th>
                                        <th scope="col">Nama Madrasah</th>
                                        <th scope="col">Nama PJGT</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>Muhammad</td>
                                        <td>MDT Al-Barokah</td>
                                        <td>Lora Hamzah</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">2</th>
                                        <td>Iqbal</td>
                                        <td>MDT Al-Muttaqin</td>
                                        <td>Ust Aldi</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">3</th>
                                        <td>Rasuli</td>
                                        <td>MDT Ainul Yaqin</td>
                                        <td>Ust. Aziz</td>
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
                            <h6 class="mb-4">Laporan Penanggung Jawab Guru Tugas Terbaru</h6>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Nama PJGT</th>
                                        <th scope="col">Nama Madrasah</th>
                                        <th scope="col">Nama GT</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>Muhammad</td>
                                        <td>MDT Al-Barokah</td>
                                        <td>Lora Hamzah</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">2</th>
                                        <td>Iqbal</td>
                                        <td>MDT Al-Muttaqin</td>
                                        <td>Ust Aldi</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">3</th>
                                        <td>Rasuli</td>
                                        <td>MDT Ainul Yaqin</td>
                                        <td>Ust. Aziz</td>
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
