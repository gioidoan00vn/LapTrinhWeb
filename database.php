<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
// Load Composer's autoloader
require './vendor/autoload.php';
$servername = "localhost";
$username = "root";
$password = "";
$db = "quanlilophoc";
function ConnectDB(){

    $servername = "localhost";
    $username = "root";
    $password = "";
    $db = "quanlilophoc";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $db);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    return $conn;
}
function CloseDB($conn){
    $conn->close();
}

function is_email_exists($email){
    $conn=ConnectDB();
    $sql="Select Email from user";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            if ($email === $row['Email']) {
                return true;
            }
        }
    }else{
        return false;
    }
}

function sendEmailResetPassword($email, $token) {

    // Instantiation and passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        //Server settings
        //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
        $mail->CharSet = 'UTF-8';
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'khoanguyenminh222@gmail.com';                     // SMTP username
        $mail->Password   = 'vhyieethzgozkehi'; // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

        //Recipients
        $mail->setFrom('khoanguyenminh222@gmail.com', 'Admin web lớp học');
        $mail->addAddress($email, 'Người nhận');     // Add a recipient
        // $mail->addAddress('ellen@example.com');               // Name is optional
        // $mail->addReplyTo('info@example.com', 'Information');
        // $mail->addCC('cc@example.com');
        // $mail->addBCC('bcc@example.com');

        // // Attachments
        // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'Khôi phục mật khẩu của bạn';
        $mail->Body    = "Click <a href='http://localhost:8899/DoAn/code/reset_password.php?email=$email&token=$token'>vào đây</a> để khôi phục mật khẩu của bạn";
        //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        return true;
    } catch (Exception $e) {
        return false;
    }
}

function reset_pasword($email){
    if(!is_email_exists($email)){
        return array('code'=>1, 'error'=>'Email does not exist');
    }
    $token=md5($email.'+'. random_int(1000,2000));
    $sql = 'update reset_token set token=? where email=?';
    $conn = ConnectDB();
    $stm = $conn->prepare($sql);
    $stm-> bind_param('ss',$token,$email);
    if(!$stm->execute()){
        return array('code'=>2, 'error'=>'Can not execute command');
    }
    if($stm->affected_rows==0){
        $exp = time()+3600*24;
        $sql ='insert into reset_token values(?,?)';
        $stm=$conn->prepare($sql);
        $stm->bind_param("ss",$email,$token);

        if($stm->execute()){
            return array('code'=>1, 'error'=>'Can not execute command');
        }
    }
    $success = sendEmailResetPassword($email,$token);
    return array('code'=>0, 'success'=>$success);
}

?>
