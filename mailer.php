<?php 
require("PHPMailer/PHPMailerAutoload.php");
function teste() {echo($_POST['email']);}
function send_mail(){
    $subject = $_POST['name'] . " subscribed.";
    $body ='<p> New subscription from:</p>';
    $body .= '<p> ' . $_POST['name'] . ' with the email: ' . $_POST['email'] . '</p>';
    // Enter Your Email Address Here To Receive Email
    $email_to = "emailto";
    
    $email_from = "emailfrom"; // Enter Sender Email
    $sender_name = $_POST['name']; // Enter Sender Name
    
    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->Host = "hostaddress"; // Enter Your Host/Mail Server
    $mail->SMTPAuth = true;
    $mail->Username = "hostlogin"; // Enter Sender Email
    $mail->Password = "hostpassword";
    //If SMTP requires TLS encryption then remove comment from below
    //$mail->SMTPSecure = "tls";
    $mail->Port = 587;
    $mail->IsHTML(true);
    $mail->From = $_POST['email'];
    $mail->FromName = $_POST['name'];
    $mail->Sender = $email_from; // indicates ReturnPath header
    $mail->AddReplyTo($email_from, "No Reply"); // indicates ReplyTo headers
    $mail->Subject = $subject;
    $mail->Body = $body;
    $mail->AddAddress($email_to);
    // If you know receiver name use following
    //$mail->AddAddress($email_to, "Recepient Name");
    // To send CC remove comment from below
    //$mail->AddCC('username@email.com', "Recepient Name");
    // To send attachment remove comment from below
    //$mail->AddAttachment('files/readme.txt');
    /*
    Please note file must be available on your
    host to be attached with this email.
    */

    if (!$mail->Send()){
        echo "Mailer Error: " . $mail->ErrorInfo;
        unset($_POST);
    }else{
        unset($_POST);
        header('Location:'.$_SERVER['PHP_SELF']);
        session_start();
        $_SESSION['sucess'] = true;
        $_SESSION['msg'] = "<div class='text-center' id='message'  >
        success message!</div>";
    }

}
?>