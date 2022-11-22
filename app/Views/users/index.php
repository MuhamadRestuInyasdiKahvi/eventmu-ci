<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Eventmu Layanan Website Penyedia Event Untuk Kamu" />
    <title>Eventmu</title>
    <!-- Favicon -->
    <link rel="icon" href="/favicon.ico" />
    <!-- Environtment -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500;600&family=Volkhov:wght@700&display=swap" rel="stylesheet" />

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />

    <!-- Swiper -->
    <link rel="stylesheet" href="<?= base_url() ?>/template/assets/css/swiper-bundle.min.css">

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
        #bg-hero {
            background-image: url('<?= base_url('/template/assets/img/bg-hero.png') ?>');
            background-size: cover;
            background-repeat: no-repeat;
        }
    </style>

</head>

<body>
    <!-- Header -->
    <header class="absolute z-20 lg:z-10 w-full py-6 lg:py-12">
        <nav class="flex flex-wrap items-center justify-between lg:justify-center w-full py-4 md:py-0 px-4 text-lg text-gray-700
          max-w-full lg:max-w-7xl mx-auto px-4 ">
            <div class="bg-red-100 lg:hidden block"></div>
            <svg xmlns="http://www.w3.org/2000/svg" id="menu-button" class="h-6 w-6 cursor-pointer lg:hidden block" fill="none" viewBox="0 0 24 24" stroke="#764abc">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
            <div class="hidden w-full lg:flex md:items-center lg:w-auto" id="menu">
                <ul class="flex items-center flex-col lg:flex-row gap-y-6 lg:gap-y-0">
                    <li class="group hover:scale-110 transform transition duration-300">
                        <a class='px-9 text-white group-hover:text-purple-1'>Beranda</a>
                    </li>
                    <li class="group hover:scale-110 transform transition duration-300">
                        <a class='px-9 text-white group-hover:text-purple-1'>Event</a>
                    </li>
                    <li class="group hover:scale-110 transform transition duration-300">
                        <a class='px-9 text-white group-hover:text-purple-1'>Tentang</a>
                    </li>
                    <li class="group hover:scale-110 transform transition duration-300">
                        <a class='px-9 text-white group-hover:text-purple-1'>Kontak</a>
                    </li>
                    <li class="group hover:scale-110 transform transition duration-300">
                        <a class='px-9 text-white group-hover:text-purple-1' href="<?= site_url('login')?>">Login</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <!-- Hero  -->
    <section class="h-[980px] flex justify-center items-center relative w-full" id="bg-hero">
        <a class="absolute bottom-20 w-6 h-6 border-white border-b-4 border-r-4 transform rotate-45 translate-y-1/2"></a>
        <div class='max-w-7xl mx-auto'>
            <div class='w-96 h-96 lg:w-[522px] lg:h-[522px]'>
                <img src="<?= base_url('/template/assets/img/svg/logo-hero.svg') ?>">
            </div>
        </div>
    </section>

    <!-- Event  -->
    <section class="bg-black-primary">
        <div class='max-w-7xl mx-auto py-20'>
            <div class='flex flex-col lg:flex-row gap-y-5 justify-center items-center mb-10'>
                <span class='w-11/12  lg:w-4/12  h-1 bg-gradient-to-l from-purple-1 to-purple-2 rounded-md'></span>
                <h1 class='text-4xl lg:text-5xl text-white  w-full lg:w-4/12 font-sans text-center'>Event Kekinian</h1>
                <span class='w-11/12 lg:w-4/12 h-1 bg-gradient-to-r from-purple-1 to-purple-2 rounded-md'></span>
            </div>
            <div class="swiper mySwiperEvent">
                <div class="swiper-wrapper py-10 ">
                    <div class="swiper-slide flex justify-around">
                        <div class="max-w-xs bg-white rounded-3xl group hover:scale-110 transform transition duration-500 overflow-hidden ">
                            <img src="<?= base_url('/template/assets/img/event-1.png') ?>" class="rounded-t-2xl object-cover object-top h-[320px] w-[320px]">
                            <div class="p-5 group-hover:bg-gradient-to-tr from-purple-1 to-purple-2 ">
                                <div class='flex justify-between items-center mb-5'>
                                    <h2 class='font-sans text-xl text-gray-700 font-bold group-hover:text-white'>adfa</h2>
                                    <span class='w-5 h-4 group-hover:w-6 '>
                                        <svg viewBox="0 0 21 16" fill="none" xmlns="http://www.w3.org/2000/svg" class="fill-purple-400 group-hover:fill-white">
                                            <path d="M1 7C0.447715 7 0 7.44772 0 8C0 8.55228 0.447715 9 1 9L1 7ZM20.7071 8.70711C21.0976 8.31658 21.0976 7.68342 20.7071 7.29289L14.3431 0.928932C13.9526 0.538408 13.3195 0.538408 12.9289 0.928932C12.5384 1.31946 12.5384 1.95262 12.9289 2.34315L18.5858 8L12.9289 13.6569C12.5384 14.0474 12.5384 14.6805 12.9289 15.0711C13.3195 15.4616 13.9526 15.4616 14.3431 15.0711L20.7071 8.70711ZM1 9L20 9V7L1 7L1 9Z" />
                                        </svg>
                                    </span>
                                </div>
                                <p class='font-sans text-base text-gray-700 group-hover:text-white '>
                                    1
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide flex justify-around ">
                        <div class="max-w-xs bg-white rounded-3xl group hover:scale-110 transform transition duration-500 overflow-hidden ">
                            <img src="<?= base_url('/template/assets/img/event-2.png') ?>" class="rounded-t-2xl object-cover object-top h-[320px] w-[320px]">
                            <div class="p-5 group-hover:bg-gradient-to-tr from-purple-1 to-purple-2 ">
                                <div class='flex justify-between items-center mb-5'>
                                    <h2 class='font-sans text-xl text-gray-700 font-bold group-hover:text-white'>adfa</h2>
                                    <span class='w-5 h-4 group-hover:w-6 '>
                                        <svg viewBox="0 0 21 16" fill="none" xmlns="http://www.w3.org/2000/svg" class="fill-purple-400 group-hover:fill-white">
                                            <path d="M1 7C0.447715 7 0 7.44772 0 8C0 8.55228 0.447715 9 1 9L1 7ZM20.7071 8.70711C21.0976 8.31658 21.0976 7.68342 20.7071 7.29289L14.3431 0.928932C13.9526 0.538408 13.3195 0.538408 12.9289 0.928932C12.5384 1.31946 12.5384 1.95262 12.9289 2.34315L18.5858 8L12.9289 13.6569C12.5384 14.0474 12.5384 14.6805 12.9289 15.0711C13.3195 15.4616 13.9526 15.4616 14.3431 15.0711L20.7071 8.70711ZM1 9L20 9V7L1 7L1 9Z" />
                                        </svg>
                                    </span>
                                </div>
                                <p class='font-sans text-base text-gray-700 group-hover:text-white '>
                                    2
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide flex justify-around">
                        <div class="max-w-xs bg-white rounded-3xl group hover:scale-110 transform transition duration-500 overflow-hidden ">
                            <img src="<?= base_url('/template/assets/img/event-3.png') ?>" class="rounded-t-2xl object-cover object-top h-[320px] w-[320px]">
                            <div class="p-5 group-hover:bg-gradient-to-tr from-purple-1 to-purple-2 ">
                                <div class='flex justify-between items-center mb-5'>
                                    <h2 class='font-sans text-xl text-gray-700 font-bold group-hover:text-white'>adfa</h2>
                                    <span class='w-5 h-4 group-hover:w-6 '>
                                        <svg viewBox="0 0 21 16" fill="none" xmlns="http://www.w3.org/2000/svg" class="fill-purple-400 group-hover:fill-white">
                                            <path d="M1 7C0.447715 7 0 7.44772 0 8C0 8.55228 0.447715 9 1 9L1 7ZM20.7071 8.70711C21.0976 8.31658 21.0976 7.68342 20.7071 7.29289L14.3431 0.928932C13.9526 0.538408 13.3195 0.538408 12.9289 0.928932C12.5384 1.31946 12.5384 1.95262 12.9289 2.34315L18.5858 8L12.9289 13.6569C12.5384 14.0474 12.5384 14.6805 12.9289 15.0711C13.3195 15.4616 13.9526 15.4616 14.3431 15.0711L20.7071 8.70711ZM1 9L20 9V7L1 7L1 9Z" />
                                        </svg>
                                    </span>
                                </div>
                                <p class='font-sans text-base text-gray-700 group-hover:text-white '>
                                    3
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-button-next text-white"></div>
                <div class="swiper-button-prev text-white"></div>
            </div>

        </div>
    </section>

    <!-- Tentang -->
    <section class='bg-gradient-to-b from-black-primary to-purple-3 scroll-mt-20' id='tentang'>
        <div class='max-w-7xl mx-auto lg:flex '>
            <div class='w-full lg:w-8/12'>
                <div class='flex flex-col lg:flex-row items-center mb-2 gap-y-5 lg:gap-y-0'>
                    <span class='w-11/12 lg:w-3/12 h-1 bg-gradient-to-r from-purple-1 to-purple-2 rounded-md lg:mr-6'></span>
                    <h3 class='font-semibold text-lg lg:text-3xl text-white font-sans'>Tentang Kami</h3>
                </div>
                <div class='px-5 lg:px-0'>
                    <h3 class='font-sans font-bold text-2xl lg:text-4xl text-white mb-5'>
                        Eventmu dulu,<br />
                        bersenang-senang kemudian</h3>
                    <div class='w-full lg:w-5/6'>
                        <p class='text-gray-200 text-base lg:text-2xl font-sans '>
                            Eventmu merupakan website yang memudahkan kamu untuk mencari tempat hiburan
                            terbaik mulai dari konser musik, museum seni, dan event-event lainnya.
                            Dengan Eventmu kamu bisa mengetahui event-event apa saja yang akan dilakukan di sekitar kamu.
                            Eventmu memberikan informasi lengkap tentang event-event yang ingin kamu tuju.
                            Eventmu adalah solusi untuk healing kamu.
                        </p>
                    </div>
                </div>
            </div>
            <div class='hidden lg:w-4/12 lg:block px-5'>
                <img src="<?= base_url('/template/assets/img/manajemen-konten/about.png') ?>" class="object-contain">
            </div>
        </div>
    </section>

    <!-- Kontak / Cara Kerjasama -->
    <section class='bg-purple-3 relative py-16' id='kontak'>
        <span class='hidden xl:block absolute w-full h-[360px] top-24'>
            <svg viewBox="0 0 1551 390" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M0 333.709C58.7755 329.032 137.222 314.619 240.728 285.046C242.954 283.119 247.147 280.863 253.63 278.351C680.516 269.186 1316.26 248.611 1551 205.053V202.293C1480.72 216.802 1399.56 214.602 1282.92 211.441C1167.46 208.311 1017.23 204.239 808.351 214.497C448.737 232.158 297.871 261.209 253.63 278.351C155.615 280.455 68.6115 281.958 0 282.999V333.709Z" fill="#803CC3" />
                <path fill-rule="evenodd" clip-rule="evenodd" d="M1551 0C1356.64 127.948 694.448 225.01 236.42 278.045C239.285 248.105 120.562 158.984 0 81.6105V382C378.97 434.975 1311.56 210.337 1551 45.9281V0Z" fill="url(#paint0_linear_170_3397)" />
                <defs>
                    <linearGradient id="paint0_linear_170_3397" x1="673.177" y1="2.15417" x2="775.5" y2="392.058" gradientUnits="userSpaceOnUse">
                        <stop stop-color="#803CC3" />
                        <stop offset="1" stop-color="#E2B4FF" stop-opacity="0.56" />
                    </linearGradient>
                </defs>
            </svg>

        </span>
        <div class='max-w-7xl mx-auto'>
            <div class='w-full lg:w-6/12 mb-7'>
                <div class='flex flex-col lg:flex-row items-center mb-2 gap-y-5 lg:gap-y-0'>
                    <span class='w-11/12 lg:w-3/12 h-1 bg-gradient-to-r from-purple-1 to-purple-2 rounded-md lg:mr-6'></span>
                    <h3 class='font-semibold text-lg lg:text-3xl text-white font-sans'>Cara Kerjasama Event</h3>
                </div>
                <div class='px-5 lg:px-0'>
                    <h3 class='font-sans font-bold text-2xl lg:text-4xl text-white mb-2'>
                        Daftarkan Eventmu Disini!</h3>
                    <p class='text-gray-200 text-xl lg:text-2xl font-sans '>
                        Tiga langkah mudah daftar di Eventmu
                    </p>
                </div>
            </div>
            <div class='flex flex-col lg:flex-row gap-10 px-5 lg:px-0'>
                <div class='w-full lg:w-4/12 bg-gradient-to-tr from-purple-1 to-purple-2 rounded-3xl px-14 hover:scale-110 transform transition duration-500'>
                    <img src="<?= base_url('/template/assets/img/svg/phone.svg') ?>" class='mx-auto mt-9 mb-5'>
                    <h3 class='font-sans font-semibold text-gray-200 text-center mb-5 text-xl'>
                        Hubungi
                    </h3>
                    <p class='text-center font-sans text-gray-200 lg:px-14 text-sm mb-12'>
                        Untuk dapat melakukan promosi pada website eventmu, hubungi :
                        0813-6352-3549 <br />(Admin)
                    </p>
                </div>
                <div class='w-full lg:w-4/12 bg-gradient-to-tr from-purple-1 to-purple-2 rounded-3xl px-14 hover:scale-110 transform transition duration-500'>
                    <img src="<?= base_url('/template/assets/img/svg/money-bag.svg') ?>" class='mx-auto mt-9 mb-5'>
                    <h3 class='font-sans font-semibold text-gray-200 text-center mb-5 text-xl'>
                        Bayar
                    </h3>
                    <p class='text-center font-sans text-gray-200 lg:px-14 text-sm mb-12'>
                        Untuk pembayaran promosi event dapat melalui e-wallet Ovo, Gopay, Shopeepay, Dana
                    </p>
                </div>
                <div class='w-full lg:w-4/12 bg-gradient-to-tr from-purple-1 to-purple-2 rounded-3xl px-14 hover:scale-110 transform transition duration-500'>
                    <img src="<?= base_url('/template/assets/img/svg/upload.svg') ?>" class='mx-auto mt-9 mb-5'>
                    <h3 class='font-sans font-semibold text-gray-200 text-center mb-5 text-xl'>
                        Unggah
                    </h3>
                    <p class='text-center font-sans text-gray-200 lg:px-14 text-sm mb-12'>
                        Event akan di upload pada website setelah costumer melakukan pembayaran dan konfirmasi
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimoni -->
    <section class='h-[500px] bg-gradient-to-b from-purple-3 to-purple-2 '>
        <div class='max-w-7xl mx-auto relative'>
            <div class='flex flex-col lg:flex-row items-center mb-2 gap-y-5 lg:gap-y-0'>
                <span class='w-11/12 lg:w-3/12 h-1 bg-gradient-to-r from-purple-1 to-purple-2 rounded-md lg:mr-6'></span>
                <h3 class='font-semibold text-lg lg:text-3xl text-white font-sans'>Testimoni</h3>
            </div>
            <h3 class='font-sans font-bold text-2xl lg:text-4xl text-white mb-2 px-5 lg:px-0'>
                Apa Kata Mereka?
            </h3>

            <div class="flex">
                <div class="w-full lg:w-10/12 flex items-center justify-center relative h-[320px] lg:h-auto">
                    <div class="swiper mySwiperTestimoni ">
                        <div class="swiper-wrapper ">
                            <div class="swiper-slide ">
                                <div class='relative px-16 lg:px-32 pt-10 lg:pt-20 pb-48'>
                                    <div class='relative'>
                                        <div class='bg-gradient-to-r from-purple-1 to-purple-2 shadow-2xl rounded-xl p-6 relative z-20'>
                                            <span class='w-16 h-16 absolute top-0 left-0 overflow-hidden transform -translate-x-1/2 -translate-y-1/2 rounded-full flex-none mr-3'>
                                                <img src="<?= base_url('/template/assets/img/event-1.png') ?>" class="object-cover">
                                                <!-- <Image src={`/images/${item.img}`} width="100%" height="100%" alt='Testimoni' layout='responsive' class='object-cover' /> -->
                                            </span>
                                            <p class='text-white mb-8 font-sans'>“Ga ragu lagi berkunjung ke website eventmu soalnya bermanfaat banget .”</p>
                                            <h6 class='text-white text-lg font-sans'>Gandi Juhendra</h6>
                                            <h6 class='text-white text-sm font-sans'>Padang, Indonesia</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide ">
                                <div class='relative px-16 lg:px-32 pt-10 lg:pt-20 pb-48'>
                                    <div class='relative'>
                                        <div class='bg-gradient-to-r from-purple-1 to-purple-2 shadow-2xl rounded-xl p-6 relative z-20'>
                                            <span class='w-16 h-16 absolute top-0 left-0 overflow-hidden transform -translate-x-1/2 -translate-y-1/2 rounded-full flex-none mr-3'>
                                                <img src="<?= base_url('/template/assets/img/event-2.png') ?>" class="object-cover">
                                                <!-- <Image src={`/images/${item.img}`} width="100%" height="100%" alt='Testimoni' layout='responsive' class='object-cover' /> -->
                                            </span>
                                            <p class='text-white mb-8 font-sans'>“Ga ragu lagi berkunjung ke website eventmu soalnya bermanfaat banget untuk cari referensi liburan keluarga.”</p>
                                            <h6 class='text-white text-lg font-sans'>Gandi Juhendra</h6>
                                            <h6 class='text-white text-sm font-sans'>Padang, Indonesia</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="hidden lg:flex lg:w-1/12 items-center justify-center ">
                    <div class="flex flex-col">
                        <span class='material-icons mr-2 text-white up'>keyboard_arrow_up</span>
                        <span class='material-icons mr-2 text-white down'>keyboard_arrow_down</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Komentar -->
    <section class='bg-purple-2 pb-40 pt-12'>
        <div class='max-w-7xl mx-auto relative'>
            <div class='flex flex-col lg:flex-row items-center mb-2 gap-y-5 lg:gap-y-0'>
                <span class='w-11/12 lg:w-3/12 h-1 bg-gradient-to-r from-purple-1 to-purple-2 rounded-md lg:mr-6'></span>
                <h3 class='font-semibold text-lg lg:text-3xl text-white font-sans'>Komentar</h3>
            </div>
            <h3 class='font-sans font-bold text-2xl lg:text-4xl text-white mb-7 px-5 lg:px-0'>
                Tinggalkan Komentar Disini
            </h3>
            <textarea id="message" rows="5" class="mx-auto px-5 block p-2.5 w-11/12 lg:w-full text-sm text-gray-600 bg-gray-50 rounded-lg border max-h-40 mb-11" placeholder="Tinggalkan Komentar..."></textarea>
            <div class='flex justify-end px-5 lg:px-0'>
                <button class="bg-purple-4 h-12 lg:h-14 rounded-2xl">
                    <span class='px-7 lg:px-14 text-white font-sans font-semibold text-sm'>Kirim Komentar</span>
                </button>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <section class='bg-black-primary py-9'>
        <div class='max-w-7xl mx-auto'>
            <div class='flex flex-wrap'>
                <div class='w-full lg:w-6/12 mb-2'>
                    <p class='text-gray-300 font-sans lg:text-base text-sm text-center lg:text-left'>2022 &copy; Design By <span class='font-bold text-gray-100'>Eventmu</span> All Right Reserved</p>
                </div>
                <div class='w-full lg:w-6/12'>
                    <div class='flex gap-10 lg:justify-end justify-center'>
                        <div class='flex gap-2 justify-center items-center'>
                            <span class='w-4 lg:w-5 h-4 lg:h-5'>
                                <svg viewBox="0 0 31 31" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_171_1525)">
                                        <path d="M30.667 14.939C30.667 23.189 23.927 29.877 15.611 29.877C12.972 29.877 10.493 29.202 8.335 28.02L0 30.667L2.717 22.65C1.347 20.4 0.558 17.758 0.558 14.938C0.559 6.688 7.297 0 15.613 0C23.928 0.002 30.667 6.689 30.667 14.939ZM15.61 2.382C8.631 2.382 2.954 8.016 2.954 14.942C2.954 17.69 3.85 20.234 5.365 22.304L3.785 26.967L8.647 25.422C10.647 26.734 13.04 27.498 15.61 27.498C22.589 27.498 28.268 21.865 28.268 14.939C28.27 8.016 22.59 2.382 15.61 2.382ZM23.214 18.38C23.12 18.229 22.874 18.137 22.506 17.953C22.139 17.769 20.322 16.884 19.985 16.764C19.645 16.641 19.399 16.579 19.153 16.946C18.91 17.313 18.202 18.137 17.985 18.383C17.77 18.628 17.555 18.659 17.186 18.478C16.817 18.292 15.627 17.908 14.217 16.661C13.12 15.689 12.379 14.492 12.165 14.125C11.948 13.759 12.143 13.561 12.326 13.379C12.491 13.214 12.695 12.951 12.88 12.736C13.065 12.523 13.126 12.372 13.249 12.127C13.37 11.882 13.309 11.669 13.218 11.484C13.126 11.3 12.389 9.5 12.08 8.767C11.773 8.035 11.466 8.156 11.25 8.156C11.035 8.156 10.789 8.126 10.543 8.126C10.297 8.126 9.897 8.215 9.56 8.582C9.223 8.949 8.269 9.834 8.269 11.636C8.269 13.44 9.59 15.179 9.775 15.423C9.961 15.666 12.329 19.485 16.08 20.951C19.833 22.416 19.833 21.927 20.509 21.865C21.187 21.803 22.693 20.98 22.999 20.126C23.307 19.268 23.307 18.533 23.214 18.38Z" fill="white" />
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_171_1525">
                                            <rect width="30.667" height="30.667" fill="white" />
                                        </clipPath>
                                    </defs>
                                </svg>

                            </span>
                            <p class='text-gray-300 font-sans text-sm lg:text-base'>0816-6342-3249</p>
                        </div>

                        <a href="https://instagram.com/eventmu2022" target="_blank">
                            <div class='flex gap-2 justify-center items-center cursor-pointer'>
                                <span class='w-4 lg:w-5 h-4 lg:h-5'>
                                    <svg viewBox="0 0 32 31" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <g clip-path="url(#clip0_171_1543)">
                                            <path d="M22.4319 0H9.90206C4.80982 0 0.666992 4.14283 0.666992 9.23507V21.7649C0.666992 26.8572 4.80982 31 9.90206 31H22.4319C27.5242 31 31.667 26.8572 31.667 21.7649V9.23507C31.6669 4.14283 27.5241 0 22.4319 0ZM28.5484 21.7649C28.5484 25.1429 25.8099 27.8814 22.4319 27.8814H9.90206C6.52406 27.8814 3.78559 25.1429 3.78559 21.7649V9.23507C3.78559 5.85701 6.52406 3.1186 9.90206 3.1186H22.4319C25.8099 3.1186 28.5484 5.85701 28.5484 9.23507V21.7649Z" fill="url(#paint0_linear_171_1543)" />
                                            <path d="M16.167 7.4823C11.746 7.4823 8.14929 11.079 8.14929 15.4999C8.14929 19.9209 11.746 23.5177 16.167 23.5177C20.588 23.5177 24.1847 19.9209 24.1847 15.4999C24.1847 11.079 20.588 7.4823 16.167 7.4823ZM16.167 20.3991C13.4613 20.3991 11.2679 18.2057 11.2679 15.5C11.2679 12.7943 13.4613 10.6009 16.167 10.6009C18.8727 10.6009 21.0661 12.7943 21.0661 15.5C21.0661 18.2057 18.8727 20.3991 16.167 20.3991Z" fill="url(#paint1_linear_171_1543)" />
                                            <path d="M24.2 9.46375C25.261 9.46375 26.1212 8.60362 26.1212 7.5426C26.1212 6.48158 25.261 5.62145 24.2 5.62145C23.139 5.62145 22.2789 6.48158 22.2789 7.5426C22.2789 8.60362 23.139 9.46375 24.2 9.46375Z" fill="url(#paint2_linear_171_1543)" />
                                        </g>
                                        <defs>
                                            <linearGradient id="paint0_linear_171_1543" x1="16.167" y1="30.9097" x2="16.167" y2="0.240771" gradientUnits="userSpaceOnUse">
                                                <stop stop-color="white" />
                                                <stop offset="0.6" stop-color="white" />
                                                <stop offset="1" stop-color="white" />
                                            </linearGradient>
                                            <linearGradient id="paint1_linear_171_1543" x1="16.167" y1="30.9097" x2="16.167" y2="0.240774" gradientUnits="userSpaceOnUse">
                                                <stop stop-color="white" />
                                                <stop offset="0.3" stop-color="white" />
                                                <stop offset="0.531142" stop-color="white" />
                                                <stop offset="0.6" stop-color="white" />
                                                <stop offset="1" stop-color="white" />
                                            </linearGradient>
                                            <linearGradient id="paint2_linear_171_1543" x1="24.2" y1="30.9097" x2="24.2" y2="0.24077" gradientUnits="userSpaceOnUse">
                                                <stop stop-color="white" />
                                                <stop offset="0.3" stop-color="white" />
                                                <stop offset="0.6" stop-color="white" />
                                                <stop offset="1" stop-color="white" />
                                            </linearGradient>
                                            <clipPath id="clip0_171_1543">
                                                <rect width="31" height="31" fill="white" transform="translate(0.666992)" />
                                            </clipPath>
                                        </defs>
                                    </svg>

                                </span>
                                <p class='text-gray-300 font-sans text-sm lg:text-base'>Eventmu</p>
                            </div>
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </section>


</body>
<!-- Swiper.js  -->
<script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>

<!-- Event Slider -->
<script>
    let swiper = new Swiper(".mySwiperEvent", {
        autoplay: true,
        slidesPerView: 3,
        spaceBetween: 20,
        loop: true,
        centerSlide: true,
        fade: 'true',
        grabCursor: 'true',
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        breakpoints: {
            0: {
                slidesPerView: 1,
            },
            900: {
                slidesPerView: 2,
            },
            1100: {
                slidesPerView: 3,
            },
        },
    });
</script>

<!-- Testi Slider -->
<script>
    let swiperTestimoni = new Swiper(".mySwiperTestimoni", {
        autoplay: true,
        effect: "creative",
        creativeEffect: {
            prev: {
                translate: [60, 70, 0]
            },
            next: {
                translate: ["-100%", "-100%", 0]
            }
        },
        simulateTouch: false,
        slidesPerView: 1,
        spaceBetween: 50,
        loop: false,
        centerSlide: 'true',
        fade: 'true',
        grabCursor: 'true',
        navigation: {
            nextEl: ".up",
            prevEl: ".down",
        },
        // breakpoints: {
        //     0: {
        //         slidesPerView: 1,
        //     },
        //     900: {
        //         slidesPerView: 2,
        //     },
        //     1100: {
        //         slidesPerView: 3,
        //     },
        // },
    });
</script>

<!-- Burger Icon Button -->
<script>
    const button = document.querySelector('#menu-button');
    const menu = document.querySelector('#menu');


    button.addEventListener('click', () => {
        menu.classList.toggle('hidden');
    });
</script>

</html>