<?php
session_start();


include 'dbhandler.php';

$type = $_POST['type'];
$date = $_POST['date'];
$startTime = $_POST['startTime'];
$endTime = $_POST['endTime'];


//error handling for empty fields
if ($type == '-- Enter Election Type --') {
	header("Location: ../formPage/addElection.php?error=empty");
	exit();
}

if (empty($date)) {
	header("Location: ../formPage/addElection.php?error=empty");
	exit();
}

if (empty($startTime)) {
	header("Location: ../formPage/addElection.php?error=empty");
	exit();
}

if (empty($endTime)) {
	header("Location: ../formPage/addElection.php?error=empty");
	exit();
}



else{
	

		$sql = "INSERT INTO election (type, eday, startTime, endTime) 
		VALUES ('$type','$date','$startTime','$endTime')";
		$result = $conn->query($sql);

		$sql = "CREATE TABLE tempVoters(
		nic varchar(10) NOT NULL,
		approveStatus int(1),
		votedStatus int(1)
		)";
		$result = $conn->query($sql);

		$sql = "INSERT INTO tempVoters(nic)
		SELECT nic FROM voters";
		$result = $conn->query($sql);

		header("Location: ../formPage/addElection.php?submitted");
	
}






