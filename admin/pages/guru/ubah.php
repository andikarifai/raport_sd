<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);   
session_start();
include_once('../template/header.php');
include_once('../../../function.php');
include_once('../../../koneksi.php');
?>

<?php
if (isset($_POST["submit"])) {
    $id = $_POST['id_guru'];
    $nama = $_POST["nama_guru"];
    $nip = $_POST["nip_guru"];
    $jk = $_POST["jk_guru"];
    $status = $_POST["status_guru"];
    $pgw = $_POST["status_kepegawaian_guru"];


    $editguru = "UPDATE `guru` SET `nama_guru` = '$nama', `nip_guru` = '$nip', `jk_guru` = '$jk', `status_guru` = '$status', `status_kepegawaian_guru` = '$pgw' WHERE `guru`.`id_guru` = '$id'";
    if (mysqli_query($koneksi, $editguru) > 0) {
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
            <h6 class="m-0 font-weight-bold text-primary">Tabel Guru</h6>
        </div>
        <div class="card-body">
            <div class="table">
                <!-- Input Form -->


                <form action="" method="post">

                    <?php

                    $id = decryptId($_GET['id']);
                    $stmt = $koneksi->prepare("SELECT * FROM guru WHERE id_guru = ?");
                    $stmt->bind_param("s", $id);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    while ($data_guru = $result->fetch_assoc()) {
                    

                    ?>
                        <div class="row">
                            <input type="hidden" name="id_guru" value="<?php echo $data_guru["id_guru"]; ?>" class="form-control" id="id">

                            <div class="col-md-4">
                                <label for="nama">Nama Guru</label>
                                <input type="text" name="nama_guru" id="nama_guru" value="<?= $data_guru["nama_guru"]; ?>" class="form-control">
                            </div>
                            <div class="col-md-4">
                                <label for="nip">NIP</label>
                                <input type="text" name="nip_guru" id="nip_guru " value="<?= $data_guru["nip_guru"]; ?>" class="form-control">
                            </div>
                            <div class="col-md-4">
                                <label for="jk_guru">Jenis Kelamin</label>
                                <select name="jk_guru" id="jk_guru" class="form-control">
                                    <option value="L" <?php if ($data_guru["jk_guru"] == "L") echo "selected"; ?>>L</option>
                                    <option value="P" <?php if ($data_guru["jk_guru"] == "P") echo "selected"; ?>>P</option>
                                </select>
                            </div>

                        </div>
                        <div class="row">

                        <div class="col-md-4">
                            <label for="status_guru">Guru Status</label>
                            <select name="status_guru" id="status_guru" class="form-control">
                                <option value="GURU AKTIF" <?php if ($data_guru['status_guru'] == "GURU AKTIF") echo "selected"; ?>>GURU AKTIF</option>
                                <option value="WALI KELAS" <?php if ($data_guru['status_guru'] == "WALI KELAS") echo "selected"; ?>>WALI KELAS</option>
                            </select>
                        </div>
                        

                        <div class="col-md-4">
                            <label for="status_kepegawaian_guru">Status Kepegawaian</label>
                            <select name="status_kepegawaian_guru" id="status_kepegawaian_guru" class="form-control">
                                <option value="PNS" <?php if ($data_guru['status_kepegawaian_guru'] == "PNS") echo "selected"; ?>>PNS</option>
                                <option value="GTT" <?php if ($data_guru['status_kepegawaian_guru'] == "GTT") echo "selected"; ?>>GTT</option>
                            </select>
                        </div>

                        </div>
                        <br><br>
                        <button type="submit" name="submit" id="submit" class="btn btn-primary">Simpan</button>
                        <a href="index.php" class="btn btn-warning">Kembali</a>
                </form>
                <br><br>
            <?php  
                }
                $stmt->close();
            ?>

            </div>
        </div>
    </div>
</div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
</div>

<?php include '../template/footer.php'; ?>