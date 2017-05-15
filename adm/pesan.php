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
        <a href="#" class="navbar-brand">Informatic Engineering</a>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-left">
                <li><a href="#"><span class="glyphicon glyphicon-home"></span> Preview</a></li>
                <li><a href="sukses.php"><span class="glyphicon glyphicon-list-alt"></span> Ebook</a></li>
                <li class="active"><a href="pesan.php"><span class="glyphicon glyphicon-envelope"></span> Message</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
            	<li><a href="histori.php"><span class="fa fa-history fa-lg"></span> History</a></li>
                <li><a href="tambah.php"><span class="fa fa-wrench fa-lg"></span> Seting</a></li>
                <li><a href="logout.php"><span class="fa fa-sign-out fa-lg"></span> Logout</a></li>
            </ul>
        </div>
    </nav>

	<div class="container">
		<div class="row">
			<div class="col-sm-6">
				<form class="form-horizontal warbel col-sm-12">
					<?php 
						if (isset($_GET['liat'])) {
							$cek = mysqli_real_escape_string($koneksi, $_GET['liat']);
	    					$pid = encryptor('decrypt', $cek);
	    				}else{
	    					$pid = 1;
	    				}
						$baca = mysqli_query($koneksi, "SELECT * FROM kontak WHERE id='$pid'");
						$data = mysqli_fetch_assoc($baca);
					 ?>
					<div class="form-group">
						<h2 class="text-center"><span class="glyphicon glyphicon-envelope"></span> Detail</h2>
					</div>
					<div class="form-group">
						<label class="label-control col-sm-3 text-right">Pengirim :</label>
						<label class="label-control col-sm-9"><?php echo $data['nama']; ?></label>
					</div>
					<div class="form-group">
						<label class="label-control col-sm-3 text-right">No :</label>
						<label class="label-control col-sm-9"><?php echo $data['nohp']; ?></label>
					</div>
					<div class="form-group">
						<label class="label-control col-sm-3 text-right">IP :</label>
						<label class="label-control col-sm-9"><?php echo $data['ip']; ?></label>
					</div>
					<div class="form-group">
						<label class="label-control col-sm-3 text-right">Tanggal :</label>
						<label class="label-control col-sm-9"><?php echo $data['waktu']; ?></label>
					</div>
					<div class="form-group">
						<label class="label-control col-sm-3 text-right">tipe :</label>
						<label class="label-control col-sm-9"><?php echo $data['tipe']; ?></label>
					</div>
					<div class="form-group">
						<label class="label-control col-sm-3 text-right">Pesan :</label>
						<p class="label-control col-sm-9"><?php echo $data['pesan']; ?></p>
					</div>
					<div class="form-group">
						<div class="col-sm-12 text-center">
							<a href="javascript:;" data-id=<?php echo '"'.$data['id'].'"'; ?> id="delpesan" title="Hapus pesan" class="btn btn-primary transparan"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Hapus</a>
						</div>
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
                    		$halaman = encryptor('decrypt',$_GET['halaman']);
                    		if (false === $halaman) {
                        		$halaman = 1;
                    		}
              			}

						$pesanperhal = 10;
						$batas		 = ($halaman - 1) * $pesanperhal;
						$sql = mysqli_query($koneksi, "SELECT * FROM kontak LIMIT ".$batas.",".$pesanperhal);
						$baris = mysqli_num_rows($sql);
						if ($baris == 0) {
							echo '<tr><td colspan="4">Tidak Ada Pesan</td></tr>';
						}else{
							while ($data = mysqli_fetch_assoc($sql)) {
								echo '
									<tr>
										<td>'.$data['nama'].'</td>
										<td>'.$data['waktu'].'</td>
										<td>'.$data['tipe'].'<?td>
										<td>
											<a href="javascript:;" data-id="'.$data['id'].'" id="delpesan" title="Hapus pesan" class="btn btn-danger btn-sm hapus transparan"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>

											<a href=pesan.php?liat='.encryptor('encrypt', $data['id']).' class="btn btn-info btn-sm transparan" title="Liat Pesan"><span class=" fa fa-search-plus"></span></a>
										</td>
									</tr>';
							}
						}
						?>
					</table>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12 text-center marginbawah">
	            <?php 
	                if (mysqli_num_rows($sql) != 0){
	                        echo '  
	                            <a href="pesan.php?halaman='.encryptor('encrypt',1).'">
	                                <span class="fa fa-angle-double-left fa-2x putih"> </span> 
	                            </a>';
	                if ($halaman == 1) {
	                        echo '    
	                            <a>
	                                <span class="fa fa-angle-left fa-2x putih"> </span> 
	                            </a>';
	                    }else{
	                        echo '    
	                            <a href="pesan.php?halaman='.encryptor('encrypt',($halaman-1)).'">
	                                <span class="fa fa-angle-left fa-2x putih"> </span> 
	                            </a>'; 
	                    }     
	            ?>

	            <ul class="pagination pagination-sm marginman">
	                <?php 
	                    $ambil = mysqli_query($koneksi, "SELECT id From kontak");
	                    $banyakbaris = mysqli_num_rows($ambil);
	                    mysqli_free_result($ambil);

	                    $hitunghal = 0;
	                    if ($banyakbaris == 0) {
	                                  
	                    }else{
	                        $hitunghal = (int)ceil($banyakbaris / $pesanperhal);
	                        if ($halaman > $hitunghal) {
	                            $halaman = 1;
	                        }
	                    }

	                    for($i=1; $i <= $hitunghal ; $i++) { 
	                        if ($i == $halaman) {
	                            echo '<li class="active"><a>'.$i.'</a></li>';
	                        }else{
	                            echo '<li><a href="pesan.php?halaman='.encryptor('encrypt',$i).'">'.$i.'</a></li>';
	                        }
	                    }
	                 ?>
	            </ul>    

	            <?php 
	                if ($halaman == $hitunghal) {
	                    echo '
	                        <a>
	                            <span class="fa fa-angle-right fa-2x putih"> </span> 
	                        </a>';
	                }else{
	                    echo '
	                        <a href="pesan.php?halaman='.encryptor('encrypt',($halaman+1)).'">
	                            <span class="fa fa-angle-right fa-2x putih"> </span> 
	                        </a>';
	                }        
	                echo '
	                    <a href="pesan.php?halaman='.encryptor('encrypt',$hitunghal).'">
	                        <span class="fa fa-angle-double-right fa-2x putih"> </span> 
	                    </a>'; 
	                }
	            ?>
        	</div>
		</div>
	</div>
	<footer>
        <div class="col-sm-12 bawah footer" style="color: #fff;">
            <div class="col-sm-8 text-center tengah fixed-bottom">
                <p>&copy; 2017 Copyright Himpunan Mahasiswa Teknik Informatika</p>
            </div>
        </div>
    </footer>
    <script type="text/javascript">
        $(document).on('click','#delpesan',function(){
			var id = $(this).data('id');
			swal({
		    title: "Anda yakin?",
		    text: "ingin menghapus pesan ini?",
		    type: "warning",
		    showCancelButton: true,
		    confirmButtonColor: "#4CAF50",
		    confirmButtonText: "Ya, Hapus!",
		    cancelButtonText: "Tidak, Batal!",
		    closeOnConfirm: false,
		    closeOnCancel: false
		}).then(function(isConfirm) {
		    if(isConfirm) {
		        $.get('pesan.php?del=delete&', {
		            nip:id
		        }).done(function(){
		        swal('Berhasil','Pesan Berhasil Dihapus','success');
		        setTimeout(10000);
		        location.reload(true);
		        });
		    } else {
		        swal("Batal", "Pesan batal di hapus!", "error");
		    }
		});
	});
	</script>
</body>
</html>

	<?php
		if(isset($_GET['del']) == 'delete'){
	        $id         = $_GET['nip'];
	        $datapesan     = mysqli_query($koneksi, "SELECT * FROM kontak WHERE id='$id'");
	        if(mysqli_num_rows($datapesan) == 0){
	                echo "<script>swal('Gagal','Pesan Tidak Diketahui','error');</script>";
	        }else{
	            $delete = mysqli_query($koneksi, "DELETE FROM kontak WHERE id='$id'");
	            if($delete){
	                echo "<script>swal('Berhasil','Pesan Berhasil Dihapus','success');</script>";
	                header("location:sukses.php");
	            }else{
	                echo "<script>swal('Gagal','Pesan Tidak Terhapus','error');</script>";
	            }
	        }
	    }

	   
	  ?>