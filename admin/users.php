<?php

include '../reusable/conn.php';
include '../reusable/nav.php';
include '../reusable/functions.php';

secure();

$query = 'SELECT id, username, role, creation_date
    FROM users';
$result = mysqli_query($connect, $query);

?>

<div class="content-box">
    <h2> Manage Users</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Role</th>
            <th>Creation Date</th>
            <th></th>
            <th></th>
        </tr>
        <?php create_user_table($result, "") ?>
    </table>
    <div class="container mt-3">
        <a href="index.php" class="btn btn-secondary">Return to Dashboard</a>
    </div>
</div>

<?php

include '../reusable/footer.php';

?>