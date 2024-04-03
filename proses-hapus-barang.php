<?php 
include 'koneksi.php';
session_start();

//tangkap data dari lihat-buku
$ambil_id_barang	= $_GET['id'];

//menghapus data pada tabel buku
$query = mysqli_query($koneksi, "DELETE FROM barang
								 WHERE id_barang 	= '$ambil_id_barang'");


header("location:lihat-barang.php");	

?>								 