<!-- Sidebar -->
<div class="bg-dark" id="sidebar-wrapper">
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
            <p class="text-white mt-0">
                <?php
                $username = $_SESSION['username'];
                $sql = " SELECT `status` FROM `users` WHERE `username` = '$username'";
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_assoc($result);
                if ($row["status"] == NULL) {
                    echo 'No Status';
                } else {
                    echo strlen($row["status"]) > 50
                        ? substr($row["status"], 0, 50) . "..."
                        : $row["status"];
                }
                ?>
            </p>
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
        <a href="./todo.php" class="list-group-item list-group-item-action bg-dark text-white">
            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-card-checklist mr-2" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M14.5 3h-13a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z" />
                <path fill-rule="evenodd" d="M7 5.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm-1.496-.854a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 1 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0zM7 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm-1.496-.854a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 0 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0z" />
            </svg>TODO List</a>

        <a href="./friendlist.php" class="list-group-item list-group-item-action bg-dark text-white">
            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-people-fill mr-2" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm-5.784 6A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216zM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z" />
            </svg>Friends</a>
        <a href="./dashboard.php" class="list-group-item list-group-item-action bg-dark text-white">
            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-person-circle mr-2" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path d="M13.468 12.37C12.758 11.226 11.195 10 8 10s-4.757 1.225-5.468 2.37A6.987 6.987 0 0 0 8 15a6.987 6.987 0 0 0 5.468-2.63z" />
                <path fill-rule="evenodd" d="M8 9a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                <path fill-rule="evenodd" d="M8 1a7 7 0 1 0 0 14A7 7 0 0 0 8 1zM0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8z" />
            </svg>Profile</a>
    </div>
</div>
<!-- /#sidebar-wrapper -->