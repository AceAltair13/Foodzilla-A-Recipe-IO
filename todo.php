<?php
require_once 'connectdb.php';
session_start();
$mail = $_COOKIE["email"];
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

$errors = "";
$uidquery = mysqli_query($conn, "SELECT `uid` FROM users WHERE `email` = '$mail'");
$row = mysqli_fetch_assoc($uidquery);
$uid = $row['uid'];

if (isset($_POST['submit'])) {
  $task = $_POST['task'];
  if (empty($task)) {
    $errors = "You must fill in the task";
  } else {
    mysqli_query($conn, "INSERT INTO tasks(`task`,`uid`) VALUES ('$task',$uid)");
    header('location:todo.php');
  }
}


//Delete a task
if (isset($_GET['del_task'])) {
  $id = $_GET['del_task'];
  mysqli_query($conn, "DELETE FROM tasks WHERE id = $id AND `uid` = $uid");
  header('location:todo.php');
}

$tasks = mysqli_query($conn, "SELECT id, task FROM tasks WHERE `uid` = $uid");

?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>Todo List</title>

  <!-- Bootstrap core CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="./css/dashboard.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="./css/todo.css">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=PT+Sans&family=Rowdies&display=swap" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@300&display=swap" rel="stylesheet">

</head>

<body>

  <div class="d-flex" id="wrapper">
    <?php require_once 'accountsidebar.php' ?>

    <!-- Page Content -->
    <div id="page-content-wrapper">
      <?php require_once 'accountnavbar.php' ?>

      <div class="todo container-fluid">
        <svg xmlns="http://www.w3.org/2000/svg" height="60" fill="currentColor" class="bi bi-journal-bookmark-fill mt-2" viewBox="0 0 16 16">
          <path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2z" />
          <path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1z" />
          <path fill-rule="evenodd" d="M6 1h6v7a.5.5 0 0 1-.757.429L9 7.083 6.757 8.43A.5.5 0 0 1 6 8V1z" />
        </svg>
        <h2 class="todo_heading display-3 mt-4 mb-0">To - Do</h2><br>
        <br>

        <div class="content">
          <form method="POST" action="todo.php" class="formholder mb-5">
            <?php if (isset($errors)) { ?>
              <p class="todo_errors"> <?php echo $errors; ?> </p>
            <?php } ?>
            <br>
            <br>
            <div class="add_task">
              <input type="text" name="task" class="task_input" placeholder="Input your task">
              <button type="submit" class="add_btn" name="submit"><svg xmlns="http://www.w3.org/2000/svg" height="20" fill="currentColor" class="bi bi-plus-square" viewBox="0 0 16 16">
                  <path fill-rule="evenodd" d="M14 1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z" />
                  <path fill-rule="evenodd" d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />

                </svg></button></div>
          </form>

          <?php
          if (!mysqli_num_rows($tasks)) {
            echo "
              <img src='./assets/images/empty_tasks.svg' height='80px'>
              <h3 class='no-tasks mt-3'>No tasks found</h3>
            ";
          } else { ?>
            <table class="todo_table">
              <thead class="todo_headings mb-2">
                <th>#</th>
                <th class="todo_task pl-6">Task</th>
                <th>Action</th>
              </thead>
              <tbody class="todo_list">
                <?php $i = 1;
                while ($row = mysqli_fetch_array($tasks)) { ?>
                  <tr>
                    <td class="task_num lead"><?php echo $i; ?></td>
                    <td class="task"><?php echo $row['task'] ?></td>
                    <td class="delete_task">
                      <a href="todo.php?del_task=<?php echo $row['id'] ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" height="25" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                          <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                          <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                        </svg></a>
                    </td>
                  </tr>
                <?php $i++;
                } ?>


              </tbody>
            </table>
          <?php } ?>
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