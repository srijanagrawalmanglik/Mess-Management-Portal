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
    $file = addslashes(file_get_contents($_FILES["messimg"]["tmp_name"]));
    $query = "UPDATE login SET MESSMENU = '$file' WHERE USERNAME = '".$us."'";
    if(mysqli_query($connect, $query))
    {
     echo 'Image Updated into Database';
      header("Location: index.html");
    }
    else 
    {
      echo "Error updating record: " . $connect->error;
    }
    
    $connect->close();
    ?>


?>  