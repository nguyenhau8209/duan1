<?php include_once 'header.php'?>
<main>
    <ul class="w-full bg-gray-100 rounded-xl text-xl py-4 ">
        <li class="font-semibold text-stone-500 ">
            <a href="trangchu.html">Trang chủ / </a>
            <a href="thongtintk.html">Liên hệ </a>

        </li>
    </ul>
    <ul class="grid grid-cols-2 gap-5 text-xl mt-5">
        <li class=" text-stone-500 ">
            <div class="">
                <h1 class="text-2xl">Hỗ trợ khách hàng</h1>
                <p class="font-semibold text-black"></p>
                <p class="my-5 hover:text-red-500"><a href="trangkhachhang.html">Trang chủ</a></p>
                <p class="my-5 hover:text-red-500"><a href="trangdonhang.html">Giới thiệu</a></p>
                <p class="my-5 hover:text-red-500"><a href="doimatkhau.html">Sản phẩm</a></p>
                <p class="my-5 hover:text-red-500"><a href="diachi.html">Liên hệ</a></p>
            </div>

        </li>
        <li class=" text-stone-500 text-xl   gap-15 ">
            <div class="">
                <h2 class="text-2xl pr-[300px] text-2xl text-black ">Để lại tin nhắn</h2>

                <div class="">
                    <p class="my-5 text-black ">Họ và tên <span class="text-red-500">*</span> </p>
                    <input class="border h-[40px] w-[700px] pl-5" placeholder="Nhập Họ và tên" type="text">
                    <p class="my-5 text-black ">Email <span class="text-red-500">*</span> </p>
                    <input class="border h-[40px] w-[700px] pl-5" placeholder="Nhập Email " type="text">
                    <p class="my-5 text-black ">Điện thoại<span class="text-red-500">*</span> </p>
                    <input class="border h-[40px] w-[700px] pl-5" placeholder="Nhập Số Điện thoại" type="text">
                    <p class="my-5 text-black ">Nội dung<span class="text-red-500">*</span> </p>
                    <input class="border h-[100px] w-[700px] pl-5 pb-10" placeholder="Nội dung Liên Hệ" type="text">
                    <button
                        class="bg-red-700 flex justify-center mt-5 text-white h-[50px] w-[700px] pt-3  rounded-md">Gửi
                        tin nhắn</button>
                </div>
            </div>
        </li>
    </ul>
    </main>
<?php include_once 'footer.php'?>