<?php
include 'koneksi.php';
session_start();

if(isset($_POST['tambah']))
{
    // Capture data from the form
    $kode_penjualan = $_POST['kode_penjualan'];
    $item_id = $_POST['item'];
    $quantity = $_POST['quantity'];
    $tanggal_penjualan = $_POST['tanggal_penjualan'];

    // Insert data into the penjualan table
    $query = mysqli_query($koneksi,"INSERT INTO penjualan 
                                    (kode_penjualan, id_barang, quantity, tanggal_penjualan)          
                                    VALUES
                                    ('$kode_penjualan', '$item_id', '$quantity', '$tanggal_penjualan')");

    if ($query) {
        // Deduct the sold quantity from the available quantity in the barang table
        $update_query = mysqli_query($koneksi, "UPDATE barang SET qty_barang = qty_barang - $quantity WHERE id_barang = '$item_id'");
        
        if (!$update_query) {
            // Handle if the quantity deduction fails
            echo "Error updating quantity: " . mysqli_error($koneksi);
        }
    } else {
        // Handle if the insertion into penjualan table fails
        echo "Error adding sales: " . mysqli_error($koneksi);
    }

    // Redirect to the view sales page
    header("location: lihat-penjualan.php");
    exit();
}
?>
