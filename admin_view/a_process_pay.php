<?php
session_start();

if(!$_SESSION['x']){
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

if(isset($_POST['a_buy_ticket'])){
    $_SESSION['ab_pfrom'] = $_POST['a_buy_from'];
    $_SESSION['ab_pto'] = $_POST['a_buy_to'];
    $_SESSION['ab_pdate'] = $_POST['a_date'];
    $_SESSION['ab_pclass'] = $_POST['a_train_class'];
    $_SESSION['aquantity'] = $_POST['a_quantity'];
    $_SESSION['aroute_filtered'] = filter_route_name($_SESSION['ab_pfrom'], $_SESSION['ab_pto']);
    $_SESSION['aper_ticket_amount'] = amount_calculator($_SESSION['ab_pclass'], $_SESSION['aroute_filtered'], $conn);
    $_SESSION['a_amount'] = 0;
    $_SESSION['a_tickets_multiplied'] = ($_SESSION['aper_ticket_amount'] * $_SESSION['aquantity']);

    array_push($_SESSION['atemp'], $_SESSION['ab_pfrom'], $_SESSION['ab_pto'], $_SESSION['ab_pclass'], $_SESSION['ab_pdate'], $_SESSION['aroute_filtered'], $_SESSION['aquantity'], $_SESSION['aper_ticket_amount'], $_SESSION['a_tickets_multiplied']);
    array_push($_SESSION['atemp_cart'], $_SESSION['atemp']);
    for($i = 0; $i < count($_SESSION['atemp_cart']); $i++){
        $_SESSION['a_amount'] += $_SESSION['atemp_cart'][$i][7];
    }
    if($_SESSION['discount']){
        $_SESSION['a_amount'] -= ($_SESSION['a_amount'] * 0.1);
    }
    header("Location: a_payment.php");
}

if(isset($_POST['a_check_status'])){
    $_SESSION['b_pfrom'] = $_POST['a_buy_from'];
    $_SESSION['b_pto'] = $_POST['a_buy_to'];
    $_SESSION['b_pdate'] = $_POST['a_date'];
    $_SESSION['b_pclass'] = $_POST['a_train_class'];
    ?>
    <script>
        window.location.href = "a_availables.php";
    </script>
    <?php
}
?>