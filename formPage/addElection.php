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


<title>Untitled Document</title>

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
    	<h1 align="center">ADD ELECTION</h1>
        <hr />

        <div class="form-style-6" id="formdiv">
        <h1>ADD ELECTION</h1>
        
         <form action="../include/addElection.php" method="POST">
       
         
            <select name="type">
               <option value="-- Enter Election Type --">-- Enter Election Type --</option>
              <option value="Presidential Election">Presidential Election</option>
              <option value="Parliamentary Election">Parliamentary Election</option>
            </select>
             	
            Enter Date
            <input type="date" name="date" placeholder="Date" value="yyyy/mm/dd">
            Start Time
            <input type="time" name="startTime" placeholder="Start Time">
             End Time
            <input type="time" name="endTime" placeholder="End Time">
       
        
              
             
         <input type="reset" value="reset">
        <input type="submit">
       
         
          <!--Error handling result view-->
             
               
           
        </form>
        </div>
        
  </div>
  </div>
</body>
 </html>