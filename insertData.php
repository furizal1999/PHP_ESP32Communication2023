<?php 

    require 'koneksi.php';

    $datenow = $now->format("Y-m-d H:i:s");

    $temperature = $_POST['temperature'];
    $humidity = $_POST['humidity'];

    $sql = "INSERT INTO tb_data (temperature, humidity, status_data) VALUES ($temperature, $humidity, 'Available')";

    if ($conn->query($sql) === TRUE) {
        echo json_encode("Ok");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
	$conn->close();
?>