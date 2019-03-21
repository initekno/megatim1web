<?php
//load file kebutuhan
require 'template/header.php'; //load file html atas
require 'config/config_database.php'; //load koneksi
//===================================================================================
$result = $koneksikedatabase->query("SELECT * FROM pdo_nilaitfsiswa ORDER BY session_tentor ASC");
//===================================================================================
?>
<a href="index.php">[ kembali ke menu ]</a><br/><br>
<!--gaya class datatables : cell-border compact order-column hover stripe-->
    <table id="myTable" class="responsive no-wrap compact order-column hover stripe" style="width:100%">
   <thead>
    <tr>
        <th>laporan</th>
        <th>no</th>
        <th>nilai-total</th>
        <th>kode tentor</th>
        <th>tgl entry</th>
    </tr>
   </thead>
    <tbody>
    <?php     
    while($row = $result->fetch(PDO::FETCH_ASSOC)) {         
        echo "<tr>";
        echo "<td><a href=\"cetak_nilaitf.php?id_nilai=$row[id_nilai]\">cetak nilai</a>";
        echo "<td>".$row['id_nilai']."</td>";
        echo "<td>".$row['nilaitf']."</td>";
        echo "<td>".$row['session_tentor']."</td>";  
        echo "<td>".$row['tgl_entry']."</td>";        
    }
    ?>
    </tbody>
    </table>
<?php
//===================================================================================
require 'template/footer.php';
?>