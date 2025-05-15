<?php
include "koneksi.php";

function tambahBarang($data)
{
    global $koneksi;

    $kdbarang = htmlspecialchars($data["kdbarang"]);
    $nmbarang = htmlspecialchars($data["nmbarang"]);
    $stok = (int) $data["stok"];
    $harga = (int) $data["harga"];

    $query = "INSERT INTO tbbarang (kodebarang, namabarang, stok, harga) VALUES ('$kdbarang', '$nmbarang', $stok, $harga)";
    return mysqli_query($koneksi, $query);
}

// Cek jika tombol tambah ditekan
if (isset($_POST["tambahBarang"])) {
    if (tambahBarang($_POST)) {
        // Redirect atau tampilkan alert
        echo "<script>
            alert('Data berhasil ditambahkan!');
            window.location.href = 'index.php'; // arahkan ke halaman utama
        </script>";
    } else {
        echo "<script>
            alert('Data gagal ditambahkan!');
        </script>";
    }
}


function hapusBarang($idbarang) {
    global $koneksi;

    $idbarang = $_GET['idbarang'];
    $sql = "DELETE FROM tbbarang WHERE idbarang = '$idbarang'";
    // Karena mysqli_query didalam fungsi maka perlu pake return buat mengembalikan nilai
    return mysqli_query($koneksi,$sql);
}

if (isset($_GET["idbarang"])) {
    $id = $_GET["idbarang"];
    if (hapusBarang($id)) {
        // Redirect atau tampilkan alert
        echo "<script>
            alert('Data berhasil dihapus!');
            window.location.href = 'index.php'; 
        </script>";
    } else {
        echo "<script>
            alert('Data gagal dihapus!');
            window.location.href = 'index.php'; 
        </script>";
    }
}

function ubahBarang($data) {
    global $koneksi;

    $idbarang = $_POST['idbarang'];
    $kdbarang = htmlspecialchars($_POST["kdbarang"]);
    $nmbarang = htmlspecialchars($_POST["nmbarang"]);
    $stok = (int) $_POST["stok"];
    $harga = (int) $_POST["harga"];
    $sql = "UPDATE tbbarang SET kodebarang = '$kdbarang', namabarang = '$nmbarang', stok = '$stok', harga = '$harga' WHERE idbarang = '$idbarang'";

    return mysqli_query($koneksi,$sql);
}

if (isset($_POST["ubahBarang"])) {
    if (ubahBarang($_POST)) {
        // Redirect atau tampilkan alert
        echo "<script>
            alert('Data berhasil diedit!');
            window.location.href = 'index.php'; 
        </script>";
    } else {
        echo "<script>
            alert('Data gagal diedit!');
            window.location.href = 'index.php'; 
        </script>";
    }
}


function cariBarang($keyword = '') {
    global $koneksi;

    $keyword = mysqli_real_escape_string($koneksi,$keyword);

    if(!empty($keyword)) {
        $query = "SELECT * FROM tbbarang WHERE kodebarang LIKE '%$keyword%' OR namabarang LIKE '%$keyword%' OR stok LIKE '%$keyword%' OR harga LIKE '%$keyword%'";
    } else {
        $query = "SELECT * FROM tbbarang";
    }

    return mysqli_query($koneksi,$query);
}