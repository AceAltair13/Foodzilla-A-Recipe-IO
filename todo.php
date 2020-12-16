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

?>
<?php 
    $errors = "";

    //connect to the database
    $db = mysqli_connect('localhost','root','','foodzilla');
    $uid = mysqli_query($db,"SELECT `uid` FROM users WHERE `email` = '$_SESSION[email]'");
    

    if(isset($_POST['submit'])){
        $task = $_POST['task'];
        if (empty($task)) {
            $errors = "You must fill in the task";
        }
        else{
            mysqli_query($db,"INSERT INTO tasks(task,`uid`) VALUES ($task,$uid)");
            header('location:todo.php');
        }
    }


//Delete a task
    if(isset($_GET['del_task'])){
       $id = $_GET['del_task']; 
       mysqli_query($db,"DELETE FROM tasks WHERE id=$id AND `uid` = $uid");
       header('location:todo.php');
    }
    $tasks = mysqli_query($db,"SELECT * FROM tasks WHERE `uid` = '$uid' ");
    
    
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
  <link href="css/dashboard.css" rel="stylesheet">
  <link rel = "stylesheet" type = "text/css" href = "css/todo.css">

</head>

<body>

  <div class="d-flex" id="wrapper">
    <?php require_once 'accountsidebar.php' ?>

    <!-- Page Content -->
    <div id="page-content-wrapper">
      <?php require_once 'accountnavbar.php' ?>
      
      <div class="todo">
      <div class="todo_heading">
        <h2>To - Do</h2>
    </div>

    <div class = "content">
    <form method = "POST" action="todo.php" class = "formholder">
    <?php if(isset($errors)){ ?>
        <p class = "todo_errors"> <?php echo $errors; ?> </p>
    <?php } ?>
        <input type="text" name = "task" class = "task_input" placeholder = "Input your task">
        <button type = "submit" class = "add_btn" name = "submit">Add task</button>
    </form>

    <table class = "todo_table">
        <thead class = "todo_heading">
            <th>#</th>
            <th>Task</th>
            <th>Action</th>
        </thead>

        <tbody class = "todo_list">
        <?php $i = 1; 
        while($row = mysqli_fetch_array($tasks))
        { ?>

            <tr>
                <td class = "task_num"> <?php echo $i;?></td>
                <td class = "task"><?php echo $row['task']?></td>
                <td class = "delete_task">
                <a href="todo.php?del_task=<?php echo $row['id'];?>">x</a>
                </td>
            </tr>
        <?php $i++; } ?>
        </tbody>
    </table>
    </div>
      </div>
    
    </div>

    <!-- /#page-content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Bootstrap core JavaScript -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
    integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
    integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous">
    </script>

  <!-- Menu Toggle Script -->
  <script>
    $("#menu-toggle").click(function (e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
  </script>

</body>

</html>