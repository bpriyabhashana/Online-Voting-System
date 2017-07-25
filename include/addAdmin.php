<?php
session_start();


include 'dbhandler.php';

$name = $_POST['name'];
$userName = $_POST['userName'];
$password = $_POST['password'];
$rePassword = $_POST['rePassword'];


//error handling for empty fields

if (empty($name)) {
	header("Location: ../formPage/addAdmin.php?error=empty");
	exit();
}

if (empty($userName)) {
	header("Location: ../formPage/addAdmin.php?error=empty");
	exit();
}

if (empty($password)) {
	header("Location: ../formPage/addAdmin.php?error=empty");
	exit();
}

if (empty($rePassword)) {
	header("Location: ../formPage/addAdmin.php?error=empty");
	exit();
}

if ($password!=$rePassword) {
	header("Location: ../formPage/addAdmin.php?error=notmatch");
	exit();
}




else{ 

	$sql = "SELECT userName FROM admin WHERE userName='$userName'";
	$result = $conn->query($sql);
	$unamecheck = mysqli_num_rows($result);
	if ($unamecheck > 0) {
		header("Location: ../formPage/addAdmin.php?error=username");
		exit();
	}else{
		$encrypted_password = password_hash($password, PASSWORD_DEFAULT);
		$sql = "INSERT INTO admin (name, userName, password) 
		VALUES ('$name','$userName','$encrypted_password')";
		$result = $conn->query($sql);

		
		header("Location: ../formPage/addAdmin.php?submitted");
	}
}






