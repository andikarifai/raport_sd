<?php
session_start();
include_once('../template/header.php');
include_once('../../../function.php');

?>

<?php
if (isset($_POST["submit"])) {
    $id = $_POST["id_mapel"];
    $nama = $_POST["nama_mapel"];
    $kd_mpl = $_POST["kode_mapel"];
    $id_semester = $_POST["id_semester"];
    $nama_guru = $_POST["nama_guru"];

    $ubahmapel = "UPDATE `mata_pelajaran` SET `nama_mapel` = '$nama', `kode_mapel` = '$kd_mpl', `id_semester` = '$id_semester', `nama_guru` = '$nama_guru' WHERE `mata_pelajaran`.`id_mapel` = $id;";
    if (mysqli_query($koneksi, $ubahmapel) > 0) {
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
            <h6 class="m-0 font-weight-bold text-primary">Tabel Mata Pelajaran</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <!-- Input Form -->
                <form action="" method="post">
                    <?php
                    $id = decryptId($_GET['id']);
                    $mapel = mysqli_query($koneksi, "SELECT * FROM mata_pelajaran WHERE id_mapel = $id");
                    while ($mapels = mysqli_fetch_assoc($mapel)) {

                    ?>

                        <div class="row">
                            <input type="hidden" name="id_mapel" id="id_mapel" value="<?= $mapels['id_mapel'] ?>" class="form-control" id="id">
                            <div class="col-md-4">
                                <label for="nama">Nama Mata Pelajaran</label>
                                <input type="text" name="nama_mapel" id="nama_mapel" value="<?= $mapels['nama_mapel'] ?>" class="form-control">
                            </div>
                            <div class="col-md-3">
                                <label for="nama">Kode Mapel</label>
                                <input type="text" name="kode_mapel" id="kode_mapel" value="<?= $mapels['kode_mapel'] ?>" class="form-control">
                            </div>


                            <div class="col-md-4">
                                <label for="jk">Semester</label>
                                <select name="id_semester" id="id_semester" value="<?= $mapels['id_semester'] ?>" class="form-control">
                                    <option value="" selected disabled>-Pilih</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>

                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="jk">Nama Guru Mapel</label>
                                <select name="nama_guru" id="nama_guru" value="<?= $mapels['nama_guru'] ?>" class="form-control">
                                    <option value="" selected disabled>Pilih Nama Guru</option>
                                    <?php $sql_guru = mysqli_query($koneksi, "SELECT * FROM guru") or die(mysqli_error($koneksi));
                                    while ($dataguru = mysqli_fetch_assoc($sql_guru)) {
                                        echo '<option value="' . $dataguru["nama_guru"] . '">' . $dataguru["nama_guru"]
                                            . '</option>';
                                    }

                                    ?>

                                </select>
                            </div>
                        </div>
                        <br><br>
                        <button type="submit" name="submit" id="submit" class="btn btn-primary">Simpan</button>
                        <button type="reset" class="btn btn-default">Reset</button>
                        <a href="index.php" class="btn btn-warning">Kembali</a>
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