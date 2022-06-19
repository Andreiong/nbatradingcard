<?php
include("includes/db.inc.php");
 include_once'home_header.php'; 
 ?>
  <link rel="stylesheet" type="text/css" href="css/cart.css?<?php echo time(); ?>" />
  <script src="https://code.jquery.com/jquery-3.4.1.js"></script>

  <?php
           if(isset($_SESSION['checkout'])){
           ?>    
          <p class="popup"></p>
       <div class="success hide">
         <i class="fa fa-check-circle" aria-hidden="true"></i>
         <span class="msg"><?php echo $_SESSION['checkout'];?></span>
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
           if(isset($_SESSION['remove_success'])){
           ?>    
          <p class="popup"></p>
       <div class="success hide">
         <i class="fa fa-check-circle" aria-hidden="true"></i>
         <span class="msg"><?php echo $_SESSION['remove_success'];?></span>
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
       unset($_SESSION['checkout']);
       unset($_SESSION['remove_success']);
       ?>

    <?php
    if(isset($_SESSION['ID'])){?>
    <div class="top_container">
    <div class="top_title">
        <p>NBA TRADING CART</p>
        <a href="account_page.php">My purchase</a>
        </div>
        </div>
    <div class="table">
    <table>
        <thead>
           <tr>
            <th class="item_name">Product</th>
               <th class="space"></th>
            <th  class="unit">Unit Price</th>
            <th>Quantity</th>   
            <th>Action</th>   
            </tr>
        </thead>
         <tbody>
        <?php
        $ID = $_SESSION['ID'];
            $sql = "SELECT * FROM tblcart WHERE ID = '$ID'";
            $res = mysqli_query($conn, $sql);

           while($row_cart = mysqli_fetch_array($res)){
            $cart_id = $row_cart['cart_id'];
            $Item = $row_cart['Item'];
            $Price = $row_cart['Price']; 
            $Quantity = $row_cart['Quantity']; 
            
            $path = "image/Product/";
            $Image = $row_cart['Image'];
            ?>

         
                 <tr id="others">
             <td>
                 <div class="image_container">
                 <img class="image" src="<?php echo $path.$Image; ?>">
                     <p><?php echo $Item;?></p>
             </div>
                 </td>   
             <td class="space"></td>
             <td><?php echo $Price; ?></td>
             <td>
                <form action="includes/update_category.inc.php" method="post">
                 <input type="hidden" name="cart_id" value="<?php echo $cart_id?>">   
                <input type="number" name="quantity" value="<?php echo $Quantity;?>">
                <button type="submit" name="update_quantity" class="update">Add</button>
            </td>
             <td><a id="remove" href="includes/update_category.inc.php?remove_cart=<?php echo $cart_id;?>">Remove</td>
               </form>
             </tr>

          <?php } ?>
         
        </tbody>

        </table>    
        </div>
        <div class="check_container">
    

        <?php
        $total_price = 0;
        $ID = $_SESSION['ID'];
        $qty = 0;

        $sql = "SELECT * FROM tblcart WHERE ID = '$ID'";
        $res = mysqli_query($conn, $sql);
        while($row_total = mysqli_fetch_array($res)){
            $Item = $row_total['Item'];
            $prod_id = $row_total['prod_id'];
            $Image = $row_total['Image'];
            $Quantity = $row_total['Quantity'];
            $qty = $Quantity + $qty;
            $Price = $row_total['Price'];
            $sum = $Quantity * $Price;
            $total_price = $sum + $total_price;

        ?>
         <form action="includes/checkout.inc.php" method="post">
        <input type="hidden" name="ID" value="<?php echo $_SESSION['ID']?>">
            <input type="hidden" name="fname" value="<?php echo $_SESSION['First_name']?>">
            <input type="hidden" name="lname" value="<?php echo $_SESSION['Last_name']?>">
            <input type="hidden" name="address" value="<?php echo $_SESSION['address']?>">
            <input type="hidden" name="transacid" value="<?php echo $_SESSION['transacID']?>">
            <input type="hidden" name="Item" value="<?php echo $Item;?>">
             <input type="hidden" name="prod_id" value="<?php echo $prod_id;?>">
            <input type="hidden" name="Image" value="<?php echo $Image;?>">
            <input type="hidden" name="Quantity" value="<?php echo $Quantity;?>">
             <input type="hidden" name="price" value="<?php echo $Price;?>">
             <input type="hidden" name="qty" value="<?php echo $qty;?>">
            <input type="hidden" name="total" value="<?php echo $total_price;?>">
    <?php   } ?>
             <div class="check_out">
         <p>Total : <?php echo sprintf('%.2f', $total_price); ?></p>    
             <button class="checkout" name="checkout_orders">Check Out</button>
                 </div>
        </form>
    
    </div>

<div class="clear"></div>
        <?php } 
        else{
            echo '<div class="image-container">
            <a href="login.php">
        <p><i class="fa fa-cart-plus" id="layer"aria-hidden="true"></i></p>
        <p class="layer" href="login.php">Shop Now</p>
            </a>
            </div>';   
        }?>
        
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
