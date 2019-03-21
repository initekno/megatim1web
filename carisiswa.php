<?php
 // Set header type konten.
header("Content-Type: application/json; charset=UTF-8");
require 'config.php';

// Deklarasi variable keyword buah.
$namasiswa = $_GET["query"];

// Query ke database.
//SELECT kelas,lokasibelajar,namasiswa, SUM(nilaitf)AS nilaitotal FROM cloud_nilaitfsiswa GROUP BY namasiswa;
$query  = $conn->query("SELECT namasiswa FROM cloud_induksiswa WHERE namasiswa LIKE '%$namasiswa%' ORDER BY namasiswa ASC");
$result = $query->fetch_all(MYSQLI_ASSOC);

// Format bentuk data untuk autocomplete.
foreach ($result as $data) {
    $output['suggestions'][] = [
        'value' => $data['namasiswa'],
        'namasiswa'  => $data['namasiswa']
    ];
}

if (!empty($output)) {
    // Encode ke format JSON.
    echo json_encode($output);
}
