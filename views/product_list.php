<?php include_once "header.php" ?>
</div>
</div>

<!--End header-->

<!--Main-->
<main class="text-center my-10">
     <div><img src="./layout/giaodiennguoidung/image/cat-banner-1.jpg" alt=""></div>
    <div class="">
         <h1 class="font-[600] text-[22px] text-center py-[34px] leading-[31px] text-[#4D4D4D]">SẢN PHẨM </h1>
        <div class="flex justify-between bg-slate-100">
            <div class=" bg-gray-100 rounded-xl ml-[120px] py-4 ">
                <div class=" ml-[120px] font-semibold flex text-stone-500 ">         
                    <div id="boxs">             
                        <div class="box">
                            <button class="flex mx-[10px] font-[500] leading-[24px] text-[14px] text-[#222222] items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 7.5L7.5 3m0 0L12 7.5M7.5 3v13.5m13.5 0L16.5 21m0 0L12 16.5m4.5 4.5V7.5" />
                                </svg>
                                <div class="show my-3 ml-[10px]  ">Sắp xếp theo</div>
                                <div class="ml-[10px]">
                                    <i class="fa-solid fa-chevron-down"></i>
                                </div>
                            </button>
                            <div class="des">
                                <div class="font-[400] leading-[27px] flex float-left ml-10 mr-5 text-[14px]">
                                    <div>
                                        <div class="flex items-center mb-2">
                                            <input type="checkbox"  id="sort-name-az" value="name-az" class="common_selector name-az mr-2">
                                            <label for="sort-name-az">Tên A-Z</label>
                                        </div>
                                        <div class="flex items-center mb-2">
                                            <input type="checkbox" id="sort-name-za" value="name-za" class=" common_selector name-za mr-2">
                                            <label for="sort-name-za">Tên Z-A</label>
                                        </div>
                                        <div class="flex items-center mb-2">
                                            <input type="checkbox" id="product-new" value="pr-new" class="common_selector pr-new mr-2">
                                            <label for="product-new">Hàng Mới</label>
                                        </div>
                                        <div class="flex items-center mb-2">
                                            <input type="checkbox" id="price-increase" value="price-increase" class="common_selector price-increase mr-2">
                                            <label for="price-increase">Giá tăng dần</label>
                                        </div>
                                        <div class="flex items-center mb-2">
                                            <input type="checkbox" id="reduced-price" value="reduced-price" class="common_selector reduced-price mr-2">
                                            <label for="reduced-price">Giá giảm dần</label>
                                        </div>
                                    </div>
                                    <div class="ml-[200px]">
                                        <div class="flex items-center mb-2">
                                            <input type="checkbox" id="men-clothes" value="men-clothes" class="common_selector men-clothes mr-2">
                                            <label for="men-clothes">Đồ Nam</label>
                                        </div>
                                        <div class="flex items-center mb-2">
                                            <input type="checkbox" id="woman-clothes" value="woman-clothes" class="common_selector woman-clothes mr-2">
                                            <label for="woman-clothes">Đồ Nữ</label>
                                        </div>
                                    </div>
                                    <div class="ml-[200px]">
                                        <?php foreach ($brands as $brand) : ?>
                                            <div class="flex items-center mb-2">
                                                <input type="checkbox" class="common_selector brand mr-2" id="<?= $brand ?>" value="<?= $brand ?>">
                                                <label for="<?= $brand ?>"><?= $brand ?></label>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                    <!-- Thêm các tùy chọn khác -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <section class="slider-container ">
        <div class="container">
            <div class="swiper card-slider">
                <div class="filter_data swiper-wrapper grid grid-cols-4 ">

                </div>
            </div>
        </div>
    </section>
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
<script>
$(document).ready(function(){
    filter_data();
    function filter_data()
    {
        $('.filter_data').html('<div id="loading" style="" ></div>');
        var action = 'fetch_data';
        // var minimum_price = $('#hidden_minimum_price').val();
        // var maximum_price = $('#hidden_maximum_price').val();
        var brand = get_filter('brand');
        var name_az = get_filter('name-az');
        var name_za = get_filter('name-za');
        var pr_new = get_filter('pr-new');
        var pr_increase = get_filter('price-increase');
        var reduced_pr = get_filter('reduced-price');
        var men_clothes = get_filter('men-clothes');
        var woman_clothes = get_filter('woman-clothes');
        $.ajax({
            url:"controller/fetch_data.php",
            method:"POST",
            data:{action:action,brand:brand,name_az:name_az,name_za:name_za,pr_new:pr_new,price_increase:pr_increase,reduced_price:reduced_pr,men_clothes:men_clothes,woman_clothes},
            success:function(data){
                $('.filter_data').html(data);
            }
        });
    }
    function get_filter(class_name)
    {
        var filter = [];
        $('.'+class_name+':checked').each(function(){
            filter.push($(this).val());
        });
        return filter;
    }
    $('.common_selector').click(function(){
        filter_data();
    });

});
</script>
<?php include_once "footer.php"?>