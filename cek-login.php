<?php 
include 'koneksi.php';
 
$username = $_POST['username'];
$password = md5($_POST['passwords']);
 
$login = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$username' AND passwords='$password' ");
$cek = mysqli_num_rows($login);
 
if($cek > 0){
	session_start();
	$_SESSION['username'] = $username;
	$_SESSION['status'] = "login";
	header("location:dashboard/index.php");
}else{
	header("location:index.php");	
}
 
?>