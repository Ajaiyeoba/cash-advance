<?php
    session_start();
include '../config.php';

    $id = $_GET['updateid'];
    $sql = "SELECT * FROM  staff_requests  where id=$id";
    $results = mysqli_query($link, $sql);
    $row = mysqli_fetch_assoc($results);
    $name = $row['name'];
    $amount = $row['amount'];
    $request = $row['request'];
    $dept = $row['dept'];
        if(isset($_POST['submit'])) {
            $name = $_POST['name'];
            $amount = $_POST['amount'];
            $request = $_POST['request'];
            $dept = $_POST['dept'];

            $sql = "UPDATE staff_requests SET name=?, amount=?, request=?, dept=? WHERE id=?";
            $stmt  = $link -> prepare($sql);
            $stmt  -> bind_param("sissi", $name, $amount, $request, $dept, $id);

            if ($stmt->execute()) {
                // Redirect to display.php after successful update
                header('location: staff_display.php');
                exit(); // Terminate script after redirection
            } else {
                die("Error: " . $sql . "<br>" . $conn->error);
            }
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
        .formbold-form-title p {
          font-size: 16px;
          line-height: 24px;
          color: #536387;
          margin-top: 12px;
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
            <li><a href="">Dept</a></li>
            <li><a href="staff/staff_login.php">Staff</a></li>            
            <li><a href="">Bursary</a></li>
        </ul>
        <div class="nav-btn">
           <div  class="fa-solid fa-bars" id="menu-icon"></div>
        </div>
    </header>

        <section>
        <h1 class="my-5">Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Welcome Back.  </h1>

      
        <div class="formbold-main-wrapper">

       
        <div class="formbold-form-wrapper">
            <form action=" "  method="POST">
            <div class="formbold-form-title">
              <h2 class="">Request now</h2>
              <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                eiusmod tempor incididunt.
              </p>
            </div>


            <div class="formbold-input-flex">
            <div>
                <label for="firstname" class="formbold-form-label">
                  Name
                </label>
                <input
                    type="text"
                    name="name"
                    id="name"
                    class="formbold-form-input"
                    value="<?php echo htmlspecialchars($name); ?>"
                />
              </div>
              <div>
                <label for="amount" class="formbold-form-label">
                  Amount
                </label>
                <input
                    type="number"
                    name="amount"
                    id="amount"
                    class="formbold-form-input"
                    value="<?php echo htmlspecialchars($amount); ?>"
                />
              </div>
            </div>

            <div class="formbold-mb-3">
            <div>
                <label for="firstname" class="formbold-form-label">
                  Request
                </label>
                <input
                    type="text"
                    name="request"
                    id="name"
                    class="formbold-form-input"
                    value="<?php echo htmlspecialchars($request); ?>"
                />
              </div>
    </div>
              <div class="formbold-mb-3">
              <label for="dept" class="formbold-form-label">
                Department
              </label>
              <input
                type="text"
                name="dept"
                id="dept"
                class="formbold-form-input"
                value="<?php echo htmlspecialchars($dept); ?>"
              />
            </div>
        
            <input type="submit" name="submit" class="formbold-btn" value="Update Request">
              </div>
            


            </form>
        </div>
        </div>
    </section>

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
