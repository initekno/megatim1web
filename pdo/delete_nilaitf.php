<?php
//load file kebutuhan
require 'config/config_database.php'; //load koneksi
//===================================================================================
//mengambil parameter id_nilai dari tabel tampil nilaitf
$id_nonf = $_GET['id_nonf'];
//deleting the row from table
$sql = "DELETE FROM pdo_nilaitfsiswa WHERE id_nilai=:id_nonf";
$query = $koneksikedatabase->prepare($sql);
$query->execute(array(':id_nonf' => $id_nonf));

//arahkan ke tabel tampil nilaitf
header("location:tampil_nilaitf.php");
?>