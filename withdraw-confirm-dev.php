<?php
include 'coin-operations.php';
checkIfUserLoggedIn();
$username = $_SESSION['user-info']['username'];
$name = $_SESSION['user-info']['name'];

$bal = getUserBalance($username)['balance'];
$profit = getUserBalance($username)['profit'];
if (isset($_GET)) {

    extract($_GET);
    echo $withdraw_from;

    if (makeWithdrawal($username, $amount, $withdraw_from)) {
        $_SESSION['login_error'] = "Thank You for completing the process !!!";
        $_SESSION['login_time'] = 7000;
        $_SESSION['login_color'] = "green";
        $_SESSION['wd'] = "ok";
        header("location: withdraw-complete.php");
    }
}
