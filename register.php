<!DOCTYPE html>
<html>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<head>
	<title>Praktikum Pemrogrmana WEB</title>
	<?php
	require 'koneksi.php';
	if (isset($_POST['submit'])) {
		$username = $_POST['username'];
		$password = password_hash($_POST['password'], PASSWORD_BCRYPT);
		$privileges = $_POST['privileges'];
		$query = mysql_query("INSERT into login VALUES('','$username','$password','$privileges')");
		if($query){
			header('location: ./login.php');
		} else{
			echo "Gagal register";
		}
		}
		?>
	</head>
<body>
<form method="POST">
<div class="container">
	<div><h3>REGISTER</h3></div>
<table>
	<div class="form-group">
		Username<input type="text" name="username">
	</div>
	<div>
		Password<input type="password" name="password">
	</div>
	<div>
		Hak akses
	</div>
	<div>
		<select name="privileges">
	<option disabled selected>--pilih hak akses--</option>
	<option value="1">Admin</option>
	<option value="0">User biasa</option>
		</select>
	</div>
	<div>
		<input type="submit" name="submit" value="Register">
	</div>
</div>
</table>
</form>
</body>
</html>