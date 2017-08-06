<?php
session_start();


include 'dbhandler.php';

$typeSelect = $_POST['typeSelect'];
$uname = $_POST['uname'];
$password = $_POST['password'];



if ($typeSelect=='admin') {

	$sql = "SELECT * FROM admin WHERE userName='$uname'";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();

	$hash_password = $row['password'];
	$hash = password_verify($password, $hash_password);

	if ($hash == 0) {
		header("Location: ../formPage/login.php?error=notmatch");
		exit();
	} else{

		$sql = "SELECT * FROM admin WHERE userName = '$uname' AND password = '$hash_password'";
	$result = $conn->query($sql);

	if (!$row = $result->fetch_assoc()) {
		header("Location: ../formPage/login.php?error=notmatch");
		exit();
	}

	
	else{
		$_SESSION['uname'] = $row['userName'];
		header("Location: ../pages/admin.php");
	}
}


	
}


else if ($typeSelect=='districtInspector') {
	

$sql = "SELECT * FROM districtInspectors where id = '$uname'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$hash_password = $row['password'];
$hash = password_verify($password, $hash_password);

if ($hash == 0) {
		header("Location: ../formPage/login.php?error=notmatch");
		exit();
	} else{

		$sql = "SELECT * FROM districtInspectors WHERE id = '$uname' AND password = '$hash_password'";
	$result = $conn->query($sql);

	if (!$row = $result->fetch_assoc()) {
		header("Location: ../formPage/login.php?error=notmatch");
		exit();
	}

	
	else{
		$_SESSION['district'] = $row['electrolDistrictId'];
		header("Location: ../pages/districtInspector.php");
	}
}
}

else if ($typeSelect=='stationInspector') {
	

$sql = "SELECT * FROM stationInspectors where id = '$uname'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$hash_password = $row['password'];
$hash = password_verify($password, $hash_password);

if ($hash == 0) {
		header("Location: ../formPage/login.php?error=notmatch");
		exit();
	} else{

		$sql = "SELECT * FROM stationInspectors WHERE id = '$uname' AND password = '$hash_password'";
	$result = $conn->query($sql);

	if (!$row = $result->fetch_assoc()) {
		header("Location: ../formPage/login.php?error=notmatch");
		exit();
	}

	
	else{
		$_SESSION['station'] = $row['pollingDistrictId'];
		header("Location: ../pages/stationInspector.php");
	}
}
}





 