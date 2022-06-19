<?php
include("db.inc.php");

    if(isset($_POST['add'])){
        $item_name = mysqli_real_escape_string($conn, $_POST['item_name']);
        $category = mysqli_real_escape_string($conn, $_POST['category']);
        $item_price = mysqli_real_escape_string($conn, $_POST['item_price']);
        $item_info = mysqli_real_escape_string($conn, $_POST['item_info']);
        $upper_data = strtoupper($_POST['item_name']);

        $image = mysqli_real_escape_string($conn, $_FILES['image']['name']);
        $filetype = $_FILES['image']['type'];
        $image_tmp = $_FILES['image']['tmp_name'];

       $sql1 = "SELECT * FROM tblcategory WHERE cat_name = '$category'";
       $res = mysqli_query($conn, $sql1);

       while($row = mysqli_fetch_array($res)){
            $cat_id = $row['cat_id'];
            $cat_info = $row['category_info'];
       }

     if($filetype != "image/jpeg" && $filetype != "image/png" && $filetype){
     	session_start();
         $_SESSION['filetype'] = "Jpeg and Png only";
    echo "<script>window.open('../admin_add.php','_self')</script>";
    return;
     }    
     if($image_tmp == "") {
        session_start();
         $_SESSION['insert'] = "Please Insert Image";
    echo "<script>window.open('../admin_add.php','_self')</script>";
    return;
    }

    if(file_exists("../image/Product/$image")){
    	$filename = $_FILES['image']['name'];
    	session_start();
        $_SESSION['exist'] = "Sorry, image already exist";
        echo "<script>window.open('../admin_add.php','_self')</script>";
        return;
    }  

    else{

    	move_uploaded_file($image_tmp, "../image/Product/$image");
        
     $sql = "INSERT INTO tblproduct(Item, Price, cat_id, Category, Info, Image) VALUES('".$upper_data."', '".$item_price."', '".$cat_id."', '".$cat_info."','".$item_info."', '".$image."')";
        $success= mysqli_query($conn, $sql);

     if($success){
        session_start();
        $_SESSION['uploaded'] = "Product has been added";
        echo "<script>window.open('../admin_add.php','_self')</script>";
     }   
    }
}

    if(isset($_POST['restore_trash_product'])){
         $product_id = $_POST['restore_id'];
         $product_item = $_POST['restore_item'];
         $product_price = $_POST['restore_price'];
          $product_cat_id = $_POST['restore_cat_id'];
         $product_category = $_POST['restore_category'];
         $product_info = $_POST['restore_info'];
         $product_image = $_POST['restore_image'];

        $sql = "INSERT INTO tblproduct(ID, Item, Price, cat_id, Category, Info, Image) VALUES('".$product_id."','".$product_item."','".$product_price."', '".$product_cat_id."','".$product_category."','".$product_info."','".$product_image."')";
        $added = mysqli_query($conn, $sql);

          /* MOVE FILE TO ANOTHER */
            $filePath = "../image/Trash/$product_image";
            $destinationFilePath = "../image/Product/$product_image";
           copy($filePath, $destinationFilePath);

            /* DELETE FILE IN FOLDER */
          $path = "../image/Trash/$product_image";
          unlink($path);
          
        
        if($added){

            $sql1 = "DELETE FROM tbltrash WHERE ID = '$product_id'";
            $remove = mysqli_query($conn, $sql1);
            if($remove){

         session_start();
        $_SESSION['trash_added'] = "Product has been restored";
        echo "<script>window.open('../trash.php','_self')</script>";
        }
    }
    }
    

?>