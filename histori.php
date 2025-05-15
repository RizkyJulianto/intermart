<?php
include "koneksi.php";
$sql = "SELECT * FROM history ORDER BY tanggal DESC";
$query = mysqli_query($koneksi, $sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Halaman Histori</title>
</head>

<body>
    <?php include "components/sidebar.php" ?>

    <!-- Table Content -->
    <div class="table-content-container py-14 pl-6 pr-20 w-full flex flex-col gap-y-12 relative">



        <div class="button-top w-full flex justify-between items-center">
            <div class="title">
                <h1 class="text-4xl font-bold drop-shadow-sm">Histori</h1>
            </div>

            <!-- Searh Input -->
            <form action="histori.php" method="get" class="flex items-center gap-x-3">
                <input type="text" class="rounded-md border border-gray-200 w-72 focus:ring-primary p-3" name="keyword" id="keyword" placeholder="Masukan Data yang ingin dicari..." value="<?= $_GET['keyword'] ?? '' ?>">
                <button class="btn-search bg-primary rounded-md px-4 py-2 text-white font-bold text-2xl cursor-pointer" type="submit"><i class="ph ph-magnifying-glass"></i></button>
            </form>

        </div>


        



        <div class="table-content">
            <table class="w-full text-left font-semibold text-lg ">
                <tr>
                    <th class="table-heading-histori">Tanggal</th>
                    <th class="table-heading-histori">Pesan</th>
                    <th class="table-heading-histori">Aksi</th>
                </tr>
                <?php
                while ($data = mysqli_fetch_assoc($query)) { ?>
                    <tr>
                        <td class="table-data-histori"><?= $data['tanggal']; ?></td>
                        <td class="table-data-histori"><?= $data['pesan']; ?></td>
                        <td class="table-data-histori">
                            <a href="functions.php?idhistory=<?= $data['idhistory'] ?>" class="text-[28px]"><i class="ph ph-trash hover:text-red-600 transition-all duration-300" onclick="return confirm('Apakah Anda Yakin ingin Hapus Histori?')"></i></a>
                        </td>
                    </tr>

                    

                <?php } ?>

            </table>
        </div>

    </div>
</body>

</html>