<?php
require_once 'connectdb.php';
session_start();

if (!isset($_SESSION["username"])) {
    header("location: login.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico" type="image/x-icon">


    <title>Friendlist</title>

    <!-- Bootstrap core CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="./css/dashboard.css" rel="stylesheet">
    <link rel="stylesheet" href="./css/friendlist.css">
    <!-- FontAwesome -->
    <script src="https://kit.fontawesome.com/b20f2a5bee.js" crossorigin="anonymous"></script>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=PT+Sans&family=Rowdies&display=swap" rel="stylesheet">
    <style>
        .coming-soon {
            display: flex;
            margin-top: 16vh;
            justify-content: center;
            align-content: center;
        }

        .coming-soon img {
            height: 25vw;
        }

        .coming-soon h3 {
            font-family: 'Rowdies', sans-serif;
            margin-top: 5vh;
            text-align: center;
        }
    </style>
</head>

<body>

    <div class="d-flex" id="wrapper">
        <?php require_once 'accountsidebar.php' ?>
        <!-- Page Content -->
        <div id="page-content-wrapper">
            <?php require_once 'accountnavbar.php' ?>
            <div class="coming-soon">
                <div>
                    <img src="./assets/images/friends_soon.svg">
                    <h3>Coming Soon!</h3>
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->
    </div>
    <!-- /#wrapper -->

    <!-- Bootstrap core JavaScript -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous">
    </script>

    <!-- Menu Toggle Script -->
    <script>
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });
    </script>
</body>

</html>