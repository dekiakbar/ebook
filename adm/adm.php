<!DOCTYPE html>
<html>
<head>
	<title>Login Admin</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<script type="text/javascript" href="js/bootstrap.min.js"></script>
</head>
<body>
<form action="" method="post">
	<input type="text" name="username">
	<input type="password" name="password">
	<input type="submit" name="Login">
</form>
</body>
</html>

<?php 
include ("../kon.php");
session_start();

if($_SERVER["REQUEST_METHOD"] == "POST") {

	$username = md5(mysqli_real_escape_string($koneksi,$_POST['username']));
	$password = md5(mysqli_real_escape_string($koneksi,$_POST['password']));

	$sql = "SELECT ID FROM admin WHERE user ='$username' AND pass ='$password'";
	$data =mysqli_query($koneksi,$sql);
	$banding = mysqli_num_rows($data);

	if($banding == 1) {
         $_SESSION['login_user'] = $username;
         header ('location:sukses.php');
      }else{
         echo "Username atau Password salah";
      }
}
 ?>
