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
    <title>Purchase History</title>
    <link rel="stylesheet" href="../assets/tickets.css">
</head>

<body>
    <nav class="navbar">
        <div class="nav-container">
            <ul>
                <li><a href="profile.php">Profile</a></li>
                <li><a href="buy.php">Buy Ticket</a></li>
                <li><a href="#">Purchase History</a></li>
                <li><a href="../index.php">Logout</a></li>
            </ul>
        </div>
    </nav>
    <div class="profile-container">
        <div class="inner-container">
            <div class="title"><b>!!All The Tickets Bought!!</b></div>
            <div class="user-details">
                <table border="2">
                    <tr>
                        <th>Routes</th>
                        <th>Transaction Id</th>
                        <th>Purchase Date</th>
                    </tr>
                    <?php
                    require_once('../dbconnect.php');
                    $u = $_SESSION['username'];
                    $history = "SELECT route, transaction_id, tickets_date FROM purchase_history WHERE username='$u';";
                    $result = mysqli_query($conn, $history);
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_array($result)) {
                    ?>
                        <tr>
                            <td><div><?php echo $row[0]; ?></div></td>
                            <td><div><?php echo $row[1]; ?></div></td>
                            <td><div><?php echo $row[2]; ?></div></td>
                        </tr>
                    <?php
                        }
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>
</body>

</html>