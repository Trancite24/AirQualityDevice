<?php

   $servername = "localhost";
   $username = "vindula";
   $password = "vindula";
   session_start();
   $deviceId = intval($_GET["id"]);
   
   // Create connection
   $conn = new mysqli($servername, $username, $password, "AirQualitydata");
   
   $sql = "SELECT * FROM dataRecords WHERE deviceId='$deviceId'"; 
  
   $result = $conn->query($sql);
   $deviceList = array();
   $count=0;
   if ($result->num_rows > 0) {
     while($row = $result->fetch_assoc()) {
        $longitude = $row["longitude"];
        $latitude = $row["latitude"];
        $timeDate = $row["timeDate"];
        $pm10 = $row["pm10"];
        $pm25 = $row["pm25"];
        $battery = $row["battery"];
        
        $dataList = array();
        
        $dataList[0]= $longitude;
        $dataList[1]= $latitude;
        $dataList[2]= $timeDate;
        $dataList[3]= $pm10;
        $dataList[4]= $pm25;
        $dataList[5]= $battery;
        
        json_encode($dataList);
        
        $deviceList[$count] = $dataList;
        $count++;
     }
   } 
   echo json_encode($deviceList);
   $conn->close();
?>