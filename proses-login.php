<?php
include 'koneksi.php';
session_start();

if(isset($_POST['login'])) {
    $login_admin = $_POST['login_admin'];
    $pw_admin = md5($_POST['pw_admin']);

    $query = mysqli_query($koneksi, "SELECT * FROM admin WHERE login_admin = '$login_admin' AND pw_admin = '$pw_admin'");
    $data = mysqli_fetch_assoc($query);

    if(mysqli_num_rows($query) == 1) {
        $_SESSION['id_admin'] = $data['id_admin'];
        $_SESSION['nama_admin'] = $data['nama_admin'];
        header("location: home.php");
    } else {
        echo "Email atau password salah!";
    }
}
?>


