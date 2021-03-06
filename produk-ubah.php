<?php
session_start();

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
}

require "function.php";

$id = $_GET["id"];
$produk = rescer("SELECT * FROM produk WHERE id = $id")[0];

if (isset($_POST["submit"])) {
    if (ubahP($_POST) > 0) {
        echo "
            <script>
                alert('Data BERHASIL diubah!');
                document.location.href = 'produk.php';
            </script>
        ";
    } else {
        echo "
        <script>
            alert('Data GAGAL diubah!');
            document.location.href = 'produk.php';
        </script>
    ";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>RESCER - SB Admin</title>
    <link href="admin/dist/css/styles.css?v=<?php echo time(); ?>" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css?v=<?php echo time(); ?>" rel="stylesheet" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous">
    </script>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <a class="navbar-brand" href="">RESCER</a>
        <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        <!-- Navbar-->
        <ul class="navbar-nav d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="logout.php">Logout</a>
                </div>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Menu Utama</div>
                        <a class="nav-link active" href="produk.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                            Produk
                        </a>
                        <a class="nav-link" href="brand.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                            Brand
                        </a>
                        <?php if ($_SESSION['users'] == 'admin') { ?>
                            <div class="sb-sidenav-menu-heading">Master</div>
                            <a class="nav-link" href="users.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                                Users
                            </a>
                        <?php } ?>
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Logged in as:</div>
                    <?php echo strtoupper($_SESSION["users"]); ?>
                </div>
            </nav>
        </div>
        <!-- dashboard -->
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid">
                    <h1 class="mt-4">Ubah Produk</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="produk.php">Produk</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Ubah Produk</li>
                    </ol>
                    <div class="card mb-4">
                        <div class="card-header text-left align-text-bottom font-weight-bolder">
                            Form Ubah Produk
                        </div>
                        <div class="card-body">
                            <!-- FORM -->
                            <form action="" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="id" value="<?php echo $produk["id"]; ?>">
                                <input type="hidden" name="gambarLama" value="<?php echo $produk["gambar"]; ?>">
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="small mb-1" for="inputproductname">Nama Produk</label>
                                            <input class="form-control py-4" id="inputproductname" type="text" placeholder="Enter product name" name="nama_produk" value="<?php echo $produk["nama_produk"]; ?>" required />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="small mb-1" for="inputbrandname">Nama Merek</label>
                                            <input class="form-control py-4" id="inputbrandname" type="text" placeholder="Enter brand name" name="nama_brand" value="<?php echo $produk["nama_brand"]; ?>" required />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="small mb-1" for="inputproducttype">Tipe Produk</label>
                                            <input class="form-control py-4" id="inputproducttype" type="text" placeholder="Enter product type" name="tipe_produk" value="<?php echo $produk["tipe_produk"]; ?>" required />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="small mb-1" for="inputproductos">OS (Operating System)</label>
                                            <input class="form-control py-4" id="inputproductos" type="text" placeholder="Enter OS name" name="os_produk" value="<?php echo $produk["os_produk"]; ?>" required />
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="small mb-1" for="inputproductprice">Harga</label>
                                    <input class="form-control py-4" id="inputproductprice" type="text" placeholder="Enter product price" name="harga_produk" value="<?php echo $produk["harga_produk"]; ?>" required />
                                </div>
                                <div class="form-group">
                                    <label class="small mb-1" for="inputpurchaselink">Link Pembelian</label>
                                    <input class="form-control py-4" id="inputpurchaselink" type="text" placeholder="Enter purchase link" name="link_beli" value="<?php echo $produk["link_pembelian"]; ?>" required />
                                </div>
                                <div class="form-group">
                                    <label class="small mb-1" for="inputpurchaselink">Spesifikasi Produk</label>
                                    <input class="form-control py-4" id="inputpurchaselink" type="text" placeholder="Enter Specification link" name="spek_produk" value="<?php echo $produk["spek_produk"]; ?>" required />
                                </div>
                                <img class="py-5" src="images/Card/<?php echo $produk["gambar"]; ?>" width="250">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                                    </div>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="inputGroupFile01" name="gambar">
                                        <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="form-group mt-4 mb-0"><button class="btn btn-primary btn-block" type="submit" name="submit">Ubah</button></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="form-group mt-4 mb-0"><a href="produk.php" class="btn btn-secondary btn-block">Kembali</a></div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Your Website 2020</div>
                        <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="admin/dist/js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="admin/dist/assets/demo/chart-area-demo.js"></script>
    <script src="admin/dist/assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/datatables-demo.js"></script>

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