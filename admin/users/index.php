<?php

include '../../reusable/conn.php';
include '../../reusable/nav.php';
include '../../reusable/functions.php';

secure();

$query = 'SELECT id, username, role, creation_date
    FROM users';
$result = mysqli_query( $connect, $query );

?>

<div>
    <h2> Manage Users</h2>
    <a href="../../signup.php" class="btn">Add User</a>
    <table>
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Role</th>
            <th>Created On</th>
            <th></th>
        </tr>
        <?php create_user_table($result, "")?>
    </table>
</div>


<?php

include '../../reusable/footer.php';

?>