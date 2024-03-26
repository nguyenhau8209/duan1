<?php
function all_category(){
    $sql="SELECT * FROM category WHERE deleted = 0";
    $result = pdo_query($sql);
    return $result;
}
function insert_danhmuc($tendm){
    $sql = "INSERT INTO category(name) values('$tendm')";
    pdo_execute($sql);
}
function delete_category($category_id) {
    // Xây dựng câu lệnh SQL để thực hiện xóa ảo
    $sql = "UPDATE category SET deleted = 1 WHERE id = :category_id";
    try {
        // Thực hiện câu lệnh truy vấn với tham số đã truyền vào
        pdo_execute($sql, [':category_id' => $category_id]);
    } catch (PDOException $e) {
        // Xử lý lỗi nếu cần thiết
        throw $e;
    }
}
function categories_one($category_id) {
    $sql = "SELECT * FROM category WHERE id = :category_id";
    try {
        return pdo_query_one($sql, [':category_id' => $category_id]);
    } catch (PDOException $e) {
        throw $e;
    }
}
function categories_edit($category_id, $category_name) {
    $sql = "UPDATE category SET name = :category_name WHERE id = :category_id";
    try {
        pdo_execute($sql, [':category_id' => $category_id, ':category_name' => $category_name]);
    } catch (PDOException $e) {
        throw $e;
    }
}
?>