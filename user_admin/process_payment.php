<?php
session_start();
// $lifetime=3600;
// session_start();
// setcookie(session_name(),session_id(),time()+$lifetime);
if(!$_SESSION['y']){
    header("Location: ../index.php");
}
require_once("../dbconnect.php");

function filter_route_name($src, $dst) {
    if($src == "Dewanganj"){
        $enroute = strtolower("$src[0]$src[1]$dst[0]");
    }
    elseif($dst == "Dewanganj"){
        $enroute = strtolower("$src[0]$dst[0]$dst[1]");
    }
    else{
        $enroute = strtolower("$src[0]$dst[0]");
    }
    
    $check = ["cd", "sd", "ld", "ded", "kd"];
    if($enroute == "cd" || $enroute == "sd" || $enroute == "ld" || $enroute == "kd"){
        $enroute = strtolower("$dst[0]$src[0]");
    }
    elseif($enroute == "ded"){
        $enroute = strtolower("$dst[0]$src[0]$src[1]");
    }
    return $enroute;
}

function amount_calculator($train_cls, $rou_te, $conn){
    if($train_cls == "Shovon Chair"){
        $train_cls = "shovon_chair";
    }
    elseif($train_cls == "AC Chair"){
        $train_cls = "ac_chair";
    }
    elseif($train_cls == "AC Berth"){
        $train_cls = "ac_berth";
    }
    elseif($train_cls == "Sleeper Coach"){
        $train_cls = "sleeper_coach";
    }
    elseif($train_cls == "First Class"){
        $train_cls = "first_class";
    }
    $join_query = "SELECT $train_cls.price + ticket.ticket_price as total_amount from (($train_cls INNER JOIN calculate ON $train_cls.train_name = calculate.train_name) 
    INNER JOIN ticket ON ticket.route = calculate.route) WHERE ticket.route = '$rou_te';";

    $conn_join = mysqli_query($conn, $join_query);
    $price = mysqli_fetch_array($conn_join);
    $amount = $price['total_amount'];
    return $amount;
}

if(isset($_POST['buy_ticket'])){
    $_SESSION['b_pfrom'] = $_POST['buy_from'];
    $_SESSION['b_pto'] = $_POST['buy_to'];
    $_SESSION['b_pdate'] = $_POST['buy_date'];
    $_SESSION['b_pclass'] = $_POST['buy_train_class'];
    $_SESSION['quantity'] = $_POST['quantity'];
    $_SESSION['route_filtered'] = filter_route_name($_SESSION['b_pfrom'], $_SESSION['b_pto']);
    $_SESSION['per_ticket_amount'] = amount_calculator($_SESSION['b_pclass'], $_SESSION['route_filtered'], $conn);
    $_SESSION['amount'] = 0;
    $_SESSION['tickets_multiplied'] = ($_SESSION['per_ticket_amount'] * $_SESSION['quantity']);

    array_push($_SESSION['temp'], $_SESSION['b_pfrom'], $_SESSION['b_pto'], $_SESSION['b_pclass'], $_SESSION['b_pdate'], $_SESSION['route_filtered'], $_SESSION['quantity'], $_SESSION['per_ticket_amount'], $_SESSION['tickets_multiplied']);
    array_push($_SESSION['temp_cart'], $_SESSION['temp']);
    for($i = 0; $i < count($_SESSION['temp_cart']); $i++){
        $_SESSION['amount'] += $_SESSION['temp_cart'][$i][7];
    }
    if($_SESSION['discount']){
        $_SESSION['amount'] -= ($_SESSION['amount'] * 0.1);
    }
    ?>
    <script>
        window.location.href = "payment.php";
    </script>
    <?php
    // header("Location: payment.php");
}

if(isset($_POST['check_status'])){
    $_SESSION['b_pfrom'] = $_POST['buy_from'];
    $_SESSION['b_pto'] = $_POST['buy_to'];
    $_SESSION['b_pdate'] = $_POST['buy_date'];
    $_SESSION['b_pclass'] = $_POST['buy_train_class'];
    ?>
    <script>
        window.location.href = "loggedin_available.php";
    </script>
    <?php
}
?>