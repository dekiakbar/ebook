<?php
	include("session.php");
	include ('../kon.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Admin Page</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<script type="text/javascript" src="../js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../js/jquery.js"></script>
	<link rel="shortcut icon" href="../gambar/ssd.ico" />
</head>
<body style="background: linear-gradient(to bottom , purple, violet);position: absolute;">
	<nav class="navbar navbar-default warna" role="navigation">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
		    <span class="icon-bar"></span>
		    <span class="icon-bar"></span>
		    <span class="icon-bar"></span>
		    </button>    
		</div>
		<div class="navbar-collapse collapse">
		    <ul class="nav navbar-nav navbar-left">
		    	<li><a href="#"><span class="glyphicon glyphicon-home"></span> Preview</a></li>
		        <li class="active"><a href="sukses.php"><span class="glyphicon glyphicon-list-alt"></span> Ebook</a></li>
		    </ul>
		    <ul class="nav navbar-nav navbar-right">
		    	<li><a href="tambah.php"><span class="glyphicon glyphicon-plus"></span> Update</a></li>
		      	<li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
		    </ul>
		</div>
	</nav>
	<div class="container">
		<div class="content">
			<div class="table-responsive">
				<table class="table text-center">
					<tr>
						<th>No</th>
						<th>Judul</th>
						<th>Pengarang</th>
						<th>Kategori</th>
						<th>Tanggal</th>
						<th>Donasi</th>
						<th>Ukuran</th>
						<th>Menu</th>
					</tr>
					<?php 
					$sql = mysqli_query($koneksi,"SELECT * FROM buku ORDER BY jdl ASC");
					if (mysqli_num_rows($sql) == 0) {
							echo '<tr><td colspan="8">Data Masih Kosong.</td></tr>';
					}else{
						$no=1;
						while($data = mysqli_fetch_assoc($sql)){
						echo '
						<tr>
							<td>'.$no.'</td>
							<td><a href="'.$data['link'].'"><span class="glyphicon glyphicon-book" aria-hidden="true"></span> '.$data['jdl'].'</a></td>
                            <td>'.$data['nmp'].'</td>
                            <td>'.$data['kat'].'</td>
							<td>'.$data['tgl'].'</td>
                            <td><span class="label label-info">'.$data['donasi'].'</span></td>
                            <td>'.konversi($data['ukuran'],1).'</td>
							<td>
								
								<a href="edit.php?nik='.$data['id'].'" title="Edit Ebook" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
								<a href="index.php?aksi=delete&nik='.$data['id'].'" title="Hapus Ebook" onclick="return confirm(\'Anda yakin akan menghapus E-Book '.$data['jdl'].'?\')" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
							</td>
						</tr>
						';
						$no++;
						}
					} 
					?>
				</table>
			</div>
		</div>
	</div>
</body>
</html>

	<?php 
	function konversi($bytes, $decimals = 2) {
    	$factor = floor((strlen($bytes) - 1) / 3);
    	if ($factor > 0) $sz = 'KMGT';
    	return sprintf("%.{$decimals}f", $bytes / pow(1024, $factor)) . @$sz[$factor - 1] . 'B';
	}
	?>
