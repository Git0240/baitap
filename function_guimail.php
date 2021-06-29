<?php 
require_once('Mailer-master/class.phpmailer.php');  
require_once("Mailer-master/class.smtp.php"); 

define('GUSER', 'nguyenhasnc@gmail.com'); // tài khoản đăng nhập Gmail
define('GPWD', '024036meoo'); // mật khẩu cho cái mail này  '

function smtpmailer($to, $from, $from_name, $subject, $body) { 
    global $error;
    $mail = new PHPMailer();  // tạo một đối tượng mới từ class PHPMailer
    $mail->IsSMTP(); // bật chức năng SMTP
    $mail->SMTPDebug = 0;  // kiểm tra lỗi : 1 là  hiển thị lỗi và thông báo cho ta biết, 2 = chỉ thông báo lỗi
    $mail->SMTPAuth = true;  // bật chức năng đăng nhập vào SMTP này
    $mail->SMTPSecure = 'ssl'; // sử dụng giao thức SSL vì gmail bắt buộc dùng cái này
    $mail->Host = "smtp.gmail.com"; // SMTP server
    $mail->Port = 465; 
    $mail->Username = GUSER;  
    $mail->Password = GPWD;           
	$mail->IsHTML(true);
	
    $mail->SetFrom($from, $from_name);
    $mail->Subject = $subject;
	$mail->CharSet = "utf-8";
    $mail->Body = $body;
    $mail->AddAddress($to);
    if(!$mail->Send()) {
        $error = 'G?i mail b? l?i: '.$mail->ErrorInfo; 
        return false;
    } else {
        $error = 'G?i mail th�nh c�ng ';
        return true;
    }
}  
?>
