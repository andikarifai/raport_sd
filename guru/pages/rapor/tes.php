<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
include('../template/header.php');


//tangkap data
$koneksi = mysqli_connect('localhost', 'root', '', 'raport_sd');
$namasiswa = $_POST["nama_siswa"];
$nisn = $_POST["nisn"];
$kelas = $_POST["nama_kelas"];
$semester = $_POST["id_semester"];
$tahun = $_POST["tahun_ajar"];
$mapel = $_POST["nama_mapel"];
$ekstra = $_POST["ekstra"];
$nekstra = $_POST["nilai_ekstra"];
$k1 = $_POST["nilai_ki1"];
$k2 = $_POST["nilai_ki2"];
$k3 = $_POST["nilai_ki3"];
$sakit = $_POST["sakit"];
$izin = $_POST["izin"];
$alfa = $_POST["alfa"];
$ktrg = $_POST["keterangan"];
$ktrg_ekstra = $_POST["ktrg_nekstra"];
$spiritual = $_POST["spriritual"];
$sosial = $_POST["sosial"];
$nilai_pengetahuan = $_POST["nilai_pengetahuan"];
$pred_pengetahuan = $_POST["pred_pengetahuan"];
$ket_pengetahuan = $_POST["ket_pengetahuan"];
$ket_pengetahuan = $_POST["nilai_ketrampilan"];
$pred_ketrampilan = $_POST["pred_ketrampilan"];
$ket_ketrampilan = $_POST["ket_ketrampilan"];
$tinggi = $_POST["tinggi"];
$berat = $_POST["berat"];
$penglihatan = $_POST["penglihatan"];
$pendengaran = $_POST["gigi"];
$kesenian = $_POST["kesenian"];
$olahraga = $_POST["olahraga"];
$saran = $_POST["saran"];

//cek apakah data mapel kosong
// if (empty($mapel[1])) {
// 	echo "Data mapel kedua tidak boleh kosong.";
// 	exit;
// }
$kd_raport = mt_rand(1000, 2000);

$sql_mapel = mysqli_query($koneksi, "SELECT * FROM mata_pelajaran ORDER BY nama_mapel") or die(mysqli_error($koneksi));
$values = array();
$index = 0;
while ($datamapel = mysqli_fetch_assoc($sql_mapel)) {
	$values[] = "(NULL,'$namasiswa', '$nisn','$kelas','$semester','$tahun','{$datamapel['nama_mapel']}', '{$nilai_pengetahuan[$index]}','{$pred_pengetahuan[$index]}','{$ket_pengetahuan[$index]}','{$nilai_ketrampilan[$index]}','{$pred_ketrampilan[$index]}','{$ket_ketrampilan[$index]}','$ktrg','$ekstra','$ktrg_ekstra','$sakit','$izin', '$alfa','$kd_raport','')";
	$index++;
}

$values = implode(",", $values);
$sql = "INSERT INTO nilai (`id_nilai`, `nama_siswa`, `nisn`, `nama_kelas`, `id_semester`, `tahun_ajar`, `nama_mapel`, `spriritual`, `sosial`, `nilai_pengetahuan`, `pred_pengetahuan`, `ket_pengetahuan`, `nilai_ketrampilan`, `pred_ketrampilan`, `ket_ketrampilan`, `tinggi`, `berat`, `penglihatan`, `pendengaran`, `gigi`, `kesenian`, `olahraga`, `saran`, `keterangan`, `ekstra`, `ktrg_nekstra`, `sakit`, `izin`, `alfa`, `kd_raport`, `nis`) VALUES $values";
