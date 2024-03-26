<?php
function order_ctr(){
    $all_order = all_order();
    if (isset($_SESSION['user'])) {
        render('admin/list_order',['all_order'=>$all_order]);
    }else{
        render('admin/404');
    }
}
function order_detail_ctr() {
    $id = $_GET['id'];
    $one_order = one_order($id);
    $order_detail = order_detail($id);
    render('admin/order_detail', ['order_detail' => $order_detail, 'one_order' => $one_order]);
}
function update_stt_order(){
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $status = $_POST['status'];
        $order_id = $_POST['id_order'];
        $conn = pdo_get_connection();
        $sql = "UPDATE `order` SET `status` = :status WHERE `id` = :order_id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':status', $status, PDO::PARAM_INT);
        $stmt->bindParam(':order_id', $order_id, PDO::PARAM_INT);
        $stmt->execute();
        header('Location: ?act=show_order_admin');
        exit;
    }
}
function delete_order_ctr(){
    $id = $_GET['id'];
    delete_order($id);
    header("Location: ?act=show_order_admin");
    exit;
}
?>