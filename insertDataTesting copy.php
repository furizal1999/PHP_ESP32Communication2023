<?php
    include 'connection.php';
    $dataToSend = array(
        "temperature" => 23.2,
        "humidity" => 80.1,
        "status" => "OK"
    );

    header('Content-Type: application/json');
    echo json_encode($dataToSend);
?>

<?php

if(isset($_POST["api_key"]) && isset($_POST["temperature"]) && isset($_POST["humidity"])) { //tshkhhfpYCgkza1
    if($_POST["api_key"]=="tshkhhfpYCgkza1"){
        $temperature = $_POST["temperature"]; // get temperature value from HTTP GET
        $humidity = $_POST["humidity"];
        // $fanSpeed = $_POST["fanSpeed"]; 
        $posisi = "10"; //Kos, Lab

        
        // Check connection
        if ($connection->connect_error) {
            die("MySQL connection failed: " . $connection->connect_error);
        }

        $sql = "INSERT INTO tb_data_testing (temperature, humidity, posisi, status_data) VALUES ($temperature, $humidity, '$posisi', 'Available')";

        if ($connection->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . " => " . $connection->error;
        }

        $connection->close();
    }else{
        echo "API key is invalid..";
    }
   
} else {
   echo "temperature is not set in the HTTP request..";
}
?>