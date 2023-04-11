<?php
$koneksi = mysqli_connect('localhost', 'root', '', 'raport_sd');
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>E-Rapor</title>

    <!-- Custom fonts for this template-->
    <link href="asset/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="asset/css/bootstrap.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion " id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="home.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-graduation-cap"></i>
                </div>
                <div class="sidebar-brand-text mx-2">E-Rapor</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">


            <!-- Heading -->
            <div class="sidebar-heading m-4">
                Menu
            </div>
            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa fa-home"></i>
                    <span>Home</span></a>
            </li>
            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span> Data Master</span>

                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Data Master:</h6>
                        <a class="collapse-item" href="../siswa/index.php"> <i class="fa fa-user fa-1x"></i> Data Siswa</a>
                        <a class="collapse-item" href="../guru/index.php"> <i class="fas fa-chalkboard-teacher fa-1x"></i> Data Guru</a>
                        <a class="collapse-item" href="../mapel/index.php"> <i class="fas fa-book-reader fa-1x"></i> Mata Pelajaran</a>
                        <a class="collapse-item" href="../tahunajar/index.php"> <i class="fas fa-calendar fa-1x"></i> Tahun Ajar</a>
                        <a class="collapse-item" href="../kelas/index.php"> <i class="fas fa-school fa-1x"></i> Kelas</a>

                    </div>
                </div>
            </li>



            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePage" aria-expanded="true" aria-controls="collapsePage">
                    <i class="fas fa-book-open"></i>
                    <span> Data Rapor</span></a>
                <div id="collapsePage" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Nilai Raport:</h6>
                        <a class="collapse-item" href="#"> <i class="fa fas fa-book-open fa-1x"></i> Rapor Kelas 1</a>
                        <a class="collapse-item" href="#"> <i class="fa fas fa-book-open fa-1x"></i> Rapor Kelas 2</a>
                        <a class="collapse-item" href="#"> <i class="fa fas fa-book-open fa-1x"></i> Rapor Kelas 3</a>
                        <a class="collapse-item" href="#"> <i class="fa fas fa-book-open fa-1x"></i> Rapor Kelas 4</a>
                        <a class="collapse-item" href="#"> <i class="fa fas fa-book-open fa-1x"></i> Rapor Kelas 5</a>
                        <a class="collapse-item" href="#"> <i class="fa fas fa-book-open fa-1x"></i> Rapor Kelas 6</a>



                    </div>
                </div>
            </li>
            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="../pages/user/index.php">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Pengguna</span></a>
            </li>


            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->


                    <!-- Topbar Search -->
                    <div class="container">
                        <h1>SDN Pringanom 2</h1>
                    </div>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <div class="container">
                            <h1>SDN Pringanom 2</h1>
                        </div>




                        <!-- Nav Item - User Information -->

                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Administrator</span>
                                <img class="img-profile rounded-circle" src="">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="../admin/pages/profil_user">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>

                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>
                        <!--  Menu Logout -->
                        <li class="nav-item nav no-arrow">
                            <a class="nav-link " href="../index.php" id="sign_out" role="button" aria-haspopup="true" aria-expanded="false" data-toggle="modal" data-target="#logoutModal">
                                <button class="btn btn-sm btn-outline-warning badge" type="button">Sign Out<i class="fas fa-power-off fa-sm fa-fw m-1 text-gray-400"></i></button>

                            </a>
                        </li>
                    </ul>

                </nav>
                <!-- End of Topbar -->