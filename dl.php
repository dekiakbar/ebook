<?php 
require_once 'kripto.php';
  
  if (isset($_GET['dl'])) {
    $link = encryptor('decrypt',$_GET['dl']);
    if (file_exists($link)) {
    	header('Content-Type: application/octet-stream');
    	header('Content-Disposition: attachment; filename='.$link);
		readfile($link);
    }else{
    	header('Location: error.php');	
    }
     
  }else{
  	header('Location: index.php');
  }
   ?>    }
