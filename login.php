<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login | Swalayan Edo</title>
	<link rel="stylesheet" type="text/css" href="css/style.css"> 
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@900&family=Quicksand&family=Roboto:wght@400;700&display=swap" rel="stylesheet">
</head> 
<body id="bg-login" style="background-image: url(gambar/login.jpg) ; background-size: cover;">
	<div class="box-login">
		<h1>Swalayan Edo</h1>
		<form action="" method="POST">
			<input type="text" name="user" placeholder="Username" class="input-control">
			<input type="password" name="pass" placeholder="Password" class="input-control">
			<input type="submit" name="submit" value="Login" class="tombollogin">
		</form>
		<?php 
			if (isset($_POST['submit'])) {
				include 'db_swalayan_edo.php';
				$user = $_POST['user'];
				$pass = $_POST['pass'];

				$cek = mysqli_query($conn, "SELECT + FROM tabel_admin WHERE username = '".$user."' AND password = '".md5($pass)."'");
			}
		 ?>
	</div>	
</body>
</html>