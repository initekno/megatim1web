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
            <h6 class="m-0 font-weight-bold text-primary">Entry nilai TF</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table>
                    <form method="post" action="">
                        <tr>
                            <td><input type="text" name="namasiswa" placeholder="pekan belajar.."></td>
                            <td><input type="text" name="namasiswa" id="namasiswa" placeholder="ketik nama siswa.." value=""></td>
                        </tr>
                        <tr>
                            <td><input type="text" name="namasiswa" placeholder="lokai belajar.."></td>
                        </tr>
                        <tr>
                            <td><input type="text" name="namasiswa" placeholder="pilih kelas.."></td>
                        </tr>
                        <tr>
                            <td><input type="text" name="namasiswa" placeholder="input nilai tf.."></td>
                        </tr>
                        <tr>
                            <td><input type="text" name="namasiswa" placeholder="bidang studi.."></td>
                        </tr>
                        <tr>
                            <td><input type="text" name="namasiswa" placeholder="pertemuan tf.."></td>
                        </tr>
                        <tr>
                            <td><input type="text" name="namasiswa" placeholder="sikap siswa.."></td>
                        </tr>
                        <tr>
                            <td><input type="text" name="namasiswa" placeholder="absensi per siswa.."></td>
                        </tr>
                        <tr>
                            <td><button name="btn-save" class="btn btn-success">simpan data</button></td>
                        </tr>
                    </form>
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
<script type="text/javascript">
    $(document).ready(function() {
        // Selector input yang akan menampilkan autocomplete.
        $("#namasiswa").autocomplete({
            serviceUrl: "carisiswa.php", // Kode php untuk prosesing data
            dataType: "JSON", // Tipe data JSON
            onSelect: function(suggestion) {
                $("#namasiswa").val("" + suggestion.namasiswa);
            }
        });
    })
</script> 