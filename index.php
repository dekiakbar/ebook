<!DOCTYPE html>
<html lang="en">
<head>
  <title>LEARNING E-BOOK</title>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/sweetalert2.css">
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/sweetalert2.min.js"></script>
  <link rel="shortcut icon" href="gambar/ssd.ico">
  <style>
    .navbar {
      margin-bottom: 50px;
      border-radius: 0;
    }
     .jumbotron {
      margin-bottom: 0;
    }
    footer {
      background-color: black;
      padding: 10px;
    }
  </style>
</head>
<body>
<div class="jumbotron">
  <div class="container text-center">
    <h1>Ebook</h1>      
    <p>TEKNIK INFORMATIKA</p>
  </div>
</div>
	<nav class="navbar navbar-inverse" data-spy="affix" data-offset-top="197">
  <ul class="nav navbar-nav">
    <li class="active"><a href="#">LOGO</a></li>
    <li><a href="#">Page 1</a></li>
    <li><a href="#">Page 2</a></li>
    <li><a href="#">Page 3</a></li>
  </ul>
</nav>
<div class="container">    
  <div class="row text-center">
        <?php
        require_once 'kon.php';
        $sql = mysqli_query($koneksi, "SELECT * FROM buku ORDER BY jdl ASC");
        if (mysqli_num_rows($sql) == 0) {
            echo "Database buku kosong";
          }else{
            $no=1;
            while ($data = mysqli_fetch_assoc($sql)) {
              //echo "<a href='".$data['link']."'>".$data['jdl']."</a>";
              echo '
              <div class="col-sm-4">
                <div class="panel panel-primary">
                  <div class="panel-heading">'.$data['jdl'].'</div>
                    <div class="panel-body"><img src="#" class="img-responsive" style="width:100%" alt="Image"></div>
                    <div class="panel-footer"><a href="'.$data['link'].'" class="btn btn-primary">Download</a></div>
                </div>
              </div>
              ';
            }
          }  
        ?>  
  </div>
</div><br>
<footer class="container-fluid text-center">
  <p>Copyright</p> 
</footer>
</body>
</html>