<?php

include '../../reusable/conn.php';
include '../../reusable/nav.php';
include '../../reusable/functions.php';

secure();

if (!isset($_GET['id'])) {
    header('Location: index.php');
    die();
}

if (isset($_POST['username'])) {
    $id = $_GET['id'];
    if ($_POST['username'] and $_POST['role']) {
        $username = mysqli_real_escape_string($connect, $_POST['username']);
        $role = mysqli_real_escape_string($connect, $_POST['role']);
        $query = "UPDATE users SET
            username = '{$username}',
            role = '{$role}'
            WHERE id = '{$id}'
            LIMIT 1";
        mysqli_query($connect, $query);
    }

    if($_POST['password']){
        $password = md5($_POST['password']);
        $query = "UPDATE users SET
            password = '{$password}'
            WHERE id = '{$id}'
            LIMIT 1";
        mysqli_query($connect, $query);
    }

    set_message('User has been updated');

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
<a href="index.php">Return to User List</a>

<h2>Edit User - <?php echo $record['username'];?></h2>
<h3>Created On: <?php echo $record['creation_date']?></h3>

<form method="post">
    <label for="username">Username:</label>
    <input type="text" name="username" id="username" value="<?php echo htmlentities($record['username']); ?>">
    <label for="password">Password:</label>
    <input type="password" name="password" id="password">
    <label for="role">Role:</label>
    <select name="role" id="role">
        <?php if ($record['role'] == "user") { ?>
            <option value="user" selected>Default</option>
            <option value="admin">Admin</option>
        <?php } else { ?>
            <option value="user">Default</option>
            <option value="admin" selected>Admin</option>
        <?php } ?>
    </select>
    <input type="Submit" value="Save Changes">
</form>
<a href="delete.php?id=<?php echo $record['id']?>">Delete User</a>
<?php
include '../../reusable/footer.php'
?>