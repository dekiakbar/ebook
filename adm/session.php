<?php 
include ("../kon.php");
session_start();
   if(!isset($_SESSION['login_user'])){
		header("Location: adm.php");
   }
 ?>