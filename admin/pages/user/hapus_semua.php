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

// Periksa apakah pengguna adalah admin level 1
if ($_SESSION['level'] != "admin") {
    echo "<script>
        alert('Anda tidak memiliki izin untuk mengakses halaman ini');
        document.location.href= 'index.php';
    </script>";
} else {
    // Hapus semua data kecuali admin level 1
    $hapusData = "DELETE FROM users WHERE level != 1"; 
    $result = mysqli_query($koneksi, $hapusData);

    // Periksa apakah penghapusan berhasil
    if ($result) {
        echo "<script>
            alert('Semua data selain admin berhasil dihapus');
            document.location.href= 'index.php';
        </script>";
    } else {
        echo "<script>
            alert('Gagal menghapus data');
            document.location.href= 'index.php';
        </script>";
    }
}
