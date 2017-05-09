<?php 
require_once 'kon.php';
require_once 'kripto.php';
$halaman=1;
?>
<!DOCTYPE html>
<html>
<head>
	<title>E-Book Learnng</title>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="css/bootstrap.min.css">
  	<link rel="stylesheet" href="css/styleindex.css">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
  	<script src="js/jquery-3.2.1.min.js"></script>
  	<script src="js/bootstrap.min.js"></script>  
	<script>
	function openNav() {
	    document.getElementById("menu").style.width = "200px";
	}

	function closeNav() {
	    document.getElementById("menu").style.width = "0px";
	}
</script>
</head>
<body id="awal">
  <nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>                        
        </button>
        <a class="navbar-brand" href="#">Logo</a>
      </div>
      <div class="collapse navbar-collapse" id="navbar">
        <ul class="nav navbar-nav navbar-right">
        	<li>
            <form method="post">
              <div class="form-group">
                <input type="text" class="form-control" name="cari" placeholder="Cari Judul" pattern="[a-zA-Z0-9\s]+" style="height: 25px;margin-top: 15px;font-size: 10px;">
              </div>
            </form> 
          </li>
          <li><a href="#"><span type="submit" style="font-size: 17px; cursor:pointer" onclick="openNav()">&#9776;</span></a></li>
        </ul>
      </div>
    </div>
  </nav>

  <div id="menu" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <a href="#">About</a>
    <a href="#">Services</a>
    <a href="#">Clients</a>
    <a href="#">Contact</a>
  </div>

  <div id="slider" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#slider" data-slide-to="0" class="active"></li>
        <li data-target="#slider" data-slide-to="1"></li>
        <li data-target="#slider" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner" role="listbox">
        <div class="item active">
          <img src="gambar/1.jpg" width="100%" height="600">
          <div class="carousel-caption">
            <h3>TEKNIK INFORMATIKA</h3>
            <p>NO SYSTEM IS SAFE AND HAVE FUN IN CYBER WORLD</p>
          </div>      
        </div>
        <div class="item">
          <img src="gambar/1.jpg" width="100%" height="600">
          <div class="carousel-caption">
           <h3>TEKNIK INFORMATIKA</h3>
            <p>NO SYSTEM IS SAFE AND HAVE FUN IN CYBER WORLD</p>
          </div>      
        </div>   
        <div class="item">
          <img src="gambar/1.jpg" width="100%" height="600">
          <div class="carousel-caption">
            <h3>TEKNIK INFORMATIKA</h3>
            <p>NO SYSTEM IS SAFE AND HAVE FUN IN CYBER WORLD</p>
          </div>      
        </div>
      </div>
      <a class="left carousel-control" href="#slider" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#slider" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
  </div>
  <br>

  <div class="ebook">    
    <div  class="col-md-12 panel panel-primary" width="100%"><br>
        <div class="col-md-12 panel-heading">
          <div class="col-md-6"><h5 style="color: #fff;">E-BOOK</h5></div>
          <div class="col-md-6 text-right">
            <form class="form-inline " method="post">
              <div class="form-group">
                <select name="filter" class="form-control" onchange="form.submit()">
                  <option value="0">Filter by</option>
                  <?php $filter = (isset($_POST['filter']) ? strtolower($_POST['filter']) : NULL);  ?>
                  <option value="judul" <?php if($filter == 'judul'){ echo 'selected'; } ?>>Judul</option>
                  <option value="tanggal" <?php if($filter == 'tanggal'){ echo 'selected'; } ?>>Tanggal</option>
                  <option value="ukuran" <?php if($filter == 'ukuran'){ echo 'selected'; } ?>>Ukuran</option>
                  <option value="pengarang" <?php if($filter == 'pengarang'){ echo 'selected'; } ?>>Pengarang</option>
                  <option value="kat" <?php if($filter == 'kat'){ echo 'selected'; } ?>>Kategori</option>
                </select>
              </div>
            </form>
          </div>
        </div><br><br>
        <div class="panel-body"><br> 
    		  <div class="row">
            <?php
              if (isset($_GET['halaman'])) {
                    $halaman = encryptor('decrypt',$_GET['halaman']);
                    if (false === $halaman) {
                        $halaman = 1;
                    }
              }

              $bukuperhal = 12;
              $batas = ($halaman - 1) * $bukuperhal;
              if ($filter == "judul") {
                $sql = mysqli_query($koneksi, "SELECT * FROM buku ORDER BY jdl ASC LIMIT ".$batas.",".$bukuperhal);
              }elseif($filter == "tanggal") {
                $sql = mysqli_query($koneksi, "SELECT * FROM buku ORDER BY tgl DESC LIMIT ".$batas.",".$bukuperhal);
              }elseif ($filter == "pengarang") {
                $sql = mysqli_query($koneksi, "SELECT * FROM buku ORDER BY nmp ASC LIMIT ".$batas.",".$bukuperhal);
              }elseif ($filter == "ukuran") {
                $sql = mysqli_query($koneksi, "SELECT * FROM buku ORDER BY ukuran DESC LIMIT ".$batas.",".$bukuperhal);
              }elseif ($filter == "kate") {
                $sql = mysqli_query($koneksi, "SELECT * FROM buku ORDER BY kat ASC LIMIT ".$batas.",".$bukuperhal);
              }elseif (isset($_POST['cari'])) {
                $cari = filter_var($_POST['cari'], FILTER_SANITIZE_STRING);
                $sql = mysqli_query($koneksi, "SELECT * FROM buku WHERE jdl LIKE '%$cari%' LIMIT ".$batas.",".$bukuperhal);
              }else{
                $sql = mysqli_query($koneksi, "SELECT * FROM buku  LIMIT ".$batas.",".$bukuperhal);
              }
              if (mysqli_num_rows($sql) == 0) {
                echo "Database buku kosong";
              }else{
                while ($data = mysqli_fetch_assoc($sql)) {
                $datkat = explode(',',$data['kat']);         
                echo '
                  <div class="col-md-3">
                  <div class="thumbnail">
                    <div class="panel-heading panel-default text-center"><h4>'.$data['jdl'].'</h4></div>
                      <div class="panel-body text-center">
                        <div class="col-sm-12"><span class="fa fa-book fa-4x" style="color:#aaa;font-size:90px;"></span></div>
                        <div class="col-sm-12">
                          <div class="col-sm-4 label label-primary tengah">'.konversi($data['ukuran'],1).'</div>
                        </div>
                        <div class="col-sm-12">
                          <div class="col-sm-4 label label-primary tengah">'.$data['nmp'].'</div>
                        </div>
                        <div class="col-sm-12 biru">'.$data['tgl'].'</div>
                ';
                foreach ($datkat as $pishkat) {
                              $ktgri  = mysqli_query($koneksi,"SELECT kategori FROM kate WHERE id='$pishkat'");
                              while ($ambil  = mysqli_fetch_assoc($ktgri)) {
                                  echo '<span class="label label-default">'.$ambil['kategori'].'</span> ';
                              }
                          }
                echo '
                      </div>
                      <div class="panel-footer">
                        <a href="dl.php?dl='.encryptor('encrypt',$data['link']).'" class="btn btn-primary btn-sm" title="Download"><span class="fa fa-cloud-download fa-lg"></span> Download</a>
                        <a href="liat.php?buku='.encryptor('encrypt',$data['link']).'" class="btn btn-info btn-sm" title="Lihat" style="position: absolute; right: 30px;"><span class="fa fa-search fa-lg"></span> Preview</a>
                      </div>
                    </div>
                  </div>
                        ';
                      }
                    }  
                ?>
    		    </div>  
        </div>
      <div class="col-md-12 panel panel-primary panel-footer text-center">
        <div class="col-md-12">
            <?php 
                echo '
                    <a href="index.php?halaman='.encryptor('encrypt',1).'">
                        <span class="fa fa-angle-double-left fa-2x"> </span> 
                    </a>';
                if ($halaman == 1) {
                        echo '    
                            <a>
                                <span class="fa fa-angle-left fa-2x"> </span> 
                            </a>';
                    }else{
                        echo '    
                            <a href="index.php?halaman='.encryptor('encrypt',($halaman-1)).'">
                                <span class="fa fa-angle-left fa-2x"> </span> 
                            </a>'; 
                    }     
            ?>

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
                        if ($i == $halaman) {
                            echo '<li class="active"><a>'.$i.'</a></li>';
                        }else{
                            echo '<li><a href="index.php?halaman='.encryptor('encrypt',$i).'">'.$i.'</a></li>';
                        }
                    }
                 ?>
            </ul>    

            <?php 
                if ($halaman == $hitunghal) {
                    echo '
                        <a>
                            <span class="fa fa-angle-right fa-2x"> </span> 
                        </a>';
                }else{
                    echo '
                        <a href="index.php?halaman='.encryptor('encrypt',($halaman+1)).'">
                            <span class="fa fa-angle-right fa-2x"> </span> 
                        </a>';
                }        
                echo '
                    <a href="index.php?halaman='.encryptor('encrypt',$hitunghal).'">
                        <span class="fa fa-angle-double-right fa-2x"> </span> 
                    </a>'; 
            ?>
        </div>
      </div>
    </div>
  </div>
  <br>

  <footer class="col-md-12 text-center">
    <a class="up-arrow" href="#awal" data-toggle="tooltip" title="TO TOP">
      <span class="glyphicon glyphicon-chevron-up"></span>
    </a>
    <br><br>
    <p style="color: black">&copy; 2017 All Right Reserved | Designed by <a href="#" data-toggle="tooltip" title="HMTI">HIMPUNAN MAHASISWA TEKNIK INFORMATIKA</a></p> 
  </footer>
</body>
</html>