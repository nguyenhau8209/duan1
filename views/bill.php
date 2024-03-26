<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thanh toán</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.2/dist/css/splide.min.css">

    <script src="https://kit.fontawesome.com/7af42783d2.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="asset/style.css">
    <link href="https://fonts.cdnfonts.com/css/segoe-ui-4?styles=18006,18005,18004,18003" rel="stylesheet">

    <style>
        @import url('https://fonts.cdnfonts.com/css/segoe-ui-4?styles=18006,18005,18004,18003');
    </style>
</head>

<body style="font-family: 'Segoe UI', sans-serif; 
">
    <main>
        </div>
        </div>
        <div class="container w-[1470px]  m-auto">
            <img class="w-[200px] flex flex-col ml-[600px]  my-5" src="https://bizweb.dktcdn.net/100/428/250/themes/822996/assets/logo.png?1681911001649" alt="">
            <form action="?act=bill_cart" method="post" class=" flex gap-5 mt-10 ">
                <?php
                $fullname = isset($_SESSION['email']['fullname']) ? $_SESSION['email']['fullname'] : "";
                $email = isset($_SESSION['email']['email']) ? $_SESSION['email']['email'] : "";
                $phone = isset($_SESSION['email']['phone']) ? $_SESSION['email']['phone'] : "";
                $address = isset($_SESSION['email']['address']) ? $_SESSION['email']['address'] : "";
                $id = isset($_SESSION['email']['id']) ? $_SESSION['email']['id'] : 2;
                ?>
                <input type="hidden" name="id" value="<?= $id ?>">
                <div>
                    <div class="flex justify-between ml-[5px]">
                        <p class="text-2xl ">Thông tin nhận hàng</p>
                        <div>
                            <?php if (isset($_SESSION['email']) && empty($_SESSION['email'])) : ?>
                                <a href="?act=login" class="text-[16px] text-blue-400 mt-1 font-semibold cursor-pointer">
                                    <i class="fa-solid mt-1 fa-right-from-bracket pr-2" style="color: #23a8e1;"></i>Đăng Nhập
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class=" grid grid-cols-1 ">
                        <p></p>
                        <input class="border  h-[55px] w-[470px] pl-5 rounded-md my-2" placeholder="Email" type="text" value="<?= $email ?>" name="email">
                        <p></p>
                        <input class="border h-[55px] w-[470px] pl-5 rounded-md my-2" placeholder="Họ và Tên" type="text" value="<?= $fullname ?>" name="fullname">
                        <p></p>
                        <input class="border h-[55px] w-[470px] pl-5 rounded-md my-2" placeholder="Số điện thoại" type="number" value="<?= $phone ?>" name="phone">
                        <p></p>
                        <input class="border h-[55px] w-[470px] pl-5 rounded-md my-2" placeholder="Địa chỉ tùy chọn" type="text" value="<?= $address ?>" name="address">
                        <p></p>
                        <textarea class="border h-[55px] w-[470px] pl-5 rounded-md my-2" name="note" id="" cols="25" rows="10" placeholder="Ghi chú"></textarea>
                    </div>
                    <div>
                    </div>
                </div>
                <div>
                    <p class="text-2xl mb-2 ">Vận chuyển</p>
                    <p class="bg-blue-200 h-[55px] w-[350px] rounded-md text-blue-500  pt-4 pl-5">Vui lòng nhập thông tin giao hàng</p>
                    <p class="text-2xl mt-10 mb-2">Thanh Toán</p>
                    <div class=" border-2 py-4 px-2 text-[18px] cursor-pointer rounded-md h-[60px] w-[350px]">
                        <input class="mr-3" type="radio" value="1" name="pttt" id="a" required>
                        Thanh toán khi giao hàng (COD)
                        <i class="fas fa-money-bill ml-3 text-blue-500"></i>
                    </div>
                    <div class="border-2 text-[18px] py-4 px-2 cursor-pointer mt-[20px] rounded-md h-[60px] w-[350px]">
                        <input class="mr-3" type="radio" value="2" name="pttt" id="b" required>
                        Chuyển khoản ngân hàng
                        <i class="fas fa-university ml-3 text-blue-500"></i>
                    </div>
                </div>
                <div class="bg-gray-100 h-max border-1 mr-[30px] pl-5 w-[600px]">
                    <p class="border-b-2 text-xl flex items-center h-[80px]">Đơn hàng (<?= count($_SESSION['mycart']) ?> sản phẩm)</p>
                    <tbody>
                        <?php
                        $tong = 40000;
                        foreach ($_SESSION['mycart'] as  $cart) :
                        ?>
                            <div class="flex content-stretch w-[550px] my-3 gap-5">
                                <tr>
                                    <td><img class="w-[70px] rounded-xl" src="layout/images/products/<?= isset($cart['0']) ? $cart['0'] : "" ?>" alt=""></td>
                                    <td class="w-[420px]">
                                        <p class="text-black "><?= isset($cart['1']) ? $cart['1'] : "" ?><br>
                                            <span class="text-stone-500">size:<?= isset($cart['4']) ? $cart['4'] : "" ?></span>
                                            <span class="text-stone-500">SL:<?= isset($cart['3']) ? $cart['3'] : "" ?></span>
                                        </p>
                                    </td>
                                    <td class="flex items-center">
                                        <p class="text-xl"><?= isset($cart['5']) ? $cart['5'] : "" ?>₫</p>
                                    </td>
                                </tr>
                            </div>
                            <?php $tong_tien = $cart[2] * $cart[3];
                            $tong += $tong_tien;
                            ?>
                            <input type="hidden" value="<?= $cart[3] ?>" name="sl" />
                            <input type="hidden" value="<?= $cart[4] ?>" name="size" />
                        <?php
                        endforeach;
                        ?>
                    </tbody>
                    <div class="border-t-2">
                        <p>Phí ship:40,000đ</p>
                        <div class="flex  my-3">
                            <p class=" w-[100px] text-xl">Tổng cộng</p>
                            <p id="tongdonhang" class="text-3xl pl-[300px] text-[#4c9aef]">
                                <?php
                                if ($_SESSION['mycart'] != []) :
                                ?>
                                    <?php echo number_format($tong); ?>
                                    <input type="hidden" value="<?= $tong ?>" name="tong_tien">
                                <?php
                                endif
                                ?>
                                ₫
                            </p>
                        </div>
                    </div>
                    <div class="flex mt-7">
                        <a href="?act=show_gh" class="cursor-pointer text-[#4991ee;] text-xl"><i class="fa-solid fa-angle-left" style="color: #4688fb;"></i> Quay về giỏ hàng</a>
                        <button class="bg-[#4c9aef] text-white w-[130px] ml-[250px] h-[55px] rounded-md text-xl" name="btn_dh">ĐẶT HÀNG</button>
                    </div>
                    <div>
                    </div>
                </div>
            </form>
        </div>
</body>

</html>