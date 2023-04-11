<?php
session_start();
if (empty($_SESSION)) {
    echo "<script>
 alert('Anda Harus Login dahulu');
 document.location.href= '../../index.php';
 </script>";
}

include_once('../template/header.php');

include_once('../../../function.php');
$murid = mysqli_query($koneksi, "SELECT * FROM siswa");


?>

<!-- Begin Page Content -->

<div class="container-fluid">
    <!-- Cari -->


    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Daftar Siswa SDN 2 Pringanom</h1>

    <a href="tambah.php" class="btn btn-primary ml-4 mb-2"><i class="fa fa-plus-square" aria-hidden="true"></i> <span></span> Tambah Data Siswa</a>
    <a href="export_excel.php" class="btn btn-success ml-4 mb-2" target="_blank"><i class="fa fa-file-excel" aria-hidden="true"></i> <span></span> Export data</a>
    <a href="import.php" class="btn btn-success ml-4 mb-2" target="_blank"><i class="fa fa-file-excel" aria-hidden="true"></i> <span></span> Import data</a>
    <a href="printdata.php" class="btn btn-secondary ml-4 mb-2" target="_blank"><i class="fa fa-print" aria-hidden="true"></i> <span></span> Print</a>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tabel Siswa</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>NIS</th>
                            <th>NISN</th>
                            <th>Agama</th>
                            <th>Tempat Lahir</th>
                            <th>Tanggal Lahir</th>
                            <th>Jenis Kelamin</th>
                            <th>Nama Ayah</th>
                            <th>Pekerjaan Ayah</th>
                            <th>Nama Ibu</th>
                            <th>Pekerjaan Ibu</th>
                            <th>Kelas</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $murid = mysqli_query($koneksi, "SELECT * FROM siswa");
                        while ($tampil = mysqli_fetch_assoc($murid)) :
                            $id = $tampil['id_siswa'];
                            // var_dump($id);
                            // echo ($id);
                        ?>
                            <tr>
                                <td><?= $tampil["nama_siswa"]; ?></td>
                                <td><?= $tampil["nis"]; ?></td>
                                <td><?= $tampil["nisn"]; ?></td>
                                <td><?= $tampil["agama_siswa"]; ?></td>
                                <td><?= $tampil["tempat_lahir_siswa"]; ?></td>
                                <td><?= $tampil["tanggal_lahir_siswa"]; ?></td>
                                <td><?= $tampil["jenis_kelamin"]; ?></td>
                                <td><?= $tampil["nama_ayah"]; ?></td>
                                <td><?= $tampil["kerja_ayah"]; ?></td>
                                <td><?= $tampil["nama_ibu"]; ?></td>
                                <td><?= $tampil["kerja_ibu"]; ?></td>
                                <td><?= $tampil["nama_kelas"]; ?></td>

                                <td>
                                    <a href="detail.php?id=<?= encryptId($tampil["id_siswa"]); ?> " class="badge badge-primary badge-pill"> <i class="fa fa-info" aria-hidden="true"></i> <span></span> Detail</a>
                                    <a href="ubah.php?id=<?= encryptId($tampil["id_siswa"]);  ?>" class="badge badge-warning badge-pill"><i class="fa fa-edit" aria-hidden="true"></i> <span></span> Edit</a>
                                    <a href="hapus.php?id=<?= encryptId($tampil["id_siswa"]);  ?>" class="badge badge-danger badge-pill" onclick="return confirm('Apakah anda mau menghapus?');"> <i class="fa fa-trash" aria-hidden="true"></i> <span></span>Hapus</a>
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