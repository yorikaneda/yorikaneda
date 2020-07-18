<?php

session_start();

if (!isset($_SESSION["next"])) {
    header("Location: step3.php");
}

// MASUKAN NILAI DARI VARIABLE $_SESSION KE $budget
$budget = $_SESSION['budget'];
$os = $_SESSION['os'];
$tipe = $_SESSION['output'];

require 'function.php';

$product = rescer("SELECT * FROM produk WHERE harga_produk <= $budget AND os_produk LIKE '%$os%' AND tipe_produk LIKE '%$tipe%' ORDER BY harga_produk DESC");

?>


<!-- HTML CODE -->
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
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Telusuri</a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Page Content -->
    <div class="container">

        <!-- Jumbotron Header -->
        <div class="container">

            <div class="row justify-content-center">
                <div class="jumbotron text-center py-0 px-4 my-4 w-75">
                    <div class="row">
                        <div class="col-sm py-2 mx-2 align-self-center">
                            <img class="float-left" src="https://img.icons8.com/color/48/000000/wallet.png" />
                            Budget Kamu
                            <h6 class=" font-weight-bold">
                                <?php echo rupiah($_SESSION["budget"]); ?>
                            </h6>
                        </div>
                        <div class="col-sm border-left border-light align-self-center">
                            <img class="float-left" src="https://img.icons8.com/color/48/000000/operating-system--v1.png" />
                            OS Pilihanmu
                            <h6 class=" font-weight-bold">
                                <?php echo strtoupper($_SESSION["os"]); ?>
                            </h6>
                        </div>
                        <div class="col-sm border-left border-light align-self-center">
                            <img class=" float-left" src="https://img.icons8.com/color/48/000000/multiple-smartphones.png" />
                            Prioritas Pilihanmu
                            <h6 class=" font-weight-bold">
                                <?php echo strtoupper($_SESSION["output"]); ?>
                            </h6>
                        </div>
                    </div>
                </div>
            </div>

            <!-- STEP 3 -->
            <div class="jumbotron mb-5 text-center p-0">
                <h5 class=" display-4 p-5">Rekomendasi Smartphone:</h5>
                <!-- BRAND -->
                <div class=" row d-flex justify-content-center py-0 my-0">
                    <?php foreach ($product as $produk) { ?>
                        <ul class="list-group list-group-horizontal mb-5">
                            <button class="btn btn-light py-3 px-5 h1 mx-1 font-weight-bolder" type="button" data-toggle="collapse" data-target="#<?php echo $produk["nama_brand"]; ?>" aria-expanded="false" aria-controls="collapseExample">
                                <?php echo $produk["nama_brand"]; ?>
                            </button>
                        </ul>
                    <?php } ?>
                </div>
                <!-- PRODUK -->
                <?php foreach ($product as $produk) { ?>
                    <div class="collapse" id="<?php echo $produk["nama_brand"]; ?>">
                        <div class="row justify-content-center py-0 my-0">
                            <div class="col-lg-3 col-md-6 mb-5">
                                <div class="card h-auto">
                                    <div style="color: black;" class="card-header h5">
                                        <?php echo $produk["nama_produk"]; ?>
                                    </div>
                                    <img class="card-img-top py-0 my-0" src="images/Card/<?php echo $produk["gambar"]; ?>">
                                    <div style="color: #1aa3ff;" class="card-footer py-2 my-0 h5">
                                        <?php $rupiah = $produk["harga_produk"]; ?>
                                        <?php echo rupiah($rupiah); ?>
                                    </div>
                                    <div class="card-footer">
                                        <a href="halaman-produk.php?nama=<?= $produk["nama_produk"]; ?>&merek=<?= $produk["nama_brand"]; ?>" class="btn btn-secondary">Lihat</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>

                <div class="pb-5">
                    <a href="step3.php" class="btn btn-secondary btn-lg">Kembali</a>
                    <a href="step1.php" class="btn btn-light btn-lg">Ulangi</a>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container -->

    <!-- Footer -->
    <footer class="py-2 fixed-bottom">
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