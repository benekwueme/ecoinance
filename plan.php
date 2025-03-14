<?php
include 'coin-operations.php';
checkIfUserLoggedIn();
$username = $_SESSION['user-info']['username'];
$name = $_SESSION['user-info']['name'];

if (isset($_GET['id'])) {
    $row = [];
    $si = getSingleUserInvestment($username, $_GET['id']);
    while ($rw = $si->fetch_assoc()) {
        $row = $rw;
        switch ($rw['invest_type']) {
            case 'Bronze':
                $daily = 4;
                break;
            case 'Silver':
                $daily = 6;
                break;
            case 'Gold':
                $daily = 10;
                break;
            case 'Diamond':
                $daily = 20;
                break;

            default:
                # code...
                break;
                $profit = $rw['invest_amount'] * $daily / 100;
        }
        $profit = $rw['invest_amount'] * $daily * 5 / 100;
        $returns = $rw['invest_amount'] + $profit;


        $rdays = (strtotime($row['invest_date'] . '+ 5 days') - strtotime(date('Y-m-d'))) / (60 * 60 * 24);

        $rd = strtotime(date('Y-m-d')) > strtotime($row['invest_date'] . '+ 5 days') ? 0 : $rdays;

        if($rd == 0 && $row['status'] == 'running'){
            if(payInvestment($username, $rw['id'], $rw['invest_amount'], $profit)){
                header("location: ./my-plans.php");
            }
        }

        $per = strtotime(date('Y-m-d')) > strtotime($row['invest_date'] . '+ 5 days') ? 100 : 100 - ($rdays * 100 / 5);

        $earnpro = strtotime(date('Y-m-d')) > strtotime($row['invest_date'] . '+ 5 days') ? $profit : $profit / $rdays;
        // date('jS F, Y', strtotime($row['invest_date'] . ' + 5 days'))

    }
} else {
    header("location: ./my-plans.php");
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
    <style>
        .pie {
            height: 200px !important;
            width: 200px !important;
        }

        .pie svg {
            width: 200px !important;
            height: 200px !important;
        }

        .pie-container {
            width: 200px;
            margin: 15px auto;
        }
    </style>
</head>

<body>
    <?php include "./partial/user-navbar.php"; ?>
    <?php include "./partial/user-menu.php"; ?>

    <div class="user-panel">
        <?php include "./partial/user-sidebar.php"; ?>

        <div class="dashboard" style="padding: 30px 50px;">
            <p>Welcome !</p>
            <h4><b>Standard <?php echo $row['invest_type']; ?> Plan - Daily <?php echo $daily; ?>% for 5 days</b></h4>
            <span style="padding: 5px 8px; border-radius: 4px;font-weight:bold; font-size: 18px;letter-spacing:1px" class="blue white-text">INV <?php echo $row['ref_order'] . ' - '; ?> <?php echo $rd == 0 ? 'Completed' : 'Running' ; ?></span>

            <div class="active-plans">

                <div class="r-profit">
                    <div class="pie-container">
                        <div class="pie-container">
                            <div class="pie" data-pie='{ "percent": <?php echo $per; ?>, "colorSlice": "green", "colorCircle": "#f1f1f1","round":true, "fontWeight": 100 }'></div>
                        </div>
                    </div>
                    <div class="a-plan">
                        <div class="bns money">
                            <p>
                                <b>0.00 USD</b>
                                <span>Start Profit</span>
                            </p>
                            <p class="right-align">
                                <b> <?php echo number_format($profit,2); ?> USD</b>
                                <span>End Profit</span>
                            </p>
                        </div>
                        <div class="bns">
                            <p>
                                <b><?php echo number_format($earnpro, 2); ?> USD</b>
                                <span>Earned Profit</span>
                            </p>
                            <p class="right-align">
                                <b><?php echo $rd; ?> Days</b>
                                <span>Days Remaining</span>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="a-plan">
                    <div class="bns money">
                        <p>
                            <b> <?php echo $returns; ?> USD</b>
                            <span>Amount Return</span>
                        </p>
                        <p class="right-align">
                            <b> <?php echo $row['invest_amount']; ?> USD</b>
                            <span>Amount Invested</span>
                        </p>

                    </div>

                    <div class='bns'>
                        <p>
                            <b><?php echo date('jS F, Y', strtotime($row['invest_date'])) ?></b>
                            <span>Start Date</span>
                        </p>
                        <p class='right-align'>
                            <b><?php echo date('jS F, Y', strtotime($row['invest_date'] . ' + 5 days')) ?> </b>
                            <span>End Date</span>
                        </p>

                    </div>


                </div>

            </div>

        </div>
    </div>





    <?php include "./partial/user-footer.php";
    ?>
    <?php include "./partial/js-scripts.php";
    ?>
    <script>
        window.addEventListener('DOMContentLoaded', () => {
            const circle = new CircularProgressBar('pie');

            // setInterval(() => {
            //     const options = {
            //         index: 1,
            //         percent: Math.floor((Math.random() * 100) + 1)
            //     }
            //     circle.animationTo(options);
            // }, 2000);

            // setInterval(() => {
            //     const options = {
            //         index: 2,
            //         percent: Math.floor((Math.random() * 100) + 1)
            //     }
            //     circle.animationTo(options);
            // }, 2000);

            // setInterval(() => {
            //     const options = {
            //         index: 3,
            //         percent: Math.floor((Math.random() * 100) + 1)
            //     }
            //     circle.animationTo(options);
            // }, 2000);

        });
    </script>

</body>

</html>