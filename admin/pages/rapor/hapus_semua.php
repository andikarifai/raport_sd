<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
if (empty($_SESSION)) {
    echo "<script>
 alert('Anda Harus Login dahulu');
 document.location.href= '../../index.php';
 </script>";
}

include_once('../template/header.php');
include_once('../../../function.php');

if (isset($_GET['kls'])) {
    $klas = $_GET['kls'];
    var_dump($klas);
}

// Periksa apakah parameter hapus_semua ada dalam URL
if (isset($_GET['hapus_semua']) && $_GET['hapus_semua'] == 1) {
    // Kueri SQL untuk menghapus semua data siswa
    $kueriHapus = "DELETE FROM nilai WHERE nama_kelas='$klas' ";
    $resultHapus = mysqli_query($koneksi, $kueriHapus);

    // Periksa apakah penghapusan berhasil
    if ($resultHapus) {
        echo "<script>
        alert('Semua data siswa berhasil dihapus');
        document.location.href= 'index.php?kls=" . urlencode($klas) . "';
        </script>";
        exit; // Tambahkan exit setelah melakukan redirect
    } else {
        echo "<script>
        alert('Gagal menghapus data siswa');
        document.location.href= 'index.php?kls=" . urlencode($klas) . "';
        </script>";
        exit; // Tambahkan exit setelah melakukan redirect
    }
} else {
    echo "<script>
    alert('Kelas tidak ditemukan');
    document.location.href= 'index.php';
    </script>";
    exit; // Tambahkan exit setelah melakukan redirect
}

?>
