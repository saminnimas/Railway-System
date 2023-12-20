<?php
session_start();
if (!$_SESSION['x']) {
    header("Location: ../index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../assets/users.css">
</head>

<body>
    <nav class="navbar">
        <div class="nav-container">
            <ul>
                <li><a href="a_profile.php">Profile</a></li>
                <li><a href="a_buy.php">Buy Ticket</a></li>
                <li><a href="a_history.php">Purchase History</a></li>
                <li><a href="#">See Users</a></li>
                <li><a href="tickets.php">Modify Prices</a></li>
                <li class="onleft"><a href="../logout.php">Logout</a></li>
            </ul>
        </div>
    </nav>
    <div class="profile-container">
        <div class="inner-container">
            <div class="title"><b>"!!USERS!!"</b></div>
            <div class="user-details">
                <table border="2">
                    <tr>
                        <th>Username</th>
                        <th>Password</th>
                        <th>Email</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>User Type</th>
                    </tr>
                    <?php
                    require_once('../dbconnect.php');
                    $sql = "SELECT * FROM user";
                    // echo $sql;
                    $result = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_array($result)) {
                    ?>
                        <tr>
                            <td><div><?php echo $row[0]; ?></div></td>
                            <td><div><?php echo $row[1]; ?></div></td>
                            <td><div><?php echo $row[2]; ?></div></td>
                            <td><div><?php echo $row[3]; ?></div></td>
                            <td><div><?php echo $row[4]; ?></div></td>
                            <td><div><?php echo $row[5]; ?></div></td>
                        </tr>
                    <?php
                        }
                        mysqli_close($conn);
                    }
                    ?>

                </table>
            </div>
        </div>
    </div>
</body>

</html>