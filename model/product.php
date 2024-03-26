<?php
function all_product($selected_category = null) {
    // Handle condition of selected category from form
    $category_condition = '';
    if (!empty($selected_category)) {
        $category_condition = "AND p.category_id = $selected_category";
    }

    // Query to get the product data along with sizes
    $sql = "SELECT p.*, GROUP_CONCAT(s.name_size) AS sizes
    FROM products p
    LEFT JOIN product_sizes ps ON p.id = ps.product_id
    LEFT JOIN sizes s ON ps.size_id = s.id
    JOIN category c ON p.category_id = c.id
    WHERE p.deleted = 0 $category_condition
    GROUP BY p.id
    ORDER BY p.id DESC";
    $result = pdo_query($sql);
    return $result;
}
function insert_product($category_id, $title, $thumbnail, $description,$brand, $quantity, $price, $sizes, $image_paths) {
    try {
        $conn = pdo_get_connection();

        // Thêm dữ liệu vào bảng products
        $sql = "INSERT INTO products (category_id,title,product_brand, thumbnail, desciption, quantity, price, created_at, updated_at, deleted) VALUES (?, ?, ?,?, ?, ?, ?, NOW(), NOW(), 0)";
        pdo_execute($sql, [$category_id, $title, $brand , $thumbnail, $description, $quantity, $price]);

        // Lấy ID của sản phẩm vừa thêm
        $product_id = pdo_execute_return_lastInsertId("SELECT id FROM products ORDER BY id DESC LIMIT 1");

        // Thêm các size vào bảng sizes nếu chưa tồn tại và lưu lại các id của size
        $size_ids = [];
        $size_names = explode(',', $sizes);
        foreach ($size_names as $size_name) {
            // Kiểm tra xem size đã tồn tại trong bảng sizes hay chưa
            $sql = "SELECT id FROM sizes WHERE name_size = ?";
            $size_id = pdo_query_value($sql, $size_name);

            // Nếu size chưa tồn tại, thêm mới nó vào bảng sizes
            if ($size_id === null) {
                $sql = "INSERT INTO sizes (name_size) VALUES (?)";
                pdo_execute($sql, $size_name);
                $size_id = $conn->lastInsertId();
            }

            // Thêm id của size vào danh sách
            $size_ids[] = $size_id;
        }

        // Thêm các bản ghi vào bảng product_sizes để liên kết sản phẩm với các size
        $sql = "INSERT INTO product_sizes (product_id, size_id) VALUES (?, ?)";
        foreach ($size_ids as $size_id) {
            pdo_execute($sql, [$product_id, $size_id]);
        }

        // Thêm các ảnh nhỏ vào bảng gallery
        $sql = "INSERT INTO gallery (product_id, thumbnail) VALUES (?, ?)";
        foreach ($image_paths as $image_path) {
            pdo_execute($sql, [$product_id, $image_path]);
        }

        unset($conn);
        return $product_id;
    } catch (PDOException $e) {
        // Gỡ rối: In thông báo lỗi chi tiết
        echo "Error: " . $e->getMessage();
        throw $e;
    }
}
function products_same_category($product_id)
{
    $conn = pdo_get_connection();
    $sql = "SELECT * FROM products WHERE category_id = (SELECT category_id FROM products WHERE id = :product_id)";
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(':product_id', $product_id, PDO::PARAM_INT);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $results;
}
function searchProduct($searchQuery) {
    $conn = pdo_get_connection();
    $stmt = $conn->prepare("SELECT * FROM products WHERE title LIKE :searchQuery");
    $stmt->bindValue(':searchQuery', '%' . $searchQuery . '%', PDO::PARAM_STR);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $results;
}
function edit_product($product_id, $category_id, $title, $thumbnail, $description, $quantity, $price, $sizes) {
    try {
        $conn = pdo_get_connection();

        // Update the product data in the 'products' table
        $sql = "UPDATE products SET category_id = ?, title = ?, thumbnail = ?, desciption = ?, quantity = ?, price = ?, updated_at =NOW() WHERE id = ?";
        pdo_execute($sql, [$category_id, $title, $thumbnail, $description, $quantity, $price, $product_id]);

        // Process the sizes data and update the 'product_sizes' table
        $size_ids = [];
        $size_names = explode(',', $sizes);
        foreach ($size_names as $size_name) {
            // Check if the size already exists in the 'sizes' table
            $sql = "SELECT id FROM sizes WHERE name_size = ?";
            $size_id = pdo_query_value($sql, $size_name);

            // If the size doesn't exist, insert it into the 'sizes' table
            if ($size_id === null) {
                $sql = "INSERT INTO sizes (name_size) VALUES (?)";
                pdo_execute($sql, $size_name);
                $size_id = $conn->lastInsertId();
            }

            // Add the size ID to the list of size IDs
            $size_ids[] = $size_id;
        }

        // Delete all existing size records for the product from the 'product_sizes' table
        $sql = "DELETE FROM product_sizes WHERE product_id = ?";
        pdo_execute($sql, $product_id);

        // Insert new size records for the product into the 'product_sizes' table
        $sql = "INSERT INTO product_sizes (product_id, size_id) VALUES (?, ?)";
        foreach ($size_ids as $size_id) {
            pdo_execute($sql,[$product_id, $size_id]);
        }

        unset($conn);
        return true; // Return true to indicate success
    } catch (PDOException $e) {
        // If there's an error, you can log it or throw an exception
        throw $e;
    }
}
function product_one($product_id) {
    $sql = "SELECT p.*, GROUP_CONCAT(s.name_size) AS sizes
            FROM products p
            LEFT JOIN product_sizes ps ON p.id = ps.product_id
            LEFT JOIN sizes s ON ps.size_id = s.id
            WHERE p.id = :product_id AND p.deleted = 0
            GROUP BY p.id";
    
    try {
        return pdo_query_one($sql, [':product_id' => $product_id]);
    } catch (PDOException $e) {
        throw $e;
    }

}

function delete_product($product_id) {
    $sql = "UPDATE products SET deleted = 1 WHERE id = :product_id";
    try {
        pdo_execute($sql, [':product_id' => $product_id]);
    } catch (PDOException $e) {
        throw $e;
    }
}
function loadall_spct($id)
{
    $sql = "SELECT * FROM `products`
    JOIN `category` ON `products`.`category_id` = `category`.`id`
    JOIN `product_sizes` ON `products`.`id`=`product_sizes`.`product_id` where `products`.`id`=" . $id;
    $loadall_spct = pdo_query_one($sql);
    return $loadall_spct;
}
function loadall_size($id)
{
    $sql = "SELECT sizes.id, sizes.name_size FROM sizes
    JOIN product_sizes ON sizes.id = product_sizes.size_id
    WHERE product_sizes.product_id =" . $id;
    $list_size = pdo_query($sql);
    return $list_size;
}

function loadall_nam($category_id)
{
    try {
        $conn = pdo_get_connection();
        $sql = "SELECT p.*, GROUP_CONCAT(s.name_size) AS sizes
                FROM products p
                LEFT JOIN product_sizes ps ON p.id = ps.product_id
                LEFT JOIN sizes s ON ps.size_id = s.id
                WHERE p.deleted = 0 AND p.category_id = :category_id
                GROUP BY p.id
                ORDER BY p.id DESC";
        $params = array(':category_id' => $category_id);
        $result = pdo_query1($sql, $params);

        unset($conn);

        return $result;
    } catch (PDOException $e) {
        throw $e;
    }
}
function getProductBrands() {
    $conn = pdo_get_connection();
    $stmt = $conn->prepare("SELECT DISTINCT product_brand FROM products");
    $stmt->execute();
    $brands = $stmt->fetchAll(PDO::FETCH_COLUMN);
    return $brands;
}
function product_gallery($product_id) {
        $conn = pdo_get_connection();
        $sql = "SELECT thumbnail FROM gallery WHERE product_id = :product_id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':product_id', $product_id, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        unset($conn);
        return $result;
}
function loadall_nu($category_id)
{
    try {
        $conn = pdo_get_connection();
        $sql = "SELECT p.*, GROUP_CONCAT(s.name_size) AS sizes
                FROM products p
                LEFT JOIN product_sizes ps ON p.id = ps.product_id
                LEFT JOIN sizes s ON ps.size_id = s.id
                WHERE p.deleted = 0 AND p.category_id = :category_id
                GROUP BY p.id
                ORDER BY p.id DESC";
        $params = array(':category_id' => $category_id);
        $result = pdo_query1($sql, $params);

        unset($conn);

        return $result;
    } catch (PDOException $e) {
        throw $e;
    }
}
function load_yeuthich($id){
    $sql="SELECT * FROM `products`
    JOIN `category` ON `products`.`category_id` = `category`.`id`
    JOIN `product_sizes` ON `products`.`id`=`product_sizes`.`product_id` where `products`.`id`=".$id;
    echo $sql;
    $yeuthich = pdo_query($sql);
    return $yeuthich;
}
?>