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
            <h4><b><?php echo $name; ?></b></h4>
            <span>At a glance summary of your account ! Have fun.</span>


            <div class="row">
                <div class=" col s12 l4 panel grey lighten-4 yp">
                    <div class="top">
                        <span>Total Deposit</span>
                        <i class="material-icons">info_outline</i>
                    </div>
                    <h3><b><span><?php echo number_format(getUserTotalDeposit($username)); ?></span> USD</b></h3>
                    <span>Investment Account</span>
                </div>
                <div class=" col s12 l4 panel grey lighten-4 rp">
                    <div class="top">
                        <span>Amount Invested</span>
                        <i class="material-icons">info_outline</i>
                    </div>
                    <h3><b><span><?php echo number_format(getUserTotalInvestment($username)); ?></span> USD</b></h3>
                    <span>Investment Account</span>
                </div>
                <div class=" col s12 l4 panel grey lighten-4 gp">
                    <div class="top">
                        <span>Available Balance</span>
                        <i class="material-icons">info_outline</i>
                    </div>
                    <h3><b><span><?php echo number_format(getUserTotalBalance($username)); ?></span> USD</b></h3>
                    <span>Investment Account</span>
                </div>
                <div class=" col s12 l4 panel grey lighten-4 rp">
                    <div class="top">
                        <span>Total Profits Made</span>
                        <i class="material-icons">info_outline</i>
                    </div>
                    <h3><b><span><?php echo number_format(getUserTotalProfit($username)); ?></span> USD</b></h3>
                    <span>Investment Account</span>
                </div>
                <div class=" col s12 l4 panel grey lighten-4 gp">
                    <div class="top">
                        <span>Available Profits</span>
                        <i class="material-icons">info_outline</i>
                    </div>
                    <h3><b>
                            <span><?php echo number_format(getUserTotalAvaProfit($username)); ?></span> USD</b></h3>
                    <span>Investment Account</span>
                </div>
                <div class=" col s12 l4 panel grey lighten-4 yp">
                    <div class="top">
                        <span>Withdrawn Profits</span>
                        <i class="material-icons">info_outline</i>
                    </div>
                    <h3><b><span><?php echo number_format(getUserTotalWithdrawnProfit($username)); ?></span> USD</b></h3>
                    <span>Investment Account</span>
                </div>
                <div class=" col s12 l4 panel grey lighten-4 gp">
                    <div class="top">
                        <span>Withdrawn Balance</span>
                        <i class="material-icons">info_outline</i>
                    </div>
                    <h3><b><span><?php echo number_format(getUserTotalWithdrawnBalance($username)); ?></span> USD</b></h3>
                    <span>Investment Account</span>
                </div>
                <div class=" col s12 l4 panel grey lighten-4 rp">
                    <div class="top">
                        <span>Your Investments</span>
                        <i class="material-icons">info_outline</i>
                    </div>
                    <h3><b><span><?php echo getUserInvestments($username); ?></span> </b></h3>
                    <span>Investment Account</span>
                </div>



            </div>

            <div class="recent">
                <div class="top">
                    <b>Recent Deposits</b>
                    <a href="#">See History</a>
                </div>

                <div class="activities">
                    <?php
                    $dp = getUserDeposits($username);
                    if ($dp->num_rows < 1) {
                        echo "<p class='center-align'>
                    <b>You are yet to make a deposit yet !!!</b>
                    </p>";
                    }
                    while ($rwd = $dp->fetch_assoc()) {
                        echo "<div class='activity'>
                        <div class='details'>
                            <div class='icon'>
                                <i class='ti-exchange-vertical'></i>
                            </div>
                            <div class='detail'>
                                <b>Deposit via Wallet</b>
                                <p>
                                    <span>{$rwd['pay_date']}</span> . <span class='green-text'>Completed</span>
                                </p>
                            </div>
                        </div>
                        <div class='figures'>
                            <span class='amount green-text'>+ " . number_format($rwd['amount']), " USD</span>
                        </div>
                    </div>";
                    }
                    ?>

                </div>
            </div>
            <div class="recent">
                <div class="top">
                    <b>Recent Withdrawals</b>
                    <a href="#">See History</a>
                </div>

                <div class="activities">
                    <?php
                    $tr = getUserTransactions($username);
                    if ($tr->num_rows < 1) {
                        echo "<p class='center-align'>
                    <b>You are yet to make a withdrawal yet !!!</b>
                    </p>";
                    }
                    while ($rw = $tr->fetch_assoc()) {
                        echo "<div class='activity'>
                        <div class='details'>
                            <div class='icon'>
                                <i class='ti-exchange-vertical'></i>
                            </div>
                            <div class='detail'>
                                <b>Withdraw via {$rw['withdraw_from']}</b>
                                <p>
                                    <span>{$rw['transac_date']} </span> . <span class='green-text'>{$rw['status']}</span>
                                </p>
                            </div>
                        </div>
                        <div class='figures'>
                            <span class='amount red-text'>- {$rw['amount']} USD</span>
                        </div>
                    </div>";
                    }
                    ?>
                    <!-- <div class="activity">
                        <div class="details">
                            <div class="icon">
                                <i class="ti-exchange-vertical"></i>
                            </div>
                            <div class="detail">
                                <b>Withdraw via Wallet</b>
                                <p>
                                    <span>April 23, 2022 </span> . <span class="green-text">Completed</span>
                                </p>
                            </div>
                        </div>
                        <div class="figures">
                            <span class="amount">- 3000 USD</span>
                        </div>
                    </div> -->
                    <!-- <div class="activity">
                        <div class="details">
                            <div class="icon">
                                <i class="ti-exchange-vertical"></i>
                            </div>
                            <div class="detail">
                                <b>Withdraw via Wallet</b>
                                <p>
                                    <span>April 23, 2022 </span> . <span class="green-text">Completed</span>
                                </p>
                            </div>
                        </div>
                        <div class="figures">
                            <span class="amount">- 3000 USD</span>
                            <span class="balance">5000 USD</span>
                        </div>
                    </div>
                    <div class="activity">
                        <div class="details">
                            <div class="icon">
                                <i class="ti-exchange-vertical"></i>
                            </div>
                            <div class="detail">
                                <b>Withdraw via Wallet</b>
                                <p>
                                    <span>April 23, 2022 </span> . <span class="green-text">Completed</span>
                                </p>
                            </div>
                        </div>
                        <div class="figures">
                            <span class="amount">- 3000 USD</span>
                            <span class="balance">5000 USD</span>
                        </div>
                    </div> -->
                </div>
            </div>

            <?php include "./partial/user-footer.php";
            ?>
        </div>

    </div>







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