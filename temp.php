!INGNOR THIS FILE! THIS IS USED FOR ONLY TEST PURPOSES

<!-- <?php
require_once('DBconnect.php');
$query= "SELECT user_type FROM user WHERE username = '$u' AND password = '$p'";
$admin = mysqli_query($conn, $query);
$user_type = mysqli_fetch_array($admin);
print_r($user_type);
?> -->

<?php

require_once('DBconnect.php');
if(isset($_POST['user_name']) && isset($_POST['pass_word'])){
    $u = $_POST['user_name'];
    $p = $_POST['pass_word'];
    $sql = "SELECT * FROM user WHERE username = '$u' AND password = '$p'";
    $query= "SELECT user_type FROM user WHERE username = '$u' AND password = '$p'";
    $result = mysqli_query($conn, $sql);
    $admin = mysqli_query($conn, $query);

    if(mysqli_num_rows($result) !=0 ){
        $user_type = mysqli_fetch_array($result);
        // if($user_type != 'admin') {
        //     // header("Location: user_admin/buy.php");
        //     header("Location: temp.php");
        // }
        // else {
        //     header("Location: admin_view/admin.php");
        // }
        print_r($user_type);
        echo "username -->", $user_type["username"];
        echo $_SESSION['y'];

        //echo "LET HIM ENTER";
    }
    else{
        //echo "Username or Password is wrong";
        header("Location: index.php");
    }

}
?>

<!-- !INGNOR THIS FILE! THIS IS USED FOR ONLY TEST PURPOSES -->

<!-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Railway</title>
    <link rel="stylesheet" href="assets/custom.css">
</head>

<body>
    <nav class="navbar">
        <div class="nav-container">
            <ul>
                <li><a href="#">Railway</a></li>
                <li><a href="login.php">Login</a></li>
                <li><a href="signup.php">Sign Up</a></li>
            </ul>
        </div>
    </nav>
    <div class="form-container">
        <div class="inner-container">
            <div class="title"><b>Check Available Trains</b></div>
            <form action="process.php" method="post">
                <div class="selected">
                    <div class="selected-op">
                        <span class="drname">From</span>
                        <select name="from">
                            <option value="Dhaka">Dhaka</option>
                            <option value="Chittagong">Chittagong</option>
                            <option value="Sylhet">Sylhet</option>
                        </select>
                    </div>

                    <div class="selected-op">
                        <span class="drname">To</span>
                        <select name="to">
                            <option value="Dhaka">Dhaka</option>
                            <option value="Chittagong">Chittagong</option>
                            <option value="Sylhet">Sylhet</option>
                        </select>
                    </div>

                    <div class="selected-date">
                        <span class="drname">Date</span>
                        <input type="date" name="date">
                    </div>

                    <div class="selected-op">
                        <span class="train_class">Train-Class</span>
                        <select name="train_class">
                            <option value="Shovon Chair">Shovon Chair</option>
                            <option value="AC Berth">AC Berth</option>
                            <option value="First Class">First Class</option>
                        </select>
                    </div>
                </div>
                <div class="button">
                    <input type="submit" value="Check Status">
                </div>
                <div class="button">
                    <input type="submit" value="Buy Ticket">
                </div>
            </form>
        </div>

    </div>
</body>

</html> -->

<?php
function route($src, $dst) {
    if($src == "Dewanganj"){
        $enroute = strtolower("$src[0]$src[1]$dst[0]");
    }
    elseif($dst == "Dewanganj"){
        $enroute = strtolower("$src[0]$dst[0]$dst[1]");
    }
    else{
        $enroute = strtolower("$src[0]$dst[0]");
    }
    
    $check = ["cd", "sd", "ld", "ded", "kd"];
    if($enroute == "cd" || $enroute == "sd" || $enroute == "ld" || $enroute == "kd"){
        $enroute = strtolower("$dst[0]$src[0] <br>");
    }
    elseif($enroute == "ded"){
        $enroute = strtolower("$dst[0]$src[0]$src[1]");
    }
    return $enroute;
}
// echo "<br>";
// $r = route("Dhaka","Dewanganj");
// echo $r;
// array_push($_SESSION['temp'], [$_SESSION['transaction_id'], $_SESSION['purchase_date']]);
// echo $_SESSION['transaction_id'];
// array_push($_SESSION['cart'], [$_SESSION['transaction_id'], $_SESSION['purchase_date']]);
// echo '<pre>';
// print_r($_SESSION['cart']);
// echo "</pre>";
session_start();
// echo "hey". $_SESSION['bfrom'].$_SESSION['bto'].$_SESSION['bdate'].$_SESSION['bclass'];
if(isset($_POST['goback'])){
    echo $_SESSION['transaction_id'];
    echo "<br>".$_SESSION['purchase_date'];
    array_push($_SESSION['cart'], [$_SESSION['transaction_id'], $_SESSION['purchase_date']]);
    
    echo '<pre>';
    print_r($_SESSION['cart']);
    echo "</pre>";
    $_SESSION['cart'] = array();
    $_SESSION['temp_cart'] = array();
    ?>
    <!-- <script>
        window.location.href = "user_admin/buy.php";
    </script> -->
    <a href="user_admin/buy.php">back</a>
    <?php
}
echo "buy more tickets";
?>