<?php
include 'coin-operations.php';
if(isset($_POST['create'])){
    createUserAccount($_POST);
    //header("location: sign-in.php");
}else{
    header("location: sign-up.php");
}
?>