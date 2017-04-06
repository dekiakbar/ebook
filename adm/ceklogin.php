<?php 

include ("../kon.php");
session_start();

$user = md5(mysqli_real_escape_string($koneksi,$_POST['username']));
$pass = md5(mysqli_real_escape_string($koneksi,$_POST['password']));

$sql = "SELECT ID FROM admin WHERE user ='$user' AND pass ='$pass'";
$data =mysqli_query($koneksi,$sql);
//$hasil = mysqli_fetch_array($data,MYSQLI_ASSOC);
//$active = $hasil['active'];
$banding = mysqli_num_rows($data);

	if($banding == 1) {    
         header("location: welcome.php");
      }else{
         $salah = "Username atau Password salah";
      }

 ?>
