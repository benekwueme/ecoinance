<?php
include 'coin-operations.php';
checkIfUserLoggedIn();
$username = $_SESSION['user-info']['username'];
$name = $_SESSION['user-info']['name'];


if (isset($_GET['invest_amount'])) {
    extract($_GET);
    $bal = getUserBalance($username)['balance'];
    

    switch ($invest_type) {
        case 'Bronze':
            $min = 300;
            $max = 5000;        
            break;
        case 'Silver':
            $min = 5001;
            $max = 20000;
            break;
        case 'Gold':
            $min = 20001;
            $max = 50000;
            break;
        case 'Diamond':
            $min = 50001;
            $max = 100000;
            break;

        default:
            
            break;
    }

    echo $invest_type . "<br>". $min ."-" .$max;

    if($invest_amount < $min){
        $_SESSION['login_error'] = "The amount is below the plan limit";
        $_SESSION['login_time'] = 7000;
        $_SESSION['login_color'] = "red";
        echo "<script>history.back()</script>";
    } else if ($invest_amount > $max) {
        $_SESSION['login_error'] = "The amount is above the plan limit.";
        $_SESSION['login_time'] = 7000;
        $_SESSION['login_color'] = "red";
        echo "<script>history.back()</script>";
    }else{
        if ($bal < $invest_amount) {
            $_SESSION['login_error'] = "Sorry, You have insufficient balance !!!";
            $_SESSION['login_time'] = 7000;
            $_SESSION['login_color'] = "red";
            header("location: ./user-dashboard.php");
        } else {
            if (addUserInvestment($username, $invest_amount, $invest_type)) {
                $_SESSION['login_error'] = "Your investment has been processed";
                $_SESSION['login_time'] = 7000;
                $_SESSION['login_color'] = "green";

                header("location: ./my-plans.php");
            }
        }
    }

   
    
}
