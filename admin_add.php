<!Doctype HTML>
 <?php
 include("includes/db.inc.php");

 ?>   
<html>
<head>
	<title></title>
    
	<link rel="stylesheet" type="text/css" href="css/style.css?<?php echo time(); ?>" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
</head>


<body>

        <!---- POPUP MESSAGE ---->
	<?php
    session_start();
    if(isset($_SESSION['uploaded'])) { ?>

          <p class="success"></p>
       <div class="success hide">
         <i class="fa fa-check-circle" aria-hidden="true"></i>
         <span class="msg"><?php echo $_SESSION['uploaded'];?></span>
         <div class="close-btn">
           <i class="fa fa-times" aria-hidden="true"></i>
         </div>
         </div>
         <script>
             $('.success').show(function(){
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
    if(isset($_SESSION['exist'])) { ?>

          <p class="failed"></p>
       <div class="failed hide">
         <i class="fa fa-times-circle" aria-hidden="true"></i>
         <span class="msg"><?php echo $_SESSION['exist'];?></span>
         <div id="close-btn">
           <i class="fa fa-times" aria-hidden="true"></i>
         </div>
         </div>
         <script>
             $('.failed').show(function(){
           $('.failed').addClass("show");
           $('.failed').removeClass("hide");
           $('.failed').addClass("showAlert");
           setTimeout(function(){
             $('.failed').removeClass("show");
             $('.failed').addClass("hide");
           },5000);
         });
         $('.close-btn').click(function(){
           $('.failed').removeClass("show");
           $('.failed').addClass("hide");
         });
         </script>

    <?php } ?>
    <?php
    if(isset($_SESSION['insert'])) { ?>

          <p class="failed"></p>
       <div class="failed hide">
        <i class="fa fa-times-circle" aria-hidden="true"></i>
         <span class="msg"><?php echo $_SESSION['insert'];?></span>
         <div id="close-btn">
           <i class="fa fa-times" aria-hidden="true"></i>
         </div>
         </div>
         <script>
             $('.failed').show(function(){
           $('.failed').addClass("show");
           $('.failed').removeClass("hide");
           $('.failed').addClass("showAlert");
           setTimeout(function(){
             $('.failed').removeClass("show");
             $('.failed').addClass("hide");
           },5000);
         });
         $('.close-btn').click(function(){
           $('.failed').removeClass("show");
           $('.failed').addClass("hide");
         });
         </script>

    <?php } ?>
     <?php
    if(isset($_SESSION['filetype'])) { ?>

          <p class="failed"></p>
       <div class="failed hide">
         <i class="fa fa-times-circle" aria-hidden="true"></i>
         <span class="msg"><?php echo $_SESSION['filetype'];?></span>
         <div id="close-btn">
           <i class="fa fa-times" aria-hidden="true"></i>
         </div>
         </div>
         <script>
             $('.failed').show(function(){
           $('.failed').addClass("show");
           $('.failed').removeClass("hide");
           $('.failed').addClass("showAlert");
           setTimeout(function(){
             $('.failed').removeClass("show");
             $('.failed').addClass("hide");
           },5000);
         });
         $('.close-btn').click(function(){
           $('.failed').removeClass("show");
           $('.failed').addClass("hide");
         });
         </script>

    <?php } ?>
    <?php 
    unset($_SESSION['uploaded']);
    unset($_SESSION['exist']);
     unset($_SESSION['insert']);
      unset($_SESSION['filetype']);
    ?>
	<div id="mySidenav" class="sidenav">
	<p class="logo"><span>N</span>BA</p>
  <a href="#" id="prod-btn" class="icon-a"><i class="fa fa-dashboard icons"></i> &nbsp;&nbsp;Add Product <span class="fa fa-caret-down first"></span></a>
        <ul class="prod-show">
            <li><a href="admin_dashboard.php">Dashboard</a></li>
            <li><a href=admin_inventory.php>Inventory</a></li>
        </ul>
  <a href="admin_transaction.php" id="trans-btn" class="icon-a"><i class="fa fa-shopping-bag icons"></i> &nbsp;&nbsp;Transactions<span class="fa fa-caret-down second"></span></a>
        <ul class="trans-show">
             <li><a href="admin_pending.php">Pending</a></li>
            <li><a href="admin_shipping.php">Shipping</a></li>
            <li><a href="admin_delivered.php">Delivered</a></li>
            <li><a href="admin_paid.php">Paid</a></li>
        </ul>
  <a href="admin_category.php"  id="cat-btn" class="icon-a"><i class="fa fa-list icons"></i> &nbsp;&nbsp;Category<span class="fa fa-caret-down third"></span></a>
        <ul class="cat-show">
            <li><a href="admin_category_nba.php">NBA Teams</a></li>
            <li><a href="admin_category_limited.php">Limited Editions</a></li>
            <li><a href="admin_category_others.php">Others</a></li>
        </ul>
  <a href="account.php" class="icon-a"><i class="fa fa-user icons"></i> &nbsp;&nbsp;Accounts</a>
  <a href="trash.php" class="icon-a"><i class="fa fa-list-alt icons"></i> &nbsp;&nbsp;Trash</a>

</div>
<div id="main">

	<div class="head">
		<div class="col-div-6">
<span style="font-size:25px;cursor:pointer; color: white;" class="nav"  >&#9776; Add Product</span>
<span style="font-size:25px;cursor:pointer; color: white;" class="nav2"  >&#9776; Add Product</span>
</div>
	
	<div class="col-div-6">
	<div class="profile">

		<img src="image/admin.png" class="pro-img" />
		<p>Admin <span>NBA Trading Card</span></p>
	</div>
</div>
	<div class="clearfix"></div>
</div>
    
    
<div class="prod-container">
    <div class="product-container">
    <p>Add New Product</p>
    <div class="prod-content">
        <div class="left">
        <form action="includes/add_product.inc.php" method="post" enctype="multipart/form-data">
             <select class="select2" name="category" required>
                    <option value="" disabled selected>Category</option>
                    <?php 

                    $sql = "SELECT * FROM tblcategory ORDER BY cat_id DESC";
                    $data = mysqli_query($conn, $sql);

                    while($count=mysqli_fetch_assoc($data)){
                        $cat_name = $count['cat_name'];

                    ?>
                    <option name="category"><?php echo $cat_name;?></option> 

                <?php } ?>
                    </select>

          <a href="admin_category.php" >ADD</a>
        <input type="text" name="item_name" placeholder="Item Name" required>
        <input type="text" name="item_price" onkeypress="inputnumber(event)" placeholder="Item Price" required>
        <textarea type="text" placeholder="Item Info" name="item_info" required></textarea>
            <input type="file" name="image" value="Select Image">
            <input type="submit" name="add" value="Confirm">
             <input type="submit" name="clear" value="Clear">
        </form>
    </div>
        </div>
    <div class="prod-image">
        <div class="right">
    <img src="image/nba_image.png">
        
    </div>
    </div>
        </div>
    </div>
    </div>
    
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
    
    /* NUMBER ONLY */
    function inputnumber(evt){

            var char = String.fromCharCode(evt.which);

            if(!(/[0-9]/.test(char))){
                evt.preventDefault();

            }
        }

</script>
    </body>
</html>
