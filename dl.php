<?php 
require_once 'kripto.php';
  
  if (isset($_GET['dl'])) {
    $link = encryptor('decrypt',$_GET['dl']);
    
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename='.$link);
	readfile($link);
     
  }
   ?>