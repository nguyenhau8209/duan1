<?php
function info_customer_ctr(){
    render('thongtintk');
}
function customer_info_order_ctr(){
    $id=$_SESSION['email']['id'];
    $all_order = user_orders($id);
    render('trangdonhang',['all_order'=>$all_order]);
}