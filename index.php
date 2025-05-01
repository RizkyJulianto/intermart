<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/style.css" />
    <title>Intermart</title>
  </head>
  <body>
  <?php include 'includes/sidebar.php'; ?>
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
