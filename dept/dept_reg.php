<?php
// Include config file
require_once "../config.php";
 
// Define variables and initialize with empty values
$department = $admin = $password = $confirm_password = "";
$department_err = $admin_err = $password_err = $confirm_password_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate department
    if(empty(trim($_POST["department"]))){
        $department_err = "Please enter your department.";
    } elseif(!preg_match('/^[a-zA-Z\s0-9_]+$/', trim($_POST["department"]))){
        $department_err = "Department should only contain letters, numbers, and spaces.";
    } else{
        $department = trim($_POST["department"]);
    }
    

    // Validate admin
    if(empty(trim($_POST["admin"]))){
        $admin_err = "Please enter a name.";
    } elseif(!preg_match('/^[a-zA-Z\s]+$/', trim($_POST["admin"]))){
        $admin_err = "Name can only contain letters and spaces.";
    } else{
        $admin = trim($_POST["admin"]);
    }
    

    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password must have at least 6 characters.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm password.";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }
    
    // Check input errors before inserting in database
    if(empty($department_err) && empty($admin_err) && empty($password_err) && empty($confirm_password_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO dept (department, admin, password) VALUES (?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sss", $param_department, $param_admin, $param_password);

            // Set parameters
            $param_department = $department;
            $param_admin = $admin;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: dept_login.php");
                exit();
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
    <title>Sign Up</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100..900;1,100..900&family=Poppins&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/bf172a1461.js" crossorigin="anonymous"></script>
    <style>
  
/* New Form Styles */
.formbold-main-wrapper{
    display: flex;
          align-items: center;
          justify-content: center;
          padding: 48px;
}
.formbold-form-wrapper {
          margin: 0 auto;
          max-width: 570px;
          width: 100%;
          background: white;
          padding: 40px;
        }
        .formbold-form-title {
          margin-bottom: 30px;
        }
        .formbold-form-title h2 {
          font-weight: 600;
          font-size: 28px;
          line-height: 34px;
          color: #07074d;
        }
        .formbold-input-flex {
          display: flex;
          gap: 20px;
          margin-bottom: 15px;
        }
        .formbold-input-flex > div {
          width: 50%;
        }
        .formbold-form-input {
          text-align: center;
          width: 100%;
          padding: 13px 22px;
          border-radius: 5px;
          border: 1px solid #dde3ec;
          background: #ffffff;
          font-weight: 500;
          font-size: 16px;
          color: #536387;
          outline: none;
          resize: none;
        }
        .formbold-form-input:focus {
          border-color: #6a64f1;
          box-shadow: 0px 3px 8px rgba(0, 0, 0, 0.05);
        }
        .formbold-form-label {
          color: #536387;
          font-size: 14px;
          line-height: 24px;
          display: block;
          margin-bottom: 10px;
        }
        .formbold-btn {
          font-size: 16px;
          border-radius: 5px;
          padding: 14px 25px;
          border: none;
          font-weight: 500;
          background-color: #6a64f1;
          color: white;
          cursor: pointer;
          margin-top: 25px;
        }
        .formbold-btn:hover {
          box-shadow: 0px 3px 8px rgba(0, 0, 0, 0.05);
        }
        .formbold-mb-3 {
          margin-bottom: 15px;
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
            <li><a href="dept/dept_reg.php">Dept</a></li>
            <li><a href="">Staff</a></li>            
            <li><a href="">Bursary</a></li>
        </ul>

        <div class="nav-btn">
        <a href="login.php" class="" id="log-btn">Login</a>
                <a href="register.php" class="main-btn" id="reg-btn">Register</a>

           <div  class="fa-solid fa-bars" id="menu-icon"></div>
        </div>
    </header>

    <section>
        <div class="formbold-main-wrappper">
            <div class="formbold-form-wrapper">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
    <div class="formbold-form-title">
        <h2 class=""> Dept Register</h2>
    </div>

    <div class="formbold-input-flex">
        <div>
            <label for="department" class="formbold-form-label">Department</label>
            <input type="text" name="department" id="department" class="formbold-form-input <?php echo (!empty($department_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $department; ?>" />
            <span class="invalid-feedback"><?php echo $department_err; ?></span>
        </div>
        <div>
            <label for="admin" class="formbold-form-label">Admin</label>
            <input type="text" name="admin" id="admin" class="formbold-form-input <?php echo (!empty($admin_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $admin; ?>" />
            <span class="invalid-feedback"><?php echo $admin_err; ?></span>
        </div>
    </div>

    <div class="formbold-input-flex">
        <div>
            <label for="password" class="formbold-form-label">Password</label>
            <input type="password" name="password" id="password" class="formbold-form-input <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" />
            <span class="invalid-feedback"><?php echo $password_err; ?></span>
        </div>
        <div>
            <label for="confirm_password" class="formbold-form-label">Confirm Password</label>
            <input type="password" name="confirm_password" id="confirm_password" class="formbold-form-input <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>" />
            <span class="invalid-feedback"><?php echo $confirm_password_err; ?></span>
        </div>
    </div>

    <input type="submit" name="submit" class="formbold-btn" value="Register">
    <p>Already Have an Account! <a href="dept_login.php">Login</a>.</p>     
</form>

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

    <script src="../app.js"></script>
</body>
</html>
