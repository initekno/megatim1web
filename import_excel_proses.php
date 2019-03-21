<?php
/*
-- Source Code from My Notes Code (www.mynotescode.com)
--
-- Follow Us on Social Media
-- Facebook : http://facebook.com/mynotescode/
-- Twitter  : http://twitter.com/mynotescode
-- Google+  : http://plus.google.com/118319575543333993544
--
-- Terimakasih telah mengunjungi blog kami.
-- Jangan lupa untuk Like dan Share catatan-catatan yang ada di blog kami.
*/
// Load file koneksi.php
require 'pdo/config/config_database.php'; //load koneksi
if(isset($_POST['import'])){ // Jika user mengklik tombol Import
  $nama_file_baru = 'ujicoba.xlsx';
  // Load librari PHPExcel nya
   require_once 'PHPExcel/PHPExcel.php';
  $excelreader = new PHPExcel_Reader_Excel2007();
  $loadexcel = $excelreader->load('assets/'.$nama_file_baru); // Load file excel yang tadi diupload ke folder tmp
  $sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);
  $numrow = 1;
  foreach($sheet as $row){
    // Ambil data pada excel sesuai Kolom
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
    //if(empty($nis) && empty($nama) && empty($jenis_kelamin) && empty($telp) && empty($alamat))
      continue; // Lewat data pada baris ini (masuk ke looping selanjutnya / baris selanjutnya)
    // Cek $numrow apakah lebih dari 1
    // Artinya karena baris pertama adalah nama-nama kolom
    // Jadi dilewat saja, tidak usah diimport
    if($numrow > 1){
      // Proses simpan ke Database
      // Buat query Insert
      //$query = "INSERT INTO pdo_nilaitfsiswa(nilaitf, session_tentor) VALUES(:nilaitf, :session_tentor)";
      $query = "INSERT INTO cloud_nilaitfsiswa(namasiswa,kelas,lokasibelajar,bidangstudi, pekanbelajar, pertemuantf, nilaitf, sikap, absensipersessi) VALUES(:namasiswa, :kelas, :lokasibelajar, :bidangstudi, :pekanbelajar, :pertemuantf, :nilaitf, :sikap, :absensipersessi)";
      $sql  = $koneksikedatabase->prepare($query);
      $sql->bindParam(':namasiswa', $namasiswa);
      $sql->bindParam(':kelas', $kelas);
      $sql->bindParam(':lokasibelajar', $lokasibelajar);
      $sql->bindParam(':bidangstudi', $bidangstudi);
      $sql->bindParam(':pekanbelajar', $pekanbelajar);
      $sql->bindParam(':pertemuantf', $pertemuantf);
      $sql->bindParam(':nilaitf', $nilaitf);
      $sql->bindParam(':sikap', $sikap);
      $sql->bindParam(':absensipersessi', $absensipersessi);
      $sql->execute(); // Eksekusi query insert
    }
    $numrow++; // Tambah 1 setiap kali looping
        }
    }
header('location: index.php'); // Redirect ke halaman awal
?>