<!DOCTYPE html>
<html>
	<head>
		<style>
			table {
				border-collapse: collapse;
				width: 100%;
				color: #1f5380;
				font-family: monospace;
				font-size: 20px;
				text-align: left;
			} 
			th {
				background-color: #1f5380;
				color: white;
			}
			tr:nth-child(even) {background-color: #f2f2f2}
		</style>
	</head>
	<?php
		//Creates new record as per request
		//Connect to database
		$hostname = "localhost";		//example = localhost or 192.168.0.0
		$username = "root";		//example = root
		$password = "";	
		$dbname = "test";
		// Create connection
		$conn = mysqli_connect($hostname, $username, $password, $dbname);
		// Check connection
		if (!$conn) {
			die("Connection failed !!!");
		} 
	?>
	<body>
		<table>
			<tr>
				<th>No</th> 
				<th>Temperature</th> 
				<th>Humidity</th> 
				<th>Soil Moisture</th> 
				<th>Date</th>
				<th>Time</th>
			</tr>	
			<?php
				$table = mysqli_query($conn, "SELECT no, temperature, humidity, soil_moisture, date, time FROM data");
				//nodemcu_ldr_table = Youre_table_name
				while($row = mysqli_fetch_array($table))
				{
			?>
			<tr>
				<td><?php echo $row["no"]; ?></td>
				<td><?php echo $row["temperature"]; ?></td>
				<td><?php echo $row["humidity"]; ?></td>
				<td><?php echo $row["soil_moisture"]; ?></td>
				<td><?php echo $row["date"]; ?></td>
				<td><?php echo $row["time"]; ?></td>
			</tr>
			<?php
				}
			?>
		</table>
	</body>
</html>