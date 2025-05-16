<?php
session_start();
include "../koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM pengguna WHERE username='$username' AND katasandi='$password'";
    $result = mysqli_query($koneksi, $query);

    if (mysqli_num_rows($result) > 0) {
        $_SESSION['username'] = $username;
        header("Location: ../index.php");
        exit();
    } else {
        echo "<script>alert('Username atau Password salah!');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="../css/style.css" />
    <title>Login | Intermart</title>
</head> 
<body>
    <div class="form-login-container w-full flex justify-center items-center h-screen">
        <form action="" method="post" class="bg-white border-2 border-gray-200 shadow-md py-10 px-5 flex flex-col  w-[450px] rounded-md relative">
            <h1 class="text-center font-bold text-4xl">Form Login</h1>
            <div class="underline w-[80%] mx-auto h-[2px] bg-gray-200  mt-6"></div>
            
            <div class="form-group flex flex-col gap-y-3 mt-12 mb-5">
                <label for="username" class="font-semibold opacity-70">Username</label>
                <input type="text" name="username" id="username" class="border-2 border-gray-200 rounded-md p-4 outline-0 focus:border-primary" placeholder="Masukan Username Anda" required />
            </div>
            <div class="form-group flex flex-col gap-y-3">
                <label for="password" class="font-semibold opacity-70">Password</label>
                <input type="password" name="password" id="password" class="border-2 border-gray-200 rounded-md p-4 outline-0 focus:border-primary" placeholder="Masukan Password Anda" required />
            </div>

            <div class="show-password flex gap-x-2 justify-end mt-3 mb-3">
                <input type="checkbox" name="check" id="check" />
                <label for="check" class="opacity-70">Show Password</label>
            </div>

            <div class="button-submit mt-4">
                <button type="submit" class="w-full bg-primary rounded-md text-white font-semibold text-2xl py-3 cursor-pointer">Login</button>
            </div>

            <div class="link-register flex gap-x-1 justify-center mt-3 items-center">
                <p class="opacity-70">Belum Punya Akun?</p>
                <a href="register.php" class="text-primary">Daftar Sekarang</a>
            </div>
        </form>
    </div>
</body>
</html>
