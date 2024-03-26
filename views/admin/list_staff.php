<?php include_once 'header_admin.php'?>
<main id="main" class="main">
    <div class="pagetitle">
      <h1>Quản lý tài khoản</h1>
    </div><!-- End Page Title -->
    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <!-- Table with stripped rows -->
              <table id="example" class="table table-bordered table-striped" style="width:100%">
          <thead>
        <tr class="table-danger">
            <th>Id</th>
            <th>Họ Và Tên </th>
            <th>Email</th>
            <th>Số điện thoại</th>
            <th>Địa chỉ</th>
            <th>Thao tác</th>
        </tr>
    </thead>
    <tbody>
    <?php
       $stt = 1;
       foreach ($all_staffs as $staffs) {
        $edit_staff = "index.php?act=update_staff&id_user=" . $staffs['id'];
        $delete_staff = "index.php?act=delete_staff&id_user=" . $staffs['id'];
        if ($staffs['id']===$user['id']) {
          echo '';
        }else{
          echo '<tr>
          <td>' . $stt . '</td>
          <td>' . $staffs['fullname'] . '</td>
          <td>' . $staffs['email'] . '</td>
          <td>' . $staffs['phone'] . '</td>
          <td>' . $staffs['address'] . '</td>
          <td>
              <a href="'.$edit_staff.'" class="edit" title="Edit" data-toggle="tooltip"><i class="bi bi-pencil"></i></a>
              <a href="'.$delete_staff.'" class="delete" title="Delete" data-toggle="tooltip" onclick="return confirm(\'Bạn có chắc chắn muốn xóa không ?\')"><i class="bi bi-trash3"></i></a>
          </td>
          </tr>';
          $stt++;
        }   
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