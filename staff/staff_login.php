<?php
// Initialize the session
session_start();

// Include config file
require_once "../config.php";

// Define variables and initialize with empty values
$staff_id = $password = "";
$staff_id_err = $password_err = $login_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if staff ID is empty
    if(empty(trim($_POST["staff_id"]))){
        $staff_id_err = "Please enter staff ID.";
    } else{
        $staff_id = trim($_POST["staff_id"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate credentials
    if(empty($staff_id_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT id, staff_id, username, password FROM users WHERE staff_id = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_staff_id);
            
            // Set parameters
            $param_staff_id = $staff_id;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if staff ID exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $staff_id, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username; // Store username in session
                            
                            // Redirect user to welcome page
                            header("location: welcome.php");
                        } else{
                            // Password is not valid, display a generic error message
                            $login_err = "Invalid username or password.";
                        }
                    }
                } else{
                    // Username doesn't exist, display a generic error message
                    $login_err = "Invalid username or password.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Close connection
    mysqli_close($link);
}
?>



 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="../style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100..900;1,100..900&family=Poppins&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/bf172a1461.js" crossorigin="anonymous"></script>
    <style>
        section{
        
        }
             .container{
    justify-content: center;
    background-color: #fff;
    border-radius: 5px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
    width: 400px;
    margin-top: 20px;
}
.container h2{
    text-align: center;
}
.container p{
    
    text-align: center
}

.header{
    border-bottom: 1px solid #f0f0f0;
    background-color: #fff;
    padding: 20px 40px;
}
form{
    padding: 30px 40px;
    display: block;
}
.form-group{
    margin-bottom: 10px;
    padding-bottom: 20px;
    position: relative;

}
.form-group label{
    display: inline-block;
    margin-bottom: 5px;
    font-family: cursive;
}
.form-group input{
    border: 2px solid #f0f0f0;
     border-radius: 4px;
    display: block;
    font-size: 14px;
    padding: 10px;
    width: 100%; 
}
.form-group input:focus{
    outline: 0;
    border-color: #777;
}
.btn{
    background: #551a8b;
    border: 2px solid #8e44ad;
    border-radius: 4px;
    color: #fff;
    display: block;
    font-family: cursive;
    font-size: 16px;
    padding: 10px;
    margin-top: 20px;
    width: 100%;
}
    </style>
</head>
<body>
    <header>
        <a href="" class="logo">
            <h2>FundWatch <i class="fa-light fa-comment-plus"></i></h2>
        </a>

        <ul class="navmenu">
            <li><a href="../index.html">Home</a></li>            
            <li><a href="">Dept</a></li>
            <li><a href="staff/staff_login.php">Staff</a></li>            
            <li><a href="">Bursary</a></li>
        </ul>
        <div class="nav-btn">
        <!-- <a href="login.php" class="" id="log-btn">Login</a>
                <a href="register.php" class="main-btn" id="reg-btn">Register</a> -->
           <div  class="fa-solid fa-bars" id="menu-icon"></div>
        </div>
    </header>


    <section class="">
        <div class="container">

        <div class="header">
        <h2>Staff Login </h2>
        </div>
        <p>Please fill in your credentials to login.</p>


    

        <?php 
        if(!empty($login_err)){
            echo '<div class="alert alert-danger">' . $login_err . '</div>';
        }        
        ?>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label>Staff ID</label>
                <input type="text" name="staff_id" class="form-control <?php echo (!empty($staff_id_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $staff_id; ?>">
                <span class="invalid-feedback"><?php echo $staff_id_err; ?></span>
            </div>    
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>">
                <span class="invalid-feedback"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Login">
            </div>
            <p>Don't have an account? <a href="staff_register.php">Sign up now</a>.</p>
        </form>
    </div>


    <section class="contact">
        <div class="contact-info">
            <div class="first-info">
                <a href="" class="logo">
                    <h2>TicketBritte</h2>
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
    <script src="../app.js"></script>
</body>
</html>
