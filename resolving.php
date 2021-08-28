<?php
session_start();
$us=$_SESSION['userna'];
    $host = "localhost";  
    $user = "root";  
    $password = '';  
    $db_name = "vtomp login";  
      
    $connect = mysqli_connect($host, $user, $password, $db_name);  
    if(mysqli_connect_errno()) {  
        die("Failed to connect with MySQL: ". mysqli_connect_error());  
    }
    $trgtusr=$_POST['trg'];
    $admnre=$_POST['admnremrks'];
    $query = "UPDATE login SET ADMINREMARKS = '".$admnre."' WHERE USERNAME = '".$trgtusr."'";
    if(mysqli_query($connect, $query))
    {
     echo 'Your Complaint has been resolved';
      header("Location: index.html");
    }
    else 
    {
      echo "Error updating record: " . $connect->error;
    }
    
    $connect->close();
 ?>