<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();

include_once('../template/header.php');
include_once('../../../koneksi.php');
include_once('../../../function.php');
?>

<?php
if (isset($_POST["submit"])) {
    $id = $_POST["id_kelas"];
    $kelas = $_POST["nama_kelas"];
    $wali = $_POST["nama_wali_kelas"];


    $ubahkelas = "UPDATE `kelas` SET `id_kelas` = '$id', `nama_kelas` = '$kelas', `nama_wali_kelas` = '$wali' WHERE `kelas`.`id_kelas` = '$id'";
    if (mysqli_query($koneksi, $ubahkelas) > 0) {
        echo "<script>
 alert('data berhasil diubah');
 document.location.href= 'index.php';
 </script>";
    } else {
        echo "Galat!";
    }
}

?>

<!-- Begin Page Content -->

<div class="container-fluid">

    <!-- Page Heading -->

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tabel Kelas</h6>
        </div>
        <div class="card-body">
            <div class="table">
                <!-- Input Form -->
                <form action="" method="post">
                    <?php
                    $id = decryptId($_GET['id']);
                    $kelas = mysqli_query($koneksi, "SELECT * FROM kelas WHERE id_kelas = '$id'");
                    while ($kelas_tampil = mysqli_fetch_assoc($kelas)) {

                    ?>

                        <input type="hidden" name="id_kelas" id="id_kelas" value="<?= $kelas_tampil['id_kelas'] ?>" class="form-control">
                    
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="nama_kelas" class="control-label">Kelas</label>
                                    <select class="form-control" name="nama_kelas" id="nama_kelas">
                                        <option disabled>Pilih Kelas</option>
                                        <?php
                                        $sql_kelas = mysqli_query($koneksi, "SELECT * FROM kelas") or die(mysqli_error($koneksi));
                                        while ($datakelas = mysqli_fetch_assoc($sql_kelas)) {
                                            $selected = ($datakelas['nama_kelas'] == $kelas_tampil['nama_kelas']) ? 'selected' : '';
                                            echo '<option value="' . $datakelas["nama_kelas"] . '" ' . $selected . '>' . $datakelas["nama_kelas"] . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <label for="jk">Guru Wali Kelas</label>
                                <select name="nama_wali_kelas" id="nama_wali_kelas" class="form-control">
                                    <option disabled>Pilih Nama Guru</option>
                                    <?php
                                    $sql_guru = mysqli_query($koneksi, "SELECT * FROM guru") or die(mysqli_error($koneksi));
                                    while ($dataguru = mysqli_fetch_assoc($sql_guru)) {
                                        $selected = ($kelas_tampil['nama_wali_kelas'] == $dataguru['nama_guru']) ? 'selected' : '';
                                        echo '<option value="' . $dataguru["nama_guru"] . '" ' . $selected . '>' . $dataguru["nama_guru"] . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>

                        <div> <br>
                            <button type="submit" name="submit" id="submit" class="btn btn-primary">Simpan</button>
                            <a href="index.php" class="btn btn-warning">Kembali</a>
                            <br><br>
                        </div>


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