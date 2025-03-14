<?php
include 'coin-operations.php';
if (isset($_POST['login'])) {
    loginUser($_POST);
    //header("location: sign-in.php");
} else {
    header("location: sign-in.php");
}
