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
    <link rel="stylesheet" href="../assets/tickets.css">
</head>

<body>
    <nav class="navbar">
        <div class="nav-container">
            <ul>
                <li><a href="a_profile.php">Profile</a></li>
                <li><a href="a_buy.php">Buy Ticket</a></li>
                <li><a href="a_history.php">Purchase History</a></li>
                <li><a href="users.php">See Users</a></li>
                <li><a href="#">Modify Prices</a></li>
                <li class="onleft"><a href="../logout.php">Logout</a></li>
            </ul>
        </div>
    </nav>
    <div class="profile-container">
        <div class="inner-container">
            <div class="title"><b>TICKET PRICINGS</b></div>
            <div class="user-details">
                <table border="2">
                    <tr>
                        <th>Routes</th>
                        <th>Source</th>
                        <th>Destination</th>
                        <th>Price</th>
                    </tr>
                    <?php
                    require_once('../dbconnect.php');
                    $show_ticket = "SELECT * FROM ticket";
                    // echo $sql;
                    $result = mysqli_query($conn, $show_ticket);

                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_array($result)) {
                    ?>
                        <tr>
                            <td><div><?php echo $row[0]; ?></div></td>
                            <td><div><?php echo $row[1]; ?></div></td>
                            <td><div><?php echo $row[2]; ?></div></td>
                            <td><div><?php echo $row[3]; ?></div></td>
                        </tr>
                    <?php
                        }
                    }
                    ?>
                </table>
                <form action="tickets.php" method="post">
                    <div class="inputs">Route : <input type="text" name="route" required></div>
                    <div class="inputs">Source :<input type="text" name="Source" required></div>
                    <div class="inputs">Destination:<input type="text" name="Destination" required></div>
                    <div class="inputs">New Price:<input type="number" name="price" required></div>                    
                    <div class="button"><input type="submit" name="update" value="Update Data" onclick="myFunction()"></div>

                </form>
            </div>
        </div>
    </div>
</body>

</html>

<?php
require_once('../dbconnect.php');
// php code to Update data from mysql database Table

if (isset($_POST['update'])) {
    $route = $_POST['route'];
    $Source = $_POST['Source'];
    $Destination = $_POST['Destination'];
    $price = $_POST['price'];

    // mysql query to Update data
    $sql = "SELECT * FROM ticket where route='$route'";
    $query = "UPDATE ticket SET ticket_price='$price' WHERE route='$route'";

    $check = mysqli_query($conn, $sql);
    $result = mysqli_query($conn, $query);
    $effected = mysqli_num_rows($check);
    // echo $effected;

    if ($effected) {
        ?>
        <script>
        function myFunction() {
        alert('Data Updated');
        }
        </script>
        <?php
    } else {
        ?>
        <script>
        function myFunction() {
        alert('!!Data Not Updated!!');
        }
        </script>
        <?php
        // echo "data not updated";
    }
    mysqli_close($conn);
}

?>