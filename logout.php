<?php
session_start();
if (isset($_SESSION['user-info'])) {
    unset($_SESSION['user-info']);
    $_SESSION['login_error'] = "You just logged out";
    header("location: ./sign-in.php");
}
