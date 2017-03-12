<!DOCTYPE html>
<html>
<head>
	<title>Praktikum Pemrograman WEB</title>
</head>
<body>
<?php
require 'koneksi.php';
session_start();
if ($_SESSION['username']) {
	echo "Home user, selamat datang : ".$_SESSION['username'];?>
	<br>
	<a href="logout.php">Logout</a>
	<?php
}else{
	header('location: ./login.php');
}
?>
</body>
</html>