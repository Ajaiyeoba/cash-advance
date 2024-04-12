<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: bursary_login.php");
    exit;
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100..900;1,100..900&family=Poppins&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/bf172a1461.js" crossorigin="anonymous"></script>
    <style>    
    </style>
</head>
<body>
<header>

        <a href="" class="logo">
        <h2>FundWatch <i class="fa-light fa-comment-plus"></i></h2>
        </a>

        <ul class="navmenu">
            <li><a href="index.html">Home</a></li>            
            <li><a href="">Request</a></li>
            <li><a href="">About</a></li>       
            <li><a href="">Contact</a></li>
        </ul>

        <div class="nav-btn">
        <a href="login.php" class="" id="log-btn">Login</a>
        <a href="register.php" class="main-btn" id="reg-btn">Register</a>
          
        <div  class="fa-solid fa-bars" id="menu-icon"></div>
        </div>
    </header>

<section>
        <h1 class="my-5">Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Welcome Back.  </h1>
        <div class="request">
          <a href="" class>  <button>Request</button> </a>
        </div>
        <div class="confirm">
    <button>Confirm</button>
        </div>


    <!-- <div class="container">
    <div class="request">
            <h2>Make A Request</h2>

            <form action="">
                <div class="form-group">
                    <label for="">Title</label>
                    <input type="text" name="" id="">
                    <span ></span>
                </div>
                <div class="form-group">
                    <label for="">Amount</label>
                    <input type="number" name="" id="">
                    <span ></span>
                </div>
                <div class="form-group">
                    <label for="">Date </label>
                    <input type="date" name="" id="">
                    <span ></span>
                </div>

                <div class="form-group">
                    <label for="">Category</label>
                    <input type="text" name="" id="">
                    <span ></span>
                </div>

                <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
</div>
            </form>
        </div>
    </div>
         -->
    
    <div class="form-group">
    
        <a href="reset-password.php" class="btn btn-warning">Reset Your Password</a>
        <a href="logout.php" class="btn  ">Sign Out of Your Account</a>
    

    </div>     
</section>
   



    <section class="contact">
        <div class="contact-info">
            <div class="first-info">
                <a href="" class="logo">
                <h2>FundWatch <i class="fa-light fa-comment-plus"></i></h2>
                </a>
                <p>Oyo State Nigeria</p>
                <p>08052148610</p>
                <p>ajaiyeobajibola@gmail.com</p>
                <div class="social-icon">
                    <a href=""><i class="fa-brands fa-facebook"></i></a>
                    <a href=""><i class="fa-brands fa-twitter"></i></a>
                    <a href=""><i class="fa-brands fa-instagram"></i></a>
                    <a href=""><i class="fa-brands fa-tiktok"></i></a>
                    <a href=""></a>
                </div>
            </div>

            <div class="second-info">
                <h4>Support</h4>
                <p>Support</p>
                <p>Support</p>
                <p>Support</p>
                <p>Support</p>
            </div>

            <div class="third-info">
                <h4>Cart</h4>
                <p>Support</p>
                <p>Support</p>
                <p>Support</p>
                <p>Support</p>
            </div>
            <div class="fourth-info">
                <h4 href="register.php"> <a href="register.php">Company</a> </h4>
                <p>Support</p>
                <p>Support</p>
                <p>Support</p>
                <p>Support</p>
            </div>

            <div class="five-info">
                <h4>Support</h4>
                <p>Support</p>
                <p>Support</p>
                <p>Support</p>
                <p>Support</p>
            </div>
        </div>
    </section>

    <div class="end-text">
        <p> Copyright @2024. All Rghts Reserved</p>
    </div>
    <script src="app.js"></script>
</body>
</html>

