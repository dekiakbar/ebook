<?php 

$server 	= "localhost";
$user		= "root";
$pass 		= "toor";
$db			= "ebook";

$koneksi = new mysqli($server,$user,$pass,$db);

	if (mysqli_connect_error()) {
		die ("Database Tidak Terhubung".$koneksi->mysqli_connect_error());
	}

 ?>