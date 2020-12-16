<?php
require_once 'connectdb.php';
session_start();
if (isset($_SESSION["email"])) {
} else {
    header("location: login.php");
}
?>
<?php 
    $errors = "";

    //connect to the database
    $db = mysqli_connect('localhost','root','','foodzilla');

    if(isset($_POST['submit'])){
        $task = $_POST['task'];
        if (empty($task)) {
            $errors = "You must fill in the status";
        }
        else{
            mysqli_query($db,"INSERT INTO todo (task) VALUES ('$task')");
            header('location:todo.php');
        }
    }


//Delete a task
    if(isset($_GET['del_task'])){
       $id = $_GET['del_task']; 
       mysqli_query($db,"DELETE FROM todo WHERE id=$id");
       header('location:todo.php');
    }
    $tasks = mysqli_query($db,"SELECT * from todo");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo List</title>
    <link rel = "stylesheet" type = "text/css" href = "css/todo.css">
</head>
<body class = "todo">
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
            <th>N</th>
            <th>Task</th>
            <th>Action</th>
        </thead>

        <tbody class = "todo_list">
        <?php $i = 1; while($row = mysqli_fetch_array($tasks)){ ?>

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
</body>
</html>