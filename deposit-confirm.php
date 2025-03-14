<?php
include 'coin-operations.php';
checkIfUserLoggedIn();
$username = $_SESSION['user-info']['username'];
$name = $_SESSION['user-info']['name'];

if (!isset($_POST['amount'])) {
    header("location: ./deposit.php");
} else {
    $amount = $_POST['amount'];
    $ref = generateRandomString(7);
    $dt = date('Y-m-d');
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
                    <div class="step"></div>
                </div>
                <h4><b>Deposit Funds</b></h4>
                <p>You are about to deposit <b><?php echo $amount; ?> USD</b> into your account</p>
                <p class="ssd">Please review the information and procced</p>

                <div class="preview">
                    <p>
                        <span>Payment method</span>
                        <b>Crypto Wallet</b>
                    </p>
                    <p>
                        <span>You will send</span>
                        <b class="green-text text-lighten-1"><?php echo $amount; ?> USD</b>
                    </p>

                    <p>
                        <span>Equivalent to </span>
                        <b>0.000148720 BTC</b>
                    </p>
                    <p>
                        <span>&nbsp; </span>
                        <span>835.2 GBP</span>
                    </p>
                </div>

                <div class="barcode">
                    <p>Please send exactly <b><?php echo $amount; ?> USD</b> to
                        <b class="green-text brown w-address lighten-4 tooltipped" data-position="bottom" data-delay="50" data-tooltip="Copy wallet address">1Ps6QUW8LNHbrfTgChU6dGFptxj8GQjcz1</b> <br> Click to Copy
                    </p>
                    <img src="./images/btc-barcode2.png" class="tooltipped" data-position="bottom" data-delay="50" data-tooltip="Scan barcode to pay" alt="">
                </div>

                <p class="total">
                    <b>Amount to Deposit</b>
                    <b><?php echo $amount; ?> USD</b>
                </p>

                <a id="submit" class="btn-large blue darken-3">Confirm Payment</a>
                <a href="#" class="red-text" style="padding-top:25px"><b>Cancel Payment</b></a>


                <p style="margin-top: 15px">Our deposit fee are almost <b class="green-text">free</b></p>
            </div>
        </div>
    </div>

    <div class="loading">
        <img src="./images/Hourglass.gif" width="70px" alt="" srcset="">
        <p class="green-text"> Submitting Payment Request...</p>
    </div>



    <?php include "./partial/user-footer.php";
    ?>
    <?php include "./partial/js-scripts.php";
    ?>
    <script>
        $("#submit").click(() => {
            $(".loading").css("display", "flex");
            setTimeout(() => {
                $(".loading p").text("Submitted");
                $(this).attr("disabled",true);
                $(".loading").fadeOut(3000, () => {
                    <?php echo "location.href = 'deposit-dev.php?amount=$amount&ref_order=$ref&transac_date=$dt'"; ?>
                });
            }, 4000)

        })
    </script>


</body>

</html>