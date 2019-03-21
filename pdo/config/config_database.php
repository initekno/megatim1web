<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'sanggarbelajardb';
try {
    $koneksikedatabase = new PDO("mysql:host=$host;dbname=$db",$user,$pass);
    $koneksikedatabase->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'koneksi gagal ! : '.$e->getMessage();
}
?>