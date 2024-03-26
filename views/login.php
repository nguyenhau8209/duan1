<?php include_once "header.php"?>
</div>
</div>
<ul class="w-full bg-gray-100 rounded-xl py-4 ">
            <li class="font-semibold text-stone-500 indent-80">
                <a href="#">Trang chủ / </a>
                <a href="">Đăng Nhập tài khoản </a>
            </li>
        </ul> 
        
        <div class="min-h-screen py-16" style="background-image: linear-gradient(115deg, #ffffff00, #ffffff)">
          <!-- login container -->
          <div class="container mx-auto">
             <!-- form -->
            <div class="flex flex-col lg:flex-row w-10/12 lg:w-8/12 bg-white mx-auto shadow-lg overflow-hidden">
              <!-- image -->
              <div class="w-full lg:w-1/2 flex flex-col items-center justify-center p-12 bg-no-repeat bg-cover bg-center rounded-2xl" style="background-image: url('image/anh2.jpg');">
                <img src="layout/images/z4535010599483_1e7cd11756e512e4ac96dae048c2c3c9.jpg" alt="">
                
                <div class="bg-gray-100 ">
                    <p class="text-blue text-xl mb-3 ">QUYỀN LỢI THÀNH VIÊN</p>
                  <p class="text-blue text-sm pt-5">-Mua hàng khắp thế giới cực dễ dàng, nhanh chóng</p>
                    <p class="text-blue text-sm pt-5">-Theo dõi chi tiết đơn hàng, địa chỉ thanh toán dễ dàng</p>
                    <p class="text-blue text-sm pt-5">-Nhận nhiều chương trình ưu đãi hấp dẫn từ chúng tôi !</p>
                </div>
              </div>
              <div class="w-full lg:w-1/2 py-16 px-12">
                <div class="flex justify-around pb-3 cursor-pointer border-b-2  ">
                <h2  class="font-bold text-lg text-[#002D74] border-b-2 border-[#F10000]">Đăng Nhập</h2>
                <a href="?act=register"class="hover:text-red-500 ">Đăng ký</a>
            </div>
                <form action="?act=login_account" method="POST">
                  <div class="mt-8">
                    <p>  Email <span class="text-red-500">*</span> </p>
                    <input type="email" placeholder="Nhập Email" name="email" class="border border-gray-400 py-1 px-2  rounded-md h-[40px] w-full">
                  </div>
                  <div class="mt-8">
                    <p>Mật khẩu<span class="text-red-500">*</span> </p>
                    <input type="password" placeholder="Mật khẩu" name="password" class="border border-gray-400 py-1 px-2  rounded-md h-[40px] w-full">
                  </div>
                    <?php 
                      if(!empty($error['error']))
                      echo "<p class='text-red-500'>{$error['error']}</p>"
                    ?>
                 <a href="?act=quen_mk" class="float-right text-red-500 my-5">Quên mật khẩu?</a>
                  <div class="mt-5">
                    <button class="w-full bg-red-600  rounded-md h-[40px] text-white py-2 hover:scale-105 duration-100" name="btn_login">Đăng nhập</button>
                  </div>
                  <p class="text-xs mt-3">Chúng tôi Cam kết bảo mật và sẽ không bao giờ đăng
                    hay chia sẻ thông tin mà chưa có được sự đồng ý của bạn.</p>
                </form>    
              </div>
            </div>
          </div>
        </div>
        <?php include_once "footer.php"?>