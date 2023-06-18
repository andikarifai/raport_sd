<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
include_once('../template/header.php');
include_once('../../../koneksi.php');

if (isset($_POST["submit"])) {
    $nis = $_POST["nidn"];
    $nisn = $_POST["nisn"];
    $nama = $_POST["nama_siswa"];
    $jk = $_POST["jenis_kelamin"];
    $tmplahir = $_POST["tempat_lahir_siswa"];
    $tgllhr = $_POST["tgl_lahir_siswa"];
    $agama = $_POST["agama_siswa"];
    $alamat = $_POST["alamat_siswa"];
    $nmayah = $_POST["nama_ayah"];
    $nmibu = $_POST["nama_ibu"];
    $krjayah = $_POST["kerja_ayah"];
    $krjibu = $_POST["kerja_ibu"];
    $nmkelas = $_POST["nama_kelas"];
    $tambah = "INSERT INTO `siswa` (`id_siswa`, `nidn`, `nisn`, `nama_siswa`, `jenis_kelamin`, `tempat_lahir_siswa`, `tanggal_lahir_siswa`, `agama_siswa`, `alamat_siswa`, `nama_ayah`, `nama_ibu`, `kerja_ayah`, `kerja_ibu`, `nama_kelas`) VALUES (NULL, '$nis', '$nisn', '$nama', '$jk', '$tmplahir', '$tgllhr', '$agama', '$alamat', '$nmayah', '$nmibu', '$krjayah', '$krjibu', '$nmkelas')";
    if (mysqli_query($koneksi, $tambah) > 0) {
        echo "<script>
    alert('data berhasil ditambahkan');
    document.location.href= 'index.php';
    </script>";
    } else {
        echo "gagal!";
    }
}

?>

<!-- Begin Page Content -->

<div class="container-fluid">

    <!-- Page Heading -->

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tabel Murid</h6>
        </div>
        <div class="card-body">
            <div class="table">
                <!-- Input Form -->
                <form action="" method="post">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="kode" class="control-label">NIDN</label>
                                <input type="text" name="nis" value="" class="form-control" id="nis">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="kode" class="control-label">NISN</label>
                                <input type="text" name="nisn" value="" class="form-control" id="nisn">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="kode" class="control-label">Nama</label>
                                <input type="text" name="nama_siswa" value="" class="form-control" id="nama_siswa">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="kode" class="control-label">Jenis Kelamin</label>
                                <select class="form-control" name="jenis_kelamin" id="jenis_kelamin">
                                    <option value="" disabled selected>Pilih</option>
                                    <option value="L">L</option>
                                    <option value="P">P</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="kode" class="control-label">Tempat Lahir</label>
                                <input type="text" name="tempat_lahir_siswa" value="" class="form-control" id="tempat_lahir_siswa">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="kode" class="control-label">Tanggal Lahir</label>
                                <input type="date" name="tgl_lahir_siswa" value="" class="form-control" id="tanggal_lahir_siswa">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="kode" class="control-label">Agama</label>
                                <select class="form-control" name="agama_siswa">
                                    <option value="" disabled selected>Pilih Agama</option>
                                    <option>Islam</option>
                                    <option>Kristen</option>
                                    <option>Budha</option>
                                    <option>Hindu</option>
                                    <option>Konghuchu</option>
                                </select>

                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="kode" class="control-label">Alamat</label>
                                <input type="text" name="alamat_siswa" id="alamat_siswa" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="kode" class="control-label">Nama Ayah</label>
                                <input type="text" name="nama_ayah" id="nama_ayah" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="kode" class="control-label">Nama Ibu</label>
                                <input type="text" name="nama_ibu" id="nama_ibu" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="kode" class="control-label">Pekerjaan Ayah</label>
                                <input type="text" name="kerja_ayah" id="kerja_ayah" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="kode" class="control-label">Pekerjaan Ibu</label>
                                <input type="text" name="kerja_ibu" id="kerja_ibu" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="kode" class="control-label">Kelas</label>
                                <select class="form-control" name="nama_kelas">
                                    <option disabled selected>Pilih Kelas</option>
                                    <?php $sql_kelas = mysqli_query($koneksi, "SELECT * FROM kelas") or die(mysqli_error($koneksi));
                                    while ($datakelas = mysqli_fetch_assoc($sql_kelas)) {
                                        echo '<option value="' . $datakelas["nama_kelas"] . '">' . $datakelas["nama_kelas"]
                                            . '</option>';
                                    }

                                    ?>
                                </select>

                            </div>
                        </div>
                    </div>

                    <button type="submit" name="submit" id="submit" class="btn btn-success">Tambah</button>
                    <a href="index.php" class="btn btn-warning">Kembali</a>
                    <br>

                </form>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->


<?php include '../template/footer.php' ?>