<?php

include '../../reusable/conn.php';
include '../../reusable/nav.php';
include '../../reusable/functions.php';

secure();

if (!isset($_GET['id'])) {
    header('Location: index.php');
    die();
}

if (($_SERVER['REQUEST_METHOD'] === 'POST')) {
    $id = $_GET['id'];
    $username = mysqli_real_escape_string($connect, $_POST['username']);
    $role = mysqli_real_escape_string($connect, $_POST['role']);
    $query = "DELETE FROM users
            WHERE id = '{$id}'
            LIMIT 1";
    mysqli_query($connect, $query);

    set_message('User has been deleted');

    header('Location: index.php');
    die();
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT *
        FROM users
        WHERE id = {$id}
        LIMIT 1";
    $result = mysqli_query($connect, $query);

    if (!mysqli_num_rows($result)) {
        header('Location: index.php');
        die();
    }

    $record = mysqli_fetch_assoc($result);
}

?>
<a href="edit.php?id=<?php echo $record['id'];?>">Back</a>

<h2>Delete User - <?php echo $record['username'];?></h2>

<form method="post">
    <p>Are you sure you want to delete this user? This action cannot be undone.</p>
    <input type="submit" value="Yes, Delete this user">
</form>