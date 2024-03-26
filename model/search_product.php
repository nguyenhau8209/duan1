<?php
    require_once 'pdo.php';
    $searchQuery = $_POST['query'];
    $conn = pdo_get_connection();
    $stmt = $conn->prepare("SELECT * FROM products WHERE title LIKE :searchQuery");
    $stmt->bindValue(':searchQuery', '%' . $searchQuery . '%', PDO::PARAM_STR);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if (!empty($results)) {
        $count = 0;
        foreach ($results as $row) {
            $formatted_price = number_format($row['price'], 0, ',');
            $target_dir = "layout/images/products/";
            $thumbnail_path = $target_dir . $row['thumbnail']; 
            echo '<div class="flex items-center mt-2">';
            echo '<div class="flex items-center mt-4 px-4">';
            echo '<img class="w-[120px] h-[70px] rounded" src="' . $thumbnail_path . '" alt="Product Image">';
            echo '</div>';
            echo '<div>';
            echo '<a href="?act=sanpham_ct&id='.$row['id'].'" class="text-black font-[500] text-[12px]">'. $row["title"] .'</a>';
            echo '<p class="text-red-700 leading-[23px] text-[12px] font-[500]">' .$formatted_price . ' đ</p>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            $count++;
            if ($count === 4) {
                break;
            }
        } 
        if ($count===4) {
            echo '
            <div class="text-center ">
                            <input class =" hover:text-red-800 cursor-pointer" type="submit" value ="Xem tất cả ">
                        </div>  
            ';
        }
    } else {
        echo "<p>Không tìm thấy sản phẩm </p>";
    }
?>