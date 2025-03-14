<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Preloaders</title>
    <link rel="stylesheet" href="./css/preloader.css">
    <?php
    include "./partial/header.php";
    ?>
</head>

<body>

    <!-- <div class="centered">
        <div class="blob-1"></div>
        <div class="blob-2"></div>
    </div> -->

    <div class='loader loader1'>
        <div>
            <div>
                <div>
                    <div>
                        <div>
                            <div></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>





    <?php
    include "./partial/js-scripts.php";
    ?>
    <script>
        $(window).load(() => {
            //$("body").css("backgroundColor", "#f1e9de");

            // setTimeout(() => {
            //     $(".preloader *").css("display", "none");
            //     $(".preloader").slideUp(1000);
            // }, 2000);
        })
    </script>

</body>

</html>