<?php 
//agar jika admin langsung membuka link web dashboard, maka akan diarahkan ke halaman login dulu
	session_start();
	include 'db_swalayan_edo.php';
	if ($_SESSION['status_login'] != true) {
		echo '<script>window.location="login.php"</script>';
	}


	$produk = mysqli_query($conn, "SELECT * FROM tabel_product WHERE product_id = '".$_GET['id']."'");
	$p = mysqli_fetch_object($produk);

 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Edit Produk | Swalayan Edo</title>
	<link rel="stylesheet" type="text/css" href="css/style.css"> 
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
	<script src="https://cdn.ckeditor.com/4.18.0/standard/ckeditor.js"></script>

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
			<div class="boxtambahproduk">
				<h3>Edit Data Produk</h3 >
				<form action="" method="POST" enctype="multipart/form-data">
					<select class="input-control" name="kategori" required>
						<option value ="">-- Pilih --</option>
						<?php 
							$kategori = mysqli_query($conn, "SELECT * FROM tabel_kategori ORDER BY kategori_id ASC");
							while ($r = mysqli_fetch_array($kategori)) {
							
							?>	
							<option value="<?php echo $r['kategori_id'] ?>"<?php echo ($r['kategori_id'] == $p->kategori_id)? 'selected':''; ?>> <?php echo $r['kategori_nama'] ?></option>
							
							<?php } ?>
						 
					</select>
					<input type="text" name="nama" class="input-control" placeholder="Nama Produk" value="<?php echo $p-> product_nama ?>" required>
					<input type="text" name="harga" class="input-control" placeholder="Harga" value="<?php echo $p-> product_price ?>" required>
					<img src="produk/<?php echo $p->product_image  ?>"width="200px">
					<input type="hidden" name="foto" value="<?php echo $p->product_image ?>">
					<input type="file" name="gambar" class="input-control" >
					<textarea class="input-control" name="deskripsi" placeholder="Deskripsi Produk"><?php echo $p-> product_deskripsi ?></textarea><br>
					<select class="input-control" name="status">
						<option value="">-- Pilih --</option>
						<option value="1"<?php echo ($p->product_status == 1)? 'selected':''; ?>>Aktif</option>
						<option value="0"<?php echo ($p->product_status == 0)? 'selected':''; ?>>Tidak Aktif</option>
					</select>
					<input type="submit" name="submit" value="Tambah Kategori" class="submitprofil">
				</form>
				<?php 
					if (isset($_POST['submit'])){

						//Data inputan dari form
						$kategori	= $_POST['kategori'];
						$nama		= $_POST['nama'];
						$harga		= $_POST['harga'];
						$deskripsi	= $_POST['deskripsi'];
						$status		= $_POST['status'];
						$foto		= $_POST['foto'];

						//Data gambar yang baru
							$filename	= $_FILES['gambar']['name'];
							$tmp_name	= $_FILES['gambar']['tmp_name'];
						

						//jika admin ganti gambar 
						if ($filename != '') {
	
							$type1 		= explode('.', $filename);
							$type2 		= $type1[1]; 

							$ubahnama = 'produk'.time().'.'.$type2;
							$tipe_diizinkan = array('jpg','jpeg','png','gif');

							//Validasi format file
							if (!in_array($type2, $tipe_diizinkan)) {
								//Jika format file tidak ada di dalam tipe diizinkan
								echo '<script>alert("Format File yang diizinkan hanya JPG, PNG, JPEG, GIF")</script>';
							
							}else{
								unlink('./produk/'.$foto);
								echo 'Berhasil Diupload';
								move_uploaded_file($tmp_name, './produk/'.$ubahnama);
								$namagambar = $ubahnama;
							}

						}else{
							//jika admin tidak ganti gambar
							$namagambar = $foto;

						}

						//Querry update data produk
						$update = mysqli_query($conn, "UPDATE tabel_product SET
												kategori_id = '".$kategori."',
												product_nama = '".$nama."',
												product_price = '".$harga."',
												product_deskripsi = '".$deskripsi."',
												product_image = '".$namagambar."',
												product_status = '".$status."'
												WHERE product_id = '".$p-> product_id."'
											");
						if ($update) {
								echo '<script>alert("Ubah Data Berhasil")</script>';
								echo '<script>window.location="dataproduk.php"</script>';
							}else{
								echo'Gagal'.mysqli_error($conn);
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
	<script>
            CKEDITOR.replace( 'deskripsi' );
      </script>
</body>=
</html>