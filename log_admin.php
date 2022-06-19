<?php
require_once'includes/admin_login.inc.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin</title>
     <link rel="stylesheet" type="text/css" href="css/admin.css?<?php echo time(); ?>" />
    </head>
    <body>
       
        <div class="nav-content">
            <img src="image/LOGO.png">
        </div>
         <div class="container">
        <div class="admin">
            <img src="image/admin.png">
            <p>ADMINISTRATOR </p>  
            <?php if(count($errors) >=1 ){ ?>
                <div class="error">
                    <p> 
                    <?php foreach ($errors as $showerror) {
                        echo $showerror; }?>
                 </p>
                </div>
            <?php }?>
        <form method="post" action="log_admin.php"> 
            <?php if(isset($_POST['email'])){
                echo '<input type ="email" name="email" placeholder="Email" value="'.$email.'">';
            } else{
                 echo '<input type ="email" name="email" placeholder="Email" required>';
            }?>
           
            <input type ="password" name="password" placeholder="Password" required>
            <input type ="submit" name="submit">
            </form>
        </div>
            </div>
    </body>
</html>