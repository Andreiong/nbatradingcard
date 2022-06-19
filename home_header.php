<?php 
session_start();
include("includes/db.inc.php");
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="css/homepage.css?<?php echo time(); ?>" />
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">
        <title>NBA Trading Card</title>
    </head>

    <body>
     <!---- NAVBAR ---->
     <div class="dropdown-content">
            <div class="header">
                    <ul>
                        <?php
                        if(isset($_SESSION['ID'])){
                            $ID = $_SESSION['ID'];
                           $sql = "SELECT COUNT(*) AS notif FROM tblorders WHERE status = 'Delivered' AND ID ='$ID'";
                           $res = mysqli_query($conn, $sql);
                           ?>
                           <?php
                           while($count=mysqli_fetch_array($res)){
                            $notif = $count['notif'];
                           
                        ?>
                          <?php } ?>
                        <li><a href="received_page.php"><i class="fa fa-bell" aria-hidden="true"><span><?php echo $notif; ?></span></i>Notifications</a></li>
                <?php }
                else{
                     echo '<li><a href="received_page.php"><i class="fa fa-bell" aria-hidden="true"></i>Notifications</a></li>';
                } ?>
                        <li><a href="#"><i class="fa fa-question-circle" aria-hidden="true"></i>Help</a></li>
                        
            <?php
            if(isset($_SESSION['ID']) && isset($_SESSION['First_name'])){ ?> 
                <div class="dropdown-button">
             <li><a href="#"><?php echo $_SESSION['First_name'];?></a></li>
             <div class="dropdown">
                            <ul>

                                <li><a href="account_page.php">Account</a></li>
                                <li><a href='includes/logout.inc.php'>Logout</a></li>
                                
                            </ul>
                        </div>
                          </div>
         <?php }
         else {
            echo '<li><a href="login.php">Account</a></li>';
         }?>
                      
                    </ul>
            </div>

        <div class="container">
           <div class="navbar">
                <img class="logo" src="image/LOGO.png">
            <div class="search">
                <form>
                <input type="text" placeholder="Search">
                    
                </form>
            </div>
          <div class="cart">
            <a href="cart.php">
                <?php
                if(isset($_SESSION['ID'])){
                    $ID = $_SESSION['ID'];
                    $sql = "SELECT COUNT(*) AS cart from tblcart WHERE ID = '$ID'";
                    $res = mysqli_query($conn, $sql);
                    ?> 
                    <?php
                while($row_count = mysqli_fetch_array($res)){
                    $count = $row_count['cart'];
                    ?>
                <?php }?>
                 <span><?php echo $count;?></span>
                 <img src="image/cart.png">
                <?php }
                else{
                    echo '<img src="image/cart.png">';
                }?>      
           </a>
               </div>
           </div>
        </div>
         <div class="category">
            <ul>
             <li><a href="index.php">HOME</a></li>
            <li><a href="store.php?select_all">STORE</a></li>
             <li><a href="store.php?limited">LIMITED EDITION</a></li>
             <li><a href="store.php?rookie">ROOKIE EDITION</a></li>
             <li><a href="store.php?others">OTHER PRODUCTS</a></li>

             </ul>
     
        </div>
    </div>

        <!---- END OF NAVBAR ---->
        