<?php
//load file kebutuhan
require 'template/header.php'; //load file html atas
require 'config/config_database.php'; //load koneksi
//===================================================================================
if(isset($_POST['btnsimpan'])) {    
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
    } else { 
        // dan jika form tidak kosong dan sudah di isi semua
        //maka proses form di jalankan
        //masukkan ke database   
        //INSERT INTO `pdo_nilaitfsiswa` (`id_nilai`, `session_tentor`, `id_pekan`, `id_mapel`, `id_tf`, `id_kelas`, `id_siswa`, `id_sikap`, `nilaitf`, `absensipersessi`, `tgl_entry`, `id_tentor`) VALUES (NULL, 'BYD', '1', '2', '1', '1', '1', '1', '90', 'Hadir', CURRENT_TIMESTAMP, '1');
        $query = "INSERT INTO pdo_nilaitfsiswa(nilaitf, session_tentor) VALUES(:nilaitf, :session_tentor)";
        $proses = $koneksikedatabase->prepare($query);

        $proses->bindparam(':nilaitf', $nilaitf);
        $proses->bindparam(':session_tentor', $session_tentor);
        $proses->execute();

        //tampilkan pesan berhasil
        echo "<font color='green'>Data berhasil di simpan.";
    }
}
//===================================================================================
?>
<a href="tampil_nilaitf.php">[ lihat nilai ]</a>
   <br/><br/>
     <form method="post">
        <table class="tableForm" width="50%" border="1">
            <tr> 
                <td>nilai tf</td>
                <td><input type="number" name="nilaitf" placeholder="contoh : 70"> * nilai harus diisi angka puluhan</td>
            </tr>
            <tr> 
                <td>kode tentor</td>
                <td><input type="text" name="session_tentor" placeholder="contoh : BRT"></td>
            </tr>
            <tr> 
                <td></td>
                <td><input type="submit" name="btnsimpan" value="simpan data"></td>
            </tr>
        </table>
    </form><br>

    <form>
        <table class="tableForm" width="50%" border="1">
                        <tr> 
                <td>kode tentor</td>
                <td><input class="nonaktifForm" type="text" name="session_tentor" placeholder="contoh : BRT"> *terisi otomatis ketika sudah login</td>
            </tr>
            <tr> 
                <td>pekan belajar</td>
                <td>
                     <select name="kelas">
                          <option value="0">-- pilih pekan belajar --</option>
  <option value="volvo">pekan 1</option>
  <option value="saab">pekan 2</option>
  <option value="fiat">pekan 3</option>
  <option value="audi">pekan 4</option>
</select> 
                </td>
            </tr>
                        <tr> 
                <td>mapel</td>
                <td>
                     <select name="kelas">
                          <option value="0">-- pilih mapel --</option>
  <option value="volvo">b.indo</option>
  <option value="saab">b.ing</option>
  <option value="fiat">kimia</option>
  <option value="audi">fisika</option>
</select> 
                </td>
            </tr>
                        <tr> 
                <td>pertemuan tf</td>
                <td>
                     <select name="kelas">
                          <option value="0">-- pilih pertemuan --</option>
  <option value="volvo">tf 1</option>
  <option value="saab">tf 2</option>
  <option value="fiat">tf 3</option>
  <option value="audi">tf 4</option>
</select> 
                </td>
            </tr>
            <tr> 
                <td>cabang</td>
                <td>
                     <select name="kelas">
                         <option value="0">-- pilih cabang --</option>
  <option value="volvo">buaran</option>
  <option value="saab">penggilingan</option>
  <option value="fiat">pondok bambu</option>
  <option value="audi">perumnas klender</option>
</select> * kelas akan muncul sesuai lokasi yang dipilih
                </td>
            </tr>
            <tr> 
                <td>kelas</td>
                <td>
                     <select name="kelas">
                         <option value="0">-- pilih kelas --</option>
  <option value="volvo">153E001</option>
  <option value="saab">153P001</option>
  <option value="fiat">153G001</option>
  <option value="audi">153H001</option>
</select> * siswa akan muncul ketika kelas dipilih
                </td>
            </tr>
        </table><br>

        <table class="tableForm" width="70%" border="1">
            <!--batas data-->
                <tr> 
                    <td>1</td>
                    <td>105-90-9870</td>
                <td>ABDUL AZAM</td>
                <td><input type="text" name="session_tentor" placeholder="diisi nilai tf.."></td>
                <td>
                     <select name="kelas">
                         <option value="0">-- pilih sikap --</option>
  <option value="volvo">G = Baik</option>
  <option value="saab">H = Tidak ada di kelas</option>
</select>
                </td>
                <td>
                    <input type="radio" name="gender" value="hadir" checked> H
                    <input type="radio" name="gender" value="telat" checked> T
                    <input type="radio" name="gender" value="sakit" checked> S
                    <input type="radio" name="gender" value="ijin" checked> I
                    <input type="radio" name="gender" value="alpha" checked> A
                </td>
            </tr>
            <!--batas data-->
                <tr> 
                    <td>1</td>
                    <td>105-90-9870</td>
                <td>ABDUL AZAM</td>
                <td><input type="text" name="session_tentor" placeholder="diisi nilai tf.."></td>
                <td>
                     <select name="kelas">
                         <option value="0">-- pilih sikap --</option>
  <option value="volvo">G = Baik</option>
  <option value="saab">H = Tidak ada di kelas</option>
</select>
                </td>
                <td>
                    <input type="radio" name="gender" value="hadir" checked> H
                    <input type="radio" name="gender" value="telat" checked> T
                    <input type="radio" name="gender" value="sakit" checked> S
                    <input type="radio" name="gender" value="ijin" checked> I
                    <input type="radio" name="gender" value="alpha" checked> A
                </td>
            </tr>
            <!--batas data-->
                <tr> 
                    <td>1</td>
                    <td>105-90-9870</td>
                <td>ABDUL AZAM</td>
                <td><input type="text" name="session_tentor" placeholder="diisi nilai tf.."></td>
                <td>
                     <select name="kelas">
                         <option value="0">-- pilih sikap --</option>
  <option value="volvo">G = Baik</option>
  <option value="saab">H = Tidak ada di kelas</option>
</select>
                </td>
                <td>
                    <input type="radio" name="gender" value="hadir" checked> H
                    <input type="radio" name="gender" value="telat" checked> T
                    <input type="radio" name="gender" value="sakit" checked> S
                    <input type="radio" name="gender" value="ijin" checked> I
                    <input type="radio" name="gender" value="alpha" checked> A
                </td>
            </tr>
            <!--batas data-->
                <tr> 
                    <td>1</td>
                    <td>105-90-9870</td>
                <td>ABDUL AZAM</td>
                <td><input type="text" name="session_tentor" placeholder="diisi nilai tf.."></td>
                <td>
                     <select name="kelas">
                         <option value="0">-- pilih sikap --</option>
  <option value="volvo">G = Baik</option>
  <option value="saab">H = Tidak ada di kelas</option>
</select>
                </td>
                <td>
                    <input type="radio" name="gender" value="hadir" checked> H
                    <input type="radio" name="gender" value="telat" checked> T
                    <input type="radio" name="gender" value="sakit" checked> S
                    <input type="radio" name="gender" value="ijin" checked> I
                    <input type="radio" name="gender" value="alpha" checked> A
                </td>
            </tr>
            <!--batas data-->
                <tr> 
                    <td>1</td>
                    <td>105-90-9870</td>
                <td>ABDUL AZAM</td>
                <td><input type="text" name="session_tentor" placeholder="diisi nilai tf.."></td>
                <td>
                     <select name="kelas">
                         <option value="0">-- pilih sikap --</option>
  <option value="volvo">G = Baik</option>
  <option value="saab">H = Tidak ada di kelas</option>
</select>
                </td>
                <td>
                    <input type="radio" name="gender" value="hadir" checked> H
                    <input type="radio" name="gender" value="telat" checked> T
                    <input type="radio" name="gender" value="sakit" checked> S
                    <input type="radio" name="gender" value="ijin" checked> I
                    <input type="radio" name="gender" value="alpha" checked> A
                </td>
            </tr>
            <!--batas data-->
                <tr> 
                    <td>1</td>
                    <td>105-90-9870</td>
                <td>ABDUL AZAM</td>
                <td><input type="text" name="session_tentor" placeholder="diisi nilai tf.."></td>
                <td>
                     <select name="kelas">
                         <option value="0">-- pilih sikap --</option>
  <option value="volvo">G = Baik</option>
  <option value="saab">H = Tidak ada di kelas</option>
</select>
                </td>
                <td>
                    <input type="radio" name="gender" value="hadir" checked> H
                    <input type="radio" name="gender" value="telat" checked> T
                    <input type="radio" name="gender" value="sakit" checked> S
                    <input type="radio" name="gender" value="ijin" checked> I
                    <input type="radio" name="gender" value="alpha" checked> A
                </td>
            </tr>
            <!--batas data-->
                <tr> 
                    <td>1</td>
                    <td>105-90-9870</td>
                <td>ABDUL AZAM</td>
                <td><input type="text" name="session_tentor" placeholder="diisi nilai tf.."></td>
                <td>
                     <select name="kelas">
                         <option value="0">-- pilih sikap --</option>
  <option value="volvo">G = Baik</option>
  <option value="saab">H = Tidak ada di kelas</option>
</select>
                </td>
                <td>
                    <input type="radio" name="gender" value="hadir" checked> H
                    <input type="radio" name="gender" value="telat" checked> T
                    <input type="radio" name="gender" value="sakit" checked> S
                    <input type="radio" name="gender" value="ijin" checked> I
                    <input type="radio" name="gender" value="alpha" checked> A
                </td>
            </tr>
            <!--batas data-->
                <tr> 
                    <td>1</td>
                    <td>105-90-9870</td>
                <td>ABDUL AZAM</td>
                <td><input type="text" name="session_tentor" placeholder="diisi nilai tf.."></td>
                <td>
                     <select name="kelas">
                         <option value="0">-- pilih sikap --</option>
  <option value="volvo">G = Baik</option>
  <option value="saab">H = Tidak ada di kelas</option>
</select>
                </td>
                <td>
                    <input type="radio" name="gender" value="hadir" checked> H
                    <input type="radio" name="gender" value="telat" checked> T
                    <input type="radio" name="gender" value="sakit" checked> S
                    <input type="radio" name="gender" value="ijin" checked> I
                    <input type="radio" name="gender" value="alpha" checked> A
                </td>
            </tr>
            <!--batas data-->
        </table>
        <p>* periksa kembali sebelum klik simpan data</p>
        <input type="submit" name="btnsimpan" value="simpan data">
    </form>

<?php
//===================================================================================
require 'template/footer.php';
?>