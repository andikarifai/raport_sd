<?php
require '../template/header.php';
require '../../../koneksi.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once "../../../asset/vendor/vendor/autoload.php";

use PhpOffice\PhpSpreadsheet\IOFactory;

// Mendapatkan file yang di-upload
$file = $_FILES['file']['tmp_name'];

// Membaca file Excel
$excel = IOFactory::load($file);

// Mendapatkan jumlah sheet pada file Excel
$sheets = $excel->getSheetCount();

// Mendapatkan nama sheet pertama
$excel->setActiveSheetIndex(0);
$sheet = $excel->getActiveSheet()->toArray(null, true, true, true);

// Menyimpan data ke dalam tabel
foreach ($sheet as $rowIndex => $row) {
    if ($rowIndex < 6) {
        continue;
    }
    $lvl = 3 ;
    $nama = $row['B'];
    $nisn = md5($row['D']);
    $nidn = $row['D'];
    $kls = $row['N'];
    $import = "INSERT INTO users (`id_user`, `username`, `password`, `nama`, `level`, `kelas`, `id_session`, `foto`) VALUES (NULL, '$nama', '$nisn', '$nama',  '$lvl', '$kls', $nidn, '')";
    if (mysqli_query($koneksi, $import) > 0) {
        echo "<script>
    alert('data berhasil ditambahkan');
    document.location.href= 'index.php';
    </script>";
    } else {
        echo "gagal!";
    }
}


// Menutup koneksi ke database
mysqli_close($koneksi);
