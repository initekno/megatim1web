<?php
//load file kebutuhan
require 'template/header.php'; //load file html atas
require 'config/config_database.php'; //load koneksi
//===================================================================================
?>
<ul>
    <li><a href="tampil_nilaitf_cetak.php">nilai tf untuk cetak</a></li>
    <li><a href="tampil_nilaitf.php">manajemen nilai tf</a></li>
    <li><a href="tampil_tentormt1.php">data tentor mt1</a></li>
    <li><a href="manajemen_profil.php">profil lokasi</a></li>
    <li><a href="backup_restore.php">backup database</a></li>
    <li><a href="logout_auth.php">logout</a></li>
</ul>
<?php
//===================================================================================
require 'template/footer.php';
?>