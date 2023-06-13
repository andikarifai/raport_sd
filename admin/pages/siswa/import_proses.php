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
    $nama = $row['B'];
    $jk = $row['C'];
    $nis = $row['E'];
    $nisn = $row['D'];
    $tmplahir = $row['F'];
    $tgllhr = $row['G'];
    $agama = $row['H'];
    $alamat = $row['I'];
    $nmayah = $row['J'];
    $nmibu = $row['K'];
    $krjayah = $row['L'];
    $krjibu = $row['M'];
    $nmkelas = $row['N'];
    $import = "INSERT INTO `siswa` (`id_siswa`, `nama_siswa`, `jenis_kelamin`,  `nidn`, `nisn`, `tempat_lahir_siswa`, `tanggal_lahir_siswa`, `agama_siswa`, `alamat_siswa`, `nama_ayah`, `nama_ibu`, `kerja_ayah`, `kerja_ibu`, `nama_kelas`) VALUES (NULL, '$nama', '$jk', '$nis', '$nisn', '$tmplahir', '$tgllhr', '$agama', '$alamat', '$nmayah', '$nmibu', '$krjayah', '$krjibu', '$nmkelas')";
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
