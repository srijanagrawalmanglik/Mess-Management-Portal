<?php
include 'messchange.php';
    $stusele=$_GET["messsel"];
    $stumu=$_GET["stuuserna"];
    $host = "localhost";  
    $user = "root";  
    $password = '';  
    $db_name = "vtomp login";  
      
    $conn = mysqli_connect($host, $user, $password, $db_name);  
    if(mysqli_connect_errno()) {  
        die("Failed to connect with MySQL: ". mysqli_connect_error());  
    }  
    $sql = "UPDATE login SET MESS='".$stusele."' WHERE USERNAME='".$stumu."'";

    if ($conn->query($sql) === TRUE) {
      echo "Record updated successfully";
      header("Location: index.html");
      
    } else {
      echo "Error updating record: " . $conn->error;
    }
    
    $conn->close();
    ?>


?>  