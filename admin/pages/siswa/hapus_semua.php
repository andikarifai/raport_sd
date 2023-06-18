<?php
session_start();
if (empty($_SESSION)) {
    echo "<script>
 alert('Anda Harus Login dahulu');
 document.location.href= '../../index.php';
 </script>";
}

include_once('../template/header.php');
include_once('../../../function.php');


// Periksa apakah parameter hapus_semua ada dalam URL
if (isset($_GET['hapus_semua']) && $_GET['hapus_semua'] == 1) {
    // Kueri SQL untuk menghapus semua data siswa
    $kueriHapus = "DELETE FROM siswa";
    $resultHapus = mysqli_query($koneksi, $kueriHapus);

    // Periksa apakah penghapusan berhasil
    if ($resultHapus) {
        echo "<script>
     alert('Semua data siswa berhasil dihapus');
     document.location.href= 'index.php';
     </script>";
    } else {
        echo "<script>
     alert('Gagal menghapus data siswa');
     document.location.href= 'index.php';
     </script>";
    }
} else {
    echo "<script>
 alert('Akses tidak valid');
 document.location.href= 'index.php';
 </script>";
}
?>
