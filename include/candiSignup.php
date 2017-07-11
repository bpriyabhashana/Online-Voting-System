<?php
session_start();


include 'dbhandler.php';

$candiName = $_POST['candiName'];
$uname = $_POST['uname'];
$party = $_POST['party'];
$password = $_POST['password'];
$repassword = $_POST['repassword'];
$description = $_POST['description'];

//error handling for empty fields
if (empty($candiName)) {
	header("Location: ../formPage/signup.php?error=empty");
	exit();
}

if (empty($uname)) {
	header("Location: ../formPage/signup.php?error=empty");
	exit();
}

if (empty($party)) {
	header("Location: ../formPage/signup.php?error=empty");
	exit();
}

if (empty($password)) {
	header("Location: ../formPage/signup.php?error=empty");
	exit();
}

if ($password!=$repassword) {
	header("Location: ../formPage/signup.php?error=notmatch");
	exit();
}


else{
	$sql = "SELECT uname FROM candidate WHERE uname='$uname'";
	$result = $conn->query($sql);
	$unamecheck = mysqli_num_rows($result);
	if ($unamecheck > 0) {
		header("Location: ../formPage/signup.php?error=username");
		exit();
	}else{
		$encrypted_password = password_hash($password, PASSWORD_DEFAULT);
		$sql = "INSERT INTO candidate (candiName, uname, party, password, description) 
		VALUES ('$candiName','$uname','$party','$encrypted_password','$description')";
		$result = $conn->query($sql);

		header("Location: ../index.php");
	}
}






