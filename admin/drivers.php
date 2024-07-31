<?php

include ('../reusable/conn.php');
include '../reusable/config.php';
include ('../reusable/functions.php');

secure();

include '../reusable/nav.php' ;

$query = 'SELECT id, first_name, last_name, points, team_name
    FROM drivers
    JOIN teams
    ON drivers.team_id = teams.team_id';
$result = mysqli_query( $connect, $query );

?>

<div>
    <h2> Manage Drivers</h2>
    <a href="#" class="btn">Add Driver</a>
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
        <?php create_driver_table($result)?>
    </table>
</div>


<?php

include '../reusable/footer.php';

?>