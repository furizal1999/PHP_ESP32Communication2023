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
 
	<table border="1">
		<tr>
			<th>ID</th>
			<th>Time</th>
			<th>Temperature</th>
			<th>Humidity</th>
			<th>Fan Speed</th>
			<th>Posisi</th>
			<th>Status Data</th>
		</tr>
		
			<?php
				$query = mysqli_query($connection, "SELECT * FROM tb_data_testing");
				$all_data2 = mysqli_fetch_array($query);
				foreach($all_data2 AS $data):			
			?>
			<tr>
				<td><?= $all_data2["id_data_testing"] ?></td>
				<td><?= $all_data2["date"] ?></td>
				<td><?= $all_data2["temperature"] ?></td>
				<td><?= $all_data2["humidity"] ?></td>
				<td><?= $all_data2["fan_speed"] ?></td>
				<td><?= $all_data2["posisi"] ?></td>
				<td><?= $all_data2["status_data"] ?></td>
			</tr>
			<?php	
			endforeach;
			?>
			
		
		
	</table>

</body>
</html>