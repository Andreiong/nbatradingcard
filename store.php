<?php
include("includes/db.inc.php");
 include_once'home_header.php';
 ?>
        
    <link rel="stylesheet" type="text/css" href="css/index.css?<?php echo time(); ?>" />
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>

     <?php
           if(isset($_SESSION['success'])){
           ?>    
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
       unset($_SESSION['success']);
       ?>
       
        <!---- SIDEBAR ---->
        <div class="container-sidebar">
        <div class="sidebar-left">
            <p>NBA Teams</p>
        <ul>
            <?php 

            $sql = "SELECT * FROM tblcategory WHERE category_info = 'nba' ORDER BY cat_name ASC";
            $sucess = mysqli_query($conn, $sql);

            while($count=mysqli_fetch_assoc($sucess)){
                $cat_id = $count['cat_id'];
                $cat_name = $count['cat_name'];
            ?>
            <li><a href='store.php?nba_category=<?php echo $cat_id; ?>'><?php echo $cat_name; ?></a></li>
        <?php } ?>
            </ul>
            
        </div>
            <div class="sidebar-left">
                 <p>Limited Edition</p>
            <ul>
                <?php
                 $sql = "SELECT * FROM tblcategory WHERE category_info = 'limited' ORDER BY cat_name ASC";
            $sucess = mysqli_query($conn, $sql);

            while($count=mysqli_fetch_assoc($sucess)){
                $cat_id = $count['cat_id'];
                $cat_name = $count['cat_name'];

                ?>
            <li><a href="store.php?limited_category=<?php echo $cat_id;?>"><?php echo $cat_name?></a></li>    
        <?php } ?>
            </ul>
            </div>
            <div class="sidebar-left">
                 <p>Others</p>
            <ul>
                  <?php
                 $sql = "SELECT * FROM tblcategory WHERE category_info = 'others' ORDER BY cat_name ASC";
            $sucess = mysqli_query($conn, $sql);

            while($count=mysqli_fetch_assoc($sucess)){
                $cat_id = $count['cat_id'];
                $cat_name = $count['cat_name'];

                ?>
            <li><a href="store.php?others_category=<?php echo $cat_id;?>"><?php echo $cat_name;?></a></li>
        <?php } ?>
            </ul>
            </div>
             <div class="sidebar-left">
                 <p>Rookie Card</p>
            <ul>
                  <?php
                 $sql = "SELECT * FROM tblcategory WHERE category_info = 'rookie' ORDER BY cat_name ASC";
            $sucess = mysqli_query($conn, $sql);

            while($count=mysqli_fetch_assoc($sucess)){
                $cat_id = $count['cat_id'];
                $cat_name = $count['cat_name'];

                ?>
            <li><a href="store.php?others_category=<?php echo $cat_id;?>"><?php echo $cat_name;?></a></li>
        <?php } ?>
            </ul>
            </div>
        </div>

           
        <!---- end of BAR ---->
        
        <!---- Product List ---->
        
        <div class="sidebar-right">  
        <h3>NBA Cards</h3>
            <div class="container-right">


          <!--- IF Limited CARD SET --->        
        <?php
        if(isset($_SESSION['ID'])){?>
            <?php 
            if(isset($_GET['limited'])){ 
        $user_id =  $_SESSION['ID'];       
        $cat_id = $_GET['limited'];

        $sql = "SELECT * FROM tblproduct WHERE Category = 'limited'";
        $success = mysqli_query($conn, $sql);

        while ($row_product = mysqli_fetch_array($success)) {

            $ID = $row_product['ID'];
            $Item = $row_product['Item'];
            $Price = $row_product['Price'];
           
            $path = "image/Product/";
            $Image = $row_product['Image'];
            ?>
         <div class="image-container">
         <div class="product_container">
            <img src = "<?php echo $path.$Image; ?>">
            <div class="background_image">
                <form>
                    <div class="container-content">
                    <div class="content_container">
                    <p class="product_price"><?php echo $Price;?></p>
                    <p class="product_name"><?php echo $Item;?></p>
                 <a href="store.php?get_product=<?php echo $ID;?>">Add to cart</a>
                
                    </div>
                        </div>
                </form>
            </div>  
        </div>
            
            </div>
           
        <?php }?>
    
    <?php } ?>   

        <?php } ?>    

        <!--- IF Limited CARD NOT SET --->
     <?php
        if(!isset($_SESSION['ID'])){?>
            <?php 
            if(isset($_GET['limited'])){   
        $cat_id = $_GET['limited'];

        $sql = "SELECT * FROM tblproduct WHERE Category = 'limited'";
        $success = mysqli_query($conn, $sql);

        while ($row_product = mysqli_fetch_array($success)) {

            $ID = $row_product['ID'];
            $Item = $row_product['Item'];
            $Price = $row_product['Price'];
           
            $path = "image/Product/";
            $Image = $row_product['Image'];
            ?>
         <div class="image-container">
         <div class="product_container">
            <img src = "<?php echo $path.$Image; ?>">
            <div class="background_image">
                <form>
                    <div class="container-content">
                    <div class="content_container">
                    <p class="product_price"><?php echo $Price;?></p>
                    <p class="product_name"><?php echo $Item;?></p>
                    <a href="login.php">Add to cart</a>
                
                    </div>
                        </div>
                </form>
            </div>  
        </div>
            
            </div>
           
        <?php }?>
    
    <?php } ?>   
            
        <?php } ?>    


          <!--- IF STORE CARD SET --->        
        <?php
        if(isset($_SESSION['ID'])){?>
            <?php 
            if(isset($_GET['select_all'])){ 
        $user_id =  $_SESSION['ID'];       
        $cat_id = $_GET['select_all'];

        $sql = "SELECT * FROM tblproduct";
        $success = mysqli_query($conn, $sql);

        while ($row_product = mysqli_fetch_array($success)) {

            $ID = $row_product['ID'];
            $Item = $row_product['Item'];
            $Price = $row_product['Price'];
           
            $path = "image/Product/";
            $Image = $row_product['Image'];
            ?>
         <div class="image-container">
         <div class="product_container">
            <img src = "<?php echo $path.$Image; ?>">
            <div class="background_image">
                <form>
                    <div class="container-content">
                    <div class="content_container">
                    <p class="product_price"><?php echo $Price;?></p>
                    <p class="product_name"><?php echo $Item;?></p>
                     <a href="store.php?get_product=<?php echo $ID;?>">Add to cart</a>
                
                    </div>
                        </div>
                </form>
            </div>  
        </div>
            
            </div>
           
        <?php }?>
    
    <?php } ?>   

        <?php } ?>    

        <!--- IF STORE NOT SET --->
     <?php
        if(!isset($_SESSION['ID'])){?>
            <?php 
            if(isset($_GET['select_all'])){   
        $cat_id = $_GET['select_all'];

        $sql = "SELECT * FROM tblproduct";
        $success = mysqli_query($conn, $sql);

        while ($row_product = mysqli_fetch_array($success)) {

            $ID = $row_product['ID'];
            $Item = $row_product['Item'];
            $Price = $row_product['Price'];
           
            $path = "image/Product/";
            $Image = $row_product['Image'];
            ?>
         <div class="image-container">
         <div class="product_container">
            <img src = "<?php echo $path.$Image; ?>">
            <div class="background_image">
                <form>
                    <div class="container-content">
                    <div class="content_container">
                    <p class="product_price"><?php echo $Price;?></p>
                    <p class="product_name"><?php echo $Item;?></p>
                    <a href="login.php">Add to cart</a>
                
                    </div>
                        </div>
                </form>
            </div>  
        </div>
            
            </div>
           
        <?php }?>
    
    <?php } ?>   
            
        <?php } ?>    


        <!--- IF OTHERS CARD SET --->        
        <?php
        if(isset($_SESSION['ID'])){?>
            <?php 
            if(isset($_GET['others'])){ 
        $user_id =  $_SESSION['ID'];       

        $sql = "SELECT * FROM tblproduct WHERE Category = 'others'";
        $success = mysqli_query($conn, $sql);

        while ($row_product = mysqli_fetch_array($success)) {

            $ID = $row_product['ID'];
            $Item = $row_product['Item'];
            $Price = $row_product['Price'];
           
            $path = "image/Product/";
            $Image = $row_product['Image'];
            ?>
         <div class="image-container">
         <div class="product_container">
            <img src = "<?php echo $path.$Image; ?>">
            <div class="background_image">
                <form>
                    <div class="container-content">
                    <div class="content_container">
                    <p class="product_price"><?php echo $Price;?></p>
                    <p class="product_name"><?php echo $Item;?></p>
                 <a href="store.php?get_product=<?php echo $ID;?>">Add to cart</a>
                
                    </div>
                        </div>
                </form>
            </div>  
        </div>
            
            </div>
           
        <?php }?>
    
    <?php } ?>   

        <?php } ?>    

        <!--- IF OTHERS CARD NOT SET --->
     <?php
        if(!isset($_SESSION['ID'])){?>
            <?php 
            if(isset($_GET['others'])){   

        $sql = "SELECT * FROM tblproduct WHERE Category = 'others'";
        $success = mysqli_query($conn, $sql);

        while ($row_product = mysqli_fetch_array($success)) {

            $ID = $row_product['ID'];
            $Item = $row_product['Item'];
            $Price = $row_product['Price'];
           
            $path = "image/Product/";
            $Image = $row_product['Image'];
            ?>
         <div class="image-container">
         <div class="product_container">
            <img src = "<?php echo $path.$Image; ?>">
            <div class="background_image">
                <form>
                    <div class="container-content">
                    <div class="content_container">
                    <p class="product_price"><?php echo $Price;?></p>
                    <p class="product_name"><?php echo $Item;?></p>
                    <a href="login.php">Add to cart</a>
                
                    </div>
                        </div>
                </form>
            </div>  
        </div>
            
            </div>
           
        <?php }?>
    
    <?php } ?>   
            
        <?php } ?>    

         <!--- IF Rookie CARD SET --->        
        <?php
        if(isset($_SESSION['ID'])){?>
            <?php 
            if(isset($_GET['rookie'])){ 
        $user_id =  $_SESSION['ID'];       

        $sql = "SELECT * FROM tblproduct WHERE Category = 'rookie'";
        $success = mysqli_query($conn, $sql);

        while ($row_product = mysqli_fetch_array($success)) {

            $ID = $row_product['ID'];
            $Item = $row_product['Item'];
            $Price = $row_product['Price'];
           
            $path = "image/Product/";
            $Image = $row_product['Image'];
            ?>
         <div class="image-container">
         <div class="product_container">
            <img src = "<?php echo $path.$Image; ?>">
            <div class="background_image">
                <form>
                    <div class="container-content">
                    <div class="content_container">
                    <p class="product_price"><?php echo $Price;?></p>
                    <p class="product_name"><?php echo $Item;?></p>
                 <a href="store.php?get_product=<?php echo $ID;?>">Add to cart</a>
                
                    </div>
                        </div>
                </form>
            </div>  
        </div>
            
            </div>
           
        <?php }?>
    
    <?php } ?>   

        <?php } ?>    

        <!--- IF ROOKIE CARD NOT SET --->
     <?php
        if(!isset($_SESSION['ID'])){?>
            <?php 
            if(isset($_GET['rookie'])){   

        $sql = "SELECT * FROM tblproduct WHERE Category = 'rookie'";
        $success = mysqli_query($conn, $sql);

        while ($row_product = mysqli_fetch_array($success)) {

            $ID = $row_product['ID'];
            $Item = $row_product['Item'];
            $Price = $row_product['Price'];
           
            $path = "image/Product/";
            $Image = $row_product['Image'];
            ?>
         <div class="image-container">
         <div class="product_container">
            <img src = "<?php echo $path.$Image; ?>">
            <div class="background_image">
                <form>
                    <div class="container-content">
                    <div class="content_container">
                    <p class="product_price"><?php echo $Price;?></p>
                    <p class="product_name"><?php echo $Item;?></p>
                    <a href="login.php">Add to cart</a>
                
                    </div>
                        </div>
                </form>
            </div>  
        </div>
            
            </div>
           
        <?php }?>
    
    <?php } ?>   
            
        <?php } ?>    

        <!--- SELECT NBA SIDEBAR --->
        <?php
        if(isset($_SESSION['ID'])){?>
           <?php 
            if(isset($_GET['nba_category'])){         
        $cat_id = $_GET['nba_category'];

        $sql = "SELECT * FROM tblproduct WHERE cat_id = '$cat_id'";
        $success = mysqli_query($conn, $sql);

        while ($row_product = mysqli_fetch_array($success)) {

            $ID = $row_product['ID'];
            $Item = $row_product['Item'];
            $Price = $row_product['Price'];
           
            $path = "image/Product/";
            $Image = $row_product['Image'];
            ?>
         <div class="image-container">
         <div class="product_container">
            <img src = "<?php echo $path.$Image; ?>">
            <div class="background_image">
                <form>
                    <div class="container-content">
                    <div class="content_container">
                    <p class="product_price"><?php echo $Price;?></p>
                    <p class="product_name"><?php echo $Item;?></p>
                    <a href="store.php?get_product=<?php echo $ID;?>">Add to cart</a>
               
                    </div>
                        </div>
                </form>
            </div>  
        </div>
            
            </div>
            <?php } ?>
        <?php }?>
    <?php } ?>    

       
    <!--- IF NBA SIDEBAR NOT SET --->
     <?php
        if(!isset($_SESSION['ID'])){?>
            <?php 
            if(isset($_GET['nba_category'])){   
                $cat_id = $_GET['nba_category'];
        $sql = "SELECT * FROM tblproduct WHERE cat_id = '$cat_id'";
        $success = mysqli_query($conn, $sql);

        while ($row_product = mysqli_fetch_array($success)) {

            $ID = $row_product['ID'];
            $Item = $row_product['Item'];
            $Price = $row_product['Price'];
           
            $path = "image/Product/";
            $Image = $row_product['Image'];
            ?>
         <div class="image-container">
         <div class="product_container">
            <img src = "<?php echo $path.$Image; ?>">
            <div class="background_image">
                <form>
                    <div class="container-content">
                    <div class="content_container">
                    <p class="product_price"><?php echo $Price;?></p>
                    <p class="product_name"><?php echo $Item;?></p>
                    <a href="login.php">Add to cart</a>
                
                    </div>
                        </div>
                </form>
            </div>  
        </div>
            
            </div>
           
        <?php }?>
    
    <?php } ?>   
            
        <?php } ?>    


    <!--- SELECT LIMITED SIDEBAR --->

            <?php
            if(isset($_SESSION['ID'])){
            ?>
           <?php 
            if(isset($_GET['limited_category'])){         
        $cat_id = $_GET['limited_category'];

        $sql = "SELECT * FROM tblproduct WHERE cat_id = '$cat_id'";
        $success = mysqli_query($conn, $sql);

        while ($row_product = mysqli_fetch_array($success)) {

            $ID = $row_product['ID'];
            $Item = $row_product['Item'];
            $Price = $row_product['Price'];
           
            $path = "image/Product/";
            $Image = $row_product['Image'];
            ?>
         <div class="image-container">
         <div class="product_container">
            <img src = "<?php echo $path.$Image; ?>">
            <div class="background_image">
                <form>
                    <div class="container-content">
                    <div class="content_container">
                    <p class="product_price"><?php echo $Price;?></p>
                    <p class="product_name"><?php echo $Item;?></p>
                    <a href="store.php?get_product=<?php echo $ID;?>">Add to cart</a>
               
                    </div>
                        </div>
                </form>
            </div>  
        </div>
            
            </div>
            <?php } ?>
        <?php }?>
    
    <?php } ?>    

    <!--- SELECT LIMITED SIDEBAR NOT SET--->

            <?php
            if(!isset($_SESSION['ID'])){
            ?>
           <?php 
            if(isset($_GET['limited_category'])){         
        $cat_id = $_GET['limited_category'];

        $sql = "SELECT * FROM tblproduct WHERE cat_id = '$cat_id'";
        $success = mysqli_query($conn, $sql);

        while ($row_product = mysqli_fetch_array($success)) {

            $ID = $row_product['ID'];
            $Item = $row_product['Item'];
            $Price = $row_product['Price'];
           
            $path = "image/Product/";
            $Image = $row_product['Image'];
            ?>
         <div class="image-container">
         <div class="product_container">
            <img src = "<?php echo $path.$Image; ?>">
            <div class="background_image">
                <form>
                    <div class="container-content">
                    <div class="content_container">
                    <p class="product_price"><?php echo $Price;?></p>
                    <p class="product_name"><?php echo $Item;?></p>
                    <a href="login.php">Add to cart</a>
               
                    </div>
                        </div>
                </form>
            </div>  
        </div>
            
            </div>
            <?php } ?>
        <?php }?>
    
    <?php } ?>    

      <!--- SELECT OTHER SIDEBAR --->
        <?php
        if(isset($_SESSION['ID'])){
        ?>
           <?php 
            if(isset($_GET['others_category'])){         
        $cat_id = $_GET['others_category'];

        $sql = "SELECT * FROM tblproduct WHERE cat_id = '$cat_id'";
        $success = mysqli_query($conn, $sql);

        while ($row_product = mysqli_fetch_array($success)) {

            $ID = $row_product['ID'];
            $Item = $row_product['Item'];
            $Price = $row_product['Price'];
           
            $path = "image/Product/";
            $Image = $row_product['Image'];
            ?>
         <div class="image-container">
         <div class="product_container">
            <img src = "<?php echo $path.$Image; ?>">
            <div class="background_image">
                <form>
                    <div class="container-content">
                    <div class="content_container">
                    <p class="product_price"><?php echo $Price;?></p>
                    <p class="product_name"><?php echo $Item;?></p>
                    <a href="store.php?get_product=<?php echo $ID;?>">Add to cart</a>
               
                    </div>
                        </div>
                </form>
            </div>  
        </div>
            
            </div>
            <?php } ?>
        <?php }?>
    
    <?php } ?>    

    <!--- SELECT OTHER SIDEBAR NOT SET--->
        <?php
        if(!isset($_SESSION['ID'])){
        ?>
           <?php 
            if(isset($_GET['others_category'])){         
        $cat_id = $_GET['others_category'];

        $sql = "SELECT * FROM tblproduct WHERE cat_id = '$cat_id'";
        $success = mysqli_query($conn, $sql);

        while ($row_product = mysqli_fetch_array($success)) {

            $ID = $row_product['ID'];
            $Item = $row_product['Item'];
            $Price = $row_product['Price'];
           
            $path = "image/Product/";
            $Image = $row_product['Image'];
            ?>
         <div class="image-container">
         <div class="product_container">
            <img src = "<?php echo $path.$Image; ?>">
            <div class="background_image">
                <form>
                    <div class="container-content">
                    <div class="content_container">
                    <p class="product_price"><?php echo $Price;?></p>
                    <p class="product_name"><?php echo $Item;?></p>
                    <a href="login.php">Add to cart</a>
               
                    </div>
                        </div>
                </form>
            </div>  
        </div>
            
            </div>
            <?php } ?>
        <?php }?>
    
    <?php } ?>   
                </div>
            
        </div>
        <!---- End Product List ---->
        
        <div class="clear"></div>


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
       <?php include_once'home_footer.php' ?>

     <?php
     if(isset($_GET['get_product'])){
                $product_id = $_GET['get_product'];
                $ID = $_SESSION['ID'];
                $Fname = $_SESSION['First_name'];
                $Lname = $_SESSION['Last_name'];
                $Quantity = '1';
                $transacID =   $_SESSION['transacID'];

                $sql = "SELECT * FROM tblproduct WHERE ID = '$product_id'";
                $res = mysqli_query($conn, $sql);

                while($row_product = mysqli_fetch_array($res)){
                    $prod_id= $row_product['ID'];
                    $Item = $row_product['Item'];
                    $Price = $row_product['Price'];
                    $Image = $row_product['Image'];  
                }
                
                    $sql1 = "INSERT INTO tblcart(prod_id, transacID, Item, Price, Quantity, Image, ID, First_name, Last_name) VALUES('".$prod_id."', '".$transacID."', '".$Item."','".$Price."','".$Quantity."','".$Image."','".$ID."','".$Fname."','".$Lname."')";
                    $insert = mysqli_query($conn, $sql1);

                    if($insert){
                        session_start();
                        $_SESSION['success'] = "Added to cart";
                         echo "<script>window.open('store.php?select_all','_self')</script>";
                    }
                
            }

     ?>

   