<?php      
    
    include('connection.php');  
    $username = $_POST['user'];  
    $password = $_POST['pass'];  
    session_start();
    $_SESSION['userna']=$username;
        //to prevent from mysqli injection  
        $username = stripcslashes($username);  
        $password = stripcslashes($password);  
        $username = mysqli_real_escape_string($con, $username);  
        $password = mysqli_real_escape_string($con, $password);  
      
        $sql = "select *from login where username = '$username' and password = '$password'";  
        $result = mysqli_query($con, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);
        $reg = $_POST['user']; 
        $pas=$_POST['pass'];  
        $prv=$_POST['priv'];
        
        if($count == 1){  
            $sql = "SELECT * FROM login WHERE USERNAME='".$username."'";
            $result = $con->query($sql);
            
            if ($result->num_rows > 0) {
              // output data of each row
              while($row = $result->fetch_assoc()) {
                $USERNAME=$row["USERNAME"];
                $NAME=$row["NAME"];
                $REGNO=$row["REGNO"];
                $BLOCK=$row["BLOCK"];
                $PHONE=$row["PHONE"];
                $PROGRAMME=$row["PROGRAMME"];
                $ADMINDET=$row["ADMINDET"];
                $PRIVILEGE=$row["PRIVILEGE"];
                $ROOMNO=$row["ROOMNO"];
                $MESS=$row["MESS"];
                $TOTALCREDITS=$row["TOTALCREDITS"];
                $CREDITSLEFT=$row["CREDITSLEFT"];
                $MESSCHANGE=$row["MESSCHANGE"];
                $EMAIL=$row["EMAIL"];
                $FACIALLOGIN=$row["FACIALLOGIN"];
                $FACIALBILLING=$row["FACIALBILLING"];
                $MESSMENU=$row["MESSMENU"];
                $FEEDID=$row["FEEDID"];
                $FEEDIMAGE=$row["FEEDIMAGE"];
                $FEEDIMAGETXT=$row["FEEDIMAGETXT"];
                $DISPLAYIMAGE=$row["DISPLAYIMAGE"];
                $BAPPLICATIONNO=$row["APPLICATIONNO"];

                  if($row["PRIVILEGE"]==$prv && $prv=="Student")
                  {
                    ?>
                

                        <!DOCTYPE html>
<html ng-app="myApp">

<head>
    <title>VTOMP LOGIN</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,600,700" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.4.7/angular.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.4.7/angular-route.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>

</head>

<body>




<?php 
  function stumssm(){
    global $con;
    global $BLOCK;
    global $MESS;
    if ($con->connect_error) {
      die("Connection failed: " . $con->connect_error);
    }
    $sqlmm = "SELECT * FROM login WHERE PRIVILEGE='Caterer' AND BLOCK='".$BLOCK."' AND MESS='".$MESS."'";
    $resultmm = $con->query($sqlmm);
    
    if ($resultmm->num_rows > 0) {
      while($rowmm = $resultmm->fetch_assoc()) {
        $outputmm = '<table><tr><td><img src="data:image/jpeg;base64,'.base64_encode($rowmm['MESSMENU'] ).'" height="380" width="1000px" style="margin-left:9px" /></td></tr></table>';
        echo $outputmm;
    }
    } else {
      echo "0 results";
    }
  }
?>

    <script type="text/ng-template" id="messmenu.php" >

        <link rel="stylesheet" href="CSS\stuhome.css">
        <div class="back">
            <div class="topnav">
                <a class="hme" href="#messmenu" style="color:orange; font-size:29px;">Home</a>
                <label style="color:white;font-size:36px; margin-left:400px; margin-top:10px">VIT Online Mess Portal(Student Login)</label>
                <a href="#logout" style="float: right;color:orange; font-size:29px;">Logout</a>
                <br>

            </div>
            <div class="cntr" >
            <div class="box " style="width:1020px;height:480px; margin-left:5px;margin-right:30px ;margin-top:1%;">
                    <div class="head ">
                        <h4>MESS MENU</h4>
                        <hr class="new1">
                    </div>
                    <div>
                        <?php stumssm(); ?>
                    </div>
                </div>
            </div>
            <div class="sidenav">
                <a href="#messmenu">Mess Menu</a>
                <br><br><br>
                <a href="#messdetails">Mess Details</a>
                <br><br><br>
                <a href="#stumesschange">Mess Change</a>
                <br><br><br>
                <a href="#yourdetails">Your Details</a>
                <br><br><br>
                <a href="#changepassword">Change Password</a>
                <br><br><br>
                <a href="#feedback-complaint">Feedback/Complaint</a>
            </div>
            <div class="navbar">
                <marquee style="margin:0">For any more qeries, You can call us at +91 9003688959 Or Write Us an Email At mess_grievances@vit.ac.in</marquee>
            </div>
        </div>
    </script>





    <script type="text/ng-template" id="messdetails.php">
    <?php $output1 = '<table><tr><td><img src="data:image/jpeg;base64,'.base64_encode($row['DISPLAYIMAGE'] ).'" height="120" width="105" class="img-thumbnail" /></td></tr></table>'; ?>
        <link rel="stylesheet" href="CSS\messdetails.css">
        <div class="back">
            <div class="topnav">
            <a class="hme" href="#messmenu" style="color:orange; font-size:29px;">Home</a>
                <label style="color:white;font-size:36px; margin-left:400px; margin-top:10px">VIT Online Mess Portal(Student Login)</label>
                <a href="#logout" style="float: right;color:orange; font-size:29px;">Logout</a>
                <br>

            </div>
            <div class="cntr">
                <div class="box ">
                    <div class="head ">
                        <h4>MESS DETAILS</h4>
                        <hr class="new1">
                    </div>
                    <div style="margin-left:36%  ;">
                    <div style="width:110px; height:130px; margin-left:0px;">
                    <?php echo "$output1"; ?>
                    </div>
                    </div>
                    <br>
                    <div style="margin-left:43px;">
                        <table>
                            <tr>
                                <td style="    border: 2px solid white; width: 50%;">BLOCK</td>
                                <td style="    border: 2px solid white; width: 50%;">    <?php 
     echo $BLOCK;
     ?></td>
                            </tr>
                            <tr>
                                <td style="    border: 2px solid white; width: 50%;">MESS</td>
                                <td style="    border: 2px solid white; width: 50%;">
                                <?php 
     echo $MESS;
     ?></td>
                            </tr>
                            <tr>
                                <td style="    border: 2px solid white; width: 50%;">TOTAL CREDITS</td>
                                <td style="    border: 2px solid white; width: 50%;"><?php 
     if($TOTALCREDITS==0)
     {
         echo "NA";
     }
     else{
         echo $TOTALCREDITS;
     }
     ?></td>
                            </tr>
                            <tr>
                                <td style="    border: 2px solid white; width: 50%;">CREDITS LEFT</td>
                                <td style="    border: 2px solid white; width: 50%;"><?php 
     if($CREDITSLEFT==0)
     {
         echo "NA";
     }
     else{
         echo $CREDITSLEFT;
     }
     ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="sidenav">
                <a href="#messmenu">Mess Menu</a>
                <br><br><br>
                <a href="#messdetails">Mess Details</a>
                <br><br><br>
                <a href="#stumesschange">Mess Change</a>
                <br><br><br>
                <a href="#yourdetails">Your Details</a>
                <br><br><br>
                <a href="#changepassword">Change Password</a>
                <br><br><br>
                <a href="#feedback-complaint">Feedback/Complaint</a>
            </div>
            <div class="navbar">
                <marquee style="margin:0">For any more qeries, You can call us at +91 9003688959 Or Write Us an Email At mess_grievances@vit.ac.in</marquee>
            </div>
        </div>
    </script>


    <?php

        if($row["MESSCHANGE"]=="Enable")
        {
    ?>


    <script type="text/ng-template" id="stumesschange.php">
        <link rel="stylesheet" href="CSS\messchange.css">
        
            <div class="topnav">
            <a class="hme" href="#messmenu" style="color:orange; font-size:29px;">Home</a>
                <label style="color:white;font-size:36px; margin-left:400px; margin-top:10px">VIT Online Mess Portal(Student Login)</label>
                <a href="#logout" style="float: right;color:orange; font-size:29px;">Logout</a>
                <br>
            </div>
            <div class="cntr">
                <div class="box ">
                    <div class="head ">
                        <h4>MESS CHANGE</h4>
                        <hr class="new1">
                    </div>
                    <div>
                    <form name="msschn" action="stumsschng.php" method="GET">
                        <input type="hidden" id="stuuserna" name="stuuserna" value="<?php echo $USERNAME; ?>" readonly style="width:90%; margin-left:15px;">
                        <br>
                        <select style="width:90%; margin-left:18px" name="messsel"> 
                            <option>PR-VEG</option>
                            <option>PR-SPECIAL</option>
                            <option>DR-NONVEG</option>
                            <option>DR-SPECIAL</option>
                            <option>FOOD PLAZA</option>
                        </select>
                        <br>
                        <input type="submit" name="messchang" class="messchang" style="margin-left:78px;">
                        </form>
                    </div>
                </div>
            </div>
            <div class="sidenav">
                <a href="#messmenu">Mess Menu</a>
                <br><br><br>
                <a href="#messdetails">Mess Details</a>
                <br><br><br>
                <a href="#messchange">Mess Change</a>
                <br><br><br>
                <a href="#yourdetails">Your Details</a>
                <br><br><br>
                <a href="#changepassword">Change Password</a>
                <br><br><br>
                <a href="#feedback-complaint">Feedback/Complaint</a>
            </div>
            <div class="navbar">
                <marquee style="margin:0">For any more qeries, You can call us at +91 9003688959 Or Write Us an Email At mess_grievances@vit.ac.in</marquee>
            </div>
    </script>
<?php
        }
        else
        {
            ?>
                <script type="text/ng-template" id="stumesschange.php">
        <link rel="stylesheet" href="CSS\messchange.css">
        
            <div class="topnav">
            <a class="hme" href="#messmenu" style="color:orange; font-size:29px;">Home</a>
                <label style="color:white;font-size:36px; margin-left:400px; margin-top:10px">VIT Online Mess Portal(Student Login)</label>
                <a href="#logout" style="float: right;color:orange; font-size:29px;">Logout</a>
                <br>
            </div>
            <div class="cntr">
                <div class="box " style=" width:550px; height:200px;">
                    <div class="head ">
                        <h4>MESS CHANGE</h4>
                        <hr class="new1">
                    </div>
                    <div>
                        <h4 style="margin-left:35px;"> The Mess Change Option has not been yet </h4>
                        <h4 style="margin-left:70px;">enabled by your respective Admins.</h4>
                        <h4 style="margin-left:65px;">Come Back Again when it is enabled</h4>
                    </div>
                </div>
            </div>
            <div class="sidenav">
                <a href="#messmenu">Mess Menu</a>
                <br><br><br>
                <a href="#messdetails">Mess Details</a>
                <br><br><br>
                <a href="#stumesschange">Mess Change</a>
                <br><br><br>
                <a href="#yourdetails">Your Details</a>
                <br><br><br>
                <a href="#changepassword">Change Password</a>
                <br><br><br>
                <a href="#feedback-complaint">Feedback/Complaint</a>
            </div>
            <div class="navbar">
                <marquee style="margin:0">For any more qeries, You can call us at +91 9003688959 Or Write Us an Email At mess_grievances@vit.ac.in</marquee>
            </div>
    </script>





<?php
        }

?>



    <script type="text/ng-template" id="yourdetails.php">
        <?php $output = '<table><tr><td><img src="data:image/jpeg;base64,'.base64_encode($row['DISPLAYIMAGE'] ).'" height="120px" width="105px" class="img-thumbnail" /></td></tr></table>'; ?>
        <link rel="stylesheet" href="CSS\yourdetails.css">
        <div class="back">
            <div class="topnav">
            <a class="hme" href="#messmenu" style="color:orange; font-size:29px;">Home</a>
                <label style="color:white;font-size:36px; margin-left:400px; margin-top:10px">VIT Online Mess Portal(Student Login)</label>
                <a href="#logout" style="float: right;color:orange; font-size:29px;">Logout</a>
                <br>

            </div>
            <div class="cntr">
                <div class="box " style="width:720px;height:480px; margin-left:15%;margin right:10% ;margin-top:2%;">
                    <div class="head ">
                        <h4>YOUR DETAILS</h4>
                        <hr class="new1">
                    </div>
                    <div style="margin-left:25px;">
                    <div style="width:110px; height:130px; margin-left:250px;">
                    <?php echo "$output"; ?>
                    </div>
                    <br>
                        <table >
                            <tr>
                                <td style="    border: 2px solid white; width: 20%;">REGISTRATION NO.</td>
                                <td style="    border: 2px solid white; width: 330px;"><?php 
     echo $REGNO;
     ?></td>
                            </tr>
                            <tr>
                                <td style="    border: 2px solid white; width: 20%;">NAME</td>
                                <td style="    border: 2px solid white; width: 50%;"><?php 
     echo $NAME;
     ?></td>
                            </tr>
                            <tr>
                                <td style="    border: 2px solid white; width: 20%;">PROGRAMME</td>
                                <td style="    border: 2px solid white; width: 50%;"><?php 
     echo $PROGRAMME;
     ?></td>
                            </tr>
                            <tr>
                                <td style="    border: 2px solid white; width: 20%;">PHONE</td>
                                <td style="    border: 2px solid white; width: 50%;"><?php 
     echo $PHONE;
     ?></td>
                            </tr>
                            <tr>
                                <td style="    border: 2px solid white; width: 20%;">BLOCK</td>
                                <td style="    border: 2px solid white; width: 50%;"><?php 
     echo $BLOCK;
     ?></td>
                            </tr>
                            <tr>
                                <td style="    border: 2px solid white; width: 20%;">ROOM NO.</td>
                                <td style="    border: 2px solid white; width: 50%;"><?php 
     echo $ROOMNO;
     ?></td>
                            </tr>
                            <tr>
                                <td style="    border: 2px solid white; width: 20%;">MESS</td>
                                <td style="    border: 2px solid white; width: 50%;"><?php 
     echo $MESS;
     ?></td>
                            </tr>                    
                                <td style="    border: 2px solid white; width: 40%;">EMAIL</td>
                                <td style="    border: 2px solid white; width: 50%;"><?php 
     echo $EMAIL;
     ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="sidenav">
                <a href="#messmenu">Mess Menu</a>
                <br><br><br>
                <a href="#messdetails">Mess Details</a>
                <br><br><br>
                <a href="#stumesschange">Mess Change</a>
                <br><br><br>
                <a href="#yourdetails">Your Details</a>
                <br><br><br>
                <a href="#changepassword">Change Password</a>
                <br><br><br>
                <a href="#feedback-complaint">Feedback/Complaint</a>
            </div>
            <div class="navbar">
                <marquee style="margin:0">For any more qeries, You can call us at +91 9003688959 Or Write Us an Email At mess_grievances@vit.ac.in</marquee>
            </div>
        </div>
    </script>






    <script type="text/ng-template" id="changepassword.php">

        <link rel="stylesheet" href="CSS\changepassword.css">
        <div class="back">
            <div class="topnav">
            <a class="hme" href="#messmenu" style="color:orange; font-size:29px;">Home</a>
                <label style="color:white;font-size:36px; margin-left:400px; margin-top:10px">VIT Online Mess Portal(Student Login)</label>
                <a href="#logout" style="float: right;color:orange; font-size:29px;">Logout</a>
                <br>
            </div>
            <div class="cntr">
                <div class="box " style="height:400px; margin-top:15%; margin-left:1%;">
                    <div class="head ">
                        <h4>CHANGE PASSWORD</h4>
                        <hr class="new1">
                    </div>
                    <div>
                        <form name="chngpsswrd" action="chnpas.php" method="GET">
                        <input type="text" id="userna" name="userna" value="<?php echo $USERNAME; ?>" readonly style="width:90%; margin-left:15px;">
                        <br>
                        <input type="password" id="currpassword" name="currpassword" placeholder="Current Password" style="width:90%; margin-left:15px;">
                        <br>
                        <input type="password" id="newpassword" name="newpassword" placeholder="New Password" style="width:90%; margin-left:15px;">
                        <br>
                        <input type="password" id="renewpassword" name="renewpassword" placeholder="Re-enter New Password" style="width:90%; margin-left:15px;">
                        <br>
                        <input type="submit" name="psswrdchange" class="psswrdchange" style="margin-left:78px;" onclick="stuchng()">
                        </form>
                    </div>
                </div>
            </div>
            <div class="sidenav">
                <a href="#messmenu">Mess Menu</a>
                <br><br><br>
                <a href="#messdetails">Mess Details</a>
                <br><br><br>
                <a href="#stumesschange">Mess Change</a>
                <br><br><br>
                <a href="#yourdetails">Your Details</a>
                <br><br><br>
                <a href="#changepassword">Change Password</a>
                <br><br><br>
                <a href="#feedback-complaint">Feedback/Complaint</a>
            </div>
            <div class="navbar">
                <marquee style="margin:0">For any more qeries, You can call us at +91 9003688959 Or Write Us an Email At mess_grievances@vit.ac.in</marquee>
            </div>
        </div>
    </script>




    <script type="text/ng-template" id="feedback-complaint.php">
    <?php
            function feedimages()
            {
                global $FEEDIMAGETXT;
                global $row;
                    if ( !empty( $row['FEEDIMAGE'] ) ) {
                         $outputfeed = '<table style="border:2px; border-color:white;"><tr><td align="center">Your Latest Feedback:</td></tr><tr><td style="border:2px; border-color:white;"><img src="data:image/jpeg;base64,'.base64_encode($row['FEEDIMAGE'] ).'" height="200px" width="380px" ; margin-top:0px; margin-left:10px;" /></td></tr><tr width="380px"><td style="border:2px; border-color:white;">YOUR FEEDBACK: '.$FEEDIMAGETXT.'</td></tr><tr><td>ADMIN REMARKS:</td></tr><tr><td>'.$row['ADMINREMARKS'].'</td></tr></table></div>';
                         echo $outputfeed;
                        }
                        else{
                                echo "Your Feedback has been resolved by the Administrator";
                        }
                    }
                    ?>
        <link rel="stylesheet" href="CSS\feedback-complaint.css">
        <div class="back">
            <div class="topnav">
            <a class="hme" href="#messmenu" style="color:orange; font-size:29px;">Home</a>
                <label style="color:white;font-size:36px; margin-left:400px; margin-top:10px">VIT Online Mess Portal(Student Login)</label>
                <a href="#logout" style="float: right;color:orange; font-size:29px;">Logout</a> 
                <br>

            </div>
            <div class="cntr">
                
                <div class="box " style="margin-left:20%;height:450px; width: 700px; margin-top:30px;">
                    <div class="head ">
                        <h4>FEEDBACK / COMPLAINT</h4>
                        <hr class="new1">
                    </div>
                    <div>
                    <div style="float:right; margin-right:12px">
                            <?php  feedimages(); ?>
                        </div>
                        <div style="float:left;">
                            <form action="feedimg.php" method="post" enctype="multipart/form-data">
                                <input type="file" name="messimg" id="messimg" style="margin-left: 12px; width:200px;">
                                <br><br>
                                <textarea id="text" cols="32" rows="8" name="image_text" placeholder="Say something ...." style=" margin-left: 12px;"></textarea>
                                <br>
                                <input type="Submit" Value="UPLOAD" style="width:280px;margin-left: 12px;">
                                
                            </form>
                            <form action="feedimgdelete.php" method="post" enctype="multipart/form-data">
                                <input type="Submit" Value="DELETE" style=" float:center; width:280px; margin-left: 12px;">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="sidenav">
                <a href="#messmenu">Mess Menu</a>
                <br><br><br>
                <a href="#messdetails">Mess Details</a>
                <br><br><br>
                <a href="#stumesschange">Mess Change</a>
                <br><br><br>
                <a href="#yourdetails">Your Details</a>
                <br><br><br>
                <a href="#changepassword">Change Password</a>
                <br><br><br>
                <a href="#feedback-complaint">Feedback/Complaint</a>
            </div>
            <div class="navbar">
                <marquee style="margin:0">For any more qeries, You can call us at +91 9003688959 Or Write Us an Email At mess_grievances@vit.ac.in</marquee>
            </div>
        </div>
    </script>





    <script type="text/ng-template" id="logout.php">
        <link rel="stylesheet" href="CSS\logout.css">
        <!DOCTYPE html>
    <html>

    <head>
        <title></title>
        <link rel="stylesheet" href="CSS\incorrect.CSS">
    </head>

    <body style="background-image: url('IMAGES/laptop-food-liquids.jpg'); background-repeat: no-repeat;background-size: cover;">
        <div class="background">
            <nav class="navbar navbar-default navbar-fixed-top" style="background-color: #2980B9;color: #EAF2F8;">
                <img src="IMAGES/vitlogo.png" class="img-responsive pull-left" alt="User Image" width="200 px" ; height="69px" style="margin-left: 30px;">
                <label class="pull-right" style="float:right;"><h3 class="vtp">VTOMP (Vellore Campus)</h3></label>
            </nav>
            <br>
            <br>

            <div class="cntr">
                <div class="box">
                    <div class="head">
                        <h4>VTOMP Login</h4>
                        <HR width="100%">
                    </div>
                    <p style="color:white; font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;font-size:24px">
                        You have been logged out!!!
                    </p>
                    <br><br>
                    <p style="color:white; font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;font-size:24px">Click here to login again to VTOMP</p>
                    <a href="index.html"><input type="button" value="Login To VTOMP" style="background-color: #4CAF50;padding: 16px 32px;color: white;font-size:18px;"></a>
                </div>
            </div>
        </div>
    </body>
    </html>
    </script>






    <div ng-view></div>
    <script>
        var app = angular.module('myApp', []);
        var app = angular.module('myApp', ['ngRoute']);
        app.config(function($routeProvider) {
            $routeProvider

                .when('/', {
                templateUrl: 'messmenu.php',
                controller: 'messmenuController'
            })

            .when('/messmenu', {
                templateUrl: 'messmenu.php',
                controller: 'messmenuController'
            })

            .when('/messdetails', {
                templateUrl: 'messdetails.php',
                controller: 'messdetailsController'
            })

            .when('/stumesschange', {
                templateUrl: 'stumesschange.php',
                controller: 'stumesschangeController'
            })


            .when('/yourdetails', {
                templateUrl: 'yourdetails.php',
                controller: 'yourdetailsController'
            })


            .when('/changepassword', {
                templateUrl: 'changepassword.php',
                controller: 'changepasswordController'
            })

            .when('/feedback-complaint', {
                templateUrl: 'feedback-complaint.php',
                controller: 'feedback-complaintController'
            })

            .when('/logout', {
                templateUrl: 'logout.php',
                controller: 'logoutController'
            })


            .otherwise({
                redirectTo: '/'
            });
        });
        app.controller('messmenuController', function($scope) {
            $scope.message = '';
        });

        app.controller('messmenuController', function($scope) {
            $scope.message = 'Vellore Institute of Technology, Vellore';
        });

        app.controller('databasemanagementController', function($scope) {
            $scope.message = 'Vellore Institute of Technology, Vellore';
        });

        app.controller('stumesschangeController', function($scope) {
            $scope.message = 'Vellore Institute of Technology, Vellore';
        });

        app.controller('yourdetailsController', function($scope) {
            $scope.message = 'Vellore Institute of Technology, Vellore';
        });

        app.controller('changepasswordController', function($scope) {
            $scope.message = 'Vellore Institute of Technology, Vellore';
        });

        app.controller('feedback-complaintController', function($scope) {
            $scope.message = 'Vellore Institute of Technology, Vellore';
        });

        app.controller('logoutController', function($scope) {
            $scope.message = 'Vellore Institute of Technology, Vellore';
        });

    </script>
</body>

</html>

<script>
function stuchng() {
    var myuse = document.getElementById("userna").value;
    var mypass = <?php echo json_encode($row['PASSWORD']); ?>;
    var oldpass= document.getElementById("currpassword").value;
    var newpass= document.getElementById("newpassword").value; 
    var renewpass= document.getElementById("renewpassword").value;
    if(oldpass!="" && newpass!="" && renewpass!="")
    {
        if(oldpass==mypass)
        {
            if(newpass==renewpass)
            {
                location.replace("chnpas.php");
            }
            else
            {
                alert("!!!!!!!!!!!!!!!!!Re-enter the new password correctly.!!!!!!!!!!!!!!!!!");
                break;
            }
        }
        else
        {
        alert("!!!!!!!!!!!!!!!!!    Invalid Credentials    !!!!!!!!!!!!!!!!!");
        break;
        }
    }
    else if(oldpass=="" && newpass=="" && renewpass=="")
    {
        alert("PLZ PROVIDE THE CEDENTIALS");
        break;
    }
    else
    {
        alert("PLZ PROVIDE ALL THE CEDENTIALS");
        break;
    }
}
</script>


                    <?php
                  }
                  else if($row["PRIVILEGE"]==$prv && $prv=="Admin")
                  {
                      
                    ?>

<html ng-app="myApp">

<head>
    <title>VTOMP LOGIN</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,600,700" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.4.7/angular.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.4.7/angular-route.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
</head>

<body style="color:white;">





<?php 
  function mmprv(){
    global $con;
    global $BLOCK;
    if ($con->connect_error) {
      die("Connection failed: " . $con->connect_error);
    }
    $sqlmmprv= "SELECT * FROM login WHERE PRIVILEGE='Caterer' AND BLOCK='".$BLOCK."' AND MESS='PR-VEG'";
    $resultmmprv = $con->query($sqlmmprv);
    
    if ($resultmmprv->num_rows > 0) {
      while($rowmmprv = $resultmmprv->fetch_assoc()) {
        $outputmmprv = '<table><tr><td><img src="data:image/jpeg;base64,'.base64_encode($rowmmprv['MESSMENU'] ).'" height="300px" width="1000px" style=" margin-top: 0px;margin-left:9px" /></td></tr></table>';
        echo $outputmmprv;
    }
    } else {
      echo "0 results";
    }
  }



  function mmprs(){
    global $con;
    global $BLOCK;
    if ($con->connect_error) {
      die("Connection failed: " . $con->connect_error);
    }
    $sqlmmprs= "SELECT * FROM login WHERE PRIVILEGE='Caterer' AND BLOCK='".$BLOCK."' AND MESS='PR-SPECIAL'";
    $resultmmprs = $con->query($sqlmmprs);
    
    if ($resultmmprs->num_rows > 0) {
      while($rowmmprs = $resultmmprs->fetch_assoc()) {
        $outputmmprs = '<table><tr><td><img src="data:image/jpeg;base64,'.base64_encode($rowmmprs['MESSMENU'] ).'" height="300px" width="1000px" style=" margin-top: 0px;margin-left:9px" /></td></tr></table>';
        echo $outputmmprs;
    }
    } else {
      echo "0 results";
    }
  }


  function mmdrnv(){
    global $con;
    global $BLOCK;
    if ($con->connect_error) {
      die("Connection failed: " . $con->connect_error);
    }
    $sqlmmdrnv= "SELECT * FROM login WHERE PRIVILEGE='Caterer' AND BLOCK='".$BLOCK."' AND MESS='DR-NONVEG'";
    $resultmmdrnv = $con->query($sqlmmdrnv);
    
    if ($resultmmdrnv->num_rows > 0) {
      while($rowmmdrnv = $resultmmdrnv->fetch_assoc()) {
        $outputmmdrnv = '<table><tr><td><img src="data:image/jpeg;base64,'.base64_encode($rowmmdrnv['MESSMENU'] ).'" height="300px" width="1000px" style=" margin-top: 0px;margin-left:9px" /></td></tr></table>';
        echo $outputmmdrnv;
    }
    } else {
      echo "0 results";
    }
  }



  function mmdrs(){
    global $con;
    global $BLOCK;
    if ($con->connect_error) {
      die("Connection failed: " . $con->connect_error);
    }
    $sqlmmdrs= "SELECT * FROM login WHERE PRIVILEGE='Caterer' AND BLOCK='".$BLOCK."' AND MESS='DR-SPECIAL'";
    $resultmmdrs = $con->query($sqlmmdrs);
    
    if ($resultmmdrs->num_rows > 0) {
      while($rowmmdrs = $resultmmdrs->fetch_assoc()) {
        $outputmmdrs = '<table><tr><td><img src="data:image/jpeg;base64,'.base64_encode($rowmmdrs['MESSMENU'] ).'" height="300px" width="1000px" style=" margin-top: 0px;margin-left:9px" /></td></tr></table>';
        echo $outputmmdrs;
    }
    } else {
      echo "0 results";
    }
  }




  function mmfp(){
    global $con;
    global $BLOCK;
    if ($con->connect_error) {
      die("Connection failed: " . $con->connect_error);
    }
    $sqlmmfp= "SELECT * FROM login WHERE PRIVILEGE='Caterer' AND BLOCK='Q' AND MESS='FOOD PLAZA'";
    $resultmmfp = $con->query($sqlmmfp);
    
    if ($resultmmfp->num_rows > 0) {
      while($rowmmfp = $resultmmfp->fetch_assoc()) {
        $outputmmfp = '<table><tr><td><img src="data:image/jpeg;base64,'.base64_encode($rowmmfp['MESSMENU'] ).'" height="300px" width="1000px" style=" margin-top: 0px;margin-left:9px" /></td></tr></table>';
        echo $outputmmfp;
    }
    } else {
      echo "0 results";
    }
  }
?>
    <script type="text/ng-template" id="messmenu.php" >
    
        <link rel="stylesheet" href="CSS\stuhome.css">
        <div class="back">
            <div class="topnav">
                <a class="hme" href="#messmenu" style="color:orange; font-size:29px;">Home</a>
                <label style="color:white;font-size:36px; margin-left:400px; margin-top:10px">VIT Online Mess Portal(Admin Login)</label>
                <a href="#logout" style="float: right;color:orange; font-size:29px;">Logout</a>
                <br>

            </div>
            <div class="cntr" >
            <div class="box " style="width:1020px;height:480px; margin-left:5px;margin-right:30px ;margin-top:1%;">
                    <div class="head ">
                        <h4>
                        <input type="Submit" value="PR-VEG" onclick="myshowmmprv()" style="margin-left: 1px">
                        <input type="Submit" value="PR-SPECIAL" onclick="myshowmmprs()" style="margin-left: 10px">
                        MESS MENU
                        <input type="Submit" value="DR-NONVEG" onclick="myshowmmdrnv()" style="margin-left: 10px">
                        <input type="Submit" value="DR-SPECIAL" onclick="myshowmmdrs()" style="margin-left: 10px">
                        <input type="Submit" value="FOOD PLAZA" onclick="myshowmmfp()" style="margin-left: 10px">
                    </h4>
                    <hr class="new1">
                    </div>
                    <div id="showmmprv" style="width: 100%; padding: 50px 0; text-align: center; margin-top: 20px; display: none;"">
                        <?php mmprv(); ?>
                    </div>
                    <div id="showmmprs" style="width: 100%; padding: 50px 0; text-align: center; margin-top: 20px; display: none;">
                        <?php mmprs(); ?>
                    </div>
                    <div id="showmmdrnv" style="width: 100%; padding: 50px 0; text-align: center;  margin-top: 20px; display: none;">
                        <?php mmdrnv(); ?>
                    </div>
                    <div id="showmmdrs" style="width: 100%; padding: 50px 0; text-align: center;  margin-top: 20px; display: none;">
                        <?php mmdrs(); ?>
                    </div>
                    <div id="showmmfp" style="width: 100%; padding: 50px 0; text-align: center;  margin-top: 20px; display: none;">
                        <?php mmfp(); ?>
                    </div>
                </div>
            </div>
            <div class="sidenav">
                <a href="#messmenu">Mess Menu</a>
                <br><br><br>
                <a href="#messchange">Mess Change</a>
                <br><br><br>
                <a href="#yourdetails">Your Details</a>
                <br><br><br>
                <a href="#changepassword">Change Password</a>
                <br><br><br>
                <a href="#feedback-complaint">Feedback/Complaint</a>
            </div>
            <div class="navbar">
                <marquee style="margin:0">For any more qeries, You can call us at +91 9003688959 Or Write Us an Email At mess_grievances@vit.ac.in</marquee>
            </div>
        </div>
    </script>





    





    <script type="text/ng-template" id="messchange.php">
    
        <link rel="stylesheet" href="CSS\messchange.css">
        
            <div class="topnav">
            <a class="hme" href="#messmenu" style="color:orange; font-size:29px;">Home</a>
                <label style="color:white;font-size:36px; margin-left:400px; margin-top:10px">VIT Online Mess Portal(Admin Login)</label>
                <a href="#logout" style="float: right;color:orange; font-size:29px;">Logout</a>
                <br>
            </div>
            <div class="cntr">
                <div class="box ">
                    <div class="head ">
                        <h4>MESS CHANGE</h4>
                        <hr class="new1">
                    </div>
                    <div>
                        <table style="margin-left:20px">
                            <tr>
                                <td style="border: 2px solid white; width:160px;">Current Status</td>
                                <td style="border: 2px solid white; width:150px;"><?php echo $MESSCHANGE; ?>d</td>
                            </tr>
                        </table>
                        <br>
                        <form method="GET" action="msschng.php">
                        <input type="hidden" style="margin-left:84px" value="<?php echo $BLOCK; ?>" name="blockna" readonly>
                        <select style="width:90%; margin-left:18px" name="sel"> 
                            <option>Enable</option>
                            <option>Disable</option>
                        </select>
                        <br><br>
                        <input type="Submit" style="margin-left:84px">
                        </form>
                    </div>
                </div>
            </div>
            <div class="sidenav">
                <a href="#messmenu">Mess Menu</a>
                <br><br><br>
                <a href="#messchange">Mess Change</a>
                <br><br><br>
                <a href="#yourdetails">Your Details</a>
                <br><br><br>
                <a href="#changepassword">Change Password</a>
                <br><br><br>
                <a href="#feedback-complaint">Feedback/Complaint</a>
            </div>
            <div class="navbar">
                <marquee style="margin:0">For any more qeries, You can call us at +91 9003688959 Or Write Us an Email At mess_grievances@vit.ac.in</marquee>
            </div>
    </script>




    <script type="text/ng-template" id="yourdetails.php">
    <?php $output = '<table><tr><td><img src="data:image/jpeg;base64,'.base64_encode($row['DISPLAYIMAGE'] ).'" style="height:200px ; width:150px;   " class="img-thumbnail" /></td></tr></table>'; ?>
        <link rel="stylesheet" href="CSS\yourdetails.css">
        <div class="back">
            <div class="topnav">
            <a class="hme" href="#messmenu" style="color:orange; font-size:29px;">Home</a>
                <label style="color:white;font-size:36px; margin-left:400px; margin-top:10px">VIT Online Mess Portal(Admin Login)</label>
                <a href="#logout" style="float: right;color:orange; font-size:29px;">Logout</a>
                <br>

            </div>
            <div class="cntr">
                <div class="box " style="width:720px;height:450px; margin-left:15%;margin right:10% ;margin-top:3%;">
                    <div class="head ">
                        <h4>YOUR DETAILS</h4>
                        <hr class="new1">
                    </div>
                    <div style="margin-left:36%  ;">
                    <div style="width:200px; height:200px; margin-left:0px;">
                    <?php echo "$output"; ?>
                    </div>
                    </div>
                    <br>
                    <div style="margin-left:98px;">
                        <table >
                            <tr>
                                <td style="    border: 2px solid white; width: 30%;">REGISTRATION NO.</td>
                                <td style="    border: 2px solid white; width: 330px;"><?php echo $REGNO; ?> </td>
                            </tr>
                            <tr>
                                <td style="    border: 2px solid white; width: 30%;">NAME</td>
                                <td style="    border: 2px solid white; width: 330px;"><?php echo $NAME; ?></td>
                            </tr>
                            <tr>
                                <td style="    border: 2px solid white; width: 30%;">PHONE</td>
                                <td style="    border: 2px solid white; width: 330px"><?php echo $PHONE; ?></td>
                            </tr>
                            <tr>
                                <td style="    border: 2px solid white; width: 30%;">BLOCK</td>
                                <td style="    border: 2px solid white; width: 330px;"><?php echo $BLOCK; ?></td>
                            </tr>
                            <tr>                  
                                <td style="    border: 2px solid white; width: 30%;">EMAIL</td>
                                <td style="    border: 2px solid white; width: 330px;"><?php echo $EMAIL; ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="sidenav">
                <a href="#messmenu">Mess Menu</a>
                <br><br><br>
                <a href="#messchange">Mess Change</a>
                <br><br><br>
                <a href="#yourdetails">Your Details</a>
                <br><br><br>
                <a href="#changepassword">Change Password</a>
                <br><br><br>
                <a href="#feedback-complaint">Feedback/Complaint</a>
            </div>
            <div class="navbar">
                <marquee style="margin:0">For any more qeries, You can call us at +91 9003688959 Or Write Us an Email At mess_grievances@vit.ac.in</marquee>
            </div>
        </div>
    </script>






    <script type="text/ng-template" id="changepassword.php">
        <link rel="stylesheet" href="CSS\changepassword.css">
        <div class="back">
            <div class="topnav">
            <a class="hme" href="#messmenu" style="color:orange; font-size:29px;">Home</a>
                <label style="color:white;font-size:36px; margin-left:400px; margin-top:10px">VIT Online Mess Portal(Admin Login)</label>
                <a href="#logout" style="float: right;color:orange; font-size:29px;">Logout</a>
                <br>

            </div>
            <div class="cntr">
            <div class="box " style="height:400px; margin-top:15%; margin-left:1%;">
                    <div class="head ">
                        <h4>CHANGE PASSWORD</h4>
                        <hr class="new1">
                    </div>
                    <div>
                        <form name="chngpsswrd" action="chnpas.php" method="GET">
                        <input type="text" id="userna" name="userna" value="<?php echo $USERNAME; ?>" readonly style="width:90%; margin-left:15px;">
                        <br>
                        <input type="password" id="currpassword" name="currpassword" placeholder="Current Password" style="width:90%; margin-left:15px;">
                        <br>
                        <input type="password" id="newpassword" name="newpassword" placeholder="New Password" style="width:90%; margin-left:15px;">
                        <br>
                        <input type="password" id="renewpassword" name="renewpassword" placeholder="Re-enter New Password" style="width:90%; margin-left:15px;">
                        <br>
                        <input type="submit" name="psswrdchange" class="psswrdchange" style="margin-left:78px;" onclick="adchng()">
                        </form>
                    </div>
                </div>
            </div>
            <div class="sidenav">
                <a href="#messmenu">Mess Menu</a>
                <br><br><br>
                <a href="#messchange">Mess Change</a>
                <br><br><br>
                <a href="#yourdetails">Your Details</a>
                <br><br><br>
                <a href="#changepassword">Change Password</a>
                <br><br><br>
                <a href="#feedback-complaint">Feedback/Complaint</a>
            </div>
            <div class="navbar">
                <marquee style="margin:0">For any more qeries, You can call us at +91 9003688959 Or Write Us an Email At mess_grievances@vit.ac.in</marquee>
            </div>
        </div>
    </script>




    <?php 
  function feedcomp(){
    
    global $con;
    global $username;
    if ($con->connect_error) {
      die("Connection failed: " . $con->connect_error);
    }
    $sqlmn = "SELECT * FROM login WHERE ADMINDET='".$username."' AND FEEDIMAGETXT!='' AND ADMINREMARKS='' ORDER BY RAND() LIMIT 1";
    $resultmn = $con->query($sqlmn);
    if ($resultmn->num_rows > 0) {
      while($rowmn = $resultmn->fetch_assoc()) {
        $_SESSION['targetuser']=$rowmn['USERNAME'];
        $outputmn = '<table align="left"><tr><td><img src="data:image/jpeg;base64,'.base64_encode($rowmn['FEEDIMAGE'] ).'" height="200px" width="320px" style="margin-left:9px" /></td></tr><tr><td> '.$rowmn['USERNAME'].'::::'. $rowmn['FEEDIMAGETXT'].'</td></tr></table>';
        echo $outputmn;
    }
    } else {
      echo " No feedbacks";
    }
  }
?>




    <script type="text/ng-template" id="feedback-complaint.php">
        <link rel="stylesheet" href="CSS\feedback-complaint.css">
        <div class="back">
            <div class="topnav">
            <a class="hme" href="#messmenu" style="color:orange; font-size:29px;">Home</a>
                <label style="color:white;font-size:36px; margin-left:400px; margin-top:10px">VIT Online Mess Portal(Admin Login)</label>
                <a href="#logout" style="float: right;color:orange; font-size:29px;">Logout</a> 
                <br>

            </div>
            <div class="cntr">
                <div class="box " style="height:400px ;width:650px; margin-top:50px; margin-left:20%;">
                    <div class="head ">
                        <h4>FEEDBACK / COMPLAINT</h4>
                        <hr class="new1">
                    </div>
                    <div>
                    <div style="float:right;">
                    <form action="resolving.php" method="post">
                    <input type="hidden" id="trg" name="trg" value="<?php echo $_SESSION['targetuser']; ?>" readonly>
                    
                    <textarea id="admnremrks" cols="32" rows="10" name="admnremrks" placeholder="Say something ...." style=" margin-left:1px; margin-right:22px; float:right;" ></textarea>
                        <br><br>
                        <input type="submit" value="RESOLVE" style="width:280px; margin-left:1px;margin-right:12px;">
                    </form>
                    </div>
                    <div style="float:left;">
                    <?php feedcomp(); ?>
                    </div>
                    </div>
                </div>
            </div>
            <div class="sidenav">
                <a href="#messmenu">Mess Menu</a>
                <br><br><br>
                <a href="#messchange">Mess Change</a>
                <br><br><br>
                <a href="#yourdetails">Your Details</a>
                <br><br><br>
                <a href="#changepassword">Change Password</a>
                <br><br><br>
                <a href="#feedback-complaint">Feedback/Complaint</a>
            </div>
            <div class="navbar">
                <marquee style="margin:0">For any more qeries, You can call us at +91 9003688959 Or Write Us an Email At mess_grievances@vit.ac.in</marquee>
            </div>
        </div>
    </script>





    <script type="text/ng-template" id="logout.php">
        <link rel="stylesheet" href="CSS\logout.css">
        <!DOCTYPE html>
    <html>

    <head>
        <title></title>
        <link rel="stylesheet" href="CSS\incorrect.CSS">
    </head>

    <body style="background-image: url('IMAGES/laptop-food-liquids.jpg'); background-repeat: no-repeat;background-size: cover;">
        <div class="background">
            <nav class="navbar navbar-default navbar-fixed-top" style="background-color: #2980B9;color: #EAF2F8;">
                <img src="IMAGES/vitlogo.png" class="img-responsive pull-left" alt="User Image" width="200 px" ; height="69px" style="margin-left: 30px;">
                <label class="pull-right" style="float:right;"><h3 class="vtp">VTOMP (Vellore Campus)</h3></label>
            </nav>
            <br>
            <br>

            <div class="cntr">
                <div class="box">
                    <div class="head">
                        <h4>VTOMP Login</h4>
                        <HR width="100%">
                    </div>
                    <p style="color:white; font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;font-size:24px">
                        You have been logged out!!!
                    </p>
                    <br><br>
                    <p style="color:white; font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;font-size:24px">Click here to login again to VTOMP</p>
                    <a href="index.html"><input type="button" value="Login To VTOMP" style="background-color: #4CAF50;padding: 16px 32px;color: white;font-size:18px;"></a>
                </div>
            </div>
        </div>
    </body>
    </html>
    </script>






    <div ng-view></div>
    <script>
        var app = angular.module('myApp', []);
        var app = angular.module('myApp', ['ngRoute']);
        app.config(function($routeProvider) {
            $routeProvider

                .when('/', {
                templateUrl: 'messmenu.php',
                controller: 'messmenuController'
            })

            .when('/messmenu', {
                templateUrl: 'messmenu.php',
                controller: 'messmenuController'
            })

            .when('/messchange', {
                templateUrl: 'messchange.php',
                controller: 'messchangeController'
            })


            .when('/yourdetails', {
                templateUrl: 'yourdetails.php',
                controller: 'yourdetailsController'
            })


            .when('/changepassword', {
                templateUrl: 'changepassword.php',
                controller: 'changepasswordController'
            })

            .when('/feedback-complaint', {
                templateUrl: 'feedback-complaint.php',
                controller: 'feedback-complaintController'
            })

            .when('/logout', {
                templateUrl: 'logout.php',
                controller: 'logoutController'
            })


            .otherwise({
                redirectTo: '/'
            });
        });
        app.controller('messmenuController', function($scope) {
            $scope.message = '';
        });

        app.controller('messmenuController', function($scope) {
            $scope.message = 'Vellore Institute of Technology, Vellore';
        });

        app.controller('databasemanagementController', function($scope) {
            $scope.message = 'Vellore Institute of Technology, Vellore';
        });

        app.controller('messchangeController', function($scope) {
            $scope.message = 'Vellore Institute of Technology, Vellore';
        });

        app.controller('yourdetailsController', function($scope) {
            $scope.message = 'Vellore Institute of Technology, Vellore';
        });

        app.controller('changepasswordController', function($scope) {
            $scope.message = 'Vellore Institute of Technology, Vellore';
        });

        app.controller('feedback-complaintController', function($scope) {
            $scope.message = 'Vellore Institute of Technology, Vellore';
        });

        app.controller('logoutController', function($scope) {
            $scope.message = 'Vellore Institute of Technology, Vellore';
        });

    </script>
</body>

</html>
<script>
function myshowmmprv() {
  var x = document.getElementById("showmmprv");
  var a = document.getElementById("showmmprs");
  var b = document.getElementById("showmmdrnv");
  var c = document.getElementById("showmmdrs");
  var d = document.getElementById("showmmfp");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
    a.style.display = "none";
    b.style.display = "none";
    c.style.display = "none";
    d.style.display = "none";
  }
}
function myshowmmprs() {
    var x = document.getElementById("showmmprv");
  var a = document.getElementById("showmmprs");
  var b = document.getElementById("showmmdrnv");
  var c = document.getElementById("showmmdrs");
  var d = document.getElementById("showmmfp");
  if (a.style.display === "block") {
    a.style.display = "none";
  } else {
    a.style.display = "block";
    x.style.display = "none";
    b.style.display = "none";
    c.style.display = "none";
    d.style.display = "none";
  }
}
function myshowmmdrnv() {
    var x = document.getElementById("showmmprv");
  var a = document.getElementById("showmmprs");
  var b = document.getElementById("showmmdrnv");
  var c = document.getElementById("showmmdrs");
  var d = document.getElementById("showmmfp");
  if (b.style.display === "block") {
    b.style.display = "none";
  } else {
    b.style.display = "block";
    x.style.display = "none";
    a.style.display = "none";
    c.style.display = "none";
    d.style.display = "none";
  }
}
function myshowmmdrs() {
    var x = document.getElementById("showmmprv");
  var a = document.getElementById("showmmprs");
  var b = document.getElementById("showmmdrnv");
  var c = document.getElementById("showmmdrs");
  var d = document.getElementById("showmmfp");
  if (c.style.display === "block") {
    c.style.display = "none";
  } else {
    c.style.display = "block";
    x.style.display = "none";
    a.style.display = "none";
    b.style.display = "none";
    d.style.display = "none";
  }
}
function myshowmmfp() {
    var x = document.getElementById("showmmprv");
  var a = document.getElementById("showmmprs");
  var b = document.getElementById("showmmdrnv");
  var c = document.getElementById("showmmdrs");
  var d = document.getElementById("showmmfp");
  if (d.style.display === "block") {
    d.style.display = "none";
  } else {
    d.style.display = "block";
    x.style.display = "none";
    a.style.display = "none";
    b.style.display = "none";
    c.style.display = "none";
  }
}






function adchng() {
    var myuse = document.getElementById("userna").value;
    var mypass = <?php echo json_encode($row['PASSWORD']); ?>;
    var oldpass= document.getElementById("currpassword").value;
    var newpass= document.getElementById("newpassword").value; 
    var renewpass= document.getElementById("renewpassword").value;
    if(oldpass!="" && newpass!="" && renewpass!="")
    {
        if(oldpass==mypass)
        {
            if(newpass==renewpass)
            {
                location.replace("chnpas.php");
            }
            else
            {
                alert("!!!!!!!!!!!!!!!!!Re-enter the new password correctly.!!!!!!!!!!!!!!!!!");
            }
        }
        else
        {
        alert("!!!!!!!!!!!!!!!!!    Invalid Credentials    !!!!!!!!!!!!!!!!!");
        }
    }
    else if(oldpass=="" && newpass=="" && renewpass=="")
    {
        alert("PLZ PROVIDE THE CEDENTIALS");
    }
    else
    {
        alert("PLZ PROVIDE ALL THE CEDENTIALS");
    }
}
</script>


                    <?php
                  }
                  else if($row["PRIVILEGE"]==$prv && $prv=="Caterer")
                  {
                    ?>


<!DOCTYPE html>
<html ng-app="myApp">

<head>
    <title>VTOMP Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,600,700" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.4.7/angular.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.4.7/angular-route.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
</head>

<body>





<?php 
  function catmssm(){
    global $con;
    global $username;
    if ($con->connect_error) {
      die("Connection failed: " . $con->connect_error);
    }
    $sqlmm = "SELECT * FROM login WHERE USERNAME='".$username."'";
    $resultmm = $con->query($sqlmm);
    
    if ($resultmm->num_rows > 0) {
      while($rowmm = $resultmm->fetch_assoc()) {
        $outputmm = '<table><tr><td><img src="data:image/jpeg;base64,'.base64_encode($rowmm['MESSMENU'] ).'" height="380" width="1000px" style="margin-left:9px" /></td></tr></table>';
        echo $outputmm;
    }
    } else {
      echo "0 results";
    }
  }
?>
    <script type="text/ng-template" id="messmenu.php">
        <link rel="stylesheet" href="CSS\stuhome.css">
        <div class="back">
            <div class="topnav">
                <a class="hme" href="#messmenu" style="color:orange; font-size:29px;">Home</a>
                <label style="color:white;font-size:36px; margin-left:400px; margin-top:10px">VIT Online Mess Portal(Caterer Login)</label>
                <a href="#logout" style="float: right;color:orange; font-size:29px;">Logout</a>
                <br>
                

            </div>
            <div class="cntr" >
            <div class="box " style="width:1020px;height:480px; margin-left:5px;margin-right:30px ;margin-top:1%;">
                    <div class="head ">
                    <form action="action.php" method="post" enctype="multipart/form-data"><h4>MESS MENU <input type="file" name="messimg" id="messimg" style="margin-left:200px;"><input type="Submit" Value="UPLOAD" style="margin-left:0%;"></form></h4>
                        <hr class="new1">
                    </div>
                    <div>
                        <?php catmssm(); ?>
                    </div>
                </div>
            </div>
            
            <div class="sidenav">
                <a href="#messmenu">Mess Menu</a>
                <br><br><br>
                <a href="#yourdetails">Your Details</a>
                <br><br><br>
                <a href="#changepassword">Change Password</a>
            </div>
            <div class="navbar">
                <marquee style="margin:0">For any more qeries, You can call us at +91 9003688959 Or Write Us an Email At mess_grievances@vit.ac.in</marquee>
            </div>
        </div>
    </script>

















    <script type="text/ng-template" id="yourdetails.php">
    <?php $output = '<table><tr><td><img src="data:image/jpeg;base64,'.base64_encode($row['DISPLAYIMAGE'] ).'" height="150" width="120" class="img-thumbnail" /></td></tr></table>'; ?>
        <link rel="stylesheet" href="CSS\yourdetails.css">
        <div class="back">
            <div class="topnav">
            <a class="hme" href="#messmenu" style="color:orange; font-size:29px;">Home</a>
                <label style="color:white;font-size:36px; margin-left:400px; margin-top:10px">VIT Online Mess Portal(Caterer Login)</label>
                <a href="#logout" style="float: right;color:orange; font-size:29px;">Logout</a>
                <br>
            </div>
            <div class="cntr">
                <div class="box " style="width:720px;height:450px; margin-left:15%;margin right:10% ;margin-top:3%;">
                    <div class="head ">
                        <h4>YOUR DETAILS</h4>
                        <hr class="new1">
                    </div>
                    <div style="margin-left:36%  ;">
                    <div style="width:110px; height:130px; margin-left:50px;">
                    <?php echo "$output"; ?>
                    </div>
                    </div>
                    <br>
                    <div style="margin-left:98px;">
                        <table >

                            <tr>
                                <td style="    border: 2px solid white; width: 30%;">REGISTRATION NO.</td>
                                <td style="    border: 2px solid white; width: 330px;"><?php echo $REGNO; ?></td>
                            </tr>
                            <tr>
                                <td style="    border: 2px solid white; width: 30%;">NAME</td>
                                <td style="    border: 2px solid white; width: 330px;"><?php echo $NAME; ?></td>
                            </tr>
                            <tr>
                                <td style="    border: 2px solid white; width: 30%;">PHONE</td>
                                <td style="    border: 2px solid white; width: 330px"><?php echo $PHONE; ?></td>
                            </tr>
                            <tr>
                                <td style="    border: 2px solid white; width: 30%;">BLOCK</td>
                                <td style="    border: 2px solid white; width: 330px;"><?php echo $BLOCK; ?></td>
                            </tr>
                            <tr>                  
                                <td style="    border: 2px solid white; width: 30%;">EMAIL</td>
                                <td style="    border: 2px solid white; width: 330px;"><?php echo $EMAIL; ?></td>
                            </tr>
                            <tr>
                                <td style="    border: 2px solid white; width: 30%;">MESS</td>
                                <td style="    border: 2px solid white; width: 330px;"><?php echo $MESS; ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="sidenav">
            <a href="#messmenu">Mess Menu</a>
                <br><br><br>
                <a href="#yourdetails">Your Details</a>
                <br><br><br>
                <a href="#changepassword">Change Password</a>
            </div>
            <div class="navbar">
                <marquee style="margin:0">For any more qeries, You can call us at +91 9003688959 Or Write Us an Email At mess_grievances@vit.ac.in</marquee>
            </div>
        </div>
    </script>






    <script type="text/ng-template" id="changepassword.php">
        <link rel="stylesheet" href="CSS\changepassword.css">
        <div class="back">
            <div class="topnav">
            <a class="hme" href="#messmenu" style="color:orange; font-size:29px;">Home</a>
                <label style="color:white;font-size:36px; margin-left:400px; margin-top:10px">VIT Online Mess Portal(Caterer Login)</label>
                <a href="#logout" style="float: right;color:orange; font-size:29px;">Logout</a>
                <br>
                

            </div>
            <div class="cntr">
            <div class="box " style="height:400px; margin-top:15%; margin-left:1%;">
                    <div class="head ">
                        <h4>CHANGE PASSWORD</h4>
                        <hr class="new1">
                    </div>
                    <div>
                        <form name="chngpsswrd" action="chnpas.php" method="GET">
                        <input type="text" id="userna" name="userna" value="<?php echo $USERNAME; ?>" readonly style="width:90%; margin-left:15px;">
                        <br>
                        <input type="password" id="currpassword" name="currpassword" placeholder="Current Password" style="width:90%; margin-left:15px;">
                        <br>
                        <input type="password" id="newpassword" name="newpassword" placeholder="New Password" style="width:90%; margin-left:15px;">
                        <br>
                        <input type="password" id="renewpassword" name="renewpassword" placeholder="Re-enter New Password" style="width:90%; margin-left:15px;">
                        <br>
                        <input type="submit" name="psswrdchange" class="psswrdchange" style="margin-left:78px;" onclick="catchng()">
                        </form>
                    </div>
                </div>
            </div>
            <div class="sidenav">
            <a href="#messmenu">Mess Menu</a>
                <br><br><br>
                <a href="#yourdetails">Your Details</a>
                <br><br><br>
                <a href="#changepassword">Change Password</a>
            </div>
            <div class="navbar">
                <marquee style="margin:0">For any more qeries, You can call us at +91 9003688959 Or Write Us an Email At mess_grievances@vit.ac.in</marquee>
            </div>
        </div>
    </script>




    <script type="text/ng-template" id="logout.php">
        <link rel="stylesheet" href="CSS\logout.css">
        <!DOCTYPE html>
    <html>

    <head>
        <title></title>
        <link rel="stylesheet" href="CSS\incorrect.CSS">
    </head>

    <body style="background-image: url('IMAGES/laptop-food-liquids.jpg'); background-repeat: no-repeat;background-size: cover;">
        <div class="background">
            <nav class="navbar navbar-default navbar-fixed-top" style="background-color: #2980B9;color: #EAF2F8;">
                <img src="IMAGES/vitlogo.png" class="img-responsive pull-left" alt="User Image" width="200 px" ; height="69px" style="margin-left: 30px;">
                <label class="pull-right" style="float:right;"><h3 class="vtp">VTOMP (Vellore Campus)</h3></label>
            </nav>
            <br>
            <br>

            <div class="cntr">
                <div class="box">
                    <div class="head">
                        <h4>VTOMP Login</h4>
                        <HR width="100%">
                    </div>
                    <p style="color:white; font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;font-size:24px">
                        You have been logged out!!!
                    </p>
                    <br><br>
                    <p style="color:white; font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;font-size:24px">Click here to login again to VTOMP</p>
                    <a href="index.html"><input type="button" value="Login To VTOMP" style="background-color: #4CAF50;padding: 16px 32px;color: white;font-size:18px;"></a>
                </div>
            </div>
        </div>
    </body>
    </html>
    </script>






    <div ng-view></div>
    <script>
        var app = angular.module('myApp', []);
        var app = angular.module('myApp', ['ngRoute']);
        app.config(function($routeProvider) {
            $routeProvider

                .when('/', {
                templateUrl: 'messmenu.php',
                controller: 'messmenuController'
            })

            .when('/messmenu', {
                templateUrl: 'messmenu.php',
                controller: 'messmenuController'
            })


            .when('/yourdetails', {
                templateUrl: 'yourdetails.php',
                controller: 'yourdetailsController'
            })


            .when('/changepassword', {
                templateUrl: 'changepassword.php',
                controller: 'changepasswordController'
            })


            .when('/logout', {
                templateUrl: 'logout.php',
                controller: 'logoutController'
            })


            .otherwise({
                redirectTo: '/'
            });
        });
        app.controller('messmenuController', function($scope) {
            $scope.message = '';
        });

        app.controller('messmenuController', function($scope) {
            $scope.message = 'Vellore Institute of Technology, Vellore';
        });

        app.controller('yourdetailsController', function($scope) {
            $scope.message = 'Vellore Institute of Technology, Vellore';
        });

        app.controller('changepasswordController', function($scope) {
            $scope.message = 'Vellore Institute of Technology, Vellore';
        });

        app.controller('logoutController', function($scope) {
            $scope.message = 'Vellore Institute of Technology, Vellore';
        });

    </script>
</body>

</html>
<script>
function catchng() {
    var myuse = document.getElementById("userna").value;
    var mypass = <?php echo json_encode($row['PASSWORD']); ?>;
    var oldpass= document.getElementById("currpassword").value;
    var newpass= document.getElementById("newpassword").value; 
    var renewpass= document.getElementById("renewpassword").value;
    if(oldpass!="" && newpass!="" && renewpass!="")
    {
        if(oldpass==mypass)
        {
            if(newpass==renewpass)
            {
                location.replace("chnpas.php");
            }
            else
            {
                alert("!!!!!!!!!!!!!!!!!Re-enter the new password correctly.!!!!!!!!!!!!!!!!!");
            }
        }
        else
        {
        alert("!!!!!!!!!!!!!!!!!    Invalid Credentials    !!!!!!!!!!!!!!!!!");
        }
    }
    else if(oldpass=="" && newpass=="" && renewpass=="")
    {
        alert("PLZ PROVIDE THE CEDENTIALS");
    }
    else
    {
        alert("PLZ PROVIDE ALL THE CEDENTIALS");
    }
}
</script>
                    <?php
                  }
                  else
                  {
                      ?>
                    <!DOCTYPE html>
                    <html>
                
                    <head>
                        <title></title>
                        <link rel="stylesheet" href="CSS\incorrect.CSS">
                    </head>
                
                    <body style="background-image: url('IMAGES/laptop-food-liquids.jpg'); background-repeat: no-repeat;background-size: cover;">
                        <div class="background">
                            <nav class="navbar navbar-default navbar-fixed-top" style="background-color: #2980B9;color: #EAF2F8;">
                                <img src="IMAGES/vitlogo.png" class="img-responsive pull-left" alt="User Image" width="200 px" ; height="69px" style="margin-left: 30px;">
                                <label class="pull-right" style="float:right;"><h3 class="vtp">VTOMP (Vellore Campus)</h3></label>
                            </nav>
                            <br>
                            <br>
                
                            <div class="cntr">
                                <div class="box">
                                    <div class="head">
                                        <h4>VTOMP Login</h4>
                                        <HR width="100%">
                                    </div>
                                    <p style="color:white; font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;font-size:24px">
                                        Your Registration ID / Password  or Privilege specified is incorrect!!!!!!
                                    </p>
                                    <p style="color:white; font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;font-size:24px">Please Check your login Credentials</p>
                                    <p style="color:white; font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;font-size:24px">Click here to login to VTOMP</p>
                                    <a href="index.html"><input type="button" value="Login To VTOMP" style="background-color: #4CAF50;padding: 16px 32px;color: white;font-size:18px;"></a>
                                </div>
                            </div>
                        </div>
                    </body>
                    </html>
                    <?php
                  }
              }
            } 
            else {
              ?>
              
              <!DOCTYPE html>
    <html>

    <head>
        <title></title>
        <link rel="stylesheet" href="CSS\incorrect.CSS">
    </head>

    <body style="background-image: url('IMAGES/laptop-food-liquids.jpg'); background-repeat: no-repeat;background-size: cover;">
        <div class="background">
            <nav class="navbar navbar-default navbar-fixed-top" style="background-color: #2980B9;color: #EAF2F8;">
                <img src="IMAGES/vitlogo.png" class="img-responsive pull-left" alt="User Image" width="200 px" ; height="69px" style="margin-left: 30px;">
                <label class="pull-right" style="float:right;"><h3 class="vtp">VTOMP (Vellore Campus)</h3></label>
            </nav>
            <br>
            <br>

            <div class="cntr">
                <div class="box">
                    <div class="head">
                        <h4>VTOMP Login</h4>
                        <HR width="100%">
                    </div>
                    <p style="color:white; font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;font-size:24px">
                        Your Registration ID / Password  or Privilege specified is incorrect!!!!!!
                    </p>
                    <p style="color:white; font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;font-size:24px">Please Check your login Credentials</p>
                    <p style="color:white; font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;font-size:24px">Click here to login to VTOMP</p>
                    <a href="index.html"><input type="button" value="Login To VTOMP" style="background-color: #4CAF50;padding: 16px 32px;color: white;font-size:18px;"></a>
                </div>
            </div>
        </div>
    </body>
    </html>        
               <?php
            }
            ?>

           
            
            <?php  
        }  
        else{  
            ?>

<!DOCTYPE html>
    <html>

    <head>
        <title></title>
        <link rel="stylesheet" href="CSS\incorrect.CSS">
    </head>

    <body style="background-image: url('IMAGES/laptop-food-liquids.jpg'); background-repeat: no-repeat;background-size: cover;">
        <div class="background">
            <nav class="navbar navbar-default navbar-fixed-top" style="background-color: #2980B9;color: #EAF2F8;">
                <img src="IMAGES/vitlogo.png" class="img-responsive pull-left" alt="User Image" width="200 px" ; height="69px" style="margin-left: 30px;">
                <label class="pull-right" style="float:right;"><h3 class="vtp">VTOMP (Vellore Campus)</h3></label>
            </nav>
            <br>
            <br>

            <div class="cntr">
                <div class="box">
                    <div class="head">
                        <h4>VTOMP Login</h4>
                        <HR width="100%">
                    </div>
                    <p style="color:white; font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;font-size:24px">
                        Your Registration ID / Password  or Privilege specified is incorrect!!!!!!
                    </p>
                    <p style="color:white; font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;font-size:24px">Please Check your login Credentials</p>
                    <p style="color:white; font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;font-size:24px">Click here to login to VTOMP</p>
                    <a href="index.html"><input type="button" value="Login To VTOMP" style="background-color: #4CAF50;padding: 16px 32px;color: white;font-size:18px;"></a>
                </div>
            </div>
        </div>
    </body>
    </html>

            <?php
        }     
?>