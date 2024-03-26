<?php include_once 'header.php'?>
<main></div>       
        </div>

        <div class="w-full bg-gray-100 rounded-xl py-3 flex flex-col mt-[20px]">
            <div class="font-semibold text-stone-500 ml-[120px]">
                <a href="trangchu.html">Trang chủ / </a>
                <a href="thongtintk.html">Trang khách hàng / </a>
                <a href="donhang.html">Trang đơn hàng</a>
            </div>
        </div> 
        <div class="flex gap-10 text-xl my-[40px]">
            <div class=" w-1/3 text-stone-500 text-[14px]  ml-[120px]">
                <div>
                    <h1 class="text-[19px]">TRANG TÀI KHOẢN</h1>
                    <p class="font-semibold text-[16px] text-black">Xin chào,<?= $_SESSION['email']['fullname'] ?>!</p>
                    <p class="mt-5 hover:text-red-500" ><a href="?act=info_customer">Thông tin tài khoản</a></p>
                    <p class="mt-2 text-red-500" ><a href="trangdonhang.html">Đơn hàng của bạn</a></p>
                    <p class="mt-2 hover:text-red-500" ><a href="doimatkhau.html">Đổi mật khẩu</a></p>
                    <p class="mt-2 hover:text-red-500" ><a href="diachi.html">Sổ địa chỉ (0)</a></p>
                </div>
                
            </div>
            <div class=" w-2/3 text-stone-500 mb-[20px]  ">
                <div class="mr-[270px]">
                    <h2 class="text-19px">ĐƠN HÀNG CỦA BẠN</h2>
                    <div class="flex mt-5     mb-5">
                    <h3 class="font-semibold text-gray-600 text-xs uppercase w-1/5">Mã đơn hàng	</h3>
                    <h3 class="font-semibold pl-2 text-gray-600 text-xs uppercase w-1/5 ">Ngày mua	</h3>
                    <h3 class="font-semibold text-gray-600 text-xs uppercase w-3/5">Địa chỉ	</h3>
                    <h3 class="font-semibold text-gray-600 text-xs uppercase w-1/5">Giá trị đơn hàng</h3>
                    <h3 class="font-semibold text-gray-600 text-xs uppercase w-1/5">Trạng thái vận chuyển</h3>
                    
                </div>
                <?php
                    foreach ($all_order as $hang) :
                        $trangthai = array(
                            0 => 'Chờ duyệt',
                            1 => 'Đang giao hàng',
                            2 => 'Đã giao hàng',
                            3 => 'Đã hủy đơn hàng'
                        );   
                        $trangthai = isset($trangthai[$hang['status']]) ? $trangthai[$hang['status']] : 'Không xác định';  
                                
                    ?>
                    <div class="flex w-[700px]  mt-5 ">
                    <h3 class="font-semibold text-[#2596be] text-xs uppercase w-1/5">#<?= $hang['code_order'] ?></h3>
                    <h3 class="font-semibold pl-2 text-gray-600 text-xs uppercase w-1/5 "><?= $hang['order_date'] ?></h3>
                    <h3 class="font-semibold text-gray-600 text-xs uppercase w-3/5"><?= $hang['address'] ?></h3>
                    <h3 class="font-semibold text-[#2596be] text-xs uppercase w-1/5"><?= number_format($hang['total'],0,',') ?> đ</h3>
                    <h3 class="font-semibold text-gray-600 text-xs uppercase w-1/5"><?= $trangthai ?></h3>
                    </div>
                    <?php
                    endforeach;
                    ?>       
                </div>
            </div>
</div> 
</main>
<?php include_once 'footer.php'?>