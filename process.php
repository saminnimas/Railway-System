<?php
session_start();
// $lifetime=3600;
// session_start();
// setcookie(session_name(),session_id(),time()+$lifetime);
if(isset($_POST['buy_t'])){
    $_SESSION['bfrom'] = $_POST['from'];
    $_SESSION['bto'] = $_POST['to'];
    $_SESSION['bdate'] = $_POST['date'];
    $_SESSION['bclass'] = $_POST['train_class'];
    header("Location: login.php");
}
// else{
//     header("Location: login.php");
// }
if(isset($_POST['status'])){
    $_SESSION['bfrom'] = $_POST['from'];
    $_SESSION['bto'] = $_POST['to'];
    $_SESSION['bdate'] = $_POST['date'];
    $_SESSION['bclass'] = $_POST['train_class'];
    ?>
    <script>
        window.location.href = "availables.php";
    </script>
    <?php
}
?>
<!-- isset($_POST['from']) && isset($_POST['to']) && isset($_POST['date']) && isset($_POST['train_class']) -->