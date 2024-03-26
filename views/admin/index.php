<?php include_once 'header_admin.php'?>
<main id="main" class="main">

<div class="pagetitle">
  <h1>Tổng quan</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.html">Trang chủ</a></li>
      <li class="breadcrumb-item active">Dashboard</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section dashboard">
  <div class="row">

    <!-- Left side columns -->
    <div class="col-lg-12">
      <div class="row">

        <!-- Sales Card -->
        <div class="col-xxl-4 col-md-6">
          <div class="card info-card sales-card">

            <div class="filter">
              <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                <li class="dropdown-header text-start">
                  <h6>Filter</h6>
                </li>

                <li><a class="dropdown-item" href="#">Today</a></li>
                <li><a class="dropdown-item" href="#">This Month</a></li>
                <li><a class="dropdown-item" href="#">This Year</a></li>
              </ul>
            </div>

            <div class="card-body">
              <h5 class="card-title">Sales <span>| Hôm nay</span></h5>

              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <i class="bi bi-cart"></i>
                </div>
                <div class="ps-3">
                  <h6><?=$sale_today?></h6>
                  <span class="text-success small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">increase</span>

                </div>
              </div>
            </div>

          </div>
        </div><!-- End Sales Card -->

        <!-- Revenue Card -->
        <div class="col-xxl-4 col-md-6">
          <div class="card info-card revenue-card">

            <div class="filter">
              <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                <li class="dropdown-header text-start">
                  <h6>Filter</h6>
                </li>

                <li><a class="dropdown-item" href="#">Today</a></li>
                <li><a class="dropdown-item" href="#">This Month</a></li>
                <li><a class="dropdown-item" href="#">This Year</a></li>
              </ul>
            </div>
        
            <div class="card-body">
              <h5 class="card-title">Doanh Thu <span>| This Month</span></h5>

              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <i class="bi bi-currency-dollar"></i>
                </div>
                <div class="ps-3">
                  <h6><?=number_format($rvn_this_month,0,',')?> đ</h6>
                  <span class="text-success small pt-1 fw-bold">100%</span> <span class="text-muted small pt-2 ps-1">increase</span>

                </div>
              </div>
            </div>

          </div>
        </div><!-- End Revenue Card -->

        <!-- Customers Card -->
        <div class="col-xxl-4 col-xl-12">

          <div class="card info-card customers-card">

            <div class="filter">
              <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                <li class="dropdown-header text-start">
                  <h6>Filter</h6>
                </li>

                <li><a class="dropdown-item" href="#">Today</a></li>
                <li><a class="dropdown-item" href="#">This Month</a></li>
                <li><a class="dropdown-item" href="#">This Year</a></li>
              </ul>
            </div>

            <div class="card-body">
              <h5 class="card-title">Khách hàng  <span>| This Year</span></h5>

              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <i class="bi bi-people"></i>
                </div>
                <div class="ps-3">
                  <h6><?=$all_ctm?></h6>
                  <span class="text-success small pt-1 fw-bold">100%</span> <span class="text-muted small pt-2 ps-1">increase</span>

                </div>
              </div>

            </div>
          </div>

        </div><!-- End Customers Card -->
        <!-- Recent Sales -->
        <div class="col-12">
          <div class="card recent-sales overflow-auto">

            <div class="filter">
              <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                <li class="dropdown-header text-start">
                  <h6>Filter</h6>
                </li>

                <li><a class="dropdown-item" href="#">Today</a></li>
                <li><a class="dropdown-item" href="#">This Month</a></li>
                <li><a class="dropdown-item" href="#">This Year</a></li>
              </ul>
            </div>

            <div class="card-body">
              <h5 class="card-title">Đơn hàng gần đây <span>|</span></h5>

              <table class="table table-borderless datatable">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Customer</th>
                    <th scope="col">Product</th>
                    <th scope="col">Price</th>
                    <th scope="col">Status</th>
                  </tr>
                </thead>

                <tbody>
                <?php 
                  $status_labels = array(
                      0 => '<span class="badge bg-danger">Đang xử lý</span>',
                      1 => '<span class="badge bg-warning">Đang vận chuyển</span>',
                      2 => '<span class="badge bg-success">Giao thành công</span>'
                  );
                  foreach ($recent_order as $order) {
                  $status_label = isset($status_labels[$order['status']]) ? $status_labels[$order['status']] : 'Không xác định';
                  $formatted_price = number_format($order['order_price'], 0, ',');
                  echo '<tr>
                      <th scope="row"><a href="#">#' . $order['order_id']. '</th>
                      <td>' . $order['customer_name']. '</td>
                      <td><a href="#" class="text-primary">' . $order['product_title'] . '</a></td>
                      <td>' . $formatted_price. ' đ</td>
                      <td>' . $status_label . '</td>
                      <!-- Display the sizes for the order -->
                       </tr>';
                  }?>
                </tbody>
              </table>

            </div>

          </div>
        </div><!-- End Recent Sales -->

        <!-- Top Selling -->
        <div class="col-12">
          <div class="card top-selling overflow-auto">

            <div class="filter">
              <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                <li class="dropdown-header text-start">
                  <h6>Filter</h6>
                </li>

                <li><a class="dropdown-item" href="#">Today</a></li>
                <li><a class="dropdown-item" href="#">This Month</a></li>
                <li><a class="dropdown-item" href="#">This Year</a></li>
              </ul>
            </div>

            <div class="card-body pb-0">
              <h5 class="card-title">Top 5 Selling <span>|</span></h5>

              <table class="table table-borderless">
                <thead>
                  <tr>
                    <th scope="col">Preview</th>
                    <th scope="col">Product</th>
                    <th scope="col">Price</th>
                    <th scope="col">Sold</th>
                    <th scope="col">Provisional Revenue</th>
                  </tr>
                </thead>
                <tbody>
                <?php 
                  foreach ($top_sell as $order) {
                  $dt=$order['total_quantity']*$order['product_price'];
                  $dtfm = number_format($dt,0,",");
                  $pr_name = strlen($order['product_name']) > 20 ? substr($order['product_name'], 0, 20) . '...' : $order['product_name'];
                  $formatted_price = number_format($order['product_price'], 0, ',');
                  echo '<tr>
                      <th scope="row"><a href="#"><img src="layout/images/products/'.$order['product_image'].'" alt=""></a></th>
                      <td><a href="#" class="text-primary fw-bold">' . $pr_name. '</a></td>
                      <td>' . $formatted_price. ' đ</td>
                      <td class="fw-bold">'.$order['total_quantity'].'</td>
                      <td>'.$dtfm.' đ</td>  
                      <!-- Display the sizes for the order -->
                       </tr>';
                  }?>
                </tbody>
              </table>

            </div>

          </div>
        </div><!-- End Top Selling -->

      </div>
      
    </div><!-- End Left side columns -->

    <!-- Right side columns -->
    
    <div class=" card col-lg-4">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Thống kê sản phẩm theo danh mục</h5>

            <!-- Pie Chart -->
            <canvas id="pieChart" style="max-height: 400px;"></canvas>
            <script>
              document.addEventListener("DOMContentLoaded", () => {
                var category_labels = [];
                var category_data = [];
                <?php foreach ($pr_catalog as $category): ?>
                  category_labels.push('<?php echo $category["category_name"]; ?>');
                  category_data.push('<?php echo $category["product_count"]; ?>');
                <?php endforeach; ?>
                new Chart(document.querySelector('#pieChart'), {
                  type: 'pie',
                  data: {
                    labels:category_labels,
                    datasets: [{
                      label: 'Số lượng sản phẩm ',
                      data:category_data,
                      backgroundColor: [
                        'rgb(255, 99, 132)',
                        'rgb(54, 162, 235)'
                      ],
                      hoverOffset: 4
                    }]
                  }
                });
              });
            </script>
            <!-- End Pie CHart -->

          </div>
        </div>
      </div>
      
      <!-- News & Updates Traffic -->
     
      
    </div><!-- End Right side columns -->

  </div>
</section>

</main><!-- End #main -->
<?php include_once 'footer_admin.php'?>