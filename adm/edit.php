<?php 
include ('session.php');
include ('kon.php');
 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>Admin Edit</title>
 	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<script type="text/javascript" href="../js/bootstrap.min.js"></script>
	<script type="text/javascript" href="../js/jquery.js"></script>
 </head>
 <body>
 
 	<div class="container">
 		<div class="content">
 			<H2>Edit Data E-Book</H2>
 			

 			<form class="form-horizontal">
 				<label class="col-sm-3 label">No</label>
 				<div class="col-sm-2">
 					<input type="text" name="id" value="<?php echo $data['id'];?>" class="form-control" placeholder="No" required>
 				</div>
 				<label class="col-sm-3 label">Judul</label>
 				<div class="col-sm-4">
 					<input type="text" name="judul" value="<?php echo $data['jdl'];?>" class="form-control" placeholder="No" required>
 				</div>
 				<label class="col-sm-3 label">Pengarang</label>
 				<div class="col-sm-4">
 					<input type="text" name="pengarang" value="<?php echo $data['nmp'];?>" class="form-control" placeholder="No" required>
 				</div>
 				<label class="col-sm-3 label">Donasi</label>
 				<div class="col-sm-4">
 					<input type="text" name="donasi" value="<?php echo $data['donasi'];?>" class="form-control" placeholder="No" required>
 				</div>
 			</form>
 			
 			
 		</div>
 	</div>
 </body>
 </html>