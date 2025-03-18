<?php
session_start();
unset($_SESSION['innlogging']);
header('Location: index.php');
exit;
?>