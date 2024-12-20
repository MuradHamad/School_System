<!DOCTYPE html>
<html lang="en">
<?php include("constants.php") ?>

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title><?php echo SYSTEM_NAME ?></title>
  <link rel="stylesheet" href="..\..\styles\form.css">
  <link rel="stylesheet" href="..\..\styles\input.php">
</head>

<body>
  <?php include("page/partial/header.php") ?>

  <form method="post">
    <h2>Log in</h2>
    <label>Enter Name: <input type="text" name="name"></label>
    <label>Enter Password: <input type="text" name="password"></label>
    <button type="button" class="action-btn log-in">Log in</button>

    <button type="button" class="action-btn sign-up">Sign Up</button>
  </form>
</body>

</html>