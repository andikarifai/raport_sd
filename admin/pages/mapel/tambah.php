<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
include_once('../template/header.php');
include_once('../../../koneksi.php')
?>
<?php
if (isset($_POST["submit"])) {
    $nmmpl = $_POST["nama_mapel"];
    $kd_mpl = $_POST["kode_mapel"];
    $id_semester = $_POST["id_semester"];
    $nama_guru = $_POST["nama_guru"];

    $tambahmapel = $tambah = "INSERT INTO mata_pelajaran (id_mapel, nama_mapel, kode_mapel, id_semester, nama_guru) VALUES (NULL, '$nmmpl', '$kd_mpl', '$id_semester', '$nama_guru')";
    if (mysqli_query($koneksi, $tambahmapel) > 0) {
        echo "<script>
 alert('data berhasil ditambahkan');
 document.location.href= 'index.php';
 </script>";
    } else {
        echo "galat!";
    }
}

?>

<!-- Begin Page Content -->

<div class="container-fluid">

    <!-- Page Heading -->

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tabel Guru</h6>
        </div>
        <div class="card-body">
            <div class="table">
                <!-- Input Form -->
                <form action="" method="post">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="nama">Nama Mata Pelajaran</label>
                            <input type="text" name="nama_mapel" id="nama_mapel" value="" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label for="nama">Kode Mapel</label>
                            <input type="text" name="kode_mapel" id="kode_mapel" value="" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label for="jk">Semester</label>
                            <select name="id_semester" id="id_semester" class="form-control">
                                <option value="" selected disabled>-Pilih</option>
                                <option value="1">1</option>
                                <option value="2">2</option>

                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="jk">Nama Guru Mapel</label>
                            <select name="nama_guru" id="nama_guru" class="form-control">
                                <option value="" selected disabled>Pilih Nama Guru</option>
                                <?php $sql_guru = mysqli_query($koneksi, "SELECT * FROM guru") or die(mysqli_error($koneksi));
                                while ($dataguru = mysqli_fetch_assoc($sql_guru)) {
                                    echo '<option value="' . $dataguru["nama_guru"] . '">' . $dataguru["nama_guru"]
                                        . '</option>';
                                }

                                ?>

                            </select>
                        </div>
                    </div>
                    <br>
                    <button type="submit" name="submit" id="submit" class="btn btn-success">Simpan</button>
                    <button type="reset" class="btn btn-secondary">Reset</button>
                    <a href="index.php" class="btn btn-warning">Kembali</a>
            </div>
        </div>
        </form>

    </div>
</div>
</div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->


<?php include '../template/footer.php' ?>