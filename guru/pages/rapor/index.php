<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
if (empty($_SESSION)) {
    echo "<script>
 alert('Anda Harus Login dahulu');
 document.location.href= '../../../index.php';
 </script>";
}

include_once('../template/header.php');

include_once('../../../function.php');

$kelas = $_SESSION['kelas'];
$nilai = mysqli_query($koneksi, "SELECT `id_nilai`, `nama_siswa`, `nisn`, `nama_kelas`, `id_semester`, `tahun_ajar`, `nama_mapel`, `spiritual`, `sosial`, `nilai_pengetahuan`, `ket_pengetahuan`, `nilai_ketrampilan`, `ket_ketrampilan`, `tinggi`, `berat`, `penglihatan`, `pendengaran`, `gigi`, `kesenian`, `olahraga`, `saran`, `ekstra`, `ktrg_nekstra`, `sakit`, `izin`, `alfa`, `kd_raport`, `nis` FROM nilai WHERE  nama_kelas = '$kelas' GROUP BY kd_raport ");


// tombol cari diklik maka ditimpa


?>
<!-- Begin Page Content -->

<div class="container-fluid">
    <!-- Cari -->


    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Daftar Rapor Kelas <?= $kelas ?></h1>
    <?php

    $query = mysqli_query($koneksi, "SELECT * FROM kelas WHERE nama_kelas = '$kelas'");
    $row = mysqli_fetch_assoc($query);
    // var_dump($kelas);
    if ($row['nama_kelas'] == $_SESSION['kelas']) {
        echo '<a href="tambah.php" class="btn btn-primary ml-4 mb-2"><i class="fa fa-plus-square" aria-hidden="true"></i> <span></span> Tambah Data Rapor</a>';
    }
    ?>

    <!-- <a href="tambah.php" class="btn btn-primary ml-4 mb-2"><i class="fa fa-plus-square" aria-hidden="true"></i> <span></span> Tambah Data Rapor</a> -->
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tabel Rapor</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Siswa</th>
                            <th>NIS</th>
                            <th>NISN</th>
                            <th>Kelas</th>
                            <th>Semester</th>
                            <th>Tahun Ajar</th>
                            <th>Aksi</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;

                        while ($tampil = mysqli_fetch_assoc($nilai)) : ?>

                            <tr>
                                <td><?= $i++; ?></td>
                                <td><?= $tampil['nama_siswa'] ?></td>
                                <td><?= $tampil['nis'] ?></td>
                                <td><?= $tampil['nisn'] ?></td>
                                <td><?= $tampil['nama_kelas'] ?></td>
                                <td><?= $tampil['id_semester'] ?></td>
                                <td><?= $tampil['tahun_ajar'] ?></td>

                                <td>
                                    <a href="detail.php?kd_raport=<?= encryptId($tampil["kd_raport"]); ?>" class="badge badge-info badge-pill" target="_blank"><i class="fa fa-info-circle" aria-hidden="true"></i><span></span> Detail</a>

                                </td>

                            </tr>

                    </tbody>
                <?php endwhile; ?>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Footer -->
<!-- <footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; SDN 2 Pringanom</span>
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

<!-- Logout Modal-->

<?php include '../template/footer.php' ?>