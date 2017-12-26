<?php

   $servername = "localhost";
   $username = "vindula";
   $password = "vindula";
   session_start();
   
   $uid = $_GET["id"];
   
   // Create connection
   $conn = new mysqli($servername, $username, $password, "AirQualitydata");
   
   $sql = "SELECT avg(pm25) FROM dataRecords INNER JOIN user_device ON dataRecords.deviceId=user_device.deviceId where user_device.userId='$uid'"; 
  
   $result = $conn->query($sql);

   if ($result->num_rows > 0) {
     while($row = $result->fetch_assoc()) {
        $count = $row["avg(pm25)"];
        echo round($count,3);
     }
   } 
   $conn->close();
?>