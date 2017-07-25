<?php
session_start();


include 'dbhandler.php';
if (isset($_POST['upload'])) {
	
	$partyId = $_POST['partyId'];
	$name = $_POST['name'];
	$electrolDistrictId = $_POST['electrolDistrictId'];
	$logo = $_FILES['logo']['name'];


	//error handling for empty fields
	if (empty($partyId)) {
		header("Location: ../formPage/addParties.php?error=empty");
		exit();
	}

	if (empty($name)) {
		header("Location: ../formPage/addParties.php?error=empty");
		exit();
	}

	if (empty($logo)) {
		header("Location: ../formPage/addParties.php?error=empty");
		exit();
	}

	if ($electrolDistrictId == '-- Select District --') {
		header("Location: ../formPage/addParties.php?error=empty");
		exit();
	}




	else{
		 
		$target = "../images/partyLogos/".basename($_FILES['logo']['name']);

			$sql = "INSERT INTO party (partyId, name, electrolDistrictId, logo) 
			VALUES ('$partyId','$name', '$electrolDistrictId','$logo')";
			$result = $conn->query($sql);

			header("Location: ../formPage/addParties.php?submitted");

			//store in folder

		if (move_uploaded_file($_FILES['logo']['tmp_name'], $target)) {
			$msg = "Logo added";
		}
		
	}
}







