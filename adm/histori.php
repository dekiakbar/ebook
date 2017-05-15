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
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-left">
                <li><a href="#"><span class="glyphicon glyphicon-home"></span> Preview</a></li>
                <li><a href="sukses.php"><span class="glyphicon glyphicon-list-alt"></span> Ebook</a></li>
                <li><a href="pesan.php"><span class="glyphicon glyphicon-envelope"></span> Message</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
            	<li class="active"><a href="histori.php"><span class="fa fa-history fa-lg"></span> History</a></li>
                <li><a href="tambah.php"><span class="fa fa-wrench fa-lg"></span> Seting</a></li>
                <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
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
                            $ambil = mysqli_query($koneksi, "SELECT * FROM log ORDER BY wkt ASC");
                            $baris = mysqli_num_rows($ambil);

                            if ($baris == 0) {
                                echo '<tr><td colspan="6"">Log Kosong.</td></tr>';
                            }else{
                                while ($data = mysqli_fetch_assoc($ambil)) {
                                    echo '
                                        <tr>
                                            <td>'.$data['user'].'</td>
                                            <td>'.$data['ip'].'</td>
                                            <td>'.$data['os'].'</td>
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
        </div>
    </div>