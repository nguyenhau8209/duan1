<?php
function recent_order()
{
    $conn = pdo_get_connection();
    $sql = "SELECT 
    o.id AS order_id,
    o.full_name AS customer_name,
    p.title AS product_title,
    od.total_product AS order_price,
    o.status
FROM
    `order` o
INNER JOIN
    `order_detail` od ON o.id = od.order_id
INNER JOIN
    `products` p ON od.product_id = p.id
WHERE
    o.deleted = 0
GROUP BY
    o.id, o.full_name, p.title, od.total_product, o.status
ORDER BY
    o.order_date DESC
LIMIT 20;;"; // Lấy 20 đơn hàng gần đây

    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $result;
}
function top_selling()
{
    $conn = pdo_get_connection();

    $sql = "SELECT 
                p.thumbnail AS product_image,
                p.title AS product_name,
                p.price AS product_price,
                SUM(od.quantity) AS total_quantity,
                COUNT(od.id) AS order_count
            FROM
                `order_detail` od
            INNER JOIN
                `products` p ON od.product_id = p.id
            GROUP BY
                od.product_id
            ORDER BY
                total_quantity DESC
            LIMIT 5"; // Lấy 5 sản phẩm bán chạy nhất

    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $result;
}
function top10_selling()
{
    $conn = pdo_get_connection();

    $sql = "SELECT 
                p.id AS product_id,
                p.thumbnail AS product_image,
                p.title AS product_name,
                p.price AS product_price,
                SUM(od.quantity) AS total_quantity     
            FROM
                `order_detail` od
            INNER JOIN
                `products` p ON od.product_id = p.id
            GROUP BY
                od.product_id
            ORDER BY
                total_quantity DESC
            LIMIT 10"; // Lấy 10 sản phẩm bán chạy nhất

    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $result;
}
function sale_today()
{
    $conn = pdo_get_connection();

    // Lấy ngày hiện tại
    $current_date = date("Y-m-d");

    $sql = "SELECT COUNT(*) AS order_count
            FROM `order`
            WHERE DATE(order_date) = :current_date";

    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':current_date', $current_date);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    // Trả về số lượng đơn hàng trong ngày hiện tại
    return $result['order_count'];
}
function revenue()
{
    $conn = pdo_get_connection();
    // Lấy ngày đầu tiên và ngày cuối cùng của tháng hiện tại
    $start_of_month = date("Y-m-01");
    $end_of_month = date("Y-m-t");

    $sql = "SELECT SUM(od.total_product) AS total_revenue
            FROM `order` o
            INNER JOIN `order_detail` od ON o.id = od.order_id
            WHERE o.order_date >= :start_of_month AND o.order_date <= :end_of_month AND o.status = 2";

    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':start_of_month', $start_of_month);
    $stmt->bindParam(':end_of_month', $end_of_month);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    // Trả về tổng doanh thu trong tháng hiện tại
    return $result['total_revenue'];
}
function sale_yesterday()
{
    $conn = pdo_get_connection();

    // Lấy ngày hôm qua
    $yesterday = date("Y-m-d", strtotime("-1 day"));

    $sql = "SELECT COUNT(*) AS order_count
            FROM `order`
            WHERE DATE(order_date) = :yesterday";

    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':yesterday', $yesterday);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    // Trả về số lượng đơn hàng ngày hôm qua
    return $result['order_count'];
}
function all_customers()
{
    $conn = pdo_get_connection();

    $sql = "SELECT COUNT(*) AS customer_count
            FROM `user`
            WHERE role = 0";

    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    // Trả về số lượng khách hàng có trường role = 0
    return $result['customer_count'];
}
function product_catalog()
{
    $conn = pdo_get_connection();

    $sql = "SELECT c.id AS category_id, c.name AS category_name, COUNT(p.id) AS product_count
    FROM `category` c
    LEFT JOIN `products` p ON c.id = p.category_id
    WHERE c.deleted = 0 AND p.deleted =0 
    GROUP BY c.id, c.name";

    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Trả về mảng chứa thông tin số lượng sản phẩm trong mỗi danh mục
    return $result;
}
