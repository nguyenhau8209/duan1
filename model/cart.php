<?php
function add_bill($phone, $email,$fullname, $address, $id_user,$tong_tien, $pttt,$note,$code_order)
{
    $sql = "INSERT INTO `order`( `user_id`,`full_name`, `email`, `phone_number`, `address`, `note`,
     `order_date`, `total`,status, `pttt`,code_order,deleted) 
    VALUES ('$id_user','$fullname','$email','$phone','$address','$note',NOW(),'$tong_tien',0,'$pttt',$code_order,0)";
return  pdo_execute_return_lastInsertId1($sql);
}
function insert_oder_detail($id,$id_sp,$soluong,$tong_tien,$size)
{
   $sql =  "INSERT INTO `order_detail`(`order_id`, `product_id`, `quantity`, `total_product`,`product_size`)
    VALUES ('$id','$id_sp','$soluong','$tong_tien','$size')";
    pdo_execute($sql);
}

?>
