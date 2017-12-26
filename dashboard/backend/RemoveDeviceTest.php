<?php
$servername = "localhost";
$username = "vindula";
$password = "vindula";

$deviceId = intval($_GET['deviceId']);

// Create connection
$conn = new mysqli($servername, $username, $password, "AirQualitydata");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
	
$sql = "DELETE FROM user_device WHERE deviceId=".$deviceId;

if ($conn->query($sql) === TRUE) {
        $newURL = "../removedevice.php?success=".$deviceId;
   	header('Location: '.$newURL);
} else {
    	$newURL = "../removedevice.php?success=-1";
   	header('Location: '.$newURL);
}

$conn->close();
?>