<?php include_once "header_admin.php" ?>
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Thêm sản phẩm</h1>
    </div><!-- End Page Title -->
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="col-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <p class="card-description"></p>
                                <form action="?act=edit_product" class="forms-sample" method="post" enctype="multipart/form-data">
                                    <div class="col-md-4 mb-3">
                                        <label for="inputState" class="form-label">Danh mục</label>
                                        <select id="inputState" name="id_cate" class="form-select">
                                            <?php foreach ($all_categories as $cate) {
                                                var_dump($cate);
                                                echo '<option value=' . $cate['id'] . '>' . $cate['name'] . '</option>';
                                            } ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <input type="hidden" name="old_thumbnail" value="<?=$product['thumbnail']?>">
                                        <input type="hidden" name="id_product" value="<?=$product['id']?>">
                                        <label for="exampleInputName1">Tên sản phẩm</label>
                                        <input type="text" class="form-control" id="exampleInputName1" placeholder="Name" name="name" value="<?=$product['title']?>">
                                    </div>
                                    <!-- <div class="form-group">
                                        <label for="exampleInputPassword4">Phân loại</label>
                                        <input type="text" class="form-control" id="exampleInputPassword4" placeholder="" name="classify">
                                    </div> -->
                                    <div class="form-group">
                                        <label for="exampleInputName1">Số lượng</label>
                                        <input type="text" class="form-control" id="exampleInputName1" name="quantity" value="<?=$product['quantity']?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputName1">Giá</label>
                                        <input type="number" class="form-control" id="exampleInputName1" name="price" value="<?=$product['price']?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Ảnh</label>
                                        <input type="file" name="img" class="file-upload-default">
                                        <div class="input-group col-xs-12">
                                            <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                                            <span class="input-group-append">
                                                <button class="file-upload-browse btn btn-gradient-primary" type="button">Upload</button>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleTextarea1">Mô tả</label>
                                        <textarea class="form-control" id="exampleTextarea1" name="mota" rows="4"><?=$product['desciption']?></textarea>
                                    </div>

                                    <div class="form-group row" id="size-container">
                                        <label for="size-select" class="col-sm-2 col-form-label">Size</label>
                                        <div class="col-sm-6">
                                            <select class="form-control" id="size-select">
                                                <option value="s">Size S</option>
                                                <option value="m">Size M</option>
                                                <option value="l">Size L</option>
                                                <option value="xl">Size XL</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-4">
                                            <button type="button" class="btn btn-gradient-primary" id="add-size-btn">Thêm Size</button>
                                        </div>
                                    </div>
                                    <!-- Phần chứa các size đã thêm -->
                                    <div class="form-group row" id="selected-sizes">
                                        <!-- Các size thêm vào sẽ được hiển thị ở đây -->
                                    </div>

                                    <!-- Input ẩn để lưu các size đã chọn -->
                                    <input type="hidden" name="sizes" id="selected-sizes-input" value="">
                                    <input type="submit" class="btn btn-gradient-primary me-2" name="add" value="Sửa">
                                    <button type="reset" class="btn btn-gradient-primary me-2">Reset</button>
                                    <button class="btn btn-secondary">Quay lại</button>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
</main><!-- End #main -->
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="views/admin/assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="views/admin/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="views/admin/assets/vendor/chart.js/chart.umd.js"></script>
  <script src="views/admin/assets/vendor/echarts/echarts.min.js"></script>
  <script src="views/admin/assets/vendor/quill/quill.min.js"></script>
  <script src="views/admin/assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="views/admin/assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="views/admin/assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="views/admin/assets/js/main.js"></script>
  <script>
    document.addEventListener('DOMContentLoaded', function () {
        var fileInput = document.querySelector('input[type=file]');
        var uploadButton = document.querySelector('.file-upload-browse');

        uploadButton.addEventListener('click', function () {
            fileInput.click();
        });
    });
  </script>
   <!-- ======= Footer ======= -->
 <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>NiceAdmin</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
      Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
    </div>
  </footer><!-- End Footer -->
  <script>
    // Script để thêm và xóa size
    document.getElementById('add-size-btn').addEventListener('click', function() {
        const selectedSize = document.getElementById('size-select').value;
        const selectedSizesDiv = document.getElementById('selected-sizes');

        // Kiểm tra xem size đã tồn tại hay chưa
        const existingSizes = document.querySelectorAll('.selected-size');
        for (const size of existingSizes) {
            if (size.dataset.value === selectedSize) {
                alert('Size đã tồn tại.');
                return;
            }
        }

        // Tạo phần tử div để hiển thị size đã chọn
        const sizeDiv = document.createElement('div');
        sizeDiv.classList.add('col-sm-2', 'selected-size');
        sizeDiv.dataset.value = selectedSize;

        // Chuyển đổi giá trị size từ mã viết thường sang viết hoa
        switch (selectedSize) {
            case 's':
                sizeDiv.textContent = 'S';
                break;
            case 'm':
                sizeDiv.textContent = 'M';
                break;
            case 'l':
                sizeDiv.textContent = 'L';
                break;
            case 'xl':
                sizeDiv.textContent = 'XL';
                break;
            default:
                break;
        }

        // Button để xóa size
        const deleteButton = document.createElement('button');
        deleteButton.textContent = 'Xóa';
        deleteButton.classList.add('btn', 'btn-sm', 'btn-danger');
        deleteButton.addEventListener('click', function() {
            selectedSizesDiv.removeChild(sizeDiv);
            updateSelectedSizesInput();
        });

        sizeDiv.appendChild(deleteButton);
        selectedSizesDiv.appendChild(sizeDiv);
        updateSelectedSizesInput();
    });

    // Hàm cập nhật giá trị của input ẩn khi có sự thay đổi về các size đã chọn
    function updateSelectedSizesInput() {
        const selectedSizesDiv = document.getElementById('selected-sizes');
        const selectedSizes = selectedSizesDiv.querySelectorAll('.selected-size');
        const selectedSizesInput = document.getElementById('selected-sizes-input');
        const selectedSizesValues = [];

        // Chuyển đổi giá trị size từ mã viết thường sang viết hoa
        for (const size of selectedSizes) {
            switch (size.dataset.value) {
                case 's':
                    selectedSizesValues.push('S');
                    break;
                case 'm':
                    selectedSizesValues.push('M');
                    break;
                case 'l':
                    selectedSizesValues.push('L');
                    break;
                case 'xl':
                    selectedSizesValues.push('XL');
                    break;
                default:
                    break;
            }
        }

        selectedSizesInput.value = selectedSizesValues.join(',');
    }
</script>
</body>

</html>
