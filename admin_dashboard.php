<!Doctype HTML>
    <?php
 include("includes/db.inc.php");
    ?>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/style.css?<?php echo time(); ?>" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>


<body>
	
	<div id="mySidenav" class="sidenav">
	<p class="logo"><span>N</span>BA</p>
  <a href="#" id="prod-btn" class="icon-a"><i class="fa fa-dashboard icons"></i> &nbsp;&nbsp;Dashboard <span class="fa fa-caret-down first"></span> </a>
        <ul class="prod-show">
            <li><a href="admin_add.php">Add Product</a></li>
            <li><a href="admin_inventory.php">Inventory</a></li>
        </ul>
  <a href="admin_transaction.php" id="trans-btn" class="icon-a"><i class="fa fa-shopping-bag icons"></i> &nbsp;&nbsp;Transactions<span class="fa fa-caret-down second"></span></a>
        <ul class="trans-show">
            <li><a href="#">Pending</a></li>
             <li><a href="#">Orders</a></li>
             <li><a href="#">Delivered</a></li>
              <li><a href="#">Paid</a></li>
        </ul>
         <a href="admin_category.php" id="cat-btn" class="icon-a"><i class="fa fa-list icons"></i> &nbsp;&nbsp;Category<span class="fa fa-caret-down third"></span></a>
        <ul class="cat-show">
            <li><a href="#">NBA Teams</a></li>
            <li><a href="#">Limited Editions</a></li>
            <li><a href="#">Others</a></li>
        </ul>
  <a href="account.php"class="icon-a"><i class="fa fa-user icons"></i> &nbsp;&nbsp;Accounts</a>
  <a href="trash.php"class="icon-a"><i class="fa fa-list-alt icons"></i> &nbsp;&nbsp;Trash</a>

</div>
<div id="main">

	<div class="head">
		<div class="col-div-6">
<span style="font-size:25px;cursor:pointer; color: white;" class="nav"  >&#9776; Dashboard</span>
<span style="font-size:25px;cursor:pointer; color: white;" class="nav2"  >&#9776; Dashboard</span>
</div>
	
	<div class="col-div-6">
	<div class="profile">

		<img src="image/admin.png" class="pro-img" />
		<p>Admin <span>NBA Trading Card</span></p>
	</div>
</div>
	<div class="clearfix"></div>
</div>

	<div class="clearfix"></div>
	<br/>
	
	<div class="section">
        <div class="section-content1">
            <div class="content">
                <p>Total Profit</p>
                <?php
                $sql = "SELECT SUM(total) AS profit FROM tblorders WHERE status = 'Paid'";
                $res = mysqli_query($conn, $sql);
                while($count = mysqli_fetch_assoc($res)){
                    $profit = $count['profit'];

                ?>
            <h1><?php echo $profit;?></h1>
        <?php } ?>
                </div>
            <div class="bottom">
           <a href="admin_paid.php" ><p>View More</p></a>
            </div>         
        </div>  
        <div class="section-content2">
            <div class="content">
            <p>Users</p>

             <!---- COUNT USER ACCOUNT ---->
             
            <?php
            $sql = "SELECT COUNT(*) AS user FROM user_account";
            $result = mysqli_query($conn, $sql);
            while($data=mysqli_fetch_assoc($result)){

                $count = $data['user'];

            ?>    
            <h1><?php echo $count; ?></h1>
        <?php } ?>

                </div>
            <div class="bottom2">
           <a href="account.php" ><p>View More</p></a>
            </div>         
        </div>  
        <div class="section-content3">
            <div class="content">
            <p>Total Product</p>

            <!---- COUNT PRODUCT ---->

            <?php
            $sql = ("SELECT COUNT(*) as product from tblproduct");
            $result = mysqli_query($conn, $sql);
            while($data=mysqli_fetch_assoc($result)){

                $count = $data['product'];
            

            ?>
            <h1><?php echo $count;?></h1>
        <?php }?>

                </div>
            <div class="bottom3">
           <a href="admin_inventory.php"><p>View More</p></a>
            </div>         
        </div>  
        <div class="section-content4">
            <div class="content">
                <?php
                $sql = "SELECT COUNT(*) AS transaction from tbltransaction";
                $res = mysqli_query($conn, $sql);

                while($count_transac = mysqli_fetch_array($res)){
                      $count = $count_transac['transaction'];  
                }
                ?>
            <p>Transactions</p>
            <h1><?php echo $count;?></h1>
                </div>
            <div class="bottom4">
           <a href="admin_transaction.php" ><p>View More</p></a>
            </div>         
        </div>   
    </div>
    
		<div class="table2">
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

	<div class="clearfix"></div>
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
</script>
</body>
</html>
