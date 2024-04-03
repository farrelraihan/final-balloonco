<?php 
include 'koneksi.php';
session_start();

if(isset($_POST['ubah']))
{
    // Tangkap data dari form edit admin
    $ambil_id_admin = $_POST['id_admin'];
    $ambil_kode_admin = $_POST['kode_admin'];
    $ambil_nama_admin = $_POST['nama_admin'];
    $ambil_login_admin = $_POST['login_admin'];
    $ambil_password_admin = md5($_POST['pw_admin']);

    // Mengupdate data pada tabel admin
    $query = mysqli_query($koneksi, "UPDATE admin
                                    SET 
                                        kode_admin      = '$ambil_kode_admin',
                                        nama_admin      = '$ambil_nama_admin',
                                        login_admin     = '$ambil_login_admin',
                                        pw_admin        = '$ambil_password_admin'
                                    WHERE 
                                        id_admin        = '$ambil_id_admin'");

    header("location:lihat-staff.php");                            
}
?>
