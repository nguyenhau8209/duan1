<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    require_once("../PHPMailer/src/PHPMailer.php");
    require_once("../PHPMailer/src/SMTP.php");
    require_once("../PHPMailer/src/Exception.php");
        $mail = new PHPMailer\PHPMailer\PHPMailer();
        $mail->IsSMTP(); // enable SMTP
        $mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
        $mail->SMTPAuth = true; // authentication enabled
        $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
        $mail->Host = "smtp.gmail.com";
        $mail->Port = 465; // or 587
        $mail->IsHTML(true);
        $mail->Username = "hieuntph44053@fpt.edu.vn";
        $mail->Password = "lpcdjkxjtoufrkor";
        $mail->SetFrom("hieuntph44053@fpt.edu.vn");
        $subject = "HieuNT Send Mail reset password";
        $mail->Subject = $subject;


        // Call data lấy dữ liệu như FE
        // Truyền các dữ liệu data vào form bên dưới
        $ma = 'Hieu';
        $body = "<table width=100% border=0>";
        $body .= '<tr>';
        $body .= '<td style=position:absolute;left:0;top:60;>';
        $body .= '<h2>';
        $body .= "<font color = #346699>Shop Men.</font>";
        $body .= '<h2>';
        $body .= '</td>';
        $body .= '</tr>';
        $body .= '<tr>';
        $body .= '<td colspan=2><br/><br/><br/>';
        $body .= '<strong>Dear '.$ma.',</strong>';
        $body .= '<strong>Ma Reset: 999999 ,</strong>';
        $body .= '</td>';
        $body .= '</tr>';
        $body .= '<tr>';
        $body .= '<td colspan=2><br/><br/><br/>';
        $body .= 'Best regards,<br>The Shop Men.';
        $body .= '</td>';
        $body .= '</tr>';
        $body .= '</table>';
        
        
        $mail->Body = $body;
        $mail->AddAddress("nguyentienhieu632@gmail.com");

        if (!$mail->Send()) {
            echo "mail loi: " . $mail->ErrorInfo;
        } else {
            echo "thanh cong";
        }
    ?>
</body>

</html>