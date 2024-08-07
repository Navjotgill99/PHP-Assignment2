<?php

include 'reusable/conn.php' ;
include 'reusable/nav.php';
include 'reusable/functions.php' ;

if(isset($_SESSION['id'])){
  if($_SESSION['role'] == "admin"){
    header('Location: admin/index.php');
    die();
  }
  header('Location: index.php');
  die();
}

if( isset( $_POST['username'] ) )
{

  $username = $_POST['username'];
  $password = md5($_POST['password']);
  
  $team_query = "SELECT *
    FROM users
    WHERE username ='{$username}'
    AND password = '{$password}'
    LIMIT 1";
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
?>

<div class="content-box" style="max-width: 400px; margin:auto">

  <h2>Login</h2>
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
  <div style="background-color: white; text-align: center;">
    <a href="signup.php">Don't have an account? Sign up here.</a>
  </div>
</div>

<?php

include 'reusable/footer.php' ;

?>