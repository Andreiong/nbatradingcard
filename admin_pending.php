<!Doctype HTML>
    <?php
    session_start();
    ?>
  
<html>
<head>
	<title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/category_nba.css?<?php echo time(); ?>" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
</head>


<body>
    <?php
    if(isset($_SESSION['cancel_success'])){ ?>
        <p class="popup"></p>
       <div class="success hide">
         <i class="fa fa-check-circle" aria-hidden="true"></i>
         <span class="msg"><?php echo $_SESSION['cancel_success'];?></span>
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
    if(isset($_SESSION['ship_success'])){ ?>
        <p class="popup"></p>
       <div class="success hide">
         <i class="fa fa-check-circle" aria-hidden="true"></i>
         <span class="msg"><?php echo $_SESSION['ship_success'];?></span>
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

    unset($_SESSION['ship_success']);
    unset($_SESSION['cancel_success']);
    ?>

<!-- DELIVER MODAL -->
<div class="modal fade" id="delivermodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Deliver Product</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
<form action="includes/update_category.inc.php" method="post">
    <div class="modal-body">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Deliver this product?</label>
     <input type="hidden"  name="order_id" id="order_id">
  </div>
<div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="submit" name="update_status" class="btn btn-primary">Deliver</button>
         </div>
     </div>
</form> 
    </div>
  </div>
</div>


    <!-- REMOVE Modal -->
<div class="modal fade" id="cancelmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cancel Order</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

        <form action="includes/update_category.inc.php" method="post">
        <div class="modal-body">
            <input type="hidden" name="pending_id" id="pending_id">
            <input type="hidden" name="transacid" id="transacid">
             <p>Reason...</p>
             <input type="text" class="form-control" placeholder="Type here" name="reason" aria-label="Username" aria-describedby="addon-wrapping" required>
            </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="submit" name="cancel_order" class="btn btn-primary">Continue</button>
         </div>
    </form>
     
    </div>
  </div>
</div>
    
	<div id="mySidenav" class="sidenav">
	<p class="logo"><span>N</span>BA</p>
  <a href="admin_dashboard.php" id="prod-btn" class="icon-a"><i class="fa fa-dashboard icons"></i> &nbsp;&nbsp;Dashboard <span class="fa fa-caret-down first"></span></a>
        <ul class="prod-show">
            <li><a href="admin_inventory.php">Inventory</a></li>
            <li><a href="admin_add.php">Add Product</a></li>
        </ul>
  <a href="#" id="trans-btn" class="icon-a"><i class="fa fa-shopping-bag icons"></i> &nbsp;&nbsp;Pending<span class="fa fa-caret-down second"></span></a>
        <ul class="trans-show">
            <li><a href="admin_transaction.php">Transactions</a></li>
            <li><a href="admin_shipping.php">Shipping</a></li>
            <li><a href="admin_delivered.php">Delivered</a></li>
            <li><a href="admin_paid.php">Paid</a></li>
        </ul>
  <a href="admin_category.php" id="cat-btn" class="icon-a"><i class="fa fa-list icons"></i> &nbsp;&nbsp;Category<span class="fa fa-caret-down third"></span></a>
        <ul class="cat-show">
            <li><a href="admin_category_limited.php">Limited Edition</a></li>
            <li><a href="admin_category_nba.php">NBA Team</a></li>
            <li><a href="admin_category_others.php">Others</a></li>
        </ul>
  <a href="account.php"class="icon-a"><i class="fa fa-user icons"></i> &nbsp;&nbsp;Accounts</a>
  <a href="trash.php"class="icon-a"><i class="fa fa-list-alt icons"></i> &nbsp;&nbsp;Trash</a>

</div>
<div id="main">

	<div class="head">
		<div class="col-div-6">
<span style="font-size:25px;cursor:pointer; color: white;" class="nav"  >&#9776; Pending Orders</span>
<span style="font-size:25px;cursor:pointer; color: white;" class="nav2"  >&#9776; Pending Orders</span>
</div>
	
	<div class="col-div-6">
	<div class="profile">

		<img src="image/admin.png" class="pro-img" />
		<p>Admin <span>NBA Trading Card</span></p>
	</div>
</div>
	<div class="clearfix"></div>
</div>
    <div class="top2">
    </div>
    <div class="table">
<table>
    <thead>
       <tr>
        <th>ID</th>
        <th>Transaction ID</th>
        <th>First Name</th>   
        <th>Last Name</th>  
         <th>Total</th>  
           <th>Address</th>  
         <th>Status</th>  
         <th>Cancel Order</th>  
         <th>Deliver</th>  

        </tr>
    </thead>
     <tbody>

          <?php
 include("includes/db.inc.php");
        
    $sql = "SELECT * FROM tblorders WHERE status = 'Pending' ORDER by order_id DESC";
    $product = mysqli_query($conn, $sql);
    $i = 0;

    while ($row_product=mysqli_fetch_array($product)) {
        $order_id = $row_product['order_id'];
        $transacID = $row_product['transacID'];
        $First_name = $row_product['First_name'];
        $Last_name = $row_product['Last_name'];
        $total = $row_product['total'];
         $address = $row_product['address'];
        $status = $row_product['status'];
        $i++;
    
 ?>  
     <tr id="limited">
         <td><?php echo $order_id?></td>
         <td><?php echo $transacID?></td>
         <td><?php echo $First_name?></td>
         <td><?php echo $Last_name?></td>
         <td><?php echo $total;?></td>
         <td><?php echo $address;?></td>
          <td><?php echo $status;?></td>
         <td><button type="button" id="remove" class="btn btn-danger cancelbtn">Cancel</button></td>
         <td><button type="button" id="edit" class="btn btn-danger deliverbtn">Deliver</button></td>
         </tr>
     <?php }?>
    </tbody>
    </table>    
    </div>

    </div>
    

      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


<script>
    
$(document).ready(function(){
   $('.cancelbtn').on('click', function(){

       $('#cancelmodal').modal('show');
       $tr = $(this).closest('tr');
       
       var data = $tr.children("td").map(function(){
           return $(this).text();
       }).get();
       console.log(data);
       $('#pending_id').val(data[0]);
       $('#transacid').val(data[1]);
   }); 
});

/* DELIVER MODAL */
$(document).ready(function(){
   $('.deliverbtn').on('click', function(){

       $('#delivermodal').modal('show');
       $tr = $(this).closest('tr');
       
       var data = $tr.children("td").map(function(){
           return $(this).text();
       }).get();
       console.log(data);
       $('#order_id').val(data[0]);
   }); 
});
</script>

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
    </body>
</html>
