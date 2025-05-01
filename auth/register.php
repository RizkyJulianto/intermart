<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Registrasi | Intermart</title>
</head>
<body>
<div class="form-registrasi-container w-full flex justify-center items-center h-screen">
        <form action="post" class="bg-white border-2 border-gray-200 shadow-md py-5 px-5 flex flex-col  w-[450px] rounded-md relative">
            
            <div class="title-form">
                <h1 class="text-center font-bold text-4xl">Form Registrasi</h1>
                <div class="underline w-[80%] mx-auto h-[2px] bg-gray-200  mt-6"></div>
            </div>
            <div class="form-group flex flex-col gap-y-3 mt-6 mb-5">
                <label for="username" class="font-semibold opacity-70">Username</label>
                <input type="text" name="username" id="username" class="border-2 border-gray-200 rounded-md p-4 outline-0 focus:border-primary" placeholder="Masukan Username Anda" required>
            </div>
            <div class="form-group flex flex-col gap-y-3 mb-5">
            <label for="password" class="font-semibold opacity-70">Password</label>
            <input type="text" name="password" id="password" class="border-2 border-gray-200 rounded-md p-4 outline-0 focus:border-primary" placeholder="Masukan Password Anda" required>
            </div>
            <div class="form-group flex flex-col gap-y-3">
            <label for="password" class="font-semibold opacity-70">Ulangi Password</label>
            <input type="text" name="password" id="password" class="border-2 border-gray-200 rounded-md p-4 outline-0 focus:border-primary" placeholder="Masukan Password Anda" required>
            </div>


            <div class="button-submit mt-4">
                <button type="submit" class="w-full bg-primary rounded-md text-white font-semibold text-2xl py-3 cursor-pointer">Buat Akun</button>
            </div>

            <div class="link-register flex gap-x-1 justify-center mt-3 items-center">
                <p class="opacity-70">Sudah Punya Akun?</p>
                <a href="login.php" class="text-primary">Login Sekarang</a>
            </div>
            
        </form>
    </div>
</body>
</html>