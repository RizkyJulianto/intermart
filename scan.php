<?php include 'includes/sidebar.php'; ?>

<div class="w-screen h-screen flex flex-col items-center justify-center bg-gray-100">

    <!-- Kamera 3/4 Ukuran Layar -->
    <div class="w-[60vw] h-[50vw] bg-white shadow-2xl rounded-xl p-4">
        <div id="reader" class="w-full h-full rounded-lg"></div>
    </div>
</div>

<!-- QR Scanner Script -->
<script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>
<script>
function onScanSuccess(decodedText, decodedResult) {
    window.location.href = "proses_masuk.php?kode=" + encodeURIComponent(decodedText);
}

const html5QrCode = new Html5Qrcode("reader");
const config = {
    fps: 10,
    qrbox: { width: 500, height: 500 } // tetap kotak, tapi di tengah kamera
};

html5QrCode.start({ facingMode: "environment" }, config, onScanSuccess)
    .catch(err => console.error("Camera error", err));
</script>
