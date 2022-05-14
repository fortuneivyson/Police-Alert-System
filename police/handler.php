<?php  include 'includes/session.php';
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
    $sql->execute(['idNo'=>$id,'id'=>$_POST['edit_id']]);
    if($sql->rowCount() > 0){
        $_SESSION['error'] = 'Identity number already exits';
        header('location: '.$return);
        exit(0);
    }


    $sql = $conn->prepare("SELECT * FROM user WHERE idNo =:idNo AND user_id<>:id");
    $sql->execute(['idNo'=>$id,'id'=>$_POST['edit_id']]);
    if($sql->rowCount() > 0){
        $_SESSION['error'] = 'Identity number already exits';
        header('location: '.$return);
        exit(0);
    }

    $sql = $conn->prepare("SELECT * FROM police WHERE mobile =:mobile AND pol_id<>:id");
    $sql->execute(['mobile'=>$mobile,'id'=>$_POST['edit_id']]);
    if($sql->rowCount() > 0){
        $_SESSION['error'] = 'Mobile already exits';
        header('location: '.$return);
        exit(0);
    }


    $sql = $conn->prepare("SELECT * FROM user WHERE mobile =:mobile AND user_id<>:id");
    $sql->execute(['mobile'=>$mobile,'id'=>$_POST['edit_id']]);
    if($sql->rowCount() > 0){
        $_SESSION['error'] = 'Mobile already exits';
        header('location: '.$return);
        exit(0);
    }

    try {

        if(isset($_POST['police_edit'])){
            $query = $conn->prepare("UPDATE police SET pol_name=:pol_name,pol_surname=:pol_surname,gender=:gender,idNo=:idNo,mobile=:mobile, password=:password 
                                               WHERE pol_id=:id");
            $query->execute(['pol_name' => $fname,'pol_surname' => $lname, 'gender' => $gender,'idNo' => $id, 'password' => $password,'mobile' =>$mobile ,'id'=>$_POST['edit_id']]);
        }else{
            $query = $conn->prepare("UPDATE user SET first_name=:first_name,last_name=:last_name,gender=:gender,idNo=:idNo,mobile=:mobile, password=:password 
                                          WHERE user_id=:id");
            $query->execute(['first_name' => $fname,'last_name' => $lname, 'gender' => $gender,'idNo' => $id, 'password' => $password,'mobile'=>$mobile,'id'=>$_POST['edit_id']]);

        }

        $_SESSION['success'] = 'Profile successfully updated';

    } catch (PDOException $e) {
        $_SESSION['error'] = $e->getMessage();
    }
    header('location: '.$return);

}

if(isset($_POST['new-account'])){

    $fname = $_POST['add-first-name'];
    $lname = $_POST['add-last-name'];
    $mobile = $_POST['add-mobile'];
    $password = $_POST['add-password'];
    $gender =$_POST['gender'];
    $id =$_POST['add-id'];
    $email =$_POST['add-email'];


    $sql = $conn->prepare("SELECT * FROM police WHERE idNo =:idNo");
    $sql->execute(['idNo'=>$id]);
    if($sql->rowCount() > 0){
        $_SESSION['error'] = 'Identity number already exits';
        header('location: '.$return);
        exit(0);
    }


    $sql = $conn->prepare("SELECT * FROM user WHERE idNo =:idNo");
    $sql->execute(['idNo'=>$id]);
    if($sql->rowCount() > 0){
        $_SESSION['error'] = 'Identity number already exits';
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
        if($_POST['new-account'] == 'police') {
            $query = $conn->prepare("INSERT INTO police(pol_name,pol_surname,gender,idNo,mobile,email, password ) 
                                              VALUES(:first_name,:last_name,:gender,:idNo,:mobile,:email,:password )");
            $query->execute(['first_name' => $fname,'last_name' => $lname, 'gender' => $gender,'idNo' => $id,'email'=>$email, 'password' => $password,'mobile' => $mobile]);
        }else{
            $query = $conn->prepare("INSERT INTO user(pol_name,pol_surname,gender,idNo,mobile,email, password) 
                                              VALUES(:first_name,:last_name,:gender,:idNo,:mobile,:email,:password )");
            $query->execute(['first_name' => $fname,'last_name' => $lname, 'gender' => $gender,'idNo'=> $id,'email'=>$email, 'password' => $password,'mobile'=>$mobile]);

        }

        $_SESSION['success'] = 'Account successfully created';

    } catch (PDOException $e) {
        $_SESSION['error'] = $e->getMessage();

    }
    header('location: '.$return);

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
if(isset($_POST['delete-case'])){

    try{

        $sql = $conn->prepare("DELETE FROM alert WHERE case_number=:id");
        $sql->execute(['id'=>$_POST['delete-case']]);

        $sql = $conn->prepare("DELETE FROM map WHERE case_number=:id");
        $sql->execute(['id'=>$_POST['delete-case']]);
        $_SESSION['success'] = 'Case '.$_POST['delete-case'].' successfully deleted';

    }
    catch(PDOException $e){
        $_SESSION['error'] = $e->getMessage();
    }

    header('location: '.$return);

}

if(isset($_POST['delete-user'])){

    try{

        $sql = $conn->prepare("DELETE FROM user WHERE user_id=:id");
        $sql->execute(['id'=>$_POST['delete-user']]);
        $_SESSION['success'] = 'User with id '.$_POST['delete-user'].' successfully deleted';

    }
    catch(PDOException $e){
        $_SESSION['error'] = $e->getMessage();
    }

    header('location: '.$return);

}

if(isset($_POST['delete-police'])){

    try{

        $sql = $conn->prepare("DELETE FROM police WHERE pol_id=:id");
        $sql->execute(['id'=>$_POST['delete-police']]);
        $_SESSION['success'] = 'police with id '.$_POST['delete-user'].' successfully deleted';

    }
    catch(PDOException $e){
        $_SESSION['error'] = $e->getMessage();
    }

    header('location: '.$return);

}

if(isset($_POST['delete-fugitive'])){

    try{

        $sql = $conn->prepare("DELETE FROM fugitive WHERE fugitive_id=:id");
        $sql->execute(['id'=>$_POST['delete-fugitive']]);
        $_SESSION['success'] = 'Fugitive with id '.$_POST['delete-fugitive'].' successfully deleted';


        $sql = $conn->prepare("DELETE FROM alert WHERE fugitive_id=:id");
        $sql->execute(['id'=>$_POST['delete-fugitive']]);
    }
    catch(PDOException $e){
        $_SESSION['error'] = $e->getMessage();
    }

    header('location: '.$return);

}

if(isset($_POST['report'])){

    $fugitive_num = $_POST['report'];
    $case_num = substr(rand(),0,6);
    $id = $_SESSION['id'];

    try{

        $sql = $conn->prepare("INSERT INTO alert(case_number,fugitive_id,user_id) 
                                        VALUES(:case_number,:fugitive_id,:user_id)");
        $sql->execute(['case_number'=>$case_num,'fugitive_id'=>$fugitive_num,'user_id'=>$id]);
        $get = $case_num;

    }
    catch(PDOException $e){
        $get = $e->getMessage();
    }

    echo json_encode($get);
}

if(isset($_POST['getpolice'])){

    try{

        $sql = $conn->prepare("SELECT * FROM police WHERE pol_id=:id");
        $sql->execute(['id'=>$_POST['getpolice']]);
        $get = $sql->fetch();

    }
    catch(PDOException $e){
        $get = $e->getMessage();
    }

    echo json_encode($get);

}
if(isset($_POST['getUser'])){

    try{

        $sql = $conn->prepare("SELECT * FROM user WHERE user_id=:id");
        $sql->execute(['id'=>$_POST['getUser']]);
        $get = $sql->fetch();

    }
    catch(PDOException $e){
        $get = $e->getMessage();
    }

    echo json_encode($get);

}

if(isset($_POST['getFugitive'])){

    try{

        $sql = $conn->prepare("SELECT * FROM fugitive WHERE fugitive_id=:id");
        $sql->execute(['id'=>$_POST['getFugitive']]);
        $get = $sql->fetch();

    }
    catch(PDOException $e){
        $get = $e->getMessage();
    }

    echo json_encode($get);

}

if(isset($_POST['alertList'])){

    try{
        $sql = $conn->prepare("SELECT * FROM fugitive,alert WHERE fugitive.fugitive_id=alert.fugitive_id AND alert.fugitive_id=:id ");
        $sql->execute(['id'=>$_POST['alertList']]);
        $get = $sql->fetchAll();
    }
    catch(PDOException $e){
        $get = $e->getMessage();
    }
    echo json_encode($get);
}

if(isset($_POST['getAlert'])){

    $case_num = $_POST['getAlert'];

    try{

        $sql = $conn->prepare("SELECT * FROM alert,map WHERE alert.case_number=:case_number AND map.case_number=alert.case_number");
        $sql->execute(['case_number'=>$case_num]);
        $get = $sql->fetch();

    }
    catch(PDOException $e){
        $get = $e->getMessage();
    }

    echo json_encode($get);
}



if(isset($_POST['edit-police'])){

    $fname = $_POST['police-first-name'];
    $lname = $_POST['police-last-name'];
    $mobile = $_POST['police-mobile'];
    $password = $_POST['police-password'];
    $gender =$_POST['police-gender'];
    $idNo =$_POST['police-id'];
    $id =$_POST['edit-police'];

    $sql = $conn->prepare("SELECT * FROM police WHERE idNo =:idNo AND pol_id<>:id");
    $sql->execute(['idNo'=>$idNo,'id'=>$id]);
    if($sql->rowCount() > 0){
        $_SESSION['error'] = 'Identity number already exits';
        header('location: '.$return);
        exit(0);
    }


    $sql = $conn->prepare("SELECT * FROM user WHERE idNo =:idNo AND user_id<>:id");
    $sql->execute(['idNo'=>$idNo,'id'=>$id]);
    if($sql->rowCount() > 0){
        $_SESSION['error'] = 'Identity number already exits';
        header('location: '.$return);
        exit(0);
    }

    $sql = $conn->prepare("SELECT * FROM police WHERE mobile =:mobile AND pol_id<>:id");
    $sql->execute(['mobile'=>$mobile,'id'=>$id]);
    if($sql->rowCount() > 0){
        $_SESSION['error'] = 'Mobile already exits';
        header('location: '.$return);
        exit(0);
    }


    $sql = $conn->prepare("SELECT * FROM user WHERE mobile =:mobile AND user_id<>:id");
    $sql->execute(['mobile'=>$mobile,'id'=>$id]);
    if($sql->rowCount() > 0){
        $_SESSION['error'] = 'Mobile already exits';
        header('location: '.$return);
        exit(0);
    }

    try {

        $query = $conn->prepare("UPDATE police SET pol_name=:name,pol_surname=:surname,gender=:gender,idNo=:idNo,mobile=:mobile, password=:password 
                                          WHERE pol_id=:id");
        $query->execute(['name' => $fname,'surname' => $lname, 'gender' => $gender,'idNo' => $idNo, 'password' => $password,'mobile'=>$mobile,'id'=>$id]);

        $_SESSION['success'] = 'police successfully updated';

    } catch (PDOException $e) {
        $_SESSION['error'] = $e->getMessage();
    }
    header('location: '.$return);
}


if(isset($_POST['edit-user'])){

    $fname = $_POST['user-first-name'];
    $lname = $_POST['user-last-name'];
    $mobile = $_POST['user-mobile'];
    $password = $_POST['user-password'];
    $gender =$_POST['user-gender'];
    $idNo =$_POST['user-id'];
    $id =$_POST['edit-user'];


    $sql = $conn->prepare("SELECT * FROM police WHERE idNo =:idNo AND pol_id<>:id");
    $sql->execute(['idNo'=>$idNo,'id'=>$id]);
    if($sql->rowCount() > 0){
        $_SESSION['error'] = 'Identity number already exits';
        header('location: '.$return);
        exit(0);
    }


    $sql = $conn->prepare("SELECT * FROM user WHERE idNo =:idNo AND user_id<>:id");
    $sql->execute(['idNo'=>$idNo,'id'=>$id]);
    if($sql->rowCount() > 0){
        $_SESSION['error'] = 'Identity number already exits';
        header('location: '.$return);
        exit(0);
    }

    $sql = $conn->prepare("SELECT * FROM police WHERE mobile =:mobile AND pol_id<>:id");
    $sql->execute(['mobile'=>$mobile,'id'=>$id]);
    if($sql->rowCount() > 0){
        $_SESSION['error'] = 'Mobile already exits';
        header('location: '.$return);
        exit(0);
    }


    $sql = $conn->prepare("SELECT * FROM user WHERE mobile =:mobile AND user_id<>:id");
    $sql->execute(['mobile'=>$mobile,'id'=>$id]);
    if($sql->rowCount() > 0){
        $_SESSION['error'] = 'Mobile already exits';
        header('location: '.$return);
        exit(0);
    }

    try {

        $query = $conn->prepare("UPDATE user SET first_name=:first_name,last_name=:last_name,gender=:gender,idNo=:idNo,mobile=:mobile, password=:password 
                                          WHERE user_id=:id");
        $query->execute(['first_name' => $fname,'last_name' => $lname, 'gender' => $gender,'idNo' => $idNo, 'password' => $password,'mobile'=>$mobile,'id'=>$id]);

        $_SESSION['success'] = 'User successfully updated';

    } catch (PDOException $e) {
        $_SESSION['error'] = $e->getMessage();
    }
    header('location: '.$return);
}

if(isset($_POST['edit-fugitive'])){

    $fname = $_POST['fugitive-first-name'];
    $lname = $_POST['fugitive-last-name'];
    $gender =$_POST['fugitive-gender'];
    $id =$_POST['edit-fugitive'];
    $about =$_POST['fugitive-about'];


    try {

        if($_FILES['fugitive-image']['name'] !=='') {
            $fileName = $_FILES['fugitive-image']['name'];

            if(!empty($_FILES['fugitive-image']))
            {
                $query = $conn->prepare("UPDATE fugitive SET first_name=:first_name,last_name=:last_name,gender=:gender,image=:image,about=:about WHERE fugitive_id=:id");
                $query->execute(['first_name' => $fname,'last_name' => $lname, 'gender' => $gender,'id'=>$id,'image'=>$fileName,'about'=>$about]);

                $path = "criminals/";
                $path = $path . basename( $_FILES['fugitive-image']['name']);

                if(move_uploaded_file($_FILES['fugitive-image']['tmp_name'], $path)) {
                    echo "The file ".  basename( $_FILES['fugitive-image']['name']).
                        " has been uploaded";
                } else{
                    echo "There was an error uploading the file, please try again!";
                }
            }


        }else{
            $query = $conn->prepare("UPDATE fugitive SET first_name=:first_name,last_name=:last_name,gender=:gender,about=:about WHERE fugitive_id=:id");
            $query->execute(['first_name' => $fname,'last_name' => $lname, 'gender' => $gender,'id'=>$id,'about'=>$about]);

        }


        $_SESSION['success'] = 'Fugitive successfully updated';

    } catch (PDOException $e) {
        $_SESSION['error'] = $e->getMessage();
    }
    header('location: '.$return);
}

if(isset($_POST['add-fugitive'])){

    $fname = $_POST['fugitive-first-name'];
    $lname = $_POST['fugitive-last-name'];
    $gender =$_POST['fugitive-gender'];
    $about =$_POST['fugitive-about'];

    if(!empty($_FILES['fugitive-image'])) {
        $currentDirectory = getcwd();
        $uploadDirectory = "./";
        $fileName = $_FILES['fugitive-image']['name'];
        $fileTmpName = $_FILES['fugitive-image']['tmp_name'];
        $fileExtensionsAllowed = ['jpeg', 'jpg', 'png'];
        $fileExtension = strtolower(end(explode('.', $fileName)));
        if (!in_array($fileExtension, $fileExtensionsAllowed)) {
            $_SESSION['error'] = "This file extens-ion is not allowed. Please upload a JPEG or PNG file";
            header('Location: '.$return);
            exit(0);
        }
    }



    try {


        if(isset($_FILES['fugitive-image']['name'])) {

            $query = $conn->prepare("INSERT INTO fugitive(first_name,last_name,gender,image,about,pol_id) 
                                              VALUES(:first_name,:last_name,:gender,:image,:about,:pol_id)");
            $query->execute(['first_name' => $fname,'last_name' => $lname, 'gender' => $gender,'image'=>$fileName,'about'=>$about,'pol_id'=>$_SESSION['id']]);


            if(!empty($_FILES['fugitive-image']))
            {
                $path = "criminals/";
                $path = $path . basename( $_FILES['fugitive-image']['name']);

                if(move_uploaded_file($_FILES['fugitive-image']['tmp_name'], $path)) {
                    echo "The file ".  basename( $_FILES['fugitive-image']['name']).
                        " has been uploaded";
                } else{
                    echo "There was an error uploading the file, please try again!";
                }
            }
        }else{
            $query = $conn->prepare("INSERT INTO fugitive(first_name,last_name,gender,about,pol_id) 
                                              VALUES(:first_name,:last_name,:gender,:about,:pol_id)");
            $query->execute(['first_name' => $fname,'last_name' => $lname, 'gender' => $gender,'about'=>$about,'pol_id'=>$_SESSION['id']]);

        }

        $_SESSION['success'] = 'Fugitive successfully added';

    } catch (PDOException $e) {
        $_SESSION['error'] = $e->getMessage();
    }
    header('location: '.$return);
}


if (isset($_POST['reportType'])) {
    $_SESSION['type']= $_POST['reportType'];
    header('location:'.$_SERVER['HTTP_REFERER']);
}

if (isset($_POST['alertType'])) {
    if($_POST['alertType']=='all'){
        unset($_SESSION['alertType']);
    }else{
        $_SESSION['alertType']= $_POST['alertType'];

    }


    header('location:'.$_SERVER['HTTP_REFERER']);
}

if (isset($_POST['fugType'])) {
    if($_POST['fugType']=='all'){
        unset($_SESSION['fugType']);
    }else{
        $_SESSION['fugType']= $_POST['fugType'];

    }
    header('location:'.$_SERVER['HTTP_REFERER']);
}

if (isset($_POST['genderType'])) {
    if($_POST['genderType']=='all'){
        unset($_SESSION['genderType']);
    }else{
        $_SESSION['genderType']= $_POST['genderType'];

    }
    header('location:'.$_SERVER['HTTP_REFERER']);
}

if (isset($_POST['venueType'])) {
    if($_POST['venueType']=='all'){
        unset($_SESSION['venueType']);
        unset($_SESSION['venue']);

    }else{
        $_SESSION['venueType']= $_POST['venueType'];
        $conn = $connect->open();
        $sql = $conn->prepare("SELECT * FROM venue WHERE venue_id=:id");
        $sql->execute(['id'=>$_POST['venueType']]);
        $datas = $sql->fetch();
        $_SESSION['venue']= 'Building '.ucfirst($datas["building_no"]).'(room no: '.$datas["room_no"].')';

    }

    header('location:'.$_SERVER['HTTP_REFERER']);
}

$con->close();
?>
