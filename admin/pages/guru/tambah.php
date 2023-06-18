<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
include_once('../template/header.php');
include_once('../../../koneksi.php')
?>

<?php
if (isset($_POST["submit"])) {
    $nama = $_POST["nama_guru"];
    $nip = $_POST["nip_guru"];
    $jk = $_POST["jk_guru"];
    $status = $_POST["status_guru"];
    $pgw = $_POST["status_kepegawaian_guru"];

    $tambahguru = "INSERT INTO `guru`(`id_guru`, `nama_guru`, `nip_guru`, `jk_guru`, `status_guru`, `status_kepegawaian_guru`) VALUES (NULL, '$nama', '$nip', '$jk', '$status', '$pgw')";
    if (mysqli_query($koneksi, $tambahguru) > 0) {
        echo "<script>
 alert('data berhasil ditambahkan');
 document.location.href= 'index.php';
 </script>";
    } else {
        echo "gagal menambahkan!";
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
                    <div class="row">
                        <div class="col-md-4">
                            <label for="nama">Nama Guru</label>
                            <input type="text" name="nama_guru" id="nama_guru" value="" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label for="nip">NIP</label>
                            <input type="text" name="nip_guru" id="nip_guru" value="" class="form-control">
                        </div>
                        <div class="col-md-2">
                            <label for="jk">Jenis Kelamin</label>
                            <select name="jk_guru" id="jk_guru" class="form-control">
                                <option value="L" class="form-control">L</option>
                                <option value="P" class="form-control">P</option>

                            </select>
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-md-4">
                            <label for="status">Guru Status</label>
                            <select name="status_guru" id="status_guru" class="form-control">
                                <option value="GURU AKTIF" class="form-control">GURU AKTIF</option>
                                <option value="WALI KELAS" class="form-control">WALI KELAS</option>

                            </select>
                        </div>
                       
                        <div class="col-md-4">
                            <label for="pgw">Status Kepegawaian</label>
                            <select name="status_kepegawaian_guru" id="status_kepegawaian_guru" class="form-control">
                                <option value="PNS" class="form-control">PNS</option>
                                <option value="GTT" class="form-control">GTT</option>

                            </select>
                        </div>
                    </div>
                    <br><br>
                    <button type="submit" name="submit" id="submit" class="btn btn-success">Tambah</button>
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