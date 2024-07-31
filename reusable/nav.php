<?php
$root_dir = "/PHP-Assignment2/";
?>
<!doctype html>
<html>

<head>

  <meta charset="UTF-8">
  <meta http-equiv="Content-type" content="text/html; charset=UTF-8">

  <title>Formula 1</title>

  <link href=<?php echo "{$root_dir}styles/style.css"?> type="text/css" rel="stylesheet">

</head>

<body>
  <nav>
    <div class="topnav">
      <a class="logo">
        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/3/33/F1.svg/2560px-F1.svg.png"
          alt="formula 1 logo">
        </a>
      <ul class="menu-list">
        <li>
          <a href=<?php echo $root_dir?>>Home</a>
        </li>
          <?php if (isset($_SESSION['id'])) { ?>
            <li><a href=<?php echo "{$root_dir}admin/index.php" ?>>Dashboard</a></li>
            <li><a href=<?php echo "{$root_dir}admin/logout.php" ?>>Logout</a></li>
            <?php } else { ?>
              <li><a href=<?php echo "{$root_dir}admin/login.php" ?>>Login</a></li>
              <?php } ?>
      </ul>
    </div>
  </nav>
  <main>