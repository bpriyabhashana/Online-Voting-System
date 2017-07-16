<?php
session_start();


include 'dbhandler.php';
if (isset($_POST['upload'])) {
	

	$name = $_POST['name'];
	$electrolDistrictId = $_POST['electrolDistrictId'];
	$id = $_POST['id'];
	
	

	//error handling for empty fields


	if (empty($name)) {
		header("Location: ../formPage/addInspectors.php?error=empty");
		exit();
	}

	if ($electrolDistrictId=='-- Select District --'){
		header("Location: ../formPage/addInspectors.php?error=empty");
		exit();
	}

	if (empty($id)) {
		header("Location: ../formPage/addInspectors.php?error=empty");
		exit();
	}
	if (empty($name)) {
		header("Location: ../formPage/addInspectors.php?error=empty");
		exit();
	}
	

	else{

		
		

			$sql = "INSERT INTO districtInspectors (id, name, electrolDistrictId) 
			VALUES ('$id','$name','$electrolDistrictId')";
			$result = $conn->query($sql);

			header("Location: ../formPage/addInspectors.php?submitted");


	}
}







