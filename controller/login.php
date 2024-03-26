<?php
session_start();
function login()
{
    render("login");
}
function login_admin(){
    render("admin/login_admin");
}
function login_admin_ctr() {
    if (isset($_POST['btn_login_admin'])) {
        $email = $_POST['username'];
        $password = $_POST['password'];
        $user = check_email_admin($email, $password);

        if ($user === false) {
            $error_message = "Tài khoản hoặc mật khẩu không đúng.";
            render('admin/login_admin',['error_message'=>$error_message]);
        } else {
            $_SESSION['user'] = $user;
            header('location:?act=home_admin');
        }
    }
}
function logout_admin(){
    unset($_SESSION['user']);
    header("Location: index.php?act=login_admin");
}
function login__user_ctr()
{
    $error = [];
    if (isset($_POST['btn_login'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $check_email = check_email($email, $password);
        if ($email == "" && $password == "") {
            $error['error'] = "vui lòng nhập lại tài khoản mật khẩu";
        }
         else {
            if (is_array($check_email)) {
                $_SESSION['email'] = $check_email;
                $error['error'] = "Đăng nhập thành công bạn sẽ được chuyển hướng sau 2s";
                header('refresh:2 ?act=main');
            }
        }
    }
    render("login", ['error' => $error]);
}
