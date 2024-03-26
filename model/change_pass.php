<?php
require_once 'pdo.php'; // Include your database connection logic here
$conn = pdo_get_connection();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id_users = $_POST['id_user'];
    $password_new = $_POST['new_password']; // Change to 'new_password'
    $pass_old = $_POST['old_password'];

    // Query to retrieve the current password of the user from the database
    $stmt = $conn->prepare("SELECT `password` FROM user WHERE id = :id");
    $stmt->bindParam(":id", $id_users);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // Check if the user's current password matches the entered password
    if ($pass_old == $user['password']) {
        // Update the new password in the database
        $stmt = $conn->prepare("UPDATE user SET `password` = :password WHERE id = :id");
        $stmt->bindParam(":password", $password_new);
        $stmt->bindParam(":id", $id_users);
        $stmt->execute();

        $result["success"] = true;
        $result["message"] = "Đổi mật khẩu thành công";
    } else {
        $result["success"] = false;
        $result["message"] = "Mật khẩu cũ không đúng.";
    }
} else {
    $result["success"] = false;
    $result["message"] = "Invalid request.";
}

// Return the result as JSON
header("Content-Type: application/json");
echo json_encode($result);
?>
