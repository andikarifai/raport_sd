<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();

include_once('../template/header.php');
include_once('../../../koneksi.php');
$class = $_SESSION['kelas'];

$namasekolah = "SDN Pringanom 2";

$alamatsekolah = "Dusun II, Pringanom, Kec. Masaran, Kabupaten Sragen, Jawa Tengah 57282";
$siswa = mysqli_query($koneksi, "SELECT * FROM siswa where nama_kelas = '$class'") or die(mysqli_error($koneksi));
$jsArray = "var nis = new Array();\n";
$jsArrayNisn = "var nisn = new Array();\n";
$jsArrayKelas = "var nama_kelas = new Array();\n";



// // ambil nilai parameter dari URL
// $namaSiswa = mysqli_real_escape_string($koneksi, $_GET['nama_siswa']);
// $idSemester = mysqli_real_escape_string($koneksi, $_GET['id_semester']);

// // query untuk memeriksa ketersediaan data
// $query = "SELECT * FROM nilai WHERE nama_siswa = '$namaSiswa' AND id_semester = '$idSemester'";
// $result = mysqli_query($koneksi, $query);

// jika data sudah ada, kirimkan respon 'exists'
// if (mysqli_num_rows($siswa) > 0) {
//     echo 'exists';
// }
// // jika data belum ada, kirimkan respon kosong
// else {
//     echo '';
// }



?>


<!-- Begin Page Content -->

<div class="container-fluid">
    <!-- Page Identitas Rapor -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tabel Identitas Rapor</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <!-- Input Form -->
                <form action="tambahrapor.php" method="post">

                    <div class="row mt-2">


                        <div class="col-lg">
                            <label for="nama" required> Nama Peserta Didik</label>
                            <select class="form-control" name="nama_siswa" onchange="changeValue(this.value)">
                                <option>- Pilih -</option>
                                <?php
                                if (mysqli_num_rows($siswa)) {
                                    while ($new_siswa = mysqli_fetch_array($siswa)) {
                                        // Check ketersediaan data nama dan semester di dalam database
                                        $query = "SELECT * FROM nilai WHERE nama_siswa = '" . $new_siswa['nama_siswa'] . "' AND id_semester = '" . $new_siswa['id_semester'] . "'";
                                        $result = mysqli_query($koneksi, $query);
                                        $data_exist = mysqli_num_rows($result);

                                        // Jika data belum ada, tampilkan option
                                        if (!$data_exist) {
                                            $jsArrayNis .= "nis['" . $new_siswa['nama_siswa'] . "'] = {nis:'" . addslashes($new_siswa['nis']) . "'};\n";
                                            $jsArrayNisn .= "nisn['" . $new_siswa['nama_siswa'] . "'] = {nisn:'" . addslashes($new_siswa['nisn']) . "'};\n";
                                            $jsArrayKelas .= "nama_kelas['" . $new_siswa['nama_siswa'] . "'] = {nama_kelas:'" . addslashes($new_siswa['nama_kelas']) . "'};\n";
                                            echo '<option value="' . $new_siswa["nama_siswa"]  . '">' . $new_siswa["nama_siswa"] . '</option>';
                                        }
                                    }
                                }
                                ?>
                            </select>
                        </div>



                        <div class="col-lg">
                            <label for="nis">NIS</label>
                            <input type="text" class="form-control" name="nis" id="nis" value="0" readonly="readonly">
                        </div>
                        <div class="col-lg">
                            <label for="nisn">NISN</label>
                            <input type="text" class="form-control" name="nisn" id="nisn" value="0" readonly="readonly">
                        </div>
                        <div class="col-lg">
                            <label for="kelas">Kelas</label>
                            <input type="text" class="form-control" name="nama_kelas" id="nama_kelas" value="0" readonly="readonly">
                        </div>




                        <div class="col-lg">
                            <label for="id_semester">Semester</label>
                            <select name="id_semester" id="id_semester" class="form-control" required>
                                <option value="">--Pilih Semester--</option>
                                <option value="1">1</option>
                                <option value="2">2</option>

                            </select>

                        </div>

                        <div class="col-lg">
                            <label for="tahun_ajar">Tahun Ajar</label>
                            <select name="tahun_ajar" id="tahun_ajar" class="form-control" required>
                                <option value="">Tahun Ajaran</option>
                                <?php $sql_tahun = mysqli_query($koneksi, "SELECT * FROM tahun_ajar") or die(mysqli_error($koneksi));
                                while ($datatahun = mysqli_fetch_assoc($sql_tahun)) {
                                    echo '<option value="' . $datatahun["tahun_ajar"] . '">' . $datatahun["tahun_ajar"]
                                        . '</option>';
                                }

                                ?>
                            </select>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-lg">
                            <label for="nama_sekolah">Nama Sekolah</label>
                            <input type="text" name="nama_sekolah" id="nm_sekolah" class="form-control" value="<?php echo $namasekolah; ?> " readonly>
                        </div>
                        <div class="col-lg">
                            <label for="alamat">Alamat Sekolah</label>
                            <input type="text" name="alamat" id="alamat" class="form-control" value="<?php echo $alamatsekolah; ?> " readonly>
                        </div>
                    </div>
                    <br>
            </div>
        </div>
    </div>

</div>

<!-- Page Nilai -->
<div class="card">
    <div class="card-body bg-light">
        <h6 class="text-danger font-weight-bold text-center">Perhatikan : Input Nilai ini hanya satu kali, tidak dapat di edit kembali, Mohon cek nilai dengan benar!</h6>


    </div>
    <div class="container-fluid">
        <!-- Page Identitas Rapor -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Tabel Rapor</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <div class="row">
                        <div class="col-md text-center">
                            <!-- <div class="card-body">

                            <h6 class="m-0 font-weight-bold text-primary">Keterangan</h6> -->

                            <!-- <a class="btn btn-success" href="#" id="Btn" value="disable" disabled>SB = Sangat Baik</a>
                            <a class="btn btn-primary" href="#" id="Btn">B = Baik</a>
                            <a class="btn btn-danger" href="#" id="Btn">KB = Kurang Baik</a> 
                            <br>
                        </div> -->
                            <br>
                            <h3 class="m-0 font-weight-bold text-primary">Input Nilai </h3>
                            <br>
                            <h6 class="m-0 font-weight-bold text-primary">Deskripsi</h6>
                            <br>
                            <table class="table table-light" id="dataTable" width="100%" cellspacing="0">
                                <tr>
                                    <h5 style="text-align: left;"><strong>A. Sikap</strong></h5><br>
                                    <td height="100">
                                        <label for="spiritual" require>Sikap Spiritual</label>
                                        <textarea name="spiritual" id="spiritual" class="form-control"></textarea>

                                    </td>

                                    <td height="100"> <label for="sosial" require>Sikap Sosial </label>
                                        <textarea name="sosial" id="sosial" class="form-control"></textarea>

                                    </td>

                                </tr>
                            </table>
                            <table class="table table-light " id="dataTable" width="100%" cellspacing="0">

                                <thead class="thead-dark">

                                    <tr>
                                        <br>
                                        <h5 style="text-align: left;"><strong>B. Mata Pelajaran</strong></h5><br>
                                        <td>Mata Pelajaran</td>
                                        <td>Nilai Pengetahuan </td>
                                        <td>Keterangan</td>
                                        <td>Nilai Keterampilan </td>
                                        <td>Keterangan</td>
                                    </tr>
                                </thead>
                                <tr>
                                <tr>
                                    <?php
                                    $sql_mapel = mysqli_query($koneksi, "SELECT * FROM mata_pelajaran ORDER BY nama_mapel") or die(mysqli_error($koneksi));
                                    while ($datamapel = mysqli_fetch_assoc($sql_mapel)) :
                                        $mapel_string = $datamapel["nama_mapel"];
                                        $mapel = explode(", ", $mapel_string);
                                    ?>
                                        <td>
                                            <?php foreach ($mapel as $subject) : ?>
                                                <input type="text" name="nama_mapel[]" id="nama_mapel[]" value="<?php echo $subject; ?>" class="form-control" readonly>

                                            <?php endforeach;
                                            ?>
                                        </td>
                                        <td style="width: 20px;">
                                            <input type="number" name="nilai_pengetahuan[]" id="" class="form-control" min=0 max=100 require>
                                        </td>
                                        <td>
                                            <textarea name="ket_pengetahuan[]" id="" class="form-control" required></textarea>
                                        </td>

                                        <td style="width: 20px;">
                                            <input type="number" name="nilai_ketrampilan[]" id="" class="form-control" min=0 max=100 require>
                                        </td>
                                        <td>
                                            <textarea name="ket_ketrampilan[]" id="" class="form-control" required></textarea>
                                        </td>
                                </tr>
                            <?php endwhile; ?>
                            </table>
                            <table>
                                <tr>
                                    <br>
                                    <h5 style="text-align: left;"><strong>C. Ekstra Kulikuler</strong></h5><br>
                                    <td>
                                        <label for="ekstra">Ekstra</label>
                                        <input type="text" name="ekstra" id="ekstra" class="form-control">

                                    </td>
                                    <span></span>
                                    <td> <label for="ekstra">Keterangan</label>
                                        <input type="text" name="ktrg_nekstra" id="ktrg_nekstra" class="form-control">
                                    </td>
                                </tr>
                            </table>
                            <table>
                                <tr><br>
                                    <h5 style="text-align: left;"><strong>D. Saran- saran</strong></h5><br>
                                    <td> <label for="saran">Saran-saran</label>
                                        <textarea type="text" name="saran" id="saran" class="form-control"></textarea>
                                    </td>
                                </tr>
                            </table>
                            <table>
                                <tr><br>
                                    <h5 style="text-align: left;"><strong>E. Tinggi dan Berat Badan</strong></h5><br>
                                    <td>
                                        <h6 style="text-align: left;"><strong>Semester 1</strong></h6>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label for="tinggi1" require>Tinggi (cm)</label>
                                        <input type="number" name="tinggi1" id="tinggi1" class="form-control" value="0" min="0">
                                    </td>

                                    <td> <label for="berat1" require>Berat (kg) </label>
                                        <input type="number" name="berat1" id="berat1" class="form-control" value="0" min="0">
                                    </td>
                                </tr>
                            </table>
                            <table>
                                <tr>
                                    <td>
                                        <h6 style="text-align: left;"><strong>Semester 2</strong></h6>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label for="tinggi2" require>Tinggi (cm)</label>
                                        <input type="number" name="tinggi2" id="tinggi2" class="form-control" value="0" min="0">
                                    </td>

                                    <td> <label for="berat2" require>Berat (kg) </label>
                                        <input type="number" name="berat2" id="berat2" class="form-control" value="0" min="0">
                                    </td>

                                </tr>

                            </table>
                            <table>
                                <tr>
                                    <br>
                                    <h5 style="text-align: left;"><strong>F. Kondisi Kesehatan</strong></h5><br>
                                    <td>
                                        <label for="kesehatan" require>Pendengaran</label>
                                        <input type="text" name="pendengaran" id="pendengaran" class="form-control">

                                    </td>
                                    <td> <label for="kesehatan" require>Penglihatan</label>
                                        <input type="text" name="penglihatan" id="penglihatan" class="form-control">
                                    </td>
                                    <td> <label for="kesehatan" require>Gigi</label>
                                        <input type="text" name="gigi" id="gigi" class="form-control">
                                    </td>
                                </tr>
                            </table>
                            <table>
                                <tr>
                                    <br>
                                    <h5 style="text-align: left;"><strong>G. Prestasi</strong></h5><br>
                                    <td>
                                        <label for="prestasi">Kesenian</label>
                                        <input type="text" name="kesenian" id="kesenian" class="form-control">

                                    </td>
                                    <td> <label for="prestasi">Olahraga</label>
                                        <input type="text" name="olahraga" id="olahraga" class="form-control">
                                    </td>

                                </tr>
                            </table>
                            <table>
                                <tr><br>
                                    <h5 style="text-align: left;"><strong>H. Ketidakhadiran</strong></h5><br>
                                    <td>
                                        <label for="izin">Sakit</label>
                                        <input type="number" name="sakit" id="izin" class="form-control" value="0" min="0">
                                    </td>

                                    <td> <label for="izin">Izin</label>
                                        <input type="number" name="izin" id="izin" class="form-control" value="0" min="0">
                                    </td>
                                    <td> <label for="izin">Tanpa Keterangan</label>
                                        <input type="number" name="alfa" id="alfa" class="form-control" value="0" min="0">
                                    </td>
                                </tr>
                            </table>

                            <table>
                                <tr>
                                    <br><br>
                                    <h4 style="text-align: left;"><strong>KEPUTUSAN</strong></h4><br>
                                    <td>
                                        <p> Berdasar pencapaian seluruh kompetensi peserta didik dinyatakan : </p>
                                        <label for="keputusan"></label>
                                        <select name="keputusan" id="keputusan" class="form-control">
                                            <option value="0">Pilih Aksi</option>
                                            <option value="Naik">Naik Kelas</option>
                                            <option value="Tinggal ">Tinggal Kelas </option>

                                        </select>

                                    </td>

                                </tr>
                            </table>

                            <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
                            <a href="index.php" class="btn btn-warning">Kembali</a>
                            <br><br>
                        </div>

                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- DataTales Hasil Output Nilai -->

<!-- DataTales Example -->
<br><br>

<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<script>
    var button = document.getElementById('Btn');
    button.disabled = true;
</script>
<script type="text/javascript">
    <?php echo $jsArrayNis; ?>
    <?php echo $jsArrayNisn; ?>
    <?php echo $jsArrayKelas; ?>

    function changeValue(nama) {
        document.getElementById("nis").value = nis[nama].nis;
        document.getElementById("nisn").value = nisn[nama].nisn;
        document.getElementById("nama_kelas").value = nama_kelas[nama].nama_kelas;

    };
    // fungsi untuk memeriksa apakah data sudah ada di database
    function checkData() {
        // ambil nilai nama siswa dan semester yang dipilih
        var namaSiswa = document.getElementById('nama_siswa').value;
        var idSemester = document.getElementById('id_semester').value;

        // kirim permintaan ke server untuk memeriksa ketersediaan data
        var xhr = new XMLHttpRequest();
        xhr.open('GET', 'check_data.php?nama_siswa=' + encodeURIComponent(namaSiswa) + '&id_semester=' + encodeURIComponent(idSemester), true);
        xhr.onload = function() {
            if (xhr.status === 200) {
                // jika data sudah ada, nonaktifkan tombol pilihan semester
                if (xhr.responseText === 'exists') {
                    document.getElementById('id_semester').disabled = true;
                }
                // jika data belum ada, aktifkan tombol pilihan semester
                else {
                    document.getElementById('id_semester').disabled = false;
                }
            }
        };
        xhr.send();
    }
</script>

<?php include '../template/footer.php' ?>