<?php 
include ('session.php');
include ('../kon.php');
 
 	if (isset($_GET['nik'])) {
		$id 		= $_GET['nik'];
		$ambilbuku 	= mysqli_query($koneksi,"SELECT * FROM buku WHERE id='$id'");
		$data = mysqli_fetch_assoc($ambilbuku);
	}
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
	<style type="text/css">
		body{
			background: linear-gradient(to bottom right, cyan, blue, skyblue);
			background-position: center center;
			background-repeat:  no-repeat;
			background-attachment: fixed;
			background-size:  cover;
		}
	</style>
 </head>
 <body>
 
 	<div class="container">
 		<div class="content">
 			<form class="form-horizontal col-sm-12 warbel" action="" method="post" enctype="multipart/form-data">
				<div class="form-group">
					<h2 class="text-center"><span class="glyphicon glyphicon-book"></span> Insert E-Book</h2>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-4">Judul Buku:</label>
					<div class="col-sm-8">
						<input type="text" name="judul" value="<?php echo $data['jdl']; ?>" class="form-control" placeholder="Masukan Judul Buku" required>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-4">Nama Pengarang:</label>
					<div class="col-sm-8">
						<input type="text" name="pengarang" value="<?php echo $data['nmp']; ?>" class="form-control" placeholder="Masukan Nama Pengarang" required>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-4">Donasi:</label>
					<div class="col-sm-8">
						<input type="text" name="donasi" <?php echo $data['donasi']; ?> class="form-control" placeholder="Nama Penyumbang Buku" required>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-4">File:</label>
					<div class="col-sm-2">
						<input class="file" type="file" name="file" required>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-4">Kategori:</label>
					<div class="col-sm-8 text-center">
						<?php 
						$dbkate	= mysqli_query($koneksi,"SELECT * FROM kate");
							if (mysqli_num_rows($dbkate) == 0) {
								echo "<script>swal('Error','Belum ada kategori','error');</script>
										<h4>Kategori Kosong</h4>";
							}else{
								while ($data = mysqli_fetch_assoc($dbkate)) {
									echo '
										<label class="checkbox-inline">
										<input type="checkbox" name="kat[]" value="'.$data['id'].'"><span class="label label-info">'.$data['kategori'].'</span>
											</label>';
										}
							}
						?>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-4">Password</label>
					<div class="col-sm-8">
						<input type="password" name="pass" class="form-control" placeholder="Password" required>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-12 text-center">
						<input type="submit" name="apdet" value="Update E-Book" class="btn btn-primary">
					</div>
				</div>
			</form>
 		</div>
 	</div>
 </body>
 </html>

<?php 
	if (isset($_POST['apdet'])) {
				$nama 		= $_FILES['file']['name'];
				$tipe		= explode('.',$_FILES['file']['name']);
				$extensi	= strtolower(end($tipe));
				$jenis 		= array('doc','docx','pdf');
				$ukuran		= $_FILES['file']['size'];
				$file 		= $_FILES['file']['tmp_name'];
				$judul 		= $_POST['judul'];
				$pengarang 	= $_POST['pengarang'];
				$donasi 	= $_POST['donasi'];
				$pass 		= md5($_POST['pass']);
				$tgl		= date('h:i:s j-m-y');
				$kat      	= implode(',', $_POST['kat']);

				$tes 		= mysqli_query($koneksi," SELECT * FROM buku WHERE jdl='$judul'");
				$apass		= mysqli_query($koneksi," SELECT * FROM admin WHERE pass='$pass'");
				if (mysqli_num_rows($tes) == 0) {
					if (mysqli_num_rows($apass) == 1) {
						if (in_array($extensi, $jenis) === true) {
							move_uploaded_file($file, '../ebook/'.$nama);
							$insert = mysqli_query($koneksi," INSERT INTO buku(jdl, nmp, kat, link, tgl, donasi, ukuran)VALUES ('$judul', '$pengarang', '$kat', '../ebook/$nama', '$tgl', '$donasi', '$ukuran')") or die('Error: ' . mysqli_error($koneksi));
							if ($insert) {
								echo "<script>swal('Berhasil','Upload Berhasil','success');</script>";
							}else{
								echo "<script>swal('Gagal','Upload Gagal','error');</script>";
							}
						}else{
							echo "<script>swal('Error','File yang diperbolehkan .pdf, .doc, .docx','error');</script>";
						}
							
					}else{
						echo "<script>swal('Error','Password Salah!','error');</script>";
					}
				}else{
					echo "<script>swal('Error','Buku Sudah Ada','error');</script>";
				}
		}
?>