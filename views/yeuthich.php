<?php include_once 'header.php' ?>
</div>
</div>
<main class="py-6">
    <ul class="w-full bg-slate-100 py-4 ">
        <li class="font-semibold text-stone-500 indent-80">
            <a href="?act=main">Trang chủ / </a>
            <a href="diachi.html">Yêu thích</a>
        </li>
    </ul> <br>
    <div class="container ">
        <div class="  ml-[300px] ">
            <div class="w-full   p-4 grid grid-cols-4 gap-4">
                <?php $i = 0; ?>
                <?php
                foreach ($_SESSION['love'] as $item) :
                ?>
                    <div class="space-y-2">
                        <img src="layout/images/products/<?= isset($item[3]) ? $item[3] : "" ?>" alt="">
                        <p><?= isset($item[1]) ? $item[1] : "" ?></p>
                        <a class="hover:text-red-500" href=""><?= isset($item[2]) ? $item[2] : "" ?></a>

                        <a href="?act=yeu_thich_del&id_yt=<?= $i ?>">
                            <div class="btns float-right   ">
                                <Button onclick="Toggle1()" id="btnh1" class="btn"><i class="fa-solid fa-heart fa-xl" style="color: #f20707;"></i></Button>
                            </div>
                        </a>
                    </div>
                    <?php $i++ ?>
                <?php
                endforeach;
                ?>


                <!-- <div class="space-y-2">
                    <img src="https://bizweb.dktcdn.net/thumb/large/100/428/250/products/c6016700-2a47-48f2-8cf2-506a7c42fab3-jpeg.jpg?v=1686122778000" alt="">
                    <p>560.000đ</p>
                    <a class="hover:text-red-500" href="">Bộ Quần Áo Thể Thao Nam Uniqlo Tennis Kei
                        Nishikori</a>
                    <div class="btns float-right   ">
                        <Button onclick="Toggle1()" id="btnh1" class="btn"><i class="fa-solid fa-heart fa-xl" style="color: #f20707;"></i></Button>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <script>
        var swiper = new Swiper(".card-slider", {

            slidesPerView: 4,
            speed: 1000,
            spaceBetween: 30,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        });
    </script>
    <!-- END TOP SẢN PHẨM CHẠY-->
    <!--Thương hiệu nổi bật-->
    <div class="text-center">
        <p class="mt-[40px] text-[23px] text-[#1C1C1C] capitalize relative">
            <b class="inline-block mb-[18px]">THƯƠNG HIỆU NỔI BẬT</b>
            <span class="absolute left-1/2 transform -translate-x-1/2 bottom-0 w-[160px] h-[2px] bg-[#E9E2E8]"></span>
        </p>
    </div>
    <div class="flex mx-auto justify-around w-2/3">
        <div><img class="w-[100px] h-[100px]" src="https://bizweb.dktcdn.net/100/428/250/themes/822996/assets/partner_1.jpg?1681911001649" alt=""></div>
        <div><img class="w-[100px] h-[100px]" src="https://bizweb.dktcdn.net/100/428/250/themes/822996/assets/partner_2.jpg?1681911001649" alt=""></div>
        <div><img class="w-[100px] h-[100px]" src="https://bizweb.dktcdn.net/100/428/250/themes/822996/assets/partner_4.jpg?1681911001649" alt=""></div>
        <div><img class="w-[100px] h-[100px]" src="https://bizweb.dktcdn.net/100/428/250/themes/822996/assets/partner_5.jpg?1681911001649" alt=""></div>
        <div><img class="w-[100px] h-[100px]" src="https://bizweb.dktcdn.net/100/428/250/themes/822996/assets/partner_7.jpg?1681911001649" alt=""></div>
    </div>
</main>
<!--End Main-->

<!--footer-->
<?php include_once 'footer.php' ?>