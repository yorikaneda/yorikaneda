<?php

session_start();

if (!isset($_SESSION["next"])) {
    header("Location: step1.php");
}

// CEK PILIHAN DAN KIRIM DATA KE STEP3
if (isset($_POST["android"])) {
    $_SESSION['os'] = $_POST['android'];
    header("Location: step3.php");
} else if (isset($_POST["ios"])) {
    $_SESSION['os'] = $_POST['ios'];
    header("Location: step3.php");
}

require 'function.php';

// MASUKAN NILAI DARI VARIABLE $_SESSION KE $budget
$budget = $_SESSION["budget"];

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
                                ...
                            </h6>
                        </div>
                        <div class="col-sm border-left border-light align-self-center">
                            <img class=" float-left" src="https://img.icons8.com/color/48/000000/multiple-smartphones.png" />
                            Prioritas Pilihanmu
                            <h6 class=" font-weight-bold">
                                ...
                            </h6>
                        </div>
                    </div>
                </div>
            </div>

            <div class="jumbotron py-5 px-0 text-center">
                <h5 class=" display-4 py-1 px-0 mb-5">Saya Ingin Menggunakan:</h5>
                <!-- FORM -->
                <form action="" method="post" class="row justify-content-center py-0 px-0 my-5">
                    <?php if ($budget >= 6100000) { ?>
                        <div class="col-lg-3 col-md-6 mb-0">
                            <button class="btn btn-primary btn-dark" name="android" type="text" value="ANDROID">
                                <img class=" py-4" src="https://img.icons8.com/nolan/192/android-os.png" />
                                <h6 class=" font-weight-bold">Android</h6>
                            </button>
                        </div>
                        <div class="col-lg-3 col-md-6 mb-0">
                            <button class="btn btn-primary btn-dark" name="ios" type="text" value="IOS">
                                <img class=" py-4" src="https://img.icons8.com/nolan/192/ios-logo.png" />
                                <h6 class=" font-weight-bold">iOS</h6>
                            </button>
                        </div>
                    <?php } else { ?>
                        <div class="col-lg-3 col-md-6 mb-0">
                            <button class="btn btn-dark " name="android" type="text" value="ANDROID">
                                <img class=" py-4" src="https://img.icons8.com/nolan/192/android-os.png" />
                                <h6 class=" font-weight-bold">Android</h6>
                            </button>
                        </div>
                        <div class="col-lg-3 col-md-6 mb-0">
                            <button class="btn btn-dark " name="ios" disabled>
                                <img class=" py-4" src="https://img.icons8.com/nolan/192/ios-logo.png" />
                                <h6 class=" font-weight-bold">iOS</h6>
                            </button>
                            <p class="font-italic pt-3">
                                *Budget kamu kurang untuk memilih ini.
                            </p>
                        </div>
                    <?php } ?>
                </form>
                <p class=" font-italic py-0">
                    *Pilih salah satu
                </p>
                <div class="py-0 my-0">
                    <a href="step1.php" class="btn btn-secondary btn-lg">Kembali</a>
                </div>
            </div>

        </div>
    </div>
    <!-- /.container -->

    <!-- Footer -->
    <footer class="py-2">
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