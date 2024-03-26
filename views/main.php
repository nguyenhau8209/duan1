<?php include("header.php"); ?>
<div class="mt-3">
    <div class="parallax bg-[url(https://bizweb.dktcdn.net/100/428/250/themes/822996/assets/slider_2.jpg?1681911001649)] my-10 h-[700px]  float-left bg-cover bg-no-repeat bg-center bg-fixed 
                w-[100vw] relative left-[calc(-50vw+50%)]"></div>

</div>
</div>
<!--End header-->

<!--Main-->
<main class="text-center my-10">
    <div class="">
        <p>.</p>
        <div class="flex justify-between  bg-slate-100">

            <div class="flex items-center ">
                <div>
                    <i class="fa-solid fa-phone fa-2xl"></i>
                </div>
                <div class="pl-5 text-[13px]" >
                    <h5 class="font-[500]">Hotline Hỗ Trợ</h5>
                    <span class="sub-text">083.5588.555</span>
                </div>
            </div>

            <div class="flex items-center ">
                <div>
                    <i class="fa-solid fa-car fa-2xl"></i>
                </div>
                <div class="pl-5 text-[13px]">
                    <h5 class="font-[500]">Miễn phí vận chuyển</h5>
                    <span class="sub-text">Cho đơn hàng từ 500K</span>
                </div>
            </div>

            <div class="flex items-center ">
                <div>
                    <i class="fa-solid fa-money-bill fa-2xl"></i>
                </div>
                <div class="pl-5 text-[13px]">
                    <h5 class="font-[500]">Đổi hàng dễ dàng</h5>
                    <span class="sub-text">Kiểm tra trước khi thanh toán</span>
                </div>
            </div>

            <div class="flex items-center ">
                <div>
                    <i class="fa-solid fa-building-columns fa-2xl"></i>
                </div>
                <div class="pl-5 text-[13px]">
                    <h5 class="font-[500]">Thanh toán bảo mật</h5>
                    <span class="sub-text">Chúng tôi chấp nhận các loại thẻ</span>
                </div>
            </div>

        </div>
        <!--DANH MỤC NỔI BẬT-->
        <p class="mt-5 text-[23px] text-[#1C1C1C] capitalize relative">
            <b class="inline-block mb-[18px]">DANH MỤC NỔI BẬT</b>
            <span class="absolute left-1/2 transform -translate-x-1/2 bottom-0 w-[160px] h-[2px] bg-[#E9E2E8]"></span>
        </p>
        <p class="mt-10 text-[14px] leading-[24px] text-[#666666]">Chúng tôi luôn cung cấp những mẫu thiết kế Phong cách - Thanh lịch - Hiện đại được cập
            nhật liên tục.</p>
    </div>

    <div class="mt-10 flex gap-4">
        <div class="">


            <div style="position: relative; background: url(https://bizweb.dktcdn.net/100/428/250/themes/822996/assets/feature_banner_image_1.jpg?1681911001649); width: 620px; height: 480px;">
                <div class="w-full h-full  hover:opacity-80 hover:translate-all  hover:ease-in-out hover:duration-1000 relative group">
                    <div class="absolute bg-red-600 text-black bottom-4 ml-5 pt-3 w-3/12 h-[50px] items-center hidden group-hover:block  hover:ease-in-out hover:duration-1000 uppercase tracking-wider cursor-pointer ">
                        <a href="?act=man_clothes"> Mua Hàng</a>
                    </div>
                </div>

            </div>
        </div>
        <div>
            <div style="position: relative; background: url(https://bizweb.dktcdn.net/100/428/250/themes/822996/assets/feature_banner_image_2.jpg?1681911001649); width: 620px; height: 480px;">
                <div class="w-full h-full  hover:opacity-80 hover:translate-all  hover:ease-in-out hover:duration-1000 relative group">
                    <div class="absolute bg-red-600 text-black bottom-4 ml-5 pt-3 w-3/12 h-[50px] items-center hidden group-hover:block  hover:ease-in-out hover:duration-1000 uppercase tracking-wider cursor-pointer ">
                        <a href="?act=woman_clothes"> Mua Hàng</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--HÀNG MỚI VỀ-->
    <div class="">
        <p class="mt-[40px] text-[23px] text-[#1C1C1C] capitalize relative">
            <b class="inline-block mb-[18px]">HÀNG MỚI VỀ</b>
            <span class="absolute left-1/2 transform -translate-x-1/2 bottom-0 w-[160px] h-[2px] bg-[#E9E2E8]"></span>
        </p>
        <p class="mt-10 text-[14px] leading-[24px] text-[#666666]">Danh sách sản phẩm thời trang mới nhất được cập nhật trong bộ sưu tập thời trang Thể
            Thao Store</p>
    </div>
    <!--silde show-->
    <div class="container">
        <div class="splide">
            <div class="splide__arrows">
                <button class="bg-gray-900 shadow splide__arrow splide__arrow--prev">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-white">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75" />
                    </svg>
                </button>
                <button class="bg-gray-900 shadow splide__arrow splide__arrow--next">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-white">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75" />
                    </svg>
                </button>
            </div>
            <div class="splide__track  grid grid-cols-4">

                <div class="splide__list gap-x-2">
                    <?php
                    foreach ($list as $sp) :
                        extract($sp);   
                        $formatted_price = number_format($sp['price'], 0, '.');
                    ?>
                        <div class="w-full p-4 shadow splide__slide lg:max-w-lg">
                            <div class="space-y-2 text-left">
                                <img src="layout/images/products/<?= $sp['thumbnail'] ?>" alt="">
                                <p class="text-[14px] font-[600] leading-6 text-red-500"><?= $formatted_price?>đ</p>
                                <a class="hover:text-[#86171C] leading-4 text-[13px] font-medium " href="?act=sanpham_ct&id=<?= $sp['id'] ?>"><?= $sp['title'] ?></a>
                            </div>
                        </div>
                    <?php
                    endforeach;
                    ?>
                </div>
            </div>
        </div>
    </div>
    <!--End silde show-->
    <!-- Xem Thêm Sản phẩm-->
    <div class="my-10 m-auto">
        <a href="?act=all_products">
            <button class="bg-red-800 text-white hover:bg-white hover:text-red-800 hover:border hover:border-red-800 hover:translate-all  hover:ease-in-out hover:duration-700 w-[250px] h-[50px] ">
                XEM THÊM <?= count($list) ?> SẢN PHẨM</button>
        </a>
    </div>
    <section class=" flex justify-center gap-4 my-6 mx-auto">
        <div class="w-full">
            <div class="w-[550px] h-[326px]">
                <a href="" class="">
                  <img class="w-[450px] mx-5 transform hover:scale-105 transition duration-300" src="layout/giaodiennguoidung/image/img1.png" alt="">
                </a>
              </div>
            <div class="w-[550px]  h-[224px] ">
                <h3 class="font-[700] grid  text-[25px] leading-[35px] text-left hover:text-red-800 py-3" >Thời trang mang phong cách thể thao</h3>
                <p class="text-[14px] leading-[24px] text-left mb-5 pr-5">Ngày nay thời trang thể thao được phát triển rộng rãi với những thiết kế mang tính xu hướng được mọi
                    người ưa chuộng bởi sự đơn giản - thoải mái - linh hoạt của nó không chỉ riêng cho việc tập luyện
                    thể thao mà còn là thời trang mặc hàng ngày. Việc lựa chọn những bộ đồ thao không chỉ giúp tôn vóc
                    dáng cơ thể bạn mà còn tạo sự thu hút với mọi người xung quanh !</p>
                <a class="py-3 px-6 text-white text-[13px]  float-left  bg-red-700  " href="#">XEM CHI TIẾT </a>
            </div>

        </div>
        <div class="w-full">
            <div class="w-[550px] h-[224px] py-2">
                <h3 class="font-[700] text-[25px] leading-[35px] hover:text-red-800 text-left py-3">Trang phục cho tập luyện</h3>
                <p class="text-[14px] leading-[24px] text-left mb-5">Việc tập luyện ngày này đã trở thành một điều thiết yếu mang lại nhiều lợi ích cho sức khoẻ cũng như
                    trong cuộc sống ở các bộ môn thể thao như chạy bộ, tập gym, hay nhưng môn thể thao ngoài trời...
                    Cùng với nó là sự phát triển của ngành thời trang thể thao bùng nổ với những thiết kế nổi bật phù
                    hợp cho các bộ môn tập luyện và mang phong cách hiện đại.</p>
                <a class="py-3 px-6 text-white text-[13px] bg-red-700 float-left " href="#">XEM CHI TIẾT</a>
            </div>
            <div class="w-[550px] h-[326px] ">
                <a href="#">
                    <img class="mt-[42px] transform hover:scale-105 transition duration-300" src="layout/giaodiennguoidung/image/img2.jpg" alt="">
                </a>
            </div>
        </div>
    </section>
    <div class=" text-center">
        <p class="mt-[40px] text-[23px] text-[#1C1C1C] capitalize relative">
            <b class="inline-block mb-[18px]">TOP SẢN PHẨM BÁN CHẠY</b>
            <span class="absolute left-1/2 transform -translate-x-1/2 bottom-0 w-[160px] h-[2px] bg-[#E9E2E8]"></span>
        </p>
    </div>
    <section class="slider-container">
        <div class="container mx-auto">
            <div class="swiper card-slider">
                <div class="swiper-wrapper w-[980px]">
                <?php
                    foreach ($top10_selling as $pr) :
                        $formatted_price = number_format($pr['product_price'], 0, ',');
                    ?>
                        <div class="swiper-slide">
                            <div class="img-box text-left">
                                <img src="layout/images/products/<?= $pr['product_image'] ?>" alt="">
                                <p class="text-[14px] font-[600] leading-6 text-red-500"><?= $formatted_price ?>đ</p>
                                <a class="hover:text-[#86171C] leading-4 text-[13px] font-medium " href="?act=sanpham_ct&id=<?= $pr['product_id'] ?>"><?= $pr['product_name'] ?></a>
                            </div>
                        </div>  
                    <?php
                    endforeach;
                    ?>
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-pagination"></div>
            </div>
            <div class="my-10 ">
                <a href="">
                    <button class="bg-red-800 text-white hover:bg-white hover:text-red-800 hover:border hover:border-red-800 hover:translate-all  hover:ease-in-out hover:duration-700 w-[250px] h-[50px] ">
                        XEM THÊM 30 SẢN PHẨM</button>
                </a>
            </div>
        </div>
    </section>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.2/dist/js/splide.min.js"></script>
    <script>
        var splide = new Splide('.splide', {
            type: 'loop',
            speed: 1000,
            autoplay: true,
        });

        splide.mount();
    </script>
    <!-- END HÀNG MỚI VỀ-->


    <!--TOP SẢN PHẨM CHẠY-->

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
<?php include_once "footer.php"; ?>