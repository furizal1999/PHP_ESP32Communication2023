<?php
    include 'connection.php';
?>

<?php

if(isset($_POST["api_key"]) && isset($_POST["temperature1"]) && isset($_POST["humidity1"]) && isset($_POST["temperature2"]) && isset($_POST["humidity2"])) { //tshkhhfpYCgkza1
    if($_POST["api_key"]=="tshkhhfpYCgkza1"){
        $temperature1 = $_POST["temperature1"]; // get temperature value from HTTP GET
        $humidity1 = $_POST["humidity1"];
        $temperature2 = $_POST["temperature2"]; 
        $humidity2 = $_POST["humidity2"];
        $lokasi = "Kos"; //Kos, Lab
        $cuaca = "Hujan"; //Hujan , Panas, Mendung, Cerah
        $luar_dalam = "Luar"; //Luar, Dalam

        
        // Check connection
        if ($connection->connect_error) {
            die("MySQL connection failed: " . $connection->connect_error);
        }

        $sql = "INSERT INTO tb_data (temperature1, temperature2, humidity1, humidity2, lokasi, cuaca, luar_dalam, status_data) VALUES ($temperature1, $temperature2, $humidity1, $humidity2, '$lokasi', '$cuaca', '$luar_dalam', 'Available')";

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