<footer>
    <div class=" bg-[#C00000] mt-10 h-[60px] py-[15px] mb-[20px] flex justify-between items-center  ">
        <div>
            <p class="text-[#F2F2F2] pl-[350px] text[14px] leading-[24px] font-[500] text-base">Nhận thông tin khuyến mãi mới nhất từ Thể Thao Store</p>
        </div>
        <div class="pr-[250px]">
            <form class="border text-[13px] rounded-md" action="">
                <input class="  pl-5 h-[35px] w-[300px]" type="text" placeholder="Địa Chỉ Email">
                <button class="text-white h-[30px] w-[115px]">Đăng ký</button>
            </form>
        </div>
    </div>
    <div class=" grid grid-cols-4 gap-5 pl-[120px] px-10 leading-[50px]">
        <div class="text-[14px]">
            <img class="w-[200px]" src="https://bizweb.dktcdn.net/100/428/250/themes/822996/assets/footer-logo.png?1681911001649" alt="">
            <p><b class="font-[500]">Địa chỉ</b>: 20 Nghĩa Đô - Q.Cầu Giấy - TP.Hà Nội</p>
            <p><b class="font-[500]">Email:</b> hieu707203@gmail.com</p>
            <p><b class="font-[500]">Điện thoại:</b> 0835 588 555</p>
            <p><b class="font-[500]">Zalo:</b> 0835 588 555</p>
        </div>
        <div class="pt-[20px]">
            <p class="text-[16px] font-[600] text-[#333333] leading-[26px] mb-3">Sản phẩm</p>
            <div class="flex flex-col text-[14px] leading-[24px] text-[#666666]">
                <a href="#" class="mt-2 hover:text-[#86171C]">Trang chủ</a>
                <a href="#" class="mt-2 hover:text-[#86171C]">Giới thiệu</a>
                <a href="#" class="mt-2 hover:text-[#86171C]">Sản phẩm</a>
                <a href="#" class="mt-2 hover:text-[#86171C]">Liên hệ</a>
                <a href="#" class="mt-2 hover:text-[#86171C]">Cộng Tác Viên</a>
            </div>
        </div>
        <div class="pt-[20px]">
            <p class="text-[16px] font-[600] text-[#333333] leading-[26px] mb-3">Hỗ trợ khách hàng</p>
            <div class="flex flex-col text-[14px] leading-[24px] text-[#666666]">
                <a href="?act=chinh_sach" class="mt-2 hover:text-[#86171C]">Chính sách thanh toán</a>
                <a href="?act=chinh_sach" class="mt-2 hover:text-[#86171C]">Chính sách vận chuyển</a>
                <a href="?act=chinh_sach" class="mt-2 hover:text-[#86171C]">Chính sách bảo mật</a>
            </div>
        </div>
        <div>
            <p>Fanpage</p>
            <img src="https://scontent.fhph1-1.fna.fbcdn.net/v/t39.30808-6/340968158_764848581834419_5670796682879734898_n.png?stp=dst-png_s403x403&_nc_cat=100&ccb=1-7&_nc_sid=dd9801&_nc_ohc=63n4xgAaI8EAX8CaLjn&_nc_ht=scontent.fhph1-1.fna&edm=ADwmN6EEAAAA&oh=00_AfDL7nTiTtKfAy06ECz0mdAKDZ2Jle9WyyRbu0FHWIRKrg&oe=64EDB13B" alt="">
        </div>
    </div>
</footer>
<div class="fixed z-10 top-0 left-0 bottom-0 right-0 justify-end hidden tim-kiem">
    <div class="flex justify-between w-[340px] h-full px-4 pt-5 bg-slate-100">
        <form action="?act=result_search_products" method="post" class="text-black h-[50px]">
            <p class="uppercase text-[15px] font-[500]">Tìm kiếm sản phẩm</p>
            <div class="mt-10 mb-5 gap-0 flex items-center">
                <input class="border font-[400] h-[36px] w-[250px] pl-2 text-[13px]" placeholder="Search..." type="text" name="results" id="searchInput">
                <button class="bg-red-700 hover:bg-red-600 h-[36px] w-[36px] flex items-center justify-center" type="button" id="searchButton" onclick="searchProduct()">
                    <i class="fa-solid fa-magnifying-glass text-white"></i>
                </button>
            </div>
            <div id="searchResults">
            </div>
        </form>
        <div class="">
            <button onclick="closeTimkiem()">
                <div class="icon-container" onmouseenter="addHoverClass()" onmouseleave="removeHoverClass()">
                    <i class="fa-solid fa-xmark text-[20px]" style="color: #333;" id="animated-icon"></i>
                </div>
            </button>
        </div>
    </div>
</div>
<div class="fixed top-0 left-0 bottom-0 right-0 justify-start hidden nav-bar">
    <div class="flex justify-between w-[310px] h-full px-4 uppercase pt-5 bg-black ">
        <ul class="text-white h-[50px] ">
            <li class="cursor-pointer h-[60px] text-2xl  relative after:absolute after:bottom-0 after:left-0
                after:bg-white after:h-0.5 after:w-0 hover:after:w-full after:transition-all after:ease-in-out after:duration-300">
                <a class="text-red-800 text-[13px] border-b-1" href="?act=main">TRANG CHỦ</a>
            </li>
            <li class="cursor-pointer h-[60px] text-2xl  relative after:absolute after:bottom-0 after:left-0
                after:bg-white after:h-0.5 after:w-0 hover:after:w-full after:transition-all after:ease-in-out after:duration-300">
                <a class="hover:text-red-800 text-[13px]" href="?act=gioi_thieu">GIỚI THIỆU</a>
            </li>
            <li class="cursor-pointer h-[60px] text-2xl  relative after:absolute after:bottom-0 after:left-0
                after:bg-white after:h-0.5 after:w-0 hover:after:w-full after:transition-all after:ease-in-out after:duration-300">
                <a class="hover:text-red-800 text-[13px]" href="?act=all_products">SẢN PHẨM</a>
            </li>
            <li class="cursor-pointer h-[60px] text-2xl  relative after:absolute after:bottom-0 after:left-0
                after:bg-white after:h-0.5 after:w-0 hover:after:w-full after:transition-all after:ease-in-out after:duration-300">
                <a class="hover:text-red-800 text-[13px]" href="?act=feedback">LIÊN HỆ</a>
            </li>
            <li class="cursor-pointer h-[60px] text-2xl  relative after:absolute after:bottom-0 after:left-0
                after:bg-white after:h-0.5 after:w-0 hover:after:w-full after:transition-all after:ease-in-out after:duration-300">
                <a class="hover:text-red-800 text-[13px]" href="?act=cong_tac_vien">CỘNG TÁC VIÊN</a>
            </li>
            <li class="cursor-pointer h-[60px] text-2xl  relative after:absolute after:bottom-0 after:left-0
                after:bg-white after:h-0.5 after:w-0 hover:after:w-full after:transition-all after:ease-in-out after:duration-300">
                <?php
                if (!empty($_SESSION['email'])) {
                    echo '<a class="hover:text-red-800 text-[13px]" href="?act=1">THOÁT</a>';
                } else { ?>
                    <a class="hover:text-red-800 text-[13px]" href="?act=login">ĐĂNG NHẬP / </a>
                    <a class="hover:text-red-800 text-[13px]" href="?act=register">ĐĂNG KÝ</a>
                <?php } ?>
            </li>
            <?php
            if (!empty($_SESSION['email'])) {
                echo '<li class="cursor-pointer h-[60px] text-2xl  relative after:absolute after:bottom-0 after:left-0
                after:bg-white after:h-0.5 after:w-0 hover:after:w-full after:transition-all after:ease-in-out after:duration-300">
                <a class="hover:text-red-800 text-[13px]" href="?act=info_customer">TÀI KHOẢN</a>
            </li>';
            }
            ?>
            <li class="cursor-pointer h-[60px] text-2xl  relative after:absolute after:bottom-0 after:left-0
                after:bg-white after:h-0.5 after:w-0 hover:after:w-full after:transition-all after:ease-in-out after:duration-300">
                <a class="hover:text-red-800 text-[13px]" href="?act=yeuthich">YÊU THÍCH (<?= count($_SESSION['love'])?>)</a>
            </li>
        </ul>
        <div class="">
            <button onclick="closeMenu()">
                <div class="icon-container" onmouseenter="addHoverClass()" onmouseleave="removeHoverClass()">
                    <i class="fa-solid fa-xmark text-[20px]" style="color: #ecf3fd;" id="animated-icon"></i>
                </div>
            </button>
        </div>
    </div>
</div>
<!--End footer-->
</div>
<script>
     // }
     function handleInputChange() {
      
    const priceElement = document.getElementById("price");
    const unitPrice = parseFloat(priceElement.textContent); 
    const amountInput = document.getElementById("quantity");
    const amountValue = parseInt(amountInput.value); // Chuyển đổi giá trị thành số nguyên
    // Kiểm tra nếu giá trị số lượng là số hợp lệ (lớn hơn 0)
    if (!isNaN(amountValue) && amountValue > 0) {
        // Tính tổng tiền dựa trên số lượng và giá tiền của sản phẩm
        const totalPrice = amountValue * unitPrice;

        // Hiển thị tổng tiền trên giao diện
        const totalPriceElement = document.getElementById("totalPrice");
        totalPriceElement.textContent = totalPrice;
        console.log(totalPrice);
    }
    }
    let handlePluss = () => {
        const quantityInput = document.getElementById('quantity');
        let currentQuantity = parseInt(quantityInput.value);
        const maxQuantity = parseInt(quantityInput.max);

        if (currentQuantity < maxQuantity) {
            currentQuantity++;
            quantityInput.value = currentQuantity;
            handleInputChange();
        }
    }

    let handleMinuss = () => {
        const quantityInput = document.getElementById('quantity');
        let currentQuantity = parseInt(quantityInput.value);
        const minQuantity = parseInt(quantityInput.min);

        if (currentQuantity > minQuantity) {
            currentQuantity--;
            quantityInput.value = currentQuantity;
            handleInputChange();
        }
    }
    
</script>
<script>
    function changeMainImage(newImageSrc) {
        var mainImage = document.getElementById("img-main");
        mainImage.src = "layout/images/products/" + newImageSrc;
    }
</script>

<script>
    const menuhidden = document.querySelector('.gio-hang');
    const menuhidden2 = document.querySelector('.tim-kiem');
    const menuhidden1 = document.querySelector('.nav-bar');

    const opengioHang = () => {
        menuhidden.classList.remove('hidden');
        menuhidden.classList.add('flex');
    };
    const closegioHang = () => {
        menuhidden.classList.remove('flex');
        menuhidden.classList.add('hidden');
    };

    const openMenu = () => {
        menuhidden1.classList.remove('hidden');
        menuhidden1.classList.add('flex');
    };
    const closeMenu = () => {
        menuhidden1.classList.remove('flex');
        menuhidden1.classList.add('hidden');
    };

    const openTimkiem = () => {
        menuhidden2.classList.remove('hidden');
        menuhidden2.classList.add('flex');
    };
    const closeTimkiem = () => {
        menuhidden2.classList.remove('flex');
        menuhidden2.classList.add('hidden');
    };

    // yêu thích
    var btnvar1 = document.getElementById('btnh1');

    function Toggle1() {
        if (btnvar1.style.color == "red") {
            btnvar1.style.color = "grey"
        } else {
            btnvar1.style.color = "red"
        }
    };
    //cônjg số lượng
    // let cart = document.querySelector('.cart');
    // let cartfield = document.querySelector('.cart-field');
    // let add = document.getElementsByClassName('addd');
    // for (let but of add) {
    //     but.onclick = e => {
    //         let item = Number(cart.getAttribute('data-count') || 0);
    //         cart.setAttribute('data-count', item + 1);
    //         cart.classList.add('on');
    //     }

    // }

    function addHoverClass() {
        document.getElementById("animated-icon").classList.add("hovered");
    }

    function removeHoverClass() {
        document.getElementById("animated-icon").classList.remove("hovered");
    }
    // chi tiết sản phẩm
    document.addEventListener("DOMContentLoaded", function() {
        const boxes = document.querySelectorAll(".box");
        boxes.forEach(box => {
            const button = box.querySelector(".flex");
            const description = box.querySelector(".des");
            button.addEventListener("click", function() {
                description.classList.toggle("visible");
                button.querySelector("i").classList.toggle("fa-chevron-down");
                button.querySelector("i").classList.toggle("fa-chevron-up");
            });
        });
    });
</script>
<script>
    let amount = 1; // Initial value

    // Function to handle changes in the input field
    // let handleInputChange = () => {
    //     const inputElement = document.getElementById('amount');
    //     let newValue = parseInt(inputElement.value);

    //     if (isNaN(newValue) || newValue < parseInt(inputElement.min)) {
    //         newValue = parseInt(inputElement.min);
    //     } else if (newValue > parseInt(inputElement.max)) {
    //         newValue = parseInt(inputElement.max);
    //     }

    //     amount = newValue;
    //     render(amount);
// Function to handle addition
    let handlePlus = () => {
        const inputElement = document.getElementById('amount');
        amount = Math.min(parseInt(inputElement.max), amount + 1);
        render(amount);
    }

    // Function to handle subtraction
    let handleMinus = () => {
        const inputElement = document.getElementById('amount');
        amount = Math.max(parseInt(inputElement.min), amount - 1);
        render(amount);
    }

    // Function to update the view
    let render = (value) => {
        const inputElement = document.getElementById('amount');
        inputElement.value = value;
    }
</script>
<script>
    //              const sizeInputs = document.querySelectorAll('.size-input');
    //                 const selectedSizeElement = document.getElementById('selected-size');
                    
    //                 sizeInputs.forEach(input => {
    //                     input.addEventListener('change', function() {
    //                         if (this.checked) {
    //                             const selectedSize = this.value;
    //                             console.log('Kích thước bạn đã chọn là: ' + selectedSize);
    //                             // selectedSizeElement.textContent = "/" + selectedSize;
    //                         }
    //                     });
    //                 });
    // const unitPrice = document.getElementById('price');

// Số lượng sản phẩm ban đầu
let amount1 = 1; 

// Function to handle addition
let handlePlus1 = () => {
  const inputElement = document.getElementById('amount');
  amount = Math.min(parseInt(inputElement.max), amount1 + 1);
  render(amount);
}

// Function to handle subtraction
let handleMinus1 = () => {
  const inputElement = document.getElementById('amount');
  amount = Math.max(parseInt(inputElement.min), amount1 - 1);
  render(amount);
}

// Function to update the view
let render1 = (value) => {
  const inputElement = document.getElementById('amount');
  inputElement.value = value;

  // Tính tổng tiền dựa trên số lượng và giá tiền của sản phẩm
  const totalPrice = value * unitPrice;

  // Hiển thị tổng tiền trên giao diện
  const totalPriceElement = document.getElementById("totalPrice");
  totalPriceElement.textContent = totalPrice;
}
</script>
<script>
    // JavaScript code to continuously change the placeholder text with slower effect
    document.addEventListener('DOMContentLoaded', function() {
        const inputElement = document.getElementById('searchInput');

        const placeholderTexts = [
            "Nhập tên sản phẩm ...",
            "Áo khoác ",
            "Áo thun",
            "Quần ",
            "Bộ đồ nam"
        ];

        let currentPlaceholderIndex = 0;
        let currentPlaceholderChar = 0;
        let isRetracting = false;

        function animatePlaceholder() {
            const targetPlaceholder = placeholderTexts[currentPlaceholderIndex];

            if (!isRetracting && currentPlaceholderChar < targetPlaceholder.length) {
                inputElement.placeholder = targetPlaceholder.slice(0, currentPlaceholderChar + 1);
                currentPlaceholderChar++;
            } else if (isRetracting && currentPlaceholderChar > 0) {
                inputElement.placeholder = targetPlaceholder.slice(0, currentPlaceholderChar);
                currentPlaceholderChar--;
            } else {
                isRetracting = !isRetracting;
                if (!isRetracting) {
                    currentPlaceholderIndex = (currentPlaceholderIndex + 1) % placeholderTexts.length;
                }
            }
            const delay = isRetracting ? 60 : 80; // Adjust the delay here (500ms for appearance, 1500ms for retraction)
            setTimeout(animatePlaceholder, delay);
        }

        // Call animatePlaceholder function initially
        animatePlaceholder();
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
<script>
    var swiper = new Swiper(".card-slider", {

        slidesPerView: 4,
        speed: 1000,
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    // JavaScript function to handle the search
    function searchProduct() {
        // Get the search query from the input field
        var searchQuery = document.getElementById("searchInput").value;
        localStorage.setItem("searchQuery", searchQuery);
        // Create a new XMLHttpRequest object
        var xhttp = new XMLHttpRequest();

        // Configure the AJAX request
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                // On successful response, update the search results
                document.getElementById("searchResults").innerHTML = this.responseText;
            }
        };

        // Open the AJAX request
        xhttp.open("POST", "model/search_product.php", true);

        // Set the request header
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

        // Send the AJAX request with the search query as data
        xhttp.send("query=" + encodeURIComponent(searchQuery));
    }
</script>
</body>

</html>