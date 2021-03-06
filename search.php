<?php
require_once 'connectdb.php';
session_start();

if (isset($_SESSION["username"])) {
} else {
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

    <title>Search</title>

    <!-- Bootstrap core CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="./css/dashboard.css" rel="stylesheet">
    <link href="./css/search.css" rel="stylesheet">

    <script src="https://kit.fontawesome.com/b20f2a5bee.js" crossorigin="anonymous"></script>
    <script src="connect.js" type="text./javascript"></script>
    <!-- Bootstrap core JavaScript -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="js/connect.js" type="text/javascript"></script>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=PT+Sans&family=Rowdies&display=swap" rel="stylesheet">
    <!-- <script  src="js/com.js" type="text/javascript"></script> -->


</head>
<style>
    input:focus,
    select:focus,
    textarea:focus,
    button:focus,
    span {
        outline: none;
    }
</style>

<body>

    <div class="d-flex" id="wrapper">

        <?php require_once 'accountsidebar.php' ?>

        <!-- Page Content -->
        <div id="page-content-wrapper">

            <?php require_once 'accountnavbar.php' ?>

            <div class="recipe-container">
                <h1 class="p-3 container-title">
                    <svg xmlns="http://www.w3.org/2000/svg" height='3.3rem' fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M10.442 10.442a1 1 0 0 1 1.415 0l3.85 3.85a1 1 0 0 1-1.414 1.415l-3.85-3.85a1 1 0 0 1 0-1.415z" />
                        <path fill-rule="evenodd" d="M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zM13 6.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z" />
                    </svg>
                    Search Recipe
                </h1>

                <div class="row ml-3 mb-4">
                    <div class="col-12 col-md-10 col-lg-8">
                        <form autocomplete="off" class="card card-sm">
                            <div class="card-body row no-gutters align-items-center">
                                <div class="col-auto">
                                    <i class="fas fa-search h4 text-body"></i>
                                </div>
                                <div class="col">
                                    <input class="form-control form-control-lg form-control-borderless" type="search" autocomplete="false" name="query" id="dataentry" placeholder="Enter ingredient or recipe name">
                                </div>
                                <!-- <div class="col-auto ml-4">
                                    <button type="sumbit" class="btn btn-lg btn-danger">Search</button>
                                </div> -->
                            </div>
                        </form>
                    </div>
                </div>
                <div class="row ml-3 mb-4" id="suggestion_out">
                    <div class="col-12 col-md-10 col-lg-8" id="suggestion">
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->
    <!-- Menu Toggle Script -->
    <script defer>
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });
        $('#suggestion').on('click', 'span', function() {
            var click_text = $(this).text();
            $('#dataentry').val(click_text);
        });
    </script>

</body>

</html>