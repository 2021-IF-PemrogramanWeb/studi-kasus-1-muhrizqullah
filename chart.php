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
    <title>Chart</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
</head>
<body>
    <button onclick="document.location='menu.php'">Back</button>
    <canvas id="chart" style="width:100%"></canvas>
    <?php
    // Koneksikan ke database
    $conn = mysqli_connect("localhost","root","","pweb1");
    //Inisialisasi nilai variabel awal
    $number=null;
    $trend=null;
    //Query SQL
    $sql = "SELECT number, trend FROM trend";
    $result = mysqli_query($conn, $sql);


    while ($data = mysqli_fetch_array($result)) {
        $temp1 = $data['number'];
        $number .= "'$temp1'". ", ";
        $temp2 = $data['trend'];
        $trend .= "'$temp2'". ", ";
    }
    $trend .= "'0'". ", ";
    ?>

    <script>
        var barColors = "blue";

        new Chart("chart", {
        type: "bar",
        data: {
            labels: [<?php echo $number; ?>],
            datasets: [{
            backgroundColor: barColors,
            data: [<?php echo $trend; ?>],
            }]
        },
        options: {
            legend: {display: false},
            title: {
            display: true,
            text: "Chart"
            }
        }
        });
    </script>
</body>
</html>