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


<!-- EDIT MODAL -->
<div class="modal fade" id="delivermodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Remove Category</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
<form action="includes/update_category.inc.php" method="post">
    <div class="modal-body">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Category Name</label>
     <input type="hidden"  name="cat_id" id="cat_id" >
    <input type="text" class="form-control" name="cat_name" id="cat_name" aria-describedby="emailHelp" required>
  </div>
<div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="submit" name="update_limited_category" class="btn btn-primary">Update</button>
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
        <h5 class="modal-title" id="exampleModalLabel">Remove Category</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

        <form action="includes/edit_product.inc.php" method="post">
        <div class="modal-body">
            <input type="hidden" name="delete_id" id="delete_id">
            <p>Do you want to delete this category?</p>
            </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="submit" name="remove_limited_category" class="btn btn-primary">Remove</button>
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
  <a href="#" id="trans-btn" class="icon-a"><i class="fa fa-shopping-bag icons"></i> &nbsp;&nbsp;Transactions<span class="fa fa-caret-down second"></span></a>
        <ul class="trans-show">
            <li><a href="admin_pending.php">Pending</a></li>
            <li><a href="admin_shipping.php">Shipping</a></li>
            <li><a href="admin_delivered.php">Delivered</a></li>
            <li><a href="admin_paid.php">Paid</a></li>
        </ul>
  <a href="admin_category.php" id="cat-btn" class="icon-a"><i class="fa fa-list icons"></i> &nbsp;&nbsp;Category<span class="fa fa-caret-down third"></span></a>
        <ul class="cat-show">
            <li><a href="admin_category_nba.php">NBA Team</a></li>
            <li><a href="admin_category_limited.php">Limited Edition</a></li>
            <li><a href="admin_category_others.php">Others</a></li>
        </ul>
  <a href="account.php"class="icon-a"><i class="fa fa-user icons"></i> &nbsp;&nbsp;Accounts</a>
  <a href="trash.php"class="icon-a"><i class="fa fa-list-alt icons"></i> &nbsp;&nbsp;Trash</a>

</div>
<div id="main">

	<div class="head">
		<div class="col-div-6">
<span style="font-size:25px;cursor:pointer; color: white;" class="nav"  >&#9776; Transaction</span>
<span style="font-size:25px;cursor:pointer; color: white;" class="nav2"  >&#9776; Transaction</span>
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
    <a href="admin_pending.php">Pending Order</a>
    </div>
    <div class="table">
<table>
    <thead>
       <tr>
        <th>ID</th>
        <th>Transaction ID</th>
        <th>Item</th>   
        <th>Quantity</th>   
        <th>First Name</th>  
        <th>Last Name</th>  
         <th>Date</th>  
        </tr>
    </thead>
     <tbody>

          <?php
 include("includes/db.inc.php");
        
    $sql = "SELECT * FROM tbltransaction ORDER by transaction_id DESC";
    $product = mysqli_query($conn, $sql);
    $i = 0;

    while ($row_product=mysqli_fetch_array($product)) {
         $ID = $row_product['ID'];
          $transacID = $row_product['transacID'];
         $Item = $row_product['Item'];
        $Quantity = $row_product['Quantity'];
        $First_name = $row_product['First_name'];
        $Last_name = $row_product['Last_name'];
        $date = $row_product['date_time'];
        $i++;
    
 ?>  
     <tr id="limited">
        <td><?php echo $ID?></td>
        <td><?php echo $transacID?></td>
        <td><?php echo $Item?></td>
         <td><?php echo $Quantity?></td>
         <td><?php echo $First_name;?></td>
         <td><?php echo $Last_name;?></td>
          <td><?php echo $date;?></td>
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
   $('.deletebtn').on('click', function(){

       $('#deletemodal').modal('show');
       $tr = $(this).closest('tr');
       
       var data = $tr.children("td").map(function(){
           return $(this).text();
       }).get();
       console.log(data);
       $('#delete_id').val(data[0]);
   }); 
});

/* CANCEL MODAL */
$(document).ready(function(){
   $('.editbtn').on('click', function(){

       $('#editmodal').modal('show');
       $tr = $(this).closest('tr');
       
       var data = $tr.children("td").map(function(){
           return $(this).text();
       }).get();
       console.log(data);
       $('#cat_id').val(data[0]);
       $('#cat_name').val(data[1]);
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
