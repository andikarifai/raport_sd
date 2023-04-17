<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
include_once('../template/header.php');
include_once('../../../function.php');
include '../../../koneksi.php';


$id = decryptId($_GET['id']);
$stmt = $koneksi->prepare("SELECT * FROM siswa WHERE id_siswa = ?");
$stmt->bind_param("s", $id);
$stmt->execute();
$result = $stmt->get_result();
while ($data_siswa = $result->fetch_assoc()) {

    
    ?>
    <!-- Begin Page Content -->

    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Daftar Siswa SDN 2 Pringanom</h1>

        <a href="index.php" class="btn btn-warning ml-4 mb-2"> Kembali</a>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Detail Tabel Siswa</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="80%" cellspacing="0">
                        <thead>
                            <tr>
                                <td>NIS</td>
                                <td><?= $data_siswa['nis']; ?> </td>
                            </tr>
                            <tr>
                                <td>NISN</td>
                                <td><?= $data_siswa['nisn']; ?></td>
                            </tr>
                            <tr>
                                <td>Nama</td>
                                <td><?= $data_siswa['nama_siswa']; ?></td>
                            </tr>
                            <tr>
                                <td>Kelas</td>
                                <td><?= $data_siswa['nama_kelas']; ?></td>
                            </tr>
                            <tr>
                                <td>Jenis Kelamin</td>
                                <td><?= $data_siswa['jenis_kelamin']; ?></td>
                            </tr>
                            <tr>
                                <td>Tempat Lahir </td>
                                <td><?= $data_siswa['tempat_lahir_siswa']; ?></td>
                            </tr>
                            <tr>
                                <td>Tanggal Lahir</td>
                                <td><?= $data_siswa['tanggal_lahir_siswa']; ?></td>
                            </tr>
                            <tr>
                                <td>Agama</td>
                                <td><?= $data_siswa['agama_siswa']; ?></td>
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <td><?= $data_siswa['alamat_siswa']; ?></td>
                            </tr>
                            <tr>
                                <td>Nama Ayah</td>
                                <td><?= $data_siswa['nama_ayah']; ?></td>
                            </tr>
                            <tr>
                                <td>Pekerjaan Ayah</td>
                                <td><?= $data_siswa['kerja_ayah']; ?></td>
                            </tr>
                            <tr>
                                <td>Nama Ibu</td>
                                <td><?= $data_siswa['nama_ibu']; ?></td>
                            </tr>

                            <tr>
                                <td>Pekerjaan Ibu</td>
                                <td><?= $data_siswa['kerja_ibu']; ?></td>
                            </tr>

                            </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->
<?php } 
$stmt->close();?>
<!-- Footer -->
</div>
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