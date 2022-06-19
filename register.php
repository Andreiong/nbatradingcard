
<?php require_once "includes/signup.inc.php";
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="stylesheet" type="text/css" href="css/register.css?<?php echo time(); ?>" />
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">
        <title>NBA Trading Card</title>
    </head>
    <body>
        <!---- NAVBAR ---->
            <div class="header">
                    <ul>
                        <li><a href="#"><i class="fa fa-bell" aria-hidden="true"></i>Notifications</a></li>
                        <li><a href="#"><i class="fa fa-question-circle" aria-hidden="true"></i>Help</a></li>
                    </ul>
            </div>

        <div class="container">
           <div class="navbar">
                <img class="logo" src="image/LOGO.png">
            <div class="search">
                <form>
                <input type="text" placeholder="Search">
                    
                </form>
            </div>
          <div class="cart">
              <a href="cart.php">
               <img src="image/cart.png">
              </a>
               </div>
           </div>
        </div>
         <div class="category">
            <ul>
              <li><a href="index.php">HOME</a></li>
            <li><a href="store.php?select_all">STORE</a></li>
             <li><a href='store.php?rookie_card'>ROOKIE CARD</a></li>
             <li><a href="store.php?trading_card">TRADING CARD BOX</a></li>
             <li><a href="store.php?limited">LIMITED EDITION</a></li>
             </ul>
        </div>
        <!---- END OF NAVBAR ---->
        <!--- Form --->
        <div class="slider-container">
            <div class="slide-container active">
        <div class="slide">
        <div class="content">
        <div class="content-container">
            <div class="left-content">
                <div class="left">
  
            </div>
                </div>
            <div class="right-content">
                <div class="right">
                <img src="image/LOGO.png">
                <p>SIGN UP</p>
            <div class="signup-content">
                <form method="post" action="register.php">
                 <?php
                    if(isset($_POST['fname'])){
                        echo '<input type="text" name="fname" placeholder="First Name" value="'.$fname.'">';
                    }
                    else{
                        echo '<input type="text" name="fname" placeholder="First Name" required>';
                    }
                 ?>   
                  <?php
                    if(isset($_POST['lname'])){
                        echo '<input type="text" name="lname" placeholder="First Name" value="'.$lname.'">';
                    }
                    else{
                        echo ' <input type="text" name="lname" placeholder="Last Name" required>';
                    }
                 ?>  
                <?php 
                    if(isset($_POST['mnumber']))
                    {
                        echo'<input type="text" name="mnumber" placeholder="Mobile Number" value ="'.$mnumber.'">';
                    }
                    else {
                        echo ' <input class="field mnumber" onkeypress="inputnumber(event)" type="text" name="mnumber" placeholder="Mobile Number" required>';
                    }
                    ?>
                <?php 
                    if(isset($_POST['email']))
                    {
                        echo '<input type="email" name="email" placeholder="Email" value ="'.$email.'">';          
                    }
                    else {
                       echo' <input class="field email" type="email" name="email" placeholder="Email" required>';
                    }
                    ?>
                    <?php if(count($emailerror) >= 0)
                     { 
                        ?>
                        <div class="error_text">
                        <?php foreach($emailerror as $showerror){
                                echo $showerror;
                            }?>
                        </div>
                        <?php
                    }
                    ?>
                 <input type="password" name="password_1" placeholder="Password" required>
                 <input type="password" name="password_2" placeholder="Confirm Password" required>
                 <?php if(count($passworderror) >= 0)
                     { 
                        ?>
                        <div class="error_text">
                        <?php foreach($passworderror as $showerror){
                                echo $showerror;
                            }?>
                        </div>
                        <?php
                    }
                    ?>
                        <?php 
            if(isset($_SESSION['count'])){?>
                   <div class="error_text">
           <?php echo $_SESSION['count'];?>
            </div>
            <?php } ?>
            <?php
            if(isset($_POST['address'])){
            echo '<input type="text" name="address" placeholder="Address" value="'.$address.'">';
             }
             else{
                echo '<input type="text" name="address" placeholder="Address" required>';
             } ?>
                <input type="submit" name="submit">
               
                </form>
                <?php 
                unset($_SESSION['count']);
                ?>
            </div>
                     <div class="button">
            <p>Already have an account?<a href="login.php"> Login here</a></p>
                </div>
                      </div>
                </div>
        </div>
            </div>
                 </div>
            </div>


        </div>
        <!--- End Form --->  
        <script type="text/javascript">
            
            function inputnumber(evt){

            var char = String.fromCharCode(evt.which);

            if(!(/[0-9]/.test(char))){
                evt.preventDefault();

            }
        }
        </script>
        <script type="text/javascript" src="js/form_slider.js"></script>
    </body>
</html>
