<?php
function feed_back(){
    render('lienhe');
}
function show_customers_ctr(){
    $all_customers= show_user();
    if (isset($_SESSION['user'])) {
        render('admin/list_user',['all_customers'=>$all_customers]);
    }else{
        render('admin/404');
    }
}
function show_staffs_ctr(){
    $all_staffs= show_staffs_admin();
    if (isset($_SESSION['user'])) {
        $user = $_SESSION['user'];
        render('admin/list_staff',['all_staffs'=>$all_staffs,'user'=>$user]);
    }else{
        render('admin/404');
    }
    
}
function setting_acount(){
    if (isset($_SESSION['user'])) {
        $user = $_SESSION['user'];
        render('admin/setting_account',['user'=>$user]);
    }
}
function change_password_user(){
    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["change_password"])) {
        $id_users = $_SESSION['user']['id'];
        $password_new = $_POST['renewpassword'];
        $pass_old = $_POST['old_password'];
        if ($pass_old!==$_SESSION['user']['password']) {
            change_password($id_users,$password_new);
            header('Location: ?act=exits_account');
        }else{
        }
    }
}
function update_staff_ctr(){
    $id_users = $_GET['id_user'];
    $staff = user_one($id_users);
    if (isset($_SESSION['user'])) {
        render('admin/user_profile',['staff'=>$staff]);
    }else{
        render('admin/404');
    }  
}
function update_customer_ctr(){
    $id_users = $_GET['id_user'];
    $customer = user_one($id_users);
    if (isset($_SESSION['user'])) {
        render('admin/edit_customer',['customer'=>$customer]);
    }else{
        render('admin/404');
    }
    
}
function delete_user_ctr() {
    if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET["act"]) && $_GET["act"] === "delete_user" && isset($_GET["id"])) {
        $user_id = $_GET["id"];
        try {
            delete_user($user_id);
            header("location: index.php?act=show_user_admin");
        } catch (PDOException $e) {
        }
    }
}
function delete_staff_ctr() {
    if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET["act"]) && $_GET["act"] === "delete_staff" && isset($_GET["id_user"])) {
        $user_id = $_GET["id_user"];
        try {
            delete_staff($user_id);
            header("location: index.php?act=show_user_admin");
        } catch (PDOException $e) {
        }
    }
}
function update_user_ctr() {
    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["update_user"])) {
        $user_id = $_POST["id_user_admin"]; // Assuming you have the user ID stored in the session
        $fullName = $_POST["fullName"];
        $address = $_POST["address"];
        $phone = $_POST["phone"];
        $email = $_POST["email"];
        
        // Check if an image is uploaded and handle accordingly
        if (isset($_FILES['profileImage']) && $_FILES['profileImage']['error'] === UPLOAD_ERR_OK) {
            $target_dir = "layout/images/avatas/"; // Adjust the target directory accordingly
            $target_file = $target_dir . basename($_FILES['profileImage']['name']);
            $thumbnail = $_FILES['profileImage']['name'];
            move_uploaded_file($_FILES['profileImage']['tmp_name'], $target_file);
        } else {
            // If no new thumbnail is uploaded, keep the existing thumbnail or set it to null if you prefer
            // Example: $thumbnail = null;
            // Make sure to update the database field accordingly
            $thumbnail = null;
        }

        try {
            // Update the staff account information in the database
            update_staff($user_id, $fullName, $address, $phone, $email, $thumbnail);
            header("location: index.php?act=exits_account");
            // ...

        } catch (PDOException $e) {
            // Handle the error if necessary
            // ...
        }
    }
}
function edit_customer_ctr() {
    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["edit_user"])) {
        $user_id = $_POST["id_customer"]; // Assuming you have the user ID stored in the session
        $fullName = $_POST["fullName"];
        $address = $_POST["address"];
        $phone = $_POST["phone"];
        $email = $_POST["email"];
        
        // Check if an image is uploaded and handle accordingly
        if (isset($_FILES['profileImage']) && $_FILES['profileImage']['error'] === UPLOAD_ERR_OK) {
            $target_dir = "layout/images/avatas/"; // Adjust the target directory accordingly
            $target_file = $target_dir . basename($_FILES['profileImage']['name']);
            $thumbnail = $_FILES['profileImage']['name'];
            move_uploaded_file($_FILES['profileImage']['tmp_name'], $target_file);
        } else {
            // If no new thumbnail is uploaded, keep the existing thumbnail or set it to null if you prefer
            // Example: $thumbnail = null;
            // Make sure to update the database field accordingly
            $thumbnail = null;
        }

        try {
            // Update the staff account information in the database
            update_staff($user_id, $fullName, $address, $phone, $email, $thumbnail);
            header("location: index.php?act=show_user_admin");
            // ...

        } catch (PDOException $e) {
            // Handle the error if necessary
            // ...
        }
    }
}
function edit_staff_ctr() {
    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["edit_staff"])) {
        $staff_id = $_POST["id_staff"]; // Assuming you have the user ID stored in the session
        $fullName = $_POST["fullName"];
        $address = $_POST["address"];
        $phone = $_POST["phone"];
        $email = $_POST["email"];
        
        // Check if an image is uploaded and handle accordingly
        if (isset($_FILES['profileImage']) && $_FILES['profileImage']['error'] === UPLOAD_ERR_OK) {
            $target_dir = "layout/images/avatas/"; // Adjust the target directory accordingly
            $target_file = $target_dir . basename($_FILES['profileImage']['name']);
            $thumbnail = $_FILES['profileImage']['name'];
            move_uploaded_file($_FILES['profileImage']['tmp_name'], $target_file);
        } else {
            // If no new thumbnail is uploaded, keep the existing thumbnail or set it to null if you prefer
            // Example: $thumbnail = null;
            // Make sure to update the database field accordingly
            $thumbnail = null;
        }

        try {
            // Update the staff account information in the database
            update_staff($staff_id, $fullName, $address, $phone, $email, $thumbnail);
            header("location: index.php?act=show_staffs_admin");
            // ...

        } catch (PDOException $e) {
            // Handle the error if necessary
            // ...
        }
    }
}

?>