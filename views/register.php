<?php include_once "header.php"?>
          </div>
        </div>
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
                    <a href="?act=login" class="hover:text-red-500 ">Đăng Nhập</a>
                <h2  class="font-bold text-lg text-[#002D74] border-b-2 border-[#F10000]">Đăng ký</h2>
            </div>
               
                <form action="?act=register_account" method="POST">
                  <div class="  mt-5">
                    <p>Họ Và Tên <span class="text-red-500">*</span> </p>
                    <input type="text" placeholder="Nhập Họ và Tên" name="fullname" class="border border-gray-400 py-1 px-2 h-[40px] rounded-md h-[40px] w-full"
                    value="<?=isset($_POST['fullname'])?$_POST['fullname']:''?>"
                    >
                  </div>
                  <?php 
                      if(!empty($error['fullname']))
                      echo "<p class='error text-rose-600'>{$error['fullname']}</p>"
                    ?>
                  <div class="mt-5">
                    <p>Số điện thoại <span class="text-red-500">*</span> </p>
                    <input type="number" placeholder="Nhập Số điện thoại" name="phone" class="border border-gray-400 py-1 px-2  rounded-md h-[40px] w-full"
                    value="<?=isset($_POST['phone'])?$_POST['phone']:''?>"
                    >
                  </div>
                  <?php 
                      if(!empty($error['phone']))
                      echo "<p class='error text-rose-600'>{$error['phone']}</p>"
                    ?>
                  <div class="mt-5">
                    <p>  Email <span class="text-red-500">*</span> </p>
                    <input type="email" placeholder="Nhập Email" name="email" class="border border-gray-400 py-1 px-2  rounded-md h-[40px] w-full"
                    value="<?=isset($_POST['email'])?$_POST['email']:''?>"
                    >
                  </div>
                  <?php 
                      if(!empty($error['email']))
                      echo "<p class='error text-rose-600'>{$error['email']}</p>"
                    ?>
                  <div class="mt-5">
                    <p>Mật khẩu<span class="text-red-500">*</span> </p>
                    <input type="password" placeholder="Mật khẩu" name="password" class="border border-gray-400 py-1 px-2  rounded-md h-[40px] w-full"
                    value="<?=isset($_POST['password'])?$_POST['password']:''?>"
                    >
                  </div>
                  <?php 
                      if(!empty($error['password']))
                      echo "<p class='error text-rose-600'>{$error['password']}</p>"
                    ?>
                  <div class="mt-5">
                    <p>Xác nhận lại mật khẩu<span class="text-red-500">*</span> </p>
                    <input type="password" placeholder="Xác nhận mật khẩu" name="password1" class="border border-gray-400 py-1 px-2  rounded-md h-[40px] w-full" 
                    value="<?=isset($_POST['password1'])?$_POST['password1']:''?>">
                  </div>
                  <?php 
                      if(!empty($error['password1']))
                      echo "<p class='error text-rose-600'>{$error['password1']}</p>"
                    ?>
                  <div class="mt-5">
                  
                    <input type="checkbox" class="border border-gray-400">
                    <span>
                      Tôi chấp nhận <a href="#" class="text-purple-500 font-semibold">Điều khoản sử dụng</a> &  <a href="#" class="text-purple-500 font-semibold">Quyền riêng tư</a> 
                    </span>
                  </div>
                  <div class="mt-5">
                    <button class="w-full bg-red-600  rounded-md h-[40px] text-white py-2 hover:scale-105 duration-100" name="btn_register">Tạo Tài Khoản</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        

    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <script>
         var swiper = new Swiper(".card-slider", {
            
      slidesPerView: 4,
      speed:1000,
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
<?php include_once "footer.php"?>
           