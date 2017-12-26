<?php

   $servername = "localhost";
   $username = "vindula";
   $password = "vindula";
   
   $uid = $_GET["id"];
   
   // Create connection
   $conn = new mysqli($servername, $username, $password, "AirQualitydata");
   
   $sql = "SELECT username FROM login WHERE userId='$uid'"; 
  
   $result = $conn->query($sql);

   if ($result->num_rows > 0) {
     while($row = $result->fetch_assoc()) {
        $username = $row["username"];
        echo $username;
     }
   } 
   $conn->close();
  
?>