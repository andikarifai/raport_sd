<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
include_once('../template/header.php');
include_once('../../../function.php');

$klas = $_GET['kls'];
$id = decryptId($_GET['kd_raport']);
$hapus = "DELETE FROM nilai WHERE kd_raport = $id ";
if (mysqli_query($koneksi, $hapus) > 0) {
    $_SESSION['pesan'] = 'Data berhasil dihapus';
    header("Location: index.php?kls=$klas");
} else {
    echo "gagal";
};
