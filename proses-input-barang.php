<?php 
include 'koneksi.php';
session_start();

if(isset($_POST['tambah'])) {
    // Generate kode barang secara dinamis
    $query = mysqli_query($koneksi, "SELECT COUNT(*) as total FROM barang");
    $data = mysqli_fetch_assoc($query);
    $sequence_number = $data['total'] + 1;
    $kode_barang = "KB-" . sprintf("%04d", $sequence_number);

    // Tangkap data dari form
    $ambil_nama = $_POST['nama_barang'];
    $ambil_qty = $_POST['qty_barang'];
    
    // Hapus karakter tambahan (misalnya, 'Rp' dan '.') pada harga beli dan harga jual menggunakan fungsi str_replace()
    $ambil_harga = str_replace(['Rp', '.'], '', $_POST['harga_barang']);
    $ambil_harga_beli = str_replace(['Rp', '.'], '', $_POST['harga_beli']);
    
    $ambil_deskripsi = $_POST['deskripsi_barang'];

    // Simpan data ke database
    $query = mysqli_query($koneksi,"INSERT INTO barang 
                    (kode_barang, nama_barang, qty_barang, harga_barang, harga_beli, deskripsi_barang)            
                    VALUES
                    ('$kode_barang', '$ambil_nama','$ambil_qty','$ambil_harga','$ambil_harga_beli','$ambil_deskripsi')");

    header("location: lihat-barang.php");
}
?>
