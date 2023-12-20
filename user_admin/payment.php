<?php
session_start();
// $lifetime=3600;
// session_start();
// setcookie(session_name(),session_id(),time()+$lifetime);
if (!$_SESSION['y']) {
    header("Location: ../index.php");
}
?>

<!-- the payment page and procedure
    1. after going through buy.php the payment page will get all the values necessary to calculate amount (route and train_class) DONE
    2. the route shall derive from ticket table by validating the combination of "from and to" DONE
    3. populate the value from buy.php to an array; since i'm planning to cart system for different type purchases. DONE
    4. then use the array to extract only the amount index and add them. DONE
    5. finally use the array to insert 1 or more rows in the purchase_histroy table but use the only one transaction_id that will generate from this session. DONE


    NOTE: FIX THE HISTROY.CSS AFTER YOU'RE DONE WITH THIS PART. 
 -->

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
                <li><a href="profile.php">Profile</a></li>
                <li><a href="buy.php">Buy Ticket</a></li>
                <li><a href="history.php">Purchase History</a></li>
                <li><a href="../index.php">Logout</a></li>
            </ul>
        </div>
    </nav>
    <div class="profile-container">
        <div class="inner-container">
            <div class="title"><b>"!!USERS!!"</b></div>
            <div class="user-details">
                <form action="payment.php" method="post">
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
                        <?php if(count($_SESSION['temp_cart']) == 0){
                        ?>
                            <tr>
                                <td>1</td>
                                <td><div><?php echo $_SESSION['b_pfrom']; ?></div></td>
                                <td><div><?php echo $_SESSION['b_pto']; ?></div></td>
                                <td><div><?php echo $_SESSION['b_pclass']; ?></div></td>
                                <td><div><?php echo $_SESSION['b_pdate']; ?></div></td>
                                <td><div><?php echo $_SESSION['quantity']; ?></div></td>
                                <!-- <td><input type="submit" value="Remove" name="remove"></td> -->
                                <!-- <td><a href="process_payment.php?1"></a>Remove</td> -->
                            </tr>
                        <?php
                        }
                        else{
                            for($i = 0; $i < count($_SESSION['temp_cart']); $i++){
                                ?>
                                <tr>
                                    <td><?php echo $i+1;?></td>
                                    <td><div><?php echo $_SESSION['temp_cart'][$i][0]; ?></div></td>
                                    <td><div><?php echo $_SESSION['temp_cart'][$i][1]; ?></div></td>
                                    <td><div><?php echo $_SESSION['temp_cart'][$i][2]; ?></div></td>
                                    <td><div><?php echo $_SESSION['temp_cart'][$i][3]; ?></div></td>
                                    <td><div><?php echo $_SESSION['temp_cart'][$i][5]; ?></div></td>
                                    <!-- <td><input type="submit" value="Remove" name="remove"></td> -->
                                    <!-- <td><a href="process_payment.php?'.$_SESSION['ticket_num'].'">Remove</a></td> -->
                                </tr>
                            <?php
                            }
                        }
                        ?>
                    </table>
                    <div class="amount"><p style=text-align:center;><b>Amount:<?php echo $_SESSION['amount'];?></b></p></div>
                <div class="add_button">
                    <input type="submit" value="Add" name="add">
                </div>
                <div class="button">
                    <input type="submit" value="Checkout" name="checkout">
                </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
<?php
// ob_start();
if(isset($_POST['checkout'])){
    // array_push($_SESSION['temp'], $_SESSION['quantity']);
    array_push($_SESSION['cart'], $_SESSION['temp']);
    // header("Location: checkout.php");
    ?>
    <script>
        window.location.href = "checkout.php";
    </script>
    <?php
    // ob_end_flush();
}
if(isset($_POST['add'])){
    // $_SESSION['quantity'] = $_POST['quantity'];
    // array_push($_SESSION['temp'], $_SESSION['quantity']);
    // array_push($_SESSION['temp_cart'], $_SESSION['temp']);
    array_push($_SESSION['cart'], $_SESSION['temp']);
    ?>
    <script>
        window.location.href = "buy.php";
    </script>
    <?php
}
?>
<!-- Add the ticket remove feature ({reminder}: <a href="process_payment.php?idx=< ?php echo $theindex;?>Remove</a>") -->