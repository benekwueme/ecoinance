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
            <p>Welcome !</p>
            <h4><b>Your Invested Plans</b></h4>
            <span>At a glance summary of your investments ! Have fun.</span>

            <div class="active-plans">
                <p style="font-size:25px"><b>All Investment Plans (<?php echo getUserInvestments($username) ?>)</b></p>

                <div class="">

                    <?php
                    $re = getAllUserInvestments($username);
                    while ($rw = $re->fetch_assoc()) {

                        $pulse = $rw['status'] == 'running' ? 'pulse yellow' : 'green';

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


                        echo "<a href='plan.php?id={$rw['id']}'>
                        <div class='a-plan '>
                            <p class='icon $pulse darken-2'>
                                <i class='material-icons'>developer_mode</i>
                            </p>
                            <div class='info center'>
                                <p><b>{$rw['invest_type']} Plan - Daily $daily% for 5 days</b></p>
                                <p>Invested: <b>" . number_format($rw['invest_amount'], 2) . " USD</b></p>
                            </div>

                            <div class='bns money'>
                                <p>
                                    <b class='green-text'>" . number_format($returns, 2) . " USD</b>
                                    <span>Total Return</span>
                                </p>
                                <p class='right-align'>
                                    <b class='blue-text'>" . number_format($profit, 2) . " USD</b>
                                    <span>Net Profit</span>
                                </p>

                            </div>

                            <div class='bns'>
                                <p>
                                    <b>" . date('jS M, Y', strtotime($rw['invest_date'])) . "</b>
                                    <span>Start Date</span>
                                </p>
                                <p class='right-align'>
                                    <b>" . date('jS M, Y', strtotime($rw['invest_date'] . ' + 5 days')) . " </b>
                                    <span>End Date</span>
                                </p>

                            </div>


                        </div>
                    </a>";
                    }

                    ?>

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