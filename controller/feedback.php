<?php
include "C:/xampp/htdocs/duan1/model/pdo.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST["name"];
  $email = $_POST["email"];
  $phone = $_POST["phone"];
  $message = $_POST["message"];
  $conn = pdo_get_connection();

  if (!$conn) {
    echo json_encode(array("success" => false, "error" => "Could not connect to the database"));
  } else {
    // Sử dụng Prepared Statements để thêm dữ liệu
    $sql = "INSERT INTO feedback (fullname, email, phone_number, note,created_at) VALUES (:name, :email, :phone, :message,NOW())";
    $stmt = $conn->prepare($sql);

    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':phone', $phone);
    $stmt->bindParam(':message', $message);

    if ($stmt->execute()) {
      echo json_encode(array("success" => true));
    } else {
      echo json_encode(array("success" => false, "error" => $stmt->errorInfo()));
    }

    $conn = null;
  }
}
?>
