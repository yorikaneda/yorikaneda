<!-- PHP Code -->
<?php
session_start();

require "function.php";
$name = $_GET["nama"];
$merek = $_GET["merek"];
$product = rescer("SELECT * FROM produk WHERE nama_produk = '$name'");

if ($merek) {
    $brand = rescer("SELECT * FROM produk WHERE nama_brand = '$merek' ORDER BY harga_produk DESC");
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

        <div class=" jumbotron my-5 py-0 pt-0 w-100">
            <!-- Portfolio Item Row -->
            <div class="row my-0 py-5">
                <!-- IMAGE -->
                <div class="col-md-6 align-self-center text-center">
                    <?php foreach ($product as $produk) : ?>
                        <img class="py-0 my-0 h-75 w-75" src="images/Card/<?php echo $produk["gambar"]; ?>">
                    <?php endforeach; ?>
                </div>

                <div class="col-md-6 align-self-center text-left">
                    <!-- Portfolio Item Heading -->
                    <?php foreach ($product as $produk) { ?>
                        <h2 class="my-0 mb-4 h1">
                            <?= $produk['nama_brand']; ?> <?= $produk['nama_produk']; ?>
                        </h2>
                    <?php } ?>
                    <h4 class="my-2">Harga</h4>
                    <?php foreach ($product as $produk) : ?>
                        <h1 class=" h1 mb-4">
                            <?php $rupiah = $produk["harga_produk"]; ?>
                            <?php echo rupiah($rupiah); ?> </h1>
                        <h4 class="mt-4">Detail</h4>
                        <a href="<?php echo $produk["spek_produk"]; ?>" class="btn btn-secondary w-50 my-2">OFFICIAL WEBSITE</a>
                        <a href="<?php echo $produk["link_pembelian"]; ?>" class="btn btn-light w-50 my-2">OFFICIAL STORE</a>
                    <?php endforeach; ?>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.row -->

        <!-- Related Projects Row -->
        <h3 style="color: black;" class="my-4">Produk Terkait</h3>
        <div class="row text-center">
            <?php foreach ($brand as $merek) : ?>
                <div class="col-lg-3 col-md-6 mb-5">
                    <div class="card h-auto">
                        <div style="color: black;" class="card-header h5">
                            <?php echo $merek["nama_produk"]; ?>
                        </div>
                        <img class="card-img-top img-fluid" src="images/Card/<?php echo $merek["gambar"]; ?>">
                        <div style="color: #1aa3ff;" class="card-footer py-3 my-0 h5">
                            <?php $rupiah = $merek["harga_produk"]; ?>
                            <?php echo rupiah($rupiah); ?>
                        </div>
                        <div class="card-footer">
                            <a href="halaman-produk.php?nama=<?= $merek["nama_produk"]; ?>&merek=<?= $merek["nama_brand"]; ?>" class="btn btn-secondary">Lihat</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

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
            return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
        }
    </script>


</body>

</html>