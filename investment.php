<?php
include 'coin-operations.php';
checkIfUserLoggedIn();
$username = $_SESSION['user-info']['username'];
$name = $_SESSION['user-info']['name'];



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
        <div class="dashboard" style="padding:30px">
            <p>Welcome !</p>
            <h4><b>Our Investment Plans</b></h4>
            <span>At a glance summary of the investments ! Have fun.</span>

            <div class="iplans">
                <!-- <h1>Our Investment Plans</h1> -->

                <div class="plans animatedParent animateOnce" data-sequence="900">
                    <div class="grey lighten-4 animated growIn slowest" data-id="1">
                        <img src="./images/coinmaximal-icon.svg" height="60px" alt="">
                        <p>Bronze</p>
                        <div class="tw grey lighten-2">
                            <p>20%</p>
                            <p>5 Trading Days</p>
                        </div>
                        <div class="min-max">
                            <span>Minimum - Maximum</span>
                            <b>$300 - $5,000</b>
                        </div>
                        <div class="min-max">
                            <span>Daily Profit %</span>
                            <b>4%</b>
                        </div>
                        <div class="min-max">
                            <span>Instant Payout</span>
                            <b>Profit 20% + <span class="">Capital</span></b>
                        </div>
                        <a href="./invest-and-earn.php?plan=bronze&min=300&max=5000" class="invest btn-large yellow darken-4">Invest</a>
                    </div>
                    <div class="grey lighten-4 animated growIn slowest" data-id="2">
                        <img src="./images/coinmaximal-icon.svg" height="60px" alt="">
                        <p>Silver</p>
                        <div class="tw grey lighten-2">
                            <p>30%</p>
                            <p>5 Trading Days</p>
                        </div>
                        <div class="min-max">
                            <span>Minimum - Maximum</span>
                            <b>$5,001 - $20,000</b>
                        </div>
                        <div class="min-max">
                            <span>Daily Profit %</span>
                            <b>6%</b>
                        </div>
                        <div class="min-max">
                            <span>Instant Payout</span>
                            <b>Profit 30% + <span class="">Capital</span></b>
                        </div>
                        <a href="./invest-and-earn.php?plan=silver&min=5001&max=20000" class="invest btn-large yellow darken-4">Invest</a>
                    </div>
                    <div class="grey lighten-4 animated growIn slowest" data-id="3">
                        <img src="./images/coinmaximal-icon.svg" height="60px" alt="">
                        <p>Gold</p>
                        <div class="tw grey lighten-2">
                            <p>50%</p>
                            <p>5 Trading Days</p>
                        </div>
                        <div class="min-max">
                            <span>Minimum - Maximum</span>
                            <b>$20,001 - $50,000</b>
                        </div>
                        <div class="min-max">
                            <span>Daily Profit %</span>
                            <b>10%</b>
                        </div>
                        <div class="min-max">
                            <span>Instant Payout</span>
                            <b>Profit 50% + <span class="">Capital</span></b>
                        </div>
                        <a href="./invest-and-earn.php?plan=gold&min=20001&max=50000" class="invest btn-large yellow darken-4">Invest</a>
                    </div>
                    <div class="grey lighten-4 animated growIn slowest" data-id="4">
                        <img src="./images/coinmaximal-icon.svg" height="60px" alt="">
                        <p>Diamond</p>
                        <div class="tw grey lighten-2">
                            <p>100%</p>
                            <p>5 Trading Days</p>
                        </div>
                        <div class="min-max">
                            <span>Minimum - Maximum</span>
                            <b>$50,001 - $100,000</b>
                        </div>
                        <div class="min-max">
                            <span>Daily Profit %</span>
                            <b>20%</b>
                        </div>
                        <div class="min-max">
                            <span>Instant Payout</span>
                            <b>Profit 100% + <span class="">Capital</span></b>
                        </div>
                        <a href="./invest-and-earn.php?plan=diamond&min=50001&max=100000" class="invest btn-large yellow darken-4">Invest</a>
                    </div>

                </div>
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