<?php include_once 'header.php' ?>
<main>
  </div>
  </div>

  <div class="w-full my-[50px] bg-gray-100 rounded-xl text-xl py-4 ">
    <div class="font-semibold text-stone-500 ml-[120px]">
      <a href="?act=main">Trang chủ / </a>
      <a href="#">Giỏ hàng </a>

    </div>
  </div>
  <?php if (isset($_SESSION['mycart']) && !empty($_SESSION['mycart'])) : ?>
    <form action="?act=bill" method="post" class="flex gap-10 text-sm mb-[160px]">
    <div class=" text-stone-500 ml-[120px]">
      <div class="">
        <h1 class=" text-xl font-semibold text-black">Giỏ hàng của bạn</h1>
        <p class="my-5 text-black">
          Bạn đang có <span class="text-xl text-black font-semibold product-count"><?= count($_SESSION['mycart']) ?></span> sản phẩm trong giỏ hàng
        </p>
      </div>
      <div class="border-2  w-7/10 h-max rounded-md">
        <div class="flex mt-5 mx-2 mb-5">
          <h3 class="font-semibold text-gray-600 text-xs uppercase w-3/5">Sản phẩm</h3>
          <h3 class="font-semibold text-center text-gray-600 text-xs uppercase w-2/5 text-center pr-[50px]">Đơn giá</h3>
          <h3 class="font-semibold text-center text-gray-600 text-xs uppercase w-1/5 text-center">Số lượng</h3>
          <h3 class="font-semibold text-center text-gray-600 text-xs uppercase w-1/5 text-center">Tổng tiền</h3>
        </div>
        <div class="   content-stretch px-2  w-[850px] my-3 gap-5">
          <?php
          $index = 0;
          $tong = 0;
          $updatedProductSizes = array();
          foreach ($_SESSION['mycart'] as $cart) :
            $tong_tien = $cart[2] * $cart[3];
            $tong += $tong_tien;
          ?>
            <div class=" cart-item flex pt-4" data-index="<?= $index ?>">
              <!-- dưới Đây là hình ảnh sản phẩm -->
              <img class="w-[110px] h-[100px] rounded-xl" src="layout/images/products/<?= isset($cart['0']) ? $cart['0'] : "" ?>" alt="">
              <div class=" ml-3 w-[330px]">
                <p class="text-black  "><?= isset($cart['1']) ? $cart['1'] : "" ?></p>
                <p class="pt-[20px]">Size : <?= isset($cart['4']) ? $cart['4'] : "" ?></p>
              </div>
              <!--  Đây là sản phẩm -->
              <div class=" w-[100px] ml-[20px]">
                <p class="text-sm font-semibold text-black" id="hidden_price_<?= $index ?>"><?= $cart['2'] ?> ₫ </p>
              </div>
              <!--  Đây là Đơn giá -->

              <div class="buy-amount w-[100px] ml-[90px] h-[40px] flex ">
                <button type="button" class="cursor-pointer minus-btn " onclick="handleMinus(<?= $index ?>)"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 12h-15" />
                  </svg>
                </button>
                <input class="w-[50px] text-center border " type="number" name="amount" id="quantity_<?= $index ?>" min='1' value="<?= isset($cart['3']) ? $cart['3'] : "" ?>" onchange="updateCartAjax(<?= $index ?>, this.value)">
                <button type="button" class="cursor-pointer plus-btn " onclick="handlePlus(<?= $index ?>)"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                  </svg>
                </button>
              </div>
              <div class="ml-[45px]  w-[100px]">
                <p class="text-sm font-semibold text-black" id="price_<?= $index ?>" data-unit-price="<?= $cart['5'] ?>"> <?= number_format($cart['5'], 0, ',') ?> ₫</p>
                <a class="cursor-pointer" onclick="deleteCartItem(<?= $index ?>)"><i class="pt-[50px] pl-[40px] hover:text-[red] fa-regular fa-trash-can fa-xl"></i></a>
              </div>
            </div>
          <?php
            $index++;
          endforeach;
          ?>
        </div>
      </div>
    </div>
    <div class=" text-stone-500 text-xl  w-3/10  gap-5 ">
      <div class="w-[380px]">
        <h2 class="text-xl font-semibold text-black ">Thông tin đơn hàng</h2>
        <div class="flex justify-between my-5">
          <?php if ($_SESSION['mycart'] != []) : ?>
            <p class="text-xl font-semibold text-black">Tổng đơn:</p>
            <p id="totalPrice" class=" text-[#4c9aef] text-3xl font-semibold"><?= number_format($tong, 0, ',') ?>₫</p>
          <?php endif ?>
        </div>
        <input class="bg-[#4c9aef] text-white w-[380px] rounded-md my-5 h-[50px] " type="submit" name="" id="" value="THANH TOÁN">
      </div>
    </div>
  </form>
<?php else : ?>
  <div class="flex mt-[80px] mb-[200px] gap-10 text-sm my-5">
    <div class=" text-stone-500 ml-[120px]">
      <div class="">
        <h1 class="pb-[40px] text-xl font-semibold text-black">Giỏ hàng của bạn</h1>
      </div>

      <div class="border-2  w-7/10 h-max rounded-md">
        <div class="flex mt-5 mx-2 mb-5">
          <h3 class="font-semibold text-gray-600 text-xs uppercase w-3/5">Sản phẩm</h3>
          <h3 class="font-semibold text-center text-gray-600 text-xs uppercase w-2/5 text-center pr-[50px]">Đơn giá</h3>
          <h3 class="font-semibold text-center text-gray-600 text-xs uppercase w-1/5 text-center">Số lượng</h3>
          <h3 class="font-semibold text-center text-gray-600 text-xs uppercase w-1/5 text-center">Tổng tiền</h3>
        </div>
        <div class=" flex  content-stretch px-2  w-[850px] my-3 gap-5">

          <div class="flex">

          </div>
        </div>
        <!-- -->
      </div>
    </div>
    <div class=" text-stone-500 text-xl  w-3/10  gap-5 ">
      <div class="w-[380px]">
        <h2 class="text-xl font-semibold text-black ">Thông tin đơn hàng</h2>
        <div class="flex justify-between my-5">
          <p class="text-xl font-semibold text-black">Tổng đơn:</p>
          <p class="  text-[#4c9aef] text-3xl font-semibold">0 ₫</p>
        </div>
        <div class="bg-blue-100 border-t border-b border-blue-500 text-blue-700 px-4 py-3" role="alert">
          <p class=" text-center font-bold">Giỏ hàng của bạn đang trống.</p>
        </div>
      </div>
    </div>
  </div>
  <?php endif; ?>
  </div>
</main>
<script>
  function updateCartCount(count) {
    const cartCountElement = document.getElementById('cart-count');
    if (cartCountElement) {
        cartCountElement.innerText = count;
    }
}
function calculateNewCartItemCount() {
    var cartItems = document.querySelectorAll('.cart-item');
    return cartItems.length;
}
  function deleteCartItem(index) {
    if (confirm('Bạn có muốn xóa Sản phẩm này không?')) {
      var xhr = new XMLHttpRequest();
      xhr.open('POST', 'model/delete_cart_item.php', true);
      xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
      xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
          if (xhr.status === 200) {
            var response = JSON.parse(xhr.responseText);
            if (response.success) {
              // Xóa sản phẩm khỏi giao diện và cập nhật tổng tiền
              var cartItem = document.querySelector('.cart-item[data-index="' + index + '"]');
              cartItem.remove();
              updateTotalPrice();
              updateProductCount();
              var newCartItemCount = calculateNewCartItemCount();
              updateCartCount(newCartItemCount);
            } else {
              console.error('Error deleting cart item:', response.message);
            }
          }
        }
      };
      xhr.send('index=' + encodeURIComponent(index));
    }
  }

  function updateProductCount() {
    var productCountElement = document.querySelector('.product-count');
    var updatedProductCount = document.querySelectorAll('.cart-item').length;
    productCountElement.textContent = updatedProductCount;
}

  function updateCartAjax(index, newQuantity) {
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'controller/update_cart_ajax.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function() {
      if (xhr.readyState === XMLHttpRequest.DONE) {
        if (xhr.status === 200) {
          var response = JSON.parse(xhr.responseText);
          if (response.success) {
            updatePrice(index, newQuantity);
            updateTotalPrice();
          } else {
            console.error('Error updating cart:', response.message);
          }
        }
      }
    };
    xhr.send('index=' + encodeURIComponent(index) + '&quantity=' + encodeURIComponent(newQuantity));
  }

  function handleMinus(index) {
    var quantityInput = document.getElementById('quantity_' + index);
    var currentQuantity = parseInt(quantityInput.value);
    if (currentQuantity > 1) {
      quantityInput.value = currentQuantity - 1;
      updateCartAjax(index, currentQuantity - 1);
    }
  }

  function handlePlus(index) {
    var quantityInput = document.getElementById('quantity_' + index);
    quantityInput.value = parseInt(quantityInput.value) + 1;
    updateCartAjax(index, parseInt(quantityInput.value));
  }

  function updatePrice(index) {
    var quantityInput = document.getElementById('quantity_' + index);
    var priceElement = document.getElementById('price_' + index);
    var unitPrice = parseFloat(document.getElementById('hidden_price_' + index).textContent);
    var newQuantity = parseInt(quantityInput.value);
    var newPrice = newQuantity * unitPrice;
    priceElement.textContent = newPrice.toLocaleString() + ' ₫';
    // Tính lại tổng giá trị và cập nhật nội dung của phần tử tổng giá trị
    var newTotal = 0;
    var quantityInputs = document.querySelectorAll('[id^="quantity_"]');
    quantityInputs.forEach(function(quantityInput) {
      var index = quantityInput.id.split('_')[1];
      var price = parseFloat(document.getElementById('hidden_price_' + index).textContent);
      var quantity = parseInt(quantityInput.value);
      newTotal += price * quantity;
    });
    var totalPriceElement = document.getElementById('totalPrice');
    totalPriceElement.textContent = newTotal.toLocaleString() + ' ₫';
  }

  function updateTotalPrice() {
    var newTotal = 0;
    var priceElements = document.querySelectorAll('[id^="price_"]');
    priceElements.forEach(function(priceElement) {
      var price = parseFloat(priceElement.textContent.replace(/[^0-9]/g, '')); // Loại bỏ ký tự không phải số
      newTotal += price;
    });
    var totalPriceElement = document.getElementById('totalPrice');
    totalPriceElement.textContent = newTotal.toLocaleString() + ' ₫';
  }
</script>
<?php include_once 'footer.php' ?>