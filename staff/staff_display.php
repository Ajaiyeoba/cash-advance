<?php
include '../config.php'; // Make sure this line includes the correct path to config.php

// Check if connection to database is successful
if ($link->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM staff_requests";
$results = mysqli_query($link, $sql);

if (!$results) {
    die("Error: " . $sql . "<br>" . mysqli_error($link));
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100..900;1,100..900&family=Poppins&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/bf172a1461.js" crossorigin="anonymous"></script>
</head>
<style>
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
<body>
   

    <header>
        <a href="" class="logo">
            <h2>FundWatch</h2>  <i class="fa-solid fa-comment-plus"></i>
        </a>

        <ul class="navmenu">
            <li><a href="../index.html">Home</a></li>            
            <li><a href="dept/dept_login.php">Dept</a></li>
            <li><a href="staff_login.php">Staff</a></li>            
            <li><a href=".bursary/bursary_login.php">Bursary</a></li>

        </ul>

        <div class="nav-btn">

                <a href="login.php" class="" id="log-btn">Login</a>
                <a href="register.php" class="main-btn" id="reg-btn">Register</a>
            <!-- <a href="" class="main-btn"><i class="fa-solid fa-magnifying-glass"></i>Login</a>
            <a href="" class="main-btn"><i class="fa-solid fa-magnifying-glass"></i>Register</a> -->

           <div  class="fa-solid fa-bars" id="menu-icon">H</div>
        </div>
    </header>
    <section> 

        <div class="limter">
            <div class="container-table100">
                <div class="wrap-table100">
                    <div class="table100">
                        <table>
                            <thead>
                                <tr class="table100-head">
                                    <th>Id</th>
                                    <th>Name </th>
                                    <th>Amount</th>
                                    <th>Request</th>
                                    <th>Department  </th>
                                    <th>Operatons</th>
                                    <th>status</th>
                                </tr>
                            </thead>
                            <tbody>
<?php
                                if (mysqli_num_rows($results) > 0) {
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
                                                    <button class="crud-button"><a href="update.php?updateid='. $id .' ">Update</a></button>
                                                    <button class="crud-button delete"><a href="delete.php?deleteid='. $id.'">Delete</a></button>
                                                </td>

                                                <td class="column5">Pending</td>
                                            </tr>';
                                        
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
        <a href="staff_request.php">
            <button class="formbold-btn">
                Make Request
            </button>


            <a href="staff_accept.php">
                <button class="formbold-btn"> View Confirmed Request</button>
            </a>
        </a>
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
    <script src="../app.js"> </script> 
</body>
</html>