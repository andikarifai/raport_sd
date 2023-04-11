<?php
require '../template/header.php';
require '../../../koneksi.php';
// error_reporting(E_ALL);
// ini_set('display_errors', 1);

//mendapatkan file yang di-upload
$file = $_FILES['file']['tmp_name'];
// // beri permisi agar file xls dapat di baca
// chmod($_FILES['file']['name'], 0777);
//membaca file excel dengan library PHPExcel

include('../../../asset/vendor/PHPExcel-1.8/Classes/PHPExcel/IOFactory.php');
$excel = PHPExcel_IOFactory::load($file);

//mendapatkan jumlah sheet pada file excel
$sheets = $excel->getSheetCount();

//mendapatkan nama sheet pertama
$excel->setActiveSheetIndex(0);
$sheet = $excel->getActiveSheet()->toArray(null, true, true, true);

//menyimpan data ke dalam tabel
foreach ($sheet as $rowIndex => $row) {
    if ($rowIndex < 4) {
        continue;
    }
    $nis = $row['B'];
    $nisn = $row['C'];
    $nama = $row['D'];
    $jk = $row['E'];
    $tmplahir = $row['F'];
    $tgllhr = $row['G'];
    $agama = $row['H'];
    $alamat = $row['I'];
    $nmayah = $row['J'];
    $nmibu = $row['K'];
    $krjayah = $row['L'];
    $krjibu = $row['M'];
    $nmkelas = $row['N'];
    mysqli_query($koneksi, "INSERT INTO `siswa` (`id_siswa`, `nama_siswa`, `jenis_kelamin`,  `nis`, `nisn`, `tempat_lahir_siswa`, `tanggal_lahir_siswa`, `agama_siswa`, `alamat_siswa`, `nama_ayah`, `nama_ibu`, `kerja_ayah`, `kerja_ibu`, `nama_kelas`) VALUES (NULL, '$nama', '$jk', '$nis', '$nisn', '$tmplahir', '$tgllhr', '$agama', '$alamat', '$nmayah', '$nmibu', '$krjayah', '$krjibu', '$nmkelas')");
}

//menampilkan pesan sukses
echo "Data siswa berhasil diimport!";

//menutup koneksi ke database
mysqli_close($koneksi);
