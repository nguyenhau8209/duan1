<?php include_once 'header.php' ?>
</div>
</div>
<main class="mx-auto">
    <section class="container bg-gray-100 rounded-xl py-3 flex flex-col mt-[20px]">
        <ul class="flex ml-[150px] text-[14px] ">
            <li class=""><a href="#" class="text-center">Trang chủ /</a></li>
            <li><a href="#" class="text-center ml-[20px] text-[#8D0000]">thông tin tài khoản</a></li>
        </ul>
    </section>
    <div class="container flex justify-between w-[1280px] py-[20px]">
        <div class="w-[265px] ml-[150px]">
            <h3 class="text-[19px] mb-[10px]">TRANG TÀI KHOẢN</h3>
            <p class="font-[700] text-[14px]  text-black mb-[40px]">Xin chào,<?= $_SESSION['email']['fullname'] ?>!</p>
            <ul class="space-y-3 text-[14px] text-stone-500">
                <li class="menu-item"><a href="#" class=" hover:text-[#8D0000]"><span>Thông tin tài khoản</span><span class="pl-[5px] separator"><i class="fa-regular fa-hand-pointer fa-bounce"></i></span></a></li>
                <li class="menu-item"><a href="?act=your_order" class=" hover:text-[#8D0000]"><span>Đơn hàng</span><span class="pl-[5px] separator"><i class="fa-regular fa-hand-pointer fa-bounce"></i></span></a></li>
                <li class="menu-item"><a href="#" class=" hover:text-[#8D0000]"><span>Đổi mật khẩu</span><span class="pl-[5px] separator"><i class="fa-regular fa-hand-pointer fa-bounce"></i></span></a></li>
                <li class="menu-item"><a href="#" class=" hover:text-[#8D0000]"><span>Sổ địa chỉ</span><span class="pl-[5px] separator"><i class="fa-regular fa-hand-pointer fa-bounce"></i></span></a></li>
            </ul>
        </div>
        <div class="w-[800px] text-[14px] ph">
            <h3 class="text-[19px] mb-[30px]">THÔNG TIN TÀI KHOẢN</h3>
            <div class="flex items-center my-3">
                <p class="font-[700] text-[#141414]">Họ tên :</p>
                <p class="ml-2 text-[14px]"><?= $_SESSION['email']['fullname'] ?></p>
            </div>
            <div class="flex items-center my-4">
                <p class="font-[700] text-[#141414]">Email :</p>
                <p class="ml-3 text-[14px]"><?= $_SESSION['email']['email'] ?></p>
            </div>
            <div class="flex items-center my-4">
                <p class="font-[700] text-[#141414]">Số đt :</p>
                <p class="ml-3 text-[14px]"><?= $_SESSION['email']['phone'] ?></p>
            </div>
            <div class="flex items-center my-4">
                <p class="font-[700] text-[#141414]">Địa chỉ :</p>
                <p class="ml-2 text-[14px]"><?= $_SESSION['email']['address'] ?></p>
            </div>
        </div>
    </div>
</main>
<?php include_once 'footer.php' ?>