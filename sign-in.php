<?php
session_start();
if (isset($_SESSION['user-info'])) {
    header("location: ./user-dashboard.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>coinMaximal | Register Account</title>
    <?php include "./partial/header.php"; ?>
</head>

<body class="lighten-3">
    <?php // include "./partial/navbar.php"; 
    ?>
    <div class="hder hide-on-large-only">
        <a href="./">
            <img src="./images/coinmaximal-icon.svg" height="40px" alt="">
        </a>
        <p>
            <span style="font-size: 20px;text-shadow: 1px 1px 2px black;" class="ti-lock"></span>
        </p>
    </div>
    <div class="sign">
        <div class="sign-banner hide-on-med-and-down">
            <img src="./images/683704e3.png" width="100%" alt="">
        </div>
        <div class="sign-in">
            <div class="hder hide-on-med-and-down">
                <a href="./">
                    <img src="./images/coinmaximal-icon.svg" height="40px" alt="">
                </a>
                <p>
                    <span style="font-size: 20px;text-shadow: 1px 1px 2px black;" class="ti-lock"></span>
                </p>
            </div>
            <div class="panel white">

                <p class="center-align hide-on-large-only">
                    <img src="./images/683704e3.png" width="100%" alt="">
                </p>
                <div class="header">
                    <h1 class="center-align" style="font-family: aldo;">Login Into Account</h1>
                    <p class="center-align">Sign into your account using email address and passcode</p>
                </div>
                <div class="lg-form">
                    <form class="userForm" action="sign-in-dev.php" method="post">
                        <div class="input-form">
                            <label for="">Email Address</label>
                            <input type="email" name="email">
                        </div>
                        <div class="input-form">
                            <label for="">Passcode</label>
                            <input type="password" name="password">
                        </div>
                        <p>
                            <input type="checkbox" id="test5" class="filled-in" />
                            <label for="test5">Remember Me</label>
                        </p>

                        <button style="background-color: rgb(20, 20, 73);" class="btn-large " type="submit" name="login">Log In</button>
                    </form>
                </div>
                <p class="center-align" style="margin-top: 20px">
                    New on our platform. <a href="sign-up.php">Create an account</a>
                </p>
            </div>
        </div>
    </div>

    <!-- <div style="height: 90px;" class="">
    </div> -->

    <?php include "./partial/js-scripts.php";
    ?>
    <?php
    if (isset($_SESSION['login_error'])) {
        echo "<script>Materialize.toast('{$_SESSION['login_error']}', 5000, 'red darken-3')</script>";
        unset($_SESSION['login_error']);
    }
    ?>

</body>

</html>