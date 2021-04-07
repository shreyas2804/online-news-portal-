<?php 
use PHPMailer\PHPMailer\PHPMailer;
    
    require_once "PHPMailer/Exception.php";
    require_once "PHPMailer/PHPMailer.php";
    require_once "PHPMailer/SMTP.php";
    

    $mail = new PHPMailer(true);

    $alert ='';

    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $subject = $_POST['subject'];
        $message = $_POST['message'];

    //smtp settings
    try{
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'markadshreyas@gmail.com';
    $mail->Password = '';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;
    
    $mail->setFrom('markadshreyas@gmail.com');
    $mail->addAddress('markadshreyas@gmail.com');

    $mail->isHTML(true);
    $mail->Subject = 'message received (contact page)';
    $mail->Body = '<h3>Name : $name <br>Email: $email <br>Title: $subject <br>Message: $message </h3>';
    
    $mail->send();
    $alert = '<div class="alert-success">
                    <span>Message sent! </span>
            </div>';
    }catch (Exception $e){
        $alert = '<div class="alert-error">
                     <span>'.$e->getMessage().'</span>
                    </div>';
    }
}
?>