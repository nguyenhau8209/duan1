<?php
function product_ctr()
{
    $all_categories = all_category();
    $all_product = all_product();
    if (isset($_POST['listok'])) {
        $selected_category = $_POST['id_cate'];
        $all_product = all_product($selected_category);
    }
    if (isset($_SESSION['user'])) {
        render("admin/list_product", ['all_product' => $all_product, 'all_category' => $all_categories]);
    } else {
        render('admin/404');
    }
}

function add_product_ctr()
{
    $all_categories = all_category();
    if (isset($_SESSION['user'])) {
        render('admin/add_product', ['all_categories' => $all_categories]);
    } else {
        render('admin/404');
    }
}

function insert_product_ctr()
{
    $allowed_formats = array("jpg", "jpeg", "png");
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["add"])) {
        $category_id = $_POST["id_cate"];
        $title = $_POST["name"];
        $description = $_POST["mota"];
        $quantity = $_POST["quantity"];
        $price = $_POST["price"];
        $sizes = $_POST["sizes"];
        $brand = $_POST['brand'];
        $thumbnail = ''; // Biến chứa tên ảnh của sản phẩm
        if (isset($_FILES['img']) && $_FILES['img']['error'] === UPLOAD_ERR_OK) {
            $target_dir = "layout/images/products/";
            $target_file = $target_dir . basename($_FILES['img']['name']);
            $thumbnail = $_FILES['img']['name'];

            $file_extension = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
            if (!in_array($file_extension, $allowed_formats)) {
                // Định dạng ảnh không hợp lệ, hiển thị thông báo lỗi
                $error_message = "Ảnh không đúng định dạng. Chỉ chấp nhận định dạng jpg, jpeg và png.";
                render('admin/add_product', ['error_message' => $error_message]);
            } else {
                move_uploaded_file($_FILES['img']['tmp_name'], $target_file);
            }
        }
        // Xử lý ảnh nhỏ
        
        $image_paths = [];
        if (isset($_FILES['img_small']) && is_array($_FILES['img_small']['name'])) {
            $target_dir_small = "layout/images/products/";

            for ($i = 0; $i < count($_FILES['img_small']['name']); $i++) {
                $target_file_small = $target_dir_small . basename($_FILES['img_small']['name'][$i]);
                $thumbnail_small = $_FILES['img_small']['name'][$i];

                $file_extension_small = strtolower(pathinfo($target_file_small, PATHINFO_EXTENSION));
                if (in_array($file_extension_small, $allowed_formats)) {
                    move_uploaded_file($_FILES['img_small']['tmp_name'][$i], $target_file_small);
                    $image_paths[] = $thumbnail_small;
                }
            }
        }
        if (!isset($error_message)) {
            insert_product($category_id, $title, $thumbnail, $description, $brand, $quantity, $price, $sizes, $image_paths);
            header("location:?act=show_product_admin");
        }
        
    }
}

function list_products()
{
    $all_brand = getProductBrands();
    render("product_list", ['brands' => $all_brand]);
}
function man_list()
{
    $all_brand = getProductBrands();
    render("product_list_man", ['brands' => $all_brand]);
}
function woman_list()
{
    $all_brand = getProductBrands();
    render("woman_product_list", ['brands' => $all_brand]);
}
function results_search()
{
    $searchQuery = $_POST['results'];
    $results = searchProduct($searchQuery);
    render('show_search_product', ['results' => $results]);
}
function edit_product_ctr()
{
    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["add"])) {
        $category_id = $_POST["id_cate"];
        $product_id = $_POST["id_product"];
        $title = $_POST["name"];
        $description = $_POST["mota"];
        $quantity = $_POST["quantity"];
        $price = $_POST["price"];
        $sizes = $_POST["sizes"];

        // Check if an image is uploaded and handle accordingly
        if (isset($_FILES['img']) && $_FILES['img']['error'] === UPLOAD_ERR_OK) {
            $target_dir = "layout/images/products/";
            $target_file = $target_dir . basename($_FILES['img']['name']);
            $thumbnail = $_FILES['img']['name'];
            move_uploaded_file($_FILES['img']['tmp_name'], $target_file);
        } else {
            // If no new thumbnail is uploaded, keep the existing thumbnail
            $thumbnail = $_POST["old_thumbnail"];
        }

        try {
            // Call the edit_product function to update the product
            edit_product($product_id, $category_id, $title, $thumbnail, $description, $quantity, $price, $sizes);
            header("location:?act=show_product_admin");
            // Redirect to the product list page or show a success message
            // ...

        } catch (PDOException $e) {
            // Handle the error if necessary
            // ...
            throw $e;
        }
    }
}

function update_product_ctr()
{
    $all_categories = all_category();
    $product_id = $_GET['id'];
    $product = product_one($product_id);
    if (isset($_SESSION['user'])) {
        render("admin/edit_product", ["product" => $product, 'all_categories' => $all_categories]);
    } else {
        render('admin/404');
    }
}
function delete_product_ctr()
{
    // Kiểm tra xem người dùng đã gửi yêu cầu xóa sản phẩm hay chưa
    if (isset($_GET['act']) && $_GET['act'] === 'delete_product' && isset($_GET['id'])) {
        // Lấy ID sản phẩm từ tham số truy vấn
        $product_id = $_GET['id'];

        // Gọi hàm delete_product để xóa sản phẩm dựa vào ID
        delete_product($product_id);
        header("location:?act=show_product_admin");


        // Thực hiện xử lý chuyển hướng hoặc thông báo thành công nếu cần thiết
        // Ví dụ:
        // header("Location: index.php?act=product_list");
        // exit();
        // Hoặc thông báo thành công:
        // echo "Xóa sản phẩm thành công!";
    }
}
