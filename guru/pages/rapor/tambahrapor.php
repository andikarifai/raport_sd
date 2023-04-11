<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();

$kls = $_SESSION['kelas'];
include('../template/header.php');


//tangkap data
include_once '../../../koneksi.php';

$namasiswa = $_POST["nama_siswa"];
$nisn = $_POST["nisn"];
$nis = $_POST["nis"];
$kelas = $_POST["nama_kelas"];
$semester = $_POST["id_semester"];
$tahun = $_POST["tahun_ajar"];
$mapel = $_POST["nama_mapel"];
$ekstra = $_POST["ekstra"];


$sakit = $_POST["sakit"];
$izin = $_POST["izin"];
$alfa = $_POST["alfa"];


$ktrg_ekstra = $_POST["ktrg_nekstra"];
$spiritual = $_POST["spiritual"];
$sosial = $_POST["sosial"];
$nilai_pengetahuan = $_POST["nilai_pengetahuan"];

$ket_pengetahuan = $_POST["ket_pengetahuan"];
$nilai_ketrampilan = $_POST["nilai_ketrampilan"];

$ket_ketrampilan = $_POST["ket_ketrampilan"];
$tinggi1 = $_POST["tinggi1"];
$tinggi2 = $_POST["tinggi2"];
$berat1 = $_POST["berat1"];
$berat2 = $_POST["berat2"];
$penglihatan = $_POST["penglihatan"];
$pendengaran = $_POST["pendengaran"];
$gigi = $_POST["gigi"];
$kesenian = $_POST["kesenian"];
$olahraga = $_POST["olahraga"];
$saran = $_POST["saran"];
$keputusan = $_POST["keputusan"];

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
	$values[] = "(NULL,'$namasiswa', '$kelas' , '$semester' , '$tahun' ,' {$datamapel['nama_mapel']}' , '$spiritual' , '$sosial' , '{$nilai_pengetahuan[$index]}' , '{$ket_pengetahuan[$index]}' , '{$nilai_ketrampilan[$index]}', '{$ket_ketrampilan[$index]}' , '$tinggi1' , '$berat1' ,  '$tinggi2' , '$berat2' , '$penglihatan' , '$pendengaran', '$gigi' , '$kesenian' , '$olahraga' , '$saran' , '$ekstra' , '$ktrg_ekstra' , '$sakit' , '$izin' , '$alfa' , '$kd_raport','$keputusan','$nis','$nisn')";
	$index++;
}

$values = implode(",", $values);
$sql = "INSERT INTO nilai (`id_nilai`, `nama_siswa`, `nama_kelas`, `id_semester`, `tahun_ajar`, `nama_mapel`, `spiritual`, `sosial`, `nilai_pengetahuan`, `ket_pengetahuan`, `nilai_ketrampilan`, `ket_ketrampilan`, `tinggi`, `berat`, `tinggi2`, `berat2`, `penglihatan`, `pendengaran`, `gigi`, `kesenian`, `olahraga`, `saran`, `ekstra`, `ktrg_nekstra`, `sakit`, `izin`, `alfa`, `kd_raport`,`keputusan`, `nis`,`nisn`) VALUES $values";

$insert = mysqli_query($koneksi, $sql);
if (!$insert) {
	echo "gagal insert : $insert";
}

//eksekusi hapus row yang nilai 0
// $hapus = mysqli_query($koneksi, $hapusrow);
// hitung dan jumlahkan total nilai
$hitung = "SELECT SUM(nama_mapel) AS totalmapel, SUM(nilai_pengetahuan) AS totalnilai1,SUM(nilai_ketrampilan) AS totalnilai2 FROM nilai WHERE kd_raport ='$kd_raport' GROUP BY kd_raport";
$vhitung = mysqli_query($koneksi, $hitung);
$hasil = mysqli_fetch_assoc($vhitung);
$totalnilai1 = $hasil['totalnilai1'];
$totalnilai2 = $hasil['totalnilai2'];

$totalmapel = $hasil['totalmapel'];
$nmsekolah = "SDN 2 Pringanom";
$alamat = "Pringanom, Kec. Masaran, Kabupaten Sragen, Jawa Tengah Kode Pos : 57282";
$desa = "Prinagnom";
$kec = "Kecamatan Masaran";
$kab = "Kabupaten Sragen";
$prov = "Jawa Tengah";
$kd_pos = "57282";
$no = 1;
$time = date('d F,  Y');

?>
<!-- Tombol download -->
<!-- <div class='alert alert-warning' role='alert'>
	<center> <a href="index.php" class="btn btn-warning">Kembali</a>
	</center>

</div> -->

<!-- Halaman Cover -->
<div class="container text-center mt-5" style="color:black;">
	<div class="text-center">
		<img src="../../../asset/img/logo-tutwuri.png" alt="" width="580" height="400">
	</div>
	<br><br>
	<h1> <strong> RAPOR </strong></h1>
	<br>
	<h1><strong> PESERTA DIDIK</strong></h1>
	<h1><strong> SEKOLAH DASAR</strong></h1>


</div>
<br><br><br>

<!-- Halaman Identitas Cover -->
<div class="container mt-5">
	<table class="table" style="margin-left: 240px;margin: right 230px;max-width: 500px; border-color: black;color:black;font-size:large;">
		<tbody>
			<tr style="border: 2px solid black;">
				<td style=" width: 200px;border: 2px solid black;"><strong>Nama Siswa</strong></td>
				<td style="width: 50px;border: 2px solid black;text-align:center;"><strong>:</strong></td>
				<td style="border: 2px solid black;"><strong><?= $namasiswa ?></strong></td>
			</tr>
			<tr style="border: 2px solid black;">
				<td style=" width: 200px;border: 2px solid black;"><strong>NIS</strong></td>
				<td style="width: 50px;border: 2px solid black;text-align:center;"><strong>:</strong></td>
				<td style="border: 2px solid black;"><strong><?= $nis ?></strong></td>
			</tr>
			<tr style="border: 2px solid black;">
				<td style=" width: 200px;border: 2px solid black;"><strong>NISN</strong></td>
				<td style="width: 50px;border: 2px solid black;text-align:center;"><strong>:</strong></td>
				<td style="border: 2px solid black;"><strong><?= $nisn ?></strong></td>
			</tr>
			<tr style="border: 2px solid black;">
				<td style=" width: 200px;border: 2px solid black;"><strong>Semester</strong></td>
				<td style="width: 50px;border: 2px solid black;text-align:center;"><strong>:</strong></td>
				<td style="border: 2px solid black;"><strong><?= $semester ?></strong></td>
			</tr>
			<tr style="border: 2px solid black;">
				<td style=" width: 200px;border: 2px solid black;"><strong>Kelas</strong></td>
				<td style="width: 50px;border: 2px solid black;text-align:center;"><strong>:</strong></td>
				<td style="border: 2px solid black;"><strong><?= $kelas ?></strong></td>
			</tr>
			<tr style="border: 2px solid black;">
				<td style=" width: 200px;border: 2px solid black;"><strong>Nama Sekolah</strong></td>
				<td style="width: 50px;border: 2px solid black;text-align:center;"><strong>:</strong></td>
				<td style="border: 2px solid black;"><strong><?= $nmsekolah ?></strong></td>
			</tr>
			<!-- <tr style="border: 2px solid black;">
        <td style=" width: 200px;border: 2px solid black;"><strong>Alamat Sekolah</strong></td>
        <td style="width: 50px;border: 2px solid black;"><strong>:</strong></td>
        <td style="border: 2px solid black;"><?= $alamat ?></td>
      </tr> -->
			<tr style="border: 2px solid black;">
				<td style=" width: 200px;border: 2px solid black;"><strong>Tahun Ajar</strong></td>
				<td style="width: 50px;border: 2px solid black;text-align:center;"><strong>:</strong></td>
				<td style="border: 2px solid black;"><strong><?= $tahun ?></strong></td>
			</tr>
		</tbody>
	</table>
</div>
<div style="height: 200px;"></div>
<div class="container text-center mt-5" style="color:black;">

	<h1><strong> KEMENTERIAN PENDIDIKAN DAN KEBUDAYAAN </strong></h1>
	<h1><strong> REPUBLIK INDONESIA</strong></h1>
	<h2><?= $tahun ?></h2>

</div>
<div style="height: 200px;"></div>


<!-- Halaman Identitas Cover -->
<div class="container mt-5" style="color:black;">
	<div class="text-center">

		<h2> <strong> RAPOR </strong></h2>
		<h2><strong> PESERTA DIDIK</strong></h2>
		<h2><strong> SEKOLAH DASAR</strong></h2>
	</div>
	<br><br>
	<table class="table table-bordered" style="margin-left: 150px;margin: right 250px;max-width: 700px;border: none;color:black;">
		<tbody>
			<tr>
				<td style=" width: 200px;"><strong>Nama Sekolah</strong></td>
				<td style="width: 50px;text-align:center;"><strong>:</strong></td>
				<td style=""><?= $nmsekolah ?></td>
			</tr>
			<tr>
				<td style=" width: 200px;"><strong>Alamat Sekolah</strong></td>
				<td style="width: 50px;text-align:center;"><strong>:</strong></td>
				<td style=""><?= $alamat ?></td>
			</tr>
			<tr>
				<td style=" width: 200px;"><strong>Kelurahan/ Desa </strong></td>
				<td style="width: 50px;text-align:center;"><strong>:</strong></td>
				<td><?= $desa ?></td>
			</tr>
			<tr>
				<td style=" width: 200px;"><strong>Kecamatan </strong></td>
				<td style="width: 50px;text-align:center;"><strong>:</strong></td>
				<td><?= $kec ?></td>
			</tr>
			<tr>
				<td style=" width: 200px;"><strong>Kabupaten </strong></td>
				<td style="width: 50px;text-align:center;"><strong>:</strong></td>
				<td><?= $kab ?></td>
			</tr>
			<tr>
				<td style=" width: 200px;"><strong>Provinsi </strong></td>
				<td style="width: 50px;text-align:center;"><strong>:</strong></td>
				<td><?= $prov ?></td>
			</tr>
			<tr>
				<td style=" width: 200px;"><strong>Kode Pos</strong></td>
				<td style="width: 50px;text-align:center;"><strong>:</strong></td>
				<td><?= $kd_pos ?></td>
			</tr>
			<tr>
				<td style=" width: 200px;"><strong>Tahun Ajar</strong></td>
				<td style="width: 50px;text-align:center;"><strong>:</strong></td>
				<td><?= $tahun ?></td>
			</tr>
		</tbody>
	</table>
	<br><br><br>
</div>



<div style="height: 1000px;"></div>

<!-- Halaman Identitas Siswa -->
<div class='container mt-5' style="color:black;">
	<div class=" text-center">
		<h2><strong>Rapor Peseta dan Profil Peserta Didik</strong></h2><br>

		<p style='text-align: left; width:30%; display: inline-block;'>Nama : <?= $namasiswa ?></p>
		<p style='text-align: right; width: 30%;  display: inline-block;'>Semester : <?= $semester ?></p><br>
		<p style='text-align: left; width:30%; display: inline-block;'>NIS : <?= $nis ?></p>
		<p style='text-align: right; width: 30%;  display: inline-block;'>Tahun : <?= $tahun ?></p><br>
		<p style='text-align: left; width:30%; display: inline-block;'>NISN : <?= $nisn ?></p>
		<p style='text-align: right; width: 30%;  display: inline-block;'>Kelas : <?= $kelas ?></p><br>
		<p style='text-align: right; width: 60%;  display: inline-block;'>Kode Raport : <?= $kd_raport ?></p><br><br>
	</div>
</div>

<div class='container'>
	<div class='col-md-3' style='margin-left: 200px;border-color: black;color:black'><br>
		<h5 style="text-align: left;"><strong>A. Sikap </strong></h5>
	</div>

	<br>

	<table class=' tg' style='margin-left: 200px;table-layout: fixed; width: 790px; border-color: black;color:black'>
		<colgroup>
			<col style=' width: 10%'>
			<col style='width: 45%'>
			<col style='width: 55%'>
		</colgroup>

		<tr>


			<th class='tg-c3ow' colspan="3"><strong> Deskripsi</strong>
			</th>


		</tr>
		<tr>
			<td class='tg-baqh'>1</td>
			<td class='tg-c3ow'>Sikap Spriritual</td>
			<td class='tg-baqh'><?= $spiritual ?></td>

		</tr>
		<tr>
			<td class='tg-baqh'> 2 </td>
			<td class='tg-c3ow'>Sikap Sosial</td>
			<td class='tg-baqh'><?= $sosial ?></td>

		</tr>

	</table>
	<br>
</div>
<div class='container'>
	<div class='col-md-3' style='margin-left: 200px;margin-left: 200px;border-color: black;color:black'><br>
		<h5 style="text-align: left;"><strong>B. Pengetahuan dan Keterampilan </strong></h5>
	</div>
	<br>
	<table class=' tg' style='margin-left: 200px;table-layout: fixed; width: 790px; border-color: black;color:black'>
		<colgroup>
			<col style='width: 40px'>
			<col style='width: 80px'>
			<col style='width: 80px'>
			<col style='width: 80px'>

		</colgroup>
		<tr>
			<th class='tg-s268' rowspan="2" style="vertical-align:middle; text-align:center;">No</th>
			<th class='tg-s268' rowspan="2" style="vertical-align:middle; text-align:center;">Mata Pelajaran</th>
			<th class='tg-s268' colspan="3" style="vertical-align:middle; text-align:center;">Nilai Pengetahuan</th>
			<th class='tg-s268' colspan="3" style="vertical-align:middle; text-align:center;">Nilai Ketrampilan</th>

		</tr>
		<tr>
			<!-- <td style="border-top:0px;"> </td>
            <td style="border-top:0px;"> </td> -->
			<th style='width: 80px'>Nilai</th>
			<th style='width: 80px'>Predikat</th>
			<th style='width: 150px'>Keterangan</th>
			<th style='width: 80px'>Nilai</th>
			<th style='width: 80px'>Predikat</th>
			<th style='width: 150px'>Keterangan</th>
		</tr>

		<?php
		//seleksi pemilihan nilai ketika 0 tidak masuk kedatabase
		$seleksi = "SELECT * FROM nilai WHERE kd_raport='$kd_raport'";
		$tampilkan = mysqli_query($koneksi, $seleksi);
		$i = 1;
		while ($select_result = mysqli_fetch_assoc($tampilkan)) {

			$mapels = $select_result["nama_mapel"];
			$nilai1 = $select_result["nilai_pengetahuan"];
			$nilai2 = $select_result["nilai_ketrampilan"];

			$ktrg_ekstra = $select_result["ktrg_nekstra"];
			$ket_pengetahuan = $select_result["ket_pengetahuan"];
			$ket_ketrampilan = $select_result["ket_ketrampilan"];
			$ekstra = $select_result["ekstra"];
			$saran = $select_result["saran"];
			$tinggi1 = $select_result["tinggi"];
			$berat1 = $select_result["berat"];
			$tinggi2 = $select_result["tinggi2"];
			$berat2 = $select_result["berat2"];
			$penglihatan = $select_result["penglihatan"];
			$pendengaran = $select_result["pendengaran"];
			$gigi = $select_result["gigi"];
			$kesenian = $select_result["kesenian"];
			$olahraga = $select_result["olahraga"];
			$keputusan = $select_result["keputusan"];
		?>

			<tr>
				<td class='tg-0lax'><?= $i ?></td>
				<td class='tg-s268'><?= $mapels ?></td>
				<td class='tg-0lax'><?= $nilai1 ?></td>
				<td class='tg-0lax'>
					<?php

					if (isset($nilai1)) {
						$nilai = $nilai1;

						switch ($nilai) {
							case ($nilai >= 80 && $nilai <= 100):
								$predikat = "A";
								break;
							case ($nilai >= 60 && $nilai < 80):
								$predikat = "B";
								break;
							case ($nilai >= 40 && $nilai < 60):
								$predikat = "C";
								break;
							case ($nilai >= 20 && $nilai < 40):
								$predikat = "D";
								break;
							default:
								$predikat = "E";
								break;
						}
					} else {
						$predikat = "Tidak Terdefinisi";
					}
					echo $predikat;

					?>
				</td>
				<td class='tg-s268'><?= $ket_pengetahuan ?></td>
				<td class='tg-0lax'><?= $nilai2 ?></td>
				<td class='tg-0lax'>
					<?php

					if (isset($nilai2)) {
						$nilai = $nilai2;

						switch ($nilai) {
							case ($nilai >= 80 && $nilai <= 100):
								$predikat = "A";
								break;
							case ($nilai >= 60 && $nilai < 80):
								$predikat = "B";
								break;
							case ($nilai >= 40 && $nilai < 60):
								$predikat = "C";
								break;
							case ($nilai >= 20 && $nilai < 40):
								$predikat = "D";
								break;
							default:
								$predikat = "E";
								break;
						}
					} else {
						$predikat = "Tidak Terdefinisi";
					}
					echo $predikat;

					?>
				</td>

				<td class='tg-s268'><?= $ket_ketrampilan ?></td>

			</tr>
		<?php
			$i++;
		} ?>
		<!-- <tr>
        <td colspan='2'>Jumlah Nilai </td>
        <td><?= $totalnilai1 ?></td>
        <td><?= $totalnilai2 ?></td>
        <td><?= $totalnilai3 ?></td>
        <td></td>
      </tr>
      <tr>
        <td colspan='2'>Nilai Rata-rata</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      </tr> -->

		<div class='row'>
	</table>
</div>
<br>
</div>
<?php
$i++;
?>

<div class='container'>
	<div class='col-md-3' style='margin-left: 200px; border-color: black;color:black'><br>
		<h5 style="text-align: left;"><strong>C. Ekstra Kulikuler</strong></h5>
	</div>

	<br>

	<table class='tg' style='margin-left: 200px;table-layout: fixed; width: 790px;border-color: black;color:black'>
		<colgroup>
			<col style='width: 10%'>
			<col style='width: 45%'>
			<col style='width: 45%'>
		</colgroup>
		<tr>
			<th class='tg-baqh'>No</th>
			<th class='tg-c3ow'>Jenis Pengembangan Diri</th>

			<th class='tg-baqh'>Keterangan</th>
		</tr>
		<tr>
			<?php
			$j = 0;
			$j++;
			?>
			<td class='tg-baqh'> <?= $j ?></td>
			<td class='tg-baqh'><?= $ekstra ?></td>

			<td class='tg-baqh'><?= $ktrg_ekstra ?></td>
		</tr>

	</table>
	<br>
</div>

<div class='container'>
	<div class='col-md-3' style='margin-left: 200px;border-color: black;color:black'><br>
		<h5 style="text-align: left;"><strong>D. Saran- saran</strong></h5>
	</div>

	<br>

	<table class='tg' style='margin-left: 200px;table-layout: fixed; width: 790px;height:auto; border-color: black;color:black'>

		<tr>
			<th class='tg-baqh'>Saran</th>
		</tr>
		<tr>
			<td class='tg-textarea'><?= $saran ?></td>
		</tr>

	</table>
	<br>
</div>


<div class='container'>
	<div class='col-md-3' style='margin-left: 200px; border-color: black;color:black'><br>
		<h5 style="text-align: left;"><strong>E. Tinggi dan Berat Badan</strong></h5>
	</div>

	<br>

	<table class='tg' style='margin-left: 200px;table-layout: fixed; width: 790px; border-color: black;color:black'>
		<colgroup>
			<col style=' width: 10%'>
			<col style='width: 40%'>
			<col style='width: 25%'>
			<col style='width: 25%'>
		</colgroup>
		<tr>
		<tr>
			<th class='tg-s268' rowspan="2" style="vertical-align:middle; text-align:center;">No</th>
			<th class='tg-s268' rowspan="2" style="vertical-align:middle; text-align:center;">Aspek yang Dinilai</th>
			<th class='tg-s268' colspan="2" style="vertical-align:middle; text-align:center;">Semester</th>

		</tr>
		<tr>
			<th style='width: 20px ; text-align:center;'>1</th>
			<th style='width: 20px ; text-align:center;'>2</th>

		</tr>
		<tr>

			<td class='tg-baqh'> 1</td>
			<td class='tg-c3ow'>Tinggi Badan ( cm )</td>

			<td class='tg-baqh'><?= $tinggi1 ?></td>
			<td class='tg-baqh'><?= $tinggi2 ?></td>

		</tr>
		<tr>
			<td class='tg-baqh'> 2</td>
			<td class='tg-baqh'>Berat ( kg ) </td>
			<td class='tg-baqh'><?= $berat1 ?></td>
			<td class='tg-baqh'><?= $berat2 ?></td>
		</tr>

	</table>
	<br>

</div>



<div class='container'>
	<div class='col-md-3' style='margin-left: 200px;border-color: black;color:black'><br>
		<h5 style="text-align: left;"><strong>F. Kondisi Kesehatan</strong></h5>
	</div>

	<br>

	<table class=' tg' style='margin-left: 200px;table-layout: fixed; width: 790px; border-color: black;color:black'>
		<colgroup>
			<col style=' width: 10%'>
			<col style='width: 45%'>
			<col style='width: 55%'>
		</colgroup>

		<tr>
			<th class='tg-baqh'>No</th>
			<th class='tg-c3ow'>Aspek Fisik</th>
			<th class='tg-c3ow'>Keterangan</th>


		</tr>
		<tr>
			<td class='tg-baqh'> 1</td>
			<td class='tg-c3ow'>Pendengaran</td>
			<td class='tg-baqh'><?= $pendengaran ?></td>

		</tr>
		<tr>
			<td class='tg-baqh'> 2</td>
			<td class='tg-c3ow'>Penglihatan</td>
			<td class='tg-baqh'><?= $penglihatan ?></td>

		</tr>
		<tr>
			<td class='tg-baqh'> 3 </td>
			<td class='tg-c3ow'>Gigi</td>
			<td class='tg-baqh'><?= $gigi ?></td>
		</tr>
	</table>
	<br>

</div>

<div class='container'>
	<div class='col-md-3' style='margin-left: 200px;border-color: black;color:black'><br>
		<h5 style="text-align: left;"><strong>G. Prestasi</strong></h5>
	</div>

	<br>

	<table class=' tg' style='margin-left: 200px;table-layout: fixed; width: 790px; border-color: black;color:black'>
		<colgroup>
			<col style=' width: 10%'>
			<col style='width: 45%'>
			<col style='width: 55%'>
		</colgroup>

		<tr>
			<th class='tg-baqh'>No</th>
			<th class='tg-c3ow'>Jenis Prestasi</th>
			<th class='tg-c3ow'>Keterangan</th>


		</tr>
		<tr>
			<td class='tg-baqh'>1</td>
			<td class='tg-c3ow'>Kesenian</td>
			<td class='tg-baqh'><?= $kesenian ?></td>

		</tr>
		<tr>
			<td class='tg-baqh'> 2 </td>
			<td class='tg-c3ow'>Olahraga</td>
			<td class='tg-baqh'><?= $olahraga ?></td>

		</tr>

	</table>
	<br>
</div>



<div class='container ' style="width:100%">
	<div class='col-md-3' style='margin-left: 200px;margin-left: 200px;border-color: black;color:black;width:50%'><br>
		<h5 style="text-align: left;"><strong>H. Ketidakhadiran</strong></h5>
	</div>

	<style type='text/css'>
		.tg {
			border-collapse: collapse;
			border-spacing: 0;
		}

		.tg td {
			font-family: Arial, sans-serif;
			font-size: 14px;
			padding: 10px 5px;
			border-style: solid;
			border-width: 1px;
			overflow: hidden;
			word-break: normal;
			border-color: black;
		}

		.tg th {
			font-family: Arial, sans-serif;
			font-size: 14px;
			font-weight: normal;
			padding: 10px 5px;
			border-style: solid;
			border-width: 1px;
			overflow: hidden;
			word-break: normal;
			border-color: black;
		}

		.tg .tg-baqh {
			text-align: center;
			vertical-align: top
		}

		.tg .tg-c3ow {
			border-color: inherit;
			text-align: center;
			vertical-align: top
		}
	</style>
	<br>
	<table class='tg' style='margin-left: 200px;table-layout: fixed; width: 50%; height: 150px;border-color: black;color:black'>
		<colgroup>
			<col style='width: 50px'>
			<col style='width: 200px'>
			<col style='width: 100px'>
		</colgroup>
		<tr>
			<th class='tg-c3ow'>No</th>
			<th class='tg-c3ow'>Alasan Ketidakhadiran</th>
			<th class='tg-baqh'>Keterangan</th>
		</tr>
		<tr>
			<td class='tg-baqh'>1</td>
			<td class='tg-baqh'>Sakit</td>
			<td class='tg-baqh'> <?= $sakit ?></td>

		</tr>
		<tr>
			<td class='tg-baqh'>2</td>
			<td class='tg-baqh'>Izin</td>
			<td class='tg-baqh'><?= $izin ?></td>

		</tr>
		<tr>
			<td class='tg-baqh'>3</td>
			<td class='tg-baqh'>Tanpa Keterangan</td>
			<td class='tg-baqh'><?= $alfa ?></td>

		</tr>
	</table>
	<br>

	<?php

	//   mengambil data kelas peserta didik dari database
	$sql = "SELECT nama_kelas FROM siswa where nis = $nis";
	$result = mysqli_query($koneksi, $sql);
	$row = mysqli_fetch_assoc($result);
	$kelas_sebelumnya = $row['nama_kelas'];

	// menentukan nilai kelas baru
	if ($keputusan == "Naik") {
		// jika naik kelas, tambahkan 1 pada kelas sebelumnya
		$kelas_baru = $kelas_sebelumnya + 1;
	} else {
		// jika tinggal kelas, kelas baru tetap sama dengan kelas sebelumnya
		$kelas_baru = $kelas_sebelumnya;
	}

	// $update = "UPDATE siswa SET nama_kelas = '$kelas_baru' WHERE nama_siswa = '$namasiswa'";
	// mysqli_query($koneksi, $update);

	// $join = "SELECT siswa.*, nilai.* FROM siswa JOIN nilai ON siswa.nama_kelas = nilai.nama_kelas";
	// mysqli_query($koneksi, $join);
	// menampilkan pilihan keputusan dan kelas baru pada form
	if ($semester == 2) {
	?>
		<table class='tg' style='margin-left: 200px;table-layout: fixed; width: 70%; height: 150px;border-color: black;color:black'>

			<tr>
				<td>
					<h6> <strong> Berdasar pencapaian seluruh kompetensi peserta didik dinyatakan : <?= $keputusan ?> kelas <?= $kelas_baru ?></strong></h6>


				</td>
			</tr>
		</table>
</div>
<?php
	}
?>
<div class='container'>


</div>


<?php

$cari = "SELECT * FROM kelas WHERE nama_kelas='$kls'";
$tmp = mysqli_query($koneksi, $cari);
while ($select_hasil = mysqli_fetch_assoc($tmp)) {
	$nama_guru = $select_hasil['nama_wali_kelas'];
	$nip = $select_hasil['nip_guru'];
?>
	<div style="height: 50px;color:black"></div>
	<table style="width:100%;color:black">
		<tr>
			<td style="width:50%; text-align:center">
				Mengetahui,<br>
				Orang Tua/Wali Murid<br>
				<br>
				<br>
				<br>
				(..............................................)
			</td>
			<td style="width:50%; text-align:center">
				Sragen, <?= $time ?><br>
				Wali Kelas<br>
				<br>
				<br>
				<br>
				<?= $nama_guru ?> <br>
				NIP. <?= $nip  ?>
			</td>
		</tr>
	</table>

	<?php
}

$nama_kepala = "SELECT * FROM profil";
$tmp = mysqli_query($koneksi, $nama_kepala);
while ($hsl = mysqli_fetch_assoc($tmp)) {
	$nama_kepala = $hsl['nama_kepsek'];
	$nip_kepala = $hsl['nip_kepsek'];

	if ($semester == 2) {
	?>
		<table style="width:100%; color:black ">
			<tr>
				<td style="width:100%; text-align:center">
					Mengetahui,<br>
					Kepala Sekolah<br>
					<br>
					<br>
					<br>
					<?= $nama_kepala ?> <br>
					NIP. <?= $nip_kepala ?>
				</td>
			</tr>
		</table>
<?php
	}
}
?>





<!-- Bootstrap core JavaScript-->
<script src="../../../asset/vendor/jquery/jquery.min.js"></script>
<script src="../../../asset/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="../../../asset/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="../../../asset/js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="../../../asset/vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<script src="../../../asset/js/demo/chart-area-demo.js"></script>
<script src="../../../asset/js/demo/chart-pie-demo.js"></script>
<script type="text/javascript">
	window.onbeforeprint = function() {
		document.getElementById("tombolCetak").style.display = "none";
	}
	window.onafterprint = function() {
		document.getElementById("tombolCetak").style.display = "block";
	}
</script>