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

        <div class="dashboard">
            <form action="deposit-amount.php">
                <div class="deposit ggrey lighten-3">
                    <div class="indicators">
                        <div class="step active"></div>
                        <div class="step"></div>
                        <div class="step"></div>
                        <div class="step"></div>
                    </div>
                    <h4><b>Deposit Funds</b></h4>
                    <p>Select from the payment methods below</p>
                    <p class="ssd">Secure and safely deposit money into your accounts</p>

                    <div class="pay-method">

                        <div class="method">
                            <p>
                                <input class="with-gap" disabled name="wallet" type="radio" id="test5" />
                                <label for="test5">Bank Payment</label>
                            </p>
                            <i class="material-icons">credit_card</i>
                        </div>
                        <div class="method">
                            <p>
                                <input class="with-gap" required name="wallet" value="yes" type="radio" id="test4" />
                                <label for="test4">Crypto Wallet</label>
                            </p>
                            <i class="material-icons">local_atm</i>
                        </div>


                    </div>
                    <button type="submit" class="btn-large blue darken-3">Deposit Now</button>
                    <p style="margin-top: 15px">Our deposit fee are almost <b class="green-text">free</b></p>
                </div>
            </form>
        </div>
    </div>





    <?php include "./partial/user-footer.php";
    ?>
    <?php include "./partial/js-scripts.php";
    ?>


</body>

</html>