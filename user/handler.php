<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require $_SERVER['DOCUMENT_ROOT'] . '/mail/Exception.php';
require $_SERVER['DOCUMENT_ROOT'] . '/mail/PHPMailer.php';
require $_SERVER['DOCUMENT_ROOT'] . '/mail/SMTP.php';


include 'includes/session.php';

$conn = $con->open();
$return = $_SERVER['HTTP_REFERER'];


if(isset($_POST['update'])){

    $fname = $_POST['inputFirstName'];
    $lname = $_POST['inputLastName'];
    $mobile = $_POST['inputMobile'];
    $password = $_POST['inputPassword'];
    $gender =$_POST['gender'];
    $id =$_POST['inputId'];
    


    $sql = $conn->prepare("SELECT * FROM police WHERE idNo =:idNo AND pol_id<>:id");
    $sql->execute(['idNo'=>$id,'id'=>$_SESSION['id']]);
    if($sql->rowCount() > 0){
        $_SESSION['error'] = 'Identity number already exits';
        header('location: '.$return);
        exit(0);
    }


    $sql = $conn->prepare("SELECT * FROM user WHERE idNo =:idNo AND user_id<>:id");
    $sql->execute(['idNo'=>$id,'id'=>$_SESSION['id']]);
    if($sql->rowCount() > 0){
        $_SESSION['error'] = 'Identity number already exits';
        header('location: '.$return);
        exit(0);
    }

    $sql = $conn->prepare("SELECT * FROM police WHERE mobile =:mobile AND pol_id<>:id");
    $sql->execute(['mobile'=>$mobile,'id'=>$_SESSION['id']]);
    if($sql->rowCount() > 0){
        $_SESSION['error'] = 'Mobile already exits';
        header('location: '.$return);
        exit(0);
    }


    $sql = $conn->prepare("SELECT * FROM user WHERE mobile =:mobile AND user_id<>:id");
    $sql->execute(['mobile'=>$mobile,'id'=>$_SESSION['id']]);
    if($sql->rowCount() > 0){
        $_SESSION['error'] = 'Mobile already exits';
        header('location: '.$return);
        exit(0);
    }

    try {

        $query = $conn->prepare("UPDATE user SET first_name=:first_name,last_name=:last_name,gender=:gender,idNo=:idNo,mobile=:mobile, password=:password 
                                          WHERE user_id=:id");
        $query->execute(['first_name' => $fname,'last_name' => $lname, 'gender' => $gender,'idNo' => $id, 'password' => $password,'mobile'=>$mobile,'id'=>$_SESSION['id']]);

        $_SESSION['success'] = 'Profile successfully updated';
        header('location: login.php');

    } catch (PDOException $e) {
        $_SESSION['error'] = $e->getMessage();
        header('location: '.$return);
    }

}

if(isset($_POST['updateAbout'])){

    try {

        $query = $conn->prepare("UPDATE fugitive SET user_id=:user_id WHERE fugitive_id=:id");
        $query->execute(['user_id'=>$_SESSION['id'],'id'=>$_POST['updateAbout']]);

    } catch (PDOException $e) {
        $_SESSION['error'] = $e->getMessage();
    }

    $sql = $conn->prepare("SELECT * FROM fugitive WHERE fugitive_id=:id");
    $sql->execute(['id'=>$_POST['updateAbout']]);
    $get = $sql->fetch();

    return json_encode($get);
}

if(isset($_POST['fugitives'])){


    try{

        $sql = $conn->prepare("SELECT * FROM fugitive");
        $sql->execute();
        $get = $sql->fetchAll();

    }
    catch(PDOException $e){
        $get = $e->getMessage();
    }

    echo json_encode($get);

}

if(isset($_POST['report'])){

    $fugitive_num = $_POST['report'];
    $lat = $_POST['lat'];
    $lng = $_POST['lng'];
    $case_num = substr(rand(),0,6);
    $id = $_SESSION['id'];


    $case = $conn->prepare("SELECT * FROM alert WHERE user_id=:user_id AND fugitive_id=:fug_id");
    $case->execute(['user_id'=>$_SESSION['id'],'fug_id'=>$fugitive_num]);

    if($case->rowCount() > 0){
        $_SESSION['error'] = 'You already have an ongoing case';
        header('location: '.$return);
        exit(0);
    }else{
            try{
    
            $sql = $conn->prepare("INSERT INTO alert(case_number,fugitive_id,user_id,date) 
                                            VALUES(:case_number,:fugitive_id,:user_id,:date)");
            $sql->execute(['case_number'=>$case_num,'fugitive_id'=>$fugitive_num,'user_id'=>$id,
            'date'=>date('Y-m-d H:i:s', strtotime('+2 hours'))]);
    
    
            $sql = $conn->prepare("INSERT INTO map(case_number,lat,lng) 
                                            VALUES(:case_number,:lat,:lng)");
            $sql->execute(['case_number'=>$case_num,'lat'=>$lat,'lng'=>$lng]);
    
    
            $sql = $conn->prepare("SELECT * FROM fugitive WHERE fugitive_id=:id");
            $sql->execute(['id'=>$fugitive_num]);
            $results = $sql->fetch();
    
    
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
            $mail->AddAddress("crimealertsystem21@gmail.com", "police");
            $mail->SetFrom("crimealertsystem21@gmail.com", "Police Crime App Support");
    
            $mail->Subject = 'New Alert';
            
            $message= "<html><body>
                    <p>Hi police</p>
                    <p>".$results['first_name'].' '.$results['last_name']." has been reported, please check alerts on the app for more info...</p>
                    <p>Case Number: ".$case_num."</p><br>
                    <a href='https://policealertapp.000webhostapp.com/police/alerts.php' style='color: orange'>View Alerts</a>
                    </body></html>
                 ";
            
            $mail->msgHTML($message);
            $mail->AltBody = 'HTML messaging not supported'; // If html emails is not supported by the receiver, show 
            $mail->SMTPOptions = array(
                'ssl' => array(
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                )
            );
            $mail->send();    
    
        }
        catch(PDOException $e){
            $case_num = $e->getMessage();
        }
    
    }
      $_SESSION['case_number'] = $case_num;
      header('location: '.$return);

}

if(isset($_POST['getAlert'])){

    $case_num = $_POST['getAlert'];

    try{

        $sql = $conn->prepare("SELECT * FROM alert,map WHERE alert.case_number=:case_number AND map.case_number=alert.case_number ");
        $sql->execute(['case_number'=>$case_num]);
        $get = $sql->fetch();

    }
    catch(PDOException $e){
        $get = $e->getMessage();
    }

    echo json_encode($get);
}

$con->close();
?>
