<?php
function category_ctr(){
    $all_categories = all_category();
    $count_categories = all_category();
    if (isset($_SESSION['user'])) {
        render('admin/list_category',['all_categories'=>$all_categories,'count_categories'=>$count_categories]);
    }else{
        render('admin/404');
    }
}
function add_category_ctr(){
    if (isset($_SESSION['user'])) {
        render('admin/add_category');
    }else{
        render('admin/404');
    }
}
function insert_category_ctr(){
    if (isset($_POST['add']) && ($_POST['add'])) {
        $tendm = $_POST['tendm'];
        if (empty($tendm)) {
            $thongbao = "Tên loại không được để trống.";
        } else {
            insert_danhmuc($tendm);
            $thongbao = "Thêm thành công.";
            header("location:?act=show_category_admin");
        }
    }
}
function delete_category_ctr() {
    // Kiểm tra xem người dùng đã gửi yêu cầu xóa danh mục và có cung cấp ID danh mục hay chưa
    if (isset($_GET['act']) && $_GET['act'] === 'delete_category' && isset($_GET['id'])) {
        // Lấy ID danh mục từ tham số truy vấn
        $category_id = $_GET['id'];

        // Kiểm tra xem hàm delete_category đã tồn tại hay chưa
        if (function_exists('delete_category')) {
            // Gọi hàm delete_category để xóa ảo danh mục dựa vào ID danh mục
            delete_category($category_id);
            // Chuyển hướng về trang hiển thị danh sách danh mục sau khi xóa ảo
            header("location: index.php?act=show_category_admin");
            exit();
        } else {
            // Nếu hàm delete_category chưa được định nghĩa, in thông báo lỗi
            echo "Lỗi: Hàm delete_category chưa được định nghĩa!";
            exit();
        }
        } else {
            // Nếu không có yêu cầu xóa danh mục hoặc không có ID danh mục, in thông báo lỗi
            echo "Lỗi: Yêu cầu không hợp lệ!";
            exit();
        }
}
function update_category_ctr(){
    $category_id = $_GET['id'];
    $category = categories_one($category_id);
    if (isset($_SESSION['user'])) {
        render('admin/edit_category',['category'=>$category]);
    }else{
        render('admin/404');
    }   
}
function edit_category_ctr() {
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["add"])) {
        $category_id = $_POST["id_cate"];
        $category_name = $_POST["tendm"];

        try {
            // Call the categories_edit() function to update the category in the database
            categories_edit($category_id, $category_name);
            header("location: index.php?act=show_category_admin");
            // Redirect to the page showing all categories after successful update
            
            exit();
        } catch (PDOException $e) {
            // Handle the error if necessary
            echo "Error: " . $e->getMessage();
            // You can also redirect to an error page or show an error message to the user.
        }
    }
}

?>