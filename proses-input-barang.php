<?php 
include 'koneksi.php';
session_start();

if(isset($_POST['tambah'])) {
    // Generate kode barang dynamically
    $query = mysqli_query($koneksi, "SELECT COUNT(*) as total FROM barang");
    $data = mysqli_fetch_assoc($query);
    $sequence_number = $data['total'] + 1;
    $kode_barang = "KB-" . sprintf("%04d", $sequence_number);

    // Tangkap data dari form
    $ambil_nama = $_POST['nama_barang'];
    $ambil_qty = $_POST['qty_barang'];
    $ambil_harga = $_POST['harga_barang'];
    $ambil_deskripsi = $_POST['deskripsi_barang'];

    // Simpan data ke database
    $query = mysqli_query($koneksi,"INSERT INTO barang 
                    (kode_barang, nama_barang, qty_barang, harga_barang, deskripsi_barang)            
                    VALUES
                    ('$kode_barang', '$ambil_nama','$ambil_qty','$ambil_harga','$ambil_deskripsi')");

    header("location: lihat-barang.php");
}
?>