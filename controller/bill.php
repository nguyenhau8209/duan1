<?php
if(!isset($_SESSION['data'])){
    $_SESSION['data']=[];
}
function bill()
{
    if (isset($_POST['btn_tt'])) {
        render("bill");
    }
    render("bill");
}
function bill_cart()
{
    if (isset($_POST['btn_dh'])) {
        $fullname = $_POST['fullname'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $id_user = $_POST['id'];
        $soluong = $_POST['sl'];
        $size = $_POST['size'];
        $tong_tien = $_POST['tong_tien'];
        $pttt = $_POST['pttt'];
        $note = $_POST['note'];
        $order_date = date('Y-d-m');
        $ma_hd = rand(0, 999);
        switch ($pttt) {
            case '1':
                $pttt = 'Thanh toán khi giao hàng (COD)';
                break;
            case '2':
                $pttt = 'Thanh toán online (Chuyển khoản)';
                break;
            default:
                # code...
                break;
        }
        $data = [
            $fullname,
            $phone,
            $email,
            $address,
            $id_user,
            $soluong,
            $size,
            $tong_tien,
            $pttt,
            $note,
            $order_date,
            $ma_hd
        ];  
        $_SESSION['data'][] =$data;
        $id = add_bill($phone,$email,$fullname, $address, $id_user, $tong_tien, $pttt, $note ,$ma_hd);
        // lấy id của order dòng 51-52
        foreach ($_SESSION['mycart'] as $cart) {
            insert_oder_detail($id, $cart[7],$cart[3],$cart[5],$cart['4']);
        }
        render('thanhtoan', ['bill' => $data]);
        unset($_SESSION['mycart']);
    }
    render('thanhtoan');
}

