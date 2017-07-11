<?php
include '../header/header.php';
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="../css/form.css">
<link rel="stylesheet" type="text/css" href="../css/template.css" />

<title>Untitled Document</title>

</head>

<body> 
<div id="maindiv">
<header>

<div id="logodiv"><img src="../images/logo.png" id="logo"></div>
<div id="navdiv">
  <nav>
    <ul>
      <li><a href="../index.php">HOME</a></li>
      <li><a href="login.php">LOG IN</a></li>
    </ul>
  </nav>
</div>
</header>

<div id="leftdiv"></div>

<div id="rightdiv">
    <div id="requestDiv">
    	<h1 align="center">Candidate Register</h1>
        <hr />

        <div class="form-style-6" id="formdiv">
        <h1>Candidate Register</h1>
        
         <form action="../include/candiSignup.php" method="POST">
       
         
         
             	<input name="candiName" type="text" maxlength="40" placeholder="Candidate full name" />
       
        
              
             	<input name="uname" type="text" maxlength="40" placeholder="User name" />
              <br>
              <?php
                  $url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
                  if (strpos($url, 'error=username')!== false) {
                    echo "<font color='red'> *User name already exists </font>";
                  }

                ?>
           
            <?php
           include '../include/dbhandler.php';
                $sql = "SELECT partyname FROM party";
          $result = $conn->query($sql);

          if ($result->num_rows > 0) {
               // output data of each row

               echo "<select name='party'>";
              // output data of each row
              while($row = $result->fetch_assoc()) {

                  echo "<option value='" . $row['partyname'] ."'>" . $row['partyname']."</option>";
              }
              echo "</select>";
          } else {
              echo "0 results";
          }
          $conn->close();
          ?> 
              

          <input name="password" type="password" maxlength="40" placeholder="Password" />
          
        <input name="repassword" type="password" maxlength="40" placeholder=" Re enter Password" />
            
              <?php
               $url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
                  if (strpos($url, 'error=notmatch')!== false) {
                    echo "<font color='red'>  *Passwords are not match </font>";
                  }
                ?>
           <textarea name="description" cols="40" rows="7" placeholder=" Description" ></textarea>
               <?php
                  $url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
                  if (strpos($url, 'error=empty')!== false) {
                    echo "<font color='red'> *Fill all required empty fields </font>";
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