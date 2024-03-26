<?php include_once "header_admin.php" ?>
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Quản lý phản hồi</h1>
    </div><!-- End Page Title -->
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Danh sách phản hồi </h5>
                        <form method="POST" action="?act=update_status" class="table-wrapper">
                            <table class="table table-sm datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">STT</th>
                                        <th scope="col">Full name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Phone</th>
                                        <th scope="col">Nội dung</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Trạng thái</th>
                                        <th scope="col">Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $status_labels = array(
                                        0 => 'Chưa phản hồi',
                                        1 => 'Đã phản hồi'
                                    );
                                    $ordinalNumber = 1;
                                    foreach ($list_feedback as $fb) {
                                        $message = strlen($fb['note']) > 20 ? substr($fb['note'], 0, 20) . '...' : $fb['note'];
                                        $send_feedback = "?act=send_feedback_customer&id=" . $fb['id'];
                                        $delete_feedback = "?act=delete_feedback&id=" . $fb['id'];
                                        $status_label = isset($status_labels[$fb['status']]) ? $status_labels[$fb['status']] : 'Không xác định';

                                        echo '<tr>
                                                    <th scope="row">' . $ordinalNumber . '</th>
                                                    <td>' . $fb['fullname'] . '</td>
                                                    <td>' . $fb['email'] . '</td>
                                                    <td class="fw-bold">' . $fb['phone_number'] . '</td>
                                                    <td>' . $message . '</td>
                                                    <td class="fw-bold">' . $fb['created_at'] . '</td>
                                                    <td class="fw-bold">' . $status_label . '</td>               
                                                    <td class="text-center">';
                                                    if ($fb['status'] == 0) {
                                                        echo '<a href="' . $send_feedback . '" class="edit" title="Reply" data-toggle="tooltip"><i class="bi bi-send"></i></a>';
                                                    }
                                            
                                                    echo '<a href="' . $delete_feedback . '" class="delete text-center" title="Delete" onclick="return confirm(\'Bạn có chắc chắn muốn xóa không ?\')" data-toggle="tooltip"><i class="bi bi-trash"></i></a>
                                                            </td>
                                                        </tr>';
                                        $ordinalNumber++;
                                    }
                                    ?>

                                </tbody>
                            </table>
                        </form method="POST">
                        <!-- End Table with stripped rows -->
                    </div>
                </div>
            </div>
        </div>
    </section>
</main><!-- End #main -->
<?php include_once "footer_admin.php" ?>