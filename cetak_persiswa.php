<?php
require_once __DIR__ . '/vendor/autoload.php';
require 'config.php';
date(format, timestamp);
$mpdf = new \Mpdf\Mpdf();
$namasiswa = $_GET['namasiswa'];//parameter dari cetak show yang di pilih
$i = 1;
$data = mysqli_query($conn, "SELECT * FROM cloud_nilaitfsiswa WHERE namasiswa='$namasiswa'");
while ($row = mysqli_fetch_array($data)) {
$html = '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Daftar Mahasiswa</title>
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    
</head>
<body>
   <h4><i>b. LAPORAN PERKEMBANGAN BELAJAR SISWA</i></h4>
   <p><i>PERIODE: Januari-Pebruari 2019</i></p><br>
   <table>
        <tr>
            <td>Nama Siswa</td>
            <td>:</td>
            <td><b>' . $row["namasiswa"] .' </b></td>
        </tr>
        <tr>
            <td>Kelas</td>
            <td>:</td>
            <td>' . $row["kelas"] . ' </td>
        </tr>
        <tr>
            <td>Lokasi belajar</td>
            <td>:</td>
            <td>' . $row["lokasibelajar"] . '</td>
        </tr>
    </table><br><br><br>
   <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>Pekan</th>
            <th>Pertemuan-tf</th>
            <th>Mapel</th>
            <th>Nilai tf Harian</th>
            <th>Absen Harian</th>
            <th>Sikap</th>
        </tr>';
}

$i = 1;
//kemudian di eksekusi di query
$data = mysqli_query($conn, "SELECT * FROM cloud_nilaitfsiswa WHERE namasiswa='$namasiswa'");
while ($row = mysqli_fetch_array($data)) {
$html .= '<tr>
            <td>' . $row["pekanbelajar"] .'</td>
            <td>' . $row["pertemuantf"] . '</td>
            <td>' . $row["bidangstudi"] .'</td>
            <td>' . $row["nilaitf"] . '</td>
            <td>' . $row["absensipersessi"] . '</td>
            <td>' . $row["sikap"] . '</td>
</tr>';
}
$html .= '</table><br><br>
Keterangan Sikap :<br>
A = terlambat lebih dari 30 menit<br>
B = terlalu sering ngobrol<br>
C = terlalu sering main HP<br>
D = tidur di kelas<br>
E = ribut di kelas<br>
F = nyontek ketika TO<br>
G = baik<br>
H = tidak ada di kelas<br><br><br>
Rekomendasi Petugas Akademik : <b><i>Perbanyak konsultasi lagi</i></b><br><br><br>
Demikian surat pemberitahuan dan laporan ini kami sampaikan atas perhatian dan <br>
kerjasamanya yang baik kami ucapkan terima kasih. Semoga putra-putri Bapak/ibu menjadi<br>
anak yang berprestasi, sholeh/sholehah serta sukses dalam mencapai cita-citanya, Amiin<br><br><br>
Maret 2019 <br>
Penanggung Jawab Lokasi<br><br><br><br><br>
.....................
</body>

</html>';
$mpdf->WriteHTML($html);
$mpdf->Output('nilaitfsiswa.pdf', 'I'); 