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
        session_start();
        $_SESSION["userId"] = $row["userId"];
        $newURL = "../dashboard.php";
   	header('Location: '.$newURL);
     }
   } else {
        $newURL = "../index.php?retry=1";
   	header('Location: '.$newURL);
   }
   $conn->close();
   
?>