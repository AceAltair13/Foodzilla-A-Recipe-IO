<?php
require_once 'connectdb.php';
session_start();
if (isset($_SESSION["email"])) {
} else {
    header("location: login.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>My Recipes</title>

    <!-- Bootstrap core CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/dashboard.css" rel="stylesheet">
    <link rel="stylesheet" href="./css/search.css">

</head>

<body>

    <div class="d-flex" id="wrapper">

        <?php require_once 'accountsidebar.php' ?>

        <!-- Page Content -->
        <div id="page-content-wrapper">

            <?php require_once 'accountnavbar.php' ?>


            <div class="container-fluid">
            
                <h1 class="p-3">
                    Your Recipes
                </h1>

                <?php
                $mail=$_SESSION["email"];
                $querydat = "
                                SELECT uid FROM  users
                                WHERE email='$mail'
                            ";
                $result_user = mysqli_query($conn, $querydat);
                $row=mysqli_fetch_array($result_user);
                $data=$row['uid'];
                $main_query="
                                SELECT * from recipes where ownerid='$data'
                            ";
                $result_main=mysqli_query($conn,$main_query);
                if(mysqli_num_rows($result_main)>0){
                    while($row=mysqli_fetch_array($result_main)){
                            echo'<div class="row m-4">
                                <div class="card" style="width: 18rem">
                                <img src="data:image/jpeg;base64,' . base64_encode($row['image']) . '" alt="Recipe Photo" class="img-fluid rounded">
                                <div class="card-body">
                                <a class="navbar-brand" href=./recipe.php?query=' .$row["rid"]. '>' . $row["name"] . '</a>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card content.</p>
                                </div>
                                </div>
                                </div>
                                ';
                    }
                }

            ?>


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