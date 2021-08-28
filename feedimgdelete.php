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
    $feedingtxt=$_POST['image_text'];
    $file = addslashes(file_get_contents($_FILES["messimg"]["tmp_name"]));
    $query = "UPDATE login SET FEEDIMAGE = '' WHERE USERNAME = '".$us."'";
    if(mysqli_query($connect, $query))
    {
        $query1 = "UPDATE login SET FEEDIMAGETXT='' WHERE USERNAME = '".$us."'";
        if(mysqli_query($connect, $query1))
        {
            $query2 = "UPDATE login SET ADMINREMARKS='' WHERE USERNAME = '".$us."'";
            if(mysqli_query($connect, $query2))
            {
                 echo 'Image Updated into Database';
                    header("Location: index.html");
            }
        }
    }
    else 
    {
      echo "Error updating record: " . $connect->error;
    }
    
    $connect->close();
 ?>