<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/style.css">
  <!-- Sweetalert -->
  <link rel="stylesheet" href="../assets/sweetalert/sweetalert2.min.css">
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
            <a href="index.php" class="anchor-sidebar">Data Barang</a>
          </li>
          <li class="li-sidebar">
            <i class="ph ph-scan text-2xl opacity-70"></i>
            <a href="scan.php?mode=masuk" class="anchor-sidebar">Scan Masuk</a>
          </li>
          <li class="li-sidebar">
            <i class="ph ph-scan text-2xl opacity-70"></i>
            <a href="scan.php?mode=keluar" class="anchor-sidebar">Scan Keluar</a>
          </li>
          <li class="li-sidebar">
            <i class="ph ph-clock-counter-clockwise text-2xl opacity-70"></i>
            <a href="histori.php" class="anchor-sidebar">Histori</a>
          </li>
        </ul>
        <div class="btn-logout">
          <a href="auth/logout.php" class="link-logout font-semibold bg-primary inline-block w-full text-center text-white py-2 px-3 rounded-md">Logout</a>
        </div>
      </div>
    </div>
    <!-- Sidebar End -->

    <script src="https://unpkg.com/@phosphor-icons/web@2.1.1"></script>
    <!-- Sweetalert -->
    <script src="assets/sweetalert/sweetalert2.min.js"></script>
</body>

</html>