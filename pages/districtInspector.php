<?php
 //session_start();
  include '../header/header.php';

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>District Inspector</title>

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
          <li role="presentation"><p style="font-size: 20px; margin-right: 50px; color:yellow;" >
        <!-- <?php
          if (isset($_SESSION['district'])) {
            echo "HI ".$_SESSION['district'];
          }
        ?> -->
          </p></li>
           <!-- <li role="presentation"> <form>
      <button id="logout" style="background: transparent;" >Add Admin</button>
       </form></li> -->
     

        <li  role="presentation"><a href="../formpage/stationInspectorReg.php" target="blank"><p style="font-size: 18px; margin-right: 30px; color:white;" >  Inspectors Reg.</p></a></li>


          <li><a href="#"> <form action="../include/logout.php">
       <button type="submit" id="logout" style="background: transparent;" >Sign Out</button>
       </form></li>


        </ul>
      </nav>
    </div>
    </header>

    <div id="leftdiv">
      
   
    <a href="../formpage/addPartiesDistrict.php" target="blank"><img src="../images/png/2.png" class="img-responsive navimg"></a>
    <a href="../formpage/addCandidatesDistrict.php" target="blank"><img src="../images/png/3.png" class="img-responsive navimg"></a>
    <a href="../formpage/addInspectorsStation.php" target="blank"><img src="../images/png/5.png" class="img-responsive navimg"></a>
    <a href="../formpage/addVotersDistrict.php" target="blank"><img src="../images/png/4.png" class="img-responsive navimg"></a>
    

    </div>


    <div id="rightdiv">

      <div id="titleDiv">
        
<?php
include '../include/dbhandler.php';
$district = $_SESSION['district'];
$sql = "SELECT * FROM seats where electrolDistrictId = '$district'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$DistrictName = $row['electrolDistrict'];

echo "<h1 align='center'>DISTRICT INSPECTOR PAGE - ".$DistrictName." </h1>";

  ?>

      </div>
      
     
    	<h2 align="">
       
      </h2>

      

        <hr />
        <div style="height:auto" id="tablediv" >

        <!-- ===================== retrive data to table ===================== -->

       		<!--  <?php
 include '../include/dbhandler.php';
      $sql = "SELECT uname, candiname, party FROM candidate";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
     // output data of each row

     echo "<table id='candidetail'><tr><th>ID</th><th>Name</th><th>party</th><th>Select</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {

        echo "<tr><td>".$row["uname"]."</td><td>".$row["candiname"]."</td><td> ".$row["party"]."</td><td>
        approve<input type='radio' name='select' value='approve' > reject<input type='radio' name='select' value='approve' ></td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
$conn->close();
?>   -->




<h3></h3>

<div class="wrapper">
      <div class="col_third"><a href="../formpage/addPartiesDistrict.php" target="blank">
        <div class="hover panel">
          <div class="front">  
            <div class="box1">
              <div class="boxhed"><p>Add Parties</p></div>
              District Inspectors should add password to the system<br>
              If you have nominated your name will show
              
            </div>
          </div>
          <div class="back">
            <div class="box2">
              <p>Back Side</p>
            </div>
          </div>
        </div></a>
    </div>

    <div class="col_third"><a href="../formpage/addCandidatesDistrict.php" target="blank">
        <div class="hover panel">
          <div class="front">
            <div class="box1">
              <p><p>Add Candidates</p></p>
            </div>
          </div>
          <div class="back">
            <div class="box2">
              <p>Back Side</p>
            </div>
          </div>
        </div></a>
    </div>

    <div class="col_third end"> <a href="../formpage/addInspectorsStation.php" target="blank">
        <div class="hover panel">
          <div class="front">
            <div class="box1">
              <p>Add Inspectors</p>
            </div>
          </div>
          <div class="back">
            <div class="box2">
              <p>Back Side</p>
            </div>
          </div>
        </div>
      </div></a>

   </div>

   <br>

<div class="wrapper">
      <div class="col_third"> <a href="../formpage/addVotersDistrict.php" target="blank">
        <div class="hover panel">
          <div class="front">  
            <div class="box1">
              <div class="boxhed"><p>Add Voters</p></div>
              District Inspectors should add password to the system<br>
              If you have nominated your name will show
              
            </div>
          </div>
          <div class="back">
            <div class="box2">
              <p>Back Side</p>
            </div>
          </div>
        </div></a>
    </div>

    <div class="col_third"><a href="../formpage/addCandidates.php" target="blank">
        <div class="hover panel">
          <div class="front">
            <div class="box1">
              <p><p>Add Candidates</p></p>
            </div>
          </div>
          <div class="back">
            <div class="box2">
              <p>Back Side</p>
            </div>
          </div>
        </div></a>
    </div>

   

   </div>


    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

        <script src="../js/index.js"></script>



      	</div> <!-- end of right div -->
       
       
 </div>
   
 </div>
</body>
 </html>