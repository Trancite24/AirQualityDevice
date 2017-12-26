<?php
$servername = "localhost";
$username = "vindula";
$password = "vindula";

$user_name = $_POST['username'];
$pass_word = $_POST['password'];
$email = $_POST['email'];

// Create connection
$conn = new mysqli($servername, $username, $password, "AirQualitydata");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
	
$sql = "INSERT INTO login (username, password, email) VALUES ('$user_name', '$pass_word', '$email')";

if ($conn->query($sql) === TRUE) {
        $newURL = "../register.php?success=1";
   	header('Location: '.$newURL);
} else {
    	$newURL = "../register.php?success=-1";
   	header('Location: '.$newURL);
}

$conn->close();
?>