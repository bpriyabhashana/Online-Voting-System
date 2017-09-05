<?php
 //session_start();
  include '../header/header.php';
  $station = $_SESSION['station'];

$host = "localhost";
$user = "root";
$password = "";
$database = "votepool";

$nic = "";
$nic2 = "";
$name = "";
$electrolDistrictId = "";
$pollingDivision = "";
$pollingDistrict = "";
$photo = "";
$pname = "";
$partyId = "";
$pId = "";
$Idofvoter = "";
$Idofvoter2 = "";
$voterId = "";


mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

try{
  $connect = mysqli_connect($host, $user, $password, $database);
} catch (Exeption $ex){
  echo 'error';
}

function getPosts()
{
  $posts = array();
  $posts[0] = $_POST['nic'];
  
   return $posts;
    
}
function getPosts2()
{
  $posts = array();
  $posts[0] = $_POST['nic3'];
  
   return $posts;
    
}

if (isset($_POST['search'])) {
  $Idofvoter = !empty($_POST['nic']) ? $_POST['nic'] : '';
  $data = getPosts();
  $search_Query = "SELECT * FROM voters WHERE nic = '$data[0]' && pollingDistrict = '$station'";
  $search_Result = mysqli_query($connect, $search_Query);

   if ($search_Result) {
     if (mysqli_num_rows($search_Result)) {
       while ($row = mysqli_fetch_array($search_Result)) {
          $nic = $row['nic'];
          $name = $row['name'];
          $electrolDistrictId = $row['electrolDistrictId'];
          $pollingDivision = $row['pollingDivision'];
          $pollingDistrict = $row['pollingDistrict'];
          $photo = $row['photo'];
       }
     } else{
       header("Location: ./stationInspectorVote.php?error=notfound");
  exit();
     }
   } else{
    echo 'Result Error';
   }
}

else if (isset($_POST['selectParty'])) {
  $Idofvoter = !empty($_POST['nic']) ? $_POST['voterId'] : '';
  $Idofvoter2 = !empty($_POST['voterId']) ? $_POST['voterId'] : '';
  $data = getPosts2();
  $search_Query = "SELECT * FROM voters WHERE nic = '$data[0]' && pollingDistrict = '$station'";
  $search_Result = mysqli_query($connect, $search_Query);

   if ($search_Result) {
     if (mysqli_num_rows($search_Result)) {
       while ($row = mysqli_fetch_array($search_Result)) {
          $nic2 = $row['nic'];
       }
     } else{
       header("Location: ./stationInspectorVote.php?error=notfound");
  exit();
     }
   } else{
    echo 'Result Error';
   }


include '../include/dbhandler.php';

 $sql = "SELECT electrolDistrictId FROM area INNER JOIN station ON station.pollingDivision = area.pollingDivision WHERE pollingDistrict =  '$station'";
 $result = $conn->query($sql);
$row = $result->fetch_assoc();
$district = $row['electrolDistrictId'];

$partyId = $_POST['partyId'];
$sql = "SELECT * FROM party WHERE partyId = '$partyId' && electrolDistrictId = '$district'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$logo = $row['logo'];
$pname = $row['name'];

$voterId = $nic2;


/*if (empty($partyId)) {
  header("Location: ./stationInspectorVote.php?error=empty2");
  exit();
}*/

}

else if (isset($_POST['vote'])){
  include '../include/dbhandler.php';
     $sql = "SELECT electrolDistrictId FROM area INNER JOIN station ON station.pollingDivision = area.pollingDivision WHERE pollingDistrict =  '$station'";
      $result = $conn->query($sql);
      $row = $result->fetch_assoc();

   $voterId = $_POST['voterId'];
   $pId = $_POST['pId'];
   $district = $row['electrolDistrictId'];
   /* echo $voterId;
    echo $pId;
    echo $district;*/

  if(!empty($_POST['check_list'])){
  foreach($_POST['check_list'] as $check){
/*  echo $check;*/
   $pId = $_POST['pId'];
   $sql = "SELECT * FROM tempcandidate WHERE candidateNumber = '$check' && electrolDistrictId = '$district' && partyId ='$pId'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

/*-----vote for candidates ------*/

    $candiVote = $row['votes'];
    /*echo $candiVote;*/
    $sql = "UPDATE tempcandidate 
    SET votes = '$candiVote' + 1
    WHERE candidateNumber = '$check'";
    $result = $connect->query($sql);
 
  }
}
/*-----update voted status------*/

 /*$sql = "UPDATE tempVoters 
    SET votedStatus = 1
    WHERE nic = '$voterId'";
    $result = $connect->query($sql);
*/
    $sql = "SELECT * FROM tempparties WHERE partyId = '$pId'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    $vote = $row[$district];
    /*echo $vote;*/
/*-----vote for party------*/

    $sql = "UPDATE tempparties 
    SET $district = '$vote' + 1
    WHERE partyid = '$pId'";
    $result = $connect->query($sql);

    header("Location: ./stationInspectorVote.php?error=voted");
}
?>




<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Station Inspector</title>

  <link rel="stylesheet" type="text/css" href="../css/index.css" />
	<link rel="stylesheet" type="text/css" href="../css/table.css" />
  <link rel="stylesheet" type="text/css" href="../css/form.css" />
 <link rel="stylesheet" type="text/css" href="../css/template.css" />
 <link rel="stylesheet" type="text/css" href="../css/bootstrap.css" />

 

</head>

<body>
 <div id="maindiv" >

     <header>

    <div id="logodiv"><img src="../images/logo.png" id="logo" ></div>
    <div id="navdiv">
      <nav>
        <ul>
         
          <li><a href="#"> <form action="../include/logout.php">
       <button type="submit" id="logout" style="background: transparent;" >Sign Out</button>
       </form></a></li>

        </ul>
      </nav>
    </div>
    </header>

    <div id="leftdiv">
    <div style="width: 50%; float: left">
     </div>
        <div style='width: 100%; float: right'>
        
      
        </div>
         
       <div class="form-style-6" id="formdiv" style="margin-top: 20px">
        <h1>Voter Permission</h1>
        <form action="./stationInspectorVote.php" method="POST">
        
             <input type="text" name="nic"  maxlength="40"  value="<?php echo $Idofvoter;?>" placeholder="Enter Voter NIC" autocomplete="off"  style="margin-top:5px; margin-bottom: 10px; height: 40px; font-size: 20px" />
          
          <?php
                  $url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
                  if (strpos($url, 'error=empty')!== false) {
                    echo "<font color='red'> *Enter Voter NIC </font>";
                  }

                ?>

               
                <?php
                  $url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
                  if (strpos($url, 'error=notfound')!== false) {
                    echo "<font color='red' > *Voter Not Found </font>";
                  }

                ?>
             
           
         <input type="submit" style="background-color: red; height: 40px; margin-bottom: 10px " value="Search" name="search">


        
        </form>
<center> <form action="./stationInspectorVote.php" method="POST" enctype="multipart/form-data">

           <input type="hidden" name="photo">
            <center><img src="../images/voterPhotos/<?php echo $photo; ?>" height="100px" style="margin-bottom: 10px;  border: 3px solid gray;" >
     

       
         
            <input type="text" name="nic3" placeholder="Voter NIC No." value="<?php echo $nic;  ?>"  style="margin-top: 5px; margin-bottom: 5px; height: 30px; font-size: 15px ;  padding: 2%; color: #555;" id="vId">
           </center> 

            <?php
            include '../include/dbhandler.php';
            
            $sql = "SELECT * FROM tempvoters where nic = '$nic'";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            $approveStatus = $row['approveStatus'];
            $votedStatus = $row['votedStatus'];

            if ($approveStatus == 1 && $votedStatus != 1) {
              echo "Approve Status : <font color='blue'>YES</font>";
              echo "<br><br>";
              echo "Voted Status : <font color='blue' >NO</font>";
              echo "<hr>";
              echo "<font color='blue' size='5px' >*Voter Can Vote</font>";
            }else if($approveStatus == 1 && $votedStatus == 1){
              echo "Approve Status : <font color='blue'>YES</font>";
              echo "<br><br>";
              echo "Voted Status : <font color='red'>YES</font>";
              echo "<hr>";
              echo "<font color='red' size='5px'  >*Voter Already Voted</font>";
            }
            else if($approveStatus != 1 && $votedStatus != 1){
              echo "Approve Status : <font color='red'>NO</font>";
              echo "<br><br>";
              echo "Voted Status : <font color='blue'>NO</font>";
              echo "<hr>";
              echo "<font color='red' size='5px' >*Not Approved</font>";
            }
           
        ?>
    <!--     </form> -->

        </div>  
        
    </div>
</div>
   
    

    </div>


    <div id="rightdiv">

      <div id="titleDiv">
        
<?php
include '../include/dbhandler.php';
$station = $_SESSION['station'];
$sql = "SELECT * FROM stationInspectors where pollingDistrictId = '$station'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$station = $row['pollingDistrictId'];

echo "<h1 align='center' style=''>Vote Page - ".$station." </h1>";

  ?>

      </div>

      <?php
             
              $url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
              if (strpos($url, 'approved')!== false) { 
              echo "<center><font color='blue' size='4'> Approved!</font></center>";
            }

          ?>
          <?php
             
              $url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
              if (strpos($url, 'voted')!== false) { 
              echo "<center><font color='blue' size='4'> Successfully voted!</font></center>";
            }

          ?>


        <hr />


                <?php
                  $url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
                  if (strpos($url, 'error=empty2')!== false) {
                    echo "<font color='red'> *Select Party first </font>";
                  }

                ?>
<div align="left">
<form action="./stationInspectorVote.php" method="POST"> 
          <input type="hidden" name="voterId" value="<?php echo $nic2;  ?>" style="width: 200px; height: 40px; margin-right:30px;font-size: 18px" >
          <input type="hidden" name="pId" value="<?php echo $partyId;  ?>" style="width: 200px; height: 40px; margin-right:30px;font-size: 18px" >
       
             <?php
           include '../include/dbhandler.php';
           $sql = "SELECT electrolDistrictId FROM area INNER JOIN station ON station.pollingDivision = area.pollingDivision WHERE pollingDistrict =  '$station'";
             $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            $district = $row['electrolDistrictId'];

                $sql = "SELECT DISTINCT name,partyId FROM party WHERE electrolDistrictId = '$district'";
          $result = $conn->query($sql);

          if ($result->num_rows > 0) {
               // output data of each row

               echo "<select name='partyId' style='margin-top:10px; margin-bottom: 20px; height: 30px; font-size: 17px; color:#555;'>";
              // output data of each row
                echo "<option value=''>-- Select Party --</option>";
              while($row = $result->fetch_assoc()) {

                  echo "<option value='" . $row['partyId'] ."'>" . $row['name']."</option>";
              }
              echo "</select>";
          } else {
              echo "0 results";
          }
          $conn->close();
          ?> 

          <?php
            include '../include/dbhandler.php';
            
            $sql = "SELECT * FROM tempvoters where nic = '$nic'";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            $approveStatus = $row['approveStatus'];
            $votedStatus = $row['votedStatus'];

            if ($approveStatus == 1 && $votedStatus != 1) {
              echo "<input type='submit' name='selectParty' value='selectParty' style='width: 100px; height: 30px; margin-left: 30px'>";
            }else if($approveStatus == 1 && $votedStatus == 1){
                  echo "<input type='submit' disabled name='selectParty' value='selectParty' style='width: 100px; height: 30px; margin-left: 30px;background-color:red;'>";
            }
            else if($approveStatus != 1 && $votedStatus != 1){
                   echo "<input type='submit' disabled name='selectParty' value='selectParty' style='width: 100px; height: 30px; margin-left: 30px;background-color:red;'>";
            }
           
        ?>
        <!--  <input type="submit" disable name="selectParty" value="selectParty" style="width: 100px; height: 30px; margin-left: 30px"> -->
          <br>

         <center> <img src="../images/partyLogos/<?php echo $logo; ?>" style="width:; height:150px; border: 3px solid gray; margin-left: 30px">
         <font style="margin-left: 20px; font-size: 30px">Name - </font> <font style="margin-left: 10px; font-size: 30px ;color:blue"><?php echo $pname; ?> </font></center>
         
            <br>
         <?php
 include '../include/dbhandler.php';
      $sql = "SELECT * FROM candidate WHERE electrolDistrictId='$district' && partyId = '$partyId' ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
     // output data of each row


       echo "<table width='90%' align='center' style='text-align:center;' class='table'>
     <tr>
     
     <th width='10%'><center>No</center></th>
     <th width='20%'><center>name</center></th>
     <th width='40%'><center>Photo</center></th>
     <th width='30%'><center>Vote</center></th>
   
     </tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {

        echo "<tr>
       
        <td><font style='font-size:30px'>".$row["candidateNumber"]."</font></td>
        <td><font style='font-size:20px'>".$row["name"]."</font></td>
        <td><img src='../images/candidatePhotos/".$row["photo"]."' height='100px'></td>
        <td><input type='checkbox' name='check_list[]' value='".$row["candidateNumber"]."'></td>
        </tr>";
    }
    echo "</table>";


  
} else {
    echo "0 results";
}
$conn->close();
?>  
<br>
     <!--  <center> <input type="submit" name="vote" value="Vote" style="background-color: ; height: 60px; width: 180px; margin-top: 60px ; " ></center>  -->

      <?php
            include '../include/dbhandler.php';
            
            $sql = "SELECT * FROM tempvoters where nic = '$nic2'";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            $approveStatus = $row['approveStatus'];
            $votedStatus = $row['votedStatus'];

            if ($approveStatus == 1 && $votedStatus != 1) {
              echo "<center> <input type='submit' name='vote' value='Vote' style='background-color: ; height: 60px; width: 180px; margin-top: 60px ; ' ></center> ";
            }
           
        ?>

          </form>
</div>

<h3></h3>

  
      	</div> <!-- end of right div -->
   
       
 </div>
   
 </div>
</body>
 </html>