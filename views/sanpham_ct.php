<?php include("header.php"); ?>
</div>
</div>
<main class="mx-auto w-[1280px]">
    <div class="grid grid-cols-2 mx-auto my-[40px]">
        <div class="ml-[60px]">
            <ul id="thumbnail-list">
                <?php foreach ($gallery as $image) : ?>
                    <li><img src="layout/images/products/<?= $image['thumbnail'] ?>" alt="" class=" w-[70px] h-[70px] thumbnail" onclick="changeMainImage('<?= $image['thumbnail'] ?>')"></li>
                <?php endforeach; ?>
                <li><img src="layout/images/products/<?= $listspct['thumbnail'] ?>" alt="" class=" w-[70px] h-[70px] thumbnail" onclick="changeMainImage('<?= $listspct['thumbnail'] ?>')"></li>
            </ul>
            <div class="" id="main-image">
                <img src="layout/images/products/<?= $listspct['thumbnail'] ?>" alt="" id="img-main">
            </div>
        </div>
        <div class="float-left mt-5 my-3">
            <?php
            if (isset($listspct)) {
                extract($listspct);
                $formatted_price = number_format($listspct['price'], 0, ',');
            }
            ?>
            <p class="font-[600] text-[22px] "><?= $listspct['product_brand'] ?></p>
            <p class="my-1 text-[18px]"><?= $listspct['title'] ?></p>
            <p class="font-bold text-[16px] my-1"><?= $formatted_price ?> đ</p>
            <p class="my-1">Kích cỡ</p>
            <form action="?act=show_gh" method="POST">
                <div class="flex gap-2 my-3 justify-start radio-tile-group">
                    <?php
                    foreach ($list_size as $spct) :
                    ?>
                        <div class=" gap-1 my-3 radio-tile-group ">
                            <div class="input-container w-[60px] text-sm h-[40px]">
                                <input class="size-input" id="<?= $spct['name_size'] ?>" type="radio" name="name_size_gh" value="<?= $spct['name_size'] ?>" onclick="showSelectedSize(this.value)">
                                <div class="radio-tile w-20%">
                                    <div> <?= $spct['name_size'] ?></div>
                                </div>
                            </div>
                        </div>
                    <?php
                    endforeach;
                    ?>
                </div>
                <div class="flex gap-5">
                    <div class="buy-amount flex">
                        <button class="cursor-pointer minus-btn" type="button" onclick="handleMinus()">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 12h-15" />
                            </svg>
                        </button>
                        <input class="w-[50px] text-center border" type="number" name="quantity_gh" id="amount" min="1" max="<?= $listspct['quantity'] ?>" oninput="handleInputChange()" value="1">
                        <button class="cursor-pointer plus-btn" type="button" onclick="handlePlus()">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                            </svg>
                        </button>
                    </div>
                    <div>
                        <input type="hidden" value="<?= $_GET['id'] ?>" name="id_sp">
                        <input type="hidden" value="<?= $_GET['id'] ?>" name="id_gh">
                        <input type="hidden" value="<?= $listspct['thumbnail'] ?>" name="thumbnail_gh">
                        <input type="hidden" value="<?= $listspct['title'] ?>" name="title_gh">
                        <input type="hidden" value="<?= $listspct['price'] ?>" name="price_gh">
                    </div>
                    <div class="flex">
                        <button class="addd border bg-black hover:bg-red-600 uppercase font-semibold 
                     w-[240px] h-[40px] rounded-sm text-white add-to-cart-btn" type="submit" name="button_gh" data-product-id="<?= $product_id ?>" data-product-size="<?= $product_size ?>">thêm vào giỏ</button>
                    </div>
            </form>
            <!-- yeu thich -->
            <form action="?act=show_yt" method="POST">
                <div>
                    <input type="hidden" value="<?= $_GET['id'] ?>" name="id_ythich">
                    <input type="hidden" value="<?= $listspct['name'] ?>" name="name_yt">
                    <input type="hidden" value="<?= $listspct['price'] ?>" name="price_yt">
                    <input type="hidden" value="<?= $listspct['title'] ?>" name="title_yt">
                    <input type="hidden" value="<?= $listspct['thumbnail'] ?>" name="thumbnail_yt">
                </div>
                <button onclick="Toggle1()" id="btnh1" class="btn" type="submit" name="button_yt"><i class="fas fa-heart"></i></button>
            </form>
        </div>
        <div id="boxs">
            <div class="box">
                <button class="flex font-[600] text-[14px] items-center">
                    <div class="show my-3  ">Xem Thêm Thông Tin Sản Phẩm</div>
                    <div class="pl-[420px]">
                        <i class="fa-solid fa-chevron-down"></i>
                    </div>
                </button>
                <div class="des">
                    <p class="text-[13px]  italic my-3"><?= $listspct['desciption'] ?></p>
                </div>
            </div>
        </div>
    </div>
    </div>
    <div class="text-center">
        <p class="mt-[40px] text-[23px] text-[#1C1C1C] capitalize relative">
            <b class="inline-block mb-[18px]">CÓ THỂ BẠN CŨNG THÍCH</b>
            <span class="absolute left-1/2 transform -translate-x-1/2 bottom-0 w-[160px] h-[2px] bg-[#E9E2E8]"></span>
        </p>
    </div>
    <!--silde show-->
    <div class="container mx-auto mt-5">
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
                    foreach ($all_product_same as $pr) :
                        $formatted_price = number_format($pr['price'], 0, ',');
                    ?>
                        <div class="w-full  p-4 shadow splide__slide lg:max-w-lg">
                            <div class="space-y-2">
                                <img src="layout/images/products/<?= $pr['thumbnail'] ?>" alt="">
                                <p class="text-[14px] font-[600] leading-6 text-red-500"><?= $formatted_price ?> đ</p>
                                <a class="hover:text-[#86171C] leading-4 text-[13px] font-medium " href="?act=sanpham_ct&id=<?= $pr['id'] ?>"><?= $pr['title'] ?></a>
                            </div>
                        </div>
                    <?php
                    endforeach;
                    ?>
                </div>
            </div>
        </div>
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
    <div class=" text-center">
        <p class="mt-[40px] text-[23px] text-[#1C1C1C] capitalize relative">
            <b class="inline-block mb-[18px]">TOP 10 SẢN PHẨM BÁN CHẠY</b>
            <span class="absolute left-1/2 transform -translate-x-1/2 bottom-0 w-[160px] h-[2px] bg-[#E9E2E8]"></span>
        </p>
    </div>
    <section class="slider-container">
        <div class="container">
            <div class="swiper card-slider">
                <div class="swiper-wrapper">
                    <?php
                    foreach ($top10_selling as $pr) :
                        $formatted_price = number_format($pr['product_price'], 0, ',');
                    ?>
                        <div class="swiper-slide">
                            <div class="img-box text-left">
                                <img src="layout/images/products/<?= $pr['product_image'] ?>" alt="">
                                <p class="text-[14px] font-[600] leading-6 text-red-500"><?= $formatted_price ?> đ</p>
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

        </div>
    </section>
</main>
<?php include_once 'footer.php' ?>