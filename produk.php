<?php 
	include 'db_swalayan_edo.php';
	error_reporting(0);
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Produk | Swalayan Edo</title>
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
				<input type="text" name="search" placeholder="Temukan Kebutuhan Anda Disini" value="<?php echo $_GET['search'] ?> ">
				<input type="hidden" name="kat" value="<?php echo $_GET['kat'] ?>">
				<input type="submit" name="cari" value="Cari Produk">
			</form>
		</div>
	</div>

			
	

	<!-- Produk Baru -->
	<div class="section">
		<div class="container">
			<h3 class="h2profil">Produk</h3>
			<div class="boxdetailp">
				<?php 
				if ($_GET['search'] != '' || $_GET['kat'] != '') {
						$where = "AND product_nama LIKE '%".$_GET['search']."%' AND kategori_id LIKE '%".$_GET['kat']."%' ";
					}

					$produk = mysqli_query($conn, "SELECT * FROM tabel_product WHERE product_status = 1 $where ORDER BY product_id DESC");
					if (mysqli_num_rows($produk) > 0) {
						while($p = mysqli_fetch_array($produk)){
				 ?>
				 <a href="detailproduk.php?id=<?php echo $p['product_id'] ?>">
					<div class="col-4">
						<img src="produk/<?php echo $p['product_image'] ?>">
						<p class="nama"><?php echo substr($p['product_nama'], 0,27) ?></p>
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