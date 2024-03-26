<?php include_once "header_admin.php" ?>
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Chi tiết đơn hàng</h1>
    </div><!-- End Page Title -->
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="col-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                            <div class="customer-info bg-light p-4 rounded border">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h4 class="mb-4 text-primary">Thông tin khách hàng</h4>
                                            <p class="mb-2"><strong>Tên khách hàng:</strong> <?=$one_order['full_name']?></p>
                                            <p class="mb-2"><strong>Email:</strong> <?=$one_order['email']?></p>
                                            <p class="mb-2"><strong>Địa chỉ:</strong> <?=$one_order['address']?></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row row-cols-1 row-cols-md-3 g-4 py-4">
                                    <?php foreach ($order_detail as $order_product) { ?>
                                        <div class="col">
                                            <div class="card h-100 shadow">
                                                <img src="layout/images/products/<?=$order_product['product_thumbnail']?>" alt="<?=$order_product['product_title']?>" class="card-img-top" style="object-fit: cover; height: 200px;">
                                                <div class="card-body">
                                                    <h5 class="card-title"><?=$order_product['product_title']?></h5>
                                                    <p class="card-text text-danger">Giá  : <?=number_format($order_product['total_product'],0,',')?>đ</p>
                                                    <p class="card-text">Số lượng: <?=$order_product['quantity']?></p>
                                                    <p class="card-text">Size <?=$order_product['product_size']?></p>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                                <form action="?act=edit_stt_order" class="forms-sample" method="post">
                                    <div class="form-group">
                                        <input type="hidden" name="id_order" value="<?=$one_order['id']?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleTextarea1">Note</label>
                                        <textarea class="form-control" id="exampleTextarea1" disabled name="mota" rows="4"><?=$one_order['note']?></textarea>
                                    </div>
                                    <div class="form-group row" id="status-container">
                                        <label for="" class="col-sm-2 col-form-label">Trạng thái</label>
                                        <div class="col-sm-6">
                                            <!-- Thêm thuộc tính name vào thẻ select -->
                                            <select class="form-control" name="status">
                                                <option value="0" <?php if ($one_order['status'] == 0) echo 'selected'; ?>>Chờ Duyệt</option>
                                                <option value="1" <?php if ($one_order['status'] == 1) echo 'selected'; ?>>Đang giao hàng</option>
                                                <option value="2" <?php if ($one_order['status'] == 2) echo 'selected'; ?>>Giao hàng thành công</option>                                   
                                            </select>
                                        </div>
                                    </div>                                   
                                    <input type="submit" class="btn btn-gradient-primary me-2" name="add" value="Cập nhật trạng thái">
                                </form>
                            </div>
                        </div>
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
</body>

</html>
