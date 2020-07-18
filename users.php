<?php
session_start();

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
}

require "function.php";
$users = rescer("SELECT * FROM users ORDER BY username ASC");
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
                        <a class="nav-link" href="produk.php">
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
                    <h1 class="mt-4">Daftar Users</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Users</li>
                    </ol>
                    <div class="card mb-4">
                        <div class="card-header text-center align-text-middle">
                            <div class="row align-middle">
                                <!-- tambah -->
                                <div class="col-sm-12 text-left">
                                    <a class="btn btn-primary" href="users-tambah.php">Tambah Data
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered text-center align-text-middle" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th class="align-middle">Username</th>
                                            <th class="align-middle">Password</th>
                                            <th class="align-middle">Email</th>
                                            <th class="align-middle">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th class="align-middle">Username</th>
                                            <th class="align-middle">Password</th>
                                            <th class="align-middle">Email</th>
                                            <th class="align-middle">Aksi</th>
                                        </tr>
                                    </tfoot>

                                    <tbody>
                                        <?php foreach ($users as $user) : ?>
                                            <tr>
                                                <td class="align-middle"><?php echo $user["username"]; ?></td>
                                                <td class="align-middle"><?php echo $user["password"]; ?></td>
                                                <td class="align-middle"><?php echo $user["email"]; ?></td>
                                                <td class="align-middle">
                                                    <a href="users-ubah.php?id=<?php echo $user["id"]; ?>"><img src="https://img.icons8.com/color/24/000000/edit-file.png" /></a> |
                                                    <a href="users-hapus.php?id=<?php echo $user["id"]; ?>" onclick="return confirm('Apakah Anda Yakin?');"><img src="https://img.icons8.com/color/24/000000/delete-forever.png" /></a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
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
    <script src="admin/dist/assets/demo/datatables-demo.js"></script>

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