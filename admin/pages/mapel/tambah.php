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
                        
                        <div class="col-md-4">
                            <label for="guru_mapel">Nama Guru Mapel</label>
                            <input type="text" name="nama_guru" id="nama_guru" value="" class="form-control">
                        </div>
                    </div>
                    <br>
                    <button type="submit" name="submit" id="submit" class="btn btn-success">Simpan</button>
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