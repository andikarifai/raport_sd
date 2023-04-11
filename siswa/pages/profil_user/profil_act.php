<?php
require_once '../template/header.php';
session_start();
session_id();

$id = $_SESSION['id'];

$username  = $_POST['username'];
$nama  = $_POST['nama'];
$pw = $_POST['password'];
$rand = rand();

$allowed =  array('gif', 'png', 'jpg', 'jpeg', 'JPG', 'PNG');

$filename = $_FILES['foto']['nama'];

if ($filename == "") {

    mysqli_query($koneksi, "UPDATE users SET nama='$nama', username='$username', `password` = '$password' WHERE id_user='$id'") or die(mysqli_error($koneksi));
    header("location:index.php?alert=sukses");
} else {

    $ext = pathinfo($filename, PATHINFO_EXTENSION);

    if (in_array($ext, $allowed)) {

        // hapus file lama
        $lama = mysqli_query($koneksi, "SELECT * from users where id_user='$id'");
        $l = mysqli_fetch_assoc($lama);
        $nama_file_lama = $l['foto'];
        unlink("../../../asset/img/profil/" . $nama_file_lama);

        // upload file baru
        move_uploaded_file($_FILES['foto']['tmp_name'], '../../../asset/img/profil/' . $rand . '_' . $filename);
        $nama_file = $rand . '_' . $filename;
        mysqli_query($koneksi, "UPDATE users SET nama='$nama', username='$username', foto='$nama_file' where id_user='$id'") or die(mysqli_error($koneksi));
        header("location:index.php?alert=sukses");
    } else {

        header("location:index.php?alert=gagal");
    }
}
