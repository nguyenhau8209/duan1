<?php
function all_order()
{
    $conn = pdo_get_connection();
    $sql = "SELECT 
    CASE WHEN o.user_id = 2 THEN 'Customer is not logged in' ELSE u.fullname END AS fullname,
    o.*
FROM
    `order` o
LEFT JOIN
    `user` u ON o.user_id = u.id
WHERE o.deleted = 0 AND (o.user_id = 2 OR u.deleted = 0)
ORDER BY o.order_date DESC";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}
function one_order($order_id)
{
    $conn = pdo_get_connection();
    $sql = "SELECT
                o.*,
                u.fullname
            FROM
                `order` o
            LEFT JOIN
                `user` u ON o.user_id = u.id
            WHERE
                o.id = :order_id";

    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':order_id', $order_id, PDO::PARAM_INT);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}
function delete_order($order_id)
{
    $conn = pdo_get_connection();
    $sql = "UPDATE `order` SET deleted = 1 WHERE id = :order_id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':order_id', $order_id, PDO::PARAM_INT);
    $stmt->execute();
}
function order_detail($order_id)
{
    $conn = pdo_get_connection();
    $sql = "SELECT
                od.product_id,
                od.total_product,
                od.quantity,
                od.product_size,
                p.title AS product_title,
                p.thumbnail AS product_thumbnail
            FROM
                `order_detail` od
            INNER JOIN
                `products` p ON od.product_id = p.id
            WHERE
                od.order_id = :order_id";

    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':order_id', $order_id, PDO::PARAM_INT);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $result;
}
function insert_order($user_id, $phone_number, $address, $note, $order_date, $status, $order_details)
{
    try {
        $conn = pdo_get_connection();

        // Tính tổng tiền của đơn hàng
        $total = 0;
        foreach ($order_details as $order_detail) {
            $total += $order_detail['price'] * $order_detail['quantity'];
        }

        // Thêm đơn hàng vào bảng `order`
        $sql_order = "INSERT INTO `order` (user_id, phone_number, address, note, order_date, status, total, deleted)
                      VALUES (?, ?, ?, ?, ?, ?, ?, 0)";
        $stmt_order = $conn->prepare($sql_order);
        $stmt_order->bindParam(1, $user_id, PDO::PARAM_INT);
        $stmt_order->bindParam(2, $phone_number, PDO::PARAM_STR);
        $stmt_order->bindParam(3, $address, PDO::PARAM_STR);
        $stmt_order->bindParam(4, $note, PDO::PARAM_STR);
        $stmt_order->bindParam(5, $order_date, PDO::PARAM_STR);
        $stmt_order->bindParam(6, $status, PDO::PARAM_INT);
        $stmt_order->bindParam(7, $total, PDO::PARAM_STR);
        $stmt_order->execute();
        $order_id = $conn->lastInsertId();

        // Thêm chi tiết đơn hàng vào bảng `order_detail`
        $sql_order_detail = "INSERT INTO `order_detail` (order_id, product_id, price, quantity)
                             VALUES (?, ?, ?, ?)";
        $stmt_order_detail = $conn->prepare($sql_order_detail);

        foreach ($order_details as $order_detail) {
            $product_id = $order_detail['product_id'];
            $price = $order_detail['price'];
            $quantity = $order_detail['quantity'];

            $stmt_order_detail->bindParam(1, $order_id, PDO::PARAM_INT);
            $stmt_order_detail->bindParam(2, $product_id, PDO::PARAM_INT);
            $stmt_order_detail->bindParam(3, $price, PDO::PARAM_STR);
            $stmt_order_detail->bindParam(4, $quantity, PDO::PARAM_INT);
            $stmt_order_detail->execute();
        }

        unset($conn);
    } catch (PDOException $e) {
        // Handle the error if necessary
        throw $e;
    }
}
