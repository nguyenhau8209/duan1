<?php
function feedback(){
    render('feedback');
}
function list_feedback(){
    $all_feedback = all_feedback();
    render('admin/list_feedback',['list_feedback'=>$all_feedback]);
}
function send_feedback(){
    $fb_id = $_GET['id'];
    $customer = feedback_one($fb_id);
    if (isset($_SESSION['user'])) {
    render('admin/send_feedback',['customer'=>$customer]);
    }else{
        render('admin/404');
    }   
}
function update_status_feedback(){
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update_feedback'])) {
        foreach ($_POST['feedback_status'] as $feedbackId => $newStatus) {
            update_status($feedbackId, $newStatus);
        }
        header("location:?act=show_feedback_admin"); 
        exit();
    }
}
function send_feedback_ctr()
{
    if (isset($_POST['send_feedback'])) {
        $error = [];
        $email = $_POST['email'];
        // Kiểm tra email hợp lệ ở đây nếu cần
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error['email'] = "Địa chỉ email không hợp lệ!";
        }
        // ...
        if (!empty($error)) {
            render('admin/send_feedback', ['error' => $error]);
            return;
        }

        require_once("./PHPMailer/src/PHPMailer.php");
        require_once("./PHPMailer/src/SMTP.php");
        require_once("./PHPMailer/src/Exception.php");

        $mail = new PHPMailer\PHPMailer\PHPMailer();
        $mail->IsSMTP();
        $mail->CharSet=('utf-8');
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'ssl';
        $mail->Host = "smtp.gmail.com";
        $mail->Port = 465;
        $mail->IsHTML(true);
        $mail->Username = "storethethao@gmail.com";
        $mail->Password = "lpcdjkxjtoufrkor";
        $mail->SetFrom("storethethao@gmail.com");
        $subject = $_POST['subject'];
        $mail->Subject = $subject;
        $id = $_POST['id'];
        $message = $_POST['reply'];
      
        $body = '
        <div style="background-color: #f4f4f4; padding: 20px; font-family: Arial, sans-serif;">
            <div style="max-width: 600px; margin: 0 auto; background-color: #ffffff; border-radius: 10px; box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.1); overflow: hidden;">
                <table style="width: 100%; background-color: #f4f4f4;">
                    <tr>
                        <td style="text-align: center; padding: 30px;">
                            <img src="https://bizweb.dktcdn.net/100/428/250/themes/822996/assets/logo.png?1681911001649" alt="Your Logo" style="max-width: 150px;">
                        </td>
                    </tr>
                    <tr>
                        <td style="padding: 0 40px;">
                            <h2 style="color: #e91e63; font-family: \'Helvetica Neue\', sans-serif; margin-bottom: 20px;">Phản hồi từ TheThaoStore</h2>
                            <p style="font-size: 18px; color: #333; font-family: \'Helvetica\', sans-serif;">Xin chào khách hàng thân mến,</p>
                            <p style="font-size: 18px; color: #333; font-family: \'Helvetica\', sans-serif;">Chúng tôi xin cảm ơn bạn đã dành thời gian để chia sẻ phản hồi của mình với chúng tôi.</p>
                            <div style="background-color: #ffffff; border-radius: 5px; padding: 20px; margin-top: 20px;">
                                <p style="font-size: 18px; color: #333; font-family: \'Helvetica\', sans-serif;">Nội dung phản hồi:</p>
                                <div style="background-color: #f2f2f2; padding: 15px; border-radius: 5px; margin-top: 10px; font-size: 16px; color: #555; font-family: \'Helvetica\', sans-serif;">
                                    ' . $message . '
                                </div>
                            </div>
                            <p style="font-size: 18px; color: #333; font-family: \'Helvetica\', sans-serif;">Nếu bạn cần thêm thông tin hoặc có bất kỳ câu hỏi nào, vui lòng liên hệ với chúng tôi bất cứ lúc nào.</p>
                            <p style="font-size: 18px; color: #333; font-family: \'Helvetica\', sans-serif;">Trân trọng,<br>TheThaoStore</p>
                        </td>
                    </tr>
                    <tr>
                        <td style="background-color: #e91e63; padding: 20px; text-align: center;">
                            <p style="font-size: 14px; color: #fff; font-family: \'Helvetica\', sans-serif;">Địa chỉ: 20 Nghĩa Đô - Q.Cầu Giấy - TP.Hà Nội</p>
                            <p style="font-size: 14px; color: #fff; font-family: \'Helvetica\', sans-serif;">Email: @storethethao.com</p>
                            <p style="font-size: 14px; color: #fff; font-family: \'Helvetica\', sans-serif;">Hotline: 0835 588 555</p>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        ';
        $mail->Body = $body;
        $mail->AddAddress($email); // Địa chỉ email người nhận
        if (!$mail->Send()) {
            echo "Lỗi gửi email: " . $mail->ErrorInfo;
        } else {
            update_status($id);
            header("location: ?act=show_feedback_admin");
        }
    }
}
function delete_feedback_ctr(){
    if (isset($_GET['act']) && $_GET['act'] === 'delete_feedback' && isset($_GET['id'])) {
        $feedback_id = $_GET['id'];
        delete_feedback($feedback_id);
        header("location:?act=show_feedback_admin"); 
        }
}

