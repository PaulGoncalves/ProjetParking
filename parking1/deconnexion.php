<?php
SESSION_start();
$_SESSION =array();
session_destroy();
header("Location: connection.php")

?>
