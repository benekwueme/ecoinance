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
           
                <div class="deposit ggrey lighten-3">
                    <div class="indicators">
                        <div class="step active"></div>
                        <div class="step active"></div>
                        <div class="step"></div>
                        <div class="step"></div>
                    </div>
                    <h4><b>Deposit Funds</b></h4>
                    <p>via <b>Crypto Wallet</b></p>
                    <p class="ssd">Make payments using your crypto wallet</p>
                    <form action="./deposit-confirm.php" method="post" style="text-align:center;width:100%;margin:0 auto">
                        <div class="pay-method">
                            <span class="currency">USD</span>
                            <input class="validate" name="amount" required type="number" min="100" step="5" placeholder="Amount in $">
                        </div>
                        <p class="red-text center-align text-lighten-2" style="font-size:17px;margin-top: -30px;margin-bottom:30px;">The minimum deposit is $100 USD</p>

                        <button type="submit" class="btn-large blue darken-3">Continue to Deposit</button>
                    </form>
                    <p style="margin-top: 15px">Our deposit fee are almost <b class="green-text">free</b></p>
                </div>
        </div>
    </div>





    <?php include "./partial/user-footer.php";
    ?>
    <?php include "./partial/js-scripts.php";
    ?>


</body>

</html>