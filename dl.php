<?php 
  require_once 'kripto.php';
  require_once 'kon.php';
    
    if (isset($_GET['dl'])) {
      $link = encryptor('decrypt',$_GET['dl']);
      if (file_exists($link)) {
      	header('Content-Type: application/octet-stream');
      	header('Content-Disposition: attachment; filename='.$link);
        $tambah = mysqli_query($koneksi, "UPDATE tamu SET donlod = donlod+1");
  		  readfile($link);
      }else{
      	header('Location: error.php');	
      }
       
    }else{
    	header('Location: index.php');
    }

?> 
