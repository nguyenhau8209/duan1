<?php

function quen_mk()
{
   render('quen_mk');
}
function xacnhan_mk()
{
   // call DB kiem tra ma
   render('xacnhan_mk');
}
function doi_mk()
{
   // sua DB
   render('doi_mk');
}

function sendmail()
{
   if (isset($_POST['btn_login'])) {
      // email truyền từ form
      $error = [];
      $email = $_POST['email'];
      $_SESSION['mail'] = $email;
      $check_mail =  check_mail($email);
      // Kiểm tra mail $email có trong data base hay ko?
      // Có đi tiếp
      // không có: false trả về mail ko tồn tại
      if ($check_mail) {
         require_once("./PHPMailer/src/PHPMailer.php");
         require_once("./PHPMailer/src/SMTP.php");
         require_once("./PHPMailer/src/Exception.php");
         $mail = new PHPMailer\PHPMailer\PHPMailer();
         $mail->IsSMTP(); // enable SMTP
         //   $mail->SMTPDebug = 2; // debugging: 1 = errors and messages, 2 = messages only
         $mail->SMTPAuth = true; // authentication enabled
         $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
         $mail->Host = "smtp.gmail.com";
         $mail->Port = 465; // or 587
         $mail->IsHTML(true);
         $mail->Username = "hieuntph44053@fpt.edu.vn";
         $mail->Password = "qihqmpqnwgbyoztw";
         $mail->SetFrom("hieuntph44053@fpt.edu.vn");
         $subject = "HieuNT Send Mail reset password";
         $mail->Subject = $subject;
         // Call data lấy dữ liệu như FE
         // Truyền các dữ liệu data vào form bên dưới
         // Mã tự sinh
         $ma = rand(1, 9999);
         $_SESSION['ma_goi'] = $ma;
         // insert ma va mail vao DB doi MK
         $body = '
         <table width="100%" border="0" cellspacing="0" cellpadding="0" style="font-family: Arial, sans-serif; background-color: #f2f2f2; padding: 20px;">
             <tr>
                 <td align="center">
                     <table border="0" cellspacing="0" cellpadding="0" style="max-width: 600px; width: 100%; background-color: #ffffff; border-radius: 10px; box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);">
                         <tr>
                             <td style="padding: 30px; text-align: center;">
                                 <h2 style="color: #e91e63; font-family: \'Helvetica Neue\', sans-serif; margin-bottom: 20px;">Chào mừng bạn đến với Thể Thao Store!</h2>
                                 <p style="font-size: 18px; color: #555; font-family: \'Helvetica\', sans-serif;">Xin chào quý khách hàng thân mến,</p>
                                 <p style="font-size: 18px; color: #555; font-family: \'Helvetica\', sans-serif;">Chúng tôi nhận được yêu cầu đặt lại mật khẩu của bạn. Dưới đây là mã xác nhận của bạn:</p>
                                 <p style="font-size: 24px; color: #e91e63; font-family: \'Helvetica Neue\', sans-serif;"><strong>' . $ma . '</strong></p>
                                 <p style="font-size: 18px; color: #555; font-family: \'Helvetica\', sans-serif;">Vui lòng sử dụng mã này để hoàn tất quá trình đặt lại mật khẩu.</p>
                                 <p style="font-size: 18px; color: #555; font-family: \'Helvetica\', sans-serif;">Cảm ơn bạn đã luôn ủng hộ Thể Thao Store. Chúc bạn một ngày tốt lành!</p>
                                 <p style="font-size: 14px; color: #888; font-family: \'Helvetica\', sans-serif;">Trân trọng,<br />Đội ngũ Thể Thao Store</p>
                             </td>
                         </tr>
                     </table>
                 </td>
             </tr>
         </table>
     ';
         $mail->Body = $body;
         $mail->AddAddress($email);
         if (!$mail->Send()) {
            echo "mail loi: " . $mail->ErrorInfo;
         } else {
            header('location:?act=xacnhan_mk');
         }
      } else {
         $error['mail'] = "Tài khoản không tồn tại!!!";
         header("refresh:3; ?act=quen_mk");
      }
   }
   render('quen_mk', ['error' => $error]);
}
function Confirm_password()
{
   $error = [];
   if (isset($_POST['btn_login'])) {
      $Confirm = $_POST['Confirm'];
      if ($Confirm == "") {
         $error['error'] = 'Vui lòng nhập mã xác nhận ! ';
      }
      if ($Confirm ==  $_SESSION['ma_goi']) {
         $error['error'] = 'mã xác nhận đúng!vui lòng đợi sau 3s';
         header("refresh:1; ?act=doi_mk");
      } else {
         $error['error'] = 'Mã xác thực không chính xác Vui lòng check email để lấy mã';
      }
   }
   render('xacnhan_mk', ['error' => $error]);
}

function update_password()
{
   $error = array();
   if (isset($_POST['btn_login'])) {
      $email = $_SESSION['mail'];
      $pass = $_POST['password'];
      if (empty($_POST['password'])) {
         $error['password'] = "không được để trống pass";
      }
      if ($_POST['password'] != $_POST['Confirm']) {
         $error['password1'] = "Mật khẩu mới và xác nhận mật khẩu mới không khớp nhau!";
      } else if (empty($error)) {
         $error['password1'] = "Đổi mật khẩu thành công!Bạn sẽ được chuyển hướng sau 3s";
         update_pass($email, $pass);
         header("refresh:3; ?act=login");
      }
   }
   render('doi_mk', ['error' => $error]);
}
