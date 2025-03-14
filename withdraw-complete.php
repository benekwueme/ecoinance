<?php
include 'coin-operations.php';
checkIfUserLoggedIn();
$username = $_SESSION['user-info']['username'];
$name = $_SESSION['user-info']['name'];
if(! isset($_SESSION['wd'])){
    header('location: user-dashboard.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>eCoinance</title>
    <?php include "./partial/header.php"; ?>
</head>

<body>
    <?php include "./partial/user-navbar.php"; ?>
    <?php include "./partial/user-menu.php"; ?>

    <div class="user-panel">
        <?php include "./partial/user-sidebar.php"; ?>

        <div class="dashboard">
            <div class="deposit ggrey lighten-3">
                <div class="indicators">
                    <div class="step active"></div>
                    <div class="step active"></div>
                    <div class="step active"></div>

                </div>
                <h4><b>Withdraw Funds</b></h4>
                <p>Your withdrawal is being processed. Your transaction will be completed swiftly</p>
                <p class="ssd">Please review the information and procced</p>

                <p>
                    <i class="material-icons green-text" style="font-size:150px;margin:40px 0;line-height:130px;">check_circle</i>
                </p>
                <a href="transaction.php" class="btn-large blue darken-3">See Transaction List</a>


            </div>
        </div>
    </div>





    <?php include "./partial/user-footer.php";
    ?>
    <?php include "./partial/js-scripts.php";
    ?>
    <?php
    if (isset($_SESSION['login_error'])) {
        echo "<script>Materialize.toast('{$_SESSION['login_error']}', {$_SESSION['login_time']}, '{$_SESSION['login_color']} darken-3')</script>";
        unset($_SESSION['login_error']);
    }
    ?>

</body>

</html>