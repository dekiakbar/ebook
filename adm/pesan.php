<?php 
require_once '../kon.php';
require_once 'session.php';
require_once '../kripto.php';
$halaman=1;
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin | Message</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../css/sweetalert2.css">
    <link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
    <script src="../js/jquery.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/sweetalert2.min.js"></script>
    <link rel="shortcut icon" href="../gambar/ssd.ico">
</head>
<body class="bodisukses">
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
                <li class="active"><a href="pesan.php"><span class="glyphicon glyphicon-envelope"></span> Message</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="tambah.php"><span class="fa fa-wrench fa-lg"></span> Seting</a></li>
                <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
            </ul>
        </div>
    </nav>

	<div class="container">
		<div class="row">
			<div class="col-sm-6">
				<form class="form-horizontal warbel col-sm-12">
					<div class="form-group">
						<h2 class="text-center"><span class="glyphicon glyphicon-envelope"></span> Detail</h2>
					</div>
					<div class="form-group">
						<label class="label-control col-sm-3 text-right">Pengirim :</label>
						<label class="label-control col-sm-9">kdkakdkakdkakdk</label>
					</div>
					<div class="form-group">
						<label class="label-control col-sm-3 text-right">No :</label>
						<label class="label-control col-sm-9">kdkakdkakdkakdk</label>
					</div>
					<div class="form-group">
						<label class="label-control col-sm-3 text-right">IP :</label>
						<label class="label-control col-sm-9">kdkakdkakdkakdk</label>
					</div>
					<div class="form-group">
						<label class="label-control col-sm-3 text-right">Tanggal :</label>
						<label class="label-control col-sm-9">kdkakdkakdkakdk</label>
					</div>
					<div class="form-group">
						<label class="label-control col-sm-3 text-right">tipe :</label>
						<label class="label-control col-sm-9">kdkakdkakdkakdk</label>
					</div>
					<div class="form-group">
						<label class="label-control col-sm-3 text-right">Pesan :</label>
						<label class="label-control col-sm-9">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
						quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
						consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
						cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
						proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</label>
					</div>
				</form>
			</div>
			<div class="col-sm-6">
				<div class="table-responsive">
					<table class="table text-center">
						<tr>
							<th>Pengirim</th>
							<th>Tanggal</th>
							<th>Tipe</th>
							<th>Opsi</th>
						</tr>
						<?php 

						if (isset($_GET['halaman'])) {
							$halaman = filter_input(INPUT_GET, 'halaman', FILTER_VALIDATE_INT);
							if (flse === $halaman) {
								$halaman=1;
							}
						}

						$pesanperhal = 10;
						$batas		 = ($halaman - 1) * $pesanperhal;
						$sql = msqli_wuery($koneksi, "SELECT * FROM kontak LIMIT ".$batas.",".$pesanperhal);
						$baris = mysqli_num_rows($sql);
						if ($baris == 0) {
							echo "Tidak Ada Pesan";
						}else{
							while ($data = mysqli_fetch_assoc($sql)) {
								echo '
									<tr>
									<td>'.$data['nama'].'</td>
									<td>'.$data['waktu'].'</td>
									<td>'.$data['tipe'].'<?td>
									<td>'.$data[''].'';
							}
						}
						?>
						
					</table>
				</div>
			</div>
		</div>
	</div>
</body>
</html>