<?php
session_start();
include_once('../template/header.php');
$user = mysqli_query($koneksi, "SELECT * FROM users");

// tombol cari diklik maka ditimpa



?>
<!-- Begin Page Content -->

<div class="container-fluid">
    <!-- Cari -->


    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Daftar Pengguna</h1>

    <a href="tambah.php" class="btn btn-primary ml-4 mb-2">
        <ii class="fa fa-plus-square"></ii><span></span> Tambah Data Pengguna
    </a>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <!-- <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-danger">Info : Masukkan Level 1 Sebagai Admin, Level 2 Sebagai Guru, dan Level 3 sebagai Siswa</h6>
        </div> -->
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Username</th>

                            <th>Nama</th>
                            <th>Level Pengguna</th>
                            <th>Kelas</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php
                        while ($tampil = mysqli_fetch_assoc($user)) :
                        ?>
                            <tr>
                                <td><?= $i++; ?></td>
                                <td><?= $tampil["username"]; ?></td>
                                <td><?= $tampil["nama"]; ?></td>
                                <td>
                                    <?php
                                    if ($tampil["level"] == 1) {
                                        echo 'Admin';
                                    } elseif ($tampil["level"] == 2) {
                                        echo 'Guru';
                                    } else {
                                        echo 'siswa';
                                    }
                                    ?>
                                </td>
                                <td><?= $tampil["kelas"]; ?></td>
                                <td>
                                    <a href="ubah.php?id=<?= $tampil["id_user"]; ?>" class="badge badge-warning badge-pill">Edit</a>
                                    <a href="hapus.php?id=<?= $tampil["id_user"]; ?>" class="badge badge-danger badge-pill" onclick="return confirm('Apakah anda yakin ingin menghapus?');">Hapus</a>
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
            <span>Copyright &copy; SDN 2 Pringanom 2022</span>
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