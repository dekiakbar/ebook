<?php
include 'session.php';

session();
$_SESSION	= array();
$isi		= session_get_cookie_params();

setcookie(
	session_name(),'',
	time() - 42000,
	$isi['path'],
	$isi['domain'],
	$isi['stopjs'],
	$isi['http']);
session_destroy();
header("Location: adm.php");
?>