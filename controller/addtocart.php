<?php
if (!isset($_SESSION['mycart'])) {
    $_SESSION['mycart'] = [];
}
function addtocart(){
    render("addtocart");
}
function show_gh(){
    if (!isset($_SESSION['mycart'])) {
        $_SESSION['mycart'] = [];
    }
    $thanhtoan = 0;
    if (isset($_POST['button_gh'])){
        $thumbnail  = $_POST['thumbnail_gh'];
        $title      = $_POST['title_gh'];
        $price      = $_POST['price_gh'];
        $quantity   = $_POST['quantity_gh'];
        $name_size  = $_POST['name_size_gh'];
        $thanhtien  = $price * $quantity;
        $id         = $_POST['id_sp'];    

        // Check if the product with the same size is already in the cart
        $found = false;
        foreach ($_SESSION['mycart'] as &$item) {
            if ($item[1] === $title && $item[4] === $name_size) {
                $item[3] += $quantity; // Increase quantity
                $item[5] = $price * $item[3]; // Update subtotal
                $found = true;
                break;
            }
        }
        if (!$found) {
            $thanhtoan += $thanhtien;
            $add = [
                $thumbnail, $title, $price, $quantity, $name_size, $thanhtien, $thanhtoan, $id
            ];
            $_SESSION['mycart'][] = $add;
        }
    }
    render('addtocart', ['addtocart' => $_SESSION['mycart']]);
}
