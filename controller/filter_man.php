<?php
include "C:/xampp/htdocs/duan1/model/pdo.php";
$conn = pdo_get_connection();
if(isset($_POST["action"]))
{
    $query = "
        SELECT * FROM products WHERE deleted = '0' AND category_id = 1
    ";
    
    // Xử lý bộ lọc theo thương hiệu
    if(isset($_POST["brand"]))
    {
        $brand_filter = implode("','", $_POST["brand"]);
        $query .= "
            AND product_brand IN('".$brand_filter."')
        ";
    }
    
    // Xử lý sắp xếp theo giá tăng dần và giảm dần
    $price_sort = "";
    if(isset($_POST["price_increase"]) && !isset($_POST["reduced_price"]))
    {
        $price_sort = "ASC"; // Sắp xếp giá tăng dần
    }
    elseif(isset($_POST["reduced_price"]) && !isset($_POST["price_increase"]))
    {
        $price_sort = "DESC"; // Sắp xếp giá giảm dần
    }
    
    // Xử lý sắp xếp theo thứ tự A-Z hoặc Z-A
    $order_by = "";
    if(isset($_POST["name_az"]) && !isset($_POST["name_za"]))
    {
        $order_by = "title ASC";
    }
    elseif(isset($_POST["name_za"]) && !isset($_POST["name_az"]))
    {
        $order_by = "title DESC";
    }
    
    // Xử lý bộ lọc "Hàng Mới"
    if(isset($_POST["product-new"]))
    {
        if (!empty($order_by)) {
            $order_by .= ", created_at DESC"; // Thêm điều kiện sắp xếp "Hàng Mới"
        } else {
            $order_by = "created_at DESC";
        }
    }
    
    // Kết hợp cả sắp xếp theo tên và giá nếu cả hai đều được chọn
    if(!empty($order_by) && !empty($price_sort))
    {
        $query .= " ORDER BY " . $order_by . ", price " . $price_sort;
    }
    elseif(!empty($order_by))
    {
        $query .= " ORDER BY " . $order_by;
    }
    elseif(!empty($price_sort))
    {
        $query .= " ORDER BY price " . $price_sort;
    }
    
    $statement = $conn->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();
    $total_row = $statement->rowCount();
    $output = '';
    
    if($total_row > 0)
    {
        foreach($result as $row)
        {
            $output .= '
            <div class="swiper-slide mt-5">
                <div class="img-box text-left">
                    <img src="layout/images/products/'.$row['thumbnail'].'" alt="">
                    <p class="text-[14px] hover:text-red-500 font-[600]">'.number_format($row['price'],0,",").' đ</p>
                    <a class="hover:text-[#86171C] text-[13px] font-[500]" href="?act=sanpham_ct&id='.$row['id'].'">'.$row['title'].'</a>
                </div>
            </div>
            ';
        }
    }
    else
    {
        $output = '<h3>No Data Found</h3>';
    }
    
    echo $output;
}
?>
