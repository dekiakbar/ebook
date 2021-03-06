<?php
    include 'session.php';
    include '../kon.php';
    require_once '../kripto.php';
    $halaman=1;
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
                <li class="active"><a href="sukses.php"><span class="glyphicon glyphicon-list-alt"></span> Ebook</a></li>
                <li><a href="pesan.php"><span class="glyphicon glyphicon-envelope"></span> Message</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="histori.php"><span class="fa fa-history fa-lg"></span> History</a></li>
                <li><a href="tambah.php"><span class="fa fa-wrench fa-lg"></span> Seting</a></li>
                <li><a href="logout.php"><span class="fa fa-sign-out fa-lg"></span> Logout</a></li>
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
                    
                    if (isset($_GET['halaman'])) {
                        $halaman = filter_input(INPUT_GET, 'halaman', FILTER_VALIDATE_INT);
                        if (false === $halaman) {
                            $halaman = 1;
                        }
                    }

                    $bukuperhal = 10;
                    $batas = ($halaman - 1) * $bukuperhal;
                    $sql    = mysqli_query($koneksi,"SELECT * FROM buku LIMIT ".$batas.",".$bukuperhal);
                    $baris = mysqli_num_rows($sql);
                    if ($baris == 0) {
                            echo '<tr><td colspan="8">Data Masih Kosong.</td></tr>';
                    }else{
                        $no=1;
                        while($data = mysqli_fetch_assoc($sql)){
                        $datkat     = explode(',',$data['kat']);
                        echo '
                            <tr>
                            <td>'.$no.'</td>
                            <td><a href="../'.$data['link'].'"><span class="fa fa-book" aria-hidden="true"></span> '.$data['jdl'].'</a></td>
                            <td>'.$data['nmp'].'</td>
                            <td>';
                       
                        foreach ($datkat as $pishkat) {
                            $ktgri  = mysqli_query($koneksi,"SELECT kategori FROM kate WHERE id='$pishkat'");
                            while ($ambil  = mysqli_fetch_assoc($ktgri)) {
                                echo '<span class="label label-primary">'.$ambil['kategori'].'</span> ';
                            }
                        }
                           
                        echo'
                            </td>
                            <td>'.$data['tgl'].'</td>
                            <td><span class="label label-success transparan">'.$data['donasi'].'</span></td>
                            <td>'.konversi($data['ukuran'],1).'</td>
                            <td>
                               
                                <a href="edit.php?nib='.encryptor('encrypt',$data['id']).'" title="Edit Ebook" class="btn btn-info btn-sm transparan"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
                                <a href="javascript:;" data-id="'.$data['id'].'" id="delbuk" title="Hapus Ebook" class="btn btn-danger btn-sm hapus transparan"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
                            </td>
                        </tr>
                        ';
                        $no++;
                        }
                    }
                    ?>
                </table>
            </div>
            <div class="col-sm-12 text-center">
                <div class="col-sm-1 nomargin">
                    <?php 

                        if ($baris != 0) {
                        echo '
                            <a href="sukses.php?halaman=1">
                                <span class="fa fa-angle-double-left fa-2x"></span>
                            </a>';
                        if ($halaman == 1) {
                                echo '    
                                    <a>
                                        <span class="fa fa-angle-left fa-2x"></span>
                                    </a>';
                            }else{
                                echo '    
                                    <a href="sukses.php?halaman='.($halaman-1).'">
                                        <span class="fa fa-angle-left fa-2x"></span>
                                    </a>'; 
                            }    
                        
                    ?>
                </div>
                <div class="col-sm-10">
                    <ul class="pagination pagination-sm nomargin">
                        <?php 
                            $ambil = mysqli_query($koneksi, "SELECT id From buku");
                            $banyakbaris = mysqli_num_rows($ambil);
                            mysqli_free_result($ambil);

                            $hitunghal = 0;
                            if ($banyakbaris == 0) {
                                
                            }else{
                                $hitunghal = (int)ceil($banyakbaris / $bukuperhal);
                                if ($halaman > $hitunghal) {
                                    $halaman = 1;
                                }
                            }

                            for($i=1; $i <= $hitunghal ; $i++) { 
                                if ($i === $halaman) {
                                    echo '<li class="active"><a>'.$i.'</a></li>';
                                }else{
                                    echo '<li><a href="sukses.php?halaman='.$i.'">'.$i.'</a></li>';
                                }
                            }
                         ?>
                    </ul>    
                </div>
                <div class="col-sm-1 nomargin">
                    <?php 
                        if ($halaman == $hitunghal) {
                            echo '
                                <a>
                                    <span class="fa fa-angle-right fa-2x"></span>
                                </a>';
                        }else{
                            echo '
                                <a class="selanjutnya" href="sukses.php?halaman='.($halaman+1).'">
                                    <span class="fa fa-angle-right fa-2x"></span>
                                </a>';
                        }
                        
                        echo '
                            <a class="selanjutnya" href="sukses.php?halaman='.$hitunghal.'">
                                <span class="fa fa-angle-double-right fa-2x"></span>
                            </a>'; 
                        }
                    ?>
                </div>
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
        $(document).on('click','#delbuk',function(){
			var id = $(this).data('id');
			swal({
		    title: "Anda yakin?",
		    text: "ingin menghapus data ini?",
		    type: "warning",
		    showCancelButton: true,
		    confirmButtonColor: "#4CAF50",
		    confirmButtonText: "Ya, Hapus!",
		    cancelButtonText: "Tidak, Batal!",
		    closeOnConfirm: false,
		    closeOnCancel: false
		}).then(function(isConfirm) {
		    if(isConfirm) {
		        $.get('sukses.php?del=delete&', {
		            nib:id
		        }).done(function(){
		        swal('Berhasil','Ebook Berhasil Dihapus','success');
		        setTimeout(10000);
		        location.reload(true);
		        });
		    } else {
		        swal("Batal", "Data batal di hapus!", "error");
		    }
		});
	});
	</script>
</body>
</html>
 
    <?php
   if(isset($_GET['del']) == 'delete'){
        $id         = $_GET['nib'];
        $datbuk     = mysqli_query($koneksi, "SELECT * FROM buku WHERE id='$id'");
        $linkbuk    = mysqli_fetch_assoc($datbuk);
        if(mysqli_num_rows($datbuk) == 0){
                echo "<script>swal('Gagal','Data Tidak Diketahui','error');</script>";
        }else{
            $delete = mysqli_query($koneksi, "DELETE FROM buku WHERE id='$id'");
            if($delete){
                unlink($linkbuk['link']);
                echo "<script>swal('Berhasil','Ebook Berhasil Dihapus','success');</script>";
                header("location:sukses.php");
            }else{
                echo "<script>swal('Gagal','Data Tidak Terhapus','error');</script>";
            }
        }
    }
    ?>