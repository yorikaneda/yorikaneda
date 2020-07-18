<?php

session_start();

if (!isset($_SESSION["next"])) {
    header("Location: step2.php");
}

// CEK PILIHAN DAN KIRIM DATA KE OUTPUT
if (isset($_POST["peforma"])) {
    $_SESSION['output'] = $_POST['peforma'];
    header("Location: output.php");
} else if (isset($_POST["kamera"])) {
    $_SESSION['output'] = $_POST['kamera'];
    header("Location: output.php");
} else if (isset($_POST["baterai"])) {
    $_SESSION['output'] = $_POST['baterai'];
    header("Location: output.php");
} else if (isset($_POST["iphone11"])) {
    $_SESSION['output'] = $_POST['iphone11'];
    header("Location: output.php");
} else if (isset($_POST["iphonex"])) {
    $_SESSION['output'] = $_POST['iphonex'];
    header("Location: output.php");
} else if (isset($_POST["iphone8"])) {
    $_SESSION['output'] = $_POST['iphone8'];
    header("Location: output.php");
} else if (isset($_POST["iphone7"])) {
    $_SESSION['output'] = $_POST['iphone7'];
    header("Location: output.php");
}

require 'function.php';

// MASUKAN NILAI DARI VARIABLE $_SESSION KE $budget
$budget = $_SESSION['budget'];
$os = strtoupper($_SESSION['os']);

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
                    <div id="step" class="row">
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
                                ...
                            </h6>
                        </div>
                    </div>
                </div>
            </div>

            <div class="jumbotron py-5 px-5 text-center">
                <h5 class=" display-4 py-1 px-1 mb-5">Prioritas Utama Saya:</h5>
                <!-- FORM -->
                <?php if ($os == "ANDROID") { ?>
                    <form action="" method="post" class="row justify-content-center py-0 px-0 my-5">
                        <div class="col-lg-3 col-md-6 mb-0">
                            <button class="btn btn-primary btn-dark" name="peforma" value="PEFORMA">
                                <img class=" py-4" src="https://img.icons8.com/nolan/192/speedometer.png" />
                                <h6 class=" font-weight-bold">Peforma</h6>
                            </button>
                        </div>
                        <div class="col-lg-3 col-md-6 mb-0">
                            <button class="btn btn-primary btn-dark" name="kamera" value="KAMERA">
                                <img class=" py-4" src="https://img.icons8.com/nolan/192/camera.png" />
                                <h6 class=" font-weight-bold">Kamera</h6>
                            </button>
                        </div>
                        <div class="col-lg-3 col-md-6 mb-0">
                            <button class="btn btn-primary btn-dark" name="baterai" value="BATERAI">
                                <img class=" py-4" src="https://img.icons8.com/nolan/192/full-battery.png" />
                                <h6 class=" font-weight-bold">Baterai</h6>
                            </button>
                        </div>
                    </form>
                <?php } else if ($os == "IOS") { ?>
                    <?php if ($budget >= 17000000) { ?>
                        <form action="" method="post" class="row justify-content-center py-0 px-0 my-5">
                            <div class="col-lg-3 col-md-6 mb-0">
                                <button class="btn btn-dark " name="iphone11" value="IPHONE11">
                                    <img class=" py-4" src="https://img.icons8.com/color/192/000000/iphone-x.png" />
                                    <h6>Iphone 11 series</h6>
                                </button>
                            </div>
                            <div class="col-lg-3 col-md-6 mb-0">
                                <button class="btn btn-dark " name="iphonex" value="IPHONEX">
                                    <img class=" py-4" src="https://img.icons8.com/color/192/000000/iphone-x.png" />
                                    <h6>Iphone X series</h6>
                                </button>
                            </div>
                            <div class="col-lg-3 col-md-6 mb-0">
                                <button class="btn btn-dark " name="iphone8" value="IPHONE8">
                                    <img class=" py-4" src="https://img.icons8.com/color/192/000000/iphone-x.png" />
                                    <h6>Iphone 8 series</h6>
                                </button>
                            </div>
                            <div class="col-lg-3 col-md-6 mb-0">
                                <button class="btn btn-dark " name="iphone7" value="IPHONE7">
                                    <img class=" py-4" src="https://img.icons8.com/color/192/000000/iphone-x.png" />
                                    <h6>Iphone 7 series</h6>
                                </button>
                            </div>
                        </form>
                    <?php } else if ($budget >= 10000000) { ?>
                        <form action="" method="post" class="row justify-content-center py-0 px-0 my-5">
                            <div class="col-lg-3 col-md-6 mb-0">
                                <button class="btn btn-dark " name="iphone11" disabled>
                                    <img class=" py-4" src="https://img.icons8.com/color/192/000000/iphone-x.png" />
                                    <h6>Iphone 11 series</h6>
                                </button>
                                <p class=" font-italic">
                                    *Budget kamu kurang untuk memilih ini.
                                </p>
                            </div>
                            <div class="col-lg-3 col-md-6 mb-0">
                                <button class="btn btn-dark " name="iphonex" disabled>
                                    <img class=" py-4" src="https://img.icons8.com/color/192/000000/iphone-x.png" />
                                    <h6>Iphone X series</h6>
                                </button>
                                <p class=" font-italic">
                                    *Budget kamu kurang untuk memilih ini.
                                </p>
                            </div>
                            <div class="col-lg-3 col-md-6 mb-0">
                                <button class="btn btn-dark " name="iphone8" value="IPHONE8">
                                    <img class=" py-4" src="https://img.icons8.com/color/192/000000/iphone-x.png" />
                                    <h6>Iphone 8 series</h6>
                                </button>
                            </div>
                            <div class="col-lg-3 col-md-6 mb-0">
                                <button class="btn btn-dark " name="iphone7" value="IPHONE7">
                                    <img class=" py-4" src="https://img.icons8.com/color/192/000000/iphone-x.png" />
                                    <h6>Iphone 7 series</h6>
                                </button>
                            </div>
                        </form>
                    <?php } else if ($budget >= 6500000) { ?>
                        <form action="" method="post" class="row justify-content-center py-0 px-0 my-5">
                            <div class="col-lg-3 col-md-6 mb-0">
                                <button class="btn btn-dark " name="iphone11" disabled>
                                    <img class=" py-4" src="https://img.icons8.com/color/192/000000/iphone-x.png" />
                                    <h6>Iphone 11 series</h6>
                                </button>
                                <p class=" font-italic">
                                    *Budget kamu kurang untuk memilih ini.
                                </p>
                            </div>
                            <div class="col-lg-3 col-md-6 mb-0">
                                <button class="btn btn-dark " name="iphonex" disabled>
                                    <img class=" py-4" src="https://img.icons8.com/color/192/000000/iphone-x.png" />
                                    <h6>Iphone X series</h6>
                                </button>
                                <p class=" font-italic">
                                    *Budget kamu kurang untuk memilih ini.
                                </p>
                            </div>
                            <div class="col-lg-3 col-md-6 mb-0">
                                <button class="btn btn-dark " name="iphone8" disabled>
                                    <img class=" py-4" src="https://img.icons8.com/color/192/000000/iphone-x.png" />
                                    <h6>Iphone 8 series</h6>
                                </button>
                                <p class=" font-italic">
                                    *Budget kamu kurang untuk memilih ini.
                                </p>
                            </div>
                            <div class="col-lg-3 col-md-6 mb-0">
                                <button class="btn btn-dark " name="iphone7" value="IPHONE7">
                                    <img class=" py-4" src="https://img.icons8.com/color/192/000000/iphone-x.png" />
                                    <h6>Iphone 7 series</h6>
                                </button>
                            </div>
                        </form>
                    <?php } ?>
                <?php } ?>

                <p class=" font-italic py-0">
                    *Pilih salah satu
                </p>
                <div class="py-0 my-0">
                    <a href="step2.php" class="btn btn-secondary btn-lg">Kembali</a>
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