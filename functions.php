<?php
include "koneksi.php";
include_once 'libs/phpqrcode/qrlib.php';
function tambahBarang($data)
{
    global $koneksi;


    $kdbarang = htmlspecialchars($data["kdbarang"]);
    $nmbarang = htmlspecialchars($data["nmbarang"]);
    $stok = (int) $data["stok"];
    $harga = (int) $data["harga"];

    if ($kdbarang == "" || $nmbarang == "" || $stok == "" || $harga == "") {
        header('Location: index.php?status=tambah-gagal&pesan=' . urlencode('Semua kolom harus diisi!'));
        exit;
    }

    // Generate QR Code
    $qr_folder = 'assets/qrcodes/';
    if (!file_exists($qr_folder)) {
        mkdir($qr_folder, 0755, true);
    }
    $qr_file = $qr_folder . $kdbarang . '.png';
    QRcode::png($kdbarang, $qr_file, QR_ECLEVEL_H, 10);

    // Simpan nama file QR ke database
    $qr_filename = basename($qr_file); // hanya BRG001.png

    $query = "INSERT INTO tbbarang (kodebarang, namabarang, stok, harga, qrcode)
              VALUES ('$kdbarang', '$nmbarang', $stok, $harga, '$qr_filename')";
    $result = mysqli_query($koneksi, $query);

    if ($result) {
        header('Location: index.php?status=tambah-sukses');
        exit();
    } else {
        header('Location: index.php?status=tambah-gagal');
        $error = "Gagal Menambahkan Data";
    }
}

// Cek jika tombol tambah ditekan
if (isset($_POST["tambahBarang"])) {
    tambahBarang($_POST);
}

function hapusBarang($idbarang)
{
    global $koneksi;

    $idbarang = $_GET['idbarang'];
    $sql = "DELETE FROM tbbarang WHERE idbarang = '$idbarang'";
    // Karena mysqli_query didalam fungsi maka perlu pake return buat mengembalikan nilai
    return mysqli_query($koneksi, $sql);
}

if (isset($_GET["idbarang"])) {
    $id = $_GET["idbarang"];
    if (hapusBarang($id)) {
        header('Location: index.php?status=hapus-sukses');
        exit;
    } else {
        header('Location: index.php?status=hapus-gagal');
        exit;
    }
}

function ubahBarang($data)
{
    global $koneksi;

    $idbarang = $_POST['idbarang'];
    $kdbarang = htmlspecialchars($_POST["kdbarang"]);
    $kode_lama = htmlspecialchars($_POST["kode_lama"]);
    $nmbarang = htmlspecialchars($_POST["nmbarang"]);
    $stok = (int) $_POST["stok"];
    $harga = (int) $_POST["harga"];
    $qrcode = $_POST["qrcode"];

    if ($kdbarang == "" || $nmbarang == "" || $stok == "" || $harga == "") {
        header('Location: index.php?status=ubah-gagal&pesan=' . urlencode('Semua kolom harus diisi!'));
        exit;
    }

    if ($kode_lama !== $kdbarang) {
        $folder = "assets/qrcodes/";
        $file_lama = $folder . $kode_lama . ".png";
        $file_baru = $folder . $kdbarang . ".png";

        // Hapus QR lama jika ada
        if (file_exists($file_lama)) {
            unlink($file_lama);
        }

        // Generate QR baru
        QRcode::png($kdbarang, $file_baru, QR_ECLEVEL_H, 10);
        $qr_filename = basename($file_baru); // hanya BRG001.png

        $sql = "UPDATE tbbarang SET kodebarang='$kdbarang', namabarang='$nmbarang', stok='$stok', harga = '$harga', qrcode='$qr_filename' WHERE idbarang = '$idbarang'";
    }


    $result =  mysqli_query($koneksi, $sql);
    if ($result) {
        header('Location: index.php?status=ubah-sukses');
        exit();
    } else {
        header('Location: index.php?status=ubah-gagal');
        exit();
    }
}

if (isset($_POST["ubahBarang"])) {
    ubahBarang($_POST);
}


function cariBarang($keyword = '')
{
    global $koneksi;

    $keyword = mysqli_real_escape_string($koneksi, $keyword);

    if (!empty($keyword)) {
        $query = "SELECT * FROM tbbarang WHERE kodebarang LIKE '%$keyword%' OR namabarang LIKE '%$keyword%' OR stok LIKE '%$keyword%' OR harga LIKE '%$keyword%'";
    } else {
        $query = "SELECT * FROM tbbarang";
    }

    $result =  mysqli_query($koneksi, $query);
    if (mysqli_num_rows($result) <= 0) {
        header('Location: index.php?status=tidak-ada');
        exit;
    }

    return $result;
}



function hapusHistori($idhistory)
{
    global $koneksi;

    $idhistory = $_GET['idhistory'];
    $sql = "DELETE FROM history WHERE idhistory = '$idhistory'";
    // Karena mysqli_query didalam fungsi maka perlu pake return buat mengembalikan nilai
    return mysqli_query($koneksi, $sql);
}

if (isset($_GET["idhistory"])) {
    $id = $_GET["idhistory"];
    if (hapusHistori($id)) {
        header('Location: histori.php?status=hapus-sukses');
        exit();
    } else {
        header('Location: histori.php?status=hapus-gagal');
        exit();
    }
}


// Proses login
function login($username, $password)
{
    session_start();
    global $koneksi;
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $query = "SELECT * FROM pengguna WHERE username='$username' AND katasandi=md5('$password')";
        $result = mysqli_query($koneksi, $query);

        if (mysqli_num_rows($result) > 0) {
            $_SESSION['username'] = $username;
            header("Location: ../index.php?status=login-sukses");
            exit();
        } else {
            header("Location: login.php?status=login-gagal");
            exit();
        }
    }
}

function Register($username, $password, $password_confirm)
{
    global $koneksi;

    $error = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = trim($_POST['username']);
        $password = $_POST['password'];
        $password_confirm = $_POST['password_confirm'];

        // Cek password dan ulangi password
        if ($password !== $password_confirm) {
            $error = "Password dan Ulangi Password tidak cocok!";
        } else {
            // Cek username sudah ada atau belum
            $cekUser = mysqli_query($koneksi, "SELECT * FROM pengguna WHERE username='$username'");
            if (mysqli_num_rows($cekUser) > 0) {
                $error = "Username sudah digunakan, silakan pilih yang lain.";
            } else {

                $query = "INSERT INTO pengguna (username, katasandi) VALUES ('$username', md5('$password'))";
                if (mysqli_query($koneksi, $query)) {
                    $_SESSION['username'] = $username;
                    header("Location: login.php?status=register-sukses");
                    exit();
                } else {
                    $error = "Gagal membuat akun, coba lagi.";
                }
            }
        }
    }

    return $error;
}

if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $password_confirm = $_POST['password_confirm'];

    $error = Register($username, $password, $password_confirm);
}
