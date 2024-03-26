<?php include_once 'header.php' ?>
</div>
</div>
<main class="mx-auto ">
    <section class="container bg-gray-100 rounded-xl py-3 flex flex-col mt-[20px]">
        <ul class="flex ml-[150px] text-[14px] ">
            <li class=""><a href="#" class="text-center">Trang chủ /</a></li>
            <li><a href="#" class="text-center ml-[20px] text-[#8D0000]">Liên hệ hỗ trợ đặt hàng </a></li>
        </ul>
    </section>
    <div class="container flex justify-between w-[1280px] py-[20px]">
        <div class="w-[265px] ml-[150px]">
            <h3 class="text-lg font-semibold mb-3">Hỗ trợ khách hàng</h3>
            <ul class="space-y-2 text-[#222222]">
                <li class="menu-item"><a href="?act=main" class=" hover:text-[#8D0000]"><span>Trang chủ</span><span class="pl-[5px] separator"><i class="fa-regular fa-hand-pointer fa-bounce"></i></span></a></li>
                <li class="menu-item"><a href="?act=gioi_thieu" class=" hover:text-[#8D0000]"><span>Giới thiệu</span><span class="pl-[5px] separator"><i class="fa-regular fa-hand-pointer fa-bounce"></i></span></a></li>
                <li class="menu-item"><a href="?act=all_products" class=" hover:text-[#8D0000]"><span>Sản phẩm</span><span class="pl-[5px] separator"><i class="fa-regular fa-hand-pointer fa-bounce"></i></span></a></li>
                <li class="menu-item"><a href="#" class=" hover:text-[#8D0000]"><span>Liên hệ</span><span class="pl-[5px] separator"><i class="fa-regular fa-hand-pointer fa-bounce"></i></span></a></li>
                <li class="menu-item"><a href="?act=cong_tac_vien" class=" hover:text-[#8D0000]"><span>Cộng tác viên</span><span class="pl-[5px] separator"><i class="fa-regular fa-hand-pointer fa-bounce"></i></span></a></li>
            </ul>
        </div>
        <form class="w-[800px] ph">
            <h3 class="text-lg font-semibold mb-3">thethaostore.vn</h3>
            <p class="text-[14px] text-[#222222] leading-[24px] mb-[15px]">Được thành lập vào năm 2002 bởi một bộ đôi tín đồ thời trang, Evo Milana đã nhanh chóng trở thành một trong những công ty phân phối thời trang lớn nhất trong việc giới thiệu các thương hiệu thời trang cao cấp và sang trọng tại Việt Nam. Sau thành công ngoài mong đợi của cửa hàng đầu tiên, hiện Evo Milana đang là ngôi nhà chung của hơn 21 thương hiệu đình đám thế giới, thổi vào thị trường Việt Nam những giấc mơ thời trang bất tận.</p>
            <div class="flex items-center my-3">
                <i class="fa-solid fa-house-user"></i>
                <p class="ml-2 text-[14px]">20 Nghĩa Đô - Q.Cầu Giấy - TP.Hà Nội</p>
            </div>
            <div class="flex items-center my-3">
                <i class="fa-solid fa-phone"></i>
                <p class="ml-2 text-[14px]">0835 588 555</p>
            </div>
            <div class="flex items-center my-3">
                <i class="fa-solid fa-square-envelope"></i>
                <p class="ml-2 text-[14px]">hieu707203@gmail.com</p>
            </div>
            <h3 class="text-lg font-semibold my-3">Để lại tin nhắn</h3>
            <div class="mt-5" id="notification" style="display: none;">
                <!-- Nội dung thông báo sẽ được hiển thị ở đây -->
            </div>
            <div class="my-5 text-[14px]">
                <p class="text-[#141414] mb-1  font-[500]">Họ và tên <span class="text-red-500">*</span></p>
                <input class="border h-10 w-full pl-2" placeholder="Nhập Họ và tên" name="name" type="text">
                <p class="text-[#141414] my-1 font-[500]">Email <span class="text-red-500">*</span></p>
                <input class="border h-10 w-full pl-2" placeholder="Nhập Email" name="email" type="text">
                <p class="text-[#141414] my-1 font-[500]">Điện thoại <span class="text-red-500">*</span></p>
                <input class="border h-10 w-full pl-2" placeholder="Nhập Số Điện thoại" name="phone" type="text">
                <p class="text-[#141414] my-1 font-[500]">Nội dung <span class="text-red-500">*</span></p>
                <input class="border h-[120px] w-full pl-2 pb-[80px]" name="message" placeholder="Nội dung Liên Hệ" type="text">
                <button  class="bg-red-700 text-white h-12 w-full rounded-md mt-3">GỬI TIN NHẮN</button>
            </div>
        </form>
    </div>
</main>
<script>
document.addEventListener('DOMContentLoaded', function() {
  const form = document.querySelector('.ph');
  const notification = document.getElementById('notification');
  const submitButton = form.querySelector('button');

  form.addEventListener('submit', function(event) {
    event.preventDefault(); // Ngăn chặn sự kiện mặc định submit

    // Lấy dữ liệu từ các trường input
    const name = form.querySelector('[name="name"]').value;
    const email = form.querySelector('[name="email"]').value;
    const phone = form.querySelector('[name="phone"]').value;
    const message = form.querySelector('[name="message"]').value;
   
      // Kiểm tra xem các trường có bị để trống hay không
      if (name.trim() === '' || email.trim() === '' || phone.trim() === '' || message.trim() === '') {
      notification.innerHTML = '<p class="text-red-500">Vui lòng điền đầy đủ thông tin bắt buộc.</p>';
      notification.style.display = 'block';
      return;
    }
    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    const phonePattern = /^[0-9]+$/;
    
    if (!emailPattern.test(email)) {
      notification.innerHTML = '<p class="text-red-500">Định dạng email không hợp lệ.</p>';
      notification.style.display = 'block';
      return;
    }

    if (!phonePattern.test(phone)) {
      notification.innerHTML = '<p class="text-red-500">Số điện thoại không hợp lệ.</p>';
      notification.style.display = 'block';
      return;
    }
    // Gửi dữ liệu bằng AJAX
    sendData(form, name, email, phone, message);
  });
});
function sendData(form, name, email, phone, message) {
  const xhr = new XMLHttpRequest();
  xhr.open('POST', 'controller/feedback.php', true);
  xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
  xhr.onreadystatechange = function() {
    if (xhr.readyState === 4 && xhr.status === 200) {
      // Hiển thị thông báo thành công
      notification.innerHTML = '<p class="bg-green-300 p-3 rounded">Tin nhắn đã được gửi thành công. Chúng tôi sẽ liên hệ với bạn sớm nhất có thể.</p>';
      notification.style.display = 'block';
      // Xóa dữ liệu trong các trường input
      form.querySelectorAll('input').forEach(input => input.value = '');
    }
  };
  const data = `name=${encodeURIComponent(name)}&email=${encodeURIComponent(email)}&phone=${encodeURIComponent(phone)}&message=${encodeURIComponent(message)}`;
  xhr.send(data);
}
</script>


<?php include_once 'footer.php' ?>