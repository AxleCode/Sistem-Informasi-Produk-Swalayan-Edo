<?php 
//agar jika admin langsung membuka link web dashboard, maka akan diarahkan ke halaman login dulu
	session_start();
	include 'db_swalayan_edo.php';
	if ($_SESSION['status_login'] != true) {
		echo '<script>window.location="login.php"</script>';
	}

 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Tambah Kategori | Swalayan Edo</title>
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
			<li><a href="datakategori.php">Data Kategori</a></li>
			<li><a href="dataproduk.php">Data Produk</a></li>
			<li><a href="logout.php">keluar</a></li>
		</ul>
	</div>
	</header>

	<!-- Bagian Content -->
	<div class="section">
		<div class="containerprofil">
			<div class="boxupdateprofil">
				<h3>Tambah Data Kategori</h3 >
				<form action="" method="POST">
					<input type="text" name="nama" placeholder="Nama Kategori" class="inputprofil" required>
					<input type="submit" name="submit" value="Tambah Kategori" class="submitprofil">
				</form>
				<?php 
					if (isset($_POST['submit'])){
						$nama = ucwords($_POST['nama']);

						$insert = mysqli_query($conn, "INSERT INTO tabel_kategori VALUES ( null,
							'".$nama."')");

						if ($insert) {
							echo '<script>alert("Update Data Kategori Berhasil!")"</script>';
							echo '<script>window.location="datakategori.php"</script>';
						}else{
							echo 'gagal'.mysql_error($conn);
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