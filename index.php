<?php 
require 'config.php';
session_start();
//cek data login, ada atau tidak?
if (empty($_SESSION['username'] and ($_SESSION['cabang']))) {
    //jika tidak arahkan ke auth suruh login dulu
    header('location:auth.php');
} else {
    //jika ada data login, maka tampilkan
    header('location:dashboard.php');
    ?>

<?php 
}
require 'template/footer.php';
?> 