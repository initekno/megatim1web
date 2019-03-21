<?php 
require 'config.php';
session_start();
if (empty($_SESSION['username'] and ($_SESSION['cabang']))) {

  header('location:auth.php');
} else {
  require 'template/header.php';
  require 'template/sidebar.php';
  require 'template/navbar.php';

  ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">nilai tf keseluruhan</h6>
             <!--               <a href="import_excel.php" class="btn btn-success pull-right btn-sm">
        <span class="glyphicon glyphicon-upload"></span> Import Data
      </a>-->
        </div>
        <div class="card-body">
            <div class="table-responsive-sm">
                <table id="tabelDataSiswa" class="table table-bordered table-hover table-sm " width="100%" cellspacing="0">
                    <thead class="thead-dark">
                        <tr>
                            <th>siswa</th>
                            <th>kelas</th>
                            <th>lokasi</th>
                            <th>mapel</th>
                            <th>pekan</th>
                            <th>tf</th>
                            <th>nilai</th>
                            <th>sikap</th>
                            <th>absensi</th>
                        </tr>
                    </thead>
                    <tbody>
   
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<!-- /.container-fluid -->
<?php

}
require 'template/footer.php';
?> 
<script>
    $(document).ready(function() {
        $('#tabelDataSiswa').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": "getData.php",
            "language": {
                "url": "https://cdn.datatables.net/plug-ins/1.10.9/i18n/Indonesian.json",
                "sEmptyTable": "Tidak ada data di database"
            }
        });
    });
</script>