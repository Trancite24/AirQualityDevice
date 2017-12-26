

<?php

   $servername = "localhost";
   $username = "vindula";
   $password = "vindula";
   session_start();
   $deviceId = intval($_GET["id"]);
   $dateVal = date("d:m:Y");
 
   $pieces = explode(":", $dateVal);
   $dateShiftVal = $pieces[0].":".$pieces[1].":".substr($pieces[2],2);
   
   // Create connection
   $conn = new mysqli($servername, $username, $password, "AirQualitydata");
   
   $sql = "SELECT * FROM dataRecords WHERE deviceId='$deviceId'"; 
  
   $result = $conn->query($sql);
   $deviceList = array();
   $count=0;
   if ($result->num_rows > 0) {
     while($row = $result->fetch_assoc()) {
    
        $timeDate = $row["timeDate"];
        $pm10 = $row["pm10"];
        $pm25 = $row["pm25"];
        
        
        $dataList = array();
        
       
        $dataList[0]= $pm10;
        $dataList[1]= $pm25;
        $items = explode("T", $timeDate);
        $dataList[2]= $items[0];
        $tmpVal = $items[1];
      
        if($dateShiftVal == $tmpVal){
          $deviceList[$count] = $dataList;
          $count++;
        }
     }
   } 

   $area_chart = array();  
   
   for ($x = 0; $x < sizeof($deviceList); $x++) {
      	$pmten = round(floatval($deviceList[$x][0]),3);
      	$pmtwofive = round(floatval($deviceList[$x][1]),3);
       $tmp = array( 'y' => $deviceList[$x][2], 'pm10' => $pmten , 'pm2.5' => $pmtwofive );
       array_push($area_chart,$tmp);
   } 

   echo json_encode($area_chart);
   $conn->close();
?>