<?php

include 'reusable/conn.php' ;
include 'reusable/nav.php';
include 'reusable/functions.php' ;

if( isset( $_POST['username'] ) )
{
  
  if( $_POST['username'] and $_POST['password'])
  {
    date_default_timezone_set('UTC');
    $username = mysqli_real_escape_string( $connect, $_POST['username'] );
    $password = md5( $_POST['password'] );
    $role = "user";
    $creation_date = date('Y-m-d H:i:s');
    $query = "INSERT INTO users (
        username,
        password,
        role,
        creation_date
      ) VALUES (
        '{$username}',
        '{$password}',
        '{$role}',
        '{$creation_date}'
      )";
    mysqli_query( $connect, $query );
    
    set_message( 'Account created' );
    
  }

  header( 'Location: login.php' );
  die();
  
}

?>

<h2>Sign up</h2>

<form method="post">
  
  <label for="username">Username:</label>
  <input type="text" name="username" id="username">
  
  <label for="password">Password:</label>
  <input type="password" name="password" id="password">
  
  <input type="submit" value="Sign Up">
  
</form>

<a href="login.php">Already have an account? Sign in Here.</a>

<?php

include 'reusable/footer.php';

?>