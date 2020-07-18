<?php

session_start();

if (isset($_POST["submit"])) {
    $_SESSION["next"] = true;
    $_SESSION['budget'] = $_POST["budget"];
    header("Location: step2.php");
}

require "function.php";

$produk = rescer("SELECT * FROM produk");

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
    <div class="container py-5">
        <!-- Jumbotron Header -->
        <div class="container py-0">
            <!-- STEP 1 -->
            <div class="jumbotron my-5 text-center py-5">
                <h5 class=" display-4 py-3">Budget maksimal saya:</h5>
                <!-- FORM -->
                <form action="" method="post" class="py-4">
                    <div class="form-group">
                        <input class="form-control-lg w-50 text-center" type="text" name="budget" required>
                        <small class="form-text text-muted">Masukkan budget maksimal yang anda miliki.</small>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary" name="submit">Lanjut</button>
                </form>
            </div>
        </div>
    </div>
    <!-- /.container -->

    <!-- Footer -->
    <footer class="py-3 fixed-bottom">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; Your Website 2020</p>
        </div>
        <!-- /.container -->
    </footer>









    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- JavaScript -->
    <script type="text/javascript">
        var rupiah = document.getElementById('rupiah');
        rupiah.addEventListener('keyup', function(e) {
            // tambahkan 'Rp.' pada saat form di ketik
            // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
            rupiah.value = formatRupiah(this.value);
        });

        /* Fungsi formatRupiah */
        function formatRupiah(angka, prefix) {
            var number_string = angka.replace(/[^,\d]/g, '').toString(),
                split = number_string.split(','),
                sisa = split[0].length % 3,
                rupiah = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            // tambahkan titik jika yang di input sudah menjadi angka ribuan
            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }

            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
            return prefix == undefined ? rupiah : (rupiah ? 'Rp ' + rupiah : '');
        }
    </script>

</body>

</html>