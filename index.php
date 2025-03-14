<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CoinMaximal</title>
    <link rel="stylesheet" href="./css/preloader.css">
    <?php
    include "./partial/header.php";
    ?>
</head>

<body style="background-color: black;">
    <?php
    include "./partial/preloader.php";
    ?>

    <div class="video-bg hide-on-large-only">
        <video src="./images/pexels-cottonbro-cg-8817009 (360p).mp4" muted autoplay="true" loop></video>
    </div>
    <div class="bg animatedParent" data-sequence="500">
        <div class="landing ">
            <p class="bounceInLeft animated slowest" data-id="1"> </p>
            <p class="bounceInLeft animated slowest" data-id="2"> </p>
            <p class="bounceInLeft animated slowest" data-id="3"> </p>
            <img class="animated bounceInRight slowest" src="./images/coinmaximal-icon.svg" height="150px" width="150px" alt="" data-id="4">
            <p class="bounceInLeft animated slowest" data-id="5"> CoinMaximal</p>
        </div>
        <div class="land row animated fadeInUp slowest" data-id="6">
            <div class="col s10 offset-s1 center-align">
                <a href="./index.html" class="btn-large yellow darken-4" style="font-size: 20px;">Let's Trade</a>
            </div>
        </div>
    </div>
    <?php
    include "./partial/js-scripts.php";
    ?>
    <script>
        $(window).load(() => {
            $("body").css("backgroundColor", "#f1e9de");

            setTimeout(() => {
                $(".preloader *").css("display", "none");
                $(".preloader").slideUp(1000);
            }, 2000);
        })
    </script>

</body>

</html>