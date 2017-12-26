<?php

   $servername = "localhost";
   $username = "vindula";
   $password = "vindula";
   session_start();
   $uid = $_GET["id"];
   
   // Create connection
   $conn = new mysqli($servername, $username, $password, "AirQualitydata");
   
   $sql = "SELECT deviceId FROM user_device WHERE userId='$uid'"; 
  
   $result = $conn->query($sql);
   $deviceList = array();
   $count=0;
   if ($result->num_rows > 0) {
     while($row = $result->fetch_assoc()) {
        $device = $row["deviceId"];
        $deviceList[$count]= intval($device);
        $count++;
     }
   } 
   echo json_encode($deviceList);
   $conn->close();
?>