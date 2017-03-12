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
	echo"Home Admin, Selamat datang :".$_SESSION['username'];
	?>
	} 
	<?php 
}else{
	header('location: ./login.php');
}
?>
<br>
	<a href="logout.php">logout</a>
</body>
</html> 