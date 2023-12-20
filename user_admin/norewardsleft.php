<?php
session_start();
if(!$_SESSION['y']){
    header("Location: ../index.php");
}
?>
<div>
    <h2>NO REWARDS LEFT. Please buy more tickets to stack rewards.</h2>
</div>
<button><a href="profile.php">Back to profile.</a></button>