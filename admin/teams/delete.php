<?php
include '../../reusable/conn.php';
include '../../reusable/nav.php';
include '../../reusable/functions.php';

secure();

if (!isset($_GET['id'])) {
    header('Location: ../teams.php');
    die();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_GET['id'];
    $query = "DELETE FROM teams WHERE team_id = '{$id}' LIMIT 1";
    mysqli_query($connect, $query);

    set_message('Team has been deleted');
    header('Location: ../teams.php');
    die();
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

<div class="deleteTeam">

<a href="../teams.php" class="btnList">Return to Teams List</a>

<h2>Delete Team - <?php echo htmlentities($record['team_name']); ?></h2>

<form method="post">
<p>Are you sure you want to delete this team? This action cannot be undone.</p>
<input type="submit" value="Yes, Delete this team">
</form>

</div>

<?php
include '../../reusable/footer.php';
?>
