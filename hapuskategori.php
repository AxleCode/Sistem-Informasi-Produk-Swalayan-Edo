<?php 
	include 'db_swalayan_edo.php';

	if(isset($_GET['idk'])){
		$delete =mysqli_query($conn, "DELETE FROM tabel_kategori WHERE kategori_id ='".$_GET['idk']."' ");
		echo '<script>window.location="datakategori.php"</script>';
	}

 ?>