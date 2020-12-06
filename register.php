<?php
include('connectdb.php');
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST["username"]) && isset($_POST["email"]) && isset($_POST["password"])) {
    $user = $_POST["username"];
    $email  = $_POST["email"];
    $password = $_POST["password"];
    $sql = "
        INSERT INTO users(`username`,`email`,`password`)
        VALUES('$user', '$email', MD5('$password'))
        ";
    if (mysqli_query($conn, $sql)) {
      $_SESSION["username"] = $user;
      header("location: search.php");
    } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
  }
}

?>


<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1,
      shrink-to-fit=no">

  <title>Register</title>
  <!--Firebase-->
  <!-- Insert these scripts at the bottom of the HTML, but before you use any Firebase services -->

  <!-- Firebase App (the core Firebase SDK) is always required and must be listed first -->
  <script src="https://www.gstatic.com/firebasejs/8.0.0/firebase-app.js"></script>

  <!-- If you enabled Analytics in your project, add the Firebase SDK for Analytics -->
  <script src="https://www.gstatic.com/firebasejs/8.0.0/firebase-analytics.js"></script>

  <!-- Add Firebase products that you want to use -->
  <script src="https://www.gstatic.com/firebasejs/8.0.0/firebase-auth.js"></script>
  <script src="https://www.gstatic.com/firebasejs/8.0.0/firebase-firestore.js"></script>

  <script type="text/javascript" src="js/register.js"></script>
  <!-- FontAwesome -->
  <script src="https://kit.fontawesome.com/b20f2a5bee.js" crossorigin="anonymous"></script>

  <!-- Bootstrap core CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">

  <!-- CSS -->
  <link href="css/login.css" rel="stylesheet">

</head>

<body class="text-center">

  <div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
            <h2 class="mt-1 pb-2">Foodzilla<br>Sign Up</h2>
            <form class="form-signin" action="register.php" method="POST">

              <div class="form-label-group">
                <input type="text" id="inputUsername" name="username" class="form-control" placeholder="Username" required autofocus>
                <label for="inputUsername">Username</label>
              </div>

              <div class="form-label-group">
                <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email address" required>
                <label for="inputEmail">Email address</label>
              </div>

              <div class="form-label-group">
                <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
                <label for="inputPassword">Password</label>
              </div>

              <div class="form-label-group">
                <input type="password" id="reinputPassword" class="form-control" placeholder="Re-enter Password" required>
                <label for="reinputPassword">Re-enter Password</label>
              </div>

              <hr class="my-4">
              <button class="btn btn-lg btn-signin btn-block text-uppercase" type="submit"><i class="fas fa-sign-in-alt mr-2"></i>Sign up</button>
            </form>
            <p class="text-center mt-2">Already have an account? <a href="./login.php">Sign In</a></p>
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