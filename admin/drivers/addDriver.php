<?php
include '../../reusable/conn.php';
include '../../reusable/nav.php';
include '../../reusable/functions.php';

secure();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $points = $_POST['points'];
    $team_id = $_POST['team_id'];

    $sql = "INSERT INTO drivers (first_name, last_name, points, team_id) VALUES ('$first_name', '$last_name', $points, $team_id)";

    if ($connect->query($sql) === TRUE) {
        header('Location:  ../../admin/drivers.php');
    } else {
        echo "Error: " . $sql . "<br>" . $connect->error;
    }
}

$query = "SELECT * FROM teams";
$teams = $connect->query($query);
?>


<head>
    <title>Add Driver</title>
</head>
<body>
    <h1>Add Driver</h1>
    <form method="post">
        <label>First Name:</label>
        <input type="text" name="first_name" required>
        <br>
        <label>Last Name:</label>
        <input type="text" name="last_name" required>
        <br>
        <label>Points:</label>
        <input type="number" name="points" required>
        <br>
        <label>Team:</label>
        <select name="team_id">
            <?php while($row = $teams->fetch_assoc()): ?>
            <option value="<?= $row['team_id'] ?>"><?= $row['team_name'] ?></option>
            <?php endwhile; ?>
        </select>
        <br>
        <button type="submit">Add</button>
    </form>
    <a href="..\drivers.php">Back to Drivers</a>
</body>

<?php
include '../../reusable/footer.php'
?>