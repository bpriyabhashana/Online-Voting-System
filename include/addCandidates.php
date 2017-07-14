<?php
session_start();


include 'dbhandler.php';
if (isset($_POST['upload'])) {
	
	$candidateNumber= $_POST['number'];
	$name = $_POST['name'];
	$province = $_POST['province'];
	$electrolDistrictId = $_POST['electrolDistrictId'];
	$partyId = $_POST['partyId'];
	$photo = $_FILES['photo']['name'];


	//error handling for empty fields
	if (empty($candidateNumber)) {
		header("Location: ../formPage/addCandidates.php?error=empty");
		exit();
	}

	if (empty($name)) {
		header("Location: ../formPage/addCandidates.php?error=empty");
		exit();
	}

	if (empty($province)) {
		header("Location: ../formPage/addCandidates.php?error=empty");
		exit();
	}

	if (empty($electrolDistrictId)) {
		header("Location: ../formPage/addCandidates.php?error=empty");
		exit();
	}
	if (empty($partyId)) {
		header("Location: ../formPage/addCandidates.php?error=empty");
		exit();
	}
	if (empty($photo)) {
		header("Location: ../formPage/addCandidates.php?error=empty");
		exit();
	}



	else{

		
		$target = "../images/candidatePhotos/".basename($_FILES['photo']['name']);

			$sql = "INSERT INTO candidate (candidateNumber, name, province, electrolDistrictId, partyId, photo) 
			VALUES ('$candidateNumber','$name','$province','$electrolDistrictId','$partyId','$photo')";
			$result = $conn->query($sql);

			header("Location: ../formPage/addCandidates.php?submitted");

			//store in folder

		if (move_uploaded_file($_FILES['photo']['tmp_name'], $target)) {
			$msg = "Logo added";
		}
		
	}
}







