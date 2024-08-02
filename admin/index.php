<?php

include ('../reusable/conn.php');
include '../reusable/nav.php';
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

$user_query = 'SELECT id, username, role, creation_date
    FROM users
    ORDER BY creation_date DESC
    LIMIT 3;';

$user_results = mysqli_query($connect, $user_query);


?>

<div>
    <h2>Manage Teams</h2>
    <a href="teams/add.php">Add Team</a>
    <table>
        <tr>
            <th>ID</th>
            <th>Team Name</th>
            <th>Engine Supplier</th>
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
        </tr>
        <?php create_driver_table($driver_results) ?>
    </table>
    <a href="drivers.php">View All</a>
</div>

<div>
    <h2>Manage Users</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Creation Date</th>
            <th>Role</th>
            <th></th>
        </tr>
        <?php create_user_table($user_results, "users/") ?>
    </table>
    <a href="users/index.php">View All</a>
</div>

<?php
include '../reusable/footer.php';
?>