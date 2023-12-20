<?php
session_start();
if(!$_SESSION['x']){
    header("Location: ../index.php");
}
$_SESSION['atemp'] = array();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../assets/custom.css">
</head>

<body>
    <nav class="navbar">
        <div class="nav-container">
            <ul>
                <li><a href="a_profile.php">Profile</a></li>
                <li><a href="#">Buy Ticket</a></li>
                <li><a href="a_history.php">Purchase History</a></li>
                <li><a href="users.php">See Users</a></li>
                <li><a href="tickets.php">Modify Prices</a></li>
                <li class="onleft"><a href="../logout.php">Logout</a></li>
            </ul>
        </div>
    </nav>
    <div class="form-container">
        <div class="inner-container">
            <div class="title"><b>Check Available Trains</b></div>
            <form action="a_process_pay.php" method="post">
                <div class="selected">
                    <div class="selected-op">
                        <span class="drname">From</span>
                        <select name="a_buy_from">
                            <option value="Dhaka" <?php if(isset($_SESSION['bfrom'])) {if ($_SESSION['bfrom'] === 'Dhaka') {echo 'selected';}}?>>Dhaka</option>
                            <option value="Chittagong" <?php if(isset($_SESSION['bfrom'])) {if ($_SESSION['bfrom'] === 'Chittagong') {echo 'selected';}}?>>Chittagong</option>
                            <option value="Sylhet" <?php if(isset($_SESSION['bfrom'])) {if ($_SESSION['bfrom'] === 'Sylhet') {echo 'selected';}}?>>Sylhet</option>
                            <option value="Lalmonirhat" <?php if(isset($_SESSION['bfrom'])) {if ($_SESSION['bfrom'] === 'Lalmonirhat') {echo 'selected';}}?>>Lalmonirhat</option>
                            <option value="Dewanganj" <?php if(isset($_SESSION['bfrom'])) {if ($_SESSION['bfrom'] === 'Dewanganj') {echo 'selected';}}?>>Dewanganj</option>
                            <option value="Khulna" <?php if(isset($_SESSION['bfrom'])) {if ($_SESSION['bfrom'] === 'Khulna') {echo 'selected';}}?>>Khulna</option>
                        </select>
                    </div>

                    <div class="selected-op">
                        <span class="drname">To</span>
                        <select name="a_buy_to">
                            <option value="Dhaka" <?php if(isset($_SESSION['bto'])) {if ($_SESSION['bto'] === 'Dhaka') {echo 'selected';}} ?>>Dhaka</option>
                            <option value="Chittagong" <?php if(isset($_SESSION['bto'])) {if ($_SESSION['bto'] === 'Chittagong') {echo 'selected';}}?>>Chittagong</option>
                            <option value="Sylhet" <?php if(isset($_SESSION['bto'])) {if ($_SESSION['bto'] === 'Sylhet') {echo 'selected';}}?>>Sylhet</option>
                            <option value="Lalmonirhat" <?php if(isset($_SESSION['bto'])) {if ($_SESSION['bto'] === 'Lalmonirhat') {echo 'selected';}}?>>Lalmonirhat</option>
                            <option value="Dewanganj" <?php if(isset($_SESSION['bto'])) {if ($_SESSION['bto'] === 'Dewanganj') {echo 'selected';}}?>>Dewanganj</option>
                            <option value="Khulna" <?php if(isset($_SESSION['bto'])) {if ($_SESSION['bto'] === 'Khulna') {echo 'selected';}}?>>Khulna</option>
                        </select>
                    </div>

                    <div class="selected-date">
                        <span class="drname">Date</span>
                        <input type="date" name="a_date">
                    </div>

                    <div class="selected-op">
                        <span class="drname">Train-Class</span>
                        <select name="a_train_class">
                            <option value="Shovon Chair" <?php if(isset($_SESSION['bclass'])) {if ($_SESSION['bclass'] === 'Shovon Chair') {echo 'selected';}}?>>Shovon Chair</option>
                            <option value="AC Chair" <?php if(isset($_SESSION['bclass'])) {if ($_SESSION['bclass'] === 'AC Chair') {echo 'selected';}}?>>AC Chair</option>
                            <option value="AC Berth" <?php if(isset($_SESSION['bclass'])) {if ($_SESSION['bclass'] === 'AC Berth') {echo 'selected';}}?>>AC Berth</option>
                            <option value="Sleeper Coach" <?php if(isset($_SESSION['bclass'])) {if ($_SESSION['bclass'] === 'Sleeper Coach') {echo 'selected';}}?>>Sleeper Coach</option>
                            <option value="First Class" <?php if(isset($_SESSION['bclass'])) {if ($_SESSION['bclass'] === 'First Class') {echo 'selected';}}?>>First Class</option>
                        </select>
                    </div>
                    <div class="selected-op">
                        <span class="drname">Number of ticket/tickets: </span>
                        <input type="number" name="a_quantity" value="1" min="1" max="20">
                    </div>
                </div>
                <div class="button">
                    <input type="submit" value="Check Status" name="a_check_status">
                </div>
                <div class="button">
                    <input type="submit" value="Buy Ticket" name="a_buy_ticket">
                </div>
            </form>
        </div>

    </div>
</body>

</html>