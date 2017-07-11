<?php
	session_start();

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<h1>
	
<?php
	if (isset($_SESSION['uname'])) {
		echo "hi ".$_SESSION['uname'];
	}
?>

</h1>

<form action="../include/logout.php">
	<button type="submit">LOG OUT</button>
</form>

</body>
</html>