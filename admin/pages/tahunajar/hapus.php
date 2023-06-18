<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
include_once('../template/header.php');
include_once('../../../function.php');
$id = decryptId($_GET['id']);
var_dump($id);
$hapus = "DELETE FROM `tahun_ajar` WHERE `tahun_ajar`.`id_thn_ajar` = '$id' ";
if (mysqli_query($koneksi, $hapus) > 0) {
    echo "<script>
    alert('data berhasil dihapus');
    document.location.href= 'index.php';
    </script>";
}
