<?php 
//agar jika admin langsung membuka link web dashboard, maka akan diarahkan ke halaman login dulu
	session_start();
	if ($_SESSION['status_login'] != true) {
		echo '<script>window.location="login.php"</script>';
	}

	//memasukkan update profil tadi ke dalam db diambil berdasarkan siapa yang login/session 
	include 'db_swalayan_edo.php';
	$query = mysqli_query($conn, "SELECT * FROM tabel_admin WHERE admin_id = '".$_SESSION['id']."'");
	$d = mysqli_fetch_object($query);
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Profil | Swalayan Edo</title>
	<link rel="stylesheet" type="text/css" href="css/style.css"> 
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
</head> 
<body id="bg-profil"style="background-image: url(gambar/profil.jpg) ; background-size: cover;">
	<!-- Bagian Header -->
	<header>
		<div class="container">
		<h1><a href="dashboard.php">Swalayan Edo</a></h1>
		<ul>
			<li><a href="dashboard.php">Dashboard</a></li>
			<li><a href="profil.php">Profil</a></li>
			<li><a href="data-kategori.php">Data Kategori</a></li>
			<li><a href="data-produk.php">Data Produk</a></li>
			<li><a href="logout.php">keluar</a></li>
		</ul>
	</div>
	</header>

	<!-- Bagian Content -->
	<div class="section">
		<div class="containerprofil">
			
			<div class="boxprofil">
				<h3>Update Profil</h3 >
				<form action="" method="POST">
					<input type="text" name="user" placeholder="Username" class="inputprofil" value="<?php echo $d->username ?>"required>
					<input type="text" name="nama" placeholder="Nama Panggilan" class="inputprofil" value="<?php echo $d->admin_nama ?>"required>
					<input type="number" name="nohp" placeholder="Nomor Hp" class="inputprofil" value="<?php echo $d->admin_telp ?>"required>
					<input type="text" name="email" placeholder="email" class="inputprofil" value="<?php echo $d->admin_mail ?>"required>
					<input type="text" name="alamat" placeholder="alamat" class="inputprofil" value="<?php echo $d->admin_alamat ?>"required>
					<input type="submit" name="submit" value="Update Profil" class="submitprofil">
				</form>
				<?php 
					if(isset($_POST['submit'])){

						$user	= $_POST['user'];
						$nama	= $_POST['nama'];
						$nohp	= $_POST['nohp'];
						$email	= $_POST['email'];
						$alamat	= $_POST['alamat'];

						$update = mysqli_query($conn, "UPDATE tabel_admin SET
												username = '".$user."',
												admin_nama = '".$nama."',
												admin_telp = '".$nohp."',
												admin_mail = '".$email."',
												admin_alamat = '".$alamat."'
												WHERE admin_id = '".$d->admin_id."'
												");
						if ($update) {
							header("refresh: 0");
							echo '<script>alert("Update Profil Berhasil!")</script>';
						}else{
							echo 'gagal'.mysqli_error($conn);
						}
						
					}
				 ?>
			</div>
			
			<div class="boxprofil">
				<h3>Ganti Password</h3 >
				<form action="" method="POST">
					<input type="text" name="pass1" placeholder="Password Baru" class="inputprofil" required>
					<input type="password" name="pass2" placeholder="Konfirmasi Password Baru" class="inputprofil" required>
				
					<input type="submit" name="updatepass" value="Ganti Password" class="submitprofil">
				</form>
				<?php 
					if(isset($_POST['updatepass'])){

						$pass1	= $_POST['pass1'];
						$pass2	= $_POST['pass2'];

						if ($pass2 != $pass1) {
							echo '<script>alert("GAGAL Password Tidak Sama")</script>';
						}else{
							$updatepass = mysqli_query($conn, "UPDATE tabel_admin SET
												password = '".md5($pass1)."'
												WHERE admin_id = '".$d->admin_id."' ");
							if ($updatepass) {
								header("refresh: 0");
								echo '<script>alert("Update Profil Berhasil!")</script>';
							}else{
								echo 'gagal'.mysqli_error($conn);
							}
						}
						
						
					}
				 ?>
			</div>

		</div>
	</div>

	<!-- Bagian Footer -->
	<footer>
		<div class="containerprofil">
			<small>By DARK STREGHT TEAM</small>
		</div>
	</footer>
</body>
</html>