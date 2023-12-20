<?php
session_start();
// $lifetime=3600;
// session_start();
// setcookie(session_name(),session_id(),time()+$lifetime);
if(!$_SESSION['y']){
    header("Location: ../index.php");
}
require_once('../dbconnect.php');

function calculate_purchases($conn, $usern){
    $check_transactions = "SELECT COUNT(transaction_id) as purchases, username FROM purchase_history WHERE username = '$usern';";
    $purchases_result = mysqli_query($conn, $check_transactions);
    $search_row = mysqli_fetch_array($purchases_result);
    $cache_purchase = $search_row['purchases'];
    return $cache_purchase;
}

$render_purchases = calculate_purchases($conn, $_SESSION['username']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../assets/profile.css">
</head>

<body>
    <nav class="navbar">
        <div class="nav-container">
            <ul>
                <li><a href="#">Profile</a></li>
                <li><a href="buy.php">Buy Ticket</a></li>
                <li><a href="history.php">Purchase History</a></li>
                <li><a href="../logout.php">Logout</a></li>
            </ul>
        </div>
    </nav>
    <div class="profile-container">
        <div class="inner-container">
            <div class="title"><b><?php echo $_SESSION['name'];?></b></div>
            <div class="user-details">
                <div class="details">
                    <p>Username: <?php echo $_SESSION['username'];?></p>
                </div>
                <div class="details">
                    <p>Email: <?php echo $_SESSION['email'];?></p>
                </div>
                <div class="details">
                    <p>Phone: <?php echo $_SESSION['phone'];?></p>
                </div>
                <div class="details">
                    <p>Total Purchases:<?php echo " ".$render_purchases.' ';?>(For 5 transactions reward will be granted!!)</p>
                </div>
            </div>
            <form action="process_profile.php" method="post">
                <div class="button">
                    <input type="submit" value="Check Rewards" name="reward_check">
                </div>
                <div class="button">
                    <input type="submit" value="Update Profile" name="update_p">
                </div>
            </form>
        </div>

    </div>
</body>

</html>
