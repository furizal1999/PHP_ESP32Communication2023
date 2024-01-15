<?php
if(isset($_POST["api_key"]) && $_POST["api_key"]=="tshkhhfpYCgkza1") {
   $temp = $_POST["temperature"];
   $hum = $_POST["humidity"];
   $temp_ac = $_POST["temp_ac"];
   $temp_ac_int = round($temp_ac);
   $loc = "100";
   $status = "Available";

   $servername = "localhost";
   $username = "root";
   $password = "";
   $database_name = "db_esp32";
//    // $servername = "sql313.epizy.com";
//    // $username = "epiz_32415163";
//    // $password = "8Zb1F4QSxjKx1QT";
//    // $database_name = "epiz_32415163_furizal_my_id";

   // Create connection
   $conn = mysqli_connect($servername, $username, $password, $database_name);
   // Check connection
   if (!$conn) {
     die("Connection failed: " . mysqli_connect_error());
   }

   $sql = "INSERT INTO tb_data_ac (temp, hum, temp_ac, temp_ac_int, loc, status) VALUES ($temp, $hum, $temp_ac, $temp_ac_int, '$loc', '$status')";
//    echo $sql; die();

   if (mysqli_query($conn, $sql)) {
     echo "New record created successfully";
   } else {
     echo "Error: " . $sql . "<br>" . mysqli_error($conn);
   }

   mysqli_close($conn);

   $connection->close();
} else {
   echo "temperature is not set in the HTTP request";
}
?>