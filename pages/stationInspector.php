<?php
 //session_start();
  include '../header/header.php';
  $station = $_SESSION['station'];

$host = "localhost";
$user = "root";
$password = "";
$database = "votepool";

$nic = "";
$name = "";
$electrolDistrictId = "";
$pollingDivision = "";
$pollingDistrict = "";
$photo = "";


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

if (isset($_POST['search'])) {
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
       header("Location: ./stationInspector.php?error=notfound");
  exit();
     }
   } else{
    echo 'Result Error';
   }
}

else if (isset($_POST['approve'])) {
    $nic = $_POST['nic'];


    $sql = "UPDATE tempVoters 
    SET approveStatus = 1
    WHERE nic = '$nic'";
    $result = $connect->query($sql);

    
    
    header("Location: ./stationInspector.php?approved");


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
      <?php
        include '../include/dbhandler.php';
        $station = $_SESSION['station'];
        $sql = "select * from tempvoters;";
        $result = $conn->query($sql);
        $rowcount1=mysqli_num_rows($result);
        echo "Total Voters Count  <br><font size='50px'>".$rowcount1."</font>";
        
        echo "</div>";
         echo "<div style='width: 50%; float: right'>";
        
         include '../include/dbhandler.php';
        $sql = "select * from tempvoters where votedStatus=1;";
        $result = $conn->query($sql);
        $rowcount2=mysqli_num_rows($result);

        echo "Voted  <br><font size='50px'>".$rowcount2."</font>";

        
         echo "</div>";
         
        echo "<font size='5px' color='blue'>".($rowcount2 / $rowcount1)*100 . "%</font><font size='5px' color='gray'> Voted</font>";

            ?>
       <div class="form-style-6" id="formdiv" style="margin-top: 50px">
        <h1>Approve Voter</h1>
        <form action="./stationInspector.php" method="POST">
        
             <input type="text" name="nic"  maxlength="40" placeholder="Enter Voter NIC" autocomplete="off"  style="margin-top: 30px; margin-bottom: 50px; height: 50px; font-size: 20px" />
          
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
             
          
         <input type="submit" style="background-color: red; height: 50px; margin-top: 20px" value="Search" name="search">


        
        </form>
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

echo "<h1 align='center' style=''>STATION INSPECTOR PAGE - ".$station." </h1>";

  ?>

      </div>

      <?php
             
              $url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
              if (strpos($url, 'approved')!== false) { 
              echo "<center><font color='blue' size='4'> Approved!</font></center>";
            }

          ?>

        <hr />


 <?php
                  $url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
                  if (strpos($url, 'error=empty')!== false) {
                    echo "<font color='red'> *Enter Voter NIC </font>";
                  }

                ?>


<h3></h3>

   
    

      <center> <form action="./stationInspector.php" method="POST" enctype="multipart/form-data">

           <input type="hidden" name="photo">
            <center><img src="../images/voterPhotos/<?php echo $photo; ?>" height="150px" style="margin-bottom: 20px;  border: 3px solid gray;" ></center>
     

       
         
            <input type="text" name="nic" placeholder="Voter NIC No." value="<?php echo $nic;  ?>"  style="margin-top: 20px; margin-bottom: 10px; height: 50px; font-size: 20px ;  padding: 2%; color: #555;">



            <input type="text" name="name" placeholder="Voter Name" value="<?php echo $name; ?>"  disabled style="margin-top: 20px; margin-bottom: 10px; height: 50px; font-size: 20px ;  padding: 2%; color: #555;"> <br>

            <input type="text" name="electrolDistrictId" placeholder="District Id" value="<?php echo $electrolDistrictId; ?>" style="margin-top: 20px; margin-bottom: 5px; height: 50px; font-size: 20px ;  padding: 2%; color: #555;" disabled>

            <input type="text" name="pollingDivision" placeholder="Polling Division" value="<?php echo $pollingDivision; ?>" style="margin-top: 20px; margin-bottom: 5px; height: 50px; font-size: 20px ;  padding: 2%; color: #555;" disabled>
         


            <input type="text" name="pollingDistrict" placeholder="Polling District" value="<?php echo $pollingDistrict; ?>" style="margin-top: 20px; margin-bottom: 5px; height: 50px; font-size: 20px;  padding: 2%; color: #555;" disabled>

             <br>
            
        <hr>
      

        <?php
            include '../include/dbhandler.php';
            
            $sql = "SELECT * FROM tempvoters where nic = '$nic'";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            $approveStatus = $row['approveStatus'];
            $votedStatus = $row['votedStatus'];

            if ($approveStatus != 1 && $votedStatus != 1) {
              echo "<input type='submit' name='approve' value='approve' style='background-color:; height:50px; width:150px;'>";
            }else if($approveStatus == 1 && $votedStatus != 1){
              echo "<font color='red'>*Voter already approved. Voter can vote</font>";
              echo "<br>";
               echo "<input type='submit' name='approve' value='approve' style='background-color:red; height:50px; width:150px; color:white;' disabled>";
            }
            else if($approveStatus == 1 && $votedStatus == 1){
              echo "<font color='red'>*Voter has already voted</font>";
              echo "<br>";
               echo "<input type='submit' name='approve' value='approve' style='background-color:red; height:50px; width:150px; color:white;' disabled>";
            }

        ?>
       
         
          <!--Error handling result view-->
             
               
           
        </form></center>  
        




      	</div> <!-- end of right div -->
       
       
 </div>
   
 </div>
</body>
 </html>