<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require $_SERVER['DOCUMENT_ROOT'] . '/mail/Exception.php';
require $_SERVER['DOCUMENT_ROOT'] . '/mail/PHPMailer.php';
require $_SERVER['DOCUMENT_ROOT'] . '/mail/SMTP.php';

$mail = new PHPMailer;
$mail->isSMTP();
$mail->SMTPDebug = 2; // 0 = off (for production use) - 1 = client messages - 2 = client and server messages
$mail->Host = "smtp.gmail.com"; // use $mail->Host = gethostbyname('smtp.gmail.com'); // if your network does not support SMTP over IPv6
$mail->Port = 587; // TLS only
$mail->SMTPSecure = 'tls'; // ssl is deprecated
$mail->SMTPAuth = true;

$mail->Username   = "crimealertsystem21@gmail.com";
$mail->Password   = "1234@Abc";

$mail->IsHTML(true);
$mail->AddAddress("goldwinfana5@gmail.com", "police");
$mail->SetFrom("crimealertsystem21@gmail.com", "Police Crime App");


$mail->addAddress('goldwinfana5@gmail.com', 'Police Crime App'); // to email and name

$mail->Subject = 'New Alert';
$mail->msgHTML( "
        <p>Hi police</p>
        <p>Kat has been reported, please check alerts on the app for more info...</p>
        <p>Case Number: 5556zxzzx</p><br>
        <a href='https://policealertapp.000webhostapp.com/police/alerts.php' style='color: orange'>View Alerts</a>
     ");
$mail->AltBody = 'HTML messaging not supported'; // If html emails is not supported by the receiver, show this body
// $mail->addAttachment('images/phpmailer_mini.png'); //Attach an image file
$mail->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    )
);
if(!$mail->send()){
    echo "Mailer Error: " . $mail->ErrorInfo;
}else{
    echo "Message sent!";
}

?>
