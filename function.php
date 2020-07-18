<?php
// koneksi ke Database
$connect = mysqli_connect("localhost", "root", "", "rescer");

// Function QUERY
function rescer($query)
{
    global $connect;
    $result = mysqli_query($connect, $query);
    $rows = [];
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }
    }
    return $rows;
}
// =========================================================================================== //
// Function Rupiah
function rupiah($angka)
{
    $hasil_rupiah = "Rp" . number_format($angka, 0, ',', '.');
    return $hasil_rupiah;
}






// =========================================================================================== //
// ========================================== PRODUK ========================================= //
// =========================================================================================== //
// Function Tambah PRODUK
function tambahP($data)
{
    global $connect;
    $name = htmlspecialchars($data["nama_produk"]);
    $brand = htmlspecialchars(strtoupper($data["nama_brand"]));
    $type = htmlspecialchars(strtoupper($data["tipe_produk"]));
    $os = htmlspecialchars(strtoupper($data["os_produk"]));
    $price = htmlspecialchars($data["harga_produk"]);
    $link = htmlspecialchars($data["link_beli"]);
    $spek = ($data["spek_produk"]);

    // Upload GAMBAR
    $image = uploadP();
    if (!$image) {
        return false;
    }

    // QUERY insert
    $query = "INSERT INTO produk
                VALUES
                ('', '$brand', '$name', '$price', '$type', '$os', '$image', '$link', '$spek')";

    mysqli_query($connect, $query);
    return mysqli_affected_rows($connect);
}
// =========================================================================================== //
// Function Upload GAMBAR Produk
function uploadP()
{

    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    // Cek apakah ada gambar yang di upload
    if ($error === 4) {
        echo "<script>
            alert('Pilih Gambar Terlebih Dahulu!');
        </script>";
        return false;
    }

    // Cek apakah yang diupload adalah gambar
    $ekstensiValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if (!in_array($ekstensiGambar, $ekstensiValid)) {
        echo "<script>
            alert('Yang DiUpload bukan Gambar!');
        </script>";
        return false;
    }

    // CEK ukuran gambar
    if ($ukuranFile > 10000000) {
        echo "<script>
            alert('Ukuran Gambar terlalu besar!');
        </script>";
        return false;
    }

    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;

    move_uploaded_file($tmpName, 'images/Card/' . $namaFileBaru);

    return $namaFileBaru;
}
// =========================================================================================== //
// Function ubah PRODUK
function ubahP($data)
{
    global $connect;
    $id = $data["id"];
    $brand = htmlspecialchars(strtoupper($data["nama_brand"]));
    $name = htmlspecialchars($data["nama_produk"]);
    $price = htmlspecialchars($data["harga_produk"]);
    $type = htmlspecialchars(strtoupper($data["tipe_produk"]));
    $os = htmlspecialchars(strtoupper($data["os_produk"]));
    $link = htmlspecialchars($data["link_beli"]);
    $spek = htmlspecialchars($data["spek_produk"]);
    $Oldimage = $data["gambarLama"];

    if ($_FILES['gambar']['error'] === 4) {
        $image = $Oldimage;
    } else {
        $image = uploadP();
        unlink("images/Card/" . $Oldimage);
    }

    // QUERY insert
    $query = "UPDATE produk SET
                        nama_brand = '$brand',
                        nama_produk = '$name',
                        harga_produk = $price,
                        tipe_produk = '$type',
                        os_produk = '$os',
                        link_pembelian = '$link',
                        spek_produk = '$spek',
                        gambar = '$image'
                    WHERE id = $id    
                ";

    mysqli_query($connect, $query);

    return mysqli_affected_rows($connect);
}
// =========================================================================================== //
// Function Hapus produk
function hapusP($id)
{
    global $connect;
    $kode = rescer("SELECT * FROM produk WHERE id = $id");
    foreach ($kode as $gambar) {
        unlink("images/Card/" . $gambar["gambar"]);
    }
    mysqli_query($connect, "DELETE FROM produk WHERE id = $id");
    return mysqli_affected_rows($connect);
}
// =========================================================================================== //
// =========================================================================================== //
// =========================================================================================== //






// =========================================================================================== //
// ========================================== BRAND ========================================= //
// =========================================================================================== //

// Function Tambah BRAND
function tambahM($data)
{
    global $connect;
    $brand = htmlspecialchars(strtoupper($data["nama_brand"]));

    // Upload GAMBAR
    $image = uploadM();
    if (!$image) {
        return false;
    }

    // QUERY insert
    $query = "INSERT INTO brand
                VALUES
                ('', '$brand', '$image')";

    mysqli_query($connect, $query);

    return mysqli_affected_rows($connect);
}
// =========================================================================================== //
// Function Upload GAMBAR Merek
function uploadM()
{

    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    // Cek apakah ada gambar yang di upload
    if ($error === 4) {
        echo "<script>
            alert('Pilih Gambar Terlebih Dahulu!');
        </script>";
        return false;
    }

    // Cek apakah yang diupload adalah gambar
    $ekstensiValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if (!in_array($ekstensiGambar, $ekstensiValid)) {
        echo "<script>
            alert('Yang DiUpload bukan Gambar!');
        </script>";
        return false;
    }

    // CEK ukuran gambar
    if ($ukuranFile > 10000000) {
        echo "<script>
            alert('Ukuran Gambar terlalu besar!');
        </script>";
        return false;
    }

    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;

    move_uploaded_file($tmpName, 'images/Brand/' . $namaFileBaru);

    return $namaFileBaru;
}
// =========================================================================================== //
// Function ubah BRAND
function ubahM($data)
{
    global $connect;
    $id = $data["id"];
    $brand = htmlspecialchars($data["nama_brand"]);
    $Oldimage = $data["gambarLama"];

    if ($_FILES['gambar']['error'] === 4) {
        $image = $Oldimage;
    } else {
        $image = uploadM();
        unlink("images/Brand/" . $Oldimage);
    }

    // QUERY insert
    $query = "UPDATE brand SET
                    nama_brand = '$brand',
                    gambar = '$image'
                WHERE id = $id
            ";

    mysqli_query($connect, $query);

    return mysqli_affected_rows($connect);
}
// =========================================================================================== //
// Function Hapus brand
function hapusM($id)
{
    global $connect;
    $kode = rescer("SELECT * FROM brand WHERE id = $id");
    foreach ($kode as $gambar) {
        unlink("images/Brand/" . $gambar["gambar"]);
    }
    mysqli_query($connect, "DELETE FROM brand WHERE id = $id");

    return mysqli_affected_rows($connect);
}
// =========================================================================================== //
// =========================================================================================== //
// =========================================================================================== //







// =========================================================================================== //
// ========================================== AKUN ========================================= //
// =========================================================================================== //

// FUNCTION REGISTER
function register($data)
{
    global $connect;

    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($connect, $data["password"]);
    $password2 = mysqli_real_escape_string($connect, $data["password2"]);
    $email = strtolower(stripslashes($data["email"]));

    // CEK USERNAME YANG SUDAH ADA
    $result = mysqli_query($connect, "SELECT username FROM users WHERE username = '$username'");
    if (mysqli_fetch_assoc($result)) {
        echo "<script>
                alert('Maaf Username Sudah Ada!');
        </script>";
        return false;
    }

    // KONFIRMASI PASSWORD
    if ($password !== $password2) {
        echo "<script>
                alert('Password tidak sesuai!');
        </script>";
        return false;
    }

    // ENKRIPSI PASSWORD
    $password = password_hash($password, PASSWORD_DEFAULT);

    // TAMBAH DATA KE DATABASE
    mysqli_query($connect, "INSERT INTO users VALUES('', '$username', '$password', '$email')");

    return mysqli_affected_rows($connect);
}

// Function Hapus AKUN
function hapusA($id)
{
    global $connect;
    mysqli_query($connect, "DELETE FROM users WHERE id = $id");

    return mysqli_affected_rows($connect);
}

// Function ubah AKUN
function ubahA($data)
{
    global $connect;
    $id = $data["id"];
    $username = htmlspecialchars($data["username"]);
    $password = htmlspecialchars($data["password"]);
    $password2 = htmlspecialchars($data["password2"]);
    $email = htmlspecialchars($data["email"]);

    // KONFIRMASI PASSWORD
    if ($password !== $password2) {
        echo "<script>
                alert('Password tidak sesuai!');
        </script>";
        return false;
    }

    // ENKRIPSI PASSWORD
    $password = password_hash($password, PASSWORD_DEFAULT);

    // QUERY insert
    $query = "UPDATE users SET
                    username = '$username',
                    password = '$password',
                    email = '$email'
                WHERE id = $id
            ";

    mysqli_query($connect, $query);

    return mysqli_affected_rows($connect);
}

// // Function CARI
// function cari($keyword)
// {
//     $query = "SELECT * FROM produk WHERE nama like '%" . $keyword . "%'";

//     return rescer($query);
// }
