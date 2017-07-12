<?php
 //session_start();
  include '../header/header.php';

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Untitled Document</title>

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
          <li role="presentation"><p style="color:white; font-size: 20px; margin-right: 50px" >
        <?php
          if (isset($_SESSION['uname'])) {
            echo "HI ".$_SESSION['uname'];
          }
        ?>
          </p></li>
          <li><a href="#"> <form action="../include/logout.php">
       <button type="submit" id="logout" style="background: transparent;" >LOG OUT</button>
       </form></a></li>
        </ul>
      </nav>
    </div>
    </header>

    <div id="leftdiv">
      
    <a href="../formpage/addElection.php"><img src="../images/png/1.png" class="img-responsive navimg"></a>
    <img src="../images/png/2.png" class="img-responsive navimg">
    <img src="../images/png/3.png" class="img-responsive navimg">
    <img src="../images/png/4.png" class="img-responsive navimg">
    <img src="../images/png/5.png" class="img-responsive navimg">

    </div>


    <div id="rightdiv">

      <div id="titleDiv">
        <h1 align="center">Admin page</h1>
      </div>
      
     
    	<h2 align="">
       
      </h2>

      

        <hr />
        <div style="height:auto" id="tablediv" >

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

      	</div>
       
       
 </div>
   
 </div>
</body>
 </html>