<?php
include("home_header.php");
include("includes/db.inc.php");
?>

<link rel="stylesheet" type="text/css" href="css/account.css?<?php echo time(); ?>" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>

       <?php
           if(isset($_SESSION['cancel_order'])){
           ?>    
          <p class="popup"></p>
       <div class="success hide">
         <i class="fa fa-check-circle" aria-hidden="true"></i>
         <span class="msg"><?php echo $_SESSION['cancel_order'];?></span>
         <div class="close-btn">
             <i class="fa fa-times" aria-hidden="true"></i>
         </div>
         </div>
         <script>
             $('.popup').show(function(){
           $('.success').addClass("show");
           $('.success').removeClass("hide");
           $('.success').addClass("showAlert");
           setTimeout(function(){
             $('.success').removeClass("show");
             $('.success').addClass("hide");
           },5000);
         });
         $('.close-btn').click(function(){
           $('.success').removeClass("show");
           $('.success').addClass("hide");
         });
         </script>
       <?php } ?>
       <?php
           if(isset($_SESSION['purchase_complete'])){
           ?>    
          <p class="popup"></p>
       <div class="success hide">
         <i class="fa fa-check-circle" aria-hidden="true"></i>
         <span class="msg"><?php echo $_SESSION['purchase_complete'];?></span>
         <div class="close-btn">
             <i class="fa fa-times" aria-hidden="true"></i>
         </div>
         </div>
         <script>
             $('.popup').show(function(){
           $('.success').addClass("show");
           $('.success').removeClass("hide");
           $('.success').addClass("showAlert");
           setTimeout(function(){
             $('.success').removeClass("show");
             $('.success').addClass("hide");
           },5000);
         });
         $('.close-btn').click(function(){
           $('.success').removeClass("show");
           $('.success').addClass("hide");
         });
         </script>
       <?php } ?>
       <?php 
       unset($_SESSION['cancel_order']);
       unset($_SESSION['purchase_complete']);
       ?>


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
        $sql = "SELECT * FROM tblorders WHERE ID = '$ID' ORDER BY order_id DESC";
        $res = mysqli_query($conn, $sql);

        while($row_orders = mysqli_fetch_array($res)){
            $order_id = $row_orders['order_id'];
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
     
        <?php
        if($row_orders['status'] === 'Canceled'){
        ?>
           <a href="store.php">Go to store</a>
         <input type="submit" name="failed" value="<?php echo $reason; ?>" disabled>
          <input type="submit" value="<?php echo $status; ?>..." disabled>
     <?php }?>
     <?php 
      if($row_orders['status'] === 'Pending'){
        ?>
           <a href="store.php">Go to store</a>
         <a href="includes/update_category.inc.php?cancel_order=<?php echo $order_id;?>" id="cancel">Cancel Order</a>
        <input type="submit" value="<?php echo $status; ?>..." disabled>
    <?php } ?>
     <?php 
      if($row_orders['status'] === 'Shipping'){
        ?>
           <a href="store.php">Go to store</a>
        <input type="submit" value="<?php echo $status; ?>..." disabled>
    <?php } ?>
     <?php 
      if($row_orders['status'] === 'Delivered'){
        ?>
        <form action ="includes/checkout.inc.php" method="post">
           <input type="hidden" name="order_id" value="<?php echo $order_id;?>"> 
            <input type="hidden" name="ID" value="<?php echo $ID;?>"> 
               <a href="store.php">Go to store</a>
        <input type="submit" name="delivered_status" value="Parcel has arrived please confirm the delivery">
    </form>
    <?php } ?>
     <?php 
      if($row_orders['status'] === 'Paid'){
        ?>
           <a href="store.php">Go to store</a>
        <input type="submit" name="paid" value="<?php echo $status; ?>" disabled>
    <?php } ?>
          <p class="text">Order Total <?php echo $total; ?></p>
        </div> 
                <!--- END --->
    <?php } ?>
    </div>
    </div>
    <div class="clear"></div>
    <div class="margin"></div>



<script>

  $(".nav").click(function(){
    $("#mySidenav").css('width','70px');
    $("#main").css('margin-left','70px');
    $(".logo").css('visibility', 'hidden');
    $(".logo span").css('visibility', 'visible');
     $(".logo span").css('margin-left', '-10px');
     $(".icon-a").css('visibility', 'hidden');
     $(".icons").css('visibility', 'visible');
     $(".icons").css('margin-left', '-8px');
      $(".nav").css('display','none');
      $(".nav2").css('display','block');

  });

$(".nav2").click(function(){
    $("#mySidenav").css('width','200px');
    $("#main").css('margin-left','200px');
    $(".logo").css('visibility', 'visible');
     $(".icon-a").css('visibility', 'visible');
     $(".icons").css('visibility', 'visible');
     $(".nav").css('display','block');
      $(".nav2").css('display','none');

 });
$('#prod-btn').click(function(){
   $('.sidenav .prod-show').toggleClass("show");             
   $('.sidenav .first').toggleClass("rotate");        
    
                    });
$('#trans-btn').click(function(){
   $('.sidenav .trans-show').toggleClass("show");             
   $('.sidenav .second').toggleClass("rotate");             
                    });    
    $('#cat-btn').click(function(){
   $('.sidenav .cat-show').toggleClass("show");             
   $('.sidenav .third').toggleClass("rotate");             
                    }); 
    
</script>

      <?php include_once'home_footer.php' ?>