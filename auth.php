<?php 
require 'config.php';
require 'template/header.php';
session_start();
//jika session false
if ($_SESSION == false) {
    //maka artinya data login tidak ada
    //jika tidak ada data login, arahkan ke auth suruh login dulu
    if (isset($_POST['login'])) {
        $user_email = $_POST['username'];
        $user_pass = md5($_POST['password']);
        $check_user = "SELECT * FROM cloud_users WHERE kdlokasi='$user_email'AND user_pass='$user_pass'";
        $run = mysqli_query($conn, $check_user);
        if (mysqli_num_rows($run)) {
            $_SESSION['username'] = $user_email;
            $_SESSION['cabang'] = "online";
            echo "<script>window.open('dashboard.php','_self')</script>";
        } else {
            echo "<script>alert('juki !.. kode lokasi dan password anda salah!')</script>";
        }
    }
    ?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <br>
    <form method="post" onSubmit="return validasi()">
        <div>
            <input type="text" name="username" id="username" placeholder="kode lokasi..">
        </div><br>
        <div>
            <input type="password" name="password" id="password" placeholder="password..">
        </div><br>
        <div>
            <button name="login" class="btn btn-primary">bismillah login</button>
        </div>
    </form>
</div>
<?php

} else {
    //jika ada data login, maka tampilkan dan arahkan ke dashboard
    //dan itu artinya sesi sudah tercipta dan bernilai true $_SESSION == true
    header('location:dashboard.php');
}
require 'template/footer.php';
?>
<script type="text/javascript">
    function validasi() {
        var username = document.getElementById("username").value;
        var password = document.getElementById("password").value;
        if (username != "" && password != "") {
            return true;
        } else {
            alert('kode lokasi dan Password masih kosong !');
            return false;
        }
    }
</script> 