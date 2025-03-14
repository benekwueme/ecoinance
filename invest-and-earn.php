<?php
include 'coin-operations.php';
checkIfUserLoggedIn();
$username = $_SESSION['user-info']['username'];
$name = $_SESSION['user-info']['name'];
$bal = getUserBalance($username)['balance'];

if (!isset($_GET['plan'])) {
    header("location: investment.php");
} else {
    $min = $_GET['min'];
    $max = $_GET['max'];
    switch ($_GET['plan']) {
        case 'bronze':
            $plan = "Bronze";
            $html = "<p><b>$plan Plan</b> <br> <span>Invest for 5 days and earn 20% as profit</span></p>";
            break;
        case 'silver':
            $plan = "Silver";
            $html = "<p><b>$plan Plan</b> <br> <span>Invest for 5 days and earn 30% as profit</span></p>";
            break;
        case 'gold':
            $plan = "Gold";
            $html = "<p><b>$plan Plan</b> <br> <span>Invest for 5 days and earn 50% as profit</span></p>";
            break;
        case 'diamond':
            $plan = "Diamond";
            $html = "<p><b>$plan Plan</b> <br> <span>Invest for 5 days and earn 100% as profit</span></p>";
            break;

        default:
            header("location: investment.php");
            break;
    }
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
                    <div class="step"></div>
                </div>
                <h4><b>Invest and Earn</b></h4>
                <p><b>We have various investment plans for you</b></p>
                <p class="ssd">You can invest on the Bronze, Silver, Gold or Diamond plan and start earning now</p>

                <div class="s-plan">
                    <p><b>Invested Plan</b></p>
                    <div class="plan">
                        <p><i class="material-icons">settings</i></p>
                        <?php echo $html; ?>
                    </div>
                </div>

                <div class="s-plan">
                    <p><b>Payment Account</b></p>
                    <div class="plan">
                        <p><i class="material-icons">credit_card</i></p>
                        <p><b>Main Balance</b> <br><b class="green-text text-darken-1">Current Balance: <?php echo $bal; ?> USD</b></p>
                    </div>
                </div>

                <form action="" method="post" style="text-align:center;width:100%;margin:0 auto">
                    <p style="width:90%;margin:30px auto 10px;text-align:left"><b>Enter Amount</b></p>
                    <div class="pay-method" style="margin-top: 10px;">

                        <span class="currency">USD</span>
                        <input type="hidden" id="type" name="invest_type" value="<?php echo $plan; ?>">

                        <input name="invest_amount" id="amount" required step="10" type="number">

                        <div class="min-max">
                            <span>Minimum: <?php echo number_format($min); ?> USD</span><span>Maximum: <?php echo number_format($max); ?> USD</span>
                        </div>
                    </div>
                    <button type="submit" class="btn-large blue darken-3">Continue to Invest</button>
                </form>
                <p style="margin-top: 15px">Our deposit fee are almost <b class="green-text">free</b></p>
            </div>
        </div>
    </div>




    <div class="loading">
        <img src="./images/Hourglass.gif" width="70px" alt="" srcset="">
        <p class="green-text"> Processing Investment...</p>
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

    <script>
        $("form").submit((e) => {
            e.preventDefault();
            var ty = $("form #type").val()
            var am = $("form #amount").val()
            var link = "./add-investment.php?invest_amount=" + am + "&invest_type=" + ty;
            console.log(link)
            $(".loading").css("display", "flex");
            setTimeout(() => {
                $(".loading p").text("Submitted");
                $("form button").fadeOut(100)
                $(".loading").fadeOut(1000);
                location.href = link;
            }, 4000)

        })
    </script>
    <?php
    if (isset($_SESSION['login_error'])) {
        echo "<script>Materialize.toast('{$_SESSION['login_error']}', {$_SESSION['login_time']}, '{$_SESSION['login_color']} darken-3')</script>";
        unset($_SESSION['login_error']);
    }
    ?>

</body>

</html>