<?php
include '../../../koneksi.php';
$guru = mysqli_query($koneksi, "SELECT * FROM guru");
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Data Guru.xls");
?>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tabel Guru</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" border="1">
                <thead border="1">
                    <tr>
                        <th>Nama</th>
                        <th>NIP</th>
                        <th>Jenis Kelamin</th>
                        <th>Status Guru</th>
                        <th>Status Kepegawaian</th>
                    </tr>
                </thead>
                <tbody border="1">
                    <?php
                    while ($tampilgr = mysqli_fetch_assoc($guru)) :
                    ?>
                        <tr>
                            <td><?= $tampilgr["nama_guru"]; ?></td>
                            <td><?= $tampilgr["nip_guru"]; ?></td>
                            <td><?= $tampilgr["jk_guru"]; ?></td>
                            <td><?= $tampilgr["status_guru"]; ?></td>
                            <td><?= $tampilgr["status_kepegawaian_guru"]; ?></td>

                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->