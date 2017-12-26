<?php

   $servername = "localhost";
   $username = "vindula";
   $password = "vindula";
   session_start();
   $uid = $_GET["id"];
   
   // Create connection
   $conn = new mysqli($servername, $username, $password, "AirQualitydata");
   
   $sql = "SELECT count(*) as count FROM user_device WHERE userId='$uid'"; 
  
   $result = $conn->query($sql);

   if ($result->num_rows > 0) {
     while($row = $result->fetch_assoc()) {
        $count = $row["count"];
        echo $count;
     }
   } 
   $conn->close();
?>