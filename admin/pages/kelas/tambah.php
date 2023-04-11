<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
include_once('../template/header.php');
include_once('../../../koneksi.php')
?>

<?php
if (isset($_POST["submit"])) {
    $id = $_POST["id_kelas"];
    $kelas = $_POST["nama_kelas"];
    $wali = $_POST["nama_wali_kelas"];

    $tambahkelas = "INSERT INTO `kelas` (`id_kelas`, `nama_kelas`, `nama_wali_kelas`) VALUES ('$id', '$kelas', '$wali');";
    if (mysqli_query($koneksi, $tambahkelas) > 0) {
        echo "<script>
 alert('data berhasil ditambahkan');
 document.location.href= 'index.php';
 </script>";
    } else {
        echo "nub!";
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
            <div class="table-responsive">
                <!-- Input Form -->
                <form action="" method="post">

                    <div class="row">
                        <div class="col-md-4">
                            <label for="nama"> Kelas</label>
                            <input type="text" name="nama_kelas" id="nama_kelas" value="" class="form-control">

                        </div>
                        <div class="col-md-4">
                            <label for="jk">Guru Wali Kelas</label>
                            <select name="nama_wali_kelas" id="nama_wali_kelas" value="<?= $mapels['nama_guru'] ?>" class="form-control">
                                <option value="" selected disabled>Pilih Nama Guru</option>
                                <?php $sql_guru = mysqli_query($koneksi, "SELECT * FROM guru") or die(mysqli_error($koneksi));
                                while ($dataguru = mysqli_fetch_assoc($sql_guru)) {
                                    echo '<option value="' . $dataguru["nama_guru"] . '">' . $dataguru["nama_guru"]
                                        . '</option>';
                                } ?>
                            </select>
                        </div>
                    </div>
                    <br><br>
                    <button type="submit" name="submit" id="submit" class="btn btn-primary">Simpan</button>
                    <a href="index.php" class="btn btn-warning">Kembali</a>
                </form>
                <br><br>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->


<?php include '../template/footer.php' ?>