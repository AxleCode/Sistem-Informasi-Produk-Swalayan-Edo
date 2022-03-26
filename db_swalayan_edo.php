<?php
$servername = "localhost";
$database = "id18675903_db_swalayan_edo";
$username = "id18675903_swalayan_edo";
$password = "Darkstreght_1";

// untuk tulisan bercetak tebal silakan sesuaikan dengan detail database Anda
// membuat koneksi
$conn = mysqli_connect($servername, $username, $password, $database);
// mengecek koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
