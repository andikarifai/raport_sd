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
    $nama = $row['B'];
    $nip = $row['C'];
    $jk = $row['D'];
    $status = $row['E'];
    $pgw = $row['F'];

    $tambahguru = "INSERT INTO `guru`(`id_guru`, `nama_guru`, `nip_guru`, `jk_guru`, `status_guru`, `status_kepegawaian_guru`) VALUES (NULL, '$nama', '$nip', '$jk', '$status', '$pgw')";
}

//menampilkan pesan sukses
echo "Data siswa berhasil diimport!";

//menutup koneksi ke database
mysqli_close($koneksi);
