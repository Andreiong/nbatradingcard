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
 
    if(isset($_SESSION['trash_added'])){ ?>
        <p class="popup"></p>
       <div class="success hide">
         <i class="fa fa-check-circle" aria-hidden="true"></i>
         <span class="msg"><?php echo $_SESSION['trash_added'];?></span>
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

    if(isset($_SESSION['trash_removed'])){ ?>
        <p class="popup"></p>
       <div class="success hide">
         <i class="fa fa-check-circle" aria-hidden="true"></i>
         <span class="msg"><?php echo $_SESSION['trash_removed'];?></span>
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
    unset($_SESSION['trash_added']);
    unset($_SESSION['trash_removed']);
    ?>

<!-- RESTORE MODAL -->

<div class="modal fade" id="restoremodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Restore Product</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

        <form action="includes/add_product.inc.php" method="post">
        <div class="modal-body">
            <input type="hidden" name="restore_id" id="restore_id">
            <input type="hidden" name="restore_item" id="restore_item">
            <input type="hidden" name="restore_price" id="restore_price">
            <input type="text" name="restore_cat_id" id="restore_cat_id">
            <input type="hidden" name="restore_category" id="restore_category">
            <input type="hidden" name="restore_info" id="restore_info">
            <input type="hidden" name="restore_image" id="restore_image">
            <p>Restore this product?</p>
            </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="submit" name="restore_trash_product" class="btn btn-primary">Restore</button>
         </div>
    </form>
     
    </div>
  </div>
</div>


<!-- REMOVE MODAL -->

<div class="modal fade" id="deletemodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Remove Product</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

        <form action="includes/edit_product.inc.php" method="post">
        <div class="modal-body">
            <input type="hidden" name="delete_id" id="delete_id">
            <input type="text" name="delete_image" id="delete_image">
            <p>Do you want to delete this product?</p>
            </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="submit" name="remove_trash_product" class="btn btn-primary">Remove</button>
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
  <a href="admin_transaction.php" id="trans-btn" class="icon-a"><i class="fa fa-shopping-bag icons"></i> &nbsp;&nbsp;Transactions<span class="fa fa-caret-down second"></span></a>
        <ul class="trans-show">
            <li><a href="#">Pending</a></li>
        </ul>
  <a href="admin_category.php" id="cat-btn" class="icon-a"><i class="fa fa-list icons"></i> &nbsp;&nbsp;Category<span class="fa fa-caret-down third"></span></a>
        <ul class="cat-show">
            <li><a href="admin_category.php">Category</a></li>
            <li><a href="admin_category_limited.php">Limited Editions</a></li>
            <li><a href="admin_category_others.php">Others</a></li>
        </ul>
  <a href="account.php"class="icon-a"><i class="fa fa-user icons"></i> &nbsp;&nbsp;Accounts</a>
  <a href="#"class="icon-a"><i class="fa fa-list-alt icons"></i> &nbsp;&nbsp;Trash</a>

</div>
<div id="main">

	<div class="head">
		<div class="col-div-6">
<span style="font-size:25px;cursor:pointer; color: white;" class="nav"  >&#9776; Trash</span>
<span style="font-size:25px;cursor:pointer; color: white;" class="nav2"  >&#9776;Trash</span>
</div>
	
	<div class="col-div-6">
	<div class="profile">

		<img src="image/admin.png" class="pro-img" />
		<p>Admin <span>NBA Trading Card</span></p>
	</div>
</div>
	<div class="clearfix"></div>
</div>
    <div class="table"> 
    <table>
    <thead>
       <tr>
        <th>ID</th>
        <th>Product Name</th>
        <th>Price</th>
        <th>Category ID</th>
        <th>Category</th>
        <th>Info</th>
        <th>Image</th>
        <th>Edit</th>   
        <th>Remove</th>   
        </tr>
    </thead>
    <tbody>
          <?php
 include("includes/db.inc.php");
        
    $sql = "SELECT * FROM tbltrash ORDER by ID DESC";
    $product = mysqli_query($conn, $sql);
    $i = 0;
    while($row_product = mysqli_fetch_array($product)){
        $ID = $row_product['ID'];
        $Item = $row_product['Item'];
        $Price = $row_product['Price'];
         $cat_id = $row_product['cat_id'];
        $Category = $row_product['Category'];
        $Info = $row_product['Info'];
        $Image = $row_product['Image'];

    ?>
    
         
          <tr id="limited">
             <td><?php echo $ID?></td>
             <td><?php echo $Item?></td>
             <td><?php echo $Price?></td>
             <td><?php echo $cat_id;?></td>
             <td><?php echo $Category?></td>
             <td><?php echo $Info?></td>
             <td><?php echo $Image?></td>

        <td><button type="button" id="edit" class="btn btn-danger restorebtn">Restore</button></td>
        <td><button type="button" id="remove" class="btn btn-danger deletebtn">Remove</button></td>
         </tr>   
         
     <?php } ?>
     </tbody>
    </table>    
    </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


<script>
    
    /* REMOVE MODAL */
$(document).ready(function(){
   $('.deletebtn').on('click', function(){

       $('#deletemodal').modal('show');
       $tr = $(this).closest('tr');
       
       var data = $tr.children("td").map(function(){
           return $(this).text();
       }).get();
       console.log(data);
       $('#delete_id').val(data[0]);
       $('#delete_image').val(data[6]);
   }); 
});

/* RESTORE MODAL */
$(document).ready(function(){
   $('.restorebtn').on('click', function(){

       $('#restoremodal').modal('show');
       $tr = $(this).closest('tr');
       
       var data = $tr.children("td").map(function(){
           return $(this).text();
       }).get();
       console.log(data);
       $('#restore_id').val(data[0]);
       $('#restore_item').val(data[1]);
       $('#restore_price').val(data[2]);
       $('#restore_cat_id').val(data[3]);
       $('#restore_category').val(data[4]);
       $('#restore_info').val(data[5]);
        $('#restore_image').val(data[6]);
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
