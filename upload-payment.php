<?php
include 'coin-operations.php';
checkIfUserLoggedIn();
$username = $_SESSION['user-info']['username'];
$name = $_SESSION['user-info']['name'];


if (isset($_POST['upload'])) {
    print_r($_FILES);
    $pp = uploadImage($_FILES['proof'],$username);
    if($pp){
        $_SESSION['login_error'] = "Successful: Your proof of payment has been uploaded";
        $_SESSION['login_time'] = 7000;
        $_SESSION['login_color'] = "green";
    }
    header("location: profile.php");
}
?>
