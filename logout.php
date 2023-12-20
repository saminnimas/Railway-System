<?php
// session_start();
// $lifetime=3600;
// session_start();
// setcookie(session_name(),session_id(),time()+$lifetime);
// session_destroy();
session_start();
// session_unset();
session_destroy();
// session_write_close();
// setcookie(session_name(),'',0,'/');
// session_regenerate_id(true);
header("Location: index.php");
?>