<?php 
	include 'db_swalayan_edo.php';
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Dashboard | Swalayan Edo</title>
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

	<!-- search -->
	<div class="search">
		<div class="container">
			<form action="produk.php">
				<input type="text" name="search" placeholder="Temukan Kebutuhan Anda Disini">
				<input type="submit" name="cari" value="Cari Produk">
			</form>
		</div>
	</div>

	<div>
		<img src="gambar/dashboard1.jpg" width="100%" >
	</div>

			
	<!-- Kategori -->
	<div class="sectionp">
		<div class="containerp">
			
			<div class="boxberanda">
				<h2 class="h2kategori" >Kategori</h2 >
				<?php 
					$Kategori = mysqli_query($conn, "SELECT * FROM tabel_kategori ORDER BY 	kategori_id ASC");
					if (mysqli_num_rows($Kategori) > 0) {
						while($k = mysqli_fetch_array($Kategori)){
					
				 ?>
				<a href="produk.php?kat=<?php echo $k['kategori_id'] ?>">
					<div class="col-5">
						<img src="Kategori/<?php echo $k['kategori_gambar'] ?>" width="65px" style="margin-bottom: 5px" >
						<p><?php echo $k['kategori_nama'] ?></p>
					</div>
				</a>
			<?php }}else{ ?>
				<p>Kategori tidak ada</p>
			<?php } ?>
			</div>
		</div>
	</div>

	<!-- Produk Baru -->
	<div class="section">
		<div class="container">
			<h3 class="h2beranda">Produk Terbaru</h3>
			<div class="boxberanda">
				<?php 

					$produk = mysqli_query($conn, "SELECT * FROM tabel_product WHERE product_status = 1 ORDER BY product_id DESC LIMIT 8");
					if (mysqli_num_rows($produk) > 0) {
						while($p = mysqli_fetch_array($produk)){
				 ?>
				 <a href="detailproduk.php?id=<?php echo $p['product_id'] ?> kat=<?php echo $p['kategori_id'] ?>">
					<div class="col-4">
						<img src="produk/<?php echo $p['product_image'] ?>"  >
						<p class="nama"><?php echo $p['product_nama'] ?></p>
						<p class="harga">Rp. <?php echo number_format($p['product_price']) ?></p>
					</div>
					</a>
				<?php }}else { ?>
					<p>Produk Tidak Ada</p>
				<?php } ?>
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
