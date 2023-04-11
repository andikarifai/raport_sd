<?php
require_once '../template/header.php';

session_start();
session_id();

$id = $_SESSION['id'];

// Ambil data user dari database
$user_data = mysqli_query($koneksi, "SELECT * from users where id_user='$id'");
$user = mysqli_fetch_assoc($user_data);

// Cek apakah ada perubahan pada username dan nama
$username = $_POST['username'];
$nama = $_POST['nama'];

if ($username != $user['username'] || $nama != $user['nama']) {
    mysqli_query($koneksi, "UPDATE users SET nama='$nama', username='$username' WHERE id_user='$id'") or die(mysqli_error($koneksi));
}

// Cek apakah ada perubahan pada password
$password = $_POST['password'];
if (!empty($password)) {
    $password = password_hash($password, PASSWORD_DEFAULT);
    mysqli_query($koneksi, "UPDATE users SET password='$password' WHERE id_user='$id'") or die(mysqli_error($koneksi));
}

// Cek apakah ada perubahan pada foto
$filename = $_FILES['foto']['name'];

if (!empty($filename)) {
    $allowed = array('gif', 'png', 'jpg', 'jpeg', 'JPG', 'PNG');
    $ext = pathinfo($filename, PATHINFO_EXTENSION);

    if (in_array($ext, $allowed)) {
        // Hapus file lama
        $nama_file_lama = $user['foto'];
        unlink("../../asset/img/profil/" . $nama_file_lama);

        // Upload file baru
        $rand = rand();
        $nama_file = $rand . '_' . $filename;
        move_uploaded_file($_FILES['foto']['tmp_name'], '../../asset/img/profil/' . $nama_file);

        mysqli_query($koneksi, "UPDATE users SET foto='$nama_file' where id_user='$id'") or die(mysqli_error($koneksi));
    } else {
        header("location:index.php?alert=gagal");
        exit();
    }
}

header("location:index.php?alert=sukses");
