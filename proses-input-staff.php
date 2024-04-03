<?php 
include 'koneksi.php';
session_start();

if(isset($_POST['tambah']))
{
    // Tangkap data dari form
    $ambil_kode_admin = $_POST['kode_admin'];
    $ambil_nama_admin = $_POST['nama_admin'];
    $ambil_login_admin = $_POST['login_admin'];
    $ambil_password_admin = md5($_POST['pw_admin']);

    // Simpan data ke database
    $query = mysqli_query($koneksi,"INSERT INTO admin 
                                    (kode_admin, nama_admin, login_admin, pw_admin)          
                                    VALUES
                                    ('$ambil_kode_admin', '$ambil_nama_admin', '$ambil_login_admin', 
                                    '$ambil_password_admin')");

    header("location: lihat-staff.php");
}
?>
