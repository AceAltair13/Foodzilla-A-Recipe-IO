<?php
require_once 'connectdb.php';
session_start();

if (isset($_SESSION["email"])) {
    if (isset($_POST['submit'])) {
        if (isset($_FILES['recipe-image']['name'])) {
            $email = $_SESSION['email'];
            $recipe_name = $_POST['recipe-name'];
            $ingredients = $_POST['ingredients'];
            $recipe_method = $_POST['method-preparation'];
            $imgdata = addslashes(file_get_contents($_FILES['recipe-image']['tmp_name']));
            $mime = mime_content_type($_FILES['recipe-image']['tmp_name']);
            $sql = "
                INSERT INTO recipes(ownerid,name,ingredients,method,image,mime)
                VALUES(
                    (SELECT uid FROM users WHERE email = '$email'),
                    '$recipe_name', '$ingredients', '$recipe_method', '$imgdata', '$mime'
                )
            ";
            if ($conn->query($sql)) {
                $sql = "
                    SELECT rid FROM recipes 
                    WHERE ownerid = (SELECT uid FROM users WHERE email = '$email') 
                    ORDER BY rid DESC LIMIT 1";
                $result = $conn->query($sql);
                $row = $result->fetch_assoc();
                header("location: recipe.php?query=" . $row['rid']);
            } else {
                echo $conn->error;
            }
        } else {
            echo 'No Image Selected.';
        }
    }
} else {
    header("location: login.php");
}
?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Create Recipe</title>

    <!-- Bootstrap core CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="./css/dashboard.css" rel="stylesheet">
    <link href="./css/create.css" rel="stylesheet">

</head>

<body>

    <div class="d-flex" id="wrapper">

        <?php require_once 'accountsidebar.php' ?>

        <!-- Page Content -->
        <div id="page-content-wrapper">

            <?php require_once 'accountnavbar.php' ?>

            <div class="container-fluid">
                <div class="heading pl-4 pt-4">
                    <h1>Create your recipe</h1>
                </div>
                <div class="pl-4 pt-2">
                    <form action="" enctype="multipart/form-data" method="POST">
                        <div class="form-group">
                            <label for="recipe-name">Name of the Recipe</label>
                            <input id="recipe-name" name="recipe-name" type="text" required="required" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="ingredients">Ingredients</label>
                            <textarea id="ingredients" name="ingredients" cols="40" rows="5" required="required" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="method-preparation">Method of Preparation</label>
                            <textarea id="method-preparation" name="method-preparation" cols="40" rows="5" class="form-control" required="required"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="uploadImage">Image of Recipe</label><br>
                            <input type="file" name="recipe-image" accept="image/*" required>
                        </div>
                        <div class="form-group">
                            <button name="submit" type="submit" class="btn btn-primary mt-3">Submit</button>
                        </div>
                    </form>
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