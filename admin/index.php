<?php
echo '<link rel="preconnect" href="https://fonts.googleapis.com">';
echo '<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>';
echo '<link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">';
?>

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
            <th></th>
        </tr>
        <?php create_team_table($team_results) ?>
    </table>
    <a href="teams.php" class="btnAll">View All</a>
</div>

<div class="content-box">
    <h2> Manage Drivers</h2>
    <a href=".\drivers\addDriver.php" class="btn">Add Driver</a>
    <table>
        <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Points</th>
            <th>Team</th>
            <th></th>
            <th></th>
        </tr>
        <?php create_driver_table($driver_results) ?>
    </table>
    <a href="drivers.php" class="btnAll">View All</a>
</div>

<div class="content-box">
    <h2>Manage Users</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Creation Date</th>
            <th>Role</th>
            <th></th>
            <th></th>
        </tr>
        <?php create_user_table($user_results, "users/") ?>
    </table>
    <a href="users.php" class="btnAll">View All</a>
</div>

<?php
include '../reusable/footer.php';
?>