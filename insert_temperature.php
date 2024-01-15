<?php
if(isset($_POST["api_key"]) && $_POST["api_key"]=="tshkhhfpYCgkza1") {
   $temp = $_POST["temperature"];
   $hum = $_POST["humidity"];
   $fan_speed = $_POST["fan_speed"];
   $loc = "11";
   $status = "Available";

   $servername = "localhost";
   $username = "root";
   $password = "";
   $database_name = "db_ESP32";
   // $servername = "sql313.epizy.com";
   // $username = "epiz_32415163";
   // $password = "8Zb1F4QSxjKx1QT";
   // $database_name = "epiz_32415163_furizal_my_id";

   // Create connection
   $conn = mysqli_connect($servername, $username, $password, $database_name);
   // Check connection
   if (!$conn) {
     die("Connection failed: " . mysqli_connect_error());
   }

   $sql = "INSERT INTO tb_data (temp, hum, fan_speed, loc, status) VALUES ($temp, $hum, $fan_speed, '$loc', '$status')";
   // echo $sql; die();

   if (mysqli_query($conn, $sql)) {
     echo "New record created successfully";
   } else {
     echo "Error: " . $sql . "<br>" . mysqli_error($conn);
   }

   mysqli_close($conn);

//    $connection->close();
} else {
   echo "temperature is not set in the HTTP request";
}
?>