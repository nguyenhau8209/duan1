<?php include_once "header.php"?>
</div>
</div>
<main class=" mx-auto w-[1280px] text-center my-10">
    <div class="header">
        <div class="mt-3">
            <div class="parallax bg-[url(https://bizweb.dktcdn.net/100/428/250/themes/822996/assets/cat-banner-1.jpg?1681911001649)] my-10 h-[700px]  float-left bg-cover bg-no-repeat bg-center bg-fixed 
                w-[100vw] relative left-[calc(-50vw+50%)]">
            </div>
        </div>
    </div>
    <div class="">
        <p>.</p>
        <div class="flex justify-between bg-slate-100">
            <ul class=" flex bg-gray-100 rounded-xl py-4 ">
                <a class="hover:text-red-500" href="?act=main">Trang chủ <span class="px-5">/</span></a>
                <li class="text-[#8D0000]">Kết quả tìm kiếm</li>
            </ul>

        </div>
    </div>
    <div class="mt-7 m-auto">
        <h1 class="text-[20px] font-[500] text-[#333333]"> CÓ <?= count($results) ?> KẾT QUẢ TÌM KIẾM PHÙ HỢP  </h1>
    </div>
    <section class="slider-container">
        <div class="container">
            <div class="swiper card-slider">
                <div class="swiper-wrapper grid grid-cols-4 gap-4">
                    <?php  
                    foreach ($results as $products) :                 
                    ?>
                        <div class="swiper-slide mt-5 text-start">
                            <div class="img-box ">
                                <img src="layout/images/products/<?= $products['thumbnail'] ?>" alt="">
                                <p class="font-[600] text-red-500 text-[14px]"><?= $formatted_price = number_format($products['price'], 0, ',')?> đ</p>
                                <a class="hover:text-red-500 font-[500] text-[13px]" href="?act=sanpham_ct&id=<?= $products['id'] ?>"><?= $products['title'] ?></a>
                            </div>
                        </div>
                    <?php
                    endforeach;
                    ?>

                </div>

            </div>

        </div>
    </section>
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
</main>
<?php include_once "footer.php"?>