<?php
include '../../reusable/conn.php';
include '../../reusable/nav.php';
include '../../reusable/functions.php';

secure();

$id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($_POST['confirm'] == 'Yes') {
        $sql = "DELETE FROM drivers WHERE id=$id";

        if ($connect->query($sql) === TRUE) {
            header('Location: ../../admin/drivers.php');
        } else {
            echo "Error: " . $sql . "<br>" . $connect->error;
        }
    } else {
        header('Location:  ../../admin/drivers.php');
    }
}

$sql = "SELECT * FROM drivers WHERE id=$id";
$result = $connect->query($sql);
$driver = $result->fetch_assoc();
?>

<head>
    <title>Delete Driver</title>
</head>
<body>
    <h1>Delete Driver</h1>
    <p>Are you sure you want to delete <?= $driver['first_name'] ?> <?= $driver['last_name'] ?>?</p>
    <form method="post">
        <button type="submit" name="confirm" value="Yes">Yes</button>
        <button type="submit" name="confirm" value="No">No</button>
    </form>
    <a href="..\drivers.php">Back to Drivers</a>
</body>

<?php
include '../../reusable/footer.php'
?>