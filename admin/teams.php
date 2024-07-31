<?php

include ('../reusable/conn.php');
include '../reusable/config.php';
include ('../reusable/functions.php');

secure();

include '../reusable/nav.php' ;

$query = 'SELECT *
  FROM teams';
$result = mysqli_query( $connect, $query );

?>

<div>
    <h2>Manage Teams</h2>
    <a href="#" class="btn">Add Team</a>
    <table>
        <tr>
            <th>ID</th>
            <th>Team Name</th>
            <th>Engine Supplier</th>
            <th></th>
            <th></th>
            <th></th>
        </tr>
        <?php create_team_table($result)?>
    </table>
</div>


<?php

include '../reusable/footer.php';

?>