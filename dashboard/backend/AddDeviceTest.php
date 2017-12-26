<?php
$servername = "localhost";
$username = "vindula";
$password = "vindula";

$userId = $_GET['userId'];
$deviceId = $_GET['deviceId'];

// Create connection
$conn = new mysqli($servername, $username, $password, "AirQualitydata");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
	
$sql = "INSERT INTO user_device (deviceId, userId) VALUES ($deviceId, $userId)";

if ($conn->query($sql) === TRUE) {
        $newURL = "../adddevice.php?success=".$deviceId;
   	header('Location: '.$newURL);
} else {
    	$newURL = "../adddevice.php?success=-1";
   	header('Location: '.$newURL);
}

$conn->close();
?>