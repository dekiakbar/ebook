<?php 
include ('session.php');
include ('../kon.php');
 
 	if (isset($_GET['nib'])) {
		$id 		= $_GET['nib'];
		$ambilbuku 	= mysqli_query($koneksi,"SELECT * FROM buku WHERE id='$id'");
		$datadb = mysqli_fetch_assoc($ambilbuku);
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
	<link rel="stylesheet" type="text/css" href="../css/sweetalert2.css">
	<link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
	<script type="text/javascript" src="../js/sweetalert2.min.js"></script>
	<script type="text/javascript" src="../js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../js/jquery.js"></script>
	<link rel="shortcut icon" href="../gambar/ssd.ico">
 </head>
 <body class="bodiedit">
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
                <li><a href="sukses.php"><span class="glyphicon glyphicon-list-alt"></span> Ebook</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="tambah.php"><span class="fa fa-wrench fa-lg"></span> Seting</a></li>
                <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
            </ul>
        </div>
    </nav>
 	<div class="container">
 		<div class="content">
 			<div class="col-sm-8">
 				<form class="form-horizontal col-sm-12 warbel" action="" method="post" enctype="multipart/form-data">
					<div class="form-group">
						<h2 class="text-center"><span class="glyphicon glyphicon-retweet"></span> Update E-Book</h2>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-4">Judul Buku:</label>
						<div class="col-sm-8">
							<input type="text" name="judul" class="form-control" placeholder="Masukan Judul Buku" required>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-4">Nama Pengarang:</label>
						<div class="col-sm-8">
							<input type="text" name="pengarang" class="form-control" placeholder="Masukan Nama Pengarang" required>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-4">Donasi:</label>
						<div class="col-sm-8">
							<input type="text" name="donasi" class="form-control" placeholder="Nama Penyumbang Buku" required>
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
 			<div class="col-sm-4">
 				<form class="form-horizontal col-sm-12 warbel">
 					<div class="form-group">
						<h2 class="text-center"><span class="glyphicon glyphicon-hdd"></span> Data Lama</h2>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-4">Judul Buku:</label>
						<div class="col-sm-8">
							<label class="control-label"><?php echo $datadb['jdl']; ?></label>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-4">Pengarang:</label>
						<div class="col-sm-8">
							<label class="control-label"><?php echo $datadb['nmp']; ?></label>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-4">Tangal:</label>
						<div class="col-sm-8">
							<label class="control-label"><?php echo $datadb['tgl']; ?></label>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-4">Donasi:</label>
						<div class="col-sm-8">
							<label class="control-label"><?php echo $datadb['donasi']; ?></label>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-4">Kategori:</label>
						<div class="col-sm-8 text-center">
							<label class="label-inline">
								<?php 
									$datkat 	= explode(',',$datadb['kat']);
									foreach ($datkat as $pishkat) {
		                        	$ktgri 	= mysqli_query($koneksi,"SELECT kategori FROM kate WHERE id='$pishkat'");
		                        	while ($ambil  = mysqli_fetch_assoc($ktgri)) {
		                        		echo '<span class="label label-info">'.$ambil['kategori'].'</span> ';
			                        	}
			                        }
								?>
							</label>
						</div>
					</div>
 				</form>
 			</div>
 		</div>
 	</div>
 	<br>
 	<footer>
        <div class="col-sm-12 bawah" style="color: #fff;">
            <div class="col-sm-8 text-center tengah fixed-bottom">
                <p>&copy; 2017 Copyright Himpunan Mahasiswa Teknik Informatika</p>
            </div>
        </div>
    </footer>
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