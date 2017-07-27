<?php
session_start();


include 'dbhandler.php';
if (isset($_POST['upload'])) {
	

	$name = $_POST['name'];
	$electrolDistrictId = $_POST['electrolDistrictId'];
	$id = $_POST['id'];
	$pollingDistrict = $_POST['pollingDistrict'];
	
	

	//error handling for empty fields


	if (empty($name)) {
		header("Location: ../formPage/addInspectorsStation.php?error=empty");
		exit();
	}

	if ($electrolDistrictId=='-- Select Polling District --'){
		header("Location: ../formPage/addInspectorsStation.php?error=empty");
		exit();
	}

	if (empty($id)) {
		header("Location: ../formPage/addInspectorsStation.php?error=empty");
		exit();
	}
	if (empty($name)) {
		header("Location: ../formPage/addInspectorsStation.php?error=empty");
		exit();
	}
	

	else{

		
		

			$sql = "INSERT INTO stationInspectors (id, name, password, electrolDistrictId, pollingDistrictId) 
			VALUES ('$id','$name','0', '$electrolDistrictId','$pollingDistrict')";
			$result = $conn->query($sql);

			header("Location: ../formPage/addInspectorsStation.php?submitted");


	}
}







