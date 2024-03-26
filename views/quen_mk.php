<?php include_once "header.php" ?>
</div>
</div>

<ul class="w-full bg-gray-100 rounded-xl py-4 ">
  <li class="font-semibold text-stone-500 ml-[120px]">
    <a href="trangchu.html">Trang chủ / </a>
    <a href="">Quên mật khẩu </a>
  </li>
</ul>

<div class="min-h-screen py-16" style="background-image: linear-gradient(115deg, #ffffff00, #ffffff)">
  <!-- login container -->
  <div class="container mx-auto">
    <!-- form -->
    <div class="flex flex-col lg:flex-row w-10/12 lg:w-8/12 bg-white mx-auto shadow-lg overflow-hidden">
      <!-- image -->
      <div class="lg:w-1/2 flex flex-col items-center justify-center p-12 bg-no-repeat bg-cover bg-center rounded-2xl" style="background-image: url('image/anh2.jpg');">
        <img class="" src="layout/giaodiennguoidung/image/z4535010599483_1e7cd11756e512e4ac96dae048c2c3c9.jpg" alt="">

        <div class="bg-gray-100 w-[410px] ">
          <p class="text-blue text-xl mb-3 ">QUYỀN LỢI THÀNH VIÊN</p>
          <p class="text-blue text-sm pt-5">-Mua hàng khắp thế giới cực dễ dàng, nhanh chóng</p>
          <p class="text-blue text-sm pt-5">-Theo dõi chi tiết đơn hàng, địa chỉ thanh toán dễ dàng</p>
          <p class="text-blue text-sm pt-5">-Nhận nhiều chương trình ưu đãi hấp dẫn từ chúng tôi !</p>
        </div>
      </div>
      <div class="w-full lg:w-1/2 py-16 px-12">
        <div class="flex justify-around pb-3 cursor-pointer border-b-2  ">
          <h2 class="font-bold text-lg text-[#002D74] border-b-2 border-[#F10000]">Quên mật khẩu</h2>

        </div>

        <form action="?act=sendmail" method="POST">



          <div class="mt-8">
            <p> Nhập Email<span class="text-red-500">*</span> </p>
            <input type="email" placeholder="Nhập Email " name="email" class="border border-gray-400 py-1 px-2  rounded-md h-[40px] w-full">
            <?php
            if (!empty($error['mail']))
              echo "<p class='error'>{$error['mail']}</p>"
            ?>
          </div>


          <div class="mt-5">
            <button class="w-full bg-red-600  rounded-md h-[40px] text-white py-2 hover:scale-105 duration-100" name="btn_login">Gửi yêu cầu</button>
          </div>
          <p class="text-xs mt-3">Chúng tôi Cam kết bảo mật và sẽ không bao giờ đăng
            hay chia sẻ thông tin mà chưa có được sự đồng ý của bạn.</p>
        </form>
      </div>
    </div>
  </div>
</div>



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
<?php include_once "footer.php" ?>