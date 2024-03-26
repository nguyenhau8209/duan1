<?php
/**
 * Mở kết nối đến CSDL sử dụng PDO
 */
function pdo_get_connection(){
    $dburl = "mysql:host=localhost;dbname=du_1;charset=utf8";
    $username = 'root';
    $password = '';
    $conn = new PDO($dburl, $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $conn;
}

/**
 * Thực thi câu lệnh sql thao tác dữ liệu (INSERT, UPDATE, DELETE)
 * @param string $sql câu lệnh sql
 * @param array $args mảng giá trị cung cấp cho các tham số của $sql
 * @throws PDOException lỗi thực thi câu lệnh
 */
function pdo_execute($sql, $params = null) {
    try {
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);

        if ($params !== null) {
            if (!is_array($params)) {
                $params = [$params];
            }
            $stmt->execute($params);
        } else {
            $stmt->execute();
        }
    } catch (PDOException $e) {
        throw $e;
    } finally {
        unset($conn);
    }
}

function pdo_execute_return_lastInsertId($sql) {
    $sql_args = array_slice(func_get_args(), 1);
    try {
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($sql_args);
        // Get the product ID from the result
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $product_id = isset($result['id']) ? $result['id'] : null;
        return $product_id;
    } catch (PDOException $e) {
        throw $e;
    } finally {
        unset($conn);
    }
}
function pdo_execute_return_lastInsertId1($sql){
    $sql_args = array_slice(func_get_args(), 1);
    try{
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($sql_args);
        return $conn->lastInsertId();
    }
    catch(PDOException $e){
        throw $e;
    }
    finally{
        unset($conn);
    }
}
/**
 * Thực thi câu lệnh sql truy vấn dữ liệu (SELECT)
 * @param string $sql câu lệnh sql
 * @param array $args mảng giá trị cung cấp cho các tham số của $sql
 * @return array mảng các bản ghi
 * @throws PDOException lỗi thực thi câu lệnh
 */
function pdo_query($sql){
    $sql_args = array_slice(func_get_args(), 1);
    try{
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($sql_args);
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $rows;
    }
    catch(PDOException $e){
        throw $e;
    }
    finally{
        unset($conn);
    }
}
function pdo_query1($sql, $params = array()) {
    try {
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        
        // Execute the statement with the parameters if provided
        if (!empty($params)) {
            $stmt->execute($params);
        } else {
            $stmt->execute();
        }

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        unset($conn);
        
        return $result;
    } catch (PDOException $e) {
        // Handle the error if necessary
        throw $e;
    }
}
/**
 * Thực thi câu lệnh sql truy vấn một bản ghi
 * @param string $sql câu lệnh sql
 * @param array $args mảng giá trị cung cấp cho các tham số của $sql
 * @return array mảng chứa bản ghi
 * @throws PDOException lỗi thực thi câu lệnh
 */
function pdo_query_one($sql, $params = []) {
    try {
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($params);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        unset($conn);
        return $result ? $result : false;
    } catch (PDOException $e) {
        throw $e;
    }
}


/**
 * Thực thi câu lệnh sql truy vấn một giá trị
 * @param string $sql câu lệnh sql
 * @param array $args mảng giá trị cung cấp cho các tham số của $sql
 * @return giá trị
 * @throws PDOException lỗi thực thi câu lệnh
 */
function pdo_query_value($sql) {
    $sql_args = array_slice(func_get_args(), 1);
    try {
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($sql_args);

        // Kiểm tra xem có bản ghi nào được trả về hay không
        if ($stmt->rowCount() > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            return array_values($row)[0];
        } else {
            // Trả về giá trị mặc định hoặc thông báo lỗi tùy theo trường hợp
            return null;
        }
    } catch (PDOException $e) {
        throw $e;
    } finally {
        unset($conn);
    }
}
