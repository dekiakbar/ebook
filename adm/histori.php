<?php 
    require_once '../kon.php';
    require_once 'session.php';
    require_once '../kripto.php';
    $halaman=1;
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin | History</title>
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
            	<li class="active"><a href="histori.php"><span class="fa fa-history fa-lg"></span> History</a></li>
                <li><a href="tambah.php"><span class="fa fa-wrench fa-lg"></span> Seting</a></li>
                <li><a href="logout.php"><span class="fa fa-sign-out fa-lg"></span> Logout</a></li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <div class="row">
            <div class="col-sm-9">
                <div class="table-responsive">
                    <table class="table text-center">
                        <tr>
                            <th>User</th>
                            <th>IP</th>
                            <th>OS</th>
                            <th>Browser</th>
                            <th>Waktu</th>
                            <th>Keterangan</th>
                        </tr>

                        <?php 

                            if (isset($_GET['halaman'])) {
                                $halaman = encryptor('decrypt',$_GET['halaman']);
                                if (false === $halaman) {
                                    $halaman = 1;
                                }
                            }

                            $logperhal = 10;
                            $batas       = ($halaman - 1) * $logperhal;
                            $ambil = mysqli_query($koneksi, "SELECT * FROM log ORDER BY wkt DESC LIMIT ".$batas.",".$logperhal);
                            $baris = mysqli_num_rows($ambil);

                            if ($baris == 0) {
                                echo '<tr><td colspan="6">Log Kosong.</td></tr>';
                            }else{
                                while ($data = mysqli_fetch_assoc($ambil)) {
                                    if ($data['os'] == "linux") {
                                        $os = '<span class="fa fa-linux fa-2x" title="Linux"></span>';
                                    }elseif ($data['os'] == "window") {
                                        $os = '<span class="fa fa-windows fa-2x" title="Windows"></span>';
                                    }elseif ($data['os'] == "mac") {
                                        $os = '<span class="fa fa-apple fa-2x" title="OSX"></span>';
                                    }
                                    echo '
                                        <tr>
                                            <td>'.$data['user'].'</td>
                                            <td>'.$data['ip'].'</td>
                                            <td>'.$os.'</td>
                                            <td>'.$data['browser'].'</td>
                                            <td>'.$data['wkt'].'</td>
                                            <td>'.$data['ket'].'</td>
                                        </tr>
                                    ';
                                }
                            }
                         ?>

                    </table>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="row">
                    <div class="col-sm-12 warbel">
                        <div class="form-group">
                            <h2 class="text-center"><span class="fa fa-info-circle"></span> Info</h2>
                        </div>
                        <div class="form-group">
                            <p class="text-justify">Kalo ada yang coba masuk atau login ke admin page web ini, mohon secepatnya ditindak dengan cara blaclist mac addressnya, mac address ada di DHCP server log dan sesuai kan dengan IP yang mencoba masuk ke login page. IP tersebut akan valid dengan waktu 14 hari dihitung dari user tersebut mulai terhubung ke Wifi. </p>
                            <p class="text-right">Thank's</p>
                        </div>
                    </div>
                </div>
                <br>
                    <?php
                        $ambildata = mysqli_query($koneksi, "SELECT * FROM tamu");
                        $data = mysqli_fetch_assoc($ambildata);
                     ?>
                <div class="row">
                    <div class="col-sm-12 warbel">
                        <div class="form-group">
                            <h2 class="text-center"><span class="fa fa-search"></span> Viewers</h2>
                        </div>
                        <div class="form-group">
                            <label class="label-control col-sm-6 text-right">Dikunjungi :</label>
                            <div class="col-sm-6">
                                <label class="label-control"><?php echo $data['hitung']; ?>x</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="label-control col-sm-6 text-right">Terunduh :</label>
                            <div class="col-sm-6">
                                <label class="label-control"><?php echo $data['donlod']; ?>x</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="label-control col-sm-6 text-right">Ebook :</label>
                            <div class="col-sm-6">
                                <label class="label-control">
                                    <?php 
                                        $sql            = mysqli_query($koneksi, "SELECT * FROM buku");
                                        $hitungbaris    = mysqli_num_rows($sql);
                                        echo $hitungbaris; 
                                    ?>
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="label-control col-sm-6 text-right">Free :</label>
                            <div class="col-sm-6">
                                <label class="label-control">
                                    <?php 
                                        $kosong = konversi(disk_free_space('/'),2);
                                        echo $kosong;
                                     ?>
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="label-control col-sm-6 text-right">Disk :</label>
                            <div class="col-sm-6">
                                <label class="label-control">
                                    <?php 
                                        $total  = konversi(disk_total_space('/'),2);
                                        echo $total;
                                     ?>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 text-center marginbawah marginatas">
                <?php 
                    if (mysqli_num_rows($ambil) != 0){
                            echo '  
                                <a href="histori.php?halaman='.encryptor('encrypt',1).'">
                                    <span class="fa fa-angle-double-left fa-2x putih"> </span> 
                                </a>';
                    if ($halaman == 1) {
                            echo '    
                                <a>
                                    <span class="fa fa-angle-left fa-2x putih"> </span> 
                                </a>';
                        }else{
                            echo '    
                                <a href="histori.php?halaman='.encryptor('encrypt',($halaman-1)).'">
                                    <span class="fa fa-angle-left fa-2x putih"> </span> 
                                </a>'; 
                        }     
                ?>

                <ul class="pagination pagination-sm marginman">
                    <?php 
                        $ambilid = mysqli_query($koneksi, "SELECT id From log");
                        $banyakbaris = mysqli_num_rows($ambilid);
                        mysqli_free_result($ambilid);

                        $hitunghal = 0;
                        if ($banyakbaris == 0) {
                                      
                        }else{
                            $hitunghal = (int)ceil($banyakbaris / $logperhal);
                            if ($halaman > $hitunghal) {
                                $halaman = 1;
                            }
                        }

                        for($i=1; $i <= $hitunghal ; $i++) { 
                            if ($i == $halaman) {
                                echo '<li class="active"><a>'.$i.'</a></li>';
                            }else{
                                echo '<li><a href="histori.php?halaman='.encryptor('encrypt',$i).'">'.$i.'</a></li>';
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
                            <a href="histori.php?halaman='.encryptor('encrypt',($halaman+1)).'">
                                <span class="fa fa-angle-right fa-2x putih"> </span> 
                            </a>';
                    }        
                    echo '
                        <a href="histori.php?halaman='.encryptor('encrypt',$hitunghal).'">
                            <span class="fa fa-angle-double-right fa-2x putih"> </span> 
                        </a>'; 
                    }
                ?>
            </div>
        </div>
    </div>
    <footer>
        <div class="col-sm-12 bawah footer" style="color: #fff;margin-top: 0px;">
            <div class="col-sm-8 text-center tengah fixed-bottom">
                <p>&copy; 2017 Copyright Himpunan Mahasiswa Teknik Informatika</p>
            </div>
        </div>
    </footer>
</body>
</html>