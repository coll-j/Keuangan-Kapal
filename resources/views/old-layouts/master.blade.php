<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title')</title>
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>

    <style>
    .sidebar {
    display: table-cell;
    min-height: 100vh;
    }

    .nav-link {
        color: #f2f2f2;
    }

    .active {
        border-top-right-radius: 25px;
        border-bottom-right-radius: 25px;
        background-color: #5bc0de;
        color: #292b2c;
    }

    html, body {
        max-width: 100%;
        overflow-x: hidden;
    }

    .table-condensed{
    font-size: 12px;
    }
    </style>
    @yield('css')

</head>
<body class="bg-light">

    <div class="wrapper">
        <div class="m-0 p-0 row">
            <!-- Top Navbar -->
            <nav class="navbar navbar-expand-md navbar-light fixed-top bg-info w-100">
            <a class="navbar-brand text-light" href="#"><i class="fa fa-ship"></i></a>
            <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
                <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-user mr-1"></i>User
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="#">Lihat Profil</a>
                    <a class="dropdown-item" href="#">Keluar</a>
                    </div>
                </li>
                </ul>
            </div>
            </nav>
            <!-- END Top Navbar -->
        </div>

        <div class="row" style="margin-top: 56px">
            <!-- Sidebar -->
            <div class="col-md-2 d-md-block bg-dark sidebar position-fixed">
                <nav class="pt-3">
                    <div class="sidebar-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                        <a class="nav-link <?php if($active == 'dashboard'){ echo('active');} ?>" href=" {{ route('dashboard.index') }}">
                            Dasbor
                        </a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link <?php if($active == 'profil_perusahaan'){ echo('active');} ?>" href="{{ route('dashboard.profil_perusahaan') }}">
                            Profil Perusahaan
                        </a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link <?php if($active == 'page_data'){ echo('active');} ?>" href="{{ route('dashboard.data') }}">
                            Data
                        </a>
                        </li>

                        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-3 mb-1 text-muted">
                            <span>Catatan</span>
                            <a class="d-flex align-items-center" href="#">
                                <span data-feather="plus-circle"></span>
                            </a>
                        </h6>
                        <li class="nav-item">
                        <a class="nav-link <?php if($active == 'neraca'){ echo('active');} ?>" href="{{ route('dashboard.neraca') }}">
                            Neraca
                        </a>
                        </li>
                        <li class="nav-item ">
                        <a class="nav-link <?php if($active == 'anggaran'){ echo('active');} ?>" href="{{ route('dashboard.anggaran') }}">
                            Anggaran
                        </a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="#">
                            Catatan Transaksi Kantor
                        </a>
                        </li>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="#">
                            Catatan Transaksi Proyek
                        </a>
                        </li>

                        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-3 mb-1 text-muted">
                            <span>Laporan</span>
                            <a class="d-flex align-items-center" href="#">
                                <span data-feather="plus-circle"></span>
                            </a>
                        </h6>
                        <li class="nav-item">
                        <a class="nav-link" href="#">
                            Laba Rugi Kantor
                        </a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="#">
                            Laba Rugi Proyek
                        </a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="#">
                            Laba Rugi
                        </a>
                        </li>
                    </ul>
                    </div>
                </nav>
            </div>
            <!-- END Sidebar -->
            <!-- <div>Test</div> -->
            <div class="container" style="margin-left: 220px;">
                <div class="row" style="min-height: 100vh">
                    @yield('main')
                </div>
            </div>
            <!-- <div class="content col-md-10 pt-4"> -->
            <!-- </div> -->

        </div>
    </div>

    <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
</body>
</html>