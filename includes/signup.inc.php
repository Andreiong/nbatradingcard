<?php

require_once 'db.inc.php';
$passworderror = array();
$emailerror = array();
$error = array();
   session_start();


    /* CHECK IF SUBMIT CLICKED */
/* REGISTER */

if (isset($_POST['submit'])) {
   

    $fname      = mysqli_real_escape_string($conn, $_POST['fname']);
    $lname      = mysqli_real_escape_string($conn, $_POST['lname']);
    $mnumber    = mysqli_real_escape_string($conn,$_POST['mnumber']);
    $email      = mysqli_real_escape_string($conn,$_POST['email']);
    $password_1 = mysqli_real_escape_string($conn,$_POST['password_1']);
    $password_2 = mysqli_real_escape_string($conn,$_POST['password_2']);
    $address = $_POST['address'];
    $count = strlen($password_1);


    $check_email = "SELECT * FROM user_account WHERE email = '$email'";
    $result = mysqli_query ($conn,$check_email);



    if(mysqli_num_rows($result) > 0){
        $emailerror['email']= " x email already exist!";
    }

    if($password_1 != $password_2){
      $passworderror['password_1'] = " x password does not match";

    }
    if($count < 8){
        $_SESSION['count'] = " x password must be 8 characters or more";
        return;
    }
    if(count($passworderror) === 0 && count($emailerror) === 0){
        $password = md5($password_1);
    

    /* INSERT DATE */
        
    $sql = "INSERT INTO user_account(First_name, Last_Name, Mobile_num, Email, Password, address) VALUES('".$fname."', '".$lname."', '".$mnumber."', '".$email."', '".$password."', '".$address."')";
    mysqli_query($conn, $sql);
    header('location: login.php');
    die;
}
}
/* LOG IN */

if(isset($_POST['login'])){
    

    $email_login    = mysqli_real_escape_string($conn, $_POST['email_login']);
    $password_login = mysqli_real_escape_string($conn, $_POST['password_login']);
   
    $password = md5($password_login);

    $sql= "SELECT * FROM user_account WHERE Email = '".$email_login."' AND Password = '".$password."' limit 1";
    $res = mysqli_query ($conn,$sql);

    if(mysqli_num_rows($res) == 1){
        $row = mysqli_fetch_assoc($res);
        if($row['Email'] === $email_login && $row['Password'] === $password)
        {
            session_start();
            $_SESSION['ID'] = $row['ID'];
            $_SESSION['First_name'] = $row['First_name'];
            $_SESSION['Last_name'] = $row['Last_name'];
            $_SESSION['address'] = $row['address'];
            
            /* TRANSACTION ID */
            mt_srand((double)microtime()*10000);
            $charid = md5(uniqid(rand(), true));
            $c = unpack("C*",$charid);
            $c = implode("",$c);

             $_SESSION['transacID'] = substr($c,0,20);

            header('location: index.php');
            exit();
        }
    }
     else{
        $error['email_login'] = "Wrong password or email";
    
}
   
  
}

?>

