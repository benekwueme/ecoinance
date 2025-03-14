<?php
include 'coin-operations.php';
checkIfUserLoggedIn();
$username = $_SESSION['user-info']['username'];
$name = $_SESSION['user-info']['name'];

global $db;
$q = "select * from accounts where username = '$username'";
$r = $db->query($q);
$cldata = [];
while ($rw = $r->fetch_assoc()) {
    $cldata = $rw;
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
        <div class="dashboard" style="padding:30px">
            <p>Welcome !</p>
            <h4><b>Your Profile</b></h4>
            <span>At a glance summary of your profile.</span>

            <div class="settings row">
                <div class="col l7 s12">
                    <div class="s-card ">
                        <div class="title">
                            <p>My Account</p>
                        </div>
                        <div class="s-body">
                            <div class="">
                                <p class="">
                                    <i class="ti-user grey lighten-3" style="font-size: 40px; border: 1px solid grey;padding: 10px; border-radius: 50%;"></i>
                                </p>
                                <p>
                                    <b style="font-size: 20px;"><?php echo $cldata['fullname'];  ?></b>
                                    <i class="material-icons">more_vert</i>
                                </p>
                                <p>+<?php echo $cldata['phone'];  ?> </p>
                                <p><b><?php echo $cldata['country'];  ?></b> </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col l5 s12">
                    <div class="s-card ">
                        <div class="title">
                            <p>Email Address</p>
                        </div>
                        <div class="s-body">
                            <div class="">
                                <p style="margin-top: 0px;font-size:5px">&nbsp;</p>
                                <a class="s-btn teal">
                                    Primary Email
                                </a>
                                <p style="margin-top: 18px;">
                                    <b><?php echo $cldata['email'];  ?></b>
                                    <i class="material-icons">drafts</i>
                                </p>

                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col l7 s12">
                    <div class="s-card ">
                        <div class="title">
                            <p>Account Options</p>
                        </div>
                        <div class="s-body opt">
                            <div>
                                <p>
                                    <span>Language</span>
                                    <b>English</b>
                                </p>
                                <i class="material-icons">arrow_drop_down</i>
                            </div>
                            <div>
                                <p>
                                    <span>Nationality</span>
                                    <b><?php echo $cldata['country'];  ?></b>
                                </p>
                                <i class="material-icons">arrow_drop_down</i>
                            </div>
                            <div>
                                <p>
                                    <span>Account ID</span>
                                    <b><?php echo $cldata['username'];  ?></b>
                                </p>
                                <i class="material-icons">arrow_drop_down</i>
                            </div>
                            <div>
                                <p>
                                    <span>Account Status</span>
                                    <b><span class="green-text">Account verified</span> / Investments Running</b>
                                </p>
                                <i class="material-icons green-text">offline_pin</i>
                            </div>
                            <div>
                                <p>
                                    <span>Number of Investments</span>
                                    <b><?php echo getUserInvestments($username) ?> Investments - <span class="blue-text">Processed</span></b>
                                </p>
                                <i class="material-icons">arrow_drop_down</i>
                            </div>
                            <div>
                                <p>
                                    <span>Currency</span>
                                    <b>US Dollars</b>
                                </p>
                                <i class="material-icons">arrow_drop_down</i>
                            </div>
                            <div>
                                <p>
                                    <span>Withdrawal Transfer Limit</span>
                                    <b>$100,000</b>
                                </p>
                                <i class="material-icons">arrow_drop_down</i>
                            </div>




                        </div>
                    </div>
                </div>

                <div class="col l5 s12 up">
                    <div class="s-card ">
                        <div class="title">
                            <p>Phone Number</p>
                        </div>
                        <div class="s-body">
                            <div class="">
                                <p style="margin-top: 0px;font-size:5px">&nbsp;</p>
                                <a class="s-btn teal">
                                    Primary Number
                                </a>
                                <p style="margin-top: 18px;">
                                    <b><?php echo $cldata['phone'];  ?></b>
                                    <i class="material-icons">local_phone</i>
                                </p>


                            </div>
                        </div>
                    </div>
                    <div class="s-card" id="proof-payment" style="margin-top: 25px;">
                        <div class="title">
                            <p>Upload Your Payment Proof</p>
                        </div>
                        <div class="s-body">
                            <p style="margin: 18px 0;">
                                <marquee class="green-text ">Please ensure your upload proof of payment for verification</marquee>

                            </p>
                            <div class="">
                                <form action="upload-payment.php" method="post" enctype="multipart/form-data">
                                    <div class="file-field input-field">
                                        <div class="btn" style="margin-bottom: 20px;">
                                            <span>Upload your payment proof</span>
                                            <input type="file" name="proof" required accept="image/*">
                                        </div>
                                        <div class=""></div>
                                        <div class="file-path-wrapper">
                                            <input class="file-path validate" type="text">
                                        </div>
                                    </div>
                                    <div class="input-field center-align">
                                        <button type="submit" name="upload" class="btn-large btn-floating green pulse"><i class="material-icons">send</i></button>
                                    </div>
                                </form>
                                <!-- <p style="margin-top: 0px;font-size:5px">&nbsp;</p>
                                <a class="s-btn teal">
                                    Primary Number
                                </a>
                                 -->


                            </div>
                        </div>
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