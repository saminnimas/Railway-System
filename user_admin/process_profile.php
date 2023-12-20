<?php
session_start();

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

function retrieve_from_rewards($conn, $usern){
    $check_cached = "SELECT purchase_tracker FROM rewards WHERE username = '$usern';";
    $tracker_result = mysqli_query($conn, $check_cached);
    $search_row = mysqli_fetch_array($tracker_result);
    $tracker = $search_row['purchase_tracker'];
    return $tracker;
}

function update_rewards($conn, $usern, $new_cache){
    $update_cached = "UPDATE rewards SET purchase_tracker = $new_cache WHERE username = '$usern';";
    mysqli_query($conn, $update_cached);
}
if(isset($_POST['reward_check'])){
    $p_cache = retrieve_from_rewards($conn, $_SESSION['username']);
    $_SESSION['pu_cache'] = $p_cache;
    $mod_cache = $p_cache % 5;
    $rewards_left = ($p_cache - $mod_cache) / 5;
    $_SESSION['reward_left'] = $rewards_left;
    // echo $_SESSION['reward_left'];
    ?>
    <script>
        window.location.href = "rewards.php";
    </script>
    <?php
}
if(isset($_POST['update_p'])){
    ?>
    <script>
        window.location.href = "update_user.php";
    </script>
    <?php
}
if(isset($_POST['claim'])){
    if($_SESSION['pu_cache'] >= 5){
        $_SESSION['discount'] = true;
        $_SESSION['pu_cache'] -= 5;
        $_SESSION['reward_left'] -= 1;
    update_rewards($conn, $_SESSION['username'], $_SESSION['pu_cache']);
    }
    else{
        ?>
        <script>
            window.location.href = "norewardsleft.php";
        </script>
        <?php
    }
    ?>
    <script>
        window.location.href = "rewards.php";
    </script>
    <?php
}
if(isset($_POST['b_profile'])){
    ?>
    <script>
        window.location.href = "profile.php";
    </script>
    <?php
    // header("Location: rewards.php");
}
?>