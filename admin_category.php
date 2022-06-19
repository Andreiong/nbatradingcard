<!Doctype HTML>
<?php
 include("includes/db.inc.php");
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
	
    <!---- POPUP MESSAGE ---->

    <?php 
    if(isset($_SESSION['category_removed'])){ ?>

       <p class="popup"></p>
       <div class="success hide">
         <i class="fa fa-check-circle" aria-hidden="true"></i>
         <span class="msg"><?php echo $_SESSION['category_removed'];?></span>
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
    if(isset($_SESSION['success'])){ ?>

       <p class="popup"></p>
       <div class="success hide">
         <i class="fa fa-check-circle" aria-hidden="true"></i>
         <span class="msg"><?php echo $_SESSION['success'];?></span>
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
      if(isset($_SESSION['added'])){ ?>

       <p class="success"></p>
       <div class="success hide">
         <i class="fa fa-check-circle" aria-hidden="true"></i>
         <span class="msg"><?php echo $_SESSION['added'];?></span>
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
      if(isset($_SESSION['failed'])){ ?>

       <p class="failed"></p>
       <div class="failed hide">
          <i class="fa fa-times-circle" aria-hidden="true"></i>
         <span class="msg"><?php echo $_SESSION['failed'];?></span>
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
    unset($_SESSION['category_removed']);
    unset($_SESSION['success']);
     unset($_SESSION['added']);
      unset($_SESSION['failed']);
                ?>


     <!-- Modal -->
<div class="modal fade" id="removemodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Remove Category</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

        <form action="includes/edit_product.inc.php" method="post">
        <div class="modal-body">
            <input type="hidden" name="cat_name" id="cat_name">
            <input type="hidden" name="category_info" id="category_info">
            <p>Do you want to delete this Category?</p>
            </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="submit" name="category_remove" class="btn btn-primary">Remove</button>
         </div>
    </form>
     
    </div>
  </div>
</div>




	<div id="mySidenav" class="sidenav">
	<p class="logo"><span>N</span>BA</p>
  <a href="admin_dashboard.php" id="prod-btn" class="icon-a"><i class="fa fa-dashboard icons"></i> &nbsp;&nbsp;Dashboard <span class="fa fa-caret-down first"></span></a>
        <ul class="prod-show">
            <li><a href="admin_dashboard.php">Dashboard</a></li>
            <li><a href=admin_inventory.php>Inventory</a></li>
        </ul>
  <a href="admin_transaction.php" id="trans-btn" class="icon-a"><i class="fa fa-shopping-bag icons"></i> &nbsp;&nbsp;Transactions<span class="fa fa-caret-down second"></span></a>
        <ul class="trans-show">
            <li><a href="#">Pending</a></li>
        </ul>
  <a href="#" id="cat-btn" class="icon-a"><i class="fa fa-list icons"></i> &nbsp;&nbsp;Category<span class="fa fa-caret-down third"></span></a>
        <ul class="cat-show">
            <li><a href="admin_category_nba.php">NBA Teams</a></li>
            <li><a href="admin_category_limited.php">Limited Editions</a></li>
            <li><a href="admin_category_others.php">Others</a></li>
        </ul>
  <a href="account.php"class="icon-a"><i class="fa fa-user icons"></i> &nbsp;&nbsp;Accounts</a>
  <a href="trash.php"class="icon-a"><i class="fa fa-list-alt icons"></i> &nbsp;&nbsp;Trash</a>

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
    <div class="product-container1">
    <p>Add Category</p>
    <div class="prod-content1">
        <div class="left">

        <form action="includes/edit_product.inc.php" method="post" enctype="multipart/form-data">
         <input type="text" name="item_name" placeholder="Category Name" required>
                 <select class="select1" name="category" required>
                    <option  value="" disabled selected>Category</option>
                    <option value="nba">NBA Teams</option>
                    <option value="limited">Limited Edition</option>     
                    <option value="rookie">Rookie Card</option>    
                    <option value="others">Others</option>     
                    </select>
            <input type="submit" name="add" value="Confirm">
             <input type="submit" name="clear" value="Clear">
            
        </form>
    </div>
        </div>
    <div class="prod-image1">
       <div class="right_table">
           <div class="table1">
        <table>
           <thead>
               <tr>
            <th>Category name</th>
            <th>Category</th>
               <th>Remove</th>  
                </tr>
            </thead>
            <tbody>
                  <?php

 $sql = "SELECT * FROM tblcategory ORDER BY cat_id DESC";

 $category= mysqli_query($conn, $sql);

 while ($category_row = mysqli_fetch_array($category)) {
     $cat_id = $category_row['cat_id'];
     $cat_name = $category_row['cat_name'];
     $category_info = $category_row['category_info'];
   ?>
            <tr>
            <td><?php echo $cat_name;?></td>
            <td><?php echo $category_info;?></td>
            <td><button type="button" id="remove" class="btn btn-danger removebtn">Remove</button></td>
                </tr>
            <?php } ?>
            </tbody>
           
           </table>
               </div>
        </div>
    </div>
        </div>
    </div>
    </div>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<script>
    
$(document).ready(function(){
   $('.removebtn').on('click', function(){

       $('#removemodal').modal('show');
       $tr = $(this).closest('tr');
       
       var data = $tr.children("td").map(function(){
           return $(this).text();
       }).get();
       console.log(data);
       $('#cat_name').val(data[0]);
       $('#category_info').val(data[1]);
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

