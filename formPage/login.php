<?php
include '../header/header.php';
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="../css/form.css">
<link rel="stylesheet" type="text/css" href="../css/template.css" />
<link rel="stylesheet" type="text/css" href="../css/bootstrap.css" />

<title>Untitled Document</title>

</head>

<body> 
 <div id="maindiv">

       <header>

      <div id="logodiv"><img src="../images/logo.png" id="logo"></div>
      <div id="navdiv">
        <nav>
          <ul>
            <li role="presentation"><a href="../index.php">HOME</a></li>
            <!-- <li><a href="signup.php">SIGN UP</a></li> -->
          </ul>
        </nav>
      </div>
      </header>

   <div id="leftdiv"></div>
   <div id="rightdiv">
      <h1 align="center">Log in</h1>
        <hr />
        <div class="form-style-6" id="formdiv">
        <h1>Log in</h1>
        <form action="../include/login.php" method="POST">
        
          
              
             
              <select name="typeSelect" size="1">
                    <option>--Select Account type--</option>
                        <option value="admin">Administrator</option>
                        <option value="Inspector">Inspector</option>
                </select>

                 <?php
                  $url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
                  if (strpos($url, 'error=selectcandi')!== false) {
                    echo "<font color='red'> *Select account type </font>";
                  }

                ?>

             
             <input name="uname" type="text" maxlength="40" placeholder="User ID" autocomplete="off" />
          
          
         
              <input name="password" type="password" maxlength="40" placeholder="Password"/>
              <br>
              <?php
               $url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
                  if (strpos($url, 'error=notmatch')!== false) {
                    echo "<font color='red'>  *Incorrect password or username </font>";
                  }
                ?>
              
          <?php
                  $url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
                  if (strpos($url, 'error=empty')!== false) {
                    echo "<font color='red'> *Fill all required empty fields </font>";
                  }

                ?>
          
         <input type="submit">
        
        </form>
        </div>
        
    </div>
</div>
   
</body>
 </html>