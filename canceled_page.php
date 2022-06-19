<?php
include("home_header.php");
include("includes/db.inc.php");
?>
<link rel="stylesheet" type="text/css" href="css/account.css?<?php echo time(); ?>" />
<div class="main-container">
<div class="left">
<div class="container-left">
    <div class="info">
    <img src="image/admin.png">
    <?php
      $ID = $_SESSION['ID'];
    $sql = "SELECT * FROM user_account WHERE ID = '$ID'";
     $res = mysqli_query($conn, $sql);
     while($row_orders = mysqli_fetch_array($res)){
        $Fname = $row_orders['First_name'];
        $Lname = $row_orders['Last_name']
    ?>
       
    <?php } ?>
     <p><?php echo $Fname. " " .$Lname; ?></p>
    </div>
    <ul>
        <li><a href="account_page.php"><i class="fa fa-shopping-bag icons"></i>My Purchase</a></li>
          <li><a href="confirm_page.php"><i class="fa fa-list icons"></i>Order Confirmation</a></li>
          <li><a href="received_page.php"><i class="fa fa-list icons"></i>Recieved Order</a></li>
    <li><a href="canceled_page.php?canceled_order"><i class="fa fa-list-alt icons"></i>Canceled Order</a></li>
       
    </ul>
    </div>
    
</div>
    <div class="right">
    <div class="container-right">
       <p>My Purchase</p>
        </div>

        <?php
        $ID = $_SESSION['ID'];
        $sql = "SELECT * FROM tblorders  WHERE ID = '$ID' AND status = 'Canceled'";
        $res = mysqli_query($conn, $sql);

        while($row_orders = mysqli_fetch_array($res)){
            $Item = $row_orders['Item'];
            $Quantity = $row_orders['Quantity'];
            $total = $row_orders['total'];
            $status = $row_orders['status'];
            $Fname = $row_orders['First_name'];
            $reason = $row_orders['reason'];
            $path = "image/Product/";
            $Image = $row_orders['Image'];
         
        
        ?>
        <!--- START --->
        <div class="order_container">
        <img src="<?php echo $path.$Image; ?>">
            <ul>
            <li><?php echo $Item; ?></li>
            <li><h3><?php echo $Quantity; ?>x</h3></li>
            </ul>    
        </div>
      <div class="buttons">
        <a href="store.php">Go to store</a>
        <?php
        if($row_orders['status'] === 'Canceled'){
        ?>
         <input type="submit" name="cancel" value="<?php echo $reason; ?>" disabled>
     <?php }
     else{

        }?>
        <input type="submit" value="<?php echo $status; ?>..." disabled>
          <p class="text">Order Total <?php echo $total; ?></p>
        </div>
        <!--- END --->
    <?php } ?>
    </div>
    </div>
    <div class="clear"></div>
    <div class="margin"></div>
      <?php include_once'home_footer.php' ?>