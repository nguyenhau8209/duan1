<?php
if (isset($_SESSION['user'])) {
  $user=$_SESSION['user'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Dashboard - NiceAdmin Bootstrap Template</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="views/admin/assets/img/favicon.png" rel="icon">
  <link href="views/admin/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
  <link href="views/admin/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="views/admin/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="views/admin/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="views/admin/assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="views/admin/assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="views/admin/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="views/admin/assets/vendor/simple-datatables/style.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0-alpha3/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>

  <style>
.image-previews {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
}

.image-preview {
    position: relative;
    width: 100px; /* Điều chỉnh kích thước ảnh nhỏ tại đây */
    height: auto;
    border: 1px solid #ccc;
    padding: 5px;
    box-sizing: border-box;
}

.image-preview img {
    max-width: 100%;
    max-height: 100%;
}

.remove-image-btn {
    position: absolute;
    top: 5px;
    right: 5px;
    background-color: rgba(255, 255, 255, 0.8);
    border: none;
    border-radius: 50%;
    padding: 2px;
    font-size: 12px;
    cursor: pointer;
    transition: background-color 0.2s;
}

.remove-image-btn:hover {
    background-color: rgba(255, 0, 0, 0.8);
    color: white;
}
</style>
  <!-- Template Main CSS File -->
  <link href="views/admin/assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: May 30 2023 with Bootstrap v5.3.0
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="?act=home_admin" class="logo d-flex align-items-center">
        <img src="views/admin/assets/img/logo1.jpg" alt="">
        <span class="d-none d-lg-block">Admin</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <div class="search-bar">
      <form class="search-form d-flex align-items-center" method="POST" action="#">
        <input type="text" name="query" placeholder="Search" title="Enter search keyword">
        <button type="submit" title="Search"><i class="bi bi-search"></i></button>
      </form>
    </div><!-- End Search Bar -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->

        <li class="nav-item dropdown">

          <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
            <i class="bi bi-bell"></i>
            <span class="badge bg-primary badge-number">4</span>
          </a><!-- End Notification Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
            <li class="dropdown-header">
              You have 4 new notifications
              <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-exclamation-circle text-warning"></i>
              <div>
                <h4>Lorem Ipsum</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>30 min. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-x-circle text-danger"></i>
              <div>
                <h4>Atque rerum nesciunt</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>1 hr. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-check-circle text-success"></i>
              <div>
                <h4>Sit rerum fuga</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>2 hrs. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-info-circle text-primary"></i>
              <div>
                <h4>Dicta reprehenderit</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>4 hrs. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>
            <li class="dropdown-footer">
              <a href="#">Show all notifications</a>
            </li>

          </ul><!-- End Notification Dropdown Items -->

        </li><!-- End Notification Nav -->

        <li class="nav-item dropdown">

          <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
            <i class="bi bi-chat-left-text"></i>
            <span class="badge bg-success badge-number">3</span>
          </a><!-- End Messages Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages">
            <li class="dropdown-header">
              You have 3 new messages
              <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="message-item">
              <a href="#">
                <img src="assets/img/messages-1.jpg" alt="" class="rounded-circle">
                <div>
                  <h4>Maria Hudson</h4>
                  <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                  <p>4 hrs. ago</p>
                </div>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="message-item">
              <a href="#">
                <img src="assets/img/messages-2.jpg" alt="" class="rounded-circle">
                <div>
                  <h4>Anna Nelson</h4>
                  <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                  <p>6 hrs. ago</p>
                </div>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="message-item">
              <a href="#">
                <img src="assets/img/messages-3.jpg" alt="" class="rounded-circle">
                <div>
                  <h4>David Muldon</h4>
                  <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                  <p>8 hrs. ago</p>
                </div>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="dropdown-footer">
              <a href="#">Show all messages</a>
            </li>

          </ul><!-- End Messages Dropdown Items -->

        </li><!-- End Messages Nav -->

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="layout/images/avatas/<?=$user['avatar']?>" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2"><?=$user['fullname']?></span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6><?=$user['fullname']?></h6>
              <span>Quản trị viên </span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="?act=setting_account">
                <i class="bi bi-person"></i>
                <span>My Profile</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="?act=setting_account">
                <i class="bi bi-gear"></i>
                <span>Account Settings</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="pages-faq.html">
                <i class="bi bi-question-circle"></i>
                <span>Need Help?</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="?act=exits_account">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="?act=home_admin">
          <i class="bi bi-grid"></i>
          <span>Tổng Quan</span>
        </a>
      </li><!-- End Dashboard Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#bill-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-layout-text-window-reverse"></i><span>Đơn hàng</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="bill-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="?act=show_order_admin">
              <i class="bi bi-circle"></i><span>Danh sách đơn hàng</span>
            </a>
          </li>
        </ul>
      </li><!-- End đơn hàng Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#products-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i><span>Quản lý sản phẩm </span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="products-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="?act=add_product">
              <i class="bi bi-circle"></i><span>Thêm sản phẩm</span>
            </a>
          </li>
          <li>
            <a href="?act=show_product_admin">
              <i class="bi bi-circle"></i><span>Danh sách sản phẩm</span>
            </a>
          </li>
        </ul>
      </li><!-- End Forms Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#products-dm-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-box-seam"></i><span>Danh mục sản phẩm</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="products-dm-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="?act=add_category">
              <i class="bi bi-circle"></i><span>Thêm danh mục</span>
            </a>
          </li>
          <li>
            <a href="?act=show_category_admin">
              <i class="bi bi-circle"></i><span>Danh sách danh mục</span>
            </a>
          </li>
        </ul>
      </li><!-- End Forms Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#comment" data-bs-toggle="collapse" href="#">
          <i class="bi bi-chat-square-dots"></i><span>Quản lý phản hồi</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="comment" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="?act=show_feedback_admin">
              <i class="bi bi-circle"></i><span>Danh sách phản hồi</span>
            </a>
          </li>
        </ul>
      </li><!-- End Forms Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#user" data-bs-toggle="collapse" href="#">
          <i class="bi bi-person-gear"></i><span>Quản lý tài khoản</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="user" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="?act=show_user_admin">
              <i class="bi bi-circle"></i><span>Danh sách tài khoản khách hàng</span>
            </a>
          </li>
          <li>
            <a href="?act=show_staffs_admin">
              <i class="bi bi-circle"></i><span>Danh sách tài khoản quản trị</span>
            </a>
          </li>
        </ul>
      </li><!-- End Forms Nav -->
      

      
      <li class="nav-heading">Pages</li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="?act=setting_account">
          <i class="bi bi-person"></i>
          <span>Tài khoản</span>
        </a>
      </li><!-- End Profile Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="pages-register.html">
          <i class="bi bi-card-list"></i>
          <span>Đăng ký</span>
        </a>
      </li><!-- End Register Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="?act=exits_account">
          <i class="bi bi-box-arrow-in-right"></i>
          <span>Thoát</span>
        </a>
      </li><!-- End Login Page Nav -->
    </ul>

  </aside><!-- End Sidebar-->