<?php
session_start();
setcookie('cookie', '', time() - 10000,"/");
unset($_SESSION['user_name']);
header('Location:../index.php');