<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thể thao Store</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.2/dist/css/splide.min.css">
    <script src="https://kit.fontawesome.com/7af42783d2.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./layout/giaodiennguoidung/asset/style.css">
    <link rel="apple-touch-icon" sizes="57x57" href="layout/giaodiennguoidung/favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="layout/giaodiennguoidung/favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="layout/giaodiennguoidung/favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="layout/giaodiennguoidung/favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="layout/giaodiennguoidung/favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="layout/giaodiennguoidung/favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="layout/giaodiennguoidung/favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="layout/giaodiennguoidung/favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="layout/giaodiennguoidung/favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="layout/giaodiennguoidung/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="layout/giaodiennguoidung/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="layout/giaodiennguoidung/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="layout/giaodiennguoidung/favicon/favicon-16x16.png">
    <link rel="manifest" href="layout/giaodiennguoidung/favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="layout/giaodiennguoidung/favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <script src="layout/giaodiennguoidung/js/jquery-1.10.2.min.js"></script>
    <script src="layout/giaodiennguoidung/js/jquery-ui.js"></script>
    <script src="layout/giaodiennguoidung/js/bootstrap.min.js"></script>
    <style>
        ::-webkit-scrollbar {
            display: none;
        }

        .custom-scrollbar {
            /* Thiết lập kích thước cho thanh scrollbar */
            scrollbar-width: thin;
            /* Sử dụng 'auto' hoặc 'thin' tùy theo trình duyệt */
            scrollbar-color: transparent transparent;
            /* Màu thumb và track */
        }

        /* Ẩn thanh scrollbar ngang trên các trình duyệt hỗ trợ */
        .custom-scrollbar::-webkit-scrollbar {
            display: none;
        }

        .menu-item {
        display: flex;
        align-items: center;
        transition: transform 0.3s;
    }

    .separator {
        display: inline-block;
        transform: translateX(-100%);
        opacity: 0;
        transition: transform 0.3s, opacity 0.3s;
    }

    .menu-item:hover .separator {
        transform: translateX(0);
        opacity: 1;
    }

    .menu-item:hover {
        transform: translateX(5px);
    }

        @keyframes rotateClockwise {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        @keyframes rotateCounterclockwise {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(-360deg);
            }
        }

        .icon-container:hover #animated-icon {
            animation: rotateClockwise 1s linear infinite;
        }

        .icon-container:not(:hover) #animated-icon {
            animation: rotateCounterclockwise 2s linear infinite;
        }
    </style>

</head>
<script>
    function changImage(id) {
        let imagePath = document.getElementById(id).getAttribute('src');
        document.getElementById('img-main').setAttribute('src', imagePath);
    }
</script>
<style>
    body {
        margin: 0;
        padding: 0px;

    }
</style>

<body style="font-family: 'Segoe UI', sans-serif;                                  
">
    <div class="container w-[1280px] m-auto custom-scrollbar">
        <!--header-->
        <div class="header">
            <div class="flex justify-between mt-5 items-center">
                <div class="evo-header-flex-item header-fill">
                    <div class="" onclick="openMenu()">
                        <img class="hover:bg-slate-950 hover:bg-opacity-20 h-[30px]" src="layout/images/logo.jpg" alt="" width="40px">
                    </div>
                </div>
                <div class="evo-header-flex-item header-logo">
                    <a href="?act=main" class="logo-wrapper" title="thethaostore.vn">
                        <img src="https://bizweb.dktcdn.net/100/428/250/themes/822996/assets/logo.png?1681911001649" class="w-[200px] h-[53px]" alt="">
                    </a>
                </div>
                <div class=" flex ">
                    <div class="" onclick="openTimkiem()">
                        <i class="fa-solid fa-magnifying-glass text-[25px] mr-5"></i>
                    </div>

                    <a href="?act=show_gh" class="relative">
                        <i class="fa-solid fa-bag-shopping text-[25px]"></i>
                        <?php if (isset($_SESSION['mycart']) && !empty($_SESSION['mycart'])) : ?>
                            <span id="cart-count" class="absolute top-[-10px] right-[-20px] bg-red-500 text-white rounded-full px-2 py-1 text-xs"><?= count($_SESSION['mycart']) ?></span>
                        <?php endif; ?>
                    </a>

                </div>

            </div>