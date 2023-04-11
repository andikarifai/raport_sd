<?php
session_start();
header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=namafile.xls");
include_once("../../../koneksi.php");
$kelas = $_SESSION['kelas'];
$murid = mysqli_query($koneksi, "SELECT * FROM siswa where nama_kelas = '$kelas'");
?>
<style>
    #customers {
        font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    #customers td,
    #customers th {
        border: 1px solid #ddd;
        padding: 8px;
    }

    #customers tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    #customers tr:hover {
        background-color: #ddd;
    }

    #customers th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: #4CAF50;
        color: white;
    }
</style>




<!-- Begin Page Content -->

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Daftar Siswa SDN Pringanom 2</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table border="1" id="customers">
                    <thead>
                        <tr border="1">
                            <th>No</th>
                            <th>NIS</th>
                            <th>NISN</th>
                            <th>Nama</th>
                            <th>Tempat Lahir</th>
                            <th>Tanggal Lahir</th>
                            <th>Agama</th>
                            <th>Alamat</th>
                            <th>Nama Ayah</th>
                            <th>Nama Ibu</th>
                            <th>Pekerjaan Ayah</th>
                            <th>Pekerjaaan Ibu</th>
                            <th>Kelas</th>


                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php
                        while ($tampil = mysqli_fetch_assoc($murid)) :
                        ?>
                            <tr border="1">
                                <td><?= $i++; ?></td>
                                <td><?= $tampil["nis"]; ?></td>
                                <td><?= $tampil["nisn"]; ?></td>
                                <td><?= $tampil["nama_siswa"]; ?></td>
                                <td><?= $tampil["tempat_lahir_siswa"]; ?></td>
                                <td><?= $tampil["tanggal_lahir_siswa"]; ?></td>
                                <td><?= $tampil["agama_siswa"]; ?></td>
                                <td><?= $tampil["alamat_siswa"]; ?></td>
                                <td><?= $tampil["nama_ayah"]; ?></td>
                                <td><?= $tampil["nama_ibu"]; ?></td>
                                <td><?= $tampil["kerja_ayah"]; ?></td>
                                <td><?= $tampil["kerja_ibu"]; ?></td>
                                <td><?= $tampil["nama_kelas"]; ?></td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>