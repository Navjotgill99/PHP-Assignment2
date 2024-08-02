<?php
include '../../reusable/conn.php';
include '../../reusable/nav.php';
include '../../reusable/functions.php';

secure();

if (isset($_POST['team_name'])) {
    if ($_POST['team_name'] && $_POST['engine_supplier']) {
        $team_name = mysqli_real_escape_string($connect, $_POST['team_name']);
        $engine_supplier = mysqli_real_escape_string($connect, $_POST['engine_supplier']);
        $query = "INSERT INTO teams (team_name, engine_supplier) VALUES ('{$team_name}', '{$engine_supplier}')";
        
        mysqli_query($connect, $query);

        set_message('Team has been added');
        header('Location: ../teams.php');
        die();
    }
}
?>

<a href="../teams.php">Return to Teams List</a>

<h2>Add Team</h2>

<form method="post">
    <label for="team_name">Team Name:</label>
    <input type="text" name="team_name" id="team_name" required>
    
    <label for="engine_supplier">Engine Supplier:</label>
    <input type="text" name="engine_supplier" id="engine_supplier" required>
    
    <input type="submit" value="Add Team">
</form>

<?php
include '../../reusable/footer.php';
?>
