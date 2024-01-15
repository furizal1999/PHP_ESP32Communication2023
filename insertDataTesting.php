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

        $sql = "
        SELECT
          (SELECT lamp_status FROM tb_light_status WHERE lamp_to = 1 AND status_data='Available' ORDER BY id_light_status DESC LIMIT 1) AS lamp_status1,
          (SELECT lamp_status FROM tb_light_status WHERE lamp_to = 2 AND status_data='Available' ORDER BY id_light_status DESC LIMIT 1) AS lamp_status2,
          (SELECT lamp_status FROM tb_light_status WHERE lamp_to = 3 AND status_data='Available' ORDER BY id_light_status DESC LIMIT 1) AS lamp_status3,
          (SELECT lamp_status FROM tb_light_status WHERE lamp_to = 4 AND status_data='Available' ORDER BY id_light_status DESC LIMIT 1) AS lamp_status4,
          (SELECT lamp_status FROM tb_light_status WHERE lamp_to = 5 AND status_data='Available' ORDER BY id_light_status DESC LIMIT 1) AS lamp_status5,
          (SELECT lamp_status FROM tb_light_status WHERE lamp_to = 6 AND status_data='Available' ORDER BY id_light_status DESC LIMIT 1) AS lamp_status6,
          (SELECT lamp_status FROM tb_light_status WHERE lamp_to = 7 AND status_data='Available' ORDER BY id_light_status DESC LIMIT 1) AS lamp_status7,
          (SELECT lamp_status FROM tb_light_status WHERE lamp_to = 8 AND status_data='Available' ORDER BY id_light_status DESC LIMIT 1) AS lamp_status8,
          (SELECT lamp_status FROM tb_light_status WHERE lamp_to = 9 AND status_data='Available' ORDER BY id_light_status DESC LIMIT 1) AS lamp_status9,
          (SELECT lamp_status FROM tb_light_status WHERE lamp_to = 10 AND status_data='Available' ORDER BY id_light_status DESC LIMIT 1) AS lamp_status10;
          ";

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