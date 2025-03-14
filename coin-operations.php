<?php
error_reporting(0);
session_start();
$db = new mysqli('localhost', 'root', '', 'ecoinance') or die("Error connecting db");


function generateRandomString($len)
{
    $characters = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $strnghex = '';
    for ($i = 0; $i < $len; $i++) {
        $index = rand(0, strlen($characters) - 1);
        $strnghex .= $characters[$index];
    }

    return $strnghex;
}

function checkIfAdminLoggedIn()
{
    if (!isset($_SESSION['admin-info'])) {
        header("location: ../admin-login.php");
    }
}

function loginAdmin($p)
{
    global $db;
    extract($p);
    $email = trim($email);
    $pass = md5($password);
    $q = "select * from admin where email ='$email' and password = '$pass'";
    $r = $db->query($q);
    $admin_row = [];
    if ($r->num_rows > 0) {
        while ($rw = $r->fetch_assoc()) {
            $admin_row = $rw;
        }
        $_SESSION['admin-info'] = array("email" => $admin_row['email']);

        header("location: ./admin/");
    } else {
        $_SESSION['login_error'] = " Wrong Email / Password combination !";
        header("location: admin-login.php");
    }
}

function getTotalInvestment()
{
    global $db;

    $q = "select sum(invest_amount) as 'total' from investments";
    $r = $db->query($q);
    $row = [];
    while ($rw = $r->fetch_assoc()) {
        $row = $rw;
    }

    return $row['total'];
}
function getTotalBalance()
{
    global $db;

    $q = "select sum(balance) as 'total' from balance";
    $r = $db->query($q);
    $row = [];
    while ($rw = $r->fetch_assoc()) {
        $row = $rw;
    }

    return $row['total'];
}
function getTotalAvaProfit()
{
    global $db;

    $q = "select sum(profit) as 'total' from balance";
    $r = $db->query($q);
    $row = [];
    while ($rw = $r->fetch_assoc()) {
        $row = $rw;
    }

    return $row['total'];
}
function getTotalWithdrawnBalance()
{
    global $db;

    $q = "select sum(amount) as 'total' from transactions where transac_type ='Withdraw' and withdraw_from='Balance'";
    $r = $db->query($q);
    $row = [];
    while ($rw = $r->fetch_assoc()) {
        $row = $rw;
    }

    return $row['total'];
}
function getTotalWithdrawnProfit()
{
    global $db;

    $q = "select sum(amount) as 'total' from transactions where transac_type ='Withdraw' and withdraw_from='Profit'";
    $r = $db->query($q);
    $row = [];
    while ($rw = $r->fetch_assoc()) {
        $row = $rw;
    }

    return $row['total'];
}
function getTotalWithdrawals()
{
    return getTotalWithdrawnBalance() + getTotalWithdrawnProfit();
}
function getTotalProfit()
{
    return getTotalAvaProfit() + getTotalWithdrawnProfit();
}
function getAllDeposit()
{
    global $db;

    $q = "select * from payments";
    $r = $db->query($q);
    return $r;
}
function getTotalPendingTranx()
{
    global $db;

    $q = "select * from transactions where status != 'Complete'  order by transac_type";
    $r = $db->query($q);
    return $r->num_rows;
}
function getPendingTransaction()
{
    global $db;

    $q = "select * from transactions where status != 'Complete'  order by transac_type";
    $r = $db->query($q);
    return $r;
}
function getAllWithdrawals()
{
    global $db;

    $q = "select * from transactions  where transac_type ='Withdraw'";
    $r = $db->query($q);
    return $r;
}
function getTotalDeposit()
{
    global $db;

    $q = "select sum(amount) as 'total' from payments";
    $r = $db->query($q);
    $row = [];
    while ($rw = $r->fetch_assoc()) {
        $row = $rw;
    }

    return $row['total'];
}

function getRecentInvestment()
{
    global $db;

    $q = "select * from investments order by id desc limit 2";
    $r = $db->query($q);

    return $r;
}
function getAllInvestment()
{
    global $db;

    $q = "select * from investments order by id desc";
    $r = $db->query($q);

    return $r;
}

function getActiveInvestment()
{
    global $db;

    $q = "select * from investments where status != 'expired'";
    $r = $db->query($q);

    return $r->num_rows;
}
function getTotalPendingUsers()
{
    global $db;

    $q = "select * from accounts where acc_status = 'pending'";
    $r = $db->query($q);

    return $r->num_rows;
}
function getAllPendingUsers()
{
    global $db;

    $q = "select * from accounts where acc_status = 'pending'";
    $r = $db->query($q);

    return $r;
}
function getAllUsers()
{
    global $db;

    $q = "select * from accounts where acc_status != 'pending'";
    $r = $db->query($q);
    return $r;
}
function getActiveUsers()
{
    global $db;

    $q = "select * from accounts where acc_status = 'verified'";
    $r = $db->query($q);

    return $r->num_rows;
}
function getAllInvestor()
{
    global $db;

    $q = "select distinct username from investments";
    $r = $db->query($q);

    return $r->num_rows;
}
function UpdateDeposit($u, $t)
{
    global $db;

    $q1 = "select * from transactions  where id = '$u' and transac_type = '$t'";

    echo $q1;
    $r1 = $db->query($q1);

    $rw1 = [];

    while ($row = $r1->fetch_assoc()) {
        $rw1 = $row;

        extract($rw1);

        $curr_bal = getUserBalance($username)['balance'] + $amount;

        $q2 = "update balance set balance='$curr_bal' where username = '$username'";
        $r2 = $db->query($q2);

        $iq = "insert into payments values(0,'$ref_order','$username','$amount','$transac_date')";
        echo $iq;

        $riq = $db->query($iq);

        if ($riq) {
            $q = "delete from transactions where id = '$u'";
            $r = $db->query($q);
        }



        return true;
    }



    return true;
}
function approveTranx($u)
{
    global $db;

    $q = "update transactions set status ='Complete' where id = '$u'";
    $r = $db->query($q);

    return true;
}
function verifyUser($u)
{
    global $db;

    $q = "update accounts set acc_status ='verified' where username = '$u'";
    $r = $db->query($q);
    $d = date('Y-m-d');
    $qi = "insert into balance values(0,'$u',0,0,'$d')";
    $ri = $db->query($qi);

    return true;
}
function getUserBalance($u)
{
    global $db;

    $q = "select * from balance where username ='$u' limit 1";
    $r = $db->query($q);
    $row = [];

    while ($rw = $r->fetch_assoc()) {
        $row = $rw;
    }

    return $row;
}
function getUserDetails($u)
{
    global $db;

    $q = "select * from accounts where username ='$u' limit 1";
    $r = $db->query($q);
    $row = [];

    while ($rw = $r->fetch_assoc()) {
        $row = $rw;
    }

    return $row;
}

function blockUserAccount($p)
{
    global $db;

    $q = "update accounts set acc_status='blocked' where username='$p'";

    $r = $db->query($q);

    return true;
}
function updateUserAccount($p)
{
    global $db;

    extract($p);

    $pass = md5($password);
    $q = "update accounts set fullname='$fullname', email='$email', username='$username',password='$pass',bkpass='$password',country='$country',phone='$phone',acc_status='$acc_status' where username='$old'";

    $r = $db->query($q);

    $qt = "update transactions set  username='$username' where username='$old'";

    $rt = $db->query($qt);

    $qin = "update investments set  username='$username' where username='$old'";

    $rin = $db->query($qin);

    $qp = "update payments set  username='$username' where username='$old'";

    $rp = $db->query($qp);

    $qb = "update balance set  username='$username' where username='$old'";

    $rb = $db->query($qb);


    return true;
}

// END OF ADMIN FUNCTIONS AND SO ON AND SO FORTH

function createUserAccount($p)
{
    global $db;
    extract($p);
    $nw = date("Y-m-d");
    $password = trim($password);
    $fullname = trim($fullname);
    $email = trim($email);
    $phone = trim($phone);
    $pass = md5($password);
    //Generating A Semi Random Username
    $userSplit = explode(" ", $fullname);
    $username = str_split($userSplit[0], 3)[0] . str_split($userSplit[1], 3)[0] . generateRandomString(4);

    if (checkExistingUser($email)) {
        $_SESSION['login_error'] = " This email has already been used !";
        header("location: sign-up.php");
    } else {
        $insertUser = "insert into accounts values(0,'$fullname','$username','$email','$pass','$phone','$country','$nw','$password','pending')";
        $r = $db->query($insertUser);
        header("location: sign-in.php");
    }
}

function checkExistingUser($e)
{
    global $db;
    $q =  "select * from accounts where email ='$e'";
    $r = $db->query($q);
    if ($r->num_rows > 0) {
        return true;
    } else {
        return false;
    }
}

function loginUser($p)
{
    global $db;
    extract($p);
    $email = trim($email);
    $pass = md5($password);
    $q = "select * from accounts where email ='$email' and password = '$pass' and acc_status='verified'";
    $r = $db->query($q);
    $user_row = [];
    if ($r->num_rows > 0) {
        while ($rw = $r->fetch_assoc()) {
            $user_row = $rw;
        }
        $_SESSION['user-info'] = array("email" => $user_row['email'], "username" => $user_row['username'], "name" => $user_row['fullname']);

        header("location: ./user-dashboard.php");
    } else {
        $_SESSION['login_error'] = " Wrong Email / Password combination !";
        header("location: sign-in.php");
    }
}

function checkIfUserLoggedIn()
{
    if (!isset($_SESSION['user-info'])) {
        header("location: ./sign-in.php");
    }
}

function getUserTotalInvestment($u)
{
    global $db;

    $q = "select sum(invest_amount) as 'total' from investments where username='$u'";
    $r = $db->query($q);
    $row = [];
    while ($rw = $r->fetch_assoc()) {
        $row = $rw;
    }

    return $row['total'];
}
function getUserTotalDeposit($u)
{
    global $db;

    $q = "select sum(amount) as 'total' from payments where username='$u'";
    $r = $db->query($q);
    $row = [];
    while ($rw = $r->fetch_assoc()) {
        $row = $rw;
    }

    return $row['total'];
}
function getUserTotalBalance($u)
{
    global $db;

    $q = "select sum(balance) as 'total' from balance where username='$u'";
    $r = $db->query($q);
    $row = [];
    while ($rw = $r->fetch_assoc()) {
        $row = $rw;
    }

    return $row['total'];
}

function getUserTotalAvaProfit($u)
{
    global $db;

    $q = "select sum(profit) as 'total' from balance where username = '$u'";
    $r = $db->query($q);
    $row = [];
    while ($rw = $r->fetch_assoc()) {
        $row = $rw;
    }

    return $row['total'];
}
function getUserTotalWithdrawnBalance($u)
{
    global $db;

    $q = "select sum(amount) as 'total' from transactions where transac_type ='Withdraw' and withdraw_from='Balance' and username = '$u'";
    $r = $db->query($q);
    $row = [];
    while ($rw = $r->fetch_assoc()) {
        $row = $rw;
    }

    return $row['total'];
}

function getUserTotalWithdrawnProfit($u)
{
    global $db;

    $q = "select sum(amount) as 'total' from transactions where transac_type ='Withdraw' and withdraw_from='Profit' and username = '$u'";
    $r = $db->query($q);
    $row = [];
    while ($rw = $r->fetch_assoc()) {
        $row = $rw;
    }

    return $row['total'];
}
function getUserTotalWithdrawals($u)
{
    return getUserTotalWithdrawnBalance($u) + getUserTotalWithdrawnProfit($u);
}
function getUserTotalProfit($u)
{
    return getUserTotalAvaProfit($u) + getUserTotalWithdrawnProfit($u);
}
function getUserTransactions($u)
{
    global $db;

    $q = "select * from transactions where username = '$u' and transac_type='Withdraw'";
    $r = $db->query($q);

    return $r;
}
function getUserDeposits($u)
{
    global $db;

    $q = "select * from payments where username = '$u'";
    $r = $db->query($q);

    return $r;
}
function getUserInvestments($u)
{
    global $db;

    $q = "select * from investments where username = '$u'";
    $r = $db->query($q);

    return $r->num_rows;
}
function getSingleUserInvestment($u, $id)
{
    global $db;

    $q = "select * from investments where id = '$id' and username='$u'";
    $r = $db->query($q);

    return $r;
}
function getAllUserInvestments($u)
{
    global $db;

    $q = "select * from investments where username = '$u' order by invest_type";
    $r = $db->query($q);

    return $r;
}
function payInvestment($u, $id, $a, $p)
{
    global $db;

    $curr_bal = getUserBalance($u)['balance'] + $a;
    $curr_pro = getUserBalance($u)['profit'] + $p;

    if (updateUserBalance($u, $curr_bal, $curr_pro)) {
        $q = "update investments set status = 'expired' where id = '$id' ";
        $r = $db->query($q);
    }

    return true;
}

function updateUserBalance($u, $b, $p)
{
    global $db;

    $q = "update balance set balance='$b', profit='$p' where username = '$u'";
    $r = $db->query($q);

    return true;
}
function addUserDeposit($u, $g)
{
    global $db;

    extract($g);
    $q = "insert into transactions values(0,'#$ref_order','$u','$amount','Deposit','$transac_date','Pending','')";
    $r = $db->query($q);


    return true;
}
function addUserInvestment($u, $a, $t)
{
    global $db;

    $dat = date('Y-m-d');
    $end = date('Y-m-d', strtotime($dat . '+ 5 days'));
    $ref = '#'. generateRandomString(7);

    $q = "insert into investments values(0,'$ref','$u','$t','$a','0','$dat','$end','running')";
    $r = $db->query($q);

    if($r){
        $curr_bal = getUserBalance($u)['balance'] - $a;

        $q2 = "update balance set balance='$curr_bal' where username = '$u'";
        $r2 = $db->query($q2);
    }

    return true;
}

function makeWithdrawal($u,$a,$w){
    global $db;
    $profit = getUserBalance($u)['profit'];
    $bal = getUserBalance($u)['balance'];

    $dat = date('Y-m-d');
    $ref = '#' . generateRandomString(7);

    $q = "insert into transactions values(0,'$ref','$u','$a','Withdraw','$dat','Pending','$w')";
    echo $q;
    $r = $db->query($q) or die("Error");

    if ($w == 'Profit') {
        $curr_bal = $profit - $a;
        $q2 = "update balance set profit='$curr_bal' where username = '$u'";
        $r2 = $db->query($q2);
    } else {
            $curr_bal = $bal - $a;
            $q2 = "update balance set balance='$curr_bal' where username = '$u'";
            $r2 = $db->query($q2);
        }



    return true;
}
function uploadImage($img_file, $username)
{
    // Check if file was uploaded without errors
    if (isset($img_file) && $img_file["error"] == 0) {
        $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
        $filename = $img_file["name"];
        $filetype = $img_file["type"];
        $filesize = $img_file["size"];

        // Verify file extension
        $ext = pathinfo($filename, PATHINFO_EXTENSION);

        // Verify file size - 5MB maximum
        $maxsize = 5 * 1024 * 1024;
        if ($filesize > $maxsize) {
            $_SESSION['login_error'] = "Error: File size is larger than the allowed limit.";
            $_SESSION['login_time'] = 5000;
            $_SESSION['login_color'] = "red";
            
            return false;
        }

        // Verify MYME type of the file
        if (in_array($filetype, $allowed)) {
            $d = date('Y-m-d');
            move_uploaded_file($img_file["tmp_name"], "./proof/" . $username . "-$d." . $ext);
            echo "Your file was uploaded successfully.";
            $pp = $username . "-$d." . $ext;
            return $pp;
        } else {
            $_SESSION['login_error'] = "Error: There was a problem uploading your file. Please try again";
            $_SESSION['login_time'] = 5000;
            $_SESSION['login_color'] = "red";
            return false;
        }
    } else {
        $_SESSION['login_error'] = "Error: There was a problem uploading your file. Please try again";
        $_SESSION['login_time'] = 5000;
        $_SESSION['login_color'] = "red";
        return false;
    }
}

function getAdminWalletAddress(){
    global $db;
    $r = $db->query("select * from admin");
    $row = [];
    while ($rw = $r->fetch_array()) {
        $row = $rw;
    }
    return $row;

}
