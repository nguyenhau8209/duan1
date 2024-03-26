<?php include_once 'header_admin.php'?>
<main id="main" class="main">
    <div class="pagetitle">
      <h1>Quản lý đơn hàng</h1>
    </div><!-- End Page Title -->
    <section class="section">
      <div class="row">
        <div class="col-lg-12">
              <!-- Table with stripped rows -->
        <table id="example" class="table table-bordered table-striped" style="width:100%">
        <thead>
        <tr class="table-danger">
            <th>STT</th>
            <th >Tên Khách Hàng </th>
            <th>Email</th>
            <th>Số điện thoại</th>
            <th>Địa chỉ</th>
            <th>Note</th>
            <th>Ngày mua hàng</th>
            <th>Trạng thái</th>
            <th>Thao tác</th>
        </tr>
    </thead>
    <tbody>
    <?php 
    $status_labels = array(
        0 => 'Chờ duyệt',
        1 => 'Đang giao hàng',
        2 => 'Đã giao hàng',
        3 => 'Đã hủy đơn hàng'
    );
    $ordinalNumber = 1;
    foreach ($all_order as $order) {
    $note = strlen($order['note']) > 10 ? substr($order['note'], 0, 10) . '...' : $order['note'];
    $email = strlen($order['email']) > 10 ? substr($order['email'], 0, 10) . '...' : $order['email'];
    $older_detail = "index.php?act=order_detail&id=" . $order['id'];
    $delete_order = "index.php?act=delete_order&id=" . $order['id'];
    $status_label = isset($status_labels[$order['status']]) ? $status_labels[$order['status']] : 'Không xác định';
    // Kiểm tra trạng thái của đơn hàng
    $show_detail_link = '';
    if ($order['status'] != 2 && $order['status'] != 3) {
        $show_detail_link = '<a href="'.$older_detail.'" class="text-info" title="Show Detail" data-toggle="tooltip"><i class="bi bi-ticket-detailed"></i></a>';
    }
    echo '<tr>
        <td>' . $ordinalNumber. '</td>
        <td>' . $order['fullname']. '</td>
        <td>' . $email . '</td>
        <td>' . $order['phone_number'] . '</td>
        <td>' . $order['address'] . '</td>
        <td>' .  $note. '</td>
        <td>' . $order['order_date'] . '</td>
        <td>' . $status_label . '</td>
         <!-- Display the sizes for the order -->
        <td>
             ' . $show_detail_link . '
             <a href="'.$delete_order.'"  class="delete" title="Delete" onclick="return confirm(\'Bạn có chắc chắn muốn xóa không ?\')" data-toggle="tooltip"><i class="bi bi-trash"></i></a>
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