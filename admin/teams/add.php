<?php
include '../../reusable/conn.php';
include '../../reusable/nav.php';
include '../../reusable/functions.php';

secure();

if (isset($_POST['team_name'])) {
    if ($_POST['team_name'] && $_POST['engine_supplier']) {
        $team_name = mysqli_real_escape_string($connect, $_POST['team_name']);
        $engine_supplier = mysqli_real_escape_string($connect, $_POST['engine_supplier']);

        // Handle image upload
        $image_path = '../../uploads/' . basename($_FILES['image']['name']);
        if (move_uploaded_file($_FILES['image']['tmp_name'], $image_path)) {
            $imagepath = '../uploads/' . basename($_FILES['image']['name']);
            $query = "INSERT INTO teams (team_name, engine_supplier, image_path) VALUES ('{$team_name}', '{$engine_supplier}', '{$imagepath}')";
            
            mysqli_query($connect, $query);

            set_message('Team has been added');
            header('Location: ../teams.php');
            die();
        } else {
            set_message('Failed to upload image');
        }
    }
}
?>
<div class="addTeam">
<a href="../teams.php" class="btnList">Return to Teams List</a>

<h2>Add Team</h2>

<form method="post" enctype="multipart/form-data">
    <label for="team_name">Team Name:</label>
    <input type="text" name="team_name" id="team_name" required>
    
    <label for="engine_supplier">Engine Supplier:</label>
    <input type="text" name="engine_supplier" id="engine_supplier" required>
    
    <label for="image">Team Image:</label>
    <input type="file" name="image" id="image" required>
    
    <input type="submit" value="Add Team">
</form>
</div>
<?php
include '../../reusable/footer.php';
?>
