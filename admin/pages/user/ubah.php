<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
include_once('../template/header.php');
include_once('../../../koneksi.php');

include_once('../../../function.php');

if (isset($_POST["submit"])) {
    $id = $_POST["id"];
    $user = $_POST["username"];
    $pw = md5($_POST["password"]);
    $nama = $_POST["nama"];
    $lvl = $_POST["level"];
    $kls = $_POST["kelas"];
    $ni = $_POST["id_session"];


    $ubahuser = "UPDATE `users` SET `username` = '$user', `password` = '$pw', `nama` = '$nama', `level` = '$lvl', `kelas` = '$kls', `id_session` = $ni WHERE `users`.`id_user` = $id";
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
        <div class="col-md-6">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" value="<?= $tampil_user['username'] ?>" class="form-control">
            </div>
            <div class="form-group">
                <label>Password</label>
                <div class="input-group">
                    <input type="password" name="password" id="pass" class="form-control">
                    <div class="input-group-append">
                        <span id="mybutton" onclick="change()" class="input-group-text">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-eye-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                                <path fill-rule="evenodd" d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
                            </svg>
                        </span>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" name="nama" id="nama" value="<?= $tampil_user['nama'] ?>" class="form-control">
            </div>
        </div>
    <div class="col-md-6">
<div class="form-group">
        <label for="level">Level</label>
        <select name="level" id="level" class="form-control" required>
            <option value="" disabled>--Pilih--</option>
            <option value="1" <?php if ($tampil_user['level'] == 1) echo 'selected'; ?>>Admin</option>
            <option value="2" <?php if ($tampil_user['level'] == 2) echo 'selected'; ?>>Wali Kelas/Guru</option>
            <option value="3" <?php if ($tampil_user['level'] == 3) echo 'selected'; ?>>Siswa</option>
        </select>
    </div>
            <div class="form-group">
                <label for="kelas">Kelas (jika Wali Kelas kelas yang diampu)</label>
                <input type="text" name="kelas" id="kelas" value="<?= $tampil_user['kelas'] ?>" class="form-control">
            </div>
            <div class="form-group">
                <label for="id_session">NIP/NISN</label>
                <input type="text" name="id_session" id="id_session" value="<?= $tampil_user['id_session'] ?>" class="form-control">
            </div>
        </div>
    </div>
    <br><br>
    <button type="submit" class="btn btn-success" name="submit" id="submit">Update</button>
                        <a href="index.php" class="btn btn-warning">Cancel</a>
                        <div class="clearfix"></div>
                        <br>

                        </form>

                    <br><br>
            </div>
        </div>
    </div>
</div>


<!-- End of Main Content -->
<?php } ?>

<?php include '../template/footer.php' ?>