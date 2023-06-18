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



// Tentukan jumlah data per halaman
$jumlahDataPerHalaman = 10;

// Tentukan halaman saat ini
$halamanSaatIni = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;

// Hitung offset (mulai data) berdasarkan halaman saat ini
$offset = ($halamanSaatIni - 1) * $jumlahDataPerHalaman;

// Kueri SQL untuk mendapatkan data siswa dengan batasan jumlah dan offset
$kueri = "SELECT * FROM siswa LIMIT $offset, $jumlahDataPerHalaman";
$result = mysqli_query($koneksi, $kueri);

// Kueri SQL untuk mendapatkan total jumlah data siswa
$totalData = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM siswa"));

// Hitung total halaman berdasarkan jumlah data per halaman
$totalHalaman = ceil($totalData / $jumlahDataPerHalaman);

?>

<!-- Begin Page Content -->

<div class="container-fluid">
    <!-- Cari -->


    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Daftar Siswa SDN 2 Pringanom</h1>

    <a href="tambah.php" class="btn btn-primary ml-4 mb-2"><i class="fa fa-plus-square" aria-hidden="true"></i> <span></span> Tambah Data Siswa</a>
    <a href="export_excel.php" class="btn btn-success ml-4 mb-2" target="_blank"><i class="fa fa-file-excel" aria-hidden="true"></i> <span></span> Export data</a>
    <a href="import.php" class="btn btn-success ml-4 mb-2" ><i class="fa fa-file-excel" aria-hidden="true"></i> <span></span> Import data</a>
    <a href="printdata.php" class="btn btn-secondary ml-4 mb-2" target="_blank"><i class="fa fa-print" aria-hidden="true"></i> <span></span> Print</a>
    <a href="#" class="btn btn-danger ml-4 mb-2" data-toggle="modal" data-target="#hapusSemuaModal"><i class="fa fa-trash" aria-hidden="true"></i> Hapus Semua Data</a>
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
                            <th>No</th>
                            <th>Nama</th>
                            <th>NIDN</th>
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
                        $nomor = $offset + 1;
                        while ($tampil = mysqli_fetch_assoc($result)) :
                            $id = $tampil['id_siswa'];
                        ?>
                            <tr>
                                <td><?= $nomor++; ?></td>
                                <td><?= $tampil["nama_siswa"]; ?></td>
                                <td><?= $tampil["nidn"]; ?></td>
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
                        <?php endwhile; ?>

                    </tbody>
                </table>
            </div>
            <br>
            <br>
            <!-- Pagination links -->
            <div class="pagination justify-content-center">
                <ul class="pagination">
                    <?php if ($halamanSaatIni > 1) : ?>
                        <li class="page-item"><a class="page-link" href="?halaman=1">First</a></li>
                        <li class="page-item"><a class="page-link" href="?halaman=<?= $halamanSaatIni - 1; ?>">Previous</a></li>
                    <?php endif; ?>

                    <?php for ($i = 1; $i <= $totalHalaman; $i++) : ?>
                        <li class="page-item <?= ($halamanSaatIni == $i) ? 'active' : ''; ?>"><a class="page-link" href="?halaman=<?= $i; ?>"><?= $i; ?></a></li>
                    <?php endfor; ?>

                    <?php if ($halamanSaatIni < $totalHalaman) : ?>
                        <li class="page-item"><a class="page-link" href="?halaman=<?= $halamanSaatIni + 1; ?>">Next</a></li>
                        <li class="page-item"><a class="page-link" href="?halaman=<?= $totalHalaman; ?>">Last</a></li>
                    <?php endif; ?>
                </ul>
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
<!-- Modal Hapus Semua Data -->


<?php include '../template/footer.php' ?>
