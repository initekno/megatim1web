<?php 
require 'pdo/config/config_database.php'; //load koneksi
session_start();
if (empty($_SESSION['username'] and ($_SESSION['cabang']))) {

  header('location:auth.php');
} else {
  require 'template/header.php';
  require 'template/sidebar.php';
  require 'template/navbar.php';

      // Jika user telah mengklik tombol Preview
      if(isset($_POST['preview'])){
        $nama_file_baru = 'ujicoba.xlsx';
        
        // Cek apakah terdapat file data.xlsx pada folder tmp
        if(is_file('assets/'.$nama_file_baru)) // Jika file tersebut ada
          unlink('assets/'.$nama_file_baru); // Hapus file tersebut
        
        $tipe_file = $_FILES['file']['type']; // Ambil tipe file yang akan diupload
        $tmp_file = $_FILES['file']['tmp_name'];
        
        // Cek apakah file yang diupload adalah file Excel 2007 (.xlsx)
        if($tipe_file == "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"){
          // Upload file yang dipilih ke folder tmp
          move_uploaded_file($tmp_file, 'assets/'.$nama_file_baru);
          
          // Load librari PHPExcel nya
          require_once 'PHPExcel/PHPExcel.php';
          
          $excelreader = new PHPExcel_Reader_Excel2007();
          $loadexcel = $excelreader->load('assets/'.$nama_file_baru); // Load file yang tadi diupload ke folder tmp
          $sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);
          
          // Buat sebuah tag form untuk proses import data ke database
          echo "<form method='post' action='import_excel_proses.php'>";
          
          // Buat sebuah div untuk alert validasi kosong
          echo "<div class='alert alert-danger' id='kosong'>
          Semua data belum diisi, Ada <span id='jumlah_kosong'></span> data yang belum diisi.
          </div>";
          
          echo "<table class='table table-bordered'>
          <tr>
            <th colspan='5' class='text-center'>Preview Data</th>
          </tr>
          <tr>
            <th>namasiswa</th>
            <th>kelas</th>
            <th>lokasibelajar</th>
            <th>bidangstudi</th>
            <th>pekanbelajar</th>
            <th>pertemuantf</th>
            <th>nilaitf</th>
            <th>sikap</th>
            <th>absensipersessi</th>
          </tr>";
          
          $numrow = 1;
          $kosong = 0;
          foreach($sheet as $row){ // Lakukan perulangan dari data yang ada di excel
            // Ambil data pada excel sesuai Kolom
            $namasiswa = $row['A']; // Ambil data NIS
            $kelas = $row['B']; // Ambil data nama
            $lokasibelajar = $row['C']; // Ambil data jenis kelamin
            $bidangstudi = $row['D']; // Ambil data telepon
            $pekanbelajar = $row['E']; // Ambil data alamat
            $pertemuantf = $row['F']; // Ambil data alamat
            $nilaitf = $row['G']; // Ambil data alamat
            $sikap = $row['H']; // Ambil data alamat
            $absensipersessi = $row['I']; // Ambil data alamat
            
            // Cek jika semua data tidak diisi
            if(empty($namasiswa) && empty($kelas) && empty($lokasibelajar) && empty($bidangstudi) && empty($pekanbelajar) && empty($pertemuantf) && empty($nilaitf) && empty($sikap) && empty($absensipersessi))
              continue; // Lewat data pada baris ini (masuk ke looping selanjutnya / baris selanjutnya)
            
            // Cek $numrow apakah lebih dari 1
            // Artinya karena baris pertama adalah nama-nama kolom
            // Jadi dilewat saja, tidak usah diimport
            if($numrow > 1){
              // Validasi apakah semua data telah diisi
              $namasiswa_td = ( ! empty($namasiswa))? "" : " style='background: #E07171;'"; // Jika NIS kosong, beri warna merah
              $kelas_td = ( ! empty($kelas))? "" : " style='background: #E07171;'"; // Jika Nama kosong, beri warna merah
              $lokasibelajar_td = ( ! empty($lokasibelajar))? "" : " style='background: #E07171;'"; // Jika Jenis Kelamin kosong, beri warna merah
              $bidangstudi_td = ( ! empty($bidangstudi))? "" : " style='background: #E07171;'"; // Jika Telepon kosong, beri warna merah
              $pekanbelajar_td = ( ! empty($pekanbelajar))? "" : " style='background: #E07171;'";
              $pertemuantf_td = ( ! empty($pertemuantf))? "" : " style='background: #E07171;'";
              $nilaitf_td = ( ! empty($nilaitf))? "" : " style='background: #E07171;'";
              $sikap_td = ( ! empty($sikap))? "" : " style='background: #E07171;'";
              $absensipersessi_td = ( ! empty($absensipersessi))? "" : " style='background: #E07171;'"; // Jika Alamat kosong, beri warna merah
              
              // Jika salah satu data ada yang kosong
              if(empty($namasiswa) or empty($kelas) or empty($lokasibelajar) or empty($bidangstudi) or empty($pekanbelajar) or empty($pertemuantf) or empty($nilaitf) or empty($sikap) or empty($absensipersessi)){
                $kosong++; // Tambah 1 variabel $kosong
              }
              
              echo "<tr>";
              echo "<td".$namasiswa_td.">".$namasiswa."</td>";
              echo "<td".$kelas_td.">".$kelas."</td>";
              echo "<td".$lokasibelajar_td.">".$lokasibelajar."</td>";
              echo "<td".$bidangstudi_td.">".$bidangstudi."</td>";
              echo "<td".$pekanbelajar_td.">".$pekanbelajar."</td>";
              echo "<td".$pertemuantf_td.">".$pertemuantf."</td>";
              echo "<td".$nilaitf_td.">".$nilaitf."</td>";
              echo "<td".$sikap_td.">".$sikap."</td>";
              echo "<td".$absensipersessi_td.">".$absensipersessi."</td>";
              echo "</tr>";
            }
            
            $numrow++; // Tambah 1 setiap kali looping
          }
          
          echo "</table>";
          
          // Cek apakah variabel kosong lebih dari 0
          // Jika lebih dari 0, berarti ada data yang masih kosong
          if($kosong > 0){
          ?>  
            <script>
            $(document).ready(function(){
              // Ubah isi dari tag span dengan id jumlah_kosong dengan isi dari variabel kosong
              $("#jumlah_kosong").html('<?php echo $kosong; ?>');
              
              $("#kosong").show(); // Munculkan alert validasi kosong
            });
            </script>
          <?php
          }else{ // Jika semua data sudah diisi
            echo "<hr>";
            
            // Buat sebuah tombol untuk mengimport data ke database
            echo "<button type='submit' name='import' class='btn btn-primary'><span class='glyphicon glyphicon-upload'></span> Import</button>";
          }
          
          echo "</form>";
        }else{ // Jika file yang diupload bukan File Excel 2007 (.xlsx)
          // Munculkan pesan validasi
          echo "<div class='alert alert-danger'>
          Hanya File Excel 2007 (.xlsx) yang diperbolehkan
          </div>";
        }
      }
?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">import excel data</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive-sm">
                <!--konten dinamis-->
<form method="post" enctype="multipart/form-data" action="">
	Pilih File: 
	<input type="file" name="file" class="pull-le">
	<button type="submit" name="preview" class="btn btn-success btn-sm">
          <span class="glyphicon glyphicon-eye-open"></span> preview data dulu
        </button>
</form>
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