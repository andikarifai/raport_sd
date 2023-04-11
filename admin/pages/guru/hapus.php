<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
include_once('../template/header.php');
include_once('../../../koneksi.php');

$id = $_GET['id'];
$hapus = "DELETE FROM guru WHERE guru.id_guru = $id";
if (mysqli_query($koneksi, $hapus) > 0) {
    echo "<script>
    alert('data berhasil dihapus');
    document.location.href= 'index.php';
    </script>";
} else {
    echo "<script>
    alert('Mohon Maaf Tidak bisa di hapus');
    document.location.href= 'index.php';
    </script>";
}
