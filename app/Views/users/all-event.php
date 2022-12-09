<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

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

<body class="">
    <!-- Header -->
    <header class="z-20 lg:z-10 w-full py-6 lg:py-12 bg-black-primary">
        <nav class="flex flex-wrap items-center justify-between lg:justify-center w-full py-4 md:py-0 px-4 text-lg text-gray-700
          max-w-full lg:max-w-7xl mx-auto px-4 ">
            <div class="bg-red-100 lg:hidden block"></div>
            <svg xmlns="http://www.w3.org/2000/svg" id="menu-button" class="h-6 w-6 cursor-pointer lg:hidden block" fill="none" viewBox="0 0 24 24" stroke="#764abc">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
            <div class="hidden w-full lg:flex md:items-center lg:w-auto" id="menu">
                <ul class="flex items-center flex-col lg:flex-row gap-y-6 lg:gap-y-0">
                    <li class="group hover:scale-110 transform transition duration-300">
                        <a href="<?= base_url() ?>" class='px-9 text-white group-hover:text-purple-1'>Beranda</a>
                    </li>
                    <li class="group hover:scale-110 transform transition duration-300">
                        <a href="<?= site_url('all-event') ?>" class='px-9 text-white group-hover:text-purple-1'>Event</a>
                    </li>
                    <li class="group hover:scale-110 transform transition duration-300">
                        <a href="<?= base_url() ?>#tentang" class='px-9 text-white group-hover:text-purple-1'>Tentang</a>
                    </li>
                    <li class="group hover:scale-110 transform transition duration-300">
                        <a href="<?= base_url() ?>#kontak" class='px-9 text-white group-hover:text-purple-1'>Kontak</a>
                    </li>
                    <li class="group hover:scale-110 transform transition duration-300">
                        <a class='px-9 text-white group-hover:text-purple-1' href="<?= site_url('login') ?>">Login</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>


    <!-- Event  -->
    <section class="bg-gradient-to-b from-black-primary to-purple-3 py-5" id="event">
        <div class='max-w-7xl mx-auto '>
            <div class='flex flex-col lg:flex-row gap-y-5 justify-center items-center mb-10'>
                <span class='w-11/12  lg:w-4/12  h-1 bg-gradient-to-l from-purple-1 to-purple-2 rounded-md'></span>
                <h1 class='text-4xl lg:text-5xl text-white  w-full lg:w-4/12 font-sans text-center'>Event Kekinian</h1>
                <span class='w-11/12 lg:w-4/12 h-1 bg-gradient-to-r from-purple-1 to-purple-2 rounded-md'></span>
            </div>
            <div class="flex flex-wrap lg:flex-row gap-10 px-5 lg:px-0 justify-center items-center ">
                <?php foreach ($event as $key => $value) : ?>
                    <a href="<?= site_url('all-event/' . $value->id_event) ?>" class=" relative lg:w-4/12 max-w-xs bg-white rounded-3xl group hover:scale-110 transform transition duration-500 overflow-hidden ">
                        <img src="<?= base_url('template/assets/img/img-event/' . $value->img_event) ?>" class="rounded-t-2xl object-cover object-top h-[400px] w-[320px]">
                        <div class="absolute bottom-0 left-0 right-0 px-4 py-2 bg-gray-800 opacity-70">
                            <h2 class=' font-sans text-xl  font-bold text-white '><?= $value->judul ?></h2>
                            <p class='font-sans text-sm font-medium text-white'><?= $value->penyelenggara ?> | <?= date('d M y', strtotime($value->start_event)) ?></p>
                        </div>
                    </a>
                <?php endforeach ?>
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