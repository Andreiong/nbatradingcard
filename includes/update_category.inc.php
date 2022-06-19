<?php
include("db.inc.php");

if(isset($_POST['update_nba_category'])){
	$cat_id = $_POST['cat_id'];
	$cat_name = $_POST['cat_name'];

	$sql1 = "SELECT * FROM tblcategory WHERE cat_name = '$cat_name' AND category_info = 'nba' limit 1";
	$exist = mysqli_query($conn, $sql1);

	if(mysqli_num_rows($exist) == 1){
		$row = mysqli_fetch_assoc($exist);
        if($row['cat_name'] === $cat_name)
        {
        	session_start();
        	$_SESSION['exist_nba'] = "Category already exist";
        	echo "<script>window.open('../admin_category_nba.php','_self')</script>";
        	return;
		}
	}	
	else{
	$sql = "UPDATE tblcategory SET cat_name = '$cat_name' WHERE cat_id = '$cat_id'";
	$success = mysqli_query($conn, $sql);

	if($success) {
		session_start();
		$_SESSION['edit_nba'] = "Category has been updated";
		echo "<script>window.open('../admin_category_nba.php','_self')</script>";
	}
}
}

if(isset($_POST['update_limited_category'])){
	$cat_id = $_POST['cat_id'];
	$cat_name = $_POST['cat_name'];

	$sql1 = "SELECT * FROM tblcategory WHERE cat_name = '$cat_name' AND category_info = 'limited' limit 1";
	$exist = mysqli_query($conn, $sql1);

	if(mysqli_num_rows($exist) == 1){
		$row = mysqli_fetch_assoc($exist);
        if($row['cat_name'] === $cat_name)
        {
        	session_start();
        	$_SESSION['exist_limited'] = "Category already exist";
        	echo "<script>window.open('../admin_category_limited.php','_self')</script>";
        	return;
		}
	}	
	else{
	$sql = "UPDATE tblcategory SET cat_name = '$cat_name' WHERE cat_id = '$cat_id'";
	$success = mysqli_query($conn, $sql);

	if($success) {
		session_start();
		$_SESSION['edit_limited'] = "Category has been updated";
		echo "<script>window.open('../admin_category_limited.php','_self')</script>";
	}
}
}

	if(isset($_POST['update_others_category'])){
	$cat_id = $_POST['cat_id'];
	$cat_name = $_POST['cat_name'];

	$sql1 = "SELECT * FROM tblcategory WHERE cat_name = '$cat_name' AND category_info = 'others' limit 1";
	$exist = mysqli_query($conn, $sql1);

	if(mysqli_num_rows($exist) == 1){
		$row = mysqli_fetch_assoc($exist);
        if($row['cat_name'] === $cat_name)
        {
        	session_start();
        	$_SESSION['exist_others'] = "Category already exist";
        	echo "<script>window.open('../admin_category_others.php','_self')</script>";
        	return;
		}
	}	
	else{
	$sql = "UPDATE tblcategory SET cat_name = '$cat_name' WHERE cat_id = '$cat_id'";
	$success = mysqli_query($conn, $sql);

	if($success) {
		session_start();
		$_SESSION['edit_others'] = "Category has been updated";
		echo "<script>window.open('../admin_category_others.php','_self')</script>";
	}
}
}
	if(isset($_POST['update_inventory'])){
		$product_id = $_POST['product_id'];
         $product_item = $_POST['product_item'];
         $product_price = $_POST['product_price'];
         $product_category = $_POST['product_category'];
         $product_info = $_POST['product_info'];


         $sql = "UPDATE tblproduct SET Item = '$product_item', Price = '$product_price', Category = '$product_category', Info = '$product_info' WHERE ID = '$product_id'";
		 $success = mysqli_query($conn, $sql);


	if($success) {
		session_start();
		$_SESSION['update_inventory'] = "Product has been updated";
		echo "<script>window.open('../admin_inventory.php','_self')</script>";
	}
	}
	 
    if(isset($_POST['update_quantity'])){
        $cart_id = $_POST['cart_id'];
        $quantity = $_POST['quantity'];

         $sql = "UPDATE tblcart SET Quantity = '$quantity' WHERE cart_id = '$cart_id'";
         $success = mysqli_query($conn, $sql);  
        if($success){
           echo "<script>window.open('../cart.php','_self')</script>";
        }
    }
    if(isset($_POST['update_status'])){
    	$order_id = $_POST['order_id'];

    	$sql = "UPDATE tblorders SET status = 'Shipping' WHERE order_id = '$order_id'";
    	$res = mysqli_query($conn, $sql);

    	if($res){
    		session_start();
    		$_SESSION['ship_success'] = "Item has been shipped";
    		echo "<script>window.open('../admin_pending.php','_self')</script>";
    	}
    }
     if(isset($_POST['cancel_order'])){

    	$pending_id = $_POST['pending_id'];
    	$transacid = $_POST['transacid'];
    	$reason = $_POST['reason'];

    	$sql = "UPDATE tblorders SET status = 'Canceled', reason = '$reason' WHERE order_id = '$pending_id'";
    	$res = mysqli_query($conn, $sql);

    	if($res){
    		session_start();
    		$_SESSION['cancel_success'] = "Item has been cancelled";
    		echo "<script>window.open('../admin_pending.php','_self')</script>";
    	}
    }
     if(isset($_POST['cancel_shipping'])){

    	$pending_id = $_POST['pending_id'];
    	$transacid = $_POST['transacid'];
    	$reason = $_POST['reason'];

    	$sql = "UPDATE tblorders SET status = 'Canceled', reason = '$reason' WHERE order_id = '$pending_id'";
    	$res = mysqli_query($conn, $sql);

    	if($res){
    		session_start();
    		$_SESSION['cancel_success'] = "Item has been cancelled";
    		echo "<script>window.open('../admin_shipping.php','_self')</script>";
    	}
    }
    if(isset($_POST['delivered_status'])){
    	$order_id = $_POST['order_id'];
    	$status = "Delivered";

    	$sql ="UPDATE tblorders SET status = '$status' WHERE order_id = '$order_id'";
    	$res = mysqli_query($conn, $sql);

    	if($res){
    		session_start();
    		$_SESSION['delivery_success'] = "Item has been delivered";
    		echo "<script>window.open('../admin_shipping.php','_self')</script>";
    	}
    }
    if(isset($_GET['remove_cart'])){
    	$cart_id = $_GET['remove_cart'];
    	$sql = "DELETE FROM tblcart WHERE cart_id = '$cart_id'";
    	$res = mysqli_query($conn, $sql);

    	if($res){
    		session_start();
    		$_SESSION['remove_success'] = "Item has been removed";
    		echo "<script>window.open('../cart.php','_self')</script>";
    	}
    }
    if(isset($_GET['cancel_order'])){
    	$order_id = $_GET['cancel_order'];

    	$sql = "DELETE FROM tblorders WHERE order_id = '$order_id'";
    	$res = mysqli_query($conn, $sql);

    	if($res){
    		session_start();
    		$_SESSION['cancel_order'] = "Order has been canceled";
    		echo "<script>window.open('../account_page.php','_self')</script>";
    	}
    }
?>