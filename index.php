<?php
include "koneksi.php";
require "functions.php";
session_start();
if (!isset($_SESSION['username'])) {
  header("Location: auth/login.php?status=harus-login");
  exit();
}
$sql = "SELECT * FROM tbbarang";
$query = mysqli_query($koneksi, $sql);

if (isset($_GET['keyword'])) {
  $barang = cariBarang($_GET['keyword']);
} else {
  $barang = cariBarang(); // tampilkan semua data
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="css/style.css" />
  <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />

  <!-- Sweetalert -->
  <link rel="stylesheet" href="assets/sweetalert/sweetalert2.min.css">
  <title>Intermart</title>
</head>

<body>
  <?php include 'components/sidebar.php'; ?>
  <!-- Table Content -->
  <div class="table-content-container py-14 pl-6 pr-20 w-full flex flex-col gap-y-12 relative">

    <div class="title text-center">
      <h1 class="text-4xl font-bold drop-shadow-sm">Data<span class="text-primary">Barang</span></h1>
    </div>

    <div class="button-top w-full flex justify-between items-center">
      <!-- Modal toggle -->
      <button data-modal-target="modalTambah" data-modal-toggle="modalTambah" class="block text-white bg-primary  focus:ring-4 focus:outline-none cursor-pointer font-medium rounded-md text-sm px-5 py-2.5 text-center dark:bg-primary " type="button">
        Tambah
      </button>

      <!-- Searh Input -->
      <form action="index.php" method="get" class="flex items-center gap-x-3">
        <input type="text" class="rounded-md border border-gray-200 w-72 focus:ring-primary py-3" name="keyword" id="keyword" placeholder="Masukan Data yang ingin dicari..." value="<?= $_GET['keyword'] ?? '' ?>">
        <button class="btn-search bg-primary rounded-md px-4 py-2 text-white font-bold text-2xl cursor-pointer" type="submit"><i class="ph ph-magnifying-glass"></i></button>
      </form>

    </div>


    <!-- Modal Tambah Data -->
    <div id="modalTambah" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
      <div class="relative p-4 w-full max-w-lg max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow-sm dark:bg-white">
          <!-- Modal header -->
          <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-200 border-gray-200">
            <h3 class="text-3xl font-bold text-gray-900 dark:text-black">
              Tambah Data Barang
            </h3>
            <button type="button" class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-primary dark:hover:text-white" data-modal-hide="modalTambah">
              <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
              </svg>
              <span class="sr-only">Close modal</span>
            </button>
          </div>
          <!-- Modal body -->
          <div class="p-4 md:p-5">
            <form class="space-y-4" action="index.php" method="post" id="formTambah">
              <?php if (isset($_GET['status']) && $_GET['status'] === 'tambah-gagal') : ?>
                <div class="bg-red-200 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-4 mb-4" role="alert">
                  <strong class="font-bold">Error!</strong>
                  <span class="block sm:inline"><?= htmlspecialchars(urldecode($_GET['pesan'])) ?></span>
                </div>
              <?php endif; ?>
              <div class="form-group">
                <label for="kdbarang" class="block mb-2 text-md font-semibold text-gray-900 dark:text-black/70">Kode Barang</label>
                <input type="text" name="kdbarang" id="kdbarang" class="bg-gray-50 border border-gray-300 text-gray-900 text-lg rounded-md focus:ring-primary focus:border-primary block w-full p-3  dark:border-gray-200  dark:text-black/70" placeholder="Masukan Kode Barang" />
              </div>
              <div class="form-group">
                <label for="nmbarang" class="block mb-2 text-md font-semibold text-gray-900 dark:text-black/70">Nama Barang</label>
                <input type="text" name="nmbarang" id="nmbarang" class="bg-gray-50 border border-gray-300 text-gray-900 text-lg rounded-md focus:ring-primary focus:border-primary block w-full p-3  dark:border-gray-200  dark:text-black/70" placeholder="Masukan Nama Barang" />
              </div>
              <div class="form-group">
                <label for="stok" class="block mb-2 text-md font-semibold text-gray-900 dark:text-black/70">Stok</label>
                <input type="number" name="stok" id="stok" class="bg-gray-50 border border-gray-300 text-gray-900 text-lg rounded-md focus:ring-primary focus:border-primary block w-full p-3  dark:border-gray-200  dark:text-black/70" placeholder="Masukan Stok Barang" />
              </div>
              <div class="form-group">
                <label for="harga" class="block mb-2 text-md font-semibold text-gray-900 dark:text-black/70">Harga Barang</label>
                <input type="number" name="harga" id="harga" class="bg-gray-50 border border-gray-300 text-gray-900 text-lg rounded-md focus:ring-primary focus:border-primary block w-full p-3  dark:border-gray-200  dark:text-black/70" placeholder="Masukan Harga Barang" />
              </div>
              <div class="form-group">
                <input type="hidden" name="tambahBarang" value="true">
                <button type="submit" id="btn-tambah" class="w-full text-white bg-primary hover:bg-blue-800 focus:ring-4 focus:outline-none cursor-pointer font-medium rounded-md text-lg px-5 py-3 text-center dark:bg-primary dark:hover:bg-primary ">Tambah Barang</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>



    <div class="table-content">
      <table class="w-full text-left font-semibold text-lg ">
        <tr>
          <th class="table-heading ">Id Barang</th>
          <th class="table-heading">Kode Barang</th>
          <th class="table-heading">Nama Barang</th>
          <th class="table-heading">Stok</th>
          <th class="table-heading ">Harga</th>
          <th class="table-heading ">BarCode</th>
          <th class="table-heading">Aksi</th>
        </tr>
        <?php
        while ($data = mysqli_fetch_assoc($barang)) { ?>
          <tr>
            <td class="table-data"><?= $data['idbarang']; ?></td>
            <td class="table-data"><?= $data['kodebarang']; ?></td>
            <td class="table-data"><?= $data['namabarang']; ?></td>
            <td class="table-data"><?= $data['stok']; ?></td>
            <td class="table-data"><?= $data['harga']; ?></td>
            <td class="table-data"><img src="assets/qrcodes/<?= $data['qrcode']; ?>" class="h-[70px]"></td>
            <td class="table-data">
              <div class="flex items-center justify-center gap-x-2">
                <button class="text-[28px] cursor-pointer" data-modal-target="editbarang<?= $data['idbarang']; ?>" data-modal-toggle="editbarang<?= $data['idbarang']; ?>"><i class="ph ph-note-pencil hover:text-primary transition-all duration-300"></i></button>
                <div class="line h-[20px] w-[2px] bg-black opacity-70 "></div>
                <a href="functions.php?idbarang=<?= $data['idbarang'] ?>" class="text-[28px] btn-hapus"><i class="ph ph-trash hover:text-red-600 transition-all duration-300"></i></a>
              </div>
            </td>
          </tr>

          <!-- Modal Edit Data -->
          <div id="editbarang<?= $data['idbarang']; ?>" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-lg max-h-full">
              <!-- Modal content -->
              <div class="relative bg-white rounded-lg shadow-sm dark:bg-white">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-200 border-gray-200">
                  <h3 class="text-3xl font-bold text-gray-900 dark:text-black">
                    Ubah Data Barang
                  </h3>
                  <button type="button" class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-primary dark:hover:text-white" data-modal-hide="editbarang<?= $data['idbarang']; ?>">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                  </button>
                </div>
                <!-- Modal body -->
                <div class="p-4 md:p-5">
                  <form class="space-y-4" action="" method="post" id="formUbah">
                    <input type="hidden" name="idbarang" value="<?= $data['idbarang'] ?>">
                    <input type="hidden" name="kode_lama" value="<?= $data['kodebarang'] ?>">
                    <?php if (isset($_GET['status']) && $_GET['status'] === 'ubah-gagal') : ?>
                      <div class="bg-red-200 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-4 mb-4" role="alert">
                        <strong class="font-bold">Error!</strong>
                        <span class="block sm:inline"><?= htmlspecialchars(urldecode($_GET['pesan'])) ?></span>
                      </div>
                    <?php endif; ?>
                    <div class="form-group">
                      <label for="kdbarang" class="block mb-2 text-md font-semibold text-gray-900 dark:text-black/70">Kode Barang</label>
                      <input type="text" name="kdbarang" id="kdbarang" class="bg-gray-50 border border-gray-300 text-gray-900 text-lg rounded-md focus:ring-primary focus:border-primary block w-full p-3  dark:border-gray-200  dark:text-black/70" placeholder="Masukan Kode Barang" value="<?= $data['kodebarang'] ?>" />
                    </div>
                    <div class="form-group mt-3">
                      <label for="nmbarang" class="block mb-2 text-md font-semibold text-gray-900 dark:text-black/70">Nama Barang</label>
                      <input type="text" name="nmbarang" id="nmbarang" class="bg-gray-50 border border-gray-300 text-gray-900 text-lg rounded-md focus:ring-primary focus:border-primary block w-full p-3  dark:border-gray-200  dark:text-black/70" placeholder="Masukan Nama Barang" value="<?= $data['namabarang'] ?>" />
                    </div>
                    <div class="form-group mt-3">
                      <label for="stok" class="block mb-2 text-md font-semibold text-gray-900 dark:text-black/70">Stok</label>
                      <input type="number" name="stok" id="stok" class="bg-gray-50 border border-gray-300 text-gray-900 text-lg rounded-md focus:ring-primary focus:border-primary block w-full p-3  dark:border-gray-200  dark:text-black/70" placeholder="Masukan Stok Barang" value="<?= $data['stok'] ?>" />
                    </div>
                    <div class="form-group mt-3">
                      <label for="harga" class="block mb-2 text-md font-semibold text-gray-900 dark:text-black/70">Harga Barang</label>
                      <input type="number" name="harga" id="harga" class="bg-gray-50 border border-gray-300 text-gray-900 text-lg rounded-md focus:ring-primary focus:border-primary block w-full p-3  dark:border-gray-200  dark:text-black/70" placeholder="Masukan Harga Barang" value="<?= $data['harga'] ?>" />
                    </div>
                    <div class="form-group">
                      <input type="hidden" name="ubahBarang" value="true">
                      <button type="submit" class="w-full text-white bg-primary hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-md text-lg px-5 py-3 text-center dark:bg-primary dark:hover:bg-primary dark:focus:ring-blue-800 mt-3">Ubah Barang</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>

        <?php } ?>

      </table>
    </div>

  </div>



  <script src="js/main.js"></script>

  <script>
    const searchInput = document.querySelector('input[name="keyword"]');

    searchInput.addEventListener('input', function() {
      if (this.value === '') {
        this.form.submit(); // 
      }
    });
  </script>

  <!-- Sweetalert -->
  <script src="assets/sweetalert/sweetalert2.min.js"></script>
  <!-- Icons -->
  <script src="https://unpkg.com/@phosphor-icons/web@2.1.1"></script>
  <!-- Flowbite -->
  <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
</body>

</html>