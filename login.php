<!DOCTYPE html>
<html>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<head>
	<title>Praktikum Pemrograman WEB</title>
	<?php
	require 'koneksi.php';
	session_start();
	if ($_SERVER['REQUEST_METHOD']=='POST') {
		$username = $_POST['username'];
		$password = $_POST['password'];
		$query = mysql_query("SELECT * FROM login WHERE username='$username'");
		$hasil = mysql_num_rows($query);
		$result	= mysql_fetch_array($query);
		if (password_verify($password, $result['password'])) {
			$_SESSION['username']=$username;
			if ($result['level']==1) {
				header('Location:home_admin.php');
			}else{
				header('Location:home_user.php');
			}
			exit();
			?>
			Anda berhasil login, silahkan <a href="home_admin.php">halaman home</a>
			<?php
		}else{
			?>
			<p class='alert alert-danger'>Anda GAGAL, silahkan coba lagi gih</p><?php
			echo mysql_error();
		}
	}
	?>
</head>
<body>
<form method="POST"><br>
<div class="container">
<div class="col-md-4 col-md-offset-4">
	<div>
		<h3>Login</h3>
	</div><br>
	<div class="form-group">
		<label >Username</label><br>
		<input type="text" name="username" class="form-control">
	</div><br>
	<div class="form-group">
		<label>Password</label><br>
		<input type="password" name="password" class="form-control">
	</div>
	<div>
		<button type="submit" class="btn btn-info">Login</button> 
	</div>
</div>
</div>
</form>
</body>
</html>