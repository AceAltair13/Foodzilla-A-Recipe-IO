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

        <!-- Sidebar -->
        <div class="bg-dark border-right" id="sidebar-wrapper">
            <div class="list-group list-group-flush">
                <div class="profile">
                    <img src="assets/images/img_avatar.png" alt="user_avatar" class="image">
                    <h3 class="profile-name text-white mt-3 mb-0">
                        <?php
                        echo strlen($_SESSION["username"]) > 14
                            ? substr($_SESSION["username"], 0, 14) . "..."
                            : $_SESSION["username"];
                        ?>
                    </h3>
                    <p class="text-white mt-0">My Custom Status</p>
                </div>
                <a href="./search.php" class="list-group-item list-group-item-action bg-dark text-white">
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-search mr-2" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M10.442 10.442a1 1 0 0 1 1.415 0l3.85 3.85a1 1 0 0 1-1.414 1.415l-3.85-3.85a1 1 0 0 1 0-1.415z" />
                        <path fill-rule="evenodd" d="M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zM13 6.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z" />
                    </svg>Search Recipe</a>
                <a href="./create.php" class="list-group-item list-group-item-action bg-dark text-white">
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-plus-circle mr-2" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                        <path fill-rule="evenodd" d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                    </svg>Add Recipe</a>
                <a href="#" class="list-group-item list-group-item-action bg-dark text-white">
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-card-checklist mr-2" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M14.5 3h-13a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z" />
                        <path fill-rule="evenodd" d="M7 5.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm-1.496-.854a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 1 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0zM7 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm-1.496-.854a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 0 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0z" />
                    </svg>TODO List</a>

                <a href="./friendlist.php" class="list-group-item list-group-item-action bg-dark text-white">
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-people-fill mr-2" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm-5.784 6A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216zM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z" />
                    </svg>Friends</a>
                <a href="#" class="list-group-item list-group-item-action bg-dark text-white">
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-person-circle mr-2" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path d="M13.468 12.37C12.758 11.226 11.195 10 8 10s-4.757 1.225-5.468 2.37A6.987 6.987 0 0 0 8 15a6.987 6.987 0 0 0 5.468-2.63z" />
                        <path fill-rule="evenodd" d="M8 9a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                        <path fill-rule="evenodd" d="M8 1a7 7 0 1 0 0 14A7 7 0 0 0 8 1zM0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8z" />
                    </svg>Profile</a>
            </div>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">

            <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                <button class="btn mr-2" id="menu-toggle"><span class="navbar-toggler-icon"></span></button>

                <a href="./" class="navbar-brand">Foodzilla</a>

                <!-- <div class="collapse navbar-collapse" id="navbarSupportedContent"> -->
                <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link profile-pic dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img src="assets/images/img_avatar.png" alt="profile" class="rounded-circle avatar">
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" style="position: absolute" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="./myrecipes.php">Your Recipes</a>
                            <a class="dropdown-item" href="#">Profile</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="./logout.php">Logout</a>
                        </div>
                    </li>
                </ul>
                <!-- </div> -->
            </nav>

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