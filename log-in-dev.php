<?php
include 'coin-operations.php';
if (isset($_POST['login'])) {
    loginAdmin($_POST);
    //header("location: sign-in.php");
} else {
    header("location: admin-login.php");
}
