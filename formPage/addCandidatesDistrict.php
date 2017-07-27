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
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>

<style>
  ul{
    background-color:;
    cursor: pointer;
  }
  li{
    padding: 12px;
  }
  li:hover{
    background-color: #eee;
   border: 1px solid #ccc;
  }
</style>
 -->

<title>Add Candidates</title>



<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "votepool";

$name = "";
$partyId = "";
$number = "";
$electrolDistrictId = "";
$province = "";
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
  $posts[0] = $_POST['name'];
   $posts[1] = $_POST['partyId'];
    $posts[2] = $_POST['number'];
   $posts[3] = $_POST['electrolDistrictId'];
   $posts[4] = $_POST['province'];
   $posts[5] = $_POST['photo'];
  
   return $posts;
    
}

if (isset($_POST['search'])) {
  $data = getPosts();
  $search_Query = "SELECT * FROM candidate WHERE name = '$data[0]' AND partyId = '$data[1]'";
  $search_Result = mysqli_query($connect, $search_Query);

   if ($search_Result) {
     if (mysqli_num_rows($search_Result)) {
       while ($row = mysqli_fetch_array($search_Result)) {
          $name = $row['name'];
          $partyId = $row['partyId'];
          $number = $row['candidateNumber'];
          $electrolDistrictId = $row['electrolDistrictId'];
          $province = $row['province'];
          $photo = $row['photo'];
       }
     } else{
       header("Location: ../formPage/addCandidatesDistrict.php?error=notfound");
  exit();
     }
   } else{
    echo 'Result Error';
   }
}

else if (isset($_POST['delete'])) {
    $name = $_POST['name2'];
    $partyId = $_POST['partyId2'];
   


if (empty($name)) {
  header("Location: ../formPage/addCandidatesDistrict.php?error=empty");
  exit();
}

if (empty($partyId)) {
  header("Location: ../formPage/addCandidatesDistrict.php?error=empty");
  exit();
}


else{ 

    $sql = "DELETE FROM candidate 
    WHERE name='$name' AND partyId = '$partyId' ";
    $result = $connect->query($sql);

    
    
    header("Location: ../formPage/addCandidatesDistrict.php?removed");

}
}
?>




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
include '../include/dbhandler.php';
$district = $_SESSION['district'];
$sql = "SELECT * FROM seats where electrolDistrictId = '$district'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$DistrictName = $row['electrolDistrict'];

echo "<h1 align='center'>ADD CANDIDATES TO - ".$DistrictName." </h1>";

  ?>
        <hr />

        <div class="form-style-6" id="formdiv">
        <h1>ADD CANDIDATES</h1>

         <?php
              $url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
              if (strpos($url, 'submitted')!== false) {
              echo "<center><font color='blue' size='4'> Submitted!</font></center>";
            }

          ?>
        
         <form action="../include/addCandidatesDistrict.php" method="POST" enctype="multipart/form-data">
       
         
            <input type="text" name="number" placeholder="Candidate ID" autocomplete="off">
           
            <input type="text" name="name" placeholder="Candidate Name" autocomplete="off">

           <!-- <?php
           include '../include/dbhandler.php';
                $sql = "SELECT DISTINCT province FROM seats ORDER BY province";
          $result = $conn->query($sql);

          if ($result->num_rows > 0) {
               // output data of each row

               echo "<select name='province'>";
              // output data of each row
                echo "<option value='-- Select Province --'>-- Select Province --</option>";
              while($row = $result->fetch_assoc()) {

                  echo "<option value='" . $row['province'] ."'>" . $row['province']."</option>";
              }
              echo "</select>";
          } else {
              echo "0 results";
          }
          $conn->close();
          ?> 
 -->

          <?php
            include '../include/dbhandler.php';
            $district = $_SESSION['district'];
            $sql = "SELECT * FROM seats where electrolDistrictId = '$district'";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            $province = $row['province'];

          ?>
 <input type="hidden" name="province" value="<?php echo $province; ?>">
        
          <!-- sugessions -->
         <!--  <input type="text" name="electrolDistrict" id="district" class="" placeholder="Enter District" autocomplete="off">

          <div id="districtList"></div> -->

       <input type="hidden" name="electrolDistrictId" value="<?php echo $district; ?>">

          <?php
           include '../include/dbhandler.php';
                $sql = "SELECT DISTINCT name,partyId FROM party WHERE electrolDistrictId= '$district' ORDER BY name ";
          $result = $conn->query($sql);

          if ($result->num_rows > 0) {
               // output data of each row

               echo "<select name='partyId'>";
              // output data of each row
                echo "<option value='-- Select Party --'>-- Select Party --</option>";
              while($row = $result->fetch_assoc()) {

                  echo "<option value='" . $row['partyId'] ."'>" . $row['name']."</option>";
              }
              echo "</select>";
          } else {
              echo "0 results";
          }
          $conn->close();
          ?> 

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




        <!-- =========================  UPDATE and DELETE ======================= -->
        

        
      <?php
include '../include/dbhandler.php';
$district = $_SESSION['district'];
$sql = "SELECT * FROM seats where electrolDistrictId = '$district'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$DistrictName = $row['electrolDistrict'];

echo "<h1 align='center'>REMOVE CANDIDATES FROM - ".$DistrictName." </h1>";

  ?>
        <hr />

        <div class="form-style-6" id="formdiv">
        <h1>REMOVE CANDIDATES</h1>

         <?php
              $url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
              if (strpos($url, 'removed')!== false) {
              echo "<center><font color='blue' size='4'> Removed!</font></center>";
            }

          ?>
        
         <form action="../formPage/addCandidatesDistrict.php" method="POST" enctype="multipart/form-data">
       
         
       
           
           <?php
           include '../include/dbhandler.php';
                $sql = "SELECT DISTINCT name FROM candidate  WHERE electrolDistrictId= '$district' ORDER BY name";
          $result = $conn->query($sql);

          if ($result->num_rows > 0) {
               // output data of each row

               echo "<select name='name'>";
              // output data of each row
                echo "<option value='-- Select Name --'>-- Select Name --</option>";
              while($row = $result->fetch_assoc()) {

                  echo "<option value='" . $row['name'] ."'>" . $row['name']."</option>";
              }
              echo "</select>";
          } else {
              echo "0 results";
          }
          $conn->close();
          ?>



            <?php
           include '../include/dbhandler.php';
                $sql = "SELECT DISTINCT name,partyId FROM party  WHERE electrolDistrictId= '$district' ORDER BY name";
          $result = $conn->query($sql);

          if ($result->num_rows > 0) {
               // output data of each row

               echo "<select name='partyId'>";
              // output data of each row
                echo "<option value='-- Select Party --'>-- Select Party --</option>";
              while($row = $result->fetch_assoc()) {

                  echo "<option value='" . $row['partyId'] ."'>" . $row['name']."</option>";
              }
              echo "</select>";
          } else {
              echo "0 results";
          }
          $conn->close();
          ?>

          <input type="submit" name="search" value="Search" style="margin-bottom: 20px">
            <input type="text" name="name2" placeholder="" autocomplete="off"  value="<?php echo $name; ?>">
            <input type="text" name="partyId2" placeholder="" autocomplete="off"  value="<?php echo $partyId; ?>">
            <input type="text" name="number" placeholder="" autocomplete="off"  value="<?php echo $number; ?>">
            <input type="text" name="province" placeholder="" autocomplete="off"  value="<?php echo $province; ?>">
            <input type="text" name="electrolDistrictId" placeholder="" autocomplete="off"  value="<?php echo $electrolDistrictId; ?>">
           
            <input type="hidden" name="photo">
            <center><img src="../images/candidatePhotos/<?php echo $photo; ?>" width="200px" style="margin-bottom: 20px;  border: 3px solid gray;"></center>

          
          <!-- sugessions -->
         <!--  <input type="text" name="electrolDistrict" id="district" class="" placeholder="Enter District" autocomplete="off">

          <div id="districtList"></div> -->

           

       
        
              <?php
                  $url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
                  if (strpos($url, 'error=notfound')!== false) {
                    echo "<font color='red'> *Candidate not found </font>";
                  }

                ?>
             
       
        <input type="submit" name="delete" value="Remove">
       
         
          <!--Error handling result view-->
             
               
           
        </form>
        

        </div>
  </div>
  </div>
</body>
 </html>

 <!-- <script>
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
 </script> -->