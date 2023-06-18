<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
include_once('../template/header.php');
include_once('../../../function.php');
?>

<?php
if (isset($_POST["submit"])) {
    $id = $_POST["id_siswa"];
    $nis = $_POST["nidn"];
    $nisn = $_POST["nisn"];
    $nama = $_POST["nama_siswa"];
    $jk = $_POST["jenis_kelamin"];
    $tmplahir = $_POST["tempat_lahir_siswa"];
    $tgllhr = $_POST["tanggal_lahir_siswa"];
    $agama = $_POST["agama_siswa"];
    $alamat = $_POST["alamat_siswa"];
    $nmayah = $_POST["nama_ayah"];
    $nmibu = $_POST["nama_ibu"];
    $krjayah = $_POST["kerja_ayah"];
    $krjibu = $_POST["kerja_ibu"];
    $nmkelas = $_POST["nama_kelas"];
    $ubah = "UPDATE `siswa` SET  `nidn` = '$nis', `nisn`='$nisn', `nama_siswa`='$nama', `jenis_kelamin`= '$jk', `tempat_lahir_siswa`= '$tmplahir', `tanggal_lahir_siswa`='$tgllhr', `agama_siswa`='$agama', `alamat_siswa`='$alamat', `nama_ayah`= '$nmayah', `nama_ibu`='$nmibu', `kerja_ayah`= '$krjayah', `kerja_ibu`= '$krjibu', `nama_kelas` = '$nmkelas' WHERE siswa.id_siswa = '$id';";
    if (mysqli_query($koneksi, $ubah) > 0) {
        echo "<script>
        alert('data berhasil diubah!');
        document.location.href= 'index.php';
        </script>";
    } else {
        echo ("Deskripsi Error: " . mysqli_error($koneksi));
        echo "Data gagal diubah";
    }
}

?>

<!-- Begin Page Content -->

<div class="container-fluid">

    <!-- Page Heading -->

    <!-- DataTales Example -->

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Tabel Murid</h6>
        </div>
        <div class="card-body">
            <div class="table">
                <!-- Input Form -->
                <form action="" method="post">
                    <?php
                    $id = decryptId($_GET['id']);
                    $murid = mysqli_query($koneksi, "SELECT * FROM siswa WHERE id_siswa = '$id'");
                    while ($data_siswa = mysqli_fetch_assoc($murid)) {
                    ?>
                        <div class="row">
                            <input type="hidden" name="id_siswa" value="<?= $data_siswa['id_siswa']; ?>" class="form-control" id="id">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="kode" class="control-label">NIDN</label>
                                    <input type="text" name="nidn" value="<?= $data_siswa['nidn']; ?>" class="form-control" id="nidn">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="kode" class="control-label">NISN</label>
                                    <input type="text" name="nisn" value="<?= $data_siswa['nisn'];  ?>" class="form-control" id="nisn">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="kode" class="control-label">Nama</label>
                                    <input type="text" name="nama_siswa" value="<?= $data_siswa['nama_siswa']; ?>" class="form-control" id="nama_siswa">
                                </div>
                            </div>
                            <div class="col-md-2">
                            <div class="form-group">
                                <label for="jenis_kelamin" class="control-label">Jenis Kelamin</label>
                                <select class="form-control" name="jenis_kelamin" id="jenis_kelamin">
                                    <option value="L" <?php if ($data_siswa['jenis_kelamin'] == 'L') echo 'selected'; ?>>L</option>
                                    <option value="P" <?php if ($data_siswa['jenis_kelamin'] == 'P') echo 'selected'; ?>>P</option>
                                </select>
                            </div>
                        </div>

                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="kode" class="control-label">Tempat Lahir</label>
                                    <input type="text" name="tempat_lahir_siswa" value="<?= $data_siswa['tempat_lahir_siswa']; ?>" class="form-control" id="tempat_lahir_siswa">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="kode" class="control-label">Tanggal Lahir</label>
                                    <input type="date" name="tanggal_lahir_siswa" value="<?= $data_siswa['tanggal_lahir_siswa']; ?>" class="form-control" id="tanggal_lahir_siswa">
                                </div>
                            </div>
                            <div class="col-md-2">
                            <div class="form-group">
                                <label for="agama_siswa" class="control-label">Agama</label>
                                <select class="form-control" name="agama_siswa" id="agama_siswa">
                                    <option value="Islam" <?php if ($data_siswa['agama_siswa'] == 'Islam') echo 'selected'; ?>>Islam</option>
                                    <option value="Kristen" <?php if ($data_siswa['agama_siswa'] == 'Kristen') echo 'selected'; ?>>Kristen</option>
                                    <option value="Budha" <?php if ($data_siswa['agama_siswa'] == 'Budha') echo 'selected'; ?>>Budha</option>
                                    <option value="Hindu" <?php if ($data_siswa['agama_siswa'] == 'Hindu') echo 'selected'; ?>>Hindu</option>
                                </select>
                            </div>
                        </div>

                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="kode" class="control-label">Alamat</label>
                                    <input type="text" name="alamat_siswa" id="alamat_siswa" value="<?= $data_siswa['alamat_siswa']; ?>" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="kode" class="control-label">Nama Ayah</label>
                                    <input type="text" name="nama_ayah" id="nama_ayah" value="<?= $data_siswa['nama_ayah']; ?>" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="kode" class="control-label">Pekerjaan Ayah</label>
                                    <input type="text" name="kerja_ayah" id="kerja_ayah" value="<?= $data_siswa['kerja_ayah']; ?>" class="form-control">
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="kode" class="control-label">Nama Ibu</label>
                                    <input type="text" name="nama_ibu" id="nama_ibu" value="<?= $data_siswa['nama_ibu']; ?>" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="kode" class="control-label">Pekerjaan Ibu</label>
                                    <input type="text" name="kerja_ibu" id="kerja_ibu" value="<?= $data_siswa['kerja_ibu']; ?>" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="nama_kelas" class="control-label">Kelas</label>
                                    <select class="form-control" name="nama_kelas" id="nama_kelas">
                                        <option>Pilih Kelas</option>
                                        <?php
                                        $sql_kelas = mysqli_query($koneksi, "SELECT * FROM kelas") or die(mysqli_error($koneksi));
                                        while ($datakelas = mysqli_fetch_assoc($sql_kelas)) {
                                            $selected = ($datakelas['nama_kelas'] == $data_siswa['nama_kelas']) ? 'selected' : '';
                                            echo '<option value="' . $datakelas["nama_kelas"] . '" ' . $selected . '>' . $datakelas["nama_kelas"] . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <br>

                        <button type="submit" class="btn btn-success" name="submit" id="submit">Update</button>
                        <a href="index.php" class="btn btn-warning">Cancel</a>
                        <div class="clearfix"></div>
                        <br>
                </form>
            <?php }
                    // var_dump($id);
                    // echo ($id);
            ?>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
</div>
</div>

<?php include '../template/footer.php' ?>