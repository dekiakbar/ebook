<?php
	include("session.php");
	include ('../kon.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin Page</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
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
					</tr>
					<?php 
					$sql = mysqli_query($koneksi,"SELECT * FROM buku ORDER BY jdl ASC");
					if (mysqli_num_rows($sql) == 0) {
							echo '<tr><td colspan="8">Data Masih Kosong.</td></tr>';
					}else{
						while($data = mysqli_fetch_assoc($sql)){
							echo '
							<tr>
								<td>'.$data['id'].'</td>
								<td><a href="#"'.$data['id'].'"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>'.$data['jdl'].'</a></td>
	                            <td>'.$data['nmp'].'</td>
	                            <td>'.$data['kat'].'</td>
								<td>'.$data['tgl'].'</td>
	                            <td><span class="label label-success">'.$data['donasi'].'</span></td>
	                        </tr>';
							
						}
					} 
					?>
				</table>
			</div>
		</div>
	</div>
</body>
</html>


