<?php
include 'coin-operations.php';
checkIfUserLoggedIn();
$username = $_SESSION['user-info']['username'];
$name = $_SESSION['user-info']['name'];

$bal = getUserBalance($username)['balance'];
$profit = getUserBalance($username)['profit'];

if (isset($_POST)) {
    
    extract($_POST);
    if ($withdraw_from == 'Profit' && $amount > $profit) {
        echo "<script>
        alert('You have insufficient funds in your Profit. Consider withrawing from your balance');
        history.back();
        </script>";
    }
    $link = "./withdraw-confirm-dev.php?withdraw_from=$withdraw_from&amount=$amount";
} else {
    header("location: withdraw.php");
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
                    <div class="step"></div>
                    <!-- <div class="step"></div> -->
                </div>
                <h4><b>Withdraw Funds</b></h4>
                <p>You are about to withdraw <b><?php echo $amount ?> USD</b> from your account</p>
                <p class="ssd">Please review the information and procced</p>

                <div class="preview">
                    <p>
                        <span>Withdraw From</span>
                        <b><?php echo $withdraw_from ?></b>
                    </p>
                    <p>
                        <span>Address</span>
                        <b><?php echo $wallet ?></b>
                    </p>

                    <p>
                        <span>Amount </span>
                        <b><?php echo $amount ?> USD</b>
                    </p>
                </div>


                <p class="total">
                    <b>Amount to Withdraw</b>
                    <b><?php echo $amount ?> USD</b>
                </p>

                <a href="<?php echo $link ?>" class="btn-large blue darken-3">Confirm Withdrawal</a>
                <a href="./withdraw.php" class="red-text" style="padding-top:25px"><b>Cancel Transaction</b></a>


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