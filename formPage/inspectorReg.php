<?php
include '../header/header.php';
?>

<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "votepool";

$id = "";
$name = "";
$electrolDistrictId = "";


mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

try{
  $connect = mysqli_connect($host, $user, $password, $database);
} catch (Exeption $ex){
  echo 'error';
}

function getPosts()
{
  $posts = array();
  $posts[0] = $_POST['id'];
   $posts[1] = $_POST['name'];
   $posts[2] = $_POST['electrolDistrictId'];
   return $posts;
    
}

if (isset($_POST['search'])) {
  $data = getPosts();
  $search_Query = "SELECT * FROM districtInspectors WHERE electrolDistrictId = '$data[2]'";
  $search_Result = mysqli_query($connect, $search_Query);

   if ($search_Result) {
     if (mysqli_num_rows($search_Result)) {
       while ($row = mysqli_fetch_array($search_Result)) {
         $id = $row['id'];
          $name = $row['name'];
          $electrolDistrictId = $row['electrolDistrictId'];
       }
     } else{
      echo 'No Inspector for this District';
     }
   } else{
    echo 'Result Error';
   }
}

else if (isset($_POST['update'])) {
  $electrolDistrictId = $_POST['electrolDistrict'];
  $id = $_POST['id'];
  $name = $_POST['name'];
  $password = $_POST['password'];
  $rePassword = $_POST['rePassword'];
  $encrypted_password = password_hash($password, PASSWORD_DEFAULT);


  if ($password!=$rePassword) {
  header("Location: ../formPage/inspectorReg.php?error=notmatch");
  exit();
}

if (empty($password)) {
  header("Location: ../formPage/inspectorReg.php?error=empty");
  exit();
}

if (empty($rePassword)) {
  header("Location: ../formPage/inspectorReg.php?error=empty");
  exit();
}

else{ 

    $sql = "UPDATE districtInspectors SET
    id = '$id', name='$name', password='$encrypted_password'
    WHERE electrolDistrictId='$electrolDistrictId' ";
    $result = $connect->query($sql);

    
    
    header("Location: ../formPage/inspectorReg.php?submitted");

}
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="../css/form.css">
<link rel="stylesheet" type="text/css" href="../css/addpages.css" />
<link rel="stylesheet" type="text/css" href="../css/bootstrap.css" />


<title>Register Inspectors</title>

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
      <h1 align="center">REGISTER INSPECTORS</h1>
        <hr />

        <div class="form-style-6" id="formdiv">
        <h1>REGISTER INSPECTORS</h1>

         <?php
              $url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
              if (strpos($url, 'submitted')!== false) {
              echo "<center><font color='blue' size='4'> Updated!</font></center>";
            }

          ?>
        
         <form action="inspectorReg.php" method="POST">
       
         
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
       
      
        <input type="submit" name="search" value="Search">
       
         
          <!--Error handling result view-->
            <br><br> 
        <input type="text" name="electrolDistrict" value="<?php echo $electrolDistrictId; ?>">
        <input type="text" name="id" value="<?php echo $id; ?>">
        <input type="text" name="name" value="<?php echo $name; ?>">
         <input type="password" name="password" placeholder="Enter Password">
          <input type="password" name="rePassword" placeholder="Re Enter Password">

         <?php
                  $url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
                  if (strpos($url, 'error=notmatch')!== false) {
                    echo "<font color='red'> *Passwords are not match </font>";
                  }
          ?>

           <?php
                  $url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
                  if (strpos($url, 'error=empty')!== false) {
                    echo "<font color='red'> *Fill all required empty fields </font>";
                  }
          ?>
          <input type="submit" name="update" value="Update">
           
        </form>
         

        </div>
      
  </div>
  </div>
</body>
 </html>