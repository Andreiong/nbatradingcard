<?php
include("db.inc.php");

if(isset($_POST['checkout_orders'])){
	$overall = 0;
	$id = $_POST['ID'];
	$Item = $_POST['Item'];
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$transacid = $_POST['transacid'];
	$Image = $_POST['Image'];
	$status = "Pending";
	$Quantity = $_POST['Quantity'];
	$prod_id = $_POST['prod_id'];
	$total_quantity = $_POST['qty'];
	$Price = $_POST['price'];
	$address = $_POST['address'];


/*	$sql4 = "SELECT * FROM tblorders WHERE prod_id = '$prod_id' AND ID = '$id' AND status = '$status'";	
	$result = mysqli_query($conn, $sql4);

		if(mysqli_num_rows($result) >= 1){
			$row = mysqli_fetch_assoc($result);
			if($row['ID'] === $id && $row['prod_id'] === $prod_id && $row['status'] === $status){
				$total_price = $row['total'];
				$prodid = $row['prod_id'];
				$sum = $row['Quantity'];
				$qty = $sum + $Quantity;
				$overall= $qty * $Price;

				$sql5 = "UPDATE tblorders SET Quantity = '$qty', total = '$overall' WHERE prod_id = '$prodid' AND Item = '$Item'";
    			$update = mysqli_query($conn, $sql5);
 				
 				$sql7 = "INSERT INTO tbltransaction(transacID, Item, Quantity, ID, First_name, Last_name) VALUES('".$transacid."','".$Item."','".$overall."','".$id."','".$fname."','".$lname."')";	
				$success = mysqli_query($conn, $sql7);

			}*/
		
	$sql2 = "INSERT INTO tbltransaction(transacID, Item, Quantity, ID, First_name, Last_name) VALUES('".$transacid."','".$Item."','".$total_quantity."','".$id."','".$fname."','".$lname."')";	
	$success = mysqli_query($conn, $sql2);

	if($success){
		$sql1 = "SELECT * FROM tblcart WHERE ID = '$id'";
		$res = mysqli_query($conn, $sql1);

		while($row_cart = mysqli_fetch_array($res)){
			$prod_id = $row_cart['prod_id'];
			$Image = $row_cart['Image'];
			$total = $row_cart['Price'];
			$item = $row_cart['Item'];
			$Quantity = $row_cart['Quantity'];
			$transid = $row_cart['transacID'];
			$ID = $row_cart['ID'];
			$First_name = $row_cart['First_name'];
			$Last_name = $row_cart['Last_name'];


		$sql6 = "INSERT INTO tblorders(prod_id, ID, transacID, First_name, Last_name, address, Item, total, Quantity, status, Image) VALUES('".$prod_id."','".$ID."','".$transid."','".$First_name."','".$Last_name."', '".$address."','".$item."', '".$total."','".$Quantity."', '".$status."','".$Image."')";	
		$insert = mysqli_query($conn, $sql6);

		
		
	}
		
		
}
	$sql3 = "DELETE FROM tblcart WHERE ID = '$id'";	
		$remove = mysqli_query($conn, $sql3);
		session_start();
		$_SESSION['checkout'] = "Item successfully ordered";
		echo "<script>window.open('../cart.php','_self')</script>";
}	


	if(isset($_POST['delivered_status'])){

		$ID = $_POST['ID'];
		$order_id = $_POST['order_id'];
		$status = "Paid";

		$sql = "UPDATE tblorders SET status = '$status' WHERE ID = '$ID' AND order_id = '$order_id'";
		$res = mysqli_query($conn, $sql);
		if($res){
			session_start();
		$_SESSION['purchase_complete'] = "Item purchased successful";
			echo "<script>window.open('../account_page.php','_self')</script>";
		}
	}
	if(isset($_POST['delivered_confirm'])){

		$ID = $_POST['ID'];
		$order_id = $_POST['order_id'];
		$status = "Paid";

		$sql = "UPDATE tblorders SET status = '$status' WHERE ID = '$ID' AND order_id = '$order_id'";
		$res = mysqli_query($conn, $sql);
		if($res){
			echo "<script>window.open('../confirm_page.php','_self')</script>";
		}
	}
?>