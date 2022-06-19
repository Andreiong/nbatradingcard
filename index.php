<?php
include_once'home_header.php';
include("includes/db.inc.php");
?>
        <!--image slider start-->
        
        <div class="slider-container">
    <div class="slider">
      <div class="slides">
          
        <!--radio buttons start-->
          
        <input type="radio" name="radio-btn" id="radio1">
        <input type="radio" name="radio-btn" id="radio2">
        <input type="radio" name="radio-btn" id="radio3">
        <input type="radio" name="radio-btn" id="radio4">
          
        <!--radio buttons end-->

        <!--slide images start-->
          
        <div class="slide first">
         	<a href="store.php?select_all"> <img src="image/NBA%20banner.png" alt="image1"></a>
        </div>
        <div class="slide">
          	<a href="store.php?limited"><img src="image/Limited%20edition.png" alt="image2"></a>
        </div>
        <div class="slide">
          	<a href="store.php?others"><img src="image/collectionBox.png" alt="image3"></a>
        </div>
        <div class="slide">
         	<a href="store.php?rookie"> <img src="image/Rookiecards.png" alt="image4"></a>
        </div>
        <!--slide images end-->
          
        <!--automatic navigation start-->
          
        <div class="navigation-auto">
          <div class="auto-btn1"></div>
          <div class="auto-btn2"></div>
          <div class="auto-btn3"></div>
          <div class="auto-btn4"></div>
        </div>
          
        <!--automatic navigation end-->
          
      </div>
      <!--manual navigation start-->
      <div class="navigation-manual">
        <label for="radio1" class="manual-btn"></label>
        <label for="radio2" class="manual-btn"></label>
        <label for="radio3" class="manual-btn"></label>
        <label for="radio4" class="manual-btn"></label>
      </div>
        
      <!--manual navigation end-->
        
    </div>
        </div>

     <!--image slider end--> 
        
        <div class="background"> </div>
        
    <!--- product slider --->
        
        <main>
		<section>
            <!--- product 1 --->
            <?php
            $sql = "SELECT * FROM tblproduct WHERE Category = 'rookie' LIMIT 10";
            $res = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_array($res)){
            	$Price = $row['Price'];
            	$Item = $row['Item'];
            	
            	$path = "image/Product/";
            	$Image = $row['Image'];

            ?>
			<div class="product">
				<picture>
					<img src="<?php echo $path.$Image;?>" alt="">
				</picture>
				<div class="detail">
					<p>
                        <samp><?php echo $Price; ?></samp><br>
						<b><?php echo $Item; ?></b><br>
						<small>Rookie Card</small>
					</p>
					
				</div>
                
				<div class="button">
					<a href="store.php?rookie">View More</a>
				</div>
			</div>
            <?php } ?>
           
            
		</section>
            <div class="next">
			<p>
				<span>&#139;</span>
				<span>&#155;</span>
			</p>
            </div>
	</main>
    
    <!--- end product slider --->
        <div class="box"></div>
        	<a href="store.php?others"><div class="banner"></div></a>
        <div class="limited"></div>

        <!--- limited product --->
        
        <!--- limited 1 --->
        <div class="limited-container">
        <div class="limited-product">
            <div class="limited-image">
            		<a href="store.php?limited">
                <img src="image/limited_iverson.png">
            </a>
                </div>
                    <div class="details">
                        <p>ALLEN IVERSON</p>
                    </div>
            <div class="button1">
                  <a href="store.php?limited">SEE MORE</a>
                </div>
        </div>
        
         <!--- limited 2 --->
        <div class="limited-product">
            <div class="limited-image">
            		<a href="store.php?limited">
                <img src="image/limited_jordan.jpg">
            </a>
                </div>
                    <div class="details">
                       <p>MICHAEL JORDAN</p>
                       
                    </div>
            <div class="button1">
                  <a href="store.php?limited">SEE MORE</a>
                </div>
        </div>
        
         <!--- limited 3 --->
        <div class="limited-product">
            <div class="limited-image">
            	<a href="store.php?limited">
            <img class="limited3" src="image/limited_kobe.jpeg">
        </a>
                </div>
                    <div class="details">
                        <p>KOBE BRYANT</p>
                    </div>
            
            <div class="button1">
                  <a href="store.php?limited">SEE MORE</a>
                </div>
        </div>
            
            </div>
        <div class="view">
            <a href="store.php?limited">VIEW ALL</a>
        </div>
        <!---  end limited product --->
        	<a href="register.php">
        <div class="banner1"></div>
    </a>
<?php 
include_once'home_footer.php';
?>            
