<?php
session_start();

header('Location: index.php');
$_SESSION['innlogging']=false;
exit;
?>