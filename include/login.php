<?php
session_start();


include 'dbhandler.php';

$typeSelect = $_POST['typeSelect'];
$uname = $_POST['uname'];
$password = $_POST['password'];

if ($typeSelect=='admin') {
	$sql = "SELECT * FROM admin WHERE name = '$uname' AND password='$password'";
$result = $conn->query($sql);



if (empty($uname)) {
	header("Location: ../formPage/login.php?error=empty");
	exit();
}



if (empty($password)) {
	header("Location: ../formPage/login.php?error=empty");
	exit();
}



 
if (!$row = $result->fetch_assoc()) { 
	header("Location: ../formPage/login.php?error=notmatch");
	exit();
	
}
else{
	$_SESSION['uname']= $row['name'];
	header("Location: ../pages/admin.php");
}

}


else if ($typeSelect=='inspector') {
	

$sql = "SELECT * FROM inspector where name = '$uname'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$hash_password = $row['password'];
$hash = password_verify($password, $hash_password);

if ($hash == 0) {
	
	header("Location: ../formPage/login.php?error=notmatch");
	exit();

} else{

$sql = "SELECT * FROM inspector WHERE name = '$uname' AND password='$hash_password'";
$result = $conn->query($sql);
 
if (!$row = $result->fetch_assoc()) { 
	header("Location: ../formPage/login.php?error=notmatch");
	exit();
	
}
else{
	$_SESSION['uname']= $row['name'];
	header("Location: ../pages/candidate.php");
}

}
}

else if ($typeSelect=='--Select Account type--'){

	header("Location: ../formPage/login.php?error=selectcandi");

}




 