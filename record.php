<?php
$servername = "localhost";
$username = "vindula";
$password = "vindula";

$id = $_GET['id'];
$longitude = $_GET['longitude'];
$latitude = $_GET['latitude'];
$battery = $_GET['battery'];
$data = $_GET['data'];

$data = json_decode($data);

// Create connection
$conn = new mysqli($servername, $username, $password, "AirQualitydata");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully"; echo "<br>";

for ($x = 0; $x < sizeof($data->datapoints); $x++) {
	$pm10 = $data->datapoints[$x]->pm10;
	$pm25 = $data->datapoints[$x]->pm25;
	$timeDate = $data->datapoints[$x]->time;
	
   	$sql = "INSERT INTO dataRecords (deviceId, longitude, latitude, battery, timeDate, pm10, pm25) VALUES ($id, $longitude, $latitude, $battery, '$timeDate', $pm10, $pm25)";

	if ($conn->query($sql) === TRUE) {
    		echo "New record created successfully"; echo "<br>";
	} else {
    		echo "Error: " . $sql . "<br>" . $conn->error; echo "<br>";
	}
} 

$conn->close();
?>
