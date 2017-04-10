<!DOCTYPE html>
<html>
<head>
	<title>Login Admin</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<link rel="stylesheet" type="text/css" href="../css/sweetalert2.css">
	<script type="text/javascript" src="../js/sweetalert2.min.js"></script>
	<script type="text/javascript" src="../js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../js/jquery.js"></script>
</head>
<body style="background-image: url('../gambar/login.jpg');">
<div class="container">
	<div class="content">
		<div class="row">
			<div class="col-md-12">
	            <div class="wrap">
	                <p class="judul">Login Page</p>
	                <form class="login" action="" method="post">
		                <input type="text" name="username" placeholder="Username" required/>
		                <input type="password" name="password" placeholder="Password" required/>
		                <input type="submit" value="Login" class="btn btn-primary btn-sm" />
		            </form>
	            </div>
			</div>
		</div>
	</div>
</div>
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
         echo "<script>
         		swal('Eror','Username atau password salah!','error');
         	   </script>";
      }
}
 ?>
