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
$mapel = mysqli_query($koneksi, "SELECT * FROM `mata_pelajaran`");


?>
<!-- Begin Page Content -->

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Daftar Mata Pelajaran</h1>

    <a href="tambah.php" class="btn btn-primary ml-4 mb-2"><i class="fa fa-plus-square" aria-hidden="true"></i> <span></span> Tambah Data Mapel</a>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tabel Mapel</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nama Mapel</th>
                            <th>Kode Mapel</th>
                            <th>Semester</th>
                            <th>Guru Pengajar</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $mapel = mysqli_query($koneksi, "SELECT * FROM mata_pelajaran");
                        while ($mapels = mysqli_fetch_assoc($mapel)) :
                            $id = $mapels['id_mapel'];

                        ?>
                            <tr>
                                <td><?= $mapels["nama_mapel"]; ?></td>
                                <td><?= $mapels["kode_mapel"]; ?></td>
                                <td><?= $mapels["id_semester"]; ?></td>
                                <td><?= $mapels["nama_guru"]; ?></td>
                                <td>
                                    <a href="ubah.php?id=<?= encryptId($mapels['id_mapel']); ?>" class="badge badge-warning badge-pill"><i class="fa fa-edit" aria-hidden="true"></i> <span></span> Edit</a>
                                    <a href="hapus.php?id=<?= encryptId($mapels["id_mapel"]); ?>" class="badge badge-danger badge-pill" onclick="return confirm('Apakah anda mau menghapus?');"><i class="fa fa-trash" aria-hidden="true"></i> <span></span> Hapus</a>
                                </td>

                            </tr>
                        <?php endwhile;

                        ?>
                    </tbody>
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