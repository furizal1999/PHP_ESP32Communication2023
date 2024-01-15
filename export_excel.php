<?php
    include 'connection.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>Export Data Ke Excel Dengan PHP - www.malasngoding.com</title>
</head>
<body>
	<style type="text/css">
	body{
		font-family: sans-serif;
	}
	table{
		margin: 20px auto;
		border-collapse: collapse;
	}
	table th,
	table td{
		border: 1px solid #3c3c3c;
		padding: 3px 8px;
 
	}
	a{
		background: blue;
		color: #fff;
		padding: 8px 10px;
		text-decoration: none;
		border-radius: 2px;
	}
	</style>
 
	<?php
	header("Content-type: application/vnd-ms-excel");
	header("Content-Disposition: attachment; filename=DataTemperature.xls");
	?>
 
 <center>
		<h1>DHT11 = <?= mysqli_num_rows(mysqli_query($connection, "SELECT * FROM tb_data")) ?></h1>
	</center>
 
	<table border="1">
		<tr>
			<th></th>
			<th>Count</th>
		</tr>
		<tr>
			<?php
				$query = mysqli_query($connection, "SELECT count(id_data) AS count FROM tb_data");
				$all_data1 = mysqli_fetch_row($query);			
			?>
			<td>ALL</
			<td><?= $all_data1[0] ?></td>
		</tr>
		<tr>
			<?php
				$query = mysqli_query($connection, "SELECT count(id_data) AS count FROM tb_data WHERE lokasi='Kos' AND cuaca='Hujan' AND luar_dalam='Dalam'");
				$indoor_rainy1 = mysqli_fetch_row($query);			
			?>
			<td>INDOOR (RAINY)</td>

			<td><?= $indoor_rainy1[0] ?></td>
		</tr>
		<tr>
			<?php
				$query = mysqli_query($connection, "SELECT count(id_data) AS count FROM tb_data WHERE lokasi='Kos' AND cuaca='Cerah' AND luar_dalam='Dalam'");
				$indoor_sunny1 = mysqli_fetch_row($query);			
			?>
			<td>INDOOR (SUNNY)</td>

			<td><?= $indoor_sunny1[0] ?></td>
		</tr>
		<tr>
			<?php
				$query = mysqli_query($connection, "SELECT count(id_data) AS count FROM tb_data WHERE lokasi='Kos' AND cuaca='Mendung' AND luar_dalam='Dalam'");
				$indoor_cloudy1 = mysqli_fetch_row($query);			
			?>
			<td>INDOOR (CLOUDY)</td>
	
			<td><?= $indoor_cloudy1[0] ?></td>
		</tr>

		<tr>
			<?php
				$query = mysqli_query($connection, "SELECT count(id_data) AS count FROM tb_data WHERE lokasi='Kos' AND cuaca='Hujan' AND luar_dalam='Luar'");
				$outdoor_rainy1 = mysqli_fetch_row($query);			
			?>
			<td>OUTDOOR (RAINY)</td>
	
			<td><?= $outdoor_rainy1[0] ?></td>
		</tr>
		<tr>
			<?php
				$query = mysqli_query($connection, "SELECT count(id_data) AS count FROM tb_data WHERE lokasi='Kos' AND cuaca='Cerah' AND luar_dalam='Luar'");
				$outdoor_sunny1 = mysqli_fetch_row($query);			
			?>
			<td>OUTDOOR (SUNNY)</td>
	
			<td><?= $outdoor_sunny1[0] ?></td>
		</tr>
		<tr>
			<?php
				$query = mysqli_query($connection, "SELECT count(id_data) AS count FROM tb_data WHERE lokasi='Kos' AND cuaca='Mendung' AND luar_dalam='Luar'");
				$outdoor_cloudy1 = mysqli_fetch_row($query);			
			?>
			<td>OUTDOOR (CLOUDY)</td>
		
			<td><?= $outdoor_cloudy1[0] ?></td>
		</tr>
		<tr>
			<?php
				$query = mysqli_query($connection, "SELECT count(id_data) AS count FROM tb_data WHERE lokasi='Lab' ");
				$ac_room = mysqli_fetch_row($query);			
			?>
			<td>AC ROOM</td>
			<td><?= $ac_room[0] ?></td>
		</tr>
	</table>
	
	

	<center>
		<h1>DHT11 = <?= mysqli_num_rows(mysqli_query($connection, "SELECT * FROM tb_data")) ?></h1>
	</center>
 
	<table border="1">
		<tr>
			<th></th>
			<th>Min</th>
			<th>Max</th>
			<th>Avg</th>
		</tr>
		<tr>
			<?php
				$query = mysqli_query($connection, "SELECT MIN(temperature1) AS min, MAX(temperature1) AS max, AVG(temperature1) AS avg FROM tb_data");
				$all_data1 = mysqli_fetch_row($query);			
			?>
			<td>ALL</
			<td><?= $all_data1[0] ?></td>
			<td><?= $all_data1[1] ?></td>
			<td><?= round($all_data1[2], 2) ?></td>
		</tr>
		<tr>
			<?php
				$query = mysqli_query($connection, "SELECT MIN(temperature1) AS min, MAX(temperature1) AS max, AVG(temperature1) AS avg FROM tb_data WHERE lokasi='Kos' AND cuaca='Hujan' AND luar_dalam='Dalam'");
				$indoor_rainy1 = mysqli_fetch_row($query);			
			?>
			<td>INDOOR (RAINY)</td>

			<td><?= $indoor_rainy1[0] ?></td>
			<td><?= $indoor_rainy1[1] ?></td>
			<td><?= round($indoor_rainy1[2], 2) ?></td>
		</tr>
		<tr>
			<?php
				$query = mysqli_query($connection, "SELECT MIN(temperature1) AS min, MAX(temperature1) AS max, AVG(temperature1) AS avg FROM tb_data WHERE lokasi='Kos' AND cuaca='Cerah' AND luar_dalam='Dalam'");
				$indoor_sunny1 = mysqli_fetch_row($query);			
			?>
			<td>INDOOR (SUNNY)</td>

			<td><?= $indoor_sunny1[0] ?></td>
			<td><?= $indoor_sunny1[1] ?></td>
			<td><?= round($indoor_sunny1[2], 2) ?></td>
		</tr>
		<tr>
			<?php
				$query = mysqli_query($connection, "SELECT MIN(temperature1) AS min, MAX(temperature1) AS max, AVG(temperature1) AS avg FROM tb_data WHERE lokasi='Kos' AND cuaca='Mendung' AND luar_dalam='Dalam'");
				$indoor_cloudy1 = mysqli_fetch_row($query);			
			?>
			<td>INDOOR (CLOUDY)</td>
	
			<td><?= $indoor_cloudy1[0] ?></td>
			<td><?= $indoor_cloudy1[1] ?></td>
			<td><?= round($indoor_cloudy1[2], 2) ?></td>
		</tr>

		<tr>
			<?php
				$query = mysqli_query($connection, "SELECT MIN(temperature1) AS min, MAX(temperature1) AS max, AVG(temperature1) AS avg FROM tb_data WHERE lokasi='Kos' AND cuaca='Hujan' AND luar_dalam='Luar'");
				$outdoor_rainy1 = mysqli_fetch_row($query);			
			?>
			<td>OUTDOOR (RAINY)</td>
	
			<td><?= $outdoor_rainy1[0] ?></td>
			<td><?= $outdoor_rainy1[1] ?></td>
			<td><?= round($outdoor_rainy1[2], 2) ?></td>
		</tr>
		<tr>
			<?php
				$query = mysqli_query($connection, "SELECT MIN(temperature1) AS min, MAX(temperature1) AS max, AVG(temperature1) AS avg FROM tb_data WHERE lokasi='Kos' AND cuaca='Cerah' AND luar_dalam='Luar'");
				$outdoor_sunny1 = mysqli_fetch_row($query);			
			?>
			<td>OUTDOOR (SUNNY)</td>
	
			<td><?= $outdoor_sunny1[0] ?></td>
			<td><?= $outdoor_sunny1[1] ?></td>
			<td><?= round($outdoor_sunny1[2], 2) ?></td>
		</tr>
		<tr>
			<?php
				$query = mysqli_query($connection, "SELECT MIN(temperature1) AS min, MAX(temperature1) AS max, AVG(temperature1) AS avg FROM tb_data WHERE lokasi='Kos' AND cuaca='Mendung' AND luar_dalam='Luar'");
				$outdoor_cloudy1 = mysqli_fetch_row($query);			
			?>
			<td>OUTDOOR (CLOUDY)</td>
		
			<td><?= $outdoor_cloudy1[0] ?></td>
			<td><?= $outdoor_cloudy1[1] ?></td>
			<td><?= round($outdoor_cloudy1[2], 2) ?></td>
		</tr>
		<tr>
			<?php
				$query = mysqli_query($connection, "SELECT MIN(temperature1) AS min, MAX(temperature1) AS max, AVG(temperature1) AS avg FROM tb_data WHERE lokasi='Lab' ");
				$ac_room = mysqli_fetch_row($query);			
			?>
			<td>AC ROOM</td>
			<td><?= $ac_room[0] ?></td>
			<td><?= $ac_room[1] ?></td>
			<td><?= round($ac_room[2], 2) ?></td>
		</tr>
	</table>

	<center>
		<h1>DHT22 = <?= mysqli_num_rows(mysqli_query($connection, "SELECT * FROM tb_data")) ?></h1>
	</center>
 
	<table border="1">
		<tr>
			<th></th>
			<th>Min</th>
			<th>Max</th>
			<th>Avg</th>
		</tr>
		<tr>
			<?php
				$query = mysqli_query($connection, "SELECT MIN(temperature2) AS min, MAX(temperature2) AS max, AVG(temperature2) AS avg FROM tb_data");
				$all_data2 = mysqli_fetch_row($query);			
			?>
			<td>ALL</td>
			<td><?= $all_data2[0] ?></td>
			<td><?= $all_data2[1] ?></td>
			<td><?= round($all_data2[2], 2) ?></td>
		</tr>
		<tr>
			<?php
				$query = mysqli_query($connection, "SELECT MIN(temperature2) AS min, MAX(temperature2) AS max, AVG(temperature2) AS avg FROM tb_data WHERE lokasi='Kos' AND cuaca='Hujan' AND luar_dalam='Dalam'");
				$indoor_rainy2 = mysqli_fetch_row($query);			
			?>
			<td>INDOOR (RAINY)</td>

			<td><?= $indoor_rainy2[0] ?></td>
			<td><?= $indoor_rainy2[1] ?></td>
			<td><?= round($indoor_rainy2[2], 2) ?></td>
		</tr>
		<tr>
			<?php
				$query = mysqli_query($connection, "SELECT MIN(temperature2) AS min, MAX(temperature2) AS max, AVG(temperature2) AS avg FROM tb_data WHERE lokasi='Kos' AND cuaca='Cerah' AND luar_dalam='Dalam'");
				$indoor_sunny2 = mysqli_fetch_row($query);			
			?>
			<td>INDOOR (SUNNY)</td>

			<td><?= $indoor_sunny2[0] ?></td>
			<td><?= $indoor_sunny2[1] ?></td>
			<td><?= round($indoor_sunny2[2], 2) ?></td>
		</tr>
		<tr>
			<?php
				$query = mysqli_query($connection, "SELECT MIN(temperature2) AS min, MAX(temperature2) AS max, AVG(temperature2) AS avg FROM tb_data WHERE lokasi='Kos' AND cuaca='Mendung' AND luar_dalam='Dalam'");
				$indoor_cloudy2 = mysqli_fetch_row($query);			
			?>
			<td>INDOOR (CLOUDY)</td>
	
			<td><?= $indoor_cloudy2[0] ?></td>
			<td><?= $indoor_cloudy2[1] ?></td>
			<td><?= round($indoor_cloudy2[2], 2) ?></td>
		</tr>

		<tr>
			<?php
				$query = mysqli_query($connection, "SELECT MIN(temperature2) AS min, MAX(temperature2) AS max, AVG(temperature2) AS avg FROM tb_data WHERE lokasi='Kos' AND cuaca='Hujan' AND luar_dalam='Luar'");
				$outdoor_rainy2 = mysqli_fetch_row($query);			
			?>
			<td>OUTDOOR (RAINY)</td>
	
			<td><?= $outdoor_rainy2[0] ?></td>
			<td><?= $outdoor_rainy2[1] ?></td>
			<td><?= round($outdoor_rainy2[2], 2) ?></td>
		</tr>
		<tr>
			<?php
				$query = mysqli_query($connection, "SELECT MIN(temperature2) AS min, MAX(temperature2) AS max, AVG(temperature2) AS avg FROM tb_data WHERE lokasi='Kos' AND cuaca='Cerah' AND luar_dalam='Luar'");
				$outdoor_sunny2 = mysqli_fetch_row($query);			
			?>
			<td>OUTDOOR (SUNNY)</td>
	
			<td><?= $outdoor_sunny2[0] ?></td>
			<td><?= $outdoor_sunny2[1] ?></td>
			<td><?= round($outdoor_sunny2[2], 2) ?></td>
		</tr>
		<tr>
			<?php
				$query = mysqli_query($connection, "SELECT MIN(temperature2) AS min, MAX(temperature2) AS max, AVG(temperature2) AS avg FROM tb_data WHERE lokasi='Kos' AND cuaca='Mendung' AND luar_dalam='Luar'");
				$outdoor_cloudy2 = mysqli_fetch_row($query);			
			?>
			<td>OUTDOOR (CLOUDY)</td>
		
			<td><?= $outdoor_cloudy2[0] ?></td>
			<td><?= $outdoor_cloudy2[1] ?></td>
			<td><?= round($outdoor_cloudy2[2], 2) ?></td>
		</tr>
		<tr>
			<?php
				$query = mysqli_query($connection, "SELECT MIN(temperature2) AS min, MAX(temperature2) AS max, AVG(temperature2) AS avg FROM tb_data WHERE lokasi='Lab' ");
				$ac_room2 = mysqli_fetch_row($query);			
			?>
			<td>AC ROOM</td>
			<td><?= $ac_room2[0] ?></td>
			<td><?= $ac_room2[1] ?></td>
			<td><?= round($ac_room2[2], 2) ?></td>
		</tr>
	</table>




	<center>
		<h1>DHT11 HUMI = <?= mysqli_num_rows(mysqli_query($connection, "SELECT * FROM tb_data")) ?></h1>
	</center>
 
	<table border="1">
		<tr>
			<th></th>
			<th>Min</th>
			<th>Max</th>
			<th>Avg</th>
		</tr>
		<tr>
			<?php
				$query = mysqli_query($connection, "SELECT MIN(humidity1) AS min, MAX(humidity1) AS max, AVG(humidity1) AS avg FROM tb_data");
				$all_data1 = mysqli_fetch_row($query);			
			?>
			<td>ALL</
			<td><?= $all_data1[0] ?></td>
			<td><?= $all_data1[1] ?></td>
			<td><?= round($all_data1[2], 2) ?></td>
		</tr>
		<tr>
			<?php
				$query = mysqli_query($connection, "SELECT MIN(humidity1) AS min, MAX(humidity1) AS max, AVG(humidity1) AS avg FROM tb_data WHERE lokasi='Kos' AND cuaca='Hujan' AND luar_dalam='Dalam'");
				$indoor_rainy1 = mysqli_fetch_row($query);			
			?>
			<td>INDOOR (RAINY)</td>

			<td><?= $indoor_rainy1[0] ?></td>
			<td><?= $indoor_rainy1[1] ?></td>
			<td><?= round($indoor_rainy1[2], 2) ?></td>
		</tr>
		<tr>
			<?php
				$query = mysqli_query($connection, "SELECT MIN(humidity1) AS min, MAX(humidity1) AS max, AVG(humidity1) AS avg FROM tb_data WHERE lokasi='Kos' AND cuaca='Cerah' AND luar_dalam='Dalam'");
				$indoor_sunny1 = mysqli_fetch_row($query);			
			?>
			<td>INDOOR (SUNNY)</td>

			<td><?= $indoor_sunny1[0] ?></td>
			<td><?= $indoor_sunny1[1] ?></td>
			<td><?= round($indoor_sunny1[2], 2) ?></td>
		</tr>
		<tr>
			<?php
				$query = mysqli_query($connection, "SELECT MIN(humidity1) AS min, MAX(humidity1) AS max, AVG(humidity1) AS avg FROM tb_data WHERE lokasi='Kos' AND cuaca='Mendung' AND luar_dalam='Dalam'");
				$indoor_cloudy1 = mysqli_fetch_row($query);			
			?>
			<td>INDOOR (CLOUDY)</td>
	
			<td><?= $indoor_cloudy1[0] ?></td>
			<td><?= $indoor_cloudy1[1] ?></td>
			<td><?= round($indoor_cloudy1[2], 2) ?></td>
		</tr>

		<tr>
			<?php
				$query = mysqli_query($connection, "SELECT MIN(humidity1) AS min, MAX(humidity1) AS max, AVG(humidity1) AS avg FROM tb_data WHERE lokasi='Kos' AND cuaca='Hujan' AND luar_dalam='Luar'");
				$outdoor_rainy1 = mysqli_fetch_row($query);			
			?>
			<td>OUTDOOR (RAINY)</td>
	
			<td><?= $outdoor_rainy1[0] ?></td>
			<td><?= $outdoor_rainy1[1] ?></td>
			<td><?= round($outdoor_rainy1[2], 2) ?></td>
		</tr>
		<tr>
			<?php
				$query = mysqli_query($connection, "SELECT MIN(humidity1) AS min, MAX(humidity1) AS max, AVG(humidity1) AS avg FROM tb_data WHERE lokasi='Kos' AND cuaca='Cerah' AND luar_dalam='Luar'");
				$outdoor_sunny1 = mysqli_fetch_row($query);			
			?>
			<td>OUTDOOR (SUNNY)</td>
	
			<td><?= $outdoor_sunny1[0] ?></td>
			<td><?= $outdoor_sunny1[1] ?></td>
			<td><?= round($outdoor_sunny1[2], 2) ?></td>
		</tr>
		<tr>
			<?php
				$query = mysqli_query($connection, "SELECT MIN(humidity1) AS min, MAX(humidity1) AS max, AVG(humidity1) AS avg FROM tb_data WHERE lokasi='Kos' AND cuaca='Mendung' AND luar_dalam='Luar'");
				$outdoor_cloudy1 = mysqli_fetch_row($query);			
			?>
			<td>OUTDOOR (CLOUDY)</td>
		
			<td><?= $outdoor_cloudy1[0] ?></td>
			<td><?= $outdoor_cloudy1[1] ?></td>
			<td><?= round($outdoor_cloudy1[2], 2) ?></td>
		</tr>
		<tr>
			<?php
				$query = mysqli_query($connection, "SELECT MIN(humidity1) AS min, MAX(humidity1) AS max, AVG(humidity1) AS avg FROM tb_data WHERE lokasi='Lab' ");
				$ac_room = mysqli_fetch_row($query);			
			?>
			<td>AC ROOM</td>
			<td><?= $ac_room[0] ?></td>
			<td><?= $ac_room[1] ?></td>
			<td><?= round($ac_room[2], 2) ?></td>
		</tr>
	</table>

	<center>
		<h1>DHT22 = <?= mysqli_num_rows(mysqli_query($connection, "SELECT * FROM tb_data")) ?></h1>
	</center>
 
	<table border="1">
		<tr>
			<th></th>
			<th>Min</th>
			<th>Max</th>
			<th>Avg</th>
		</tr>
		<tr>
			<?php
				$query = mysqli_query($connection, "SELECT MIN(humidity2) AS min, MAX(humidity2) AS max, AVG(humidity2) AS avg FROM tb_data");
				$all_data2 = mysqli_fetch_row($query);			
			?>
			<td>ALL</
			<td><?= $all_data2[0] ?></td>
			<td><?= $all_data2[1] ?></td>
			<td><?= round($all_data2[2], 2) ?></td>
		</tr>
		<tr>
			<?php
				$query = mysqli_query($connection, "SELECT MIN(humidity2) AS min, MAX(humidity2) AS max, AVG(humidity2) AS avg FROM tb_data WHERE lokasi='Kos' AND cuaca='Hujan' AND luar_dalam='Dalam'");
				$indoor_rainy2 = mysqli_fetch_row($query);			
			?>
			<td>INDOOR (RAINY)</td>

			<td><?= $indoor_rainy2[0] ?></td>
			<td><?= $indoor_rainy2[1] ?></td>
			<td><?= round($indoor_rainy2[2], 2) ?></td>
		</tr>
		<tr>
			<?php
				$query = mysqli_query($connection, "SELECT MIN(humidity2) AS min, MAX(humidity2) AS max, AVG(humidity2) AS avg FROM tb_data WHERE lokasi='Kos' AND cuaca='Cerah' AND luar_dalam='Dalam'");
				$indoor_sunny2 = mysqli_fetch_row($query);			
			?>
			<td>INDOOR (SUNNY)</td>

			<td><?= $indoor_sunny2[0] ?></td>
			<td><?= $indoor_sunny2[1] ?></td>
			<td><?= round($indoor_sunny2[2], 2) ?></td>
		</tr>
		<tr>
			<?php
				$query = mysqli_query($connection, "SELECT MIN(humidity2) AS min, MAX(humidity2) AS max, AVG(humidity2) AS avg FROM tb_data WHERE lokasi='Kos' AND cuaca='Mendung' AND luar_dalam='Dalam'");
				$indoor_cloudy2 = mysqli_fetch_row($query);			
			?>
			<td>INDOOR (CLOUDY)</td>
	
			<td><?= $indoor_cloudy2[0] ?></td>
			<td><?= $indoor_cloudy2[1] ?></td>
			<td><?= round($indoor_cloudy2[2], 2) ?></td>
		</tr>

		<tr>
			<?php
				$query = mysqli_query($connection, "SELECT MIN(humidity2) AS min, MAX(humidity2) AS max, AVG(humidity2) AS avg FROM tb_data WHERE lokasi='Kos' AND cuaca='Hujan' AND luar_dalam='Luar'");
				$outdoor_rainy2 = mysqli_fetch_row($query);			
			?>
			<td>OUTDOOR (RAINY)</td>
	
			<td><?= $outdoor_rainy2[0] ?></td>
			<td><?= $outdoor_rainy2[1] ?></td>
			<td><?= round($outdoor_rainy2[2], 2) ?></td>
		</tr>
		<tr>
			<?php
				$query = mysqli_query($connection, "SELECT MIN(humidity2) AS min, MAX(humidity2) AS max, AVG(humidity2) AS avg FROM tb_data WHERE lokasi='Kos' AND cuaca='Cerah' AND luar_dalam='Luar'");
				$outdoor_sunny2 = mysqli_fetch_row($query);			
			?>
			<td>OUTDOOR (SUNNY)</td>
	
			<td><?= $outdoor_sunny2[0] ?></td>
			<td><?= $outdoor_sunny2[1] ?></td>
			<td><?= round($outdoor_sunny2[2], 2) ?></td>
		</tr>
		<tr>
			<?php
				$query = mysqli_query($connection, "SELECT MIN(humidity2) AS min, MAX(humidity2) AS max, AVG(humidity2) AS avg FROM tb_data WHERE lokasi='Kos' AND cuaca='Mendung' AND luar_dalam='Luar'");
				$outdoor_cloudy2 = mysqli_fetch_row($query);			
			?>
			<td>OUTDOOR (CLOUDY)</td>
		
			<td><?= $outdoor_cloudy2[0] ?></td>
			<td><?= $outdoor_cloudy2[1] ?></td>
			<td><?= round($outdoor_cloudy2[2], 2) ?></td>
		</tr>
		<tr>
			<?php
				$query = mysqli_query($connection, "SELECT MIN(humidity2) AS min, MAX(humidity2) AS max, AVG(humidity2) AS avg FROM tb_data WHERE lokasi='Lab' ");
				$ac_room2 = mysqli_fetch_row($query);			
			?>
			<td>AC ROOM</td>
			<td><?= $ac_room2[0] ?></td>
			<td><?= $ac_room2[1] ?></td>
			<td><?= round($ac_room2[2], 2) ?></td>
		</tr>
	</table>

</body>
</html>