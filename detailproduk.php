<?php 
	include 'db_swalayan_edo.php';
	error_reporting(0);

	$produk = mysqli_query($conn, "SELECT * FROM tabel_product WHERE product_id = '".$_GET['id']."' ");
	$p = mysqli_fetch_object($produk);
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

			
	<!-- Detail Produk -->
	<div class="section">
		<div class="container">
			<h2> Detail Produk </h2>
			<div class="boxdetailp">
				<div class="col-2">
					<img src="produk/<?php echo $p->product_image ?>" width ="100%" >
				</div>
				<div class="col-2">
					<h2><?php echo $p->product_nama ?></h2>
					<h3>Rp. <?php echo number_format($p->product_price) ?></h3>
					<p>Deskripsi :<br>
						<?php echo $p->product_deskripsi ?>
					</p>
					<p>Selama produk ini masih ada di website kami. maka, produk ini masih tersedia ditoko kami, Hubungi Via Whatsapp Untuk Menanyakan Stok Atau Lainnya.... </p>
					<p><a href="https://api.whatsapp.com/send?phone=<?php echo '+628228449100' ?>&text=Hai, saya Tertarik dengan produk anda." target="_blank">
						<img src="gambar/whatsapp.png" width="200px">
					</a></p>
				</div>
			</div>
			
		</div>
	</div> 

	<!-- Produk SERUPA -->
	<!-- <div class="section">
		<div class="container">
			<h3 class="h2profil">Produk Serupa</h3>
			<div class="boxdetailp">
				<?php 
				if ($_GET['search'] != '' || $_GET['kat'] != '') {
						$where = "AND product_nama LIKE '%".$_GET['search']."%' AND kategori_id LIKE '%".$_GET['kat']."%' ";
					}

					$produk = mysqli_query($conn, "SELECT * FROM tabel_product WHERE product_status = 1 ORDER BY product_id DESC LIMIT 4");
					if (mysqli_num_rows($produk) > 0) {
						while($p = mysqli_fetch_array($produk)){
				 ?>
				 <a href="detailproduk.php?id=<?php echo $p['product_id'] ?>">
					<div class="col-4">
						<img src="produk/<?php echo $p['product_image'] ?>">
						<p class="nama"><?php echo $p['product_nama'] ?></p>
						<p class="harga">Rp. <?php echo number_format($p['product_price']) ?></p>
					</div>
					</a>
				<?php }}else { ?>
					<p>Produk Tidak Ada</p>
				<?php } ?>
			</div>
			
		</div>
		
	</div> -->

	<!-- Produk Lainnya -->
	<div class="section">
		<div class="container">
			<h3 class="h2profil">Produk Lainnya</h3>
			<div class="boxdetailp">
				<?php 

					$produk = mysqli_query($conn, "SELECT * FROM tabel_product WHERE product_status = 1 ORDER BY product_id DESC LIMIT 4");
					if (mysqli_num_rows($produk) > 0) {
						while($p = mysqli_fetch_array($produk)){
				 ?>
				 <a href="detailproduk.php?id=<?php echo $p['product_id'] ?>">
					<div class="col-4">
						<img src="produk/<?php echo $p['product_image'] ?>">
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