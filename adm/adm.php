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
    <script src="../js/jquery.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/sweetalert2.min.js"></script>
    <link rel="shortcut icon" href="../gambar/ssd.ico">
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
include '../kon.php';
include 'os.php';

session_start();

if($_SERVER["REQUEST_METHOD"] == "POST") {

	$username = md5(mysqli_real_escape_string($koneksi,$_POST['username']));
	$password = md5(mysqli_real_escape_string($koneksi,$_POST['password']));

	$sql = "SELECT ID FROM admin WHERE user ='$username' AND pass ='$password'";
	$data =mysqli_query($koneksi,$sql);
	$banding = mysqli_num_rows($data);

	if($banding == 1) {
		 $browser			= $_SERVER['HTTP_USER_AGENT'];
         $_SESSION['user']	= $username;
         $_SESSION['login'] = hash('sha512', $browser.$password);
         $ip 				= $_SERVER['REMOTE_ADDR'];
         $dklien	 		= getBrowser();
         $broser 			= $dklien['browser'].$dklien['version'];
         $os				= $dklien['platform'];
         $wkt				= date("Y-m-d H:i:s");
         $catat = mysqli_query($koneksi,"INSERT INTO log (ip, os, browser, wkt, ket) VALUES('$ip','$os','$broser','$wkt','sekses')") or die('Error: ' . mysqli_error($koneksi));
         header ('location:sukses.php');
      }else{
         echo "<script>
         		swal('Eror','Username atau password salah!','error');
         	   </script>";
      }
}
 ?>
