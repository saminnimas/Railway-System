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
    <link rel="stylesheet" href="../assets/payment.css">
</head>

<body>
    <nav class="navbar">
        <div class="nav-container">
            <ul>
                <li><a href="a_profile.php">Profile</a></li>
                <li><a href="a_buy.php">Buy Ticket</a></li>
                <li><a href="a_history.php">Purchase History</a></li>
                <li><a href="users.php">See Users</a></li>
                <li><a href="tickets.php">Modify Prices</a></li>
                <li class="onleft"><a href="../logout.php">Logout</a></li>
            </ul>
        </div>
    </nav>
    <div class="profile-container">
        <div class="inner-container">
            <div class="title"><b>"!!USERS!!"</b></div>
            <div class="user-details">
                <form action="a_payment.php" method="post">
                    <table border="2">
                        <tr>
                            <th>Ticket No.</th>
                            <th>From</th>
                            <th>To</th>
                            <th>Train Class</th>
                            <th>Date</th>
                            <th>Number of Tickets</th>
                            <!-- <th>remove</th> -->
                        </tr>
                        <?php if(count($_SESSION['atemp_cart']) == 0){
                        ?>
                            <tr>
                                <td>1</td>
                                <td><div><?php echo $_SESSION['ab_pfrom']; ?></div></td>
                                <td><div><?php echo $_SESSION['ab_pto']; ?></div></td>
                                <td><div><?php echo $_SESSION['ab_pclass']; ?></div></td>
                                <td><div><?php echo $_SESSION['ab_pdate']; ?></div></td>
                                <td><div><?php echo $_SESSION['aquantity']; ?></div></td>
                                <!-- <td><input type="submit" value="Remove" name="remove"></td> -->
                                <!-- <td><a href="process_payment.php?1"></a>Remove</td> -->
                            </tr>
                        <?php
                        }
                        else{
                            for($i = 0; $i < count($_SESSION['atemp_cart']); $i++){
                                ?>
                                <tr>
                                    <td><?php echo $i+1;?></td>
                                    <td><div><?php echo $_SESSION['atemp_cart'][$i][0]; ?></div></td>
                                    <td><div><?php echo $_SESSION['atemp_cart'][$i][1]; ?></div></td>
                                    <td><div><?php echo $_SESSION['atemp_cart'][$i][2]; ?></div></td>
                                    <td><div><?php echo $_SESSION['atemp_cart'][$i][3]; ?></div></td>
                                    <td><div><?php echo $_SESSION['atemp_cart'][$i][5]; ?></div></td>
                                    <!-- <td><input type="submit" value="Remove" name="remove"></td> -->
                                    <!-- <td><a href="process_payment.php?'.$_SESSION['ticket_num'].'">Remove</a></td> -->
                                </tr>
                            <?php
                            }
                        }
                        ?>
                    </table>
                    <div class="amount"><p style=text-align:center;><b>Amount:<?php echo $_SESSION['a_amount'];?></b></p></div>
                <div class="add_button">
                    <input type="submit" value="Add" name="a_add">
                </div>
                <div class="button">
                    <input type="submit" value="Checkout" name="a_checkout">
                </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
<?php
// ob_start();
if(isset($_POST['a_checkout'])){
    // array_push($_SESSION['temp'], $_SESSION['quantity']);
    array_push($_SESSION['acart'], $_SESSION['atemp']);
    // header("Location: checkout.php");
    ?>
    <script>
        window.location.href = "a_checkout.php";
    </script>
    <?php
    // ob_end_flush();
}
if(isset($_POST['a_add'])){
    // $_SESSION['quantity'] = $_POST['quantity'];
    // array_push($_SESSION['temp'], $_SESSION['quantity']);
    // array_push($_SESSION['temp_cart'], $_SESSION['temp']);
    array_push($_SESSION['acart'], $_SESSION['atemp']);
    ?>
    <script>
        window.location.href = "a_buy.php";
    </script>
    <?php
}
?>
<!-- Add the ticket remove feature ({reminder}: <a href="process_payment.php?idx=< ?php echo $theindex;?>Remove</a>") -->