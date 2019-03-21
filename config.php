<?php
/* settingan koneksi myhosting
/* $conn = mysqli_connect("localhost", "initekno_megatim", "1Q2W3E4R5T6y7u8i9o0p", "initekno_siramkanwilmegatim1");
/*koneksi ke database*/

//-------------------------------------------------------------------------------------
/*versi mysqli*/
$conn = mysqli_connect("localhost", "root", "", "sanggarbelajardb");
function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}
