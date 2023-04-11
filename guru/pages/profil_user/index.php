<?php
session_start();
session_id();
if (empty($_SESSION)) {
    echo "<script>
 alert('Anda Harus Login dahulu');
 document.location.href= '../../../index.php';
 </script>";
}
include '../template/header.php';
include_once("../../../koneksi.php");
?>

<?php
if (isset($_POST["submit"])) {
    $id = $_POST["id_user"];
    $user = $_POST["username"];
    $pw = md5($_POST["password"]);
    $nama = $_POST["nama"];

    $foto = $_POST["foto"];

    $ubahuser = "UPDATE `users` SET `username` = '$user', `nama` = '$nama', `password` = '$pw', `foto`='$foto' WHERE `users`.`id_user` = $id
    ";
    if (mysqli_query($koneksi, $ubahuser) > 0) {
        echo "<script>
 alert('data berhasil diupdate');
 document.location.href= 'index.php';
 </script>";
    } else {
        echo "Galat!";
    }
}


?>

<div class="product-sales-area mg-tb-30">
    <div class="container-fluid">
        <div class="row">

            <div class="col-lg-3">
                <form action="" method="post">


                    <?php

                    $id = $_SESSION['id'];

                    $saya = mysqli_query($koneksi, "SELECT * FROM users WHERE id_user= '$id'");

                    while ($sy  = mysqli_fetch_assoc($saya)) {

                    ?>
                        <div class="single-cards-item">
                            <!-- <div class="single-product-image">
                                <a href="#">

                                    <img src="../assets/img/profile-bg.jpg" alt="">
                                </a>
                            </div> -->

                            <div class="single-product-text text-center">
                                <?php
                                if ($sy['foto'] == "") {
                                ?>
                                    <img class="img-user" src="../../../asset/img/sistem/user.png" width="150px">
                                <?php
                                } else {
                                ?>

                                    <img class="img-user" src="../../../asset/img/profil/<?= $sy['foto']; ?> " width="150px">
                                <?php
                                }
                                ?>
                                <div class="single-product-text text-center">
                                    <h4><a class="cards-hd-dn" href="#"><?php echo $sy['nama']; ?></a></h4>
                                    <h5>Guru</h5>
                                    <p class="ctn-cards">Sistem informasi E Rapor.</p>
                                </div>
                            </div>
                        </div>

            </div>

            <div class="col-lg-6">

                <?php
                        if (isset($_GET['alert'])) {
                            if ($_GET['alert'] == "sukses") {
                                echo "<div class='alert alert-success'>Password anda berhasil diganti!</div>";
                            } else {
                                echo "<div class='alert alert-success'>Password anda gagal diganti!</div>";
                            }
                        }
                ?>

                <div class="panel">
                    <div class="panel-heading">
                        <h4>Data Diri</h4>
                    </div>
                    <div class="panel-body">

                        <form action="profil_act.php?id=<?= $_SESSION["id"]; ?>" method="post" enctype="multipart/form-data">

                            <input type="hidden" name="id_user" value="<?php echo $sy["id_user"]; ?>" class="form-control" id="id">
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" class="form-control" placeholder="Masukkan Nama .." name="nama" required="required" value="<?php echo $sy['nama'] ?>">
                            </div>

                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" class="form-control" placeholder="Masukkan Username .." name="username" required="required" value="<?php echo $sy['username'] ?>">
                            </div>
                            <div class="form-group">
                                  <label for="password">Password</label>
                                <div class="input-group">
                                    <input type="password" name="password" id="pass" class="form-control">
                                    <div class="input-group-append">

                                        <!-- kita pasang onclick untuk merubah icon buka/tutup mata setiap diklik  -->
                                        <span id="mybutton" onclick="change()" class="input-group-text">

                                            <!-- icon mata bawaan bootstrap  -->
                                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-eye-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                                                <path fill-rule="evenodd" d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
                                            </svg>
                                        </span>
                                    </div>
                                </div>
                            </div>




                            <div class="form-group">
                                <label>Foto</label>
                                <input type="file" name="foto">
                                <small>Kosongkan jika tidak ingin mengubah foto.</small>
                            </div>

                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" value="Simpan" name="submit" id="submit">
                            </div>


                        </form>

                    </div>
                </div>

            </div>

        <?php } ?>

        </div>
    </div>
</div>
</form>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Footer -->
<!-- <footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; SDN 2 Pringanom </span>
        </div>
    </div>
</footer> -->
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>


<?php include '../template/footer.php'; ?>