<?php

include ('../reusable/conn.php');
include '../reusable/config.php';
include ('../reusable/functions.php');

secure();

$team_query = 'SELECT *
    FROM teams
    LIMIT 3';

$team_results = mysqli_query($connect, $team_query);

$driver_query = 'SELECT id, first_name, last_name, points, team_name
    FROM drivers
    JOIN teams
    ON drivers.team_id = teams.team_id
    ORDER BY drivers.points DESC
    LIMIT 3';

$driver_results = mysqli_query($connect, $driver_query);

include '../reusable/nav.php';

?>

<div>
    <h2>Manage Teams</h2>
    <a href="#">Add Team</a>
    <table>
        <tr>
            <th>ID</th>
            <th>Team Name</th>
            <th>Engine Supplier</th>
            <th></th>
            <th></th>
            <th></th>
        </tr>
        <?php create_team_table($team_results) ?>
    </table>
    <a href="teams.php">View All</a>
</div>

<div>
    <h2> Manage Drivers</h2>
    <a href="#">Add Driver</a>
    <table>
        <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Points</th>
            <th>Team</th>
            <th></th>
            <th></th>
            <th></th>
        </tr>
        <?php create_driver_table($driver_results) ?>
    </table>
    <a href="drivers.php">View All</a>
</div>

<?php
include '../reusable/footer.php';
?>