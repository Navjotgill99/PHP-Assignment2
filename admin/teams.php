<?php

include '../reusable/conn.php';
include '../reusable/nav.php';
include '../reusable/functions.php';

secure();


$query = 'SELECT * FROM teams';
$result = mysqli_query($connect, $query);

?>

<div class="content-box">
    <h2>Manage Teams</h2>
    <a href="teams/add.php" class="btn">Add Team</a>
    <table>
        <tr>
            <th>ID</th>
            <th>Team Name</th>
            <th>Engine Supplier</th>
            <th></th>
            <th></th>
        </tr>
        <?php create_team_table($result) ?>
    </table>

    <div class="container mt-3">
        <a href="index.php" class="btn btn-secondary">Return to Dashboard</a>
    </div>
</div>
<?php

include '../reusable/footer.php';

?>