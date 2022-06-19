<?php
 include("db.inc.php");


	if(isset($_GET['remove_category'])){
		
		$category_id = $_GET['remove_category'];

		$sql = "DELETE FROM tblcategory WHERE cat_id = '$category_id'";
		$success_remove = mysqli_query($conn, $sql);

		if($success_remove){
			session_start();
			$_SESSION['success'] = "Category has been deleted";
			echo "<script>window.open('../admin_category_nba.php','_self')</script>";
		}

	}

	if(isset($_POST['add'])){
    $category_name = mysqli_real_escape_string($conn,$_POST['item_name']);
    $category = mysqli_real_escape_string($conn, $_POST['category']);

     $sql1 = "SELECT * FROM tblcategory WHERE cat_name = '".$category_name."' AND category_info = '".$category."' limit 1";
     $count = mysqli_query($conn, $sql1);

     if(mysqli_num_rows($count) > 0){
        session_start();
        $_SESSION['failed'] = "Category already exist";
        echo "<script>window.open('../admin_category.php','_self')</script>";
     } 

     else {
    $sql = "INSERT INTO tblcategory(cat_name, category_info) VALUES('".$category_name."','".$category."')";
    $success = mysqli_query($conn, $sql);
    if($success){
        session_start();
        $_SESSION['added'] = "Category has been added";
        echo "<script>window.open('../admin_category.php','_self')</script>";
    }
}

}
	if(isset($_POST['remove_nba_category'])){

		$cat_id = $_POST['delete_id'];
		$sql = "DELETE FROM tblcategory WHERE cat_id = '$cat_id'";
		$remove = mysqli_query($conn, $sql);

		if($remove){
			session_start();
			$_SESSION['remove_nba'] = "Category has been removed";
			echo "<script>window.open('../admin_category_nba.php','_self')</script>";
		}
	}
	if(isset($_POST['remove_product'])){

		$ID = $_POST['delete_id'];
		$Item = $_POST['delete_item'];
		$Price = $_POST['delete_price'];
		$cat_id = $_POST['delete_cat_id'];
		$Category = $_POST['delete_category'];
		$Info = $_POST['delete_info'];
		$Image = $_POST['delete_image'];

		$sql2 = "INSERT INTO tbltrash(ID, Item, Price, cat_id, Category, Info, Image) VALUES('".$ID."','".$Item."','".$Price."','".$cat_id."','".$Category."','".$Info."','".$Image."')";
		$trash = mysqli_query($conn, $sql2);

			/* MOVE FILE TO ANOTHER */
		$filePath = "../image/Product/$Image";
		$destinationFilePath = "../image/Trash/$Image";
		copy($filePath, $destinationFilePath);


		$sql1 = "SELECT * FROM tblproduct WHERE ID = '$ID'";
		$success = mysqli_query($conn, $sql1);

		if($row = mysqli_fetch_array($success)){

		$Image = $row['Image'];

		$sql = "DELETE FROM tblproduct WHERE ID = '$ID'";
		$remove = mysqli_query($conn, $sql);

			/* DELETE FILE IN FOLDER */
		$path = "../image/Product/$Image";
		unlink($path);

			if($remove){
			session_start();
			$_SESSION['product_remove'] = "Product has been removed";
			echo "<script>window.open('../admin_inventory.php','_self')</script>";
		}

	}
		}
		if(isset($_POST['category_remove'])){
			$cat_name = $_POST['cat_name'];
			$category_info = $_POST['category_info'];

			$sql = "DELETE FROM tblcategory WHERE cat_name = '$cat_name' AND category_info = '$category_info'";
			$success = mysqli_query($conn, $sql);

			if($success){
				session_start();
				$_SESSION['category_removed'] = "Category has been removed";
				echo "<script>window.open('../admin_category.php','_self')</script>";
			}

		}
			if(isset($_POST['remove_limited_category'])){
			$id = $_POST['delete_id'];

			$sql = "DELETE FROM tblcategory WHERE cat_id = '$id'";
			$success = mysqli_query($conn, $sql);

			if($success){
				session_start();
				$_SESSION['limited_removed'] = "Category has been removed";
				echo "<script>window.open('../admin_category_limited.php','_self')</script>";
			}

		}
		if(isset($_POST['remove_others_category'])){
			$id = $_POST['delete_id'];

			$sql = "DELETE FROM tblcategory WHERE cat_id = '$id'";
			$success = mysqli_query($conn, $sql);

			if($success){
				session_start();
				$_SESSION['others_removed'] = "Category has been removed";
				echo "<script>window.open('../admin_category_others.php','_self')</script>";
			}

		}

	if(isset($_POST['remove_trash_product'])){
		
		$product_id = $_POST['delete_id'];
		$product_image = $_POST['delete_image'];

		 $path = "../image/Trash/$product_image";
         unlink($path);
		$sql = "DELETE FROM tbltrash WHERE ID = '$product_id'";
		$success_remove = mysqli_query($conn, $sql);

		

		if($success_remove){
			session_start();
			$_SESSION['trash_removed'] = "Product has been deleted";
			echo "<script>window.open('../trash.php','_self')</script>";
		}

	}
		
	
?>