<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $index = $_POST['index'];
    $quantity = $_POST['quantity'];

    if (isset($_SESSION['mycart'][$index])) {
        $_SESSION['mycart'][$index][3] = $quantity;
        $_SESSION['mycart'][$index][5] = $_SESSION['mycart'][$index][2] * $quantity;
    }

    $response = array('success' => true);
    echo json_encode($response);
} else {
    $response = array('success' => false, 'message' => 'Invalid request method');
    echo json_encode($response);
}
?>