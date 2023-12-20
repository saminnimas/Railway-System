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
            <div class="title"><b><?php echo $_SESSION['name']?></b></div>
            <div class="user-details">
                <form action="update_user.php" method="post">
                    <label for="field1">New Phone Number:</label>
                    <input type="text" name="new_phone_number" id="field1">
                    <input type="checkbox" name="updateFields[]" value="new_phone_number"> Change Phone number<br>

                    <label for="field2">New Email:</label>
                    <input type="text" name="new_email" id="field2">
                    <input type="checkbox" name="updateFields[]" value="new_email"> Change Email<br>

                    <label for="field3">New Password:</label>
                    <input type="text" name="new_password" id="field3">
                    <input type="checkbox" name="updateFields[]" value="new_password"> Change Password<br>

                    <div class="button">
                        <input type="submit" value="Update" name="update">
                        <!-- <a href="rewards.php">reward</a> -->
                    </div>
                    <div class="button">
                        <input type="submit" value="Back To Profile" name="prof">
                        <!-- <a href="rewards.php">reward</a> -->
                    </div>
                </form>
            </div>
        </div>

    </div>
</body>

</html>
<?php
if(!empty($_POST['updateFields'][0]) || !empty($_POST['updateFields'][1]) || !empty($_POST['updateFields'][2])){
    if(isset($_POST['update'])){
        $uname = $_SESSION['username'];
        foreach ($_POST['updateFields'] as $field) {
            $valueToUpdate = $field; // Assuming the text fields have the same names as the checkboxes
            if($valueToUpdate == 'new_phone_number'){
                // echo "do something 0 ".$valueToUpdate."=>".$_POST[$valueToUpdate];
                $update_query = "UPDATE user SET phone = '$_POST[$valueToUpdate]' WHERE username = '$uname';";
                mysqli_query($conn, $update_query);
                $_SESSION['phone'] = $_POST[$valueToUpdate];
            }
            if($valueToUpdate == 'new_email'){
                // echo "<br>do something 1 ".$valueToUpdate."=>".$_POST[$valueToUpdate];
                $update_query = "UPDATE user SET email = '$_POST[$valueToUpdate]' WHERE username = '$uname';";
                mysqli_query($conn, $update_query);
                $_SESSION['email'] = $_POST[$valueToUpdate];
            }
            if($valueToUpdate == 'new_password'){
                $update_query = "UPDATE user SET password = '$_POST[$valueToUpdate]' WHERE username = '$uname';";
                mysqli_query($conn, $update_query);
                // $_SESSION['phone'] = $_POST[$valueToUpdate];
                // echo "<br>do something 3 ".$valueToUpdate."=>".$_POST[$valueToUpdate];
            }
            // echo $valueToUpdate."<br>";
            // echo $_POST[$valueToUpdate]."<br>";
        }
    }
}

else{
    echo 'Nothing Was Changed';
}
if(isset($_POST['prof'])){
    ?>
        <script>
            window.location.href = "profile.php";
        </script>
        <?php
}
?>