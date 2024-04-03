<?php 
include 'koneksi.php';
session_start();


//tangkap data dari lihat-buku
$ambil_id_admin	= $_GET['id'];

//menghapus data pada tabel buku
$query = mysqli_query($koneksi, "DELETE FROM admin
								 WHERE id_admin	= '$ambil_id_admin'");


header("location:lihat-staff.php");	

?>								 