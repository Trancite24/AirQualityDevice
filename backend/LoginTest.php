<?php
   $servername = "localhost";
   $username = "vindula";
   $password = "vindula";
   
   $uname = $_POST["uname"];
   $pword = $_POST["pword"];
   
   // Create connection
   $conn = new mysqli($servername, $username, $password, "AirQualitydata");
   
   $sql = "SELECT userId FROM login WHERE username='$uname' AND password='$pword'"; 
  
   $result = $conn->query($sql);

   if ($result->num_rows > 0) {
     while($row = $result->fetch_assoc()) {
        $newURL = "../dashboard.html?id=".$row["userId"];
   	header('Location: '.$newURL);
     }
   } else {
        $newURL = "../index.html?retry=1;
   	header('Location: '.$newURL);
   }
   $conn->close();
   
?>
