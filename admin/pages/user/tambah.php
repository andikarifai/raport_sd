<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
include_once('../template/header.php');
include_once('../../../koneksi.php')
?>

<?php
if (isset($_POST["submit"])) {
    $user = $_POST["username"];
    $pw = md5($_POST["password"]);
    $nama = $_POST["nama"];
    $lvl = $_POST["level"];
    $kls = $_POST["kelas"];
    $ni = $_POST["id_session"];


    $tambahuser = "INSERT INTO users (`id_user`, `username`, `password`, `nama`, `level`, `kelas`, `id_session`, `foto`) VALUES (NULL, '$user', '$pw', '$nama',  '$lvl', '$kls','$ni', '')";

    if (mysqli_query($koneksi, $tambahuser) > 0) {
        echo "<script>
     alert('data berhasil ditambahkan');
     document.location.href= 'index.php';
     </script>";
    } else {
        echo "galat!";
    }
}


?>

<!-- Begin Page Content -->

<div class="container-fluid">

    <!-- Page Heading -->

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tambah User</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <!-- Input Form -->
                <form action="" method="post">
                    <div class="row">
                        <div class="col-lg-5">
                            <label for="username">Username</label>
                            <input type="text" name="username" id="username" value="" class="form-control" required>

                        </div>

                    </div>
                    <div class="row">
                        <div class="col-lg-5">
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password" value="" class="form-control" required>


                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-5">
                            <label for="nama">Nama </label>
                            <input type="text" name="nama" id="nama" value="" class="form-control" required>


                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-5">
                            <label for="level">Level</label>
                            <select name="level" id="level" class="form-control" required>
                                <option value="">--Pilih--</option>
                                <option value="1">Admin</option>
                                <option value="2">Wali Kelas/Guru</option>
                                <option value="3">Siswa</option>
                            </select>

                        </div>
                    </div>
                    <div class="row">
                    <div class="col-lg-5">
                            <div class="form-group">
                                <label for="kode" class="control-label">Kelas / Wali Kelas( Kosongkan jika tidak perlu )</label>
                                <select class="form-control" name="kelas">
                                    <option disabled selected>Pilih Kelas</option>
                                    <?php $sql_kelas = mysqli_query($koneksi, "SELECT * FROM kelas") or die(mysqli_error($koneksi));
                                    while ($datakelas = mysqli_fetch_assoc($sql_kelas)) {
                                        echo '<option value="' . $datakelas["nama_kelas"] . '">' . $datakelas["nama_kelas"]
                                            . '</option>';
                                    }

                                    ?>
                                </select>

                            </div>
                        </div>
                        </div>
                    <div class="row">
                        <div class="col-lg-5">
                            <label for="kelas">ID (nisn/nip/nik) </label>
                            <input type="text" name="id_session" id="no_induk" value="" class="form-control">

                        </div>
                    </div>



                    <br>
                    <button type="submit" name="submit" id="submit" class="btn btn-success">Tambah</button>
                    <a href="index.php" class="btn btn-warning">Kembali</a>
                </form>
                <br><br>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>

<?php include '../template/footer.php' ?>