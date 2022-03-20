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
	<title>Tambah Produk | Swalayan Edo</title>
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
				<h3>Tambah Data Produk</h3 >
				<form action="" method="POST" enctype="multipart/form-data">
					<select class="input-control" name="kategori" required>
						<option value ="">-- Pilih --</option>
						<?php 
							$kategori = mysqli_query($conn, "SELECT * FROM tabel_kategori ORDER BY kategori_id ASC");
							while ($r = mysqli_fetch_array($kategori)) {
							
							?>	
							<option value="<?php echo $r['kategori_id'] ?>"> <?php echo $r['kategori_nama'] ?></option>
							
							<?php } ?>
						 
					</select>
					<input type="text" name="nama" class="input-control" placeholder="Nama Produk" required>
					<input type="text" name="harga" class="input-control" placeholder="Harga" required>
					<input type="file" name="gambar" class="input-control" required>
					<textarea class="input-control" name="deskripsi" placeholder="Deskripsi Produk"></textarea><br>
					<select class="input-control" name="status">
						<option value="">-- Pilih --</option>
						<option value="1">Aktif</option>
						<option value="0">Tidak Aktif</option>
					</select>
					<input type="submit" name="submit" value="Tambah Kategori" class="submitprofil">
				</form>
				<?php 
					if (isset($_POST['submit'])){
						//print_r($_FILES['gambar']);
						//Menampung Inputan form
						$kategori	= $_POST['kategori'];
						$nama		= $_POST['nama'];
						$harga		= $_POST['harga'];
						$deskripsi	= $_POST['deskripsi'];
						$status		= $_POST['status'];

						//Menampung data file yang diupload
						$filename	= $_FILES['gambar']['name'];
						$tmp_name	= $_FILES['gambar']['tmp_name'];

						$type1 		= explode('.', $filename);
						$type2 		= $type1[1]; 

						$ubahnama = 'produk'.time().'.'.$type2;

						//Menampung tipe format data yang diizinkan untuk diupload sebagai gambar
						$tipe_diizinkan = array('jpg','jpeg','png','gif');

						//Validasi format file
						if (!in_array($type2, $tipe_diizinkan)) {
							echo '<script>alert("Format File yang diizinkan hanya JPG, PNG, JPEG, GIF")</script>';
						}else{
							//jika format file sesuai
							//proses upload file sekaligus insert ke database
							echo 'Berhasil Diupload';
							move_uploaded_file($tmp_name, './produk/'.$ubahnama);

							$insert = mysqli_query($conn, "INSERT INTO tabel_product VALUES(
										null,
										'".$kategori."',
										'".$nama."',
										'".$harga."',
										'".$deskripsi."',
										'".$ubahnama."',
										'".$status."',
										null

						)");
							if ($insert) {
								echo '<script>alert("Tambah Data Berhasil")</script>';
								echo '<script>window.location="dataproduk.php"</script>';
							}else{
								echo'Gagal'.mysqli_error($conn);
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
	<script>
            CKEDITOR.replace( 'deskripsi' );
      </script>
</body>=
</html>