<?php
 //session_start();
  include '../header/header.php';

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

echo "<h1 align='center' style=''>DISTRICT INSPECTOR PAGE - ".$station." </h1>";

  ?>

      </div>

      

        <hr />





<h3></h3>






      	</div> <!-- end of right div -->
       
       
 </div>
   
 </div>
</body>
 </html>