<?php
include '../header/header.php';
?>

 <?php
include '../include/dbhandler.php';
$district = $_SESSION['district'];
$sql = "SELECT * FROM seats where electrolDistrictId = '$district'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$DistrictName = $row['electrolDistrict'];



  ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="../css/form.css">
<link rel="stylesheet" type="text/css" href="../css/addpages.css" />
<link rel="stylesheet" type="text/css" href="../css/bootstrap.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>

<style>
  ul{
    background-color:;
    cursor: pointer;
  }
  li{
    padding: 12px;
     border: 1px solid #ccc;
  }
  li:hover{
    background-color: #eee;
   border: 1px solid #ccc;
  }
</style>


<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "votepool";

$nic = "";
$name = "";
$electrolDistrictId = "";
$pollingDivision = "";
$pollingDistrict = "";
$photo = "";


mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

try{
  $connect = mysqli_connect($host, $user, $password, $database);
} catch (Exeption $ex){
  echo 'error';
}

function getPosts()
{
  $posts = array();
  $posts[0] = $_POST['nic'];
   $posts[1] = $_POST['name'];
    $posts[2] = $_POST['electrolDistrictId'];
   $posts[3] = $_POST['pollingDivision'];
   $posts[4] = $_POST['pollingDistrict'];
   $posts[5] = $_POST['photo'];
  
   return $posts;
    
}

if (isset($_POST['search'])) {
  $data = getPosts();
  $search_Query = "SELECT * FROM voters WHERE nic = '$data[0]'";
  $search_Result = mysqli_query($connect, $search_Query);

   if ($search_Result) {
     if (mysqli_num_rows($search_Result)) {
       while ($row = mysqli_fetch_array($search_Result)) {
          $nic = $row['nic'];
          $name = $row['name'];
          $electrolDistrictId = $row['electrolDistrictId'];
          $pollingDivision = $row['pollingDivision'];
          $pollingDistrict = $row['pollingDistrict'];
          $photo = $row['photo'];
       }
     } else{
       header("Location: ../formPage/addVotersDistrict.php?error=notfound");
  exit();
     }
   } else{
    echo 'Result Error';
   }
}

else if (isset($_POST['remove'])) {
    $nic = $_POST['nic'];

  
if (empty($nic)) {
  header("Location: ../formPage/addVotersDistrict.php?error=empty");
  exit();
}


else{ 

    $sql = "DELETE FROM voters 
    WHERE nic='$nic'";
    $result = $connect->query($sql);

    
    
    header("Location: ../formPage/addVotersDistrict.php?removed");

}
}
?>



<title>Add Voters</title>

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
    	<?php 
      echo "<h1 align='center'>ADD VOTERS TO - ".$DistrictName." </h1>";
      ?>
        <hr />

        <div class="form-style-6" id="formdiv">
        <h1>ADD VOTERS</h1>

         <?php
              $url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
              if (strpos($url, 'submitted')!== false) {
              echo "<center><font color='blue' size='4'> Submitted!</font></center>";
            }

          ?>
        
         <form action="../include/addVotersDistrict.php" method="POST" enctype="multipart/form-data">
       
         
            <input type="text" name="nic" placeholder="Voter NIC No.">
           
            <input type="text" name="name" placeholder="Voter Name">

           <!--  <?php
           include '../include/dbhandler.php';
                $sql = "SELECT DISTINCT electrolDistrict, electrolDistrictId FROM seats ORDER BY electrolDistrict";
          $result = $conn->query($sql);

          if ($result->num_rows > 0) {
               // output data of each row

               echo "<select name='electrolDistrictId'>";
              // output data of each row
                echo "<option value='-- Select District'>-- Select District --</option>";
              while($row = $result->fetch_assoc()) {

                  echo "<option value='" . $row['electrolDistrictId'] ."'>" . $row['electrolDistrict']."</option>";
              }
              echo "</select>";
          } else {
              echo "0 results";
          }
          $conn->close();
          ?>  -->
          <input type="hidden" name="electrolDistrictId" value="<?php echo $district; ?>">

          <!-- <?php
           include '../include/dbhandler.php';
                $sql = "SELECT pollingDivision FROM area WHERE electrolDistrictId = '$district'";
          $result = $conn->query($sql);

          if ($result->num_rows > 0) {
               // output data of each row

               echo "<select name='pollingDivision'>";
              // output data of each row
                echo "<option value='-- Select Polling Division --'>-- Select Polling Division --</option>";
              while($row = $result->fetch_assoc()) {

                  echo "<option value='" . $row['pollingDivision'] ."'>" . $row['pollingDivision']."</option>";
              }
              echo "</select>";
          } else {
              echo "0 results";
          }
          $conn->close();
          ?>  -->
         <!--   <input type="text" name="pollingDistrict" placeholder="Polling District"> -->
         <input type="text" name="pollingDistrict" id="district" class="" placeholder="Enter Polling District" autocomplete="off">

          <div id="districtList"></div>

          
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


       <!--  ==================== Remove Voters ===================== -->
        
      <?php 
       echo "<h1 align='center'>REMOVE VOTERS FROM - ".$DistrictName." </h1>";
        ?>
        <hr />

        <div class="form-style-6" id="formdiv">
        <h1>REMOVE VOTERS</h1>

         <?php
              $url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
              if (strpos($url, 'removed')!== false) {
              echo "<center><font color='blue' size='4'> Removed!</font></center>";
            }

          ?>
        
         <form action="addVotersDistrict.php" method="POST" enctype="multipart/form-data">
       
         
            <input type="text" name="nic" placeholder="Voter NIC No." value="<?php echo $nic; ?>">

            <input type="submit" name="search" value="Search" style="margin-bottom: 20px;">

            <input type="text" name="name" placeholder="Voter Name" value="<?php echo $name; ?>">

            <input type="text" name="electrolDistrictId" placeholder="District Id" value="<?php echo $electrolDistrictId; ?>">

            <input type="text" name="pollingDivision" placeholder="Polling Division" value="<?php echo $pollingDivision; ?>">

            <input type="text" name="pollingDistrict" placeholder="Polling District" value="<?php echo $pollingDistrict; ?>">


            
            <input type="hidden" name="photo">
            <center><img src="../images/voterPhotos/<?php echo $photo; ?>" width="200px" style="margin-bottom: 20px;  border: 3px solid gray;" ></center>
     

          
            
        
              <?php
                  $url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
                  if (strpos($url, 'error=empty')!== false) {
                    echo "<font color='red'> *Fill all required empty fields </font>";
                  }

                ?>

                <?php
                  $url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
                  if (strpos($url, 'error=notfound')!== false) {
                    echo "<font color='red'> *Voter Not Found </font>";
                  }

                ?>
             

        <input type="submit" name="remove" value="Remove">
       
         
          <!--Error handling result view-->
             
               
           
        </form>
        

        </div>

  </div>
  </div>
</body>
 </html>


 <script>
   $(document).ready(function() {
     $('#district').keyup(function(){
      var query = $(this).val();
      if(query != '')
      {
        $.ajax({
          url:"districtSearch.php",
          method:"POST",
          data:{query:query},
          success:function(data)
          {
            $('#districtList').fadeIn();
            $('#districtList').html(data);
          }
        });
      }

     });

     $(document).on('click','li',function(){
      $('#district').val($(this).text());
      $('#districtList').fadeOut();
     });

   });
 </script>