<?php
session_start();
include_once('../template/header.php');
include_once('../../../function.php');
$id = decryptId($_GET['id']);
$hapus = "DELETE FROM `kelas` WHERE `kelas`.`id_kelas` = $id";
if (mysqli_query($koneksi, $hapus) > 0) {
    echo "<script>
    alert('data berhasil dihapus');
    document.location.href= 'index.php';
    </script>";
}
