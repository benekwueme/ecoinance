<?php
include 'coin-operations.php';
checkIfUserLoggedIn();
$username = $_SESSION['user-info']['username'];
$name = $_SESSION['user-info']['name'];

if (!isset($_GET['amount'])) {
    header("location: ./deposit.php");
} else {
    if(addUserDeposit($username,$_GET)){
        $_SESSION['login_error'] = "Successfull: You have to upload proof of payment";
        $_SESSION['login_time'] = 7000;
        $_SESSION['login_color'] = "green";
        header("location: profile.php#proof-payment");
    }
}
