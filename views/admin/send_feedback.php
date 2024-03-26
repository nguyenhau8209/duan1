<?php include_once "header_admin.php" ?>
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Phản hồi khách hàng </h1>
    </div><!-- End Page Title -->
    <section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Gửi phản hồi cho khách hàng</h4>
                            <form action="?act=send_feedback" class="forms-sample" method="POST">
                                <div class="mb-3">
                                    <label for="email" class="form-label">Địa chỉ email</label>
                                    <input type="email" class="form-control" id="email" name="email" value="<?=$customer['email']?>" placeholder="Nhập địa chỉ email" required>
                                    <input type="hidden" class="form-control" id="id" name="id" value="<?=$customer['id']?>">
                                </div>
                                <div class="mb-3">
                                    <label for="subject" class="form-label">Chủ đề</label>
                                    <input type="text" class="form-control" id="subject" name="subject" placeholder="Nhập chủ đề phản hồi" required>
                                </div>
                                <div class="mb-3">
                                    <label for="message" class="form-label">Nội dung phản hồi của khách hàng</label>
                                    <textarea class="form-control" id="message" name="message" rows="4" disabled ><?=$customer['note']?></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="reply" class="form-label">Nội dung phản hồi của bạn</label>
                                    <textarea class="form-control" id="reply" name="reply" rows="4" placeholder="Nhập nội dung phản hồi của bạn"></textarea>
                                </div>
                                <div class="d-flex justify-content-end">
                                    <button type="submit" class="btn btn-gradient-primary me-2" name="send_feedback">Gửi phản hồi</button>
                                </div>
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
   <!-- ======= Footer ======= -->
 
</body>

</html>
