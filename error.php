<?php
$servername = "localhost";
$username = "vindula";
$password = "vindula";

$id = $_GET['id'];
$error= $_GET['error'];

// Create connection
$conn = new mysqli($servername, $username, $password, "AirQualitydata");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully"; echo "<br>";

$sql = "INSERT INTO error (deviceId, error) VALUES ($id, '$error')";

if ($conn->query($sql) === TRUE) {
    	echo "New record created successfully"; echo "<br>";
} else {
    	echo "Error: " . $sql . "<br>" . $conn->error; echo "<br>";
}

$conn->close();
?>
