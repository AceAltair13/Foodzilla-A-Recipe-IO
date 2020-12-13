<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1,
      shrink-to-fit=no">

    <title>Login</title>
    <!--Firebase-->
    <!-- Insert these scripts at the bottom of the HTML, but before you use any Firebase services -->

    <!-- Firebase App (the core Firebase SDK) is always required and must be listed first -->
    <script src="https://www.gstatic.com/firebasejs/8.0.0/firebase-app.js"></script>

    <!-- If you enabled Analytics in your project, add the Firebase SDK for Analytics -->
    <script src="https://www.gstatic.com/firebasejs/8.0.0/firebase-analytics.js"></script>

    <!-- Add Firebase products that you want to use -->
    <script src="https://www.gstatic.com/firebasejs/8.0.0/firebase-auth.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.0.0/firebase-firestore.js"></script>

    <script type="text/javascript" src="js/login.js"></script>
    <script type="text/javascript" src="js/login_google.js"></script>

    <!-- FontAwesome -->
    <script src="https://kit.fontawesome.com/b20f2a5bee.js" crossorigin="anonymous"></script>

    <!-- Bootstrap core CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">

    <!-- CSS -->
    <link href="css/login.css" rel="stylesheet">

    <!-- sweet alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.11.1/dist/sweetalert2.all.min.js" integrity="sha256-d2y12cVyBzRuX+Qwbe6O9dlWfw0hnpxyE/T1yYfEPDg=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">


    <!-- javascript -->
    <script defer src="js/login.js" type="text/javascript"></script>

</head>

<style>
    body.swal2-shown>[aria-hidden="true"] {
        filter: blur(10px);
    }

    body>* {
        transition: 0.1s filter linear;
    }
</style>

<body class="text-center">

    <div class="container">
        <div class="row">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                <div class="card card-signin my-5">
                    <div class="card-body">
                        <img src="assets/images/foodzilla.png" alt="Foodzilla Logo">
                        <h2 class="my-1">Sign In</h2>
                        <div class="mb-1" style="color: red"><?php if (isset($error)) echo $error ?></div>
                        <form class="form-signin" autocomplete="off">

                            <div class="form-label-group">
                                <input autocomplete="false" type="email" id="inputEmail" name="user" class="form-control" placeholder="Email Address" required>
                                <label for="inputEmail">Email Address</label>
                            </div>

                            <div class="form-label-group">
                                <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
                                <label for="inputPassword">Password</label>
                            </div>
                        </form>
                        <button id="signin" type="submit" onclick="a()" class="btn btn-lg btn-signin btn-block text-uppercase"><i class="fas fa-sign-in-alt mr-2"></i>Sign in</button>
                            <button class="btn btn-lg btn-google btn-block text-uppercase" onclick="b()"><i class="fab fa-google mr-2"></i>Sign in with Google</button>
                        <p class="text-center mt-2">New to Foodzilla? <a href="./register.php">Sign Up</a></p>
                        <p class="text-center">Forgot Password ? <a href="./forgotpassword.html">Click Here</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
</body>

</html>