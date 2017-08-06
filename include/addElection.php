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

		$sql = "CREATE TABLE tempParties(
		partyId varchar(20) NOT NULL,
		AMP int(10),
		ANU int(10),
		BAD int(10),
		BAT int(10),
		COL int(10),
		GAL int(10),
		GAM int(10),
		HAM int(10),
		JAF int(10),
		KAL int(10),
		KAN int(10),
		KEG int(10),
		KUR int(10),
		MTL int(10),
		MTR int(10),
		MON int(10),
		NUW int(10),
		POL int(10),
		PUT int(10),
		RAT int(10),
		TRI int(10),
		VAN int(10)
		)";
		$result = $conn->query($sql);

		$sql = "INSERT INTO tempParties(partyId)
		SELECT partyId FROM party";
		$result = $conn->query($sql);

		$sql = "INSERT INTO tempVoters(nic)
		SELECT nic FROM voters";
		$result = $conn->query($sql);

		/* while($row = $result->fetch_assoc()){
		 	$sql = "INSERT INTO tempParties ANU,AMP
		VALUES (0,0)";
		$result = $conn->query($sql);
		 }*/

		header("Location: ../formPage/addElection.php?submitted");
	
}






