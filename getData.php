<?php
$dbDetails = array(
    'host' => 'localhost',
    'user' => 'root',
    'pass' => '',
    'db'   => 'sanggarbelajardb'
);
$table = 'cloud_nilaitfsiswa';
$primaryKey = 'id';
$columns = array(
    array( 'db' => 'namasiswa', 'dt' => 0 ),
    array( 'db' => 'kelas',  'dt' => 1 ),
    array( 'db' => 'lokasibelajar', 'dt' => 2 ),
    array( 'db' => 'bidangstudi',  'dt' => 3 ),
    array( 'db' => 'pekanbelajar', 'dt' => 4 ),
    array( 'db' => 'pertemuantf', 'dt' => 5 ),
    array( 'db' => 'nilaitf', 'dt' => 6 ),
    array( 'db' => 'sikap', 'dt' => 7 ),
    array( 'db' => 'absensipersessi', 'dt' => 8 )
);
require( 'ssp.class.php' );
echo json_encode(
    SSP::simple( $_GET, $dbDetails, $table, $primaryKey, $columns )
);