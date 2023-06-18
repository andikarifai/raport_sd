<?php
session_start();

include_once('../template/header.php');
include_once('../../../koneksi.php');
?>

<?php
if (isset($_POST["submit"])) {
    $id =  $_POST["id_profil"];
    $nama = $_POST["nama_sekolah"];
    $npsn = $_POST["npsn"];
    $jjg = $_POST["jenjang"];
    $akreditasi = $_POST["akreditasi"];
    $alamat = $_POST["alamat"];
    $nama_kepsek = $_POST["nama_kepsek"];
    $nip_kepsek = $_POST["nip_kepsek"];
    $pangkat = $_POST["pangkat_kepsek"];
    $jabatan = $_POST["jabatan_kepsek"];
    $alamat_kepsek = $_POST["alamat_kepsek"];



    $editprofil = "UPDATE `profil` SET `nama_sekolah`='$nama',`npsn`='$npsn',`jenjang`='$jjg',`akreditasi`='$akreditasi',`alamat`='$alamat',`nama_kepsek`='$nama_kepsek',`nip_kepsek`='$nip_kepsek',`pangkat_kepsek`='$pangkat',`jabatan_kepsek`='$jabatan',`alamat_kepsek`='$alamat_kepsek' WHERE `profil`.`id_profil` = '$id'";


    if (mysqli_query($koneksi, $editprofil) > 0) {
        echo "<script>
 alert('data berhasil diubah!');
 document.location.href= 'index.php';
 </script>";
    } else {
        echo ("Deskripsi Error: " . mysqli_error($koneksi));
        echo "Data gagal diubah";
    }
}

?>

<!-- Begin Page Content -->

<div class="container-fluid">

    <!-- Page Heading -->

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Informasi Sekolah</h6>
        </div>
        <div class="card-body">
            <div class="table">
                <!-- Input Form -->


                <form action="" method="post">

                    <?php
                    $profil = mysqli_query($koneksi, "SELECT * FROM profil WHERE id_profil = '$id'");
                    while ($data = mysqli_fetch_assoc($profil)) {


                    ?>
                        <div class="row">
                            <input type="hidden" name="id_profil" value="<?php echo $data["id_profil"]; ?>" class="form-control" id="id">

                            <div class="col-md-4">
                                <label for="nama">Nama Sekolah</label>
                                <input type="text" name="nama_sekolah" id="nama_sekolah" value="<?= $data["nama_sekolah"]; ?>" class="form-control">
                            </div>
                            <div class="col-md-4">
                                <label for="nip">NPSN</label>
                                <input type="text" name="npsn" id="npsn " value="<?= $data["npsn"]; ?>" class="form-control">
                            </div>

                            <div class="col-md-4">
                                <label for="jenjang">Jenjang Pendidikan</label>
                                <input type="text" name="jenjang" id="npsn " value="<?= $data["jenjang"]; ?>" class="form-control">
                            </div>
                            <div class="col-md-4">
                                <label for="jenjang">Akreditasi</label>
                                <input type="text" name="akreditasi" id="akreditasi " value="<?= $data["akreditasi"]; ?>" class="form-control">
                            </div>
                            <div class="col-md-4">
                                <label for="jenjang">Alamat</label>
                                <input type="text" name="alamat" id="alamat" value="<?= $data["alamat"]; ?>" class="form-control">
                            </div>
                        </div> <br><br>
                        <div class="row">
                            <div class="col-md-4">
                                <label for="jenjang">Nama Kepala Sekolah</label>
                                <input type="text" name="nama_kepsek" id="nama_kepsek" value="<?= $data["nama_kepsek"]; ?>" class="form-control">
                            </div>
                            <div class="col-md-4">
                                <label for="jenjang">NIP Kepala Sekolah</label>
                                <input type="text" name="nip_kepsek" id="nip_kepsek" value="<?= $data["nip_kepsek"]; ?>" class="form-control">
                            </div>
                            <div class="col-md-4">
                                <label for="jenjang">Pangkat Kepala Sekolah</label>
                                <input type="text" name="pangkat_kepsek" id="pangkat_kepsek" value="<?= $data["pangkat_kepsek"]; ?>" class="form-control">
                            </div>
                            <div class="col-md-4">
                                <label for="jenjang">Jabatan Kepala Sekolah</label>
                                <input type="text" name="jabatan_kepsek" id="jabatan_kepsek" value="<?= $data["jabatan_kepsek"]; ?>" class="form-control">
                            </div>
                            <div class="col-md-4">
                                <label for="jenjang">Alamat Kepala Sekolah</label>
                                <input type="text" name="alamat_kepsek" id="alamat_kepsek" value="<?= $data["alamat_kepsek"]; ?>" class="form-control">
                            </div>
                        </div>

                        <br><br>
                        <button type="submit" name="submit" id="submit" class="btn btn-primary">Simpan</button>
                        <a href="index.php" class="btn btn-warning">Kembali</a>
                </form>
                <br><br>
            <?php } ?>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->


<?php include '../template/footer.php'; ?>