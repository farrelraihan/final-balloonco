<?php
include 'koneksi.php';
session_start();

if(isset($_POST['tambah']))
{
    // Capture data from the form
    $kode_pembelian = $_POST['kode_pembelian'];
    $item_id = $_POST['item'];
    $quantity = $_POST['quantity'];
    $tanggal_pembelian = $_POST['tanggal_pembelian'];

    // Insert data into the pembelian table
    $query = mysqli_query($koneksi,"INSERT INTO pembelian 
                                    (kode_pembelian, id_barang, quantity, tanggal_pembelian)          
                                    VALUES
                                    ('$kode_pembelian', '$item_id', '$quantity', '$tanggal_pembelian')");

    if ($query) {
        // Add the purchased quantity to the available quantity in the barang table
        $update_query = mysqli_query($koneksi, "UPDATE barang SET qty_barang = qty_barang + $quantity WHERE id_barang = '$item_id'");
        
        if (!$update_query) {
            // Handle if the quantity addition fails
            echo "Error updating quantity: " . mysqli_error($koneksi);
        }
    } else {
        // Handle if the insertion into pembelian table fails
        echo "Error adding purchase: " . mysqli_error($koneksi);
    }

    // Redirect to the view purchase page
    header("location: lihat-pembelian.php");
    exit();
}
?>
