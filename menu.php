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
    <title>Menu</title>
</head>
<body>
    <button onclick="document.location='table.php'">Table</button>  
    <button onclick="document.location='chart.php'">Chart</button>
    <button onclick="document.location='logout.php'">Logout</button>
</body>
</html>