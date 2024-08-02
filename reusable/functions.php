<?php

function set_message($message)
{

    $_SESSION['message'] = $message;

}

function get_message()
{

    if (isset($_SESSION['message'])) {

        echo '<p style="padding: 0 1%;" class="error">
        <i class="fas fa-exclamation-circle"></i> 
        ' . $_SESSION['message'] . '
      </p>
      <hr>';
        unset($_SESSION['message']);

    }

}

function secure()
{

    if (!isset($_SESSION['id'])) {
        header('Location: ../login.php');
        die();

    }else{
        if($_SESSION['role'] == "user"){
            header('Location: denied.php');
            die();
        }
    }

}

function create_table()
{

}
?>
<?php
function create_team_table($rows)
{
    while ($record = mysqli_fetch_assoc($rows)): ?>
        <tr>
            <td><?php echo $record['team_id'] ?></td>
            <td><?php echo $record['team_name'] ?></td>
            <td><?php echo $record['engine_supplier'] ?></td>
            <td><a href="teams/edit.php?id=<?php echo $record['team_id']?>">Edit</a></td>
            <td><a href="teams/delete.php?id=<?php echo $record['team_id']?>">Delete</a></td>
        </tr>
    <?php endwhile;
} ?>

<?php
function create_driver_table($rows)
{
    while ($record = mysqli_fetch_assoc($rows)): ?>
        <tr>
            <td><?php echo $record['id'] ?></td>
            <td><?php echo $record['first_name'] ?></td>
            <td><?php echo $record['last_name'] ?></td>
            <td><?php echo $record['points'] ?></td>
            <td><?php echo $record['team_name'] ?></td>
            <td><a href="edit.php?id=<?php echo $record['id']?>">Edit</a></td>
        </tr>
    <?php endwhile;
} ?>

<?php
function create_user_table($rows, $directory)
{
    while ($record = mysqli_fetch_assoc($rows)): ?>
        <tr>
            <td><?php echo $record['id'] ?></td>
            <td><?php echo $record['username'] ?></td>
            <td><?php echo $record['creation_date'] ?></td>
            <td><?php echo $record['role']?></td>
            <td><a href="<?php  echo "{$directory}edit.php?id={$record['id']}"?>">Edit</a></td>
        </tr>
    <?php endwhile;
} ?>