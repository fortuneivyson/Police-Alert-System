<?php

include 'includes/session.php';
$conn = $con->open();
$return = $_SERVER['HTTP_REFERER'];

if(isset($_POST['register'])){

    $fname = $_POST['inputFirstName'];
    $lname = $_POST['inputLastName'];
    $email = $_POST['inputEmail'];
    $mobile = $_POST['inputMobile'];
    $password = $_POST['inputPassword'];
    $gender =$_POST['register'];
    $id =$_POST['inputId'];
   // $no = substr(date('Y'),2,2).substr($idNo,2,4).substr(rand(),0,3);


    $sql = $conn->prepare("SELECT * FROM police WHERE email =:email");
    $sql->execute(['email'=>$email]);
    if($sql->rowCount() > 0){
        $_SESSION['error'] = 'Email already exits';
        header('location: '.$return);
        exit(0);
    }


    $sql = $conn->prepare("SELECT * FROM user WHERE email =:email");
    $sql->execute(['email'=>$email]);
    if($sql->rowCount() > 0){
        $_SESSION['error'] = 'Email already exits';
        header('location: '.$return);
        exit(0);
    }

    $sql = $conn->prepare("SELECT * FROM police WHERE mobile =:mobile");
    $sql->execute(['mobile'=>$mobile]);
    if($sql->rowCount() > 0){
        $_SESSION['error'] = 'Mobile already exits';
        header('location: '.$return);
        exit(0);
    }


    $sql = $conn->prepare("SELECT * FROM user WHERE mobile =:mobile");
    $sql->execute(['mobile'=>$mobile]);
    if($sql->rowCount() > 0){
        $_SESSION['error'] = 'Mobile already exits';
        header('location: '.$return);
        exit(0);
    }

    try {

        $query = $conn->prepare("INSERT INTO user (first_name,last_name,gender,email,idNo,mobile, password) 
                                          VALUES (:first_name,:last_name, :gender,:email,:idNo,:mobile,:password)");
        $query->execute(['first_name' => $fname,'last_name' => $lname, 'gender' => $gender, 'email' => $email,'idNo' => $id, 'password' => $password,'mobile'=>$mobile]);

        $_SESSION['success'] = 'User successfully registered';
        header('location: login.php');

    } catch (PDOException $e) {
        $_SESSION['error'] = $e->getMessage();
        header('location: '.$return);
    }

}

if(isset($_POST['login'])){

    $email = $_POST['inputEmail'];
    $password = $_POST['inputPassword'];

    try{

        $sql = $conn->prepare("SELECT * FROM police WHERE email = :email");
        $sql->execute(['email'=>$email]);
        $get = $sql->fetch();

        if($sql->rowCount() > 0){
            if($password == $get['password']){
                $_SESSION['user'] = 'police';
                $_SESSION['name'] = $get['pol_name'].' '.$get['pol_surname'];
                $_SESSION['id'] = $get['pol_id'];
                $_SESSION['idNo'] = $get['idNo'];
                $_SESSION['gender'] = $get['gender'];
                $_SESSION['mobile'] = $get['mobile'];
                $_SESSION["logged"] = true;
                $_SESSION["email"] = $get['email'];
                $_SESSION['surname'] = $get['pol_surname'];
                $_SESSION['name'] = $get['pol_name'];
                $_SESSION['password'] = $get['password'];
                header('location: police/dashboard.php');
                exit(0);
            }
            else{
                $_SESSION['error'] = 'Incorrect Password...';
                header('location: '.$return);
                exit(0);
            }
        }


        $sql = $conn->prepare("SELECT * FROM user WHERE email = :email");
        $sql->execute(['email'=>$email]);
        $get = $sql->fetch();

        if($sql->rowCount() > 0){
            if($password == $get['password']){
                $_SESSION['user'] = 'user';
                $_SESSION['name'] = $get['first_name'].' '.$get['last_name'];
                $_SESSION['id'] = $get['user_id'];
                $_SESSION['idNo'] = $get['idNo'];
                $_SESSION['gender'] = $get['gender'];
                $_SESSION['mobile'] = $get['mobile'];
                $_SESSION['status'] = 'active';
                $_SESSION['image'] = $get['image'];
                $_SESSION['password'] = $get['password'];
                $_SESSION['first'] = $get['first_name'];
                $_SESSION['last'] = $get['last_name'];

                $_SESSION["logged"] = true;
                $_SESSION["email"] = $get['email'];
                header('location: user/dashboard.php');
                exit(0);
            }
            else{
                $_SESSION['error'] = 'Incorrect Password...';
                header('location: '.$return);
                exit(0);
            }
        }
        else{
            $_SESSION['error'] = 'Email Does Not Exist...';
            header('location: '.$return);
        }
    }
    catch(PDOException $e){
        $_SESSION['error'] = $e->getMessage();
    }


}

if(isset($_POST['reset'])){

    $email = $_POST['email'];
    $password = $_POST['password'];

    try{

        $sql = $conn->prepare("SELECT * FROM user WHERE email = :email");
        $sql->execute(['email'=>$email]);
        $results = $sql->fetch();

        if($sql->rowCount() < 1){
            $_SESSION['error'] = 'Email Does Not Exist...';
            header('location: '.$return);
        }else {

            $sql = $conn->prepare("UPDATE user SET password=:password WHERE email=:email");
            $sql->execute(['email' => $email, 'password'=>$password]);
            $_SESSION['success'] = 'Password Reset Successfully...';
            header('location: login.php');
        }
    }
    catch(PDOException $e){
        $_SESSION['error'] = $e->getMessage();
    }

}


$conn->close();
?>
