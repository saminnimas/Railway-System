<?php
session_start();
// $lifetime=3600;
// session_start();
// setcookie(session_name(),session_id(),time()+$lifetime);
if(!$_SESSION['y']){
    header("Location: ../index.php");
}
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
                <li><a href="profile.php">Profile</a></li>
                <li><a href="buy.php">Buy Ticket</a></li>
                <li><a href="history.php">Purchase History</a></li>
                <li><a href="../logout.php">Logout</a></li>
            </ul>
        </div>
    </nav>
    <div class="profile-container">
        <div class="inner-container">
            <div class="title"><b><?php echo $_SESSION['name']?></b></div>
            <div class="user-details">
                <div class="details">
                    <p>Username: <?php echo $_SESSION['username']?></p>
                </div>
                    <p>Rewards Lefts:<?php echo" ".$_SESSION['reward_left'];?></p>
                <form action="process_profile.php" method="post">
                    <div class="button">
                        <input type="submit" value="Claim One" name="claim">
                    </div>
                    <div class="button">
                        <input type="submit" value="Back to Profile" name="b_profile">
                    </div>
                </form>
                
            </div>
        </div>

    </div>
</body>

</html>