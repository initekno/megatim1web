<?php
//load file kebutuhan
require 'template/header.php'; //load file html atas
require 'config/config_database.php'; //load koneksi
//===================================================================================
$result = $koneksikedatabase->query(
    //query join banyak table
    "SELECT 
    sanggar_tentor.nama,
    pdo_induksiswa.nonf,
    pdo_induksiswa.nama_siswa,
    pdo_pekanbelajar.pekan,
    pdo_kelas.kelas,
    sanggar_mapel.nama_mapel,
    pdo_pertemuantf.tf,
    pdo_nilaitfsiswa.nilaitf,
    pdo_nilaitfsiswa.absensipersessi,
    pdo_nilaitfsiswa.tgl_entry,
    pdo_sikap.sikap 
    FROM pdo_nilaitfsiswa
    INNER JOIN sanggar_tentor ON sanggar_tentor.id_tentor=pdo_nilaitfsiswa.id_tentor
    INNER JOIN pdo_induksiswa ON pdo_induksiswa.id_siswa=pdo_nilaitfsiswa.id_siswa
    INNER JOIN pdo_pekanbelajar ON pdo_pekanbelajar.id_pekan=pdo_nilaitfsiswa.id_pekan
    INNER JOIN pdo_kelas ON pdo_kelas.id_kelas=pdo_nilaitfsiswa.id_kelas
    INNER JOIN sanggar_mapel ON sanggar_mapel.id_mapel=pdo_nilaitfsiswa.id_mapel
    INNER JOIN pdo_pertemuantf ON pdo_pertemuantf.id_tf=pdo_nilaitfsiswa.id_tf
    INNER JOIN pdo_sikap ON pdo_sikap.id_sikap=pdo_nilaitfsiswa.id_sikap
    ORDER BY pdo_induksiswa.nama_siswa ASC");
//===================================================================================
?>
<a href="index.php">[ kembali ke menu ]</a> 
<a href="input_nilaitf.php">[ tambah data ]</a>
<a href="cetak_pdf_nilaitf.php">[ pdf ]</a>
<a href="cetak_excel_nilaitf.php">[ excel ]</a><br/><br>
<!--gaya class datatables : cell-border compact order-column hover stripe-->
    <table id="myTable" class="responsive no-wrap compact order-column hover stripe" style="width:100%">
   <thead>
    <tr>
        <th>tentor</th>
        <th>tgl-entry</th>
        <th>nonf</th>
        <th>nama-siswa</th>
        <th>pekan</th>
        <th>kelas</th>
        <th>mapel</th>
        <th>tf</th>
        <th>nilai-tf</th>
        <th>absensi</th>
        <th>sikap</th>
        <th>opsi</th>
    </tr>
   </thead>
    <tbody>
    <?php     
    while($row = $result->fetch(PDO::FETCH_ASSOC)) {         
        echo "<tr>";
        echo "<td>".$row['nama']."</td>";
        echo "<td>".$row['tgl_entry']."</td>";
        echo "<td>".$row['nonf']."</td>";
        echo "<td>".$row['nama_siswa']."</td>";
        echo "<td>".$row['pekan']."</td>";
        echo "<td>".$row['kelas']."</td>";
        echo "<td>".$row['nama_mapel']."</td>";
        echo "<td>".$row['tf']."</td>";
        echo "<td>".$row['nilaitf']."</td>"; 
        echo "<td>".$row['absensipersessi']."</td>";  
        echo "<td>".$row['sikap']."</td>";  
        echo "<td><a href=\"update_nilaitf.php?id_nonf=$row[nonf]\">edit</a> ] 
        <a href=\"delete_nilaitf.php?id_nonf=$row[nonf]\" onClick=\"return confirm('apakah kamu yakin akan menghapus data?')\">delete</a> ]</td>";        
    }
    ?>
    </tbody>
    </table>
<?php
//===================================================================================
require 'template/footer.php';
?>