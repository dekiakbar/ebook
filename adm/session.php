<?php 
include ("../kon.php");
session_start();
   if(isset($_SESSION['user'],$_SESSION['login'])){
   	$user	= $_SESSION['user'];
   	$login	= $_SESSION['login'];
   	$pasdb	= mysqli_query($koneksi, "SELECT pass FROM admin WHERE user='$user'");
   		if (mysqli_num_rows($pasdb) == 1) {
   			$data = mysqli_fetch_assoc($pasdb);
   			echo $data['pass'];
   		}
   }else{
		header("Location: adm.php");
   }
 ?>