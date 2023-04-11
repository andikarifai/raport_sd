<?php
session_start();
include_once('../template/header.php');
include_once('../../../function.php');
?>

<?php
if (isset($_POST["submit"])) {
    $id = $_POST["id"];
    $tahun = $_POST["tahun_ajar"];
    $smt = $_POST['semester'];

    $ubahkelas = "UPDATE `tahun_ajar` SET `tahun_ajar` = '$tahun',`semester` = '$smt' WHERE `tahun_ajar`.`id` = $id;";
    if (mysqli_query($koneksi, $ubahkelas) > 0) {
        echo "<script>
 alert('data berhasil diubah');
 document.location.href= 'index.php';
 </script>";
    } else {
        echo "Galat";
    }
}

?>

<!-- Begin Page Content -->

<div class="container-fluid">

    <!-- Page Heading -->

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tabel Tahun</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <!-- Input Form -->
                <?php
                $id = decryptId($_GET["id"]);
                $tahun = mysqli_query($koneksi, "SELECT * FROM tahun_ajar WHERE id = $id");
                while ($thn = mysqli_fetch_assoc($tahun)) {

                ?>
                    <form action="" method="post">
                        <div class="row">
                            <div class="col-md-4">
                                <input type="hidden" name="id" value="<?= $id; ?>">
                                <label for="nama">Tahun Pelajaran
                                    <input type="text" name="tahun_ajar" id="tahun_ajar" value="<?= $thn['tahun_ajar'] ?>" class="form-control">
                                </label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <label for="semester"> Semester</label>
                                <select name="semester" id="semester" class="form-control" value="<?= $thn['semester'] ?>">
                                    <option value="1" class="form-control">1</option>
                                    <option value="2" class="form-control">2</option>
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
<?php } ?>

<?php include '../template/footer.php' ?>