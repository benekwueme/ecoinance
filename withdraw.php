<?php
include 'coin-operations.php';
checkIfUserLoggedIn();
$username = $_SESSION['user-info']['username'];
$name = $_SESSION['user-info']['name'];

$bal = getUserBalance($username)['balance']
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>eCoinance</title>
    <?php include "./partial/header.php"; ?>
    <style>
        .select-wrapper ul,
        .select-wrapper ul li {
            height: 75.5px;
        }
    </style>
</head>

<body>
    <?php include "./partial/user-navbar.php"; ?>
    <?php include "./partial/user-menu.php"; ?>

    <div class="user-panel">
        <?php include "./partial/user-sidebar.php"; ?>

        <div class="dashboard">
            <div class="deposit withdraw ggrey lighten-3">
                <div class="indicators">
                    <div class="step active"></div>
                    <div class="step"></div>
                    <div class="step"></div>
                    <!-- <div class="step"></div> -->
                </div>
                <h4><b>Withdraw Funds</b></h4>
                <p>Select from the withdraw methods below</p>
                <p class="ssd">Withdraw money into your accounts directly</p>

                <div class="pay-method">


                </div>

                <form action="withdraw-confirm.php" method="post" class="wdform" style="text-align:center;width:100%;margin:0 auto">
                    <div class="pay-method">

                        <div class="method">
                            <p style="margin-bottom: 0;">
                                <input class="with-gap" value="Balance" name="withdraw_from" type="radio" id="test5" />
                                <label class="green-text" for="test5">Balance</label>
                            </p>
                            <i class="material-icons">credit_card</i>
                        </div>
                        <div class="method" style="margin-bottom: 25px;">
                            <p style="margin-bottom: 0;">
                                <input class="with-gap" name="withdraw_from" type="radio" id="wcradio" checked value="Profit" />
                                <label for="wcradio">Profit</label>
                            </p>
                            <i class="material-icons">local_atm</i>
                        </div>

                        <input type="text" name="wallet" required placeholder="Enter Your Valid Wallet Address">
                    </div>
                    <div class="pay-method">
                        <span class="currency">USD</span>
                        <input type="number" name="amount" required class="validate" placeholder="Enter Amount" max="<?php echo $bal; ?>">
                    </div>
                    <p>&nbsp;</p>
                    <button type="submit" class="btn-large blue darken-3">Continue to Deposit</button>
                </form>
                <!-- <a href="#" class="btn-large blue darken-3">Deposit Now</a> -->
                <p style="margin-top: 15px">Our deposit fee are almost <b class="green-text">free</b></p>
            </div>
        </div>
    </div>





    <?php include "./partial/user-footer.php";
    ?>
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