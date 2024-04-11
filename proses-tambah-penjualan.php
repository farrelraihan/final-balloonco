<?php 
include 'koneksi.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get item and quantity from the form
    $item_id = $_POST['item'];
    $quantity = $_POST['quantity'];

    // Generate kode_penjualan dynamically
    $query = mysqli_query($conn, "SELECT COUNT(*) as total FROM penjualan");
    $data = mysqli_fetch_assoc($query);
    $sequence_number = $data['total'] + 1;
    $kode_penjualan = "KP-" . sprintf("%04d", $sequence_number);

    // Generate current date and time
    $current_datetime = date('Y-m-d H:i:s');

    // Update penjualan table with the new sales record
    $sql_insert = "INSERT INTO penjualan (kode_penjualan, id_barang, quantity, tanggal_penjualan) VALUES ('$kode_penjualan', '$item_id', '$quantity', '$current_datetime')";
    if (mysqli_query($conn, $sql_insert)) {
        // Deduct the quantity from the available quantity in barang table
        $sql_update = "UPDATE barang SET qty_barang = qty_barang - $quantity WHERE id_barang = '$item_id'";
        if (mysqli_query($conn, $sql_update)) {
            echo "Sales added successfully.";
        } else {
            echo "Error updating quantity: " . mysqli_error($conn);
        }
    } else {
        echo "Error adding sales: " . mysqli_error($conn);
    }
}
?>
