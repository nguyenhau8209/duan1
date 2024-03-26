<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Thanh toán thành công</title>

  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.2/dist/css/splide.min.css">
  <script src="https://kit.fontawesome.com/7af42783d2.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="asset/style.css">
</head>
<style>
  button {
    background: #1AAB8A;
    color: #fff;
    border: none;
    position: relative;
    height: 60px;
    font-size: 1.6em;
    padding: 0 2em;
    cursor: pointer;
    transition: 500ms ease all;
    outline: none;
  }

  button:hover {
    background: #fff;
    color: #4d9ef9;
  }

  button:before,
  button:after {
    content: '';
    position: absolute;
    top: 0;
    right: 0;
    height: 2px;
    width: 0;
    background: #4d9ef9;
    transition: 400ms ease all;
  }

  button:after {
    right: inherit;
    top: inherit;
    left: 0;
    bottom: 0;
  }

  button:hover:before,
  button:hover:after {
    width: 100%;
    transition: 800ms ease all;
  }
</style>

<body style="font-family: 'Segoe UI', sans-serif;  
">
  <div class="container w-[1380px]  bg-gray-100 m-auto">
    <img class="w-[200px] ml-[550px] " src="https://bizweb.dktcdn.net/100/428/250/themes/822996/assets/logo.png?1681911001649" alt="">
    <div class="grid grid-cols-2 gap-24 mt-10">
      <div class="ml-10">
        <div class="flex ">
          <div class="w-[100px] mt-10">
            <i class="fa-regular fa-circle-check fa-2xl" style="color: #5dd855;"></i>
          </div>
          <div class="w-[470px]">
            <p class="text-xl font-medium ">Cảm ơn bạn đã đặt hàng</p>
          </div>
        </div>
        <div class="grid grid-cols-2 border-2 px-5">
          <div>
            <p class="text-xl font-normal ">Thông tin mua hàng</p>
            <p class="my-3"></p>
            <p class="my-3">Họ Và Tên: <?= $bill[0] ?></p>
            <p class="my-3">Email: <?= $bill[2] ?></p>
          </div>
          <div>
            <p class="text-xl font-normal ">Địa chỉ nhận hàng</p>
            <p class="my-3">Địa chỉ nhận hàng: <?= $bill[3] ?></p>
            <p class="my-3">Sdt: <?= $bill[1] ?></p>
          </div>
          <div>
            <p class="text-xl font-normal ">Phương thức vận chuyển</p>
            <p class="my-3">Giao hàng tận nơi </p>
          </div>
          <div>
            <p class="text-xl font-normal ">Phương thức thanh toán</p>
            <p class="my-3"><?= $bill[8] ?></p>
          </div>
        </div>
      </div>
      <div class="bg-white  border-1  pl-5 w-[500px]">
        <p class="border-b-2 text-xl flex items-center h-[50px]">Đơn hàng #<?=$bill[11]?></p>
        <tbody>
          <?php
          $tong = 0;
          foreach ($_SESSION['mycart'] as $cart) :
          ?>
            <div class="flex content-stretch w-[450px] my-3 gap-5">
              <tr>
                <td><img class="w-[70px] rounded-xl" src="layout/images/products/<?= isset($cart['0']) ? $cart['0'] : "" ?>" alt=""></td>
                <td class="">
                  <p class="text-black text-sm "><?= $cart['1'] ?> <br><span class="text-stone-500">SL:<?= $cart['3'] ?></span> </p>
                </td>
                <td class="flex items-center">
                  <p class="text-sm"><?= $cart['2'] ?></p>
                </td>
              </tr>
            </div>
            <?php $tong_tien = $cart[2] * $cart[3];
            $tong += $tong_tien;
            ?>
          <?php endforeach ?>
        </tbody>
        <?php
        if ($_SESSION['mycart'] != []) :
        ?>
          <div class="border-t-2">
            <div class="  my-3">
              <p class="text-sm ">Tổng cộng <span id="tongdonhang" class="text-xl float-right pr-[30px] text-[#4c9aef] "> <?php echo number_format($tong); ?></span></p>
            </div>
          </div>
        <?php
        endif
        ?>
      </div>
    </div>
    <div>
      <button class=" bg-[#4d9ef9] rounded-md  ml-[630px] mt-[30px]  "><a href="?act=main">Tiếp tục mua hàng</a></button>
    </div>
  </div>
</body>

</html>