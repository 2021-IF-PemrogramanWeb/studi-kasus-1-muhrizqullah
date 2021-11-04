<?php 

session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabel</title>
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }
        
        td, th {
            border: 2px solid black;
            text-align: left;
            padding: 12px;
        }
        h2,h6{
            text-align: center;
        }
        </style>
</head>
    <body>
        <button onclick="document.location='menu.php'">Back</button>
        <h2>Tabel</h2>
    </body>
</html>
<?php

$db_host = 'localhost'; // Nama Server
$db_user = 'root'; // User Server
$db_pass = ''; // Password Server
$db_name = 'pweb1'; // Nama Database

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
if (!$conn) {
 die ('Gagal terhubung MySQL: ' . mysqli_connect_error()); 
}

$sql = 'SELECT *
  FROM trend';
  
$query = mysqli_query($conn, $sql);

if (!$query) {
 die ('SQL Error: ' . mysqli_error($conn));
}

echo '
<table>
  <thead>
   <tr>
    <th>No</th>
    <th>Reason</th>
    <th>Trend of Reason</th>
   </tr>
  </thead>
  <tbody>';
  
while ($row = mysqli_fetch_array($query))
{
 echo '
    <tr>
        <td>'.$row['number'].'</td>
        <td>'.$row['reason'].'</td>
        <td>'.$row['trend'].'</td>
    </tr>';
}
echo '
    </tbody>
</table>';

// Apakah kita perlu menjalankan fungsi mysqli_free_result() ini? baca bagian VII
mysqli_free_result($query);

// Apakah kita perlu menjalankan fungsi mysqli_close() ini? baca bagian VII
mysqli_close($conn);