<?php
require 'function.php';
session_start();

if ($_SESSION) {
    header("Location: home.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Raport</title>

    <!-- Custom fonts for this template-->
    <link href="asset/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="asset/css/bootstrap.css" rel="stylesheet">

</head>

<body class="bg-gradient-secondary">


    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-lg-6">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <img src="asset/img/logo-sekolah-dasar.png" alt="" width="200" height="160">
                                        <h1 class="h4 text-gray-900 mb-4">Login E-Rapor</h1>
                                    </div>
                                    <?php

                                    if (isset($_POST['login'])) {
                                        include("koneksi.php");

                                        $username    = $_POST['username'];
                                        $password    = md5($_POST['password']);
                                        $level        = $_POST['level'];

                                        $query = mysqli_query($koneksi, "SELECT * FROM users WHERE username='$username' AND password='$password'");
                                        if (mysqli_num_rows($query) == 0) {
                                            echo '<div class="alert alert-danger">Maaf.. Login Salah.</div>';
                                        } else {
                                            $row = mysqli_fetch_assoc($query);

                                            if ($row['level'] == 1 && $level == 1) {
                                                $_SESSION['id'] = $row['id_user'];
                                                $_SESSION['username'] = $username;
                                                $_SESSION['level'] = 'admin';
                                                header("Location: admin/pages/informasi/");
                                            } else if ($row['level'] == 2 && $level == 2) {
                                                // tambahkan informasi kelas sebagai session
                                                $_SESSION['id'] = $row['id_user'];
                                                $_SESSION['username'] = $username;
                                                $_SESSION['level'] = 'guru';
                                                $_SESSION['kelas'] = $row['kelas'];

                                                header("Location: guru/pages/informasi/");
                                            } else if ($row['level'] == 3 && $level == 3) {
                                                $_SESSION['id'] = $row['id_user'];
                                                $_SESSION['username'] = $username;
                                                $_SESSION['level'] = 'siswa';
                                                $_SESSION['kelas'] = $row['kelas'];
                                                $_SESSION['nis'] = $row['id_session'];
                                                header("Location: siswa/pages/informasi/");
                                            } else {
                                                echo '<div class="alert alert-danger">Maaf.. Login Salah.</div>';
                                            }
                                        }
                                    }
                                    ?>

                                    <form action="" method="POST" class="user">


                                        <div class="form-group">
                                            <input type="text" name="username" class="form-control" placeholder="Username" required autofocus />
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <input type="password" name="password" id="pass" class="form-control" placeholder="Password">
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
                                            <select name="level" class="form-control" required>
                                                <option value="" selected disabled>Pilih Level User</option>
                                                <option value="1">Administrator</option>
                                                <option value="2">Guru</option>
                                                <option value="3">Siswa</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" name="login" class="btn btn-primary btn-block" value="Sign In" />
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="asset/vendor/jquery/jquery.min.js"></script>
    <script src="asset/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="asset/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="asset/js/sb-admin-2.min.js"></script>
    <script>
        // membuat fungsi change
        function change() {

            // membuat variabel berisi tipe input dari id='pass', id='pass' adalah form input password 
            var x = document.getElementById('pass').type;

            //membuat if kondisi, jika tipe x adalah password maka jalankan perintah di bawahnya
            if (x == 'password') {

                //ubah form input password menjadi text
                document.getElementById('pass').type = 'text';

                //ubah icon mata terbuka menjadi tertutup
                document.getElementById('mybutton').innerHTML = `<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-eye-slash-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M10.79 12.912l-1.614-1.615a3.5 3.5 0 0 1-4.474-4.474l-2.06-2.06C.938 6.278 0 8 0 8s3 5.5 8 5.5a7.029 7.029 0 0 0 2.79-.588zM5.21 3.088A7.028 7.028 0 0 1 8 2.5c5 0 8 5.5 8 5.5s-.939 1.721-2.641 3.238l-2.062-2.062a3.5 3.5 0 0 0-4.474-4.474L5.21 3.089z"/>
                                                                    <path d="M5.525 7.646a2.5 2.5 0 0 0 2.829 2.829l-2.83-2.829zm4.95.708l-2.829-2.83a2.5 2.5 0 0 1 2.829 2.829z"/>
                                                                    <path fill-rule="evenodd" d="M13.646 14.354l-12-12 .708-.708 12 12-.708.708z"/>
                                                                    </svg>`;
            } else {

                //ubah form input password menjadi text
                document.getElementById('pass').type = 'password';

                //ubah icon mata terbuka menjadi tertutup
                document.getElementById('mybutton').innerHTML = `<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-eye-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                                                                    <path fill-rule="evenodd" d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                                                                    </svg>`;
            }
        }
    </script>

</body>


</html>