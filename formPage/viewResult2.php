<?php
include '../header/header.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Untitled Document</title>
<link rel="stylesheet" type="text/css" href="../css/index.css" />
<link rel="stylesheet" type="text/css" href="../css/template.css" />
 <link rel="stylesheet" type="text/css" href="../css/bootstrap.css" />
 <link rel="stylesheet" type="text/css" href="../css/table.css" />
 
</head>

<body>
<div id="maindiv">
<header>

<div id="logodiv"><img src="../images/logo.png" id="logo"></div>

</header>

<div id="leftdiv" style="position: fixed;"> 
<div style="float: left; width: 45%">
<table class="table">
  <tr><td><a href="#col">Colombo</a></td></tr>
   <tr><td><a href="#col">Ampara</a></td></tr>
   <tr><td><a href="#col">Anuradhapura</a></td></tr>
   <tr><td><a href="#col">Badulla</a></td></tr>
   <tr><td><a href="#col">Batticaloa</a></td></tr>
   <tr><td><a href="#col">Galle</a></td></tr>
   <tr><td><a href="#col">Gampaha</a></td></tr>
   <tr><td><a href="#col">Hambantota</a></td></tr>
   <tr><td><a href="#col">Jafna</a></td></tr>
   <tr><td><a href="#col">Kalutara</a></td></tr>
   <tr><td><a href="#col">Kandy</a></td></tr>
  
 
</table>
</div>

<div style="float: right; width: 45%">
<table class="table">
  <tr><td><a href="#col">Kegalla</a></td></tr>
   <tr><td><a href="#col">Kurunegala</a></td></tr>
   <tr><td><a href="#col">Matale</a></td></tr>
   <tr><td><a href="#col">Matara</a></td></tr>
   <tr><td><a href="#col">Monaragala</a></td></tr>
   <tr><td><a href="#col">Nuwara Eliya</a></td></tr>
   <tr><td><a href="#col">Polonnaruwa</a></td></tr>
   <tr><td><a href="#col">Puttalam</a></td></tr>
   <tr><td><a href="#col">Ratnapura</a></td></tr>
   <tr><td><a href="#col">Trincomalee</a></td></tr>
   <tr><td><a href="#col">Vanni</a></td></tr>
 
   
</table>
</div>
</div>
  <div id="rightdiv">

  <!-- ------------- view result in colombo -------------- -->
<a href="" name="col"></a>

    <?php
 include '../include/dbhandler.php';
 $sql = "select sum(col) as total from tempparties;";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
 $total = $row['total'];

 $sql = "select * from seats where electrolDistrictId = 'col';";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
 $seats = $row['count'];



      $sql = "SELECT partyId,col FROM tempparties WHERE col>0 ORDER BY col DESC";
$result = $conn->query($sql);



if ($result->num_rows > 0) {
     // output data of each row

echo "<h3>Colombo</h3>";

       echo "<table align='center' style='text-align:center; margin-right:100px; width:80%;' class='table'>
     <tr>
     
     <th width='25%'><center>PartyId</center></th>
     <th width='25%'><center>Votes</center></th>
     <th width='25%'><center>Voting Average</center></th>
     <th width='25%'><center>No. of Seats</center></th>
     
     </tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
      $avg = $row["col"]/$total*100;
      $seatCount = $seats/100*$avg;
        echo "<tr>
       
       
        <td>".$row["partyId"]."</td>
        <td>".$row["col"]."</td>
        <td>".round($avg,2)." %</td>
        <td>".round($seatCount)."</td>
        
        </tr>";
    }
    echo "</table>";


  
} else {
    echo "0 results";
}
$conn->close();
?>  


 <?php
 include '../include/dbhandler.php';
 $sql = "select sum(col) as total from tempparties;";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
 $total = $row['total'];

 $sql = "select * from seats where electrolDistrictId = 'col';";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
 $seats = $row['count'];



      $sql = "SELECT tempcandidate.candidateNumber,candidate.candidateNumber,tempcandidate.partyid,tempcandidate.votes, candidate.photo,candidate.name,tempcandidate.electrolDistrictId FROM tempcandidate,candidate WHERE tempcandidate.candidateNumber = candidate.candidateNumber AND candidate.electrolDistrictId='COL' AND tempcandidate.partyId = candidate.partyId  ORDER BY votes DESC";
$result = $conn->query($sql);



if ($result->num_rows > 0) {
     // output data of each row

echo "<h3>Candidates of colombo</h3>";

       echo "<table align='center' style='text-align:center; margin-right:100px; width:80%;' class='table'>
     <tr>
     
     <th width='20%'><center>PartyId</center></th>
     <th width='20%'><center>Number</center></th>
     <th width='20%'><center>Name</center></th>
     <th width='20%'><center>Photo</center></th>
     <th width='20%'><center>votes</center></th>
     
     </tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
     
        echo "<tr>
       
       
        <td>".$row["partyid"]."</td>
        <td>".$row["candidateNumber"]."</td>
        <td>".$row["name"]."</td>
        <td><img src='../images/candidatePhotos/".$row["photo"]."' height='50px'></td>
        <td>".$row["votes"]."</td>
        
        </tr>";
    }
    echo "</table>";

   
  
} else {
    echo "0 results";
}
$conn->close();
?>  

</div> 
<!-- End colombo -->

</body>
</html>