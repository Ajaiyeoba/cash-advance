<?php
// Initialize the session
session_start();
include '../config.php';

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: bursary_login.php");
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
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="../style.css">
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
            <li><a href="">Bursary</a></li>
        </ul>

        <div class="nav-btn">
            <a href="requestlist.php" class="main-btn">View Requests</a>
        <!-- <a href="login.php" class="" id="log-btn">Login</a>
        <a href="register.php" class="main-btn" id="reg-btn">Register</a> -->
          
        <div  class="fa-solid fa-bars" id="menu-icon"></div>
        </div>
    </header>

<section>

        <!-- <div class="request">
          <a href="" class>  <button>Request</button> </a>
        </div>
        <div class="confirm">
    <button>Confirm</button>
        </div> -->

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
                                    <th>Dispense</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
<?php 
        $sql = "SELECT * FROM staff_requests  where status = 'confirmed' ";
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
                                    $status = $_row['status'];
                                
                                
                                echo '
                                <tr> 
                                <td class="column1"> '.$id.'</td>
                                <td class="column1"> '.$name.'</td>
                                <td class="column1"> '.$amount.'</td>
                                <td class="column1"> '.$request.'</td>
                                <td class="column1"> '.$dept.'</td>
                                <td>
                                <a> <button> Dispense </button> </a>
                                </td>
                                </tr>
                                ';
                            } 
                            }
        ?>

</tbody>
</table>
</div>
</div>
</div>
</div>
</section>



<section>
    
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

            <
        </div>
    </section>

    <div class="end-text">
        <p> Copyright @2024. All Rghts Reserved</p>
    </div>
    <script src="../app.js"></script>
</body>
</html>

