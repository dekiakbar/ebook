<?php 
include ("../kon.php");
session_start();
   if(isset($_SESSION['user'])){
   		echo($_SESSION['user']);
   		echo($_SESSION['login']);
   }else{
		header("Location: adm.php");
   }
 ?>