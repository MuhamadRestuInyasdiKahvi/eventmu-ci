<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Eventmu Layanan Website Penyedia Event Untuk Kamu" />
    <title>Eventmu | Login</title>
    <link rel="icon" type="image/x-icon" href="<?= base_url() ?>/template/assets/img/favicon.ico">
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
        #bg-login {
            background-image: url('<?= base_url('/template/assets/img/login-bg.png') ?>');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
        }
    </style>
</head>

<body>
    <div class="flex h-screen">
        <!-- Kiri -->
        <div class="w-8/12 justify-center items-center flex" id="bg-login">
            <div class='w-96 h-96 lg:w-[312px] lg:h-[312px]'>
                <img src="<?= base_url('/template/assets/img/svg/logo-hero.svg') ?>">
            </div>
        </div>
        <!-- Kanan -->
        <div class="w-4/12 bg-white flex">
            <div class="max-w-sm m-auto">
                <?php if (session()->getFlashdata('failed')) : ?>
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                        <strong class="font-bold">Failed !</strong>
                        <span class="block sm:inline"><?= session()->getFlashdata('failed') ?></span>
                    </div>
                <?php endif; ?>
                <h1 class="font-sans font font-semibold text-3xl mb-6">Masuk Akun</h1>
                <p class="font-sans text-lg text-gray-400 mb-14">Belum Punya Akun? <span class="font-semibold text-purple-2"><a href="<?= site_url('/register-user') ?>">Daftar disini!</a></span></p>
                <form class="w-full" action="<?= site_url('/login-user/store') ?>" method="POST">
                    <?= csrf_field() ?>
                    <div class="grid gap-5">
                        <div class="flex items-center border-b border-gray-400 py-2 ">
                            <input name="username" class="appearance-none bg-transparent border-none w-full text-gray-400 mr-3 py-1 px-2 leading-tight focus:outline-none" type="text" placeholder="Username" aria-label="Full name">
                        </div>
                        <?php if ($validation->hasError('username')) : ?>
                            <div class="invalid-feedback">
                                <p class="text-red-500 text-xs italic"><?= $validation->getError('username') ?></p>
                            </div>
                        <?php endif ?>
                        <div class="flex items-center border-b border-gray-400 py-2 ">
                            <input name="password" class="appearance-none bg-transparent border-none w-full text-gray-400 mr-3 py-1 px-2 leading-tight focus:outline-none" type="password" placeholder="Password" aria-label="Full name">
                        </div>
                        <?php if ($validation->hasError('password')) : ?>
                            <div class="invalid-feedback">
                                <p class="text-red-500 text-xs italic"><?= $validation->getError('password') ?></p>
                            </div>
                        <?php endif ?>
                        <button class="bg-black h-12 rounded-lg w-full" type="submit">
                            <span class='px-7 lg:px-14 py-3.5 text-white font-sans font-semibold text-sm'>Masuk</span>
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</body>

</html>