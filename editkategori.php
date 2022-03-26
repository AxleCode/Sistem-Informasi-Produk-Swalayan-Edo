<?php 
//agar jika admin langsung membuka link web dashboard, maka akan diarahkan ke halaman login dulu
	session_start();
	include 'db_swalayan_edo.php';
	if ($_SESSION['status_login'] != true) {
		echo '<script>window.location="login.php"</script>';
	}

	$kategori = mysqli_query($conn, "SELECT * FROM tabel_kategori WHERE kategori_id = '".$_GET['id']."'");
	if(mysqli_num_rows($kategori) == 0){
		echo '<script>window.location="datakategori.php"</script>';
	}
	$k = mysqli_fetch_object($kategori);
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Edit Kategori | Swalayan Edo</title>
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
				<h3>Edit Data Kategori</h3 >
				<form action="" method="POST" enctype="multipart/form-data">
					<input type="text" name="nama" placeholder="Nama Kategori" class="inputprofil" value="<?php echo $k-> kategori_nama ?>"required>
					<img src="kategori/<?php echo $k->kategori_gambar ?>" width="200px">
					<input type="hidden" name="foto" value="<?php echo $k->kategori_gambar ?>">
					<input type="file" name="gambar" class="input-control" >
					<input type="submit" name="submit" value="Edit Kategori" class="submitprofil">
				</form>
				<?php 
					if (isset($_POST['submit'])){
						$nama = ucwords($_POST['nama']);
						$foto = $_POST['foto'];

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
								unlink('./kategori/'.$foto);
								echo 'Berhasil Diupload';
								move_uploaded_file($tmp_name, './kategori/'.$ubahnama);
								$namagambar = $ubahnama;
							}

						}else{
							//jika admin tidak ganti gambar
							$namagambar = $foto;

						}

						$update = mysqli_query($conn, "UPDATE tabel_kategori SET
												kategori_nama = '".$nama."',
												kategori_gambar = '".$namagambar."'
												WHERE kategori_id = '".$k->kategori_id."' 
												");

						if ($update) {
							echo '<script>alert("Edit Data Kategori Berhasil!")"</script>';
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
