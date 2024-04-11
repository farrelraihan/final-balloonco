<?php 
include 'koneksi.php';
session_start();

if(isset($_POST['ubah']))
{
//tangkap data dari form edit buku

$ambilid 		= $_POST['id_barang'];
$ambilkode 		= $_POST['kode_barang'];
$ambilnama	= $_POST['nama_barang'];
$ambilqty = $_POST['qty_barang'];
$ambilharga	= $_POST['harga_barang'];
$ambilharga_beli	= $_POST['harga_beli'];
$ambildeskripsi	= $_POST['deskripsi_barang'];


//mengupdate data pada tabel buku
$query = mysqli_query($koneksi, "UPDATE barang
								 SET 
                                    kode_barang     = '$ambilkode',
									nama_barang 		= '$ambilnama',
									qty_barang 		= '$ambilqty',
									harga_barang 	= '$ambilharga',
									harga_beli 		= '$ambilharga_beli',
									deskripsi_barang 	= '$ambildeskripsi'
								WHERE 
									id_barang 		= '$ambilid'");

header("location:lihat-barang.php");							
}
?>								 