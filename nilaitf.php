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
            <h6 class="m-0 font-weight-bold text-primary">nilai tf cetak</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive-sm">
                <table id="myTable" class="table table-bordered table-hover table-sm" width="100%" cellspacing="0">
                    <thead class="thead-light">
                        <tr>
                            <th>laporan</th>
                            <th>lokasi</th>
                            <th>kelas</th>
                            <th>siswa</th>
                            <th>nilai total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $no = 1;
                        //$data = mysqli_query($conn, "SELECT * FROM cloud_nilaitfsiswa");
                        $data = mysqli_query($conn, "SELECT kelas,lokasibelajar,namasiswa, SUM(nilaitf)AS nilaitotal FROM cloud_nilaitfsiswa GROUP BY namasiswa;");
                        while ($row = mysqli_fetch_array($data)) {
                          ?>
                        <tr>
                            <td><a href="cetak_persiswa.php?namasiswa=<?php echo $row['namasiswa']; ?>" target="_blank" class="btn btn-danger btn-sm"> <i class="fa fa-file-pdf"></i></a></td>
                            <td><?= $row["lokasibelajar"]; ?></td>
                            <td><?= $row["kelas"]; ?></td>
                            <td><?= $row["namasiswa"]; ?></td>
                            <td><?= $row["nilaitotal"]; ?></td>
                        </tr>
                        <?php 
                      }
                      ?>
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