<?php
// error_reporting(E_ALL);
// ini_set('display_errors', 1);       
session_start();
if (empty($_SESSION)) {
    echo "<script>
 alert('Anda Harus Login dahulu');
 document.location.href= '../../../index.php';
 </script>";
}

include_once '../../../koneksi.php';
include_once('../../../function.php');
include_once('../template/header.php');
?>
<?php
if (isset($_GET['kls'])) {
    $klas = $_GET['kls'];
    // query untuk mengambil data nilai berdasarkan kelas
    $nilai = mysqli_query($koneksi, "SELECT `id_nilai`, `nama_siswa`, `nisn`, `nama_kelas`, `id_semester`, `tahun_ajar`, `nama_mapel`, `spiritual`, `sosial`, `nilai_pengetahuan`, `ket_pengetahuan`, `nilai_ketrampilan`, `ket_ketrampilan`, `tinggi`, `berat`, `penglihatan`, `pendengaran`, `gigi`, `kesenian`, `olahraga`, `saran`, `ekstra`, `ktrg_nekstra`, `sakit`, `izin`, `alfa`, `kd_raport`, `nidn` FROM nilai WHERE nama_kelas = '$klas' GROUP BY kd_raport");
} else {
    echo "Nilai tidak ditemukan";
}
?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Cari -->
    <!-- Page Heading -->
    <!-- <h1 class="h3 mb-2 text-gray-800">Daftar Rapor Kelas <?= $klas ?> </h1> -->
    <!-- <a href="tambah.php" class="btn btn-primary ml-4 mb-2"><i class="fa fa-plus-square" aria-hidden="true"></i> <span></span> Tambah Data Rapor</a> -->
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tabel Rapor</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <a href="#" class="btn btn-danger ml-4 mb-2" data-toggle="modal" data-target="#hapusSemuaModal"><i class="fa fa-trash" aria-hidden="true"></i> Hapus Semua Data</a>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Siswa</th>
                            <th>NISN</th>
                            <th>Kelas</th>
                            <th>Semester</th>
                            <th>Tahun Ajar</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($nilai) {
                            $i = 1;
                            while ($tampil = mysqli_fetch_assoc($nilai)) :
                        ?>
                                <tr>
                                    <td><?= $i++; ?></td>
                                    <td><?= $tampil['nama_siswa'] ?></td>
                                    <td><?= $tampil['nisn'] ?></td>
                                    <td><?= $tampil['nama_kelas'] ?></td>
                                    <td><?= $tampil['id_semester'] ?></td>
                                    <td><?= $tampil['tahun_ajar'] ?></td>
                                    <td>
                                        <a href="detail.php?kd_raport=<?= encryptId($tampil["kd_raport"]); ?>&kls=<?= $klas ?>" class="badge badge-info badge-pill"><i class="fa fa-info-circle" aria-hidden="true"></i><span></span> Detail</a>
                                        <a href="hapus.php?kd_raport=<?= encryptId($tampil["kd_raport"]); ?>&kls=<?= $_GET['kls'] ?>" class="badge badge-danger badge-pill" onclick="return confirm('Apakah anda yakin ingin menghapus?');"><i class="fa fa-trash" aria-hidden="true"></i> <span></span> Hapus</a>
                                    </td>
                                </tr>
                        <?php
                            endwhile;
                        } else {
                            echo '<tr><td colspan="7">Nilai tidak ditemukan</td></tr>';
                        }
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
<!-- Modal Hapus Semua Data -->
<div class="modal fade" id="hapusSemuaModal" tabindex="-1" role="dialog" aria-labelledby="hapusSemuaModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="hapusSemuaModalLabel">Konfirmasi Hapus Semua Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Apakah Anda yakin ingin menghapus semua data siswa? Tindakan ini tidak dapat dikembalikan.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <?php $hapus_semua_link = "hapus_semua.php?hapus_semua=1&kls=" . urlencode($klas); ?>
        <a href="<?php echo $hapus_semua_link; ?>" class="btn btn-danger">Hapus Semua</a>
      </div>
    </div>
  </div>
</div>

<?php include '../template/footer.php' ?>