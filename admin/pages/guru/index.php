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
$guru = mysqli_query($koneksi, "SELECT * FROM guru");

?>
<!-- Begin Page Content -->

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Daftar Guru SDN 2 Pringanom</h1>

    <a href="tambah.php" class="btn btn-primary ml-4 mb-2"><i class="fa fa-plus-square" aria-hidden="true"></i> <span></span> Tambah Data Guru</a>
    <a href="export_excel.php" class="btn btn-success ml-4 mb-2" target="_blank"><i class="fa fa-file-excel" aria-hidden="true"></i> <span></span> Export data</a>
    <a href="import.php" class="btn btn-success ml-4 mb-2"><i class="fa fa-file-excel" aria-hidden="true"></i> <span></span> Import data</a>
    <a href="printdata.php" class="btn btn-secondary ml-4 mb-2" target="_blank"><i class="fa fa-print" aria-hidden="true"></i> <span></span> Print</a>
    <a href="#" class="btn btn-danger ml-4 mb-2" data-toggle="modal" data-target="#hapusSemuaModal"><i class="fa fa-trash" aria-hidden="true"></i> Hapus Semua Data</a>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tabel Guru</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>NIP</th>
                            <th>Jenis Kelamin</th>
                            <th>Status Guru</th>
                            <th>Status Kepegawaian</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $nomor = $offset + 1;
                        $guru = mysqli_query($koneksi, "SELECT * FROM guru");
                        while ($tampilgr = mysqli_fetch_assoc($guru)) {
                            $id = $tampilgr['id_guru'];

                        ?>
                            <tr>
                                <td><?= $nomor++; ?></td>
                                <td><?= $tampilgr["nama_guru"]; ?></td>
                                <td><?= $tampilgr["nip_guru"]; ?></td>
                                <td><?= $tampilgr["jk_guru"]; ?></td>
                                <td><?= $tampilgr["status_guru"]; ?></td>
                                <td><?= $tampilgr["status_kepegawaian_guru"]; ?></td>
                                <td>
                                    <a href="ubah.php?id=<?= encryptId($tampilgr["id_guru"]); ?>" class="badge badge-warning badge-pill"><i class="fa fa-edit" aria-hidden="true"></i>

                                        <span></span> Edit</a>
                                    <a href="hapus.php?id=<?= $tampilgr["id_guru"]; ?>" class="badge badge-danger badge-pill" onclick="return confirm('Apakah anda yakin ingin menghapus?');"><i class="fa fa-trash" aria-hidden="true"></i> <span></span> Hapus</a>
                                </td>

                            </tr>

                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

</div>
<!-- End of Page Wrapper -->
</div>
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
        <a href="hapus_semua.php?hapus_semua=1" class="btn btn-danger">Hapus Semua</a>
         <!-- Tambahkan parameter hapus_semua=1 pada URL -->
      </div>
    </div>
  </div>
</div>

<?php include '../template/footer.php' ?>