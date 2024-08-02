<?php
include '../../reusable/conn.php';
include '../../reusable/nav.php';
include '../../reusable/functions.php';

secure();

$id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $points = $_POST['points'];
    $team_id = $_POST['team_id'];

    $sql = "UPDATE drivers SET first_name='$first_name', last_name='$last_name', points=$points, team_id=$team_id WHERE id=$id";

}

$sql = "SELECT * FROM drivers WHERE id=$id";
$result = $connect->query($sql);
$driver = $result->fetch_assoc();

$sql = "SELECT * FROM teams";
$teams = $connect->query($sql);
?>


<head>
    <title>Edit Driver</title>
</head>
<body>
    <h1>Edit Driver</h1>
    <form method="post">
        <label>First Name:</label>
        <input type="text" name="first_name" value="<?= $driver['first_name'] ?>" required>
        <br>
        <label>Last Name:</label>
        <input type="text" name="last_name" value="<?= $driver['last_name'] ?>" required>
        <br>
        <label>Points:</label>
        <input type="number" name="points" value="<?= $driver['points'] ?>" required>
        <br>
        <label>Team:</label>

        <select name="team_id">
            <?php while($row = $teams->fetch_assoc()): ?>

            <option value="<?= $row['team_id'] ?>" <?= $row['team_id'] == $driver['team_id'] ? 'selected' : '' ?>><?= $row['team_name'] ?></option>
            <?php endwhile; ?>
        </select>
        <br>
        <button type="submit">Update</button>
    </form>
    
    <a href="..\drivers.php">Back to Drivers</a>
</body>

<?php
include '../../reusable/footer.php'
?>
