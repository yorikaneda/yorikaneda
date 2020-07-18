<!-- PHP Code -->
<?php
require "function.php";
$brand = rescer("SELECT * FROM brand ORDER BY nama_brand ASC");
?>

<!-- HTML Code -->
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>RESCER</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css?v=<?php echo time(); ?>" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/heroic-features.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js?v=<?php echo time(); ?>" crossorigin="anonymous">
  </script>

</head>

<body>
  <!-- NAVBAR -->
  <nav class="navbar navbar-expand-lg fixed-top">
    <div class="container h2 py-0 my-0 font-italic">
      RESCER
    </div>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
          <a class="nav-link" href="index.php">Home
            <span class="sr-only">(current)</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php">Telusuri</a>
        </li>
      </ul>
    </div>
  </nav>

  <!-- Page Content -->
  <div id="home" class="container">
    <!-- Jumbotron Header -->
    <div class="jumbotron vh-50 py-5 px-5 my-5 text-center">
      <h1 class="display-3 py-0 my-0">LET'S FIND YOUR SMARTPHONE</h1>
      <p class="py-5 px-5 my-0 h6">
        <span class=" font-italic h5">RESCER</span> adalah website rekomendasi smartphone cerdas.
        <br> Kami menghadirkan inovasi dalam menemukan smartphone yang anda butuhkan mudah.
        <br>Tunggu apa lagi, temukan <span class=" font-italic h5">Smartphone</span> mu sekarang dengan <span class=" font-italic h5">RESCER</span> .
      </p>
      <a href="step1.php" class="btn btn-light btn-lg w-25 ">Ayo Mulai</a>
      <a href="#telusuri" class="btn btn-secondary btn-lg ">Telusuri</a>
    </div>
    <!-- Page Features -->
    <div id="telusuri" class="jumbotron my-5 py-0 text-center">
      <h1 class="display-4 h5 py-5">OFFICIAL BRANDS</h1>
      <div class="row text-center">
        <?php foreach ($brand as $merek) : ?>
          <div class="col-lg-3 col-md-6 mb-5">
            <div class="card-deck">
              <div class="card h-auto">
                <img class="card-img-top h-auto py-3 px-0" src="images/Brand/<?php echo $merek["gambar"]; ?>">
                <div class="card-footer">
                  <a href="halaman-brand.php?nama=<?= $merek["nama_brand"]; ?>" class="btn btn-primary">Jelajahi</a>
                </div>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
      <!-- /.row -->
    </div>
  </div>

  <!-- Footer -->
  <footer class="py-3">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; Your Website 2020</p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>