<?php
//load file kebutuhan
require 'template/header.php'; //load file html atas
require 'config/config_database.php'; //load koneksi
//===================================================================================
?>
<a href="index.php">[ kembali ke menu ]</a><br/><br/>
    <form method="post" >
        <table class="tableForm" width="70%" border="1">
            <tr>
                <td>* simpan dalam format .sql</td>
                <td><input type="submit" name="btnbackup" value="backup database"> * klik backup database untuk menyimpan keseluruhan data dalam format .sql</td>
            </tr>
            <tr>
                <td><input type="file" name="filesql" id="filesql"></td>
                <td><input type="submit" name="btnrestore" value="restore database"> * klik restore database untuk ngembalikan backup data ke sistem. ( dalam format .sql )
            </td>
            </tr>
        </table>
    </form>