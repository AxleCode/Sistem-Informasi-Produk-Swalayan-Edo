<?php 
	include 'db_swalayan_edo.php';
	$kontak = mysqli_query($conn, "SELECT admin_nama, admin_mail, admin_telp FROM tabel_admin WHERE admin_id = 3");
	$a = mysqli_fetch_object($kontak);
	$kontak = mysqli_query($conn, "SELECT admin_nama, admin_mail, admin_telp FROM tabel_admin WHERE admin_id = 5");
	$b = mysqli_fetch_object($kontak);
	$kontak = mysqli_query($conn, "SELECT admin_nama, admin_mail, admin_telp FROM tabel_admin WHERE admin_id = 6");
	$c = mysqli_fetch_object($kontak);
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Kontak | Swalayan Edo</title>
	<link rel="stylesheet" type="text/css" href="css/style.css"> 
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
</head> 
<body  >
	<!-- Bagian Header -->
	<header class="headerproduk">
		<div class="container">
		<h1 class="h1produk"><a href="index.php">Swalayan Edo</a></h1>
		<ul>
			<li><a class="produk" href="index.php">Home</a></li >
			<li><a class="produk" href="produk.php">Produk</a></li >
			<li><a class="produk" href="kontak.php">Hubungi Kami</a></li >

		</ul>
	</div>
	</header>

			
	<!-- Hubungi Admin Kami -->
	<div class="section">
		<div class="container">
			<h3 class="h2profil">Hubungi Admin Kami</h3>
			<div class="boxkontak">
				<h4 >Admin 1 </h4 >
					<p><?php echo $a->admin_nama ?></p>
					<p><?php echo $a->admin_mail ?></p>
					<p><?php echo $a->admin_telp ?></p>
				 
				 <h4 >Admin 2 </h4 >
					<p><?php echo $b->admin_nama ?></p>
					<p><?php echo $b->admin_mail ?></p>
					<p><?php echo $b->admin_telp ?></p>
				 
				 <h4 >Admin 3 </h4 >
					<p><?php echo $c->admin_nama ?></p>
					<p><?php echo $c->admin_mail ?></p>
					<p><?php echo $c->admin_telp ?></p>


				<h4 >Lokasi Kami </h4 >
				<p><?php echo "Pasar Karang Pilang, Jl. Raya Mastrip, Karang Pilang, Kec. Karangpilang, Kota SBY, Jawa Timur 60221" ?></p>
				<img class="imgalamat" src="gambar/alamat.jpg" >
				 
			</div>
			
		</div>
		
	</div>

	<!-- Bagian Footer -->
	<footer>
		<div class="container">
			<small>By DARK STREGHT TEAM</small>
		</div>
	</footer>

</body>
</html>