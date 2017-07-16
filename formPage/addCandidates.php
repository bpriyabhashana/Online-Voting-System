<?php
include '../header/header.php';
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="../css/form.css">
<link rel="stylesheet" type="text/css" href="../css/addpages.css" />
<link rel="stylesheet" type="text/css" href="../css/bootstrap.css" />


<title>Add Candidates</title>

</head>

<body> 
<div id="maindiv">
<header>

<div id="logodiv"><img src="../images/logo.png" id="logo"></div>
<div id="navdiv">
  <!-- <nav>
    <ul>
      <li><a href="../index.php">HOME</a></li>
      <li><a href="login.php">LOG IN</a></li>
    </ul>
  </nav> -->
</div>
</header>

<!-- <div id="leftdiv"></div> -->

<div id="rightdiv">
    <div id="requestDiv">
    	<h1 align="center">ADD CANDIDATES</h1>
        <hr />

        <div class="form-style-6" id="formdiv">
        <h1>ADD CANDIDATES</h1>

         <?php
              $url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
              if (strpos($url, 'submitted')!== false) {
              echo "<center><font color='blue' size='4'> Submitted!</font></center>";
            }

          ?>
        
         <form action="../include/addCandidates.php" method="POST" enctype="multipart/form-data">
       
         
            <input type="text" name="number" placeholder="Candidate ID">
           
            <input type="text" name="name" placeholder="Candidate Name">

           <?php
           include '../include/dbhandler.php';
                $sql = "SELECT DISTINCT province FROM seats ORDER BY province";
          $result = $conn->query($sql);

          if ($result->num_rows > 0) {
               // output data of each row

               echo "<select name='province'>";
              // output data of each row
                echo "<option value='-- Select Province --'>-- Select Province --</option>";
              while($row = $result->fetch_assoc()) {

                  echo "<option value='" . $row['province'] ."'>" . $row['province']."</option>";
              }
              echo "</select>";
          } else {
              echo "0 results";
          }
          $conn->close();
          ?> 

          <?php
           include '../include/dbhandler.php';
                $sql = "SELECT DISTINCT electrolDistrict, electrolDistrictId FROM seats ORDER BY electrolDistrict";
          $result = $conn->query($sql);

          if ($result->num_rows > 0) {
               // output data of each row

               echo "<select name='electrolDistrictId'>";
              // output data of each row
                echo "<option value='-- Select District --'>-- Select District --</option>";
              while($row = $result->fetch_assoc()) {

                  echo "<option value='" . $row['electrolDistrictId'] ."'>" . $row['electrolDistrict']."</option>";
              }
              echo "</select>";
          } else {
              echo "0 results";
          }
          $conn->close();
          ?> 

          <?php
           include '../include/dbhandler.php';
                $sql = "SELECT DISTINCT name,partyId FROM party ORDER BY name";
          $result = $conn->query($sql);

          if ($result->num_rows > 0) {
               // output data of each row

               echo "<select name='partyId'>";
              // output data of each row
                echo "<option value='-- Select Party --'>-- Select Party --</option>";
              while($row = $result->fetch_assoc()) {

                  echo "<option value='" . $row['partyId'] ."'>" . $row['name']."</option>";
              }
              echo "</select>";
          } else {
              echo "0 results";
          }
          $conn->close();
          ?> 

             Upload Photo
            <input type="file" name="photo">
       
        
              <?php
                  $url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
                  if (strpos($url, 'error=empty')!== false) {
                    echo "<font color='red'> *Fill all required empty fields </font>";
                  }

                ?>
             
         <input type="reset" value="reset">
        <input type="submit" name="upload">
       
         
          <!--Error handling result view-->
             
               
           
        </form>
        

        </div>
        
  </div>
  </div>
</body>
 </html>