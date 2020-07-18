<?php
session_start();

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
}

require "function.php";

$id = $_GET["id"];

if (hapusM($id) > 0) {
    echo "
            <script>
                alert('Data BERHASIL Dihapus!');
                document.location.href = 'brand.php';
            </script>
        ";
} else {
    echo "
            <script>
                alert('Data GAGAL Dihapus!');
                document.location.href = 'brand.php';
            </script>
        ";
}
