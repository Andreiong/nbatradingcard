<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="stylesheet" href="css/sample.css">
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">
        <title>NBA Trading Card</title>
    </head>
    <body>
        <!---- NAVBAR ---->
            <div class="header">
                    <ul>
                        <li><a href="#"><i class="fa fa-bell" aria-hidden="true"></i>Notifications</a></li>
                        <li><a href="#"><i class="fa fa-question-circle" aria-hidden="true"></i>Help</a></li>
                        <li><a href="#">Sign up | Login</a></li>
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
               <img src="image/cart.png">
               </div>
           </div>
        </div>
         <div class="category">
            <ul>
             <li><a href="homepage.html">HOME</a></li>
            <li><a href="index.html">STORE</a></li>
             <li><a href="#">EATERN CONFERENCE</a></li>
             <li><a href="#">WEST CONFERENCE</a></li>
             <li><a href="#">LIMITED EDITION</a></li>
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
                <form>
                <input type="text" name="fname" placeholder="First Name">
                <input type="text" name="lname" placeholder="Last Name">
                 <input type="text" name="mnumber" placeholder="Mobile Number">
                 <input type="email" name="email" placeholder="Email">
                 <input type="password" name="password" placeholder="Password">
                 <input type="password" name="password" placeholder="Confirm Password">
                
                </form>
            </div>
                     <div class="button">
            <button onclick="next()">Next</button>
            <p>Already have an account?<a href=""> Login here</a></p>
                </div>
                      </div>
                </div>
        </div>
            </div>
                 </div>
            </div>
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
                <p>INFORMATION</p>
            <div class="signup-content">
                <form>
                 <input type="text" name="address" placeholder="Address">
                 <input type="text" name="city" placeholder="City">
                 <input type="text" name="street" placeholder="Street">
                 <input type="text" name="country" placeholder="Country">
                
                </form>
            </div>
                 <div class="button2">
                    <button onclick="next()">Back</button>
                    <button name="Signup" onclick="">Sign Up</button>
                </div>
                    <p class="second-text">Already have an account?<a href=""> Login here</a></p>
                      </div>
                </div>
        </div>
            </div>
                 </div>
            </div>
        </div>
        <!--- End Form --->  
        <script type="text/javascript" src="js/form_slider.js"></script>
    </body>
</html>