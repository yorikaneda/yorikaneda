<?php
session_start();

if (isset($_SESSION["login"])) {
    header("Location: index.php");
}

require 'function.php';

if (isset($_POST["login"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $result = mysqli_query($connect, "SELECT * FROM users WHERE username = '$username'");
    // CEK USERNAME
    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        if ($row["username"] == 'admin' && password_verify($password, $row["password"])) {
            // BIKIN SESSION
            $_SESSION["login"] = true;
            $_SESSION['users'] = $row['username'];
            header("Location: users.php");
            exit;
        } else if (password_verify($password, $row["password"])) {
            $_SESSION["login"] = true;
            $_SESSION['users'] = $row['username'];
            header("Location: produk.php");
            exit;
        }
    } else {
        echo "
        <script>
            alert('Username atau Password Salah!');
            document.location.href = 'login.php';
        </script>
    ";
    }
    $error = true;
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
    <title>Login-Admin</title>
    <link href="admin/dist/css/styles.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous">
    </script>
</head>

<body class="bg-primary">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-4">Login</h3>
                                </div>
                                <div class="card-body">
                                    <form action="" method="post">
                                        <div class="form-group">
                                            <label class="small mb-1" for="inputUsername">Username</label>
                                            <input class="form-control py-4" id="inputUsername" type="text" placeholder="Enter Username" name="username" required />
                                        </div>
                                        <div class="form-group">
                                            <label class="small mb-1" for="inputPassword">Password</label>
                                            <input class="form-control py-4" id="inputPassword" type="password" placeholder="Enter password" name="password" required />
                                        </div>
                                        <div class="form-group d-flex align-items-center justify-content-between mt-0 mb-0 py-1">
                                            <button class="btn btn-primary btn-block" name="login">Login</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <div id="layoutAuthentication_footer">
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
</body>

</html>