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


<title>Add Admin</title>

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
      <h1 align="center">ADD ADMIN</h1>
        <hr />

        <div class="form-style-6" id="formdiv">
        <h1>ADD ADMIN</h1>

         <?php
              $url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
              if (strpos($url, 'submitted')!== false) {
              echo "<center><font color='blue' size='4'> Submitted!</font></center>";
            }

          ?>
        
         <form action="../include/addAdmin.php" method="POST">
       
         
            <input type="text" name="name" placeholder="Admin Name">
           
            <input type="text" name="userName" placeholder="User Name">
           
           <input type="password" name="password" placeholder="Password">
           
            <input type="password" name="rePassword" placeholder="Re Enter Password">
           
       
        
              <?php
                  $url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
                  if (strpos($url, 'error=empty')!== false) {
                    echo "<font color='red'> *Fill all required empty fields </font>";
                  }

                ?>

                 <?php
                  $url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
                  if (strpos($url, 'error=username')!== false) {
                    echo "<font color='red'> *User name already exists </font>";
                  }

                ?>

                 <?php
                  $url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
                  if (strpos($url, 'error=notmatch')!== false) {
                    echo "<font color='red'> *Passwords are not match </font>";
                  }

                ?>
             
         <input type="reset" value="reset">
        <input type="submit">
       
         
          <!--Error handling result view-->
             
               
           
        </form>
        

        </div>
        
  </div>
  </div>
</body>
 </html>