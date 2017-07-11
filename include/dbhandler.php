<?php


$conn = mysqli_connect("localhost","root", "", "onlineVoting");

if (!$conn) {
	die("Connection failed:".mysqli_connect_error());
}