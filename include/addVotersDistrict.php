<?php
session_start();


include 'dbhandler.php';
if (isset($_POST['upload'])) {
	
	$nic= $_POST['nic'];
	$name = $_POST['name'];
	$electrolDistrictId = $_POST['electrolDistrictId'];
	
	$pollingDistrict = $_POST['pollingDistrict'];
	$photo = $_FILES['photo']['name'];
	 $sql = "SELECT pollingDivision FROM station WHERE pollingDistrict = '$pollingDistrict'";
          $result = $conn->query($sql);
        if ($result->num_rows > 0) {
             
              while($row = $result->fetch_assoc()) {

                  $pollingDivision = $row['pollingDivision'] ;
              }
             
          } else {
              echo "0 results";
          }
	//error handling for empty fields
	if (empty($nic)) {
		header("Location: ../formPage/addVotersDistrict.php?error=empty");
		exit();
	}

	if (empty($name)) {
		header("Location: ../formPage/addVotersDistrict.php?error=empty");
		exit();
	}

	if (empty($electrolDistrictId)) {
		header("Location: ../formPage/addVotersDistrict.php?error=empty");
		exit();
	}

	if (empty($pollingDivision)) {
		header("Location: ../formPage/addVotersDistrict.php?error=empty");
		exit();
	}
	if (empty($pollingDistrict)) {
		header("Location: ../formPage/addVotersDistrict.php?error=empty");
		exit();
	}
	if (empty($photo)) {
		header("Location: ../formPage/addVotersDistrict.php?error=empty");
		exit();
	}



	else{

		
		$target = "../images/voterPhotos/".basename($_FILES['photo']['name']);

			$sql = "INSERT INTO voters (nic, name, electrolDistrictId, pollingDivision, pollingDistrict, photo) 
			VALUES ('$nic','$name','$electrolDistrictId','$pollingDivision','$pollingDistrict','$photo')";
			$result = $conn->query($sql);

			header("Location: ../formPage/addVotersDistrict.php?submitted");

			//store in folder

		if (move_uploaded_file($_FILES['photo']['tmp_name'], $target)) {
			$msg = "Logo added";
		}
		
	}
}







