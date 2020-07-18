<!-- PHP Code -->
<?php
session_start();
require "function.php";

$name = $_GET["nama"];
$product = rescer("SELECT * FROM produk WHERE nama_brand = '$name' ORDER BY harga_produk DESC");

if ($name) {
    $brand = rescer("SELECT * FROM brand WHERE nama_brand = '$name'");
}

?>

<!-- HTML Code -->
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Heroic Features - Start Bootstrap Template</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/heroic-features.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js?v=<?php echo time(); ?>" crossorigin="anonymous">
    </script>
</head>

<body>
    <!-- Navigation -->
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
            </ul>
        </div>
    </nav>

    <!-- Page Content -->
    <div class="container">

        <!-- Jumbotron Header -->
        <div class=" container jumbotron my-4 text-center py-2 px-0 w-50 justify-content-center text-center">
            <?php foreach ($brand as $gambar) : ?>
                <img class="img-fluid w-50" src="images/Brand/<?php echo $gambar["gambar"]; ?>">
            <?php endforeach; ?>
        </div>

        <!-- Page Features -->
        <div class="text-center">
            <div id="produk" class="jumbotron my-4 text-center py-0 px-5">
                <?php foreach ($brand as $merek) : ?>
                    <h3 class="display-4 h3 py-5 px-0"><?php echo $merek["nama_brand"]; ?> Product </h3>
                <?php endforeach; ?>
                <div class="row text-center">
                    <?php foreach ($product as $produk) : ?>
                        <div class="col-lg-3 col-md-6 mb-5">
                            <div class="card-deck">
                                <div class="card">
                                    <h5 style="color: black;" class="card-header font-weight-bold">
                                        <?php echo $produk["nama_produk"]; ?>
                                    </h5>
                                    <img class="card-img-top img-fluid" src="images/Card/<?php echo $produk["gambar"]; ?>">
                                    <div style="color: #1aa3ff;" class="card-footer py-3 my-0 h5">
                                        <?php $rupiah = $produk["harga_produk"]; ?>
                                        <?php echo rupiah($rupiah); ?>
                                    </div>
                                    <div class="card-footer">
                                        <a href="halaman-produk.php?nama=<?= $produk["nama_produk"]; ?>&merek=<?= $produk["nama_brand"]; ?>" class="btn btn-secondary">Lihat</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <!-- /.row -->
            </div>
        </div>

    </div>
    <!-- /.container -->

    <!-- Footer -->
    <footer class="py-2 bg-dark">
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