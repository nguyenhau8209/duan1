<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $index = $_POST['index'];

    if (isset($_SESSION['mycart'][$index])) {
        unset($_SESSION['mycart'][$index]);
        $_SESSION['mycart'] = array_values($_SESSION['mycart']); // Reindex the array

        echo json_encode(array('success' => true));
        exit;
    } else {
        echo json_encode(array('success' => false, 'message' => 'Invalid index'));
        exit;
    }
}
?>