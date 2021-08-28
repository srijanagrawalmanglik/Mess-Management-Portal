<?php

                $sql1 = "SELECT * FROM login where USERNAME=".$username;
                if($result1 = mysqli_query($link, $sql1)){
                    if(mysqli_num_rows($result1) > 0){
                        while($row1 = mysqli_fetch_array($result1)){
                            echo "<script>";
                            echo "var USERNAME = ".json_encode($row1['USERNAME']).";";
                            echo "var NAME = ".json_encode($row1['NAME']).";";
                            echo "var REGNO = ".json_encode($row1['REGNO']).";";
                            echo "var BLOCK = ".json_encode($row1['BLOCK']).";";
                            echo "var PHONE = ".json_encode($row1['PHONE']).";";
                            echo "var PROGRAMME = ".json_encode($row1['PROGRAMME']).";";
                            echo "var ADMINDET = ".json_encode($row1['ADMINDET']).";";
                            echo "var PRIVILEGE = ".json_encode($row1['PRIVILEGE']).";";
                            echo "var ROOMNO = ".json_encode($row1['ROOMNO']).";";
                            echo "var MESS = ".json_encode($row1['MESS']).";";
                            echo "var TOTALCREDITS = ".json_encode($row1['TOTALCREDITS']).";";
                            echo "var CREDITSLEFT = ".json_encode($row1['CREDITSLEFT']).";";
                            echo "var MESSCHANGE = ".json_encode($row1['MESSCHANGE']).";";
                            echo "var EMAIL = ".json_encode($row1['EMAIL']).";";
                            echo "var FACIALLOGIN = ".json_encode($row1['FACIALLOGIN']).";";
                            echo "var FACIALBILLING = ".json_encode($row1['FACIALBILLING']).";";
                            echo "var MESSMENU = ".json_encode($row1['MEESMENU']).";";
                            echo "var FEEDID = ".json_encode($row1['FEEDID']).";";
                            echo "var FEEDIMAGE = ".json_encode($row1['FEEDIMAGE']).";";
                            echo "var FEEDIMAGETXT = ".json_encode($row1['FEEDIMAGETXT']).";";
                            echo "var DISPLAYIMAGE = ".json_encode($row1['DISPLAYIMAGE']).";";
                            echo "var APPLICATIONNO = ".json_encode($row1["APPLICATIONNO"]).";";
                            echo "</script>";
                        }
                    }
                    else{

                    }
                }
                else{}

            ?>







            <style>
.myDiv{
display:none;
text-align:center;
}  
.myDiv img{
margin: 0 auto;
}
.myDiv span{
text-align: center;
background: #ffdede;
padding: 6px 10px;
display: block;
width: 100px;
border: 1px solid #d47c7c;
margin: 8px auto;
}
#showOne{
color:red;
border:1px solid red;
padding:10px;
}
#showTwo{
color:green;
border:1px solid green;
padding:10px;
}
#showThree{
color:blue;
border:1px solid blue;
padding:10px;
}
</style>
<script>
$(document).ready(function(){
$('#myselection').on('change', function(){
var demovalue = $(this).val(); 
$("div.myDiv").hide();
$("#show"+demovalue).show();
});
});
</script>
<select id="myselection">
<option>Select Option</option>
<option value="One"/>Manager</option>
<option value="Two"/>HR</option>
<option value="Three"/>Developer</option>
</select>
<div id="showOne" class="myDiv">
<img src="/images/user1.jpg" alt="Manager" class="img-responsive img-thumbnail"/><span>Manager</span>
</div>
<div id="showTwo" class="myDiv">
<img src="/images/user2.jpg" alt="HR" class="img-responsive img-thumbnail"/><span>HR</span>
</div>
<div id="showThree" class="myDiv">
<img src="/images/user3.jpg" alt="Developer" class="img-responsive img-thumbnail"/><span>Developer</span>
</div>