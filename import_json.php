<html>

<head>
    <title>Webslesson Tutorial</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <style>
        .box {
            width: 1250px;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-top: 100px;
        }
    </style>
</head>

<body>
    <div class="container box">
        <h3 align="center">Import JSON data nilai tf siswa</h3><br />
        <a href="index.php" class="logout">
            <--kembali ke menu</a> <?php
                                    $connect = mysqli_connect("localhost", "root", "", "sanggarbelajardb"); //Connect PHP to MySQL Database
                                    $query = '';
                                    $table_data = '';
                                    $filename = "json/jsonproses/xxx.json";
                                    $data = file_get_contents($filename);
                                    $array = json_decode($data, true);
                                    foreach ($array as $row) {
                                        $query .= "INSERT INTO cloud_nilaitfsiswa(absensipersessi, bidangstudi, kelas, lokasibelajar, namasiswa, nilaitf, pekanbelajar, pertemuantf, sikap) VALUES ('" . $row["absensipersessi"] . "', '" . $row["bidangstudi"] . "', '" . $row["kelas"] . "', '" . $row["lokasibelajar"] . "', '" . $row["namasiswa"] . "', '" . $row["nilaitf"] . "', '" . $row["pekanbelajar"] . "', '" . $row["pertemuantf"] . "', '" . $row["sikap"] . "'); ";  // Make Multiple Insert Query 
                                        $table_data .= '
            <tr>
       <td>' . $row["absensipersessi"] . '</td>
       <td>' . $row["bidangstudi"] . '</td>
       <td>' . $row["kelas"] . '</td>
	   <td>' . $row["lokasibelajar"] . '</td>
	   <td>' . $row["namasiswa"] . '</td>
	   <td>' . $row["nilaitf"] . '</td>
	   <td>' . $row["pekanbelajar"] . '</td>
	   <td>' . $row["pertemuantf"] . '</td>
	   <td>' . $row["sikap"] . '</td>
      </tr>
           '; //Data for display on Web page
                                    }
                                    if (mysqli_multi_query($connect, $query)) //Run Mutliple Insert Query
                                        {
                                            echo '<h3>Imported JSON Data</h3><br />';
                                            echo '
      <table class="table table-bordered">
        <tr>
         <th width="45%">absensipersessi</th>
         <th width="10%">bidangstudi</th>
         <th width="45%">kelas</th>
		 <th width="10%">lokasibelajar</th>
		 <th width="10%">namasiswa</th>
		 <th width="10%">nilaitf</th>
		 <th width="10%">pekanbelajar</th>
		 <th width="10%">pertemuantf</th>
		 <th width="10%">sikap</th>
        </tr>
     ';
                                            echo $table_data;
                                            echo '</table>';
                                        }
                                    ?> <br />
    </div>
</body>

</html> 