<?php
function inser_register($fullname,$email,$phone,$password){
    $sql="INSERT INTO `user`( `fullname`, `email`, `phone`,`password`,`role`,`deleted`) 
    VALUES ('{$fullname}','{$email}','{$phone}','{$password}',0,0)";
    pdo_execute($sql);
}
// function inser_register($data = [])
// {
//   $sql = "INSERT INTO user(fullname,email,phone,password) VALUES (?,?,?,?) ";
//   $conn = pdo_get_connection();
//   $stmt = $conn->prepare($sql);
//   $stmt->execute($data);
// }
function check_email_admin($email,$password){
    $sql="SELECT * FROM `user` WHERE `email` = '".$email."' AND `password` = '".$password."' AND `role` IN (1, 2)";
    $login=pdo_query_one($sql);
    // echo $sql;
    return $login;
}
function check_email($email,$password){
    $sql="SELECT * FROM `user` where `email`='".$email."' AND `password`='".$password."'";
    $login=pdo_query_one($sql);
    // echo $sql;
    return $login;
}

function  change_password($staff_id, $password,){
    $sql = "UPDATE user SET password =? WHERE id=?";
    $conn = pdo_get_connection();
    $stmt = $conn->prepare($sql);
    $stmt->execute([$password,$staff_id]);
}
function user_orders($user_id) {
    $sql = "SELECT id, code_order, order_date, address, total, status FROM `order` WHERE user_id = ?";
    $conn = pdo_get_connection(); 
    $stmt = $conn->prepare($sql);
    $stmt->execute([$user_id]);
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $results;
}

function check_exists_email($email)
{
    $sql = "SELECT email FROM user where email= ?";
    $conn = pdo_get_connection();
    $stmt = $conn->prepare($sql);
    $stmt -> execute([$email]);
    $result = $stmt ->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function insert_user_admin($name, $username, $password) {
    try {
        $conn = pdo_get_connection();
        // Hash the password before storing it in the database
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO user (fullname, email, password, role,created_at,updated_at,deleted) VALUES (?, ?, ?, 1,NOW(),NOW(),0)";
        pdo_execute($sql,[$name, $username, $hashed_password]);

        unset($conn);
    } catch (PDOException $e) {
        throw $e;
    }
}
function show_user() {
    try {
        $conn = pdo_get_connection();
        $sql = "SELECT * FROM user WHERE role = 0 AND deleted = 0";
        $result = pdo_query($sql);
        unset($conn);
        return $result;
    } catch (PDOException $e) {
        throw $e;
    }
}
function show_staffs_admin() {
    try {
        $conn = pdo_get_connection();
        $sql = "SELECT * FROM user WHERE role = 1";
        $result = pdo_query($sql);
        unset($conn);
        return $result;
    } catch (PDOException $e) {
        throw $e;
    }
}
function delete_user($user_id) {
    try {
        $conn = pdo_get_connection();
        // Prepare and execute the SQL query to update the deleted status of the user
        $sql = "UPDATE user SET deleted = 1 WHERE id = ?";
        pdo_execute($sql, $user_id);
        unset($conn);
    } catch (PDOException $e) {
        // Handle the error if necessary
        throw $e;
    }
}
function delete_staff($staff_id) {
    $sql = "DELETE FROM user WHERE id=?";
    $conn = pdo_get_connection();
    $stmt = $conn->prepare($sql);
    $stmt->execute([$staff_id]);
}
function user_one($user_id) {
    $sql = "SELECT * FROM user WHERE id = :user_id";
    try {
        return pdo_query_one($sql, [':user_id' => $user_id]);
    } catch (PDOException $e) {
        // Handle the error if necessary
        // ...
        return null;
    }
}
function update_staff($staff_id, $fullName, $address, $phone, $email, $thumbnail) {
    $sql = "UPDATE user SET fullname=?, address=?, phone=?, email=?, avatar=?,updated_at=NOW() WHERE id=?";
    $conn = pdo_get_connection();
    $stmt = $conn->prepare($sql);
    $stmt->execute([$fullName, $address, $phone, $email, $thumbnail, $staff_id]);
}
function update_customer($user_id, $fullName, $address, $phone, $email, $thumbnail) {
    $sql = "UPDATE user SET fullname=?, address=?, phone=?, email=?, avatar=?,updated_at=NOW() WHERE id=?";
    $conn = pdo_get_connection();
    $stmt = $conn->prepare($sql);
    $stmt->execute([$fullName, $address, $phone, $email, $thumbnail, $user_id]);
}
function check_mail($email){
    $sql="SELECT * FROM `user` where `email`='".$email."'";
    $login=pdo_query_one($sql);
    // echo $sql;
    return $login;
}
function update_pass($email, $pass){
    $conn = pdo_get_connection();
    $sql = "UPDATE `user` SET `password` = :pass WHERE `email` = :email";
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(':pass', $pass, PDO::PARAM_STR);
    $stmt->bindValue(':email', $email, PDO::PARAM_STR);
    $stmt->execute();
}
?>