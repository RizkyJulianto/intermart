<?php
include 'components/sidebar.php';
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $kode = $_POST['kodebarang'];
    $mode = $_GET['mode']; // 'masuk' atau 'keluar'

    // Ambil data barang
    $cek = mysqli_query($koneksi, "SELECT * FROM tbbarang WHERE kodebarang = '$kode'");
    if (mysqli_num_rows($cek) > 0) {
        $barang = mysqli_fetch_assoc($cek);
        $stok = $barang['stok'];

        if ($mode == 'masuk') {
            $stok_baru = $stok + 1;
        } elseif ($mode == 'keluar') {
            $stok_baru = max(0, $stok - 1); // jangan sampai negatif
        }

        // Update stok
        $result = mysqli_query($koneksi, "UPDATE tbbarang SET stok = $stok_baru WHERE kodebarang = '$kode'");
        if ($result) {
            header("Location: scan.php?mode=$mode&status=scan-sukses");
        } else {
            header("Location: scan.php?mode=$mode&status=scan-gagal");
        }
    } else {
        header("Location: scan.php?mode=$mode&&status=kode-tidak-ditemukan");
    }

    exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Sweetalert -->
    <link rel="stylesheet" href="assets/sweetalert/sweetalert2.min.css">
    <title>Halaman Scan</title>
</head>

<body>
    <div class="w-screen h-screen flex flex-col items-center justify-center bg-gray-100">

        <!-- Kamera 3/4 Ukuran Layar -->
        <div class="w-[60vw] h-[50vw] bg-white shadow-2xl rounded-xl p-4">
            <div id="reader" class="w-full h-full rounded-lg"></div>
        </div>

        <h2>Scan QR Barang - <?php echo strtoupper($_GET['mode']); ?></h2>

        <form method="post" action="scan.php?mode=<?php echo $_GET['mode']; ?>">
            <input type="hidden" name="kodebarang" id="kodebarang">
            <button type="submit" style="display:none;">Proses</button>
        </form>

    </div>

    <script src="js/main.js"></script>
    <!-- Sweetalert -->
    <script src="assets/sweetalert/sweetalert2.min.js"></script>
    <!-- QR Scanner Script -->
    <script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>
    <script>
        function onScanSuccess(decodedText, decodedResult) {
            document.getElementById("kodebarang").value = decodedText;
            document.forms[0].submit();
        }

        const html5QrCode = new Html5Qrcode("reader");
        const config = {
            fps: 10,
            qrbox: {
                width: 500,
                height: 500
            }
        };

        html5QrCode.start({
                facingMode: "environment"
            }, config, onScanSuccess)
            .catch(err => console.error("Camera error", err));
    </script>
</body>

</html>