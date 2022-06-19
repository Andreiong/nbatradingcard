<?php
require_once 'db.inc.php';

$errors = array();

if(isset($_POST['submit'])){
	
	$email    		 = mysqli_real_escape_string($conn, $_POST['email']);
    $password_admin  = mysqli_real_escape_string($conn, $_POST['password']);

    $password = md5($password_admin);

    //$sql = "INSERT INTO admin_account(admin_password, admin_email) VALUES('".$password."', '".$email."')";
   // mysqli_query($conn, $sql);

    $sql= "SELECT * FROM admin_account WHERE admin_email = '".$email."' AND admin_password = '".$password."' limit 1";
    $result = mysqli_query ($conn,$sql);

    if(mysqli_num_rows($result) == 1){
        $row = mysqli_fetch_assoc($result);
        if($row['admin_email'] === $email && $row['admin_password'] === $password)
        {
            session_start();
            $_SESSION['admin_id'] = $row['admin_id'];
            $_SESSION['admin_email'] = $row['admin_email'];
            header('location: admin_dashboard.php');
            exit();
        }
    }
    else{
        $errors['email_login'] = "Wrong password or email";
    }
}

?>