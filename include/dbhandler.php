<?php


$conn = mysqli_connect("localhost","root", "", "votepool");

if (!$conn) {
	die("Connection failed:".mysqli_connect_error());
}