<?php
	include 'session.php';
	include '../kon.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>Admin | Tambah</title>
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
<body class="boditambah">
	<nav class="navbar navbar-default warna" role="navigation">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            </button>    
        </div>
        <a href="#" class="navbar-brand">Informatic Engineering</a>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-left">
                <li><a href="#"><span class="glyphicon glyphicon-home"></span> Preview</a></li>
                <li><a href="sukses.php"><span class="glyphicon glyphicon-list-alt"></span> Ebook</a></li>
                <li><a href="pesan.php"><span class="glyphicon glyphicon-envelope"></span> Message</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
            	<li><a href="histori.php"><span class="fa fa-history fa-lg"></span> History</a></li>
                <li class="active"><a href="tambah.php"><span class="fa fa-wrench fa-lg"></span> Seting</a></li>
                <li><a href="logout.php"><span class="fa fa-sign-out fa-lg"></span> Logout</a></li>
            </ul>
        </div>
    </nav>	
	<div class="container tengah">
		<div class="content">
			<div class="row">
				<div class="col-sm-7">
					<form class="form-horizontal col-sm-12 warbel" action="" method="post" enctype="multipart/form-data">
						<div class="form-group">
							<h2 class="text-center"><span class="fa fa-cloud-upload fa-lg"></span> Insert E-Book</h2>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-4">Judul Buku:</label>
							<div class="col-sm-8">
								<input type="text" name="judul" class="form-control" placeholder="Masukan Judul Buku" maxlength="50" required>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-4">Nama Pengarang:</label>
							<div class="col-sm-8">
								<input type="text" name="pengarang" class="form-control" placeholder="Masukan Nama Pengarang" maxlength="20" required>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-4">Donasi:</label>
							<div class="col-sm-8">
								<input type="text" name="donasi" class="form-control" placeholder="Nama Penyumbang Buku" maxlength="20" required>
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
												</label>
											';
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
								<button type="submit" name="tambah" class="btn btn-primary">
									<i class="fa fa-rocket fa-lg"> Upload</i>
								</button>
							</div>
						</div>
					</form>
				</div>
				<div class="col-sm-5">
					<div class="row">
						<div class="col-sm-12">
							<form action="" method="post" class="form-horizontal col-sm-12 warbel">
								<div class="form-group">
									<h2 class="text-center"><span class="fa fa-gears"></span> Ganti Password</h2>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-4"><span class="fa fa-user-secret fa-lg"></span> Nama Admin:</label>
									<div class="col-sm-8">
										<?php 
										$user = $_SESSION['user']; 
										$nadmin = mysqli_query($koneksi, "SELECT * FROM admin WHERE user='$user'");
									
											if (mysqli_num_rows($nadmin) == 0) {
												echo '<label class="control-label col-sm-8">Lu Siapa?</label>';
											}else{
												$data = mysqli_fetch_assoc($nadmin);
												echo '<label class="control-label col-sm-8">'.$data['nadmin'].'</label>';
										}
										 ?>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-4">Kata Sandi Lama:</label>
									<div class="col-sm-8">
										<input type="password" name="paslam" class="form-control" placeholder="Kata Sandi Lama" required>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-4">Kata Sandi Baru:</label>
									<div class="col-sm-8">
										<input type="password" name="pasbar" class="form-control" placeholder="Kata Sandi Baru" required>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-4">Verifikasi Sandi:</label>
									<div class="col-sm-8">
										<input type="password" name="verpas" class="form-control" placeholder="Verifikasi Kata  Sandi" required>
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-12 text-center">
										<input type="submit" name="ganpas" value="Ganti Kata Sandi" class="btn btn-primary">
									</div>
								</div>
							</form>
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col-sm-12">
							<form action="" method="post" class="form-horizontal col-sm-12 warbel">
								<div class="form-group">
									<h2 class="text-center"><span class="glyphicon glyphicon-pushpin"></span> Tambah Kategori</h2>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-4">Nama Kategori:</label>
									<div class="col-sm-8">
										<input type="text" name="katbar" class="form-control" placeholder="Kategori Baru" maxlength="20" required>
									</div>
								</div>	
								<div class="form-group">
									<div class="col-sm-12 text-center">
										<input type="submit" name="tamkat" value="Tambah Kategori" class="btn btn-primary">
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<footer>
        <div class="col-sm-12 bawah" style="color: #fff;margin-top: 3px;">
            <div class="col-sm-8 text-center tengah fixed-bottom">
                <p>&copy; 2017 Copyright Himpunan Mahasiswa Teknik Informatika</p>
            </div>
        </div>
    </footer>
</body>
</html>

	<?php 
	if (isset($_POST['tambah'])) {
			$namafile 	= $_FILES['file']['name'];
			$nama 		= str_replace(" ", "", $namafile);
			$tipe		= explode('.',$_FILES['file']['name']);
			$extensi	= strtolower(end($tipe));
			$jenis 		= array('doc','docx','pdf');
			$ukuran		= $_FILES['file']['size'];
			$file 		= $_FILES['file']['tmp_name'];
			$judul 		= $_POST['judul'];
			$pengarang 	= $_POST['pengarang'];
			$donasi 	= $_POST['donasi'];
			$pass 		= md5($_POST['pass']);
			$tgl		= date("Y-m-d H:i:s");
			$kat      	= implode(',', $_POST['kat']);

			$tes 		= mysqli_query($koneksi," SELECT * FROM buku WHERE jdl='$judul'");
			$apass		= mysqli_query($koneksi," SELECT * FROM admin WHERE pass='$pass'");
			if (mysqli_num_rows($tes) == 0) {
				if (mysqli_num_rows($apass) == 1) {
					if (in_array($extensi, $jenis) === true) {
						move_uploaded_file($file, '../ebook/'.$nama);
						$insert = mysqli_query($koneksi," INSERT INTO buku(jdl, nmp, kat, link, tgl, donasi, ukuran)VALUES ('$judul', '$pengarang', '$kat', 'ebook/$nama', '$tgl', '$donasi', '$ukuran')") or die('Error: ' . mysqli_error($koneksi));
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
		}elseif (isset($_POST['ganpas'])) {
			$user 		= $_SESSION['login_user'];
			$paslam 	= md5($_POST['paslam']);
			$pasbar 	= $_POST['pasbar'];
			$verpas		= $_POST['verpas'];

			$adm		= mysqli_query($koneksi,"SELECT * FROM admin WHERE user='$user'");
			if ($pasbar == $verpas) {
				if (mysqli_num_rows($adm) == 1) {
					while ($data = mysqli_fetch_assoc($adm)) {
						$nadmin = $data['nadmin'];
						if ($data['pass'] == $paslam) {
							$pasen = md5($pasbar);
							$inpas = mysqli_query($koneksi, "UPDATE admin SET user='$user', pass='$pasen' WHERE nadmin='$nadmin'") or die('Error:'.mysqli_error($koneksi));
							echo "<script>swal('Berhasil','Kata Sandi Berhasil Diganti','success');</script>";
						}else{
							echo "<script>swal('Error','Kata Sandi Lama Salah!','error');</script>";
						}
					}
				}else{
					echo "<script>swal('Error','Nama Admin Tidak Diketahui','error');</script>";
				}
			}else{
				echo "<script>swal('Error','Ulangi Kata Sandi Baru','error');</script>";
			}
		}elseif (isset($_POST['tamkat'])) {
			$katbar = $_POST['katbar'];

			$tes = mysqli_query($koneksi,"SELECT * FROM kate WHERE kategori='$katbar'");
			if (mysqli_num_rows($tes) == 0) {
				$insert = mysqli_query($koneksi,"INSERT INTO kate(kategori) VALUES ('$katbar')") or die('Eror:'.mysqli_error($koneksi));
				if ($insert) {
					echo "<script>
							swal('Berhasil','Berhasil Tambah kategori','success').
							then(function(isConfirm){
								if(isConfirm){
									window.location.href = window.location.href;
								}
							});
						</script>";
				}else{
					echo "<script>swal('Gagal','Gagal Tambah kategori','error');</script>";
				}
			}else{
				echo "<script>swal('Error','Kategori Sudah Ada','error');</script>";
			}
		}	
	?>