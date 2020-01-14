<?php
session_start();
include 'examples/koneksi.php';

$email = $_POST['email'];
$password = $_POST['password'];

$login = mysqli_query($conn,"SELECT * FROM user WHERE email='$email' and password='$password'");
$cek = mysqli_num_rows($login);
//$data = mysqli_fetch_assoc($login);
//$row = mysqli_fetch_array($login);
if($cek>0){
	header("location:examples/dashboard.php");
	$_SESSION['email'] = $email;
	$_SESSION['status'] = "login";
	// echo "berhasil";
}
else{
	header("location:index.php?pesan=gagal");
	// $_SESSION['pesan'] = "gagal";
	// echo "Gagal";	
}
?>
