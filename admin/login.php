<?php

include( '../reusable/conn.php' );
include '../reusable/config.php';
include( '../reusable/functions.php' );

if( isset( $_POST['username'] ) )
{
  
  $team_query = 'SELECT *
    FROM users
    WHERE username = "'.$_POST['username'].'"
    AND password = "'.md5( $_POST['password'] ).'"
    AND active = "1"
    LIMIT 1';
  $result = mysqli_query( $connect, $team_query );
  
  if( mysqli_num_rows( $result ) )
  {
    
    $record = mysqli_fetch_assoc( $result );
    
    $_SESSION['id'] = $record['id'];
    
    $_SESSION['username'] = $record['username'];
    $_SESSION['role'] = $record['role'];
    
    header( 'Location: index.php' );
    die();
    
  }
  else
  {
    
    set_message( 'Incorrect username and/or password' );
    
    header( 'Location: login.php' );
    die();
    
  } 
  
}
include '../reusable/nav.php' ;
?>

<div style="max-width: 400px; margin:auto">

  <form method="post" id="login">
    <div>
      <label for="username">Username:</label>
      <input type="text" name="username" id="username">
    </div>
    
    <div>
      <label for="password">Password:</label>
      <input type="password" name="password" id="password">
    </div>
  
    <input type="submit" name="submit" value="Login">
  </form>
  
</div>

<?php

include '../reusable/footer.php' ;

?>