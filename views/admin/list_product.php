<?php include_once 'header_admin.php'?>
<main id="main" class="main">
    
    <div class="pagetitle">
      <h1>Quản lý sản phẩm</h1>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
            <form action="?act=show_product_admin" class="forms-sample" method="post" enctype="multipart/form-data">
            <div class="d-flex align-items-center">
                <div class="col-md-4 mb-3 me-2">
                    <label for="inputState" class="form-label">Danh mục</label>
                    <select id="inputState" name="id_cate" class="form-select">
                        <option value=""  >Tất cả</option>
                        <?php foreach ($all_category as $cate) {                          
                            echo '<option value='.$cate['id'].'>'.$cate['name'].'</option>';
                        }?>
                    </select>
                </div>
                <input type="submit" class="btn btn-primary mt-3" name="listok" value="show">
            </div>
            </form>
              <!-- Table with stripped rows -->
        <table id="example" class="table table-bordered table-striped" style="width:100%">
        <thead>
        <tr class="table-danger">
            <th>STT</th>
            <th >Name</th>
            <th>Ảnh</th>
            <th>Size</th>
            <th>Số lượng</th>
            <th>Giá</th>
            <th>Ngày tạo</th>
            <th>Ngày cập nhật</th>
            <th >Mô tả</th>
            <th>Thao tác</th>
        </tr>
    </thead>
    <tbody>
    <?php 
    $ordinalNumber = 1;
    foreach ($all_product as $product) {
    $name = strlen($product['title']) > 20 ? substr($product['title'], 0, 20) . '...' : $product['title'];
    $description = strlen($product['desciption']) > 20 ? substr($product['desciption'], 0, 20) . '...' : $product['desciption'];
    $edit_pr = "index.php?act=update_product&id=" . $product['id'];
    $delete_pr = "index.php?act=delete_product&id=" . $product['id'];
    $target_dir = "layout/images/products/";
    $thumbnail_path = $target_dir . $product['thumbnail']; // Đường dẫn đúng đến ảnh sản phẩm
    // Kiểm tra xem ảnh có tồn tại hay không
    if (file_exists($thumbnail_path)) {
        $thumbnail = "<img src='" . $thumbnail_path . "' height='80' width='65' class='img-thumbnail'>";
    } else {
        $thumbnail = "error img";
    }
    $formatted_price = number_format($product['price'], 0, ',');
    echo '<tr>
        <td>' . $ordinalNumber. '</td>
        <td>' . $name. '</td>
        <td>' . $thumbnail . '</td>
        <td>' . $product['sizes'] . '</td>
        <td>' . $product['quantity'] . '</td>
        <td>' .  $formatted_price. '</td>
        <td>' . $product['created_at'] . '</td>
        <td>' . $product['updated_at'] . '</td>
        <td>' . $description . '</td>
         <!-- Display the sizes for the product -->
        <td>
             <a href="'.$edit_pr.'" class="edit" title="Edit" data-toggle="tooltip"><i class="bi bi-pencil"></i></a>
             <a href="'.$delete_pr.'" onclick="return confirm(\'Bạn có chắc chắn muốn xóa không ?\')" class="delete" title="Delete" data-toggle="tooltip"><i class="bi bi-trash3"></i></a>
        </td>
    </tr>';
    $ordinalNumber++;
    }?>
    </tbody>
    </table>

              <!-- End Table with stripped rows -->
 
            </div>
          </div>
       
        </div>
      </div>
    </section>

  </main><!-- End #main -->

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
    $(document).ready(function () {
      $('#example').DataTable();
    })
  </script>

  

</body>
</html>