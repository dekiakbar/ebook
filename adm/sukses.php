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
	<script type="text/javascript" href="../js/bootstrap.min.js"></script>
	<script type="text/javascript" href="../js/jquery.js"></script>
</head>
<body>
	<div class="container">
		<div class="content">
			<div class="table-responsive">
				<table class="table table-striped table-hover">
					<tr>
						<th>No</th>
						<th>Judul</th>
						<th>Pengarang</th>
						<th>Kategori</th>
						<th>Tanggal</th>
						<th>Donasi</th>
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
							<td><a href="profile.php?nik="><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span> '.$data['jdl'].'</a></td>
                            <td>'.$data['nmp'].'</td>
                            <td>'.$data['kat'].'</td>
							<td>'.$data['tgl'].'</td>
                            <td><span class="label label-info">'.$data['donasi'].'</span></td>
							<td>
								
								<a href="edit.php?nik='.$data['id'].'" title="Edit Data" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
								<a href="index.php?aksi=delete&nik='.$data['id'].'" title="Hapus Data" onclick="return confirm(\'Anda yakin akan menghapus E-Book '.$data['jdl'].'?\')" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
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


