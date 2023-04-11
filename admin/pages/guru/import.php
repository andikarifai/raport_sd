<?php
session_start();
require_once '../template/header.php';
?>


<div class="container mt-5">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Import Data Excel</h6>
        </div>
        <div class="col-md-4">
            <form method="post" enctype="multipart/form-data" action="import_proses.php">
                Pilih File:
                <input class="form-control " name="file" type="file" required="required" accept=".xls,.xlsx">
                <br>
                <input class="btn btn-primary" type="submit" value="Import" />
                <a href="index.php" class="btn btn-warning">Kembali</a>
            </form>
        </div>
    </div>
</div>

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->
</div>
<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>


<?php
require_once '../template/footer.php';
?>