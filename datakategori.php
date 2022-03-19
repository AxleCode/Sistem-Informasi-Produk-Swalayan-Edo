<?php 
//agar jika admin langsung membuka web dashboard, maka akan diarahkan ke halaman login dulu
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
	<title>Kategori | Swalayan Edo</title>
	<link rel="stylesheet" type="text/css" href="css/style.css"> 
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
</head> 
<body style="background-image: url(gambar/profil.jpg) ; background-size: cover;">
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
		<div class="container">
			<div class="boxdatakategori">
				<h3 >Kategori</h3>
				<p><a href="tambahkategori.php"><input type="submit" name="updatepass" value="Tambah Data" class="btntambahkategori"></a></p>
				
				<table border="1" cellspacing="0" class="tabelkategori">
					<thead>
						<tr>
							<th width="50px">ID</th>
							<th>Kategori</th>
							<th width="400px">Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						$no = 1;
							$kategori = mysqli_query($conn, "SELECT * FROM tabel_kategori ORDER BY kategori_id ASC");
								while($row = mysqli_fetch_array($kategori)){
						 ?>
						<tr>
							<td><?php echo $row['kategori_id'] ?></td>
							<td><?php echo $row['kategori_nama'] ?></td>
							<td>
								<a href="editkategori.php?id=<?php echo $row['kategori_id'] ?>"><input type="submit" name="updatepass" value="Edit" class="btneditkategori"></a> <a href="hapuskategori.php?idk=<?php echo $row['kategori_id'] ?>" onclick="return confirm('Yakin Ingin Hapus ?')"><input type="submit" name="updatepass" value="Hapus" class="btneditkategori"></a>
							</td>
						</tr>
						<?php 
					} 
						?>
					</tbody>
				</table>
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