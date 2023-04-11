<?php
session_start();
if (empty($_SESSION)) {
    echo "<script>
 alert('Anda Harus Login dahulu');
 document.location.href= '../../../index.php';
 </script>";
}
include_once('../template/header.php');
include_once('../../../function.php');
$kelas = mysqli_query($koneksi, "SELECT * FROM kelas");

// tombol cari diklik maka ditimpa



?>
<!-- Begin Page Content -->

<div class="container-fluid">
    <!-- Cari -->


    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Daftar Kelas SDN 2 Pringanom</h1>

    <a href="tambah.php" class="btn btn-primary ml-4 mb-2"> <i class="fa fa-plus-square"></i> <span></span> Tambah Data Kelas</a>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tabel Kelas</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kelas</th>
                            <th>Nama Wali Kelas</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php
                        $kelas = mysqli_query($koneksi, "SELECT * FROM kelas");
                        while ($tampil = mysqli_fetch_assoc($kelas)) :
                            $id = $tampil['id_kelas'];
                        ?>
                            <tr>
                                <td><?= $i++; ?></td>

                                <td><?= $tampil["nama_kelas"]; ?></td>
                                <td><?= $tampil["nama_wali_kelas"]; ?></td>
                                <td>
                                    <a href="ubah.php?id=<?= encryptId($tampil["id_kelas"]); ?>" class="badge badge-warning badge-pill"> <i class="fa fa-edit"></i> <span></span> Edit</a>
                                    <a href="hapus.php?id=<?= encryptId($tampil["id_kelas"]); ?>" class="badge badge-danger badge-pill" onclick="return confirm('Apakah anda mau menghapus?');"> <i class="fa fa-trash"></i> <span></span> Hapus</a>
                                </td>

                            </tr>
                        <?php endwhile; ?>
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
            <span>Copyright &copy;SDN 2 Pringanom</span>
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
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="login.html">Logout</a>
            </div>
        </div>
    </div>
</div>
<?php include '../template/footer.php' ?>