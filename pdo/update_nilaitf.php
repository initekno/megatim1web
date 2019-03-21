<?php
//load file kebutuhan
require 'template/header.php'; //load file html atas
require 'config/config_database.php'; //load koneksi
//===================================================================================
//menangkap klik dari button simpan update
if(isset($_POST['btnupdate']))
{    
    //menangkap parameter dari form update
    $id_nilai = $_POST['id_nilai']; //digunakan untuk where query
    $nilaitf = $_POST['nilaitf'];
    $session_tentor = $_POST['session_tentor'];    
    
    // cek file jika kosong
    if(empty($nilaitf) || empty($session_tentor)) { 
        if(empty($nilaitf)) {
            echo "<font color='red'>nilai tf harus diisi !</font><br/>";
        }
        if(empty($session_tentor)) {
            echo "<font color='red'>kode tentor harus diisi!</font><br/>";
        }
        //link untuk kembali ke menu utama
        echo "<br/><a href='javascript:self.history.back();'>kembali</a>";       
    } else {    
        // dan jika form tidak kosong dan sudah di isi semua
        //maka proses form di jalankan
        //update database di jalankan
        $query = "UPDATE pdo_nilaitfsiswa SET nilaitf=:nilaitf, session_tentor=:session_tentor WHERE id_nilai=:id_nilai";
        $proses = $koneksikedatabase->prepare($query);
                
        $proses->bindparam(':id_nilai', $id_nilai, PDO::PARAM_INT);
        $proses->bindparam(':nilaitf', $nilaitf, PDO::PARAM_STR);
        $proses->bindparam(':session_tentor', $session_tentor, PDO::PARAM_STR);
        $proses->execute();
        
        //arahkan ke tampil nilai tf 
        header("location: tampil_nilaitf.php");
    }
}

?>
<?php
//===================================================================================
//mengambil parameter id_nilai dari tabel tampil nilaitf
//untuk di tampilkan pada form edit
$id_nonf = $_GET['id_nonf'];

//$query = "SELECT * FROM pdo_nilaitfsiswa WHERE id_nilai=:id_nilai";
$query = 
    //query join banyak table
    "SELECT 
    pdo_induksiswa.nonf,
    pdo_induksiswa.nama_siswa,
    pdo_pekanbelajar.pekan,
    pdo_kelas.kelas,
    sanggar_mapel.nama_mapel,
    pdo_pertemuantf.tf,
    pdo_nilaitfsiswa.session_tentor,
    pdo_nilaitfsiswa.nilaitf,
    pdo_nilaitfsiswa.absensipersessi,
    pdo_nilaitfsiswa.tgl_entry,
    pdo_sikap.sikap 
    FROM pdo_nilaitfsiswa
    INNER JOIN pdo_induksiswa ON pdo_induksiswa.id_siswa=pdo_nilaitfsiswa.id_siswa
    INNER JOIN pdo_pekanbelajar ON pdo_pekanbelajar.id_pekan=pdo_nilaitfsiswa.id_pekan
    INNER JOIN pdo_kelas ON pdo_kelas.id_kelas=pdo_nilaitfsiswa.id_kelas
    INNER JOIN sanggar_mapel ON sanggar_mapel.id_mapel=pdo_nilaitfsiswa.id_mapel
    INNER JOIN pdo_pertemuantf ON pdo_pertemuantf.id_tf=pdo_nilaitfsiswa.id_tf
    INNER JOIN pdo_sikap ON pdo_sikap.id_sikap=pdo_nilaitfsiswa.id_sikap
    WHERE pdo_induksiswa.nonf=:id_nonf";
$proses = $koneksikedatabase->prepare($query);
$proses->execute(array(':id_nonf' => $id_nonf));

while($row = $proses->fetch(PDO::FETCH_ASSOC))
{
    $nilaitf = $row['nilaitf'];
    $session_tentor = $row['session_tentor'];
}
//===================================================================================
?>

<a href="tampil_nilaitf.php">[ lihat nilai ]</a><br/><br/>
    <form method="post" >
        <table class="tableForm" width="40%" border="1">
            <tr>                
            <td>id</td>
                <td><input class="nonaktifForm" type="text" name="id_nilai" value=<?php echo $_GET['id_nonf'];?> readonly="readonly"> * nomor identitas data</td>
            </tr>
            <tr> 
                <td>nilai tf</td>
                <td><input type="text" name="nilaitf" value="<?php echo $nilaitf;?>" placeholder="contoh : 70"></td>
            </tr>
            <tr> 
                <td>kode tentor</td>
                <td><input type="text" name="session_tentor" value="<?php echo $session_tentor;?>" placeholder="contoh : BRT"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="btnupdate" value="simpan update"></td>
            </tr>
        </table>
    </form>
    
<?php
//===================================================================================
require 'template/footer.php';
?>