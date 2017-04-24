<?php 
include ("../kon.php");
session_start();
    if(isset($_SESSION['user'],$_SESSION['login'])){
   	$user	= $_SESSION['user'];
   	$login	= $_SESSION['login'];
   	$pasdb	= mysqli_query($koneksi, "SELECT pass FROM admin WHERE user='$user'");
   		if (mysqli_num_rows($pasdb) == 1) {
   			$browser= $_SERVER['HTTP_USER_AGENT']; 
   			$data	= mysqli_fetch_assoc($pasdb);
   			$enpas	= hash('sha512', $browser.$data['pass']);
   			
   			if (hash_equals($login,$enpas)) {
   			
   			}else{
   				header("Location: adm.php");
   			}
   		}else{
   			header("Location: adm.php");
   		}
    }else{
		header("Location: adm.php");
   }
 ?>