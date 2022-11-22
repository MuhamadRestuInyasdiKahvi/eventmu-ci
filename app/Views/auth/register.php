<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Eventmu Layanan Website Penyedia Event Untuk Kamu" />
    <title>Eventmu | Register</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500;600&family=Volkhov:wght@700&display=swap" rel="stylesheet" />

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />

    <!-- Taildwind -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ["'Poppins', sans-serif"],
                        serif: ["'Volkhov', serif"]
                    },
                    colors: {
                        "purple-1": "#B45CFF",
                        "purple-2": "#5C259C",
                        "purple-3": "#310542",
                        "purple-4": "#A05DDE",
                        "gray-1": "#D9D9D9",
                        "black-primary": "#111111"
                    },
                }
            },
        }
    </script>
    <style>
        #bg-register {
            background-image: url('<?= base_url('/template/assets/img/register-bg.png') ?>');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: bottom;
        }
    </style>
</head>

<body>
    <div class="flex h-screen">
        <!-- Kiri -->
        <div class="w-8/12 justify-center items-center flex" id="bg-register">
            <div class='w-96 h-96 lg:w-[312px] lg:h-[312px]'>
                <img src="<?= base_url('/template/assets/img/svg/logo-hero.svg') ?>">
            </div>
        </div>
        <!-- Kanan -->
        <div class="w-4/12 bg-white flex">
            <div class="max-w-sm m-auto">
                <h1 class="font-sans font font-semibold text-3xl mb-6">Buat Akun Baru</h1>
                <p class="font-sans text-lg text-gray-400 mb-14">Sudah Punya Akun? <span class="font-semibold text-purple-2"><a href="login">Masuk disini!</a></span></p>
                <form class="w-full">
                    <div class="flex items-center border-b border-gray-400 py-2 mb-8">
                        <input class="appearance-none bg-transparent border-none w-full text-gray-400 mr-3 py-1 px-2 leading-tight focus:outline-none" type="text" placeholder="Username" aria-label="Full name">
                    </div>
                    <div class="flex items-center border-b border-gray-400 py-2 mb-8">
                        <input class="appearance-none bg-transparent border-none w-full text-gray-400 mr-3 py-1 px-2 leading-tight focus:outline-none" type="text" placeholder="Alamat" aria-label="Full name">
                    </div>
                    <div class="flex items-center border-b border-gray-400 py-2 mb-8">
                        <input class="appearance-none bg-transparent border-none w-full text-gray-400 mr-3 py-1 px-2 leading-tight focus:outline-none" type="email" placeholder="Email" aria-label="Full name">
                    </div>
                    <div class="flex items-center border-b border-gray-400 py-2 mb-8">
                        <input class="appearance-none bg-transparent border-none w-full text-gray-400 mr-3 py-1 px-2 leading-tight focus:outline-none" type="password" placeholder="Password" aria-label="Full name">
                    </div>
                    <div class="flex items-center justify-center w-full mb-14">
                        <label for="dropzone-file" class="flex flex-col items-center justify-center w-full h-28 border-2 border-gray-300 border-solid rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                <svg aria-hidden="true" class="w-10 h-10 mb-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                                </svg>
                                <p class="mb-2 text-sm text-gray-500 dark:text-gray-400">Upload Foto Profil</p>
                            </div>
                            <input id="dropzone-file" type="file" class="hidden" />
                        </label>
                    </div>

                    <button class="bg-black h-12 rounded-lg w-full ">
                        <span class='px-7 lg:px-14 py-3.5 text-white font-sans font-semibold text-sm'>Simpan</span>
                    </button>
                </form>
            </div>

        </div>
    </div>
</body>

</html>