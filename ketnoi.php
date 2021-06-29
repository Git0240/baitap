<?php 
	$host = "localhost";
	$user = "root";
	$pass = "";
	$data = "baitap";
	$con = mysqli_connect($host, $user, $pass) or die ("khong ket noi duoc csdl");
	mysqli_set_charset($con,'utf8');
	mysqli_select_db($con,$data) or die ("khong ket noi duoc data");
?>