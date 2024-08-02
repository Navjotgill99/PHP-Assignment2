<?php
include '../../reusable/conn.php';
include '../../reusable/nav.php';
include '../../reusable/functions.php';

secure();

if (!isset($_GET['id'])) {
    header('Location: ../teams.php');
    die();
}

if (isset($_POST['team_name'])) {
    $id = $_GET['id'];
    if ($_POST['team_name'] && $_POST['engine_supplier']) {
        $team_name = mysqli_real_escape_string($connect, $_POST['team_name']);
        $engine_supplier = mysqli_real_escape_string($connect, $_POST['engine_supplier']);
        $query = "UPDATE teams SET team_name = '{$team_name}', engine_supplier = '{$engine_supplier}' WHERE team_id = '{$id}' LIMIT 1";
        mysqli_query($connect, $query);

        set_message('Team has been updated');
        header('Location: ../teams.php');
        die();
    }
}

$id = $_GET['id'];
$query = "SELECT * FROM teams WHERE team_id = {$id} LIMIT 1";
$result = mysqli_query($connect, $query);

if (!mysqli_num_rows($result)) {
    header('Location: ../teams.php');
    die();
}

$record = mysqli_fetch_assoc($result);
?>

<a href="../teams.php">Return to Teams List</a>

<h2>Edit Team - <?php echo htmlentities($record['team_name']); ?></h2>

<form method="post">
    <label for="team_name">Team Name:</label>
    <input type="text" name="team_name" id="team_name" value="<?php echo htmlentities($record['team_name']); ?>" required>
    
    <label for="engine_supplier">Engine Supplier:</label>
    <input type="text" name="engine_supplier" id="engine_supplier" value="<?php echo htmlentities($record['engine_supplier']); ?>" required>
    
    <input type="submit" value="Save Changes">
</form>

<?php
include '../../reusable/footer.php';
?>
