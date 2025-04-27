<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/style.css" />
    <title>Intermart</title>
  </head>
  <body>
    <section class="main-content flex gap-x-20">
    <!-- Sidebar -->
    <div class="sidebar h-screen w-[250px] bg-white border-gray-100 border-r-2 py-4 px-6">
      <div class="logo flex gap-x-2 items-center">
        <div class="img-logo">
          <div class="circle bg-primary rounded-full h-[50px] w-[50px]"></div>
        </div>
        <h2 class="font-bold text-2xl drop-shadow-sm">Inter<span class="text-primary">mart </span></h2>
      </div>

      <!-- Border bottom -->
      <div class="h-[2px] w-full bg-gray-100 mt-4"></div>

      <div class="sidebar-links flex flex-col gap-y-10">
        <ul class="flex flex-col gap-y-4 mt-12">
          <li class="li-sidebar">
          <i class="ph ph-shopping-cart-simple text-2xl opacity-70"></i>
            <a href="" class="anchor-sidebar">Data Barang</a>
          </li>
          <li class="li-sidebar">
          <i class="ph ph-scan text-2xl opacity-70"></i>
            <a href="" class="anchor-sidebar">Scan Masuk</a>
          </li>
          <li class="li-sidebar">
          <i class="ph ph-scan text-2xl opacity-70"></i>
            <a href="" class="anchor-sidebar">Scan Keluar</a>
          </li>
          <li class="li-sidebar">
          <i class="ph ph-clock-counter-clockwise text-2xl opacity-70"></i>
            <a href="" class="anchor-sidebar">Histori</a>
          </li>
        </ul>
        <div class="btn-logout">
          <a href="" class="font-semibold bg-primary inline-block w-full text-center text-white py-2 px-3 rounded-md">Logout</a>
        </div>
      </div>
    </div>
    <!-- Sidebar End -->


    <!-- Table Content -->
     <div class="table-content-container py-14 pl-6 pr-20 w-full flex flex-col gap-y-12">
        <div class="title text-center">
            <h1 class="text-4xl font-bold drop-shadow-sm">Data<span class="text-primary">Barang</span></h1>
        </div>

        <div class="button-top w-full flex justify-between ">
            <div class="btn-add ">
                <a href="" class="font-semibold bg-primary inline-block  text-center text-white py-2 px-3 rounded-md">Tambah</a>
            </div>
            <div class="btn-cetak">
                <a href="" class="font-semibold bg-primary inline-block  text-center text-white py-2 px-3 rounded-md">Cetak</a>
            </div>
        </div>
        
        <div class="table-content">
          <table class="w-full text-left font-semibold text-lg ">
            <tr>
              <th class="table-heading ">Id transaksi</th>
              <th class="table-heading">Kode Barang</th>
              <th class="table-heading">Nama Barang</th>
              <th class="table-heading">Stok</th>
              <th class="table-heading text-right">Harga</th>
            </tr> 
            <tr>
              <td class="table-data">1</td>
              <td class="table-data">1001</td>
              <td class="table-data">Telur</td>
              <td class="table-data">12</td>
              <td class="table-data text-right">5000</td>
            </tr> 
            <tr>
              <td class="table-data">2</td>
              <td class="table-data">1002</td>
              <td class="table-data">Beras</td>
              <td class="table-data">5</td>
              <td class="table-data text-right">10000</td>
            </tr> 
            <tr>
              <td class="table-data">3</td>
              <td class="table-data">1003</td>
              <td class="table-data">Snack</td>
              <td class="table-data">5</td>
              <td class="table-data text-right">2000</td>
            </tr> 
            
          </table>
        </div>

     </div>

    </section>

    <!-- Icons -->
    <script src="https://unpkg.com/@phosphor-icons/web@2.1.1"></script>
  </body>
</html>
