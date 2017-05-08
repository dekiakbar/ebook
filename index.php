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
  	<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  	<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  	<script src="js/jquery-3.2.1.min.js"></script>
  	<script src="js/bootstrap.min.js"></script>  
	<script>
	function openNav() {
	    document.getElementById("mySidenav").style.width = "250px";
	    document.getElementById("dek").style.marginLeft = "250px";
	}

	function closeNav() {
	    document.getElementById("mySidenav").style.width = "0";
	    document.getElementById("dek").style.marginLeft= "0";
	}
</script>
</head>
<body id="awal">
<div id="dek">
<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="navbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#"></a>
      <a class="navbar-brand" href="#">Logo</a>
    </div>
    <div class="collapse navbar-collapse" id="navbar">
      <ul class="nav navbar-nav navbar-right">
      	<li>
          <form>
            <div class="form-group">
              <input type="#" class="form-control" id="#" placeholder="Search" style="height: 23px;margin-top: 14px">
            </div>
          </form> 
        </li>
        <li><a href="#"><span type="submit" style="font-size: 17px; cursor:pointer" onclick="openNav()">&#9776;</span></a></li>
      </ul>
    </div>
  </div>
</nav>
<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="#">About</a>
  <a href="#">Services</a>
  <a href="#">Clients</a>
  <a href="#">Contact</a>
</div>
<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner" role="listbox">
      <div class="item active">
        <img src="gambar/1.jpg" alt="Nvidia" width="1200" height="236">
        <div class="carousel-caption">
          <h3>TEKNIK INFORMATIKA</h3>
          <p>NO SYSTEM IS SAFE AND HAVE FUN IN CYBER WORLD</p>
        </div>      
      </div>
      <div class="item">
        <img src="gambar/1.jpg" alt="Nvidia" width="1366" height="700">
        <div class="carousel-caption">
         <h3>TEKNIK INFORMATIKA</h3>
          <p>NO SYSTEM IS SAFE AND HAVE FUN IN CYBER WORLD</p>
        </div>      
      </div>   
      <div class="item">
        <img src="gambar/1.jpg" alt="Nvidia" width="1366" height="700">
        <div class="carousel-caption">
          <h3>TEKNIK INFORMATIKA</h3>
          <p>NO SYSTEM IS SAFE AND HAVE FUN IN CYBER WORLD</p>
        </div>      
      </div>
    </div>
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
</div><br>
<div class="ebook">    
  <div  class="col-md-12 panel panel-primary" width="100%"><br>
      <div class="col-md-12 panel-heading">ALL E-BOOK</div><br>
      <div class="panel-body"><br> 
  		  <div class="row">
          <?php
            if (isset($_GET['halaman'])) {
                  $halaman = filter_input(INPUT_GET, 'halaman', FILTER_VALIDATE_INT);
                  if (false === $halaman) {
                      $halaman = 1;
                  }
            }

            $bukuperhal = 12;
            $batas = ($halaman - 1) * $bukuperhal;
            $sql = mysqli_query($koneksi, "SELECT * FROM buku LIMIT ".$batas.",".$bukuperhal);
            
            if (mysqli_num_rows($sql) == 0) {
              echo "Database buku kosong";
            }else{
              while ($data = mysqli_fetch_assoc($sql)) {
              $datkat     = explode(',',$data['kat']);         
              echo '
                <div class="col-md-3">
                <div class="thumbnail">
                  <div class="panel-heading panel-default text-center"><h4>'.$data['jdl'].'</h4></div>
                    <div class="panel-body">
                      <img src="gambar/ssd.ico" class="img-responsive" style="width:100%" alt="Image">

                    </div>
                    <div class="panel-footer">
                      <a href="dl.php?dl='.encryptor('encrypt',$data['link']).'" class="btn btn-primary btn-sm" title="Download gan"><span class="fa fa-cloud-download fa-lg"></span> Download</a>
                      <a href="'.$data['link'].'" class="btn btn-info btn-sm" title="Cek dulu Gan!" style="position: absolute; right: 30px;"><span class="fa fa-search fa-lg"></span> Preview</a>
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
      <div class="col-sm-12 text-center">
                <div class="col-sm-1">
                    <?php 
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
                <div class="col-sm-1">
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
                    ?>
                </div>
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
</div>
</body>
</html>

