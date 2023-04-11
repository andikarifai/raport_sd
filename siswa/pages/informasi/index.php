<?php
session_start();
if (empty($_SESSION)) {
    echo "<script>
 alert('Anda Harus Login dahulu');
 document.location.href= '../../../index.php';
 </script>";
}
include_once('../template/header.php');
$informasi = mysqli_query($koneksi, "SELECT * FROM `profil`");

?>
<!-- Begin Page Content -->

<div class="container-fluid">

    <!-- Page Heading -->
    <center>
        <h1 class="h3 mb-2 text-gray-800">Selamat Datang di Aplikasi Pengolahan Data Nilai Raport</h1>
    </center>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h4 class="m-0 font-weight text-primary text-center">Tabel Informasi Sekolah</h4>

        </div>

        <div class="card-body">
            <div class="table-responsive">


                <table class="table table-bordered" id="dataTable" width="80%" cellspacing="0">
                    <thead>
                        <h3>1. Informasi Sekolah</h3>
                    </thead>
                    <tbody>
                        <?php

                        $informasi = mysqli_query($koneksi, "SELECT * FROM `profil`");
                        while ($info = mysqli_fetch_assoc($informasi)) {
                        ?>

                            <tr>
                                <td>Nama Sekolah</td>
                                <td><?= $info["nama_sekolah"]; ?> </td>
                            </tr>
                            <tr>
                                <td>NPSN</td>
                                <td><?= $info["npsn"]; ?></td>
                            </tr>
                            <tr>
                                <td>Jenjang Pendidikan</td>
                                <td><?= $info["jenjang"]; ?></td>
                            </tr>
                            <tr>
                                <td>Akreditasi</td>
                                <td><?= $info["akreditasi"]; ?></td>
                            </tr>
                            <tr>
                                <td>Alamat Sekolah </td>
                                <td><?= $info["alamat"]; ?></td>
                            </tr>

                    </tbody>
                </table>
                <table class="table table-bordered" id="dataTable" width="80%" cellspacing="0">
                    <thead>
                        <h3>2. Informasi Kepala Sekolah</h3>
                    </thead>

                    <tbody>

                        <tr>
                            <td>Nama Kepala Sekolah</td>
                            <td><?= $info["nama_kepsek"]; ?></td>
                        </tr>
                        <tr>
                            <td>NIP Kepala Sekolah</td>
                            <td><?= $info["nip_kepsek"]; ?></td>
                        </tr>
                        <tr>
                            <td>Pangkat</td>
                            <td><?= $info["pangkat_kepsek"]; ?></td>
                        </tr>
                        <tr>
                            <td>Jabatan</td>
                            <td><?= $info["jabatan_kepsek"]; ?></td>
                        </tr>
                        <tr>
                            <td>Alamat Kepala Sekolah</td>
                            <td><?= $info["alamat_kepsek"] ?></td>
                        </tr>
                    <?php } ?>


                    </tbody>

                </table>

            </div>

        </div>
    </div>
    </form>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Footer -->
<!-- <footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; SDN 2 Pringanom </span>
        </div>
    </div>
</footer> -->
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>


<?php include '../template/footer.php' ?>