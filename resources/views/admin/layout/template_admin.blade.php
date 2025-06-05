<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Dashboard Laporan PJGT dan GT</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="{{ asset('assets/img/logo.png') }}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('assets/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css') }}" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
</head>

<body>
    <div class="container-xxl position-relative bg-white d-flex p-0">
        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-light navbar-light">
                <div
                    style="display: flex; justify-content: center; align-items: center; margin-bottom: 10px; margin-left:65px">
                    <img src="{{ asset('assets/img/logo.png') }}" alt="logo MMU" id="logo" class="img-fluid mb-3"
                        width="100px">
                </div>
                <div id="navbar-nav" class="navbar-nav w-100" style="gap: 5px">
                    <a href="{{ url('admin/dashboard') }}"
                        class="nav-item nav-link {{ Request::is('admin/dashboard') ? 'active' : '' }}"><i
                            class="fa fa-chart-pie me-2"></i>Dashboard</a>
                    <a href="{{ url('admin/data-madrasah') }}"
                        class="nav-item nav-link {{ Request::is('admin/data-madrasah') ? 'active' : '' }}"><i
                            class="fa fa-school me-2"></i>Data Madrasah</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle {{ Request::is('admin/data-PJGT') || Request::is('admin/data-PJGT') ? 'active' : '' }}"
                            data-bs-toggle="dropdown"><i class="fa fa-users me-2"></i>PJGT</a>
                        <div class="dropdown-menu bg-transparent border-0 rounded-0 rounded-bottom m-0">
                            <a href="{{ url('admin/data-PJGT') }}"
                                class="dropdown-item nav-link {{ Request::is('admin/data-PJGT') ? 'active' : '' }}"><i
                                    class="fa fa-user-tie me-2"></i>Data PJGT</a>
                            <a href="{{ url('admin/data-PJGT') }}"
                                class="dropdown-item nav-link {{ Request::is('admin/data-PJGT') ? 'active' : '' }}"><i
                                    class="fa fa-user me-2"></i>Validasi PJGT</a>
                            <a href="#" class="dropdown-item nav-link "><i class="fa fa-file-alt me-2"></i>Laporan PJGT</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle {{ Request::is('admin/data-GT') || Request::is('admin/data-GT') ? 'active' : '' }}"
                            data-bs-toggle="dropdown"><i class="fa fa-users me-2"></i>GT</a>
                        <div class="dropdown-menu bg-transparent border-0 rounded-0 rounded-bottom m-0">
                            <a href="{{ url('admin/data-GT') }}"
                                class="dropdown-item nav-link {{ Request::is('admin/data-GT') ? 'active' : '' }}"><i
                                    class="fa fa-user-tie me-2"></i>Data GT</a>
                            <a href="{{ url('admin/data-GT') }}"
                                class="dropdown-item nav-link {{ Request::is('admin/data-GT') ? 'active' : '' }}"><i
                                    class="fa fa-user me-2"></i>Validasi GT</a>
                            <a href="#" class="dropdown-item nav-link "><i class="fa fa-clipboard-list me-2"></i>Laporan GT</a>
                        </div>
                    </div>

                    <a href="{{ url('admin/data-GT/data-laporan-GT') }}"
                        class="nav-item nav-link {{ Request::is('admin/data-GT/data-laporan-GT') ? 'active' : '' }}"><i
                            class="fa fa-clipboard-list me-2"></i>Laporan GT</a>
                    <a href="#" class="nav-item nav-link "><i class="fa fa-cogs me-2"></i>Pengaturan</a>
                </div>
            </nav>
        </div>
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0">
                <a href="#" class="sidebar-toggler flex-shrink-0 text-success">
                    <i class="fa fa-bars"></i>
                </a>
                <img src="{{ asset('assets/img/logo.png') }}" class="logo-mini" alt="Logo MMU"
                    style="margin-left: 10px" width="35px">
                <form class="d-none d-md-flex ms-4">
                    <input class="form-control border-0 mt-3" type="search" placeholder="Search">
                </form>
                <div class="navbar-nav align-items-center ms-auto">
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <i class="fa fa-bell me-lg-2"></i>
                            <span class="d-none d-lg-inline-flex">Notificatin</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                            <a href="#" class="dropdown-item">
                                <h6 class="fw-normal mb-0">Profile updated</h6>
                                <small>15 minutes ago</small>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <h6 class="fw-normal mb-0">New user added</h6>
                                <small>15 minutes ago</small>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <h6 class="fw-normal mb-0">Password changed</h6>
                                <small>15 minutes ago</small>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item text-center">See all notifications</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <i class="fa fa-user me-lg-2"></i>
                            <span class="d-none d-lg-inline-flex">Admin</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                            <a href="#" class="dropdown-item">My Profile</a>
                            <a href="#" class="dropdown-item">Settings</a>
                            <a href="#" class="dropdown-item">Log Out</a>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- Navbar End -->
            @yield('content')
            <!-- Footer Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-light rounded-top p-4">
                    <div class="row">
                        <div class="col-12 col-sm-6 text-center text-sm-start">
                            &copy; <a class=" text-success" href="#">MMU B-01 Terate</a>, All Right Reserved.
                        </div>
                        <div class="col-12 col-sm-6 text-center text-sm-end">
                            <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                            Devalopment By <a class="text-success" href="https://moh-iqbal-rasuli.netlify.app/">Moh.
                                Iqbal Rasuli</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer End -->
        </div>
        <!-- Content End -->


    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets/lib/chart/chart.min.js') }}"></script>
    <script src="{{ asset('assets/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('assets/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('assets/lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/lib/tempusdominus/js/moment.min.js') }}"></script>
    <script src="{{ asset('assets/lib/tempusdominus/js/moment-timezone.min.js') }}"></script>
    <script src="{{ asset('assets/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js') }}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('assets/js/main.js') }}"></script>
</body>

</html>
