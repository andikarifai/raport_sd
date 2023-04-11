<?php

$kd_raport = decryptId($_GET["kd_raport"]);
//detail nilai
$detail = "SELECT id_nilai,nama_siswa,nisn,nama_kelas,id_semester,tahun_ajar,nama_mapel,SUM(nilai_umum) AS totalnilai,nilai_huruf,ekstra,nilai_ekstra,sakit,izin,alfa,akhlak,kepribadian,ket,kd_raport FROM nilai WHERE kd_raport='$kd_raport' GROUP BY kd_raport";
$show = mysqli_query($koneksi, $detail);
//tampung semua data 
$shows = mysqli_fetch_assoc($show);
$nama =  $shows["nama_siswa"];
$nisn =   $shows["nisn"];
$kelas = $shows["nama_kelas"];
$semester = $shows["id_semester"];
$tahun = $shows["tahun_ajar"];
$mapel = $shows["nama_mapel"];
$total = $shows["totalnilai"];
$huruf = $shows["nilai_huruf"];
$ekstra = $shows["ekstra"];
$nekstra = $shows["nilai_ekstra"];
$sakit =  $shows["sakit"];
$izin =  $shows["izin"];
$alfa =  $shows["alfa"];
$akhlak =  $shows["akhlak"];
$pribadi =  $shows["kepribadian"];
$ket =  $shows["ket"];
$kd_raport =  $shows["kd_raport"];
$nmsekolah = "SDN 2 Pringanom";
$alamat = "Dusun II, Pringanom, Kec. Masaran, Kabupaten Sragen, Jawa Tengah 57282";
$no = 1;
$time = date('Y');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    $koneksi = mysqli_connect('localhost', 'root', '', 'raport_sd');
    include_once('../../../function.php');
    ?>




    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>E-Rapor </title>

    <!-- Custom fonts for this template-->
    <link href="../../../asset/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../../../asset/css/bootstrap.css" rel="stylesheet">

</head>
<title>Cover Rapor</title>
<style>
    .cover {
        text-align: center;
        margin-top: 50px;
    }

    .sekolah-info {
        font-size: 20px;
        margin-top: 20px;
    }
</style>
</head>

<body>

    <div class="cover">
        <h2>Rapor</h2>
        <p class="sekolah-info">
            Nama Sekolah: <?php echo $nama_sekolah; ?><br>
            Alamat: <?php echo $alamat_sekolah; ?><br>
            Telp: <?php echo $telp_sekolah; ?><br>
            Email: <?php echo $email_sekolah; ?><br>
        </p>
    </div>

    <!-- Tampilkan informasi lainnya sesuai kebutuhan -->
    <div class="identitas-siswa">
        <h2>Identitas Siswa</h2>
        <table>
            <tr>
                <td>Nama Lengkap</td>
                <td>:</td>
                <td><?php echo $nama_siswa; ?></td>
            </tr>
            <tr>
                <td>NISN</td>
                <td>:</td>
                <td><?php echo $nisn; ?></td>
            </tr>
            <tr>
                <td>Kelas</td>
                <td>:</td>
                <td><?php echo $nama_kelas; ?></td>
            </tr>
            <tr>
                <td>Semester</td>
                <td>:</td>
                <td><?php echo $semester; ?></td>
            </tr>
            <tr>
                <td>Tahun Ajar</td>
                <td>:</td>
                <td><?php echo $tahun_ajar; ?></td>
            </tr>
        </table>
    </div>

</body>

</html>