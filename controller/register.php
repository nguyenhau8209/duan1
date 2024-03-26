<?php
function register()
{
    render("register");
}
function register_admin(){
    render("admin/register_admin");
}
function register_user_ctr()
{
    if (isset($_POST['btn_register'])) {
        $error = array();
        $result = '/^0(1\d{9}|9\d{8})$/';

        if (empty($_POST['fullname'])) {
            $error['fullname'] = "Họ tên không được để trống";
        } else {
            $fullname = $_POST['fullname'];
        }
        if (empty($_POST['email'])) {
            $error['email'] = "Email không được để trống";
        } else {
            $email = $_POST['email'];
            // Validate email format
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $error['email'] = "Định dạng email không hợp lệ";
            }
        }
        if(check_exists_email($_POST['email'])) $error['email'] = 'Email đã tồn tại vui lòng nhập email khác để tiếp tục';

        if (empty($_POST['phone'])) {
            $error['phone'] = "Số điện thoại không được để trống";
        } else {
            $phone = $_POST['phone'];

            // Validate phone number format using regex
            // if (!preg_match($result, $phone)) {
            //     $error['phone'] = "Kiểm tra lại số điện thoại";
            // }
        }

        if (empty($_POST['password'])) {
            $error['password'] = "Mật khẩu không được để trống";
        } else {
            $password = $_POST['password'];
        }

        if ($_POST['password'] != $_POST['password1']) {
            $error['password1'] = "Mật khẩu không trùng nhau";
        }

        if (empty($error)) {
            // Hash the password before storing in the database
            // $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            inser_register($fullname, $email, $phone, $password);
            header('Location: ?act=login');
            exit; // It's good practice to exit after a header redirect
        }
    }
    render("register", ['error' => $error]);
}
function register_user_admin_ctr() {
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["name"]) && isset($_POST["username"]) && isset($_POST["password"]) && isset($_POST["terms"])) {
        $name = $_POST["name"];
        $username = $_POST["username"];
        $password = $_POST["password"];

        // Validate the input data if necessary

        try {
            insert_user_admin($name, $username, $password);
            header("location:?act=show_staffs_admin");
            // Redirect to a success page or perform other actions upon successful registration
            // For example:
            // header("Location: registration_success.php");
            // exit();
        } catch (PDOException $e) {
            // Handle errors during registration, e.g., display an error message
            // For example:
            // echo "Registration failed. Please try again later.";
            // or you can redirect to an error page
            // header("Location: registration_error.php");
            // exit();
            throw $e;
        }
    }
}
