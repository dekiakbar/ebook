<?php 
require_once 'kon.php';
 ?>
<!DOCTYPE html>
<html>
<head>
  <title>HMTI Server</title>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/sweetalert2.css">
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/sweetalert2.min.js"></script>
  <link rel="shortcut icon" href="gambar/ssd.ico">
  <style>
  body {
      font: 400 15px/1.8 Lato, sans-serif;
      color: #777;
  }
  h3, h4 {
      margin: 10px 0 30px 0;
      letter-spacing: 10px;      
      font-size: 20px;
      color: #111;
  }
  
  .navbar {
      font-family: Montserrat, sans-serif;
      color: #fff;
      margin-bottom: 0;
      background-color: rgba(0,0,0,0.4);
      border: 0;
      font-size: 13px !important;
      letter-spacing: 4px;
  }
  .navbar li a, .navbar .navbar-brand { 
      color: #d5d5d5 !important;
  }
  .navbar-nav li a:hover {
      color: #fff !important;
  }
  .navbar-nav li.active a {
      color: #fff !important;
      background-color: #29292c !important;
  }
  .navbar-default .navbar-toggle {
      border-color: transparent;
  }
  .open .dropdown-toggle {
      color: transparent;
      background-color: transparent !important;
  }
  .dropdown-menu li a {
      color: #fff !important;

  }
  .dropdown-menu li a:hover {
      background-color: royalblue !important;
  }

  .carousel .carousel-inner{
    max-height:700px; 
  }

  .carousel-inner img {
      width: 100%;
      margin: auto;
  }
  .carousel-caption h3 {
      color: #fff !important;
  }
  @media (max-width: 600px) {
    .carousel-caption {
      display: none; 
    }
  }
  .ebook{
    float: none;
    margin: 0 auto;
  }

  .transparan{
    background-color: rgba(0,0,0,0.3);
    border-radius: 15px;
  }
  </style>
</head>
<body id="awal">
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
                <input type="#" class="form-control" id="#" placeholder="Search" style="height: 20px;margin-top: 15px;font-size: 10px;">
              </div>
            </form> 
          </li>
          <li><a href="#"><span type="submit" class="glyphicon glyphicon-search"></span></a></li>
          <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-list"></span></a>
            <ul class="dropdown-menu transparan">
              <li><a href="#">Kategori 1</a></li>
              <li><a href="#">Kategori 2</a></li>
              <li><a href="#">Kategori 3</a></li> 
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>

<div id="geser" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#geser" data-slide-to="0" class="active"></li>
      <li data-target="#geser" data-slide-to="1"></li>
      <li data-target="#geser" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner" role="listbox">
      <div class="item active">
        <img src="gambar/1.jpg">
        <div class="carousel-caption">
          <h3>TEKNIK INFORMATIKA</h3>
          <p>NO SYSTEM IS SAFE AND HAVE FUN IN CYBER WORLD</p>
        </div>      
      </div>
      <div class="item">
        <img src="gambar/1.jpg">
        <div class="carousel-caption">
         <h3>TEKNIK INFORMATIKA</h3>
          <p>NO SYSTEM IS SAFE AND HAVE FUN IN CYBER WORLD</p>
        </div>      
      </div>   
      <div class="item">
        <img src="gambar/1.jpg">
        <div class="carousel-caption">
          <h3>TEKNIK INFORMATIKA</h3>
          <p>NO SYSTEM IS SAFE AND HAVE FUN IN CYBER WORLD</p>
        </div>      
      </div>
    </div>
    <a class="left carousel-control" href="#geser" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#geser" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
</div>

<br>

<div class="container">
  <div class="col-sm-12 ebook">    
    <div class="panel panel-primary">
      <div class="panel-heading">E-BOOK</div>
      <div class="panel-body">
        <div class="col-sm-12">  
          <div class="row">
              <?php
                require_once 'kon.php';
                $sql = mysqli_query($koneksi, "SELECT * FROM buku ORDER BY jdl ASC LIMIT 10");
                 if (mysqli_num_rows($sql) == 0) {
                    echo "Database buku kosong";
                  }else{
                    $no=1;
                    while ($data = mysqli_fetch_assoc($sql)) {
                      $datkat     = explode(',',$data['kat']);         
                      echo '
                      <div class="col-sm-3">
                        <div class="panel panel-primary">
                          <div class="panel-heading text-center">'.$data['jdl'].'</div>
                          <div class="panel-body"><img src="#" class="img-responsive" style="width:100%" alt="Image"></div>
                          <div class="panel-footer text-center">
                            <a href="#" class="btn btn-primary btn-xs">Download</a>
                            <a href="'.$data['link'].'" class="btn btn-info btn-xs">Preview</a>
                          </div>
                        </div>
                      </div>
                      ';
                    }
                  }  
              ?>
          </div>
        </div>
      </div>
      <br>
    </div>
    <div class="panel-footer text-center">TEKNIK INFORMATIKA</div>
  </div>
</div>

<br>

<footer class="text-center">
  <a class="up-arrow" href="#awal" data-toggle="tooltip" title="Naik Gan">
    <span class="glyphicon glyphicon-chevron-up"></span>
  </a><br><br>
  <p>&copy;2017 Designed By <a href="#" data-toggle="tooltip" title="HMTI">HMTI@NusaPutra</a></p> 
</footer>

</body>
</html>