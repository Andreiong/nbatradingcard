
<?php require_once "includes/signup.inc.php";
?>


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
            <div class="slide-container">
        <div class="slide">
        <div class="content">
        <div class="content-container">
            <div class="left-content1">
                <div class="left">
            
            </div>
                </div>
            <div class="right-content">
                <div class="right">
                <img src="image/LOGO.png">
                <p>LOGIN</p>
               <?php if(count($error) >= 1) { ?>
                <div class="error"> 
                    <p>
                    <?php foreach ($error as $showerror) {
                        echo $showerror; }?>
                    </p>
            
                </div class="eror">
            <?php }?>

            <div class="signup-content">
                
                <form action="login.php" method="post">
                  
                    <?php if (isset($_POST['email_login'])) {
                    echo '<input type="email" name="email_login" placeholder="Email" value="'.$email_login.'">';
                } else{
                    echo'<input type="email" name="email_login" placeholder="Email" required="">';
                }?>
                 
                 <input type="password" name="password_login" placeholder="Password" required="">
                 <input type="submit" name="login">
                </form>
            </div>
                    <p class="second-text">Don't have an account?<a href="register.php"> SignUp here</a></p>
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
