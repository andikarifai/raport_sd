<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
include_once('../template/header.php');
include_once('../../../koneksi.php');

if (isset($_POST["submit"])) {
    $id = $_POST["id"];
    $user = $_POST["username"];
    $pw = md5($_POST["password"]);
    $nama = $_POST["nama"];
    $lvl = $_POST["level"];
    $kls = $_POST["kelas"];
    $ni = $_POST["no_induk"];


    $ubahuser = "UPDATE `users` SET `username` = '$user', `password` = '$pw', `nama` = '$nama', `level` = '$lvl', `kelas` = '$kls', `no_induk` = $ni WHERE `users`.`id_user` = $id";
    if (mysqli_query($koneksi, $ubahuser) > 0) {
        echo "<script>
 alert('data berhasil diupdate');
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
            <h6 class="m-0 font-weight-bold text">Edit User</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <?php
                $id = $_GET["id"];
                $user = mysqli_query($koneksi, "SELECT * FROM users WHERE id_user =$id");
                while ($tampil_user = mysqli_fetch_assoc($user)) {


                    // tombol cari diklik maka ditimpa



                ?>
                    <!-- Input Form -->
                    <form action="" method="post">
                        <input type="hidden" name="id" value="<?= $id; ?>">
                        <div class="row">
                            <div class="col-lg">
                                <label for="nama">Username
                                    <input type="text" name="username" id="username" value="<?= $tampil_user['username'] ?>" class="form-control">
                                </label>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-lg">
                                <label for="nama">Password
                                    <input type="password" name="password" id="password" value="" class="form-control">
                                </label>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg">
                                <label for="nama">Nama
                                    <input type="text" name="nama" id="nama" value="<?= $tampil_user['nama'] ?>" class="form-control">
                                </label>

                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg">
                                <label for="nama">Level
                                    <select name="level" id="level" class="form-control" value="<?= $tampil_user['level'] ?>">
                                        <option value="" selected disabled>--Pilih--</option>
                                        <option value="1">Admin</option>
                                        <option value="2">Guru</option>
                                        <option value="3">Siswa</option>

                                    </select>
                                </label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg">
                                <label for="kelas">Kelas (jika Wali Kelas kelas yang diampu)
                                <input type="text" name="kelas" id="kelas" value="<?= $tampil_user['kelas'] ?>" class="form-control">
                                </label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg">
                                <label for="kelas">NIP/NIS
                                <input type="text" name="no_induk" id="no_induk" value="<?= $tampil_user['no_induk'] ?>" class="form-control">
                                </label>
                            </div>
                        </div>

                        <br><br>
                        <button type="submit" name="submit" id="submit" class="btn btn-success">Simpan</button>
                        <a href="index.php" class="btn btn-warning">Kembali</a>
                    </form>
                    <br><br>
            </div>
        </div>
    </div>
</div>


<!-- End of Main Content -->
<?php } ?>

<?php include '../template/footer.php' ?>