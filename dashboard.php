<?php
require_once 'connectdb.php';
session_start();
$data = $_COOKIE["username"];
$mail = $_COOKIE["email"];
$_SESSION["username"] = $data;
$_SESSION["email"] = $mail;
if (isset($_SESSION["email"])) {
  $sql = "SELECT `email` FROM `users` WHERE `email` = '$mail'";
  $result = $conn->query($sql);
  if ($result->num_rows == 0) {
    $stmt = "INSERT INTO users(username, email) VALUES('$data', '$mail')";
    if (!$conn->query($stmt)) {
      echo "Error: " . $conn->error;
    }
  }
} else {
  header("location: login.php");
}
?>

<?php
$errors = "";
//connect to the database
$db = mysqli_connect('localhost', 'root', '', 'foodzilla');

if (isset($_POST['ustatus'])) {
  $user_status = $_POST['userstatus'];
  if (empty($user_status)) {
    $errors = "You must fill in the status";
  } else {
    mysqli_query($db, "UPDATE users SET `status` = '$user_status' WHERE email = '$_SESSION[email]' ");
    header('location:dashboard.php');
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>Dashboard</title>

  <!-- Bootstrap core CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/dashboard.css" rel="stylesheet">

  <!-- sweet alert -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.11.1/dist/sweetalert2.all.min.js" integrity="sha256-d2y12cVyBzRuX+Qwbe6O9dlWfw0hnpxyE/T1yYfEPDg=" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />


  <!-- javascript -->
  <script defer src="js/com.js" type="text/javascript"></script>

</head>

<body>

  <div class="d-flex" id="wrapper">

    <?php require_once 'accountsidebar.php' ?>

    <!-- Page Content -->
    <div id="page-content-wrapper">

      <?php require_once 'accountnavbar.php' ?>

      <div class="container-fluid">

        <?php if (isset($_SESSION['success'])) : ?>
          <div class="error success">
            <h3>
              <?php
              echo $_SESSION['success'];
              unset($_SESSION['success']);
              ?>
            </h3>
          </div>
        <?php endif ?>

        <!-- information of the user logged in -->
        <!-- welcome message for the logged in user -->
        <?php if (isset($_SESSION['username'])) : ?>
          <div class="container-fluid ">

            <h1 class="display-5 text-center">
              Welcome , <?php echo $_SESSION['username']; ?>
            </h1>

            <p class="lead content-info">
              <h3> Your details: </h3> <br>
              Username : <?php echo $_SESSION['username']; ?> <br>
              Email-Id : <?php echo $_SESSION["email"]; ?> <br>
              Custom Status :
              <?php

              $db = mysqli_connect('localhost', 'root', '', 'foodzilla');

              $users_status = mysqli_query($db, "SELECT * FROM users WHERE email='$_SESSION[email]'");
              $status = mysqli_fetch_array($users_status);
              if ($status['status'] != NULL) {
                echo $status['status'];
              } else {
                echo "No status found.";
              }
              ?>
              <form method="POST" action="dashboard.php" class="formholder">
                <?php if (isset($errors)) { ?>
                  <p style="color:red"> <?php echo $errors; ?> </p>
                <?php } ?>
                <input type="text" name="userstatus" class="task_input" placeholder="Input your status">
                <button type="submit" class="add_btn" name="ustatus">Update Status</button>
              </form>
          </div>
        <?php endif ?>
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