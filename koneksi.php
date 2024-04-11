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

<?php
// Set the timezone to GMT+7
date_default_timezone_set('Asia/Jakarta');
?>
