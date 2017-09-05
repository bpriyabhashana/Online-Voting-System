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
   <tr><td><a href="#amp">Ampara</a></td></tr>
   <tr><td><a href="#anu">Anuradhapura</a></td></tr>
   <tr><td><a href="#bad">Badulla</a></td></tr>
   <tr><td><a href="#bat">Batticaloa</a></td></tr>
   <tr><td><a href="#gal">Galle</a></td></tr>
   <tr><td><a href="#gam">Gampaha</a></td></tr>
   <tr><td><a href="#ham">Hambantota</a></td></tr>
   <tr><td><a href="#jaf">Jafna</a></td></tr>
   <tr><td><a href="#kal">Kalutara</a></td></tr>
   <tr><td><a href="#kan">Kandy</a></td></tr>
  
 
</table>
</div>

<div style="float: right; width: 45%">
<table class="table">
  <tr><td><a href="#keg">Kegalla</a></td></tr>
   <tr><td><a href="#kur">Kurunegala</a></td></tr>
   <tr><td><a href="#mtl">Matale</a></td></tr>
   <tr><td><a href="#mtr">Matara</a></td></tr>
   <tr><td><a href="#mon">Monaragala</a></td></tr>
   <tr><td><a href="#nuw">Nuwara Eliya</a></td></tr>
   <tr><td><a href="#pol">Polonnaruwa</a></td></tr>
   <tr><td><a href="#put">Puttalam</a></td></tr>
   <tr><td><a href="#rat">Ratnapura</a></td></tr>
   <tr><td><a href="#tri">Trincomalee</a></td></tr>
   <tr><td><a href="#van">Vanni</a></td></tr>
 
   
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

<hr>
<!-- End colombo -->


 <!-- ------------- view result in Ampara -------------- -->
<a href="" name="amp"></a>

    <?php
 include '../include/dbhandler.php';
 $sql = "select sum(amp) as total from tempparties;";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
 $total = $row['total'];

 $sql = "select * from seats where electrolDistrictId = 'amp';";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
 $seats = $row['count'];



      $sql = "SELECT partyId,amp FROM tempparties WHERE amp>0 ORDER BY amp DESC";
$result = $conn->query($sql);



if ($result->num_rows > 0) {
     // output data of each row

echo "<h3>Ampara</h3>";

       echo "<table align='center' style='text-align:center; margin-right:100px; width:80%;' class='table'>
     <tr>
     
     <th width='25%'><center>PartyId</center></th>
     <th width='25%'><center>Votes</center></th>
     <th width='25%'><center>Voting Average</center></th>
     <th width='25%'><center>No. of Seats</center></th>
     
     </tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
      $avg = $row["amp"]/$total*100;
      $seatCount = $seats/100*$avg;
        echo "<tr>
       
        <td>".$row["partyId"]."</td>
        <td>".$row["amp"]."</td>
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
 $sql = "select sum(amp) as total from tempparties;";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
 $total = $row['total'];

 $sql = "select * from seats where electrolDistrictId = 'amp';";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
 $seats = $row['count'];



      $sql = "SELECT tempcandidate.candidateNumber,candidate.candidateNumber,tempcandidate.partyid,tempcandidate.votes, candidate.photo,candidate.name,tempcandidate.electrolDistrictId FROM tempcandidate,candidate WHERE tempcandidate.candidateNumber = candidate.candidateNumber AND candidate.electrolDistrictId='amp' AND tempcandidate.partyId = candidate.partyId  ORDER BY votes DESC";
$result = $conn->query($sql);



if ($result->num_rows > 0) {
     // output data of each row

echo "<h3>Candidates of Ampara</h3>";

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
<hr>

<!-- End Ampara -->


 <!-- ------------- view result in Anuradhapura -------------- -->
<a href="" name="anu"></a>

    <?php
 include '../include/dbhandler.php';
 $sql = "select sum(anu) as total from tempparties;";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
 $total = $row['total'];

 $sql = "select * from seats where electrolDistrictId = 'anu';";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
 $seats = $row['count'];



      $sql = "SELECT partyId,amp FROM tempparties WHERE anu>0 ORDER BY anu DESC";
$result = $conn->query($sql);



if ($result->num_rows > 0) {
     // output data of each row

echo "<h3>Anuradhapura</h3>";

       echo "<table align='center' style='text-align:center; margin-right:100px; width:80%;' class='table'>
     <tr>
     
     <th width='25%'><center>PartyId</center></th>
     <th width='25%'><center>Votes</center></th>
     <th width='25%'><center>Voting Average</center></th>
     <th width='25%'><center>No. of Seats</center></th>
     
     </tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
      $avg = $row["anu"]/$total*100;
      $seatCount = $seats/100*$avg;
        echo "<tr>
       
        <td>".$row["partyId"]."</td>
        <td>".$row["anu"]."</td>
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
 $sql = "select sum(anu) as total from tempparties;";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
 $total = $row['total'];

 $sql = "select * from seats where electrolDistrictId = 'anu';";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
 $seats = $row['count'];



      $sql = "SELECT tempcandidate.candidateNumber,candidate.candidateNumber,tempcandidate.partyid,tempcandidate.votes, candidate.photo,candidate.name,tempcandidate.electrolDistrictId FROM tempcandidate,candidate WHERE tempcandidate.candidateNumber = candidate.candidateNumber AND candidate.electrolDistrictId='anu' AND tempcandidate.partyId = candidate.partyId  ORDER BY votes DESC";
$result = $conn->query($sql);



if ($result->num_rows > 0) {
     // output data of each row

echo "<h3>Candidates of Anuradhapura</h3>";

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

<hr>
<!-- End Anuradhapura -->

 <!-- ------------- view result in Badulla -------------- -->
<a href="" name="BAD"></a>

    <?php
 include '../include/dbhandler.php';
 $sql = "select sum(BAD) as total from tempparties;";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
 $total = $row['total'];

 $sql = "select * from seats where electrolDistrictId = 'BAD';";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
 $seats = $row['count'];



      $sql = "SELECT partyId,amp FROM tempparties WHERE BAD>0 ORDER BY BAD DESC";
$result = $conn->query($sql);



if ($result->num_rows > 0) {
     // output data of each row

echo "<h3>Badulla</h3>";

       echo "<table align='center' style='text-align:center; margin-right:100px; width:80%;' class='table'>
     <tr>
     
     <th width='25%'><center>PartyId</center></th>
     <th width='25%'><center>Votes</center></th>
     <th width='25%'><center>Voting Average</center></th>
     <th width='25%'><center>No. of Seats</center></th>
     
     </tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
      $avg = $row["BAD"]/$total*100;
      $seatCount = $seats/100*$avg;
        echo "<tr>
       
        <td>".$row["partyId"]."</td>
        <td>".$row["BAD"]."</td>
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
 $sql = "select sum(BAD) as total from tempparties;";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
 $total = $row['total'];

 $sql = "select * from seats where electrolDistrictId = 'BAD';";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
 $seats = $row['count'];



      $sql = "SELECT tempcandidate.candidateNumber,candidate.candidateNumber,tempcandidate.partyid,tempcandidate.votes, candidate.photo,candidate.name,tempcandidate.electrolDistrictId FROM tempcandidate,candidate WHERE tempcandidate.candidateNumber = candidate.candidateNumber AND candidate.electrolDistrictId='BAD' AND tempcandidate.partyId = candidate.partyId  ORDER BY votes DESC";
$result = $conn->query($sql);



if ($result->num_rows > 0) {
     // output data of each row

echo "<h3>Candidates of Badulla</h3>";

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

<hr>
<!-- End Badulla -->


 <!-- ------------- view result in Batticaloa -------------- -->
<a href="" name="bat"></a>

    <?php
 include '../include/dbhandler.php';
 $sql = "select sum(bat) as total from tempparties;";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
 $total = $row['total'];

 $sql = "select * from seats where electrolDistrictId = 'bat';";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
 $seats = $row['count'];



      $sql = "SELECT partyId,amp FROM tempparties WHERE bat>0 ORDER BY bat DESC";
$result = $conn->query($sql);



if ($result->num_rows > 0) {
     // output data of each row

echo "<h3>Batticaloa</h3>";

       echo "<table align='center' style='text-align:center; margin-right:100px; width:80%;' class='table'>
     <tr>
     
     <th width='25%'><center>PartyId</center></th>
     <th width='25%'><center>Votes</center></th>
     <th width='25%'><center>Voting Average</center></th>
     <th width='25%'><center>No. of Seats</center></th>
     
     </tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
      $avg = $row["bat"]/$total*100;
      $seatCount = $seats/100*$avg;
        echo "<tr>
       
        <td>".$row["partyId"]."</td>
        <td>".$row["bat"]."</td>
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
 $sql = "select sum(bat) as total from tempparties;";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
 $total = $row['total'];

 $sql = "select * from seats where electrolDistrictId = 'bat';";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
 $seats = $row['count'];



      $sql = "SELECT tempcandidate.candidateNumber,candidate.candidateNumber,tempcandidate.partyid,tempcandidate.votes, candidate.photo,candidate.name,tempcandidate.electrolDistrictId FROM tempcandidate,candidate WHERE tempcandidate.candidateNumber = candidate.candidateNumber AND candidate.electrolDistrictId='bat' AND tempcandidate.partyId = candidate.partyId  ORDER BY votes DESC";
$result = $conn->query($sql);



if ($result->num_rows > 0) {
     // output data of each row

echo "<h3>Candidates of Batticaloa</h3>";

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

<hr>

<!-- End Batticaloa -->


 <!-- ------------- view result in Galle -------------- -->
<a href="" name="gal"></a>

    <?php
 include '../include/dbhandler.php';
 $sql = "select sum(gal) as total from tempparties;";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
 $total = $row['total'];

 $sql = "select * from seats where electrolDistrictId = 'gal';";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
 $seats = $row['count'];



      $sql = "SELECT partyId,amp FROM tempparties WHERE gal>0 ORDER BY gal DESC";
$result = $conn->query($sql);



if ($result->num_rows > 0) {
     // output data of each row

echo "<h3>Galle</h3>";

       echo "<table align='center' style='text-align:center; margin-right:100px; width:80%;' class='table'>
     <tr>
     
     <th width='25%'><center>PartyId</center></th>
     <th width='25%'><center>Votes</center></th>
     <th width='25%'><center>Voting Average</center></th>
     <th width='25%'><center>No. of Seats</center></th>
     
     </tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
      $avg = $row["gal"]/$total*100;
      $seatCount = $seats/100*$avg;
        echo "<tr>
       
        <td>".$row["partyId"]."</td>
        <td>".$row["gal"]."</td>
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
 $sql = "select sum(gal) as total from tempparties;";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
 $total = $row['total'];

 $sql = "select * from seats where electrolDistrictId = 'gal';";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
 $seats = $row['count'];



      $sql = "SELECT tempcandidate.candidateNumber,candidate.candidateNumber,tempcandidate.partyid,tempcandidate.votes, candidate.photo,candidate.name,tempcandidate.electrolDistrictId FROM tempcandidate,candidate WHERE tempcandidate.candidateNumber = candidate.candidateNumber AND candidate.electrolDistrictId='gal' AND tempcandidate.partyId = candidate.partyId  ORDER BY votes DESC";
$result = $conn->query($sql);



if ($result->num_rows > 0) {
     // output data of each row

echo "<h3>Candidates of Galle</h3>";

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


<!-- End Galle -->
<hr>


 <!-- ------------- view result in Gampaha -------------- -->
<a href="" name="gam"></a>

    <?php
 include '../include/dbhandler.php';
 $sql = "select sum(gam) as total from tempparties;";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
 $total = $row['total'];

 $sql = "select * from seats where electrolDistrictId = 'gam';";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
 $seats = $row['count'];



      $sql = "SELECT partyId,amp FROM tempparties WHERE gam>0 ORDER BY gam DESC";
$result = $conn->query($sql);



if ($result->num_rows > 0) {
     // output data of each row

echo "<h3>Gampaha</h3>";

       echo "<table align='center' style='text-align:center; margin-right:100px; width:80%;' class='table'>
     <tr>
     
     <th width='25%'><center>PartyId</center></th>
     <th width='25%'><center>Votes</center></th>
     <th width='25%'><center>Voting Average</center></th>
     <th width='25%'><center>No. of Seats</center></th>
     
     </tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
      $avg = $row["gam"]/$total*100;
      $seatCount = $seats/100*$avg;
        echo "<tr>
       
        <td>".$row["partyId"]."</td>
        <td>".$row["gam"]."</td>
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
 $sql = "select sum(gam) as total from tempparties;";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
 $total = $row['total'];

 $sql = "select * from seats where electrolDistrictId = 'gam';";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
 $seats = $row['count'];



      $sql = "SELECT tempcandidate.candidateNumber,candidate.candidateNumber,tempcandidate.partyid,tempcandidate.votes, candidate.photo,candidate.name,tempcandidate.electrolDistrictId FROM tempcandidate,candidate WHERE tempcandidate.candidateNumber = candidate.candidateNumber AND candidate.electrolDistrictId='gam' AND tempcandidate.partyId = candidate.partyId  ORDER BY votes DESC";
$result = $conn->query($sql);



if ($result->num_rows > 0) {
     // output data of each row

echo "<h3>Candidates of Gampaha</h3>";

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


<!-- End Gampaha -->

<hr>

 <!-- ------------- view result in Hambantota -------------- -->
<a href="" name="ham"></a>

    <?php
 include '../include/dbhandler.php';
 $sql = "select sum(ham) as total from tempparties;";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
 $total = $row['total'];

 $sql = "select * from seats where electrolDistrictId = 'ham';";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
 $seats = $row['count'];



      $sql = "SELECT partyId,amp FROM tempparties WHERE ham>0 ORDER BY ham DESC";
$result = $conn->query($sql);



if ($result->num_rows > 0) {
     // output data of each row

echo "<h3>Hambantota</h3>";

       echo "<table align='center' style='text-align:center; margin-right:100px; width:80%;' class='table'>
     <tr>
     
     <th width='25%'><center>PartyId</center></th>
     <th width='25%'><center>Votes</center></th>
     <th width='25%'><center>Voting Average</center></th>
     <th width='25%'><center>No. of Seats</center></th>
     
     </tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
      $avg = $row["ham"]/$total*100;
      $seatCount = $seats/100*$avg;
        echo "<tr>
       
        <td>".$row["partyId"]."</td>
        <td>".$row["ham"]."</td>
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
 $sql = "select sum(ham) as total from tempparties;";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
 $total = $row['total'];

 $sql = "select * from seats where electrolDistrictId = 'ham';";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
 $seats = $row['count'];



      $sql = "SELECT tempcandidate.candidateNumber,candidate.candidateNumber,tempcandidate.partyid,tempcandidate.votes, candidate.photo,candidate.name,tempcandidate.electrolDistrictId FROM tempcandidate,candidate WHERE tempcandidate.candidateNumber = candidate.candidateNumber AND candidate.electrolDistrictId='ham' AND tempcandidate.partyId = candidate.partyId  ORDER BY votes DESC";
$result = $conn->query($sql);



if ($result->num_rows > 0) {
     // output data of each row

echo "<h3>Candidates of Hambantota</h3>";

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
<hr>

<!-- End Hambantota -->

 <!-- ------------- view result in Jafna -------------- -->
<a href="" name="jaf"></a>

    <?php
 include '../include/dbhandler.php';
 $sql = "select sum(jaf) as total from tempparties;";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
 $total = $row['total'];

 $sql = "select * from seats where electrolDistrictId = 'jaf';";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
 $seats = $row['count'];



      $sql = "SELECT partyId,amp FROM tempparties WHERE jaf>0 ORDER BY jaf DESC";
$result = $conn->query($sql);



if ($result->num_rows > 0) {
     // output data of each row

echo "<h3>Jafna</h3>";

       echo "<table align='center' style='text-align:center; margin-right:100px; width:80%;' class='table'>
     <tr>
     
     <th width='25%'><center>PartyId</center></th>
     <th width='25%'><center>Votes</center></th>
     <th width='25%'><center>Voting Average</center></th>
     <th width='25%'><center>No. of Seats</center></th>
     
     </tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
      $avg = $row["jaf"]/$total*100;
      $seatCount = $seats/100*$avg;
        echo "<tr>
       
        <td>".$row["partyId"]."</td>
        <td>".$row["jaf"]."</td>
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
 $sql = "select sum(jaf) as total from tempparties;";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
 $total = $row['total'];

 $sql = "select * from seats where electrolDistrictId = 'jaf';";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
 $seats = $row['count'];



      $sql = "SELECT tempcandidate.candidateNumber,candidate.candidateNumber,tempcandidate.partyid,tempcandidate.votes, candidate.photo,candidate.name,tempcandidate.electrolDistrictId FROM tempcandidate,candidate WHERE tempcandidate.candidateNumber = candidate.candidateNumber AND candidate.electrolDistrictId='jaf' AND tempcandidate.partyId = candidate.partyId  ORDER BY votes DESC";
$result = $conn->query($sql);



if ($result->num_rows > 0) {
     // output data of each row

echo "<h3>Candidates of Jafna</h3>";

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

<hr>
<!-- End Jafna -->

<!-- ------------- view result in Kalutara -------------- -->
<a href="" name="kal"></a>

    <?php
 include '../include/dbhandler.php';
 $sql = "select sum(kal) as total from tempparties;";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
 $total = $row['total'];

 $sql = "select * from seats where electrolDistrictId = 'kal';";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
 $seats = $row['count'];



      $sql = "SELECT partyId,amp FROM tempparties WHERE kal>0 ORDER BY kal DESC";
$result = $conn->query($sql);



if ($result->num_rows > 0) {
     // output data of each row

echo "<h3>Kalutara</h3>";

       echo "<table align='center' style='text-align:center; margin-right:100px; width:80%;' class='table'>
     <tr>
     
     <th width='25%'><center>PartyId</center></th>
     <th width='25%'><center>Votes</center></th>
     <th width='25%'><center>Voting Average</center></th>
     <th width='25%'><center>No. of Seats</center></th>
     
     </tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
      $avg = $row["kal"]/$total*100;
      $seatCount = $seats/100*$avg;
        echo "<tr>
       
        <td>".$row["partyId"]."</td>
        <td>".$row["kal"]."</td>
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
 $sql = "select sum(kal) as total from tempparties;";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
 $total = $row['total'];

 $sql = "select * from seats where electrolDistrictId = 'kal';";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
 $seats = $row['count'];



      $sql = "SELECT tempcandidate.candidateNumber,candidate.candidateNumber,tempcandidate.partyid,tempcandidate.votes, candidate.photo,candidate.name,tempcandidate.electrolDistrictId FROM tempcandidate,candidate WHERE tempcandidate.candidateNumber = candidate.candidateNumber AND candidate.electrolDistrictId='kal' AND tempcandidate.partyId = candidate.partyId  ORDER BY votes DESC";
$result = $conn->query($sql);



if ($result->num_rows > 0) {
     // output data of each row

echo "<h3>Candidates of Kalutara</h3>";

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
<hr>

<!-- End Kalutara -->

<!-- ------------- view result in Kandy -------------- -->
<a href="" name="kan"></a>

    <?php
 include '../include/dbhandler.php';
 $sql = "select sum(kan) as total from tempparties;";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
 $total = $row['total'];

 $sql = "select * from seats where electrolDistrictId = 'kan';";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
 $seats = $row['count'];



      $sql = "SELECT partyId,amp FROM tempparties WHERE kan>0 ORDER BY kan DESC";
$result = $conn->query($sql);



if ($result->num_rows > 0) {
     // output data of each row

echo "<h3>Kandy</h3>";

       echo "<table align='center' style='text-align:center; margin-right:100px; width:80%;' class='table'>
     <tr>
     
     <th width='25%'><center>PartyId</center></th>
     <th width='25%'><center>Votes</center></th>
     <th width='25%'><center>Voting Average</center></th>
     <th width='25%'><center>No. of Seats</center></th>
     
     </tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
      $avg = $row["kan"]/$total*100;
      $seatCount = $seats/100*$avg;
        echo "<tr>
       
        <td>".$row["partyId"]."</td>
        <td>".$row["kan"]."</td>
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
 $sql = "select sum(kan) as total from tempparties;";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
 $total = $row['total'];

 $sql = "select * from seats where electrolDistrictId = 'kan';";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
 $seats = $row['count'];



      $sql = "SELECT tempcandidate.candidateNumber,candidate.candidateNumber,tempcandidate.partyid,tempcandidate.votes, candidate.photo,candidate.name,tempcandidate.electrolDistrictId FROM tempcandidate,candidate WHERE tempcandidate.candidateNumber = candidate.candidateNumber AND candidate.electrolDistrictId='kan' AND tempcandidate.partyId = candidate.partyId  ORDER BY votes DESC";
$result = $conn->query($sql);



if ($result->num_rows > 0) {
     // output data of each row

echo "<h3>Candidates of Kandy</h3>";

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
<hr>

<!-- End Kandy -->

<!-- ------------- view result in Kegalla -------------- -->
<a href="" name="keg"></a>

    <?php
 include '../include/dbhandler.php';
 $sql = "select sum(keg) as total from tempparties;";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
 $total = $row['total'];

 $sql = "select * from seats where electrolDistrictId = 'keg';";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
 $seats = $row['count'];



      $sql = "SELECT partyId,amp FROM tempparties WHERE keg>0 ORDER BY keg DESC";
$result = $conn->query($sql);



if ($result->num_rows > 0) {
     // output data of each row

echo "<h3>Kegalla</h3>";

       echo "<table align='center' style='text-align:center; margin-right:100px; width:80%;' class='table'>
     <tr>
     
     <th width='25%'><center>PartyId</center></th>
     <th width='25%'><center>Votes</center></th>
     <th width='25%'><center>Voting Average</center></th>
     <th width='25%'><center>No. of Seats</center></th>
     
     </tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
      $avg = $row["keg"]/$total*100;
      $seatCount = $seats/100*$avg;
        echo "<tr>
       
        <td>".$row["partyId"]."</td>
        <td>".$row["keg"]."</td>
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
 $sql = "select sum(keg) as total from tempparties;";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
 $total = $row['total'];

 $sql = "select * from seats where electrolDistrictId = 'keg';";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
 $seats = $row['count'];



      $sql = "SELECT tempcandidate.candidateNumber,candidate.candidateNumber,tempcandidate.partyid,tempcandidate.votes, candidate.photo,candidate.name,tempcandidate.electrolDistrictId FROM tempcandidate,candidate WHERE tempcandidate.candidateNumber = candidate.candidateNumber AND candidate.electrolDistrictId='keg' AND tempcandidate.partyId = candidate.partyId  ORDER BY votes DESC";
$result = $conn->query($sql);



if ($result->num_rows > 0) {
     // output data of each row

echo "<h3>Candidates of Kegalla</h3>";

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

<hr>
<!-- End Kegalla -->

<!-- ------------- view result in Kurunegala -------------- -->
<a href="" name="kur"></a>

    <?php
 include '../include/dbhandler.php';
 $sql = "select sum(kur) as total from tempparties;";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
 $total = $row['total'];

 $sql = "select * from seats where electrolDistrictId = 'kur';";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
 $seats = $row['count'];



      $sql = "SELECT partyId,amp FROM tempparties WHERE kur>0 ORDER BY kur DESC";
$result = $conn->query($sql);



if ($result->num_rows > 0) {
     // output data of each row

echo "<h3>Kurunegala</h3>";

       echo "<table align='center' style='text-align:center; margin-right:100px; width:80%;' class='table'>
     <tr>
     
     <th width='25%'><center>PartyId</center></th>
     <th width='25%'><center>Votes</center></th>
     <th width='25%'><center>Voting Average</center></th>
     <th width='25%'><center>No. of Seats</center></th>
     
     </tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
      $avg = $row["kur"]/$total*100;
      $seatCount = $seats/100*$avg;
        echo "<tr>
       
        <td>".$row["partyId"]."</td>
        <td>".$row["kur"]."</td>
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
 $sql = "select sum(kur) as total from tempparties;";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
 $total = $row['total'];

 $sql = "select * from seats where electrolDistrictId = 'kur';";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
 $seats = $row['count'];



      $sql = "SELECT tempcandidate.candidateNumber,candidate.candidateNumber,tempcandidate.partyid,tempcandidate.votes, candidate.photo,candidate.name,tempcandidate.electrolDistrictId FROM tempcandidate,candidate WHERE tempcandidate.candidateNumber = candidate.candidateNumber AND candidate.electrolDistrictId='kur' AND tempcandidate.partyId = candidate.partyId  ORDER BY votes DESC";
$result = $conn->query($sql);



if ($result->num_rows > 0) {
     // output data of each row

echo "<h3>Candidates of Kurunegala</h3>";

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
<hr>

<!-- End Kurunegala -->


<!-- ------------- view result in Matale -------------- -->
<a href="" name="mtl"></a>

    <?php
 include '../include/dbhandler.php';
 $sql = "select sum(mtl) as total from tempparties;";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
 $total = $row['total'];

 $sql = "select * from seats where electrolDistrictId = 'mtl';";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
 $seats = $row['count'];



      $sql = "SELECT partyId,amp FROM tempparties WHERE mtl>0 ORDER BY mtl DESC";
$result = $conn->query($sql);



if ($result->num_rows > 0) {
     // output data of each row

echo "<h3>Matale</h3>";

       echo "<table align='center' style='text-align:center; margin-right:100px; width:80%;' class='table'>
     <tr>
     
     <th width='25%'><center>PartyId</center></th>
     <th width='25%'><center>Votes</center></th>
     <th width='25%'><center>Voting Average</center></th>
     <th width='25%'><center>No. of Seats</center></th>
     
     </tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
      $avg = $row["mtl"]/$total*100;
      $seatCount = $seats/100*$avg;
        echo "<tr>
       
        <td>".$row["partyId"]."</td>
        <td>".$row["mtl"]."</td>
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
 $sql = "select sum(mtl) as total from tempparties;";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
 $total = $row['total'];

 $sql = "select * from seats where electrolDistrictId = 'mtl';";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
 $seats = $row['count'];



      $sql = "SELECT tempcandidate.candidateNumber,candidate.candidateNumber,tempcandidate.partyid,tempcandidate.votes, candidate.photo,candidate.name,tempcandidate.electrolDistrictId FROM tempcandidate,candidate WHERE tempcandidate.candidateNumber = candidate.candidateNumber AND candidate.electrolDistrictId='mtl' AND tempcandidate.partyId = candidate.partyId  ORDER BY votes DESC";
$result = $conn->query($sql);



if ($result->num_rows > 0) {
     // output data of each row

echo "<h3>Candidates of Matale</h3>";

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

<hr>
<!-- End Matale -->

<!-- ------------- view result in Matara -------------- -->
<a href="" name="mtr"></a>

    <?php
 include '../include/dbhandler.php';
 $sql = "select sum(mtr) as total from tempparties;";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
 $total = $row['total'];

 $sql = "select * from seats where electrolDistrictId = 'mtr';";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
 $seats = $row['count'];



      $sql = "SELECT partyId,amp FROM tempparties WHERE mtr>0 ORDER BY mtr DESC";
$result = $conn->query($sql);



if ($result->num_rows > 0) {
     // output data of each row

echo "<h3>Matara</h3>";

       echo "<table align='center' style='text-align:center; margin-right:100px; width:80%;' class='table'>
     <tr>
     
     <th width='25%'><center>PartyId</center></th>
     <th width='25%'><center>Votes</center></th>
     <th width='25%'><center>Voting Average</center></th>
     <th width='25%'><center>No. of Seats</center></th>
     
     </tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
      $avg = $row["mtr"]/$total*100;
      $seatCount = $seats/100*$avg;
        echo "<tr>
       
        <td>".$row["partyId"]."</td>
        <td>".$row["mtr"]."</td>
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
 $sql = "select sum(mtr) as total from tempparties;";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
 $total = $row['total'];

 $sql = "select * from seats where electrolDistrictId = 'mtr';";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
 $seats = $row['count'];



      $sql = "SELECT tempcandidate.candidateNumber,candidate.candidateNumber,tempcandidate.partyid,tempcandidate.votes, candidate.photo,candidate.name,tempcandidate.electrolDistrictId FROM tempcandidate,candidate WHERE tempcandidate.candidateNumber = candidate.candidateNumber AND candidate.electrolDistrictId='mtr' AND tempcandidate.partyId = candidate.partyId  ORDER BY votes DESC";
$result = $conn->query($sql);



if ($result->num_rows > 0) {
     // output data of each row

echo "<h3>Candidates of Matara</h3>";

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

<hr>
<!-- End Matara -->

<!-- ------------- view result in Monaragala -------------- -->
<a href="" name="mon"></a>

    <?php
 include '../include/dbhandler.php';
 $sql = "select sum(mon) as total from tempparties;";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
 $total = $row['total'];

 $sql = "select * from seats where electrolDistrictId = 'mon';";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
 $seats = $row['count'];



      $sql = "SELECT partyId,amp FROM tempparties WHERE mon>0 ORDER BY mon DESC";
$result = $conn->query($sql);



if ($result->num_rows > 0) {
     // output data of each row

echo "<h3>Monaragala</h3>";

       echo "<table align='center' style='text-align:center; margin-right:100px; width:80%;' class='table'>
     <tr>
     
     <th width='25%'><center>PartyId</center></th>
     <th width='25%'><center>Votes</center></th>
     <th width='25%'><center>Voting Average</center></th>
     <th width='25%'><center>No. of Seats</center></th>
     
     </tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
      $avg = $row["mon"]/$total*100;
      $seatCount = $seats/100*$avg;
        echo "<tr>
       
        <td>".$row["partyId"]."</td>
        <td>".$row["mon"]."</td>
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
 $sql = "select sum(mon) as total from tempparties;";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
 $total = $row['total'];

 $sql = "select * from seats where electrolDistrictId = 'mon';";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
 $seats = $row['count'];



      $sql = "SELECT tempcandidate.candidateNumber,candidate.candidateNumber,tempcandidate.partyid,tempcandidate.votes, candidate.photo,candidate.name,tempcandidate.electrolDistrictId FROM tempcandidate,candidate WHERE tempcandidate.candidateNumber = candidate.candidateNumber AND candidate.electrolDistrictId='mon' AND tempcandidate.partyId = candidate.partyId  ORDER BY votes DESC";
$result = $conn->query($sql);



if ($result->num_rows > 0) {
     // output data of each row

echo "<h3>Candidates of Monaragala</h3>";

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

<hr>
<!-- End Monaragala -->

<!-- ------------- view result in Nuwara Eliya -------------- -->
<a href="" name="nuw"></a>

    <?php
 include '../include/dbhandler.php';
 $sql = "select sum(nuw) as total from tempparties;";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
 $total = $row['total'];

 $sql = "select * from seats where electrolDistrictId = 'nuw';";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
 $seats = $row['count'];



      $sql = "SELECT partyId,amp FROM tempparties WHERE nuw>0 ORDER BY nuw DESC";
$result = $conn->query($sql);



if ($result->num_rows > 0) {
     // output data of each row

echo "<h3>Nuwara Eliya</h3>";

       echo "<table align='center' style='text-align:center; margin-right:100px; width:80%;' class='table'>
     <tr>
     
     <th width='25%'><center>PartyId</center></th>
     <th width='25%'><center>Votes</center></th>
     <th width='25%'><center>Voting Average</center></th>
     <th width='25%'><center>No. of Seats</center></th>
     
     </tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
      $avg = $row["nuw"]/$total*100;
      $seatCount = $seats/100*$avg;
        echo "<tr>
       
        <td>".$row["partyId"]."</td>
        <td>".$row["nuw"]."</td>
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
 $sql = "select sum(nuw) as total from tempparties;";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
 $total = $row['total'];

 $sql = "select * from seats where electrolDistrictId = 'nuw';";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
 $seats = $row['count'];



      $sql = "SELECT tempcandidate.candidateNumber,candidate.candidateNumber,tempcandidate.partyid,tempcandidate.votes, candidate.photo,candidate.name,tempcandidate.electrolDistrictId FROM tempcandidate,candidate WHERE tempcandidate.candidateNumber = candidate.candidateNumber AND candidate.electrolDistrictId='nuw' AND tempcandidate.partyId = candidate.partyId  ORDER BY votes DESC";
$result = $conn->query($sql);



if ($result->num_rows > 0) {
     // output data of each row

echo "<h3>Candidates of Nuwara Eliya</h3>";

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

<hr>
<!-- End Nuwara Eliya -->

<!-- ------------- view result in Polonnaruwa -------------- -->
<a href="" name="pol"></a>

    <?php
 include '../include/dbhandler.php';
 $sql = "select sum(pol) as total from tempparties;";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
 $total = $row['total'];

 $sql = "select * from seats where electrolDistrictId = 'pol';";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
 $seats = $row['count'];



      $sql = "SELECT partyId,amp FROM tempparties WHERE pol>0 ORDER BY pol DESC";
$result = $conn->query($sql);



if ($result->num_rows > 0) {
     // output data of each row

echo "<h3>Polonnaruwa</h3>";

       echo "<table align='center' style='text-align:center; margin-right:100px; width:80%;' class='table'>
     <tr>
     
     <th width='25%'><center>PartyId</center></th>
     <th width='25%'><center>Votes</center></th>
     <th width='25%'><center>Voting Average</center></th>
     <th width='25%'><center>No. of Seats</center></th>
     
     </tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
      $avg = $row["pol"]/$total*100;
      $seatCount = $seats/100*$avg;
        echo "<tr>
       
        <td>".$row["partyId"]."</td>
        <td>".$row["pol"]."</td>
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
 $sql = "select sum(pol) as total from tempparties;";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
 $total = $row['total'];

 $sql = "select * from seats where electrolDistrictId = 'pol';";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
 $seats = $row['count'];



      $sql = "SELECT tempcandidate.candidateNumber,candidate.candidateNumber,tempcandidate.partyid,tempcandidate.votes, candidate.photo,candidate.name,tempcandidate.electrolDistrictId FROM tempcandidate,candidate WHERE tempcandidate.candidateNumber = candidate.candidateNumber AND candidate.electrolDistrictId='pol' AND tempcandidate.partyId = candidate.partyId  ORDER BY votes DESC";
$result = $conn->query($sql);



if ($result->num_rows > 0) {
     // output data of each row

echo "<h3>Candidates of Polonnaruwa</h3>";

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


<!-- End Polonnaruwa-->
<hr>

<!-- ------------- view result in Puttalam -------------- -->
<a href="" name="put"></a>

    <?php
 include '../include/dbhandler.php';
 $sql = "select sum(put) as total from tempparties;";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
 $total = $row['total'];

 $sql = "select * from seats where electrolDistrictId = 'put';";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
 $seats = $row['count'];



      $sql = "SELECT partyId,amp FROM tempparties WHERE put>0 ORDER BY put DESC";
$result = $conn->query($sql);



if ($result->num_rows > 0) {
     // output data of each row

echo "<h3>Puttalam</h3>";

       echo "<table align='center' style='text-align:center; margin-right:100px; width:80%;' class='table'>
     <tr>
     
     <th width='25%'><center>PartyId</center></th>
     <th width='25%'><center>Votes</center></th>
     <th width='25%'><center>Voting Average</center></th>
     <th width='25%'><center>No. of Seats</center></th>
     
     </tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
      $avg = $row["put"]/$total*100;
      $seatCount = $seats/100*$avg;
        echo "<tr>
       
        <td>".$row["partyId"]."</td>
        <td>".$row["put"]."</td>
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
 $sql = "select sum(put) as total from tempparties;";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
 $total = $row['total'];

 $sql = "select * from seats where electrolDistrictId = 'put';";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
 $seats = $row['count'];



      $sql = "SELECT tempcandidate.candidateNumber,candidate.candidateNumber,tempcandidate.partyid,tempcandidate.votes, candidate.photo,candidate.name,tempcandidate.electrolDistrictId FROM tempcandidate,candidate WHERE tempcandidate.candidateNumber = candidate.candidateNumber AND candidate.electrolDistrictId='put' AND tempcandidate.partyId = candidate.partyId  ORDER BY votes DESC";
$result = $conn->query($sql);



if ($result->num_rows > 0) {
     // output data of each row

echo "<h3>Candidates of Puttalam</h3>";

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

<hr>
<!-- End Puttalam-->

<!-- ------------- view result in Ratnapura -------------- -->
<a href="" name="rat"></a>

    <?php
 include '../include/dbhandler.php';
 $sql = "select sum(rat) as total from tempparties;";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
 $total = $row['total'];

 $sql = "select * from seats where electrolDistrictId = 'rat';";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
 $seats = $row['count'];



      $sql = "SELECT partyId,amp FROM tempparties WHERE rat>0 ORDER BY rat DESC";
$result = $conn->query($sql);



if ($result->num_rows > 0) {
     // output data of each row

echo "<h3>Ratnapura</h3>";

       echo "<table align='center' style='text-align:center; margin-right:100px; width:80%;' class='table'>
     <tr>
     
     <th width='25%'><center>PartyId</center></th>
     <th width='25%'><center>Votes</center></th>
     <th width='25%'><center>Voting Average</center></th>
     <th width='25%'><center>No. of Seats</center></th>
     
     </tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
      $avg = $row["rat"]/$total*100;
      $seatCount = $seats/100*$avg;
        echo "<tr>
       
        <td>".$row["partyId"]."</td>
        <td>".$row["rat"]."</td>
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
 $sql = "select sum(rat) as total from tempparties;";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
 $total = $row['total'];

 $sql = "select * from seats where electrolDistrictId = 'rat';";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
 $seats = $row['count'];



      $sql = "SELECT tempcandidate.candidateNumber,candidate.candidateNumber,tempcandidate.partyid,tempcandidate.votes, candidate.photo,candidate.name,tempcandidate.electrolDistrictId FROM tempcandidate,candidate WHERE tempcandidate.candidateNumber = candidate.candidateNumber AND candidate.electrolDistrictId='rat' AND tempcandidate.partyId = candidate.partyId  ORDER BY votes DESC";
$result = $conn->query($sql);



if ($result->num_rows > 0) {
     // output data of each row

echo "<h3>Candidates of Ratnapura</h3>";

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
<hr>

<!-- End Ratnapura-->

<!-- ------------- view result in Trincomalee -------------- -->
<a href="" name="tri"></a>

    <?php
 include '../include/dbhandler.php';
 $sql = "select sum(tri) as total from tempparties;";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
 $total = $row['total'];

 $sql = "select * from seats where electrolDistrictId = 'tri';";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
 $seats = $row['count'];



      $sql = "SELECT partyId,amp FROM tempparties WHERE tri>0 ORDER BY tri DESC";
$result = $conn->query($sql);



if ($result->num_rows > 0) {
     // output data of each row

echo "<h3>Trincomalee</h3>";

       echo "<table align='center' style='text-align:center; margin-right:100px; width:80%;' class='table'>
     <tr>
     
     <th width='25%'><center>PartyId</center></th>
     <th width='25%'><center>Votes</center></th>
     <th width='25%'><center>Voting Average</center></th>
     <th width='25%'><center>No. of Seats</center></th>
     
     </tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
      $avg = $row["tri"]/$total*100;
      $seatCount = $seats/100*$avg;
        echo "<tr>
       
        <td>".$row["partyId"]."</td>
        <td>".$row["tri"]."</td>
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
 $sql = "select sum(tri) as total from tempparties;";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
 $total = $row['total'];

 $sql = "select * from seats where electrolDistrictId = 'tri';";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
 $seats = $row['count'];



      $sql = "SELECT tempcandidate.candidateNumber,candidate.candidateNumber,tempcandidate.partyid,tempcandidate.votes, candidate.photo,candidate.name,tempcandidate.electrolDistrictId FROM tempcandidate,candidate WHERE tempcandidate.candidateNumber = candidate.candidateNumber AND candidate.electrolDistrictId='tri' AND tempcandidate.partyId = candidate.partyId  ORDER BY votes DESC";
$result = $conn->query($sql);



if ($result->num_rows > 0) {
     // output data of each row

echo "<h3>Candidates of Trincomalee</h3>";

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
<hr>

<!-- End Trincomalee-->


<!-- ------------- view result in Vanni -------------- -->
<a href="" name="van"></a>

    <?php
 include '../include/dbhandler.php';
 $sql = "select sum(van) as total from tempparties;";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
 $total = $row['total'];

 $sql = "select * from seats where electrolDistrictId = 'van';";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
 $seats = $row['count'];



      $sql = "SELECT partyId,amp FROM tempparties WHERE van>0 ORDER BY van DESC";
$result = $conn->query($sql);



if ($result->num_rows > 0) {
     // output data of each row

echo "<h3>Vanni</h3>";

       echo "<table align='center' style='text-align:center; margin-right:100px; width:80%;' class='table'>
     <tr>
     
     <th width='25%'><center>PartyId</center></th>
     <th width='25%'><center>Votes</center></th>
     <th width='25%'><center>Voting Average</center></th>
     <th width='25%'><center>No. of Seats</center></th>
     
     </tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
      $avg = $row["van"]/$total*100;
      $seatCount = $seats/100*$avg;
        echo "<tr>
       
        <td>".$row["partyId"]."</td>
        <td>".$row["van"]."</td>
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
 $sql = "select sum(van) as total from tempparties;";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
 $total = $row['total'];

 $sql = "select * from seats where electrolDistrictId = 'van';";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
 $seats = $row['count'];



      $sql = "SELECT tempcandidate.candidateNumber,candidate.candidateNumber,tempcandidate.partyid,tempcandidate.votes, candidate.photo,candidate.name,tempcandidate.electrolDistrictId FROM tempcandidate,candidate WHERE tempcandidate.candidateNumber = candidate.candidateNumber AND candidate.electrolDistrictId='van' AND tempcandidate.partyId = candidate.partyId  ORDER BY votes DESC";
$result = $conn->query($sql);



if ($result->num_rows > 0) {
     // output data of each row

echo "<h3>Candidates of Vanni</h3>";

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
<!-- End Vanni-->
</body>
</html>