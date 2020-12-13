<?php
require_once 'connectdb.php';
session_start();
if (isset($_SESSION["email"])) {
} else {
    header("location: login.php");
}
$errors = "";

if (isset($_POST['submit'])) {
    $task = $_POST['task'];
    if (empty($task)) {
        $errors = "You must fill in the task";
    } else {
        $email = $_SESSION["email"];
        $uidsql = "SELECT uid FROM users WHERE email = '$email'";
        $result = $conn->query($uidsql);
        $uid = $result->fetch_assoc()['uid'];
        $sql = "INSERT INTO tasks(task, uid) VALUES('$task', '$uid')";
        if ($conn->query($sql)) {
            header('location: todo.php');
        } else {
            echo $conn->error;
        }
    }
}


//Delete a task
if (isset($_GET['del_task'])) {
    $id = $_GET['del_task'];
    mysqli_query($conn, "DELETE FROM tasks WHERE id=$id");
    header('location:todo.php');
}
$tasks = mysqli_query($conn, "SELECT * from tasks");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo List</title>
    <link rel="stylesheet" type="text/css" href="css/todo.css">
</head>

<body>
    <div class="heading">
        <h2>To - Do</h2>
    </div>

    <div class="content">
        <form method="POST" action="todo.php" class="formholder">
            <?php if (isset($errors)) { ?>
                <p> <?php echo $errors; ?> </p>
            <?php } ?>
            <input type="text" name="task" class="task_input" placeholder="Input your task">
            <button type="submit" class="add_btn" name="submit">Add task</button>
        </form>

        <table>
            <thead>
                <th>Sr. No.</th>
                <th>Task</th>
                <th>Action</th>
            </thead>

            <tbody>
                <?php $i = 1;
                while ($row = mysqli_fetch_array($tasks)) { ?>

                    <tr>
                        <td class="task_num"> <?php echo $i; ?></td>
                        <td class="task"><?php echo $row['task'] ?></td>
                        <td class="delete">
                            <a href="todo.php?del_task=<?php echo $row['id']; ?>">X</a>
                        </td>
                    </tr>
                <?php $i++;
                } ?>
            </tbody>
        </table>
    </div>
</body>

</html>