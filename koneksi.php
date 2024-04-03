<?php
$user 		= "root";
$server 	= "localhost";
$password 	= "";
$db			= "final_project";
$koneksi 	= mysqli_connect($server, $user, $password, $db);

if($koneksi == false)
{
	echo "Tidak Terkoneksi";
}
?>