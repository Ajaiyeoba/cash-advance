<?php
// Initialize the session
session_start();
include '../config.php';

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: dept_login.php");
    exit;
}

if ($link->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="../style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100..900;1,100..900&family=Poppins&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/bf172a1461.js" crossorigin="anonymous"></script>
    <style>
       .crud-button {
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 10px 20px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
  border-radius: 5px;
}

.crud-button:hover {
  background-color: #45a049; /* Darker Green */
}

.crud-button.delete {
  background-color: #f44336; /* Red */
}

.crud-button.delete:hover {
  background-color: #da190b; /* Darker Red */
}
.flex-btn{
    display:flex;
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

        <h1 class="my-5">Hi! <b><?php echo htmlspecialchars($_SESSION["admin"]); ?></b> Welcome Back.  </h1>
        <h2>Confirm the Following Requests </h2>


        <div class="request">
        <div class="limter">
            <div class="container-table100">
                <div class="wrap-table100">
                    <div class="table100">
                        <table>
                            <thead>
                                <tr class="table100-head">
                                    <th>Id</th>
                                    <th>Staff Name </th>
                                    <th>Amount</th>
                                    <th>Request</th>
                                    <th>Department  </th>
                                    <th>Action</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                    <?php 

$sql = "SELECT * FROM staff_requests ";
$results = mysqli_query($link, $sql);

if (!$results) {
    die("Error: " . $sql . "<br>" . mysqli_error($link));
}

                    if(mysqli_num_rows($results) > 0){
                        while ($row = mysqli_fetch_assoc($results)) {
                            $id = $row['id'];
                            $name = $row['name'];
                            $amount = $row['amount'];
                            $request = $row['request'];
                            $dept = $row['dept'];
                    
                            echo '
                            <tr>
                                <td class="column1">' . $id . '</td>
                                <td class="column2">' . $name . '</td>
                                <td class="column3">' . $amount . '</td>
                                <td class="column4">' . $request . '</td>
                                <td class="column5">' . $dept . '</td>
                                <td class="flex-btn">
                                    <button class="crud-button"><a href="status_Accept.php?action=confirm&id=id">Confirm</a></button>
                                    <button class="crud-button delete"><a href="">Reject</a></button>
                                </td>
                                


                            </tr>
                            ';
                        }
                        //                                // confirm_script.php?action=confirm&id=ITEM_ID
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


    <div class="form-group">
    
        <a href="reset-password.php" class="btn btn-warning">Reset Your Password</a>
        <a href="../logout.php" class="btn  ">Sign Out of Your Account</a>
    

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
                <
