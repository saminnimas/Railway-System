<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bangladesh Railway E-Ticket System</title>
    <link rel="stylesheet" href="assets/logandsign.css">
</head>

<body>
    <nav class="navbar">
        <div class="nav-container">
            <ul>
                <li><a href="index.php">Railway</a></li>
                <li><a href="#">Login</a></li>
                <li><a href="signup.php">Sign Up</a></li>
            </ul>
        </div>
    </nav>
    <div class="login-container">
        <div class="inner-container">
            <div class="title"><b>
                    <h2>Login To Buy Ticket</h2>
                </b></div>
            <form action="login.php" method="post">
                <div class="user-details">
                    <div class="input-box">
                        <label for="uname">Username:</label>
                        <input type="text" id="uname" name="user_name" placeholder="Enter Your Email or Username" required>
                    </div>

                    <div class="input-box">
                        <label for="pword">Password:</label>
                        <input type="password" id="pword" name="pass_word" placeholder="Enter your password" required>
                    </div>
                </div>
                <div class="button">
                    <input type="submit" value="Login">
                </div>
            </form>

            <p class="signup-text">New User? <a href="signup.php">Sign up here</a></p>
        </div>
    </div>
</body>

</html>

<?php
session_start();
// $lifetime=3600;
// session_start();
// setcookie(session_name(),session_id(),time()+$lifetime);
$_SESSION['x'] = false;
$_SESSION['y'] = false;

// echo $_SESSION['bfrom'].$_SESSION['bto'].$_SESSION['bdate'].$_SESSION['bclass'];
require_once('dbconnect.php');

if(isset($_POST['user_name']) && isset($_POST['pass_word'])){
    $u = $_POST['user_name'];
    $p = $_POST['pass_word'];
    $sql = "SELECT * FROM user WHERE username = '$u' AND password = '$p'";
    $query= "SELECT user_type FROM user WHERE username = '$u' AND password = '$p'";
    $result = mysqli_query($conn, $sql);
    $admin = mysqli_query($conn, $query);
    
    if(mysqli_num_rows($result) !=0 ){
        $check = mysqli_fetch_array($result);
        $user_type = mysqli_fetch_array($admin);

        if($user_type["user_type"] == 'admin') {
            $_SESSION['x'] = true;
            $_SESSION['username'] = $check['username'];
            $_SESSION['name'] = $check['name'];
            $_SESSION['email'] = $check['email'];
            $_SESSION['phone'] = $check['phone'];
            $_SESSION['pass'] = $check['password'];
            $_SESSION['discount'] = false;
            $_SESSION['acart'] = array();
            $_SESSION['atemp_cart'] = array();
            header("Location: admin_view/a_buy.php");
        }
        else {
            $_SESSION['y'] = true;
            $_SESSION['username'] = $check['username'];
            $_SESSION['name'] = $check['name'];
            $_SESSION['email'] = $check['email'];
            $_SESSION['phone'] = $check['phone'];
            $_SESSION['pass'] = $check['password'];
            $_SESSION['discount'] = false;
            $_SESSION['cart'] = array();
            $_SESSION['temp_cart'] = array();
            $_SESSION['ticket_num'] = 0;
            header("Location: user_admin/buy.php");
            // header("Location: temp.php");
        }
        // print_r($user_type);
        // header("Location: temp.php");
    }
    else{
        // wrong pass or user
        header("Location: index.php");
    }
    mysqli_close($conn);
}
?>