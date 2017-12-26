<?php

$servername = "localhost";
$username = "vindula";
$password = "vindula";
$uid = intval($_GET['id']);

// output headers so that the file is downloaded rather than displayed
header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=data.csv');

// create a file pointer connected to the output stream
$output = fopen('php://output', 'w');

// fetch the data
// Create connection
$conn = new mysqli($servername, $username, $password, "AirQualitydata");
   
// output the column headings
fputcsv($output, array('Device ID','longitude', 'latitude', 'battery', 'pm10', 'pm2.5', 'timeDate'));

$sql = "SELECT deviceId,longitude,latitude,battery,pm10,pm25, timeDate FROM dataRecords WHERE deviceId='$uid'"; 
  
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
           fputcsv($output, $row);
        } 
        
}    
else {
     echo "No Records";
}

$conn->close();
fclose($output);

?>